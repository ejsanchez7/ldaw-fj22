<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Language;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
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

        //Guardar el libro
        $newBook = Book::create([
            "isbn" => $request->input("isbn"),
            "title" => $request->input("title"),
            "summary" => $request->input("summary"),
            "year" => $request->input("year"),
            "edition" => $request->input("edition"),
            "price" => $request->input("price"),
            "cover" => "",//$request->input("cover"),
            "publisher_id" => $request->input("publisher"),
            "language_id" => $request->input("language")
        ]);

        // //Autores
        // foreach($request->input("authors") as $authorId){

        //      $book->authors() 

        // }

        // //Categorías

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
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
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
