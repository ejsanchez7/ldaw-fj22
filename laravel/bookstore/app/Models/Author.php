<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//https://laravel.com/docs/9.x/eloquent

class Author extends Model{
   
    use HasFactory;

    //Desactivar los timestamps (created_at y updated_at)
    public $timestamps = false;

    //Asociación con countries
    //(https://laravel.com/docs/9.x/eloquent-relationships#one-to-many-inverse)
    public function country(){

        return $this->belongsTo(Country::class);

    }

    //Devuelve todas las editoriales ordenadas por nombre
    public static function getAll(){

        return Author::orderBy("last_name", "asc")->get();

    }

    public function fullName(){

        return ($this->first_name . " " . $this->last_name);

    }

    //Devuelve el nombre del autor en formato Apellido, Nombre
    public function getLastFirst(){

        return ($this->last_name . ", " . $this->first_name);

    }

}
