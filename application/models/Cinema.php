<?php

namespace application\models;
use application\components\Db;
use application\components\Router;

class Cinema
{

    public static function getCinemas(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM cinemas");

        $i = 0;
        $cinemas = array();
        while ($row = $result->fetch()) {
            $cinemas[$i]['id'] = $row['id'];
            $cinemas[$i]['name'] = $row['name'];
            $cinemas[$i]['city'] = $row['city'];
            $cinemas[$i]['image'] = $row['image'];
            $cinemas[$i]['address'] = $row['address'];
            $i++;
        }

        return $cinemas;
    }

    public static function slugify($text)
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        $text = preg_replace('~[^-\w]+~', '', $text);

        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text);

        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function getCinemaById($id){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM cinemas WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function getPresents($search_val){
        $cinemas_id = Router::getSegment('3');

        $db = Db::getConnection();

        $result = $db->query("SELECT presents.* FROM presents
            LEFT JOIN cinemas ON presents.cinemas_id = cinemas.id
            WHERE cinemas_id = '$cinemas_id' AND show_date = '$search_val'");

        $i = 0;
        $presents = array();
        while ($row = $result->fetch()) {
            $presents[$i]['id'] = $row['id'];
            $presents[$i]['film_name'] = $row['film_name'];
            $presents[$i]['film_year'] = $row['film_year'];
            $presents[$i]['image'] = $row['image'];
            $presents[$i]['show_date'] = $row['show_date'];
            $i++;
        }
        return $presents;
    }

    public static function getTodayFilms(){
        $cinemas_id = Router::getSegment('3');
        $current_date = date('Y-m-d');

        $db = Db::getConnection();
        $result = $db->query("SELECT presents.* FROM presents
                LEFT JOIN cinemas ON presents.cinemas_id = cinemas.id
                WHERE cinemas_id = '$cinemas_id' AND show_date = '$current_date'");

        $i = 0;
        $presents = array();
        while ($row = $result->fetch()) {
            $presents[$i]['id'] = $row['id'];
            $presents[$i]['film_name'] = $row['film_name'];
            $presents[$i]['film_year'] = $row['film_year'];
            $presents[$i]['image'] = $row['image'];
            $presents[$i]['show_date'] = $row['show_date'];
            $i++;
        }
        return $presents;
    }

    public static function getPresentById($id){

        $db = Db::getConnection();

        $sql = 'SELECT * FROM presents WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function setBookingById($cinema_id,$film_id,$place_id,$show_date){
        $create = Db::getConnection()->prepare("INSERT INTO `booking` (`cinema_id`,`present_id`,`place_id`,`show_date`) 
                VALUES ('$cinema_id','$film_id','$place_id','$show_date')");
        $create->execute();

        return true;
    }

    public static function getOrders($cinema_id,$present_id){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM booking where cinema_id = '$cinema_id' AND present_id = '$present_id'");

        $i = 0;
        $bookings = array();
        while ($row = $result->fetch()) {
            $bookings[$i]['id'] = $row['id'];
            $bookings[$i]['cinema_id'] = $row['cinema_id'];
            $bookings[$i]['present_id'] = $row['present_id'];
            $bookings[$i]['place_id'] = $row['place_id'];
            $bookings[$i]['show_date'] = $row['show_date'];
            $i++;
        }

        return $bookings;
    }
}