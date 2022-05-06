<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase del query builder
//https://laravel.com/docs/9.x/queries
use Illuminate\Support\Facades\DB;


class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('authors_books')->insert([
            ['author_id' => 1, "book_id" => 1],
            ['author_id' => 2, "book_id" => 2],
        ]);

    }
}
