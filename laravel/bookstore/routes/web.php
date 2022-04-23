<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    ["id" => 2, "first_name" => "Alejandro", "last_name" => "Dumas", "country_id" => 3],
    ["id" => 1, "first_name" => "Nathaniel", "last_name" => "Hawthorne", "country_id" => 2],
    ["id" => 3, "first_name" => "Patrick", "last_name" => "Süskind", "country_id" => 1],
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

/*
El método "prefix" permite definir un prefijo para un conjunto de rutas determinado, va encadenado
al método "group" donde se definen las rutas que tendrán ese prefijo previo a la definición de su
patrón.
*/
Route::prefix('authors')->group(function(){

    //Index de autores (listado)
    Route::get("/", function(){

        //Consulta para obtener los autores

        /*
        El formato "authors.index" indica que la vista de nombre "index.blade.php" estará almacenada
        en el subdirectorio "authors" de "resources/views"
        */
        return view("authors.index", ["authors" => AUTHORS]);

    });

    /*
    Edición de autor
    -----------------
    Los parámetros en las rutas se definen con el "wildcard" {parameterName}. Una vez que la ruta es
    parseada, y los parámetros extraídos, se inyectan en la función controladora en el mismo orden
    en que fueron definidos (no es necesario que el nombre del parámetro de la función corresponda
    con el de la ruta)

    Si un parámetro es opcional se define como {parameterName?}, con un signo de interrogación al final
    */
    Route::get("/edit/{id}", function($id){

        $author = null;

        //Encontrar el autor
        foreach(AUTHORS as $a){

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

    })->whereNumber("id");//Verifica que el parámetro sea numérico

    /*
    Ruta que procesará el formulario de edición de autores

    Laravel usa inyección de dependencias, esto prácticamente indica que se puede pasar como
    parámetro un objeto de cualquier clase definida en el proyecto a una función y este objeto
    será creado automáticamente por laravel previamente para inyectar la instancia en la función.
    Para ello usa algo mágico llamado "reflexión".

    La clase Request es una clase de Laravel que se encarga de manejar las propiedades de la petición 
    enviada y los parámetros que viajan en ella, es una forma más poderosa y práctica de tener acceso
    a los datos enviados por get y post.

    En las rutas primero van las dependencias inyectadas y posteriormente los parámetros de la ruta en
    el mismo orden en el que se definieron.
    */
    Route::post("/edit/{id}", function(Request $request, $id){

        dump($id);
        dd($request->input("first_name"));

        //Procesar la edición
        //UPDATE WHERE id=$id

    });

});

//Crear autores



