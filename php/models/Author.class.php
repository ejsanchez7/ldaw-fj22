<?php

namespace models;


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


    /***************************
    Métodos de tabla (estáticos)
    ****************************/


}