<?php


namespace application\controllers\admin;


use application\base\AdminBaseController;
use application\base\View;
use application\components\Auth;
use application\models\Cinema;
use application\models\Film;

class PresentController extends AdminBaseController
{
    public function actionIndex(){
        if (Auth::isGuest()){
            View::redirect('/login');
        }

        $title = 'Films';
        $presents = Film::getPresents();

        $this->view->setTitle($title);
        $this->view->render('admin/present/index',[
            'presents' => $presents
        ]);
        return true;
    }

    public function actionCreate(){
        if (Auth::isGuest()){
            View::redirect('/login');
        }

        if (!empty($_POST) && isset($_POST['submit'])){
            $film_model = new Film($_POST);
            $validate = $film_model->validate();

            if (!empty($validate)){
                $this->view->render('admin/present/create',[
                    'validate' => $validate,
                ]);
            }
            if ($film_model->createFilm()){
                View::redirect('/admin/present');
            }
        }

        $cinemas = Cinema::getCinemas();
        $title = 'Create Films';

        $this->view->setTitle($title);
        $this->view->render('admin/present/create',[
            'cinemas' => $cinemas,
        ]);
        return true;
    }

    public function actionUpdate($id){
        if (Auth::isGuest()){
            View::redirect('/login');
        }

        $present = Film::getPresentById($id);
        $cinemas = Cinema::getCinemas();

        if (!empty($_POST) && isset($_POST['submit'])){
            $film_model = new Film($_POST);
            $validate = $film_model->validate();

            if (!empty($validate)){
                $this->view->render('admin/present/update',[
                    'validate' => $validate,
                    'present' => $present
                ]);
            }

            if ($film_model->updatePresent($id)){
                View::redirect('/admin/present');
            }
        }

        $title = 'Update Films';

        $this->view->setTitle($title);
        $this->view->render('admin/present/update',[
            'cinemas' => $cinemas,
            'present' => $present
        ]);
        return true;
    }

    public function actionDelete($id){
        Film::deleteFilm($id);
        View::redirect('/admin/present');
    }
}