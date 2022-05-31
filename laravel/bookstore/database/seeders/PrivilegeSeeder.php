<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Clase para la manipulación de la BD
use Illuminate\Support\Facades\DB;


class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        //Listado de priviliegios
        DB::table('privileges')->insert([
            ["id" => 1, "name" => "crear_libros"],
            ["id" => 2, "name" => "editar_libros"],
            ["id" => 3, "name" => "borrar_libros"],
            ["id" => 4, "name" => "ver_autores"],
            ["id" => 5, "name" => "crear_autores"],
            ["id" => 6, "name" => "editar_autores"],
            ["id" => 7, "name" => "borrar_autores"],
            ["id" => 8, "name" => "ver_perfil"],
        ]);

        //Asociaciones priviliegios -> roles
        Db::table("privileges_roles")->insert([
            //Rol admin
            ["privilege_id" => 1, "role_id" => 1],
            ["privilege_id" => 2, "role_id" => 1],
            ["privilege_id" => 3, "role_id" => 1],
            ["privilege_id" => 4, "role_id" => 1],
            ["privilege_id" => 5, "role_id" => 1],
            ["privilege_id" => 6, "role_id" => 1],
            ["privilege_id" => 7, "role_id" => 1],
            ["privilege_id" => 8, "role_id" => 1],
            //Rol user
            ["privilege_id" => 8, "role_id" => 2],
        ]);

    }
}
