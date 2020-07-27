<?php

namespace application\models;
use application\base\View;
use application\components\Db;
use application\components\Pagination;
use application\components\Router;
use application\components\Validator;

class Cinema
{
    private $cinema_name;
    private $cinema_description;
    private $cinema_city;
    private $cinema_address;
    private $image;
    private $cinema_places;

    public function __construct($post)
    {
        if (!empty($post['cinema_name'])){
            $this->cinema_name = $post['cinema_name'];
        }
        if (!empty($post['cinema_description'])){
            $this->cinema_description = $post['cinema_description'];
        }
        if (!empty($post['cinema_city'])){
            $this->cinema_city = $post['cinema_city'];
        }
        if (!empty($post['cinema_address'])){
            $this->cinema_address = $post['cinema_address'];
        }
        if (!empty($post['cinema_places'])){
            $this->cinema_places = $post['cinema_places'];
        }

    }

    public function rules()
    {
        return [
            'required' => [
                'cinema_name' => $this->cinema_name,
                'cinema_description' => $this->cinema_description,
                'cinema_city' => $this->cinema_city,
                'cinema_address' => $this->cinema_address,
                'cinema_places' => $this->cinema_places,
            ]
        ];
    }

    public function validate(){
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())){
            return $validator->validate();
        }
        return [];
    }

    public static function getCinemasForAdmin(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM cinemas ORDER BY id DESC");

        $i = 0;
        $cinemas = array();

        while ($row = $result->fetch()) {
            $cinemas[$i]['id'] = $row['id'];
            $cinemas[$i]['name'] = $row['name'];
            $cinemas[$i]['slug'] = $row['slug'];
            $cinemas[$i]['description'] = $row['description'];
            $cinemas[$i]['city'] = $row['city'];
            $cinemas[$i]['image'] = $row['image'];
            $cinemas[$i]['address'] = $row['address'];
            $i++;
        }

        return $cinemas;
    }

    public static function getCinemas(){
        $page = Router::getPage();
        $thisUri = $_SERVER['REQUEST_URI'];

        if ($thisUri ==  "/cinema"){
            View::redirect("/cinema/1");
        }

        $pagination = new Pagination('/cinema','cinemas','4','4');

        $limit = $pagination->limit;
        $res_per_page = $pagination->result_per_page;
        $this_page_first_result = ((int)$page - 1) * $res_per_page;

        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM cinemas ORDER BY id DESC LIMIT $this_page_first_result,$limit");

        $i = 0;
        $cinemas = array();

        while ($row = $result->fetch()) {
            $cinemas[$i]['id'] = $row['id'];
            $cinemas[$i]['name'] = $row['name'];
            $cinemas[$i]['slug'] = $row['slug'];
            $cinemas[$i]['description'] = $row['description'];
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
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM presents");

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

    public static function getPresentsSearch($search_val){
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
    // admin
    public $dest;
    public function createCinema(){

        $slug = Cinema::slugify($this->cinema_name);

        if(isset($_FILES) && $_FILES['cinema_image']['tmp_name'] != '' && $_FILES['cinema_image']['name'] != ''){

            $this->image = $_FILES['cinema_image']['name'];
            $fileTmpName = $_FILES['cinema_image']['tmp_name'];

            $this->dest = 'assets/images/'.$this->image;
            move_uploaded_file($fileTmpName,$this->dest);
        }else{
            $this->image = 'noimage.png';
        }

        if ($this->validate() == []){


            $create = Db::getConnection()->prepare("INSERT INTO cinemas (name,slug,description,city,address,image,places) VALUES 
                                ('$this->cinema_name','$slug','$this->cinema_description','$this->cinema_city','$this->cinema_address','$this->image','$this->cinema_places')");
            $create->execute();
            return true;
        }
        return false;
    }

    public static function deleteCinema($id){
        $db = Db::getConnection();

        $sql = 'DELETE FROM cinemas WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

    public function updateCinema($id){

        if(isset($_FILES) && $_FILES['cinema_image']['tmp_name'] != '' && $_FILES['cinema_image']['name'] != ''){

            $this->image = $_FILES['cinema_image']['name'];
            $fileTmpName = $_FILES['cinema_image']['tmp_name'];

            $this->dest = 'assets/images/'.$this->image;
            move_uploaded_file($fileTmpName,$this->dest);
        }else{
            $this->image = 'noimage.png';
        }


        if ($this->validate() == []){
            $update = Db::getConnection()->prepare(
                "UPDATE `cinemas` SET `name` = '$this->cinema_name', `description` = '$this->cinema_description', `city` = '$this->cinema_city', `address` = '$this->cinema_address',`image` = '$this->image',`places` = '$this->cinema_places' WHERE `cinemas`.`id` = '$id';");
            $update->execute();
            return true;
        }
        return false;

    }
}