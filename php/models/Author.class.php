<?php

namespace models;


class Author{

    //Atributos de los objetos de la clase
    public $id;
    public $firstName;
    public $lastName;
    public $country;
    
    //Constructor
    public function __construct($array){
            
        //Setear sus valores
        $this->id = $array["id"];
        $this->firstName = $array["first_name"];
        $this->lastName = $array["last_name"];
        $this->country = $array["country"];

    }

    /****************************
        Métodos de instancia
    *****************************/


    /***************************
    Métodos de tabla (estáticos)
    ****************************/


}