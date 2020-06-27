<?php


namespace application\models;


use application\components\Db;
use application\components\Router;
use application\components\Validator;

class Film
{
    public $selected_cinema;
    public $film_name;
    public $film_year;
    public $image;
    public $show_date;

    public function __construct($post)
    {
        if (!empty($post['selected_cinema'])){
            $this->selected_cinema = $post['selected_cinema'];
        }
        if (!empty($post['film_name'])){
            $this->film_name = $post['film_name'];
        }
        if (!empty($post['film_year'])){
            $this->film_year = $post['film_year'];
        }
        if (!empty($post['show_date'])){
            $this->show_date = $post['show_date'];
        }
    }

    public function rules()
    {
        return [
            'required' => [
                'selected_cinema' => $this->selected_cinema,
                'film_name' => $this->film_name,
                'film_year' => $this->film_year,
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

    public static function getPresentById($id){

        $db = Db::getConnection();

        $sql = 'SELECT * FROM presents WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
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

    public function createFilm(){

        if(isset($_FILES) && $_FILES['film_image']['tmp_name'] != '' && $_FILES['film_image']['name'] != ''){

            $this->image = $_FILES['film_image']['name'];
            $fileTmpName = $_FILES['film_image']['tmp_name'];

            $this->dest = 'assets/images/'.$this->image;
            move_uploaded_file($fileTmpName,$this->dest);
        }else{
            $this->image = 'noimage.png';
        }

        if ($this->validate() == []){

            $create = Db::getConnection()->prepare("INSERT INTO presents (cinemas_id,film_name,film_year,image,show_date) VALUES 
                                ('$this->selected_cinema','$this->film_name','$this->film_year','$this->image','$this->show_date')");
            $create->execute();
            return true;
        }
        return false;

    }

    public function updatePresent($id){
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
                "UPDATE `presents` SET `cinemas_id` = '$this->selected_cinema', `film_name` = '$this->film_name', `film_year` = '$this->film_year', `image` = '$this->image', `show_date` = '$this->show_date' WHERE `presents`.`id` = '$id';");
            $update->execute();
            return true;
        }
        return false;
    }

    public static function deleteFilm($id){
        $db = Db::getConnection();

        $sql = 'DELETE FROM presents WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

}