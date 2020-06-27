<?php

namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\base\View;
use application\models\Cinema;

class CinemaController extends AdminBaseController
{
    public function actionIndex(){
        $title = 'Cinemas';
        $this->view->setTitle($title);

        $cinemas = Cinema::getCinemas();

        $this->view->render('admin/cinema/index',[
            'title' => $title,
            'cinemas' => $cinemas
        ]);
        return true;
    }
    public function actionCreate(){

        if (!empty($_POST) && isset($_POST['submit'])){
            $cinema_model = new Cinema($_POST);
            $validate = $cinema_model->validate();

            if (!empty($validate)){
                $this->view->render('admin/cinema/create',[
                    'validate' => $validate,
                ]);
            }
            if ($cinema_model->createCinema()){
                View::redirect('/admin/cinema');
            }
        }

        $title = 'Create Cinema';
        $this->view->setTitle($title);
        $this->view->render('admin/cinema/create');
        return true;
    }
    public function actionDelete($id){
        Cinema::deleteCinema($id);
        View::redirect('/admin/cinema');
    }

    public function actionUpdate($id){

        $cinemas = Cinema::getCinemaById($id);

        if (!empty($_POST) && isset($_POST['submit'])){
            $cinema_model = new Cinema($_POST);
            $validate = $cinema_model->validate();

            if (!empty($validate)){
                $this->view->render('admin/cinema/update',[
                    'validate' => $validate,
                    'cinemas' => $cinemas
                ]);
            }

            if ($cinema_model->updateCinema($id)){
                View::redirect('/admin/cinema');
            }
        }
        $title = 'Update Cinema';
        $this->view->setTitle($title);
        $this->view->render('admin/cinema/update',[
            'cinemas' => $cinemas
        ]);
        return true;
    }


}