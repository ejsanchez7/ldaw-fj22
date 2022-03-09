<?php

//Definición de namespace para evitar la colisión de nombres
namespace controllers;

//Importar el modelo
require_once(dirname(__FILE__) . "/../models/Book.class.php");

//Extraer la clase Book
use models\Book as Book;


//Definición de la clase
class BooksController{

    //Definición de variables de instancia
    private $controllerName = "BooksController";

    //Constructor por omisión
    public function __construct(){}

    //Método de la clase para manejar la vista "index"
    public function index(){

        $books = Book::getBooks();

        return [
            "books" => $books,
            "pageName" => "index"
        ];

    }

}