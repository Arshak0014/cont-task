<?php

namespace application\controllers\admin;

use application\base\AdminBaseController;

class DashboardController extends AdminBaseController
{
    public function actionIndex(){
        $title = 'Dashboard';
        $this->view->setTitle($title);
        $this->view->render('admin/dashboard/index');
        return true;
    }

}