<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase del query builder
//https://laravel.com/docs/9.x/queries
use Illuminate\Support\Facades\DB;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('authors')->insert([
            [
                'id' => 1,
                'first_name' => "Alejandro",
                "last_name" => "Dumas",
                "country_id" => 2
            ],
            [
                'id' => 2,
                'first_name' => "Nathaniel",
                "last_name" => "Hawthorne",
                "country_id" => 4
            ],
            [
                'id' => 3,
                'first_name' => "Patrick",
                "last_name" => "Süskind",
                "country_id" => 3
            ]
        ]);

    }
}
