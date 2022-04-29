<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase para la manipulación de la BD
use Illuminate\Support\Facades\DB;


class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table("publishers")->insert([
            ['id' => 1, 'name' => "Editores Mexicanos Unidos"],
            ['id' => 2, 'name' => "Distribuciones Fontamara"],
            ['id' => 3, 'name' => "Booket México"],
        ]);

    }
}
