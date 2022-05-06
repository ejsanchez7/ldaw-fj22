<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase para la manipulación de la BD
use Illuminate\Support\Facades\DB;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table("countries")->insert([
            ['id' => 1, 'name' => "México"],
            ['id' => 2, 'name' => "Francia"],
            ['id' => 3, 'name' => "Alemania"],
            ['id' => 4, 'name' => "Estados Unidos"],
        ]);

    }
}
