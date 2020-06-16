<?php

namespace application\models;
use application\components\Db;
use application\components\Router;

class Cinema
{

    public static function getCategories(){
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

    public static function getPresents(){
        $cinemas_id = Router::getSegment('3');

        $current_date = date('Y-m-d');

        $db = Db::getConnection();

        if(isset($_POST['search-date'])){
            $addedDate = $_POST['from-date'];

            $result = $db->query("SELECT presents.* FROM presents
                LEFT JOIN cinemas ON presents.cinemas_id = cinemas.id
                WHERE cinemas_id = '$cinemas_id' AND show_date = '$addedDate'");

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

    public static function getPlaces($id){
        $db = Db::getConnection();
        $result = null;

        if ($id == 4){
            $result = $db->query("SELECT * FROM `places_le_brady`");
        }elseif ($id == 3){
            $result = $db->query("SELECT * FROM `places_prince`");
        }elseif ($id = 5){
            $result = $db->query("SELECT * FROM `places_cine_cite`");
        }elseif ($id = 6){
            $result = $db->query("SELECT * FROM `place_rome_cinema`");
        }else{
            null;
        }

        $i = 0;
        $places = array();
        while ($row = $result->fetch()) {
            $places[$i]['id'] = $row['id'];
            $places[$i]['status'] = $row['status'];
            $i++;
        }
        return $places;
    }

    public static function getCinemaId($id){
        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM cinemas WHERE id = $id");

        $i = 0;
        $id = array();
        while ($row = $result->fetch()) {
            $id[$i]['id'] = $row['id'];
            $i++;
        }

        return $id;
    }

    public static function bookById($id,$cinemaId){


//        $presentId = self::getPresentById($id);


        $create = Db::getConnection()->prepare("INSERT INTO `booking` (`cinema_id`,`status`) VALUES
                       ('$cinemaId','1')");
        $create->execute();
        return true;
    }

    public static function bookChangeStatus($id,$cinemaId){

        $update = null;

        if ($cinemaId == 4){
            $update = Db::getConnection()->prepare("UPDATE `places_le_brady` SET `status` = '2' where id = '$id';");
        }elseif ($cinemaId == 3){
            $update = Db::getConnection()->prepare("UPDATE `places_prince` SET `status` = '2' where id = '$id';");
        }elseif ($cinemaId == 5){
            $update = Db::getConnection()->prepare("UPDATE `places_cine_cite` SET `status` = '2' where id = '$id';");
        }elseif ($cinemaId == 6){
            $update = Db::getConnection()->prepare("UPDATE `place_rome_cinema` SET `status` = '2' where id = '$id';");
        }
        $update->execute();
        return true;
    }
}