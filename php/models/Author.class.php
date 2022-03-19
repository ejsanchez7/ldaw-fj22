<?php

namespace models;

require_once(dirname(__FILE__) . "/../utils/DB.class.php");

//Extraer la clase DB del namespace y asignarle un alias
use DB\DB as DB;

require(dirname(__FILE__) . "/../utils/utils.php");

use function utils\dump as dump;

class Author{

    //Atributos de los objetos de la clase
    public $id;
    public $firstName;
    public $lastName;
    public $country;
    
    //Constructor: recibe un arreglo con los datos del autor y lo mapea a los atributos de la clase
    public function __construct($array){
            
        //Setear sus valores
        $this->id = $array["id"];
        $this->firstName = $array["first_name"];
        $this->lastName = $array["last_name"];
        $this->country = $array["country_id"];

    }

    /****************************
        Métodos de instancia
    *****************************/

    //Devuelve el nombre completo del autor instanciado
    public function getFullName(){
        return $this->firstName . " " . $this->lastName;
    }

    //Devuelve el nombre en formato apellido, nombre
    public function getLastFirst(){
        return $this->lastName . ", " . $this->firstName;
    }


    /***************************
    Métodos de tabla (estáticos)
    ****************************/

    //Devuelve todos los autores ordenados por apellido
    public static function getAll(){

        $result = DB::getInstance()->query("SELECT * 
            FROM authors 
            ORDER BY last_name, first_name ASC"
        );

        $authors = [];

        foreach($result as $author){
            $authors[] = new Author($author);
        }

        return $authors;
    }

}