<?php

//Definición de namespace para evitar la colisión de nombres
namespace controllers;

//Importar archivo de datos
require_once(dirname(__FILE__) . "/../data/data.php");

//Extraer la constante del namespace y asignarle un alias
use const AppData\BOOKS as BOOKS;

//Definición de la clase
class BooksController{

    //Definición de variables de instancia
    private $controllerName = "BooksController";

    //Constructor por omisión
    public function __construct(){}

    //Método de la clase para manejar la vista "index"
    public function index(){

        return [
            "books" => BOOKS,
            "pageName" => "index"
        ];

    }

}