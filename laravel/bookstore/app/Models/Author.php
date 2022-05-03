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
    public function country(){

        return $this->belongsTo(Country::class);

    }

    public function fullName(){

        return ($this->first_name . " " . $this->last_name);

    }

}
