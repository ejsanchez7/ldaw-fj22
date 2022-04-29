<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase para la manipulación de la BD
use Illuminate\Support\Facades\DB;


class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table("books_categories")->insert([
            ["book_id" => 1, "category_id" => 4],
            ["book_id" => 1, "category_id" => 3],
            ["book_id" => 1, "category_id" => 1],
            ["book_id" => 2, "category_id" => 1],
            ["book_id" => 2, "category_id" => 2],
        ]);
    }
}
