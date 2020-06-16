<?php
/**
 * Created by PhpStorm.
 * User: BrainFors
 * Date: 6/16/2020
 * Time: 4:34 PM
 */

namespace application\base;


class View
{

    public static function redirect($url){
        header('location: ' . $url);
        exit;
    }

}