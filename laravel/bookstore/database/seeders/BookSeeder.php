<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase del query builder
//https://laravel.com/docs/9.x/queries
use Illuminate\Support\Facades\DB;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        DB::table('books')->insert([
            [
                'id' => 1,
                'isbn' => "9786071436252",
                "title" => "El Conde de Montecristo",
                "summary" => "Una Novela Publicada tan solo veintitrés años después de la muerte de Napoleón y que es un éxito hasta nuestros días. ¿Quién mas podría levantarse de sus cenizas como lo hizo Edmundo Dantés, cuya misión es recuperar todo lo que le fue robado: Su prometida, su posición y su Honor?",
                "year" => 2021,
                "edition" => "100a",
                "price" => 150,
                "cover" => "9786071436252.jpg",
                "publisher_id" => 1,
                "language_id" => 1
            ],
            [
                'id' => 2,
                'isbn' => "9786077362197",
                "title" => "La Letra Escarlata",
                "summary" => "En la ciudad puritana de Boston, una multitud se reúne en junio de 1642 para presenciar el castigo de Hester Prynne, una joven declarada culpable de adulterio y condenada a llevar una 'A' escarlata de adúltera en su vestido para su vergüenza.",
                "year" => 2016,
                "edition" => "2a",
                "price" => 191,
                "cover" => "letra_escarlata.png",
                "publisher_id" => 2,
                "language_id" => 1
            ],
        ]);

    }
}
