<?php

namespace application\controllers;


use application\base\BaseController;
use application\components\Router;
use application\models\Cinema;

class CinemaController extends BaseController
{

    public function actionIndex(){

        $cinemas = Cinema::getCinemas();
        $title = 'Cinemas List';

        $this->view->render('cinema/index',[
            'cinemas' => $cinemas,
            'title' => $title
        ]);
        return true;
    }

    public function actionDetails($id){
        $cinema = Cinema::getCinemaById($id);
        $presents = Cinema::getTodayFilms();

        $this->view->render('cinema/details',[
            'cinema' => $cinema,
            'presents' => $presents,
        ]);
        return true;
    }

    public function actionTime(){
        $output = '';
        $cinema_id = $_POST['cinema_id'];
        $search_val = $_POST['search_val'];
        $search_date = $_POST['search_date'];

        $cinema = Cinema::getCinemaById($cinema_id);
        $presents = Cinema::getPresents($search_val,$search_date);

        if (!empty($presents)){
            $output .= '
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Film Name</th>
                    <th scope="col">Film Year</th>
                    <th scope="col">Show Date</th>
                    <th scope="col"></th>
                </tr>
                </thead>
            <tbody>
            <tbody>';

            foreach ($presents as $present){
                $output .= '
                <tr>
                    <th><img style="width: 50px" src="../../../assets/images/'.$present['image'].'" alt=""></th>
                    <td> '.$present['film_name'].' </td>
                    <td> '.$present['film_year'].' </td>
                    <td> '.$present['show_date'].' </td>
                    <td><a class="buy-tick" href="/cinema/presents/'.$cinema['id'].'/'.$present['id'].'">Book</a></td>
                </tr>
                ';
            }
            $output .= '
            </tbody>
            </table>
            ';
        }else{
            $output .= '<h4 align="center" class="mt-5 mb-5">No Result.</h4>';
        }

        echo json_encode($output);
        return true;
    }

    public function actionPresents($cinemaId){

        $id = Router::getSegment(4);
        $present = Cinema::getPresentById($id);
        $cinema = Cinema::getCinemaById($cinemaId);
        $orders = Cinema::getOrders($cinemaId,$id);

        $this->view->render('cinema/presents',[
            'orders' => $orders,
            'present' => $present,
            'cinemaId' => $cinemaId,
            'cinema' => $cinema
        ]);
        return true;
    }

    public function actionBooking($placeId){
        $confirm_result = '';

        $_SESSION["confirm_message"] = "Booking confirmed.";

        $cinema_id = $_POST['cinema_id'];
        $film_id = $_POST['film_id'];
        $place_id = $_POST['place_id'];
        $show_date = $_POST['show_date'];

        if (isset($place_id)){
            Cinema::setBookingById($cinema_id,$film_id,$place_id,$show_date);
        }
            $confirm_result .= '
                <div align="center" class="alert alert-success" role="alert">
                    Booking confirmed.
                </div>
            ';

        $output = array(
            'confirm_result' => $confirm_result,
        );
        echo json_encode($output);

        return true;
    }

}