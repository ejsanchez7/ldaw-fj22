<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){

        //Permite invocar otros seeders en el orden en que aparecen
        $this->call([
            CategorySeeder::class,
            CountrySeeder::class,
            LanguageSeeder::class,
            PublisherSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            AuthorBookSeeder::class,
            BookCategorySeeder::class,
        ]);
    
    }
}
