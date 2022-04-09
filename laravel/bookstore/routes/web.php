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

Route::get('/', function () {
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

//Método devuelve una vista directamente sin pasar por el controller
Route::view("/about-us", "aboutUs");

