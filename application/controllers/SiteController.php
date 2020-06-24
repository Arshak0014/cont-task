<?php

namespace application\controllers;
use application\base\BaseController;


class SiteController extends BaseController
{

    public function actionIndex(){
        $this->view->render('site/index');
        return true;
    }

    public function actionTest(){

        echo 'Пример 1 - передача завершилась успешно';
        return true;
    }


    public function actionAbout(){
        $this->view->render('site/about');
        return true;
    }

    public function actionContact(){
        $this->view->render('site/contact');
        return true;
    }

}