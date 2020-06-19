<?php

namespace application\controllers;


use application\base\BaseController;
use application\base\View;
use application\components\Router;
use application\models\Cinema;

class CinemaController extends BaseController
{

    public function actionIndex(){

        $cinemas = Cinema::getCategories();
        $title = 'Cinemas List';

        $this->view->render('cinema/index',[
            'cinemas' => $cinemas,
            'title' => $title
        ]);
        return true;
    }

    public function actionDetails($id){

        $cinema = Cinema::getCinemaById($id);

        $presents = Cinema::getPresents();

        $this->view->render('cinema/details',[
            'cinema' => $cinema,
            'presents' => $presents,
        ]);
        return true;
    }

    public function actionPresents($id){

        $cinemaId = Router::getSegment(3);

        $places = Cinema::getPlaces($id);


        $id = Router::getSegment(4);

        $present = Cinema::getPresentById($id);

        $this->view->render('cinema/presents',[
            'present' => $present,
            'places' => $places,
            'cinemaId' => $cinemaId
        ]);
        return true;
    }

    public function actionBook($id){


        $placeId = Router::getSegment(5);
        $presentId = Router::getSegment(4);


        if (isset($_POST['submitShipConfirm'])){
            Cinema::bookById($id,$placeId,$presentId);

            Cinema::bookChangeStatus($id,$placeId,$presentId);

            View::redirect("/cinema/presents/$id/$presentId");
        }

        $this->view->render('cinema/book');
        return true;
    }

}