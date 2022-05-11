<?php

/*
Este es un controller creado con el comando:

    php artisan make:controller --resource AuthorController

https://laravel.com/docs/9.x/controllers#resource-controllers

Al incluir el parámetro "--resource" en su creación es denominado "resource controller".
Un resource controller es un controlador de Laravel que viene prellenado con las "firmas"
de los métodos necesarios para manejar el CRUD de algún recurso (tabla), de modo que
usa nombres estándares para los métodos y nos ayuda a definir una estructura estándar para
este tipo de controles.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importar el modelo de autores
use App\Models\Author;


class AuthorController extends Controller
{

    //Simulación temporal de datos de autores
    // private $authors = [
    //     ["id" => 2, "first_name" => "Alejandro", "last_name" => "Dumas", "country_id" => 3],
    //     ["id" => 1, "first_name" => "Nathaniel", "last_name" => "Hawthorne", "country_id" => 2],
    //     ["id" => 3, "first_name" => "Patrick", "last_name" => "Süskind", "country_id" => 1],
    // ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consulta para obtener los autores
        $authors = Author::all();

        //dd($authors);

        /*
        El formato "authors.index" indica que la vista de nombre "index.blade.php" estará almacenada
        en el subdirectorio "authors" de "resources/views"
        */
        return view("authors.index", ["authors" => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $author = null;

        //Encontrar el autor
        foreach($this->authors as $a){

            if($a["id"] === intval($id)){
                $author = $a;
            }

        }

        if(!empty($author)){
            /*
            Las vistas pueden recibir un segundo parámetro, a manera de arreglo, 
            con información a pasar a la vista. Los datos se extraen en variables
            en la vista automáticamente.
            */
            return view("authors.edit", [
                "author" => $author,
                "countries" => [
                    "1" => "Alemania",
                    "2" => "Estados Unidos",
                    "3" => "Francia",
                    "4" => "México",
                    "5" => "Noruega"
                ]
            ]);

        }
        else{
            return view("error", ["message" => "No se encontró el autor"]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        dump($id);
        dd($request->input("first_name"));

        //Procesar la edición
        //UPDATE WHERE id=$id
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Es posible añadir métodos adicionales al resource controller
    public function otherMethod(){
        echo "other method";
    }
}
