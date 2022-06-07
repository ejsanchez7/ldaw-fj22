<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Language;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

//Excepciones de BD de laravel
use Illuminate\Database\QueryException;

//Clase para el manejo del storage (archivos) de laravel
use Illuminate\Support\Facades\Storage;

//Clase para construir un validador personalizado
use Illuminate\Support\Facades\Validator;


class BookController extends Controller{

    //Genera una instancia del validador para crear/actualizar libros
    private function buildValidator($data, $action = "create"){

        //Poner las reglas aparte para poder modificarlas previo a pasarlas al validador
        //https://laravel.com/docs/9.x/validation#available-validation-rules
        $rules = [
            "isbn" => ["bail", "required", "min:10", "max:13", "alpha_num"],
            "title" => ["bail", "required", "max:255"],
            "summary" => ["bail", "nullable"],
            "year" => ["bail", "required", "integer", "max:" . date("Y")],
            "edition" => ["bail", "required", "max:10"],
            "price" => ["bail", "required", "min:0", "max:99999", "numeric"],
            "cover" => ["bail", "required", "file", "image"],
            "publisher" => ["bail", "required", "exists:publishers,id"],
            "language" => ["bail", "required", "exists:publishers,id"]
        ];

        //Si es edición, hacer opcional la validación del archivo de portada
        if($action === "edit"){
            $rules["cover"] = ["bail", "nullable", "file", "image"];
        }
        else{
            //Si es modo creación, agregar el unique al isbn
            $rules["isbn"][] = "unique:books,isbn";
        }

        //https://laravel.com/docs/9.x/validation#manually-creating-validators
        $validator = Validator::make(
                $data, //Información a validar
                //Reglas a aplicar
                $rules,
                //Mensajes personalizados
                //https://laravel.com/docs/9.x/validation#manual-customizing-the-error-messages
                [
                    "required" => '":attribute" no puede estar vacío',
                    "isbn.min" => '":attribute" no puede ser menor a :min caracteres',
                    "isbn.max" => '":attribute" no puede ser mayor a :max caracteres',
                    "title.max" => '":attribute" no puede ser mayor a :max caracteres',
                    "edition.max" => '":attribute" no puede ser mayor a :max caracteres',
                    "min" => '":attribute" no puede ser menor a :min',
                    "max" => '":attribute" no puede ser mayor a :max',
                    "unique" => 'El valor de ":attribute" ya existe en el sistema',
                    "alpha_num" => '":attribute" debe ser alfanumérico',
                    "integer" => '":attribute" debe ser un número entero',
                    "numeric" => '":attribute" debe ser un número',
                    "image" => '":attribute" debe ser un archivo de imagen',
                    "exists" => '":attribute" debe existir en el sistema'
                ],
                //https://laravel.com/docs/9.x/validation#specifying-custom-attribute-values
                [
                    "title" => "Título",
                    "year" => "Año",
                    "edition" => "Edición",
                    "price" => "Precio",
                    "cover" => "Portada",
                    "publisher" => "Editorial",
                    "language" => "Idioma"
                ]
        );

        return $validator;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        
        $books = Book::orderBy("title", "asc")->get();

        return view("books.index", ["books" => $books]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        if(!auth()->user()->hasPrivilege("crear_libros")){
            return redirect("/");
        }
        
        $publishers = Publisher::getAll();
        $languages = Language::getAll();
        $authors = Author::getAll();
        $categories = Category::getAll();

        return view("books.create", [
            "publishers" => $publishers, 
            "languages" => $languages,
            "authors" => $authors,
            "categories" => $categories
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //dd($request->all());

        //Validar los datos

        //Método 1 (más simple): invocar el método validate en la petición
        // $request->validate([
        //     "isbn" =>
        //     "title" =>
        // ]);

        //Método 3 (más complejo): construir una clase Request personalizada que implemente los
        //métodos de validación. php artisan make:request

        //Método 2 (recomendado): generar una instancia del validador por medio de la clase Validator
        
        //Construir el validador
        $validator = $this->buildValidator($request->all());

        //Invocar el validador y verificar si falló
        if ($validator->fails()) {

            //dd($validator->errors());
            //https://laravel.com/docs/9.x/responses#redirecting-named-routes
            return redirect()->route("books.create")
                        //https://laravel.com/docs/9.x/validation#manually-creating-validators
                        ->withErrors($validator)
                        //https://laravel.com/docs/9.x/responses#redirecting-with-input
                        ->withInput();
            
        }

        //dd("valid");

        //Si los datos son válidos ejecutar el proceso

        //Procesamiento del archivo de portada
        //https://laravel.com/docs/9.x/filesystem#file-uploads

        //Generar un nombre único del archivo
        $fileName = $request->file("cover")->hashName();

        //Guardar el archivo en el storage
        $coverPath = $request->file("cover")->storeAs(
            "books_covers", //Directorio
            $fileName, //Nombre del archivo
            "public" //Disco donde se guardará (configurado en clonfig/filesystems.php)
        );

        try{

            //Guardar el libro
            $newBook = Book::create([
                "isbn" => $request->input("isbn"),
                "title" => $request->input("title"),
                "summary" => $request->input("summary"),
                "year" => $request->input("year"),
                "edition" => $request->input("edition"),
                "price" => $request->input("price"),
                "cover" => $fileName,
                "publisher_id" => $request->input("publisher"),
                "language_id" => $request->input("language")
            ]);

            //Autores
            //https://laravel.com/docs/9.x/eloquent-relationships#updating-many-to-many-relationships
            foreach($request->input("authors") as $authorId){

                $newBook->authors()->attach($authorId);

            }

            //Categorías
            // Igual que con autores
            foreach($request->input("category") as $categoryId){

                $newBook->categories()->attach($categoryId);

            }
        }
        catch(QueryException $ex){

            //Borrar el archivo (https://laravel.com/docs/9.x/filesystem#deleting-files) 
            Storage::disk('public')->delete($coverPath);

            //Algo salió mal, redirigir al catálogo de libros con mensaje de error
            //https://laravel.com/docs/9.x/responses#redirecting-named-routes
            return redirect()
                    ->route("books.index")
                    //https://laravel.com/docs/9.x/responses#redirecting-with-flashed-session-data
                    ->with("message", [
                        "type" => "error",
                        "text" => "Ha ocurrido un error al guardar el libro"
                    ]);

        }

       //Todo salió bien, redirigir al catálogo de libros
       //https://laravel.com/docs/9.x/responses#redirecting-named-routes
       return redirect()
                ->route("books.index")
                //https://laravel.com/docs/9.x/responses#redirecting-with-flashed-session-data
                ->with("message", [
                    "type" => "success",
                    "text" => "El libro se guardó exitosamente"
                ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book){
        
        return view("books.detail", ["book" => $book]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book){
        
        $publishers = Publisher::getAll();
        $languages = Language::getAll();
        $authors = Author::getAll();
        $categories = Category::getAll();

        return view("books.edit", [
            "book" => $book,
            "publishers" => $publishers, 
            "languages" => $languages,
            "authors" => $authors,
            "categories" => $categories
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book){
        
        //validar los datos
        //Construir el validador
        $validator = $this->buildValidator($request->all(), "edit");

        //Invocar el validador y verificar si falló
        if ($validator->fails()) {

            //dd($validator->errors());
            //https://laravel.com/docs/9.x/responses#redirecting-named-routes
            return redirect()->route("books.edit", ["book" => $book->id])
                        //https://laravel.com/docs/9.x/validation#manually-creating-validators
                        ->withErrors($validator)
                        //https://laravel.com/docs/9.x/responses#redirecting-with-input
                        ->withInput();
            
        }


        //Verificar si se mandó una nueva portada, borrar la anterior y guardar la nueva

        $fileName = null;
        $coverPath = null;

        //Verificar si viene el archivo en la petición
        //https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
        if($request->hasFile("cover")){

            //Borrar el archivo (https://laravel.com/docs/9.x/filesystem#deleting-files) 
            Storage::disk('public')->delete("books_covers/" . $book->cover);

            //Crear uno nuevo
            //Generar un nombre único del archivo
            $fileName = $request->file("cover")->hashName();

            //Guardar el archivo en el storage
            $coverPath = $request->file("cover")->storeAs(
                "books_covers", //Directorio
                $fileName, //Nombre del archivo
                "public" //Disco donde se guardará (configurado en clonfig/filesystems.php)
            );

        }

        //Actualizar el libro usando el modelo
        //https://laravel.com/docs/9.x/eloquent#updates
        $book->isbn = $request->input("isbn");
        $book->title = $request->input("title");
        //Para este caso, que puede ser nulo, se pasa como valor default el que ya tenía el libro
        $book->summary = $request->input("summary", $book->summary);
        $book->year = $request->input("year");
        $book->edition = $request->input("edition");
        $book->price = $request->input("price");
        //Se verificar si se guardó un nuevo archivo
        $book->cover = $fileName ? $fileName : $book->cover;
        $book->publisher_id = $request->input("publisher");
        $book->language_id = $request->input("language");

        //Actualizar los autores y categorías

        //Borrar las asociaciones con autores
        //https://laravel.com/docs/9.x/eloquent-relationships#attaching-detaching
        $book->authors()->detach();

        //Crear las asociaciones con los autores enviados
        $book->authors()->attach($request->input("authors"));

        //Borrar las asociaciones con categorías
        //https://laravel.com/docs/9.x/eloquent-relationships#attaching-detaching
        $book->categories()->detach();

        //Crear las asociaciones con las categorías enviadas
        $book->categories()->attach($request->input("category"));

        //Guardar el libro
        $book->save();

        //Todo salió bien, redirigir al catálogo de libros
        //https://laravel.com/docs/9.x/responses#redirecting-named-routes
        return redirect()
            ->route("books.show", ["book" => $book->id])
            //https://laravel.com/docs/9.x/responses#redirecting-with-flashed-session-data
            ->with("message", [
                "type" => "success",
                "text" => "El libro se actualizó exitosamente"
            ]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book){
        
        //Usando el query builder
        //https://laravel.com/docs/9.x/queries#delete-statements
        //Book::where("id", "=", $id)->delete();

        //Usando la instancia del modelo
        $book->delete();
        //https://laravel.com/docs/9.x/responses#redirecting-named-routes
        //https://laravel.com/docs/9.x/responses#redirecting-with-flashed-session-data
        return redirect()
                ->route('books.index')
                ->with('message', [
                    "type" => "success",
                    "text" => "El libro se borró exitosamente"
                ]);

    }
}
