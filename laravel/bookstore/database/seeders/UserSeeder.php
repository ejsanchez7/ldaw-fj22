<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase para la manipulación de la BD
use Illuminate\Support\Facades\DB;

//Clase de laravel para hashear el password
//https://laravel.com/docs/9.x/hashing
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table("users")->insert([
            "id" => 1,
            "name" => "Erik Sánchez",
            "email" => "ejsanchez@tec.mx",
            //El password debe estar hasheado para que funcione con el login
            //https://laravel.com/docs/9.x/hashing#hashing-passwords
            "password" => Hash::make("abc123")
        ]);

    }
}
