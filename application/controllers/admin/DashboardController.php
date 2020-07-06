<?php

namespace application\controllers\admin;

use application\base\AdminBaseController;
use application\base\View;
use application\components\Auth;

class DashboardController extends AdminBaseController
{
    public function actionIndex(){

        if (Auth::isGuest()){
            View::redirect('/login');
        }

        $title = 'Dashboard';
        $this->view->setTitle($title);
        $this->view->render('admin/dashboard/index');
        return true;
    }

}