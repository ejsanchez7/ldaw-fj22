<?php

namespace models;

//Importar archivo de datos
require_once(dirname(__FILE__) . "/../data/data.php");

//Extraer la constante del namespace y asignarle un alias
use const AppData\BOOKS as BOOKS;


class Book{

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

    public function __construct(){}

    public function getAuthorsNames(){
        return implode(", ", $this->authors);
    }

    //Recuperar todos los libros (devuelve un arreglo de objetos Book)
    public static function getBooks(){
        
        $bookList = [];

        foreach(BOOKS as $isbn => $book){

            //Crear una instancia de Book
            $bookObj = new Book();
            //Setear sus valores
            $bookObj->isbn = $isbn;
            $bookObj->title = $book["title"];
            $bookObj->summary = $book["summary"];
            $bookObj->authors = $book["authors"];
            $bookObj->publisher = $book["publisher"];
            $bookObj->year = $book["year"];
            $bookObj->edition = $book["edition"];
            $bookObj->language = $book["language"];
            $bookObj->price = $book["price"];
            $bookObj->categories = $book["categories"];
            $bookObj->cover = $book["cover"];

            $bookList[] = $bookObj;
        }

        return $bookList;

    }

}



