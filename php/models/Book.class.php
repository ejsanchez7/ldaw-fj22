<?php

namespace models;

//Importar archivo de datos
require_once(dirname(__FILE__) . "/../data/data.php");

//Extraer la constante del namespace y asignarle un alias
use const AppData\BOOKS as BOOKS;

/*
El modelo (clase) Book tiene una función dual: 

+ por un lado una instancia de la clase representa a una 
  fila de la tabla "books" y sus métodos de clase a 
  operaciones que se harían sobre una instancia particular.
  
+ por el otro la clase Book, llamada de forma estática, 
  representa a la tabla y las operaciones que se pueden
  hacer en ella como un todo.
*/

class Book{

    //Atributos de los objetos de la clase

    public $isbn;
    public $title;
    public $summary;
    public $authors;
    public $publisher;
    public $year;
    public $edition;
    public $language;
    public $price;
    public $categories;
    public $cover;

    //Constructor (por omisión)
    public function __construct($array){
        //Setear sus valores
        //$this->id = $array["id"];
        $this->isbn = $array["isbn"];
        $this->title = $array["title"];
        $this->summary = $array["summary"];;
        $this->authors = $array["authors"];
        $this->publisher = $array["publisher"];
        $this->year = $array["year"];
        $this->edition = $array["edition"];
        $this->language = $array["language"];
        $this->price = $array["price"];
        $this->categories = $array["categories"];
        $this->cover = $array["cover"];
    }

    /****************************
        Métodos de instancia
    *****************************/

    public function getAuthorsNames(){
        return implode(", ", $this->authors);
    }


    /***************************
    Métodos de tabla (estáticos)
    ****************************/

    //Recuperar todos los libros (devuelve un arreglo de objetos Book)
    public static function getBooks(){
        
        $bookList = [];

        foreach(BOOKS as $isbn => $book){

            $book["isbn"] = $isbn;

            //Crear una instancia de Book
            $bookList[] = new Book($book);
        }

        return $bookList;

    }

}



