<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase del query builder
//https://laravel.com/docs/9.x/queries
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('categories')->insert([
            ['id' => 1, 'name' => "Novela"],
            ['id' => 2, 'name' => "Suspenso"],
            ['id' => 3, 'name' => "Drama"],
            ['id' => 4, 'name' => "Clásicos"],
        ]);

    }
}
