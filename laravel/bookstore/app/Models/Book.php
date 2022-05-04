<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    //Genera la URL de la portada
    public function coverPath(){
        return "";
    }

    //Genera la URL de detalle de un libro
    public function detailUrl(){

        return route("books.show", ["book" => $this->id]);

    }

}
