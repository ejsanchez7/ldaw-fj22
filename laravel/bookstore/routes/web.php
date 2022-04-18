<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Simulación temporal de datos de autores
const AUTHORS = [
    ["id" => 1, "first_name" => "Alejandro", "last_name" => "Dumas"],
    ["id" => 2, "first_name" => "Nathaniel", "last_name" => "Hawthorne"],
    ["id" => 3, "first_name" => "Patrick", "last_name" => "Süskind"],
];

/*
La clase Route de laravel es la encargada de definir las rutas que se usarán en la apliación.
Entre otros métodos, cuenta con un método estático para cada posible acción de HTTP:
post, get, put, delete, patch, etc.
*/

/*
La ruta más básica de PHP recibe:
    + Un string con el path (relativo al dominio de la aplicación) con el que se hará match
    + Una función anónima (closure) que funcionará como controlador a ejecutarse al cargar la ruta
      en el navegador.
La función controladora debe devolver una respuesta que se mandará en el navegador (típicamente HTML)
*/
Route::get('/', function () {
    /*
    "view" es un método predefinido (helper) de Laravel que devuelve el contenido de una vista que debe
    estar almacenada en el directorio "resources/views".
    
    El patrón de nombre de las vistas es "{viewName}.blade.php, el string pasado como parámetro a la 
    función "view" corresponde a {viewName}.
    
    La extensión ".blade" se debe a que el "template engine" usado por laravel se llama "Blade".
    */
    return view('welcome');
});

//Ruta para "about-us"
// Route::get("/about-us", function(){
//     return "<h1>Acerca de nosotros</h1>";
// });

// //Laravel siempre toma la última ruta que haga match con la escrita en el navegador
// Route::get("/about-us", function(){
//     return view("aboutUs");
// });

/*
Cuando la función controladora no ejecutará ninguna lógica más que devolver una vista estática,
se puede usar como "atajo" el método estático "view" que funcionará como un get que hace un
return de una vista.
*/
Route::view("/about-us", "aboutUs");

