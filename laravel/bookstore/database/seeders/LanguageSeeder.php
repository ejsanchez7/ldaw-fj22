<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase del query builder
//https://laravel.com/docs/9.x/queries
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('languages')->insert([
            ['id' => 1, 'name' => "Español"],
            ['id' => 2, 'name' => "Inglés"],
            ['id' => 3, 'name' => "Francés"],
        ]);

    }
}
