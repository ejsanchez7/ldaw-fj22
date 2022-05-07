<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Clase Storage para el manejo del sistema de archivos
//https://laravel.com/docs/9.x/filesystem
use Illuminate\Support\Facades\Storage;

class Book extends Model{

    use HasFactory;

    //Si mi tabla se llamara libros, tendría que crear este atributo
    //https://laravel.com/docs/9.x/eloquent#table-names
    //protected $table = "libros";

    //Configuración de asociación N:N con autores
    //https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
    public function authors(){
        return $this->belongsToMany(Author::class, 'authors_books');
    }

    //Configurar la asociación N:1 con publishers
    //https://laravel.com/docs/9.x/eloquent-relationships#one-to-many-inverse
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    //Configurar la asociación N:1 con languages
    //https://laravel.com/docs/9.x/eloquent-relationships#one-to-many-inverse
    public function language(){
        return $this->belongsTo(Language::class);
    }

    //Configurar la asociación N:N con categories
    //https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
    public function categories(){
        return $this->belongsToMany(Category::class, 'books_categories');
    }

    //Genera la URL de la portada
    public function coverPath(){
        //https://laravel.com/docs/9.x/filesystem#file-urls
        return Storage::url('books_covers/' . $this->cover);
    
    }

    //Genera la URL de detalle de un libro
    public function detailUrl(){

        return route("books.show", ["book" => $this->id]);

    }

    //Devuelve el listado de autores separado por comas
    public function authorsNames(){
        return "";
    }

}
