@extends('layouts.main')

@section("pageTile", "Nuevo Libro")

@push('styles')

    {{-- Multiselect --}}
    <link rel="stylesheet" href="{{ url("js/multiselect/css/multi-select.css") }}" />

    {{-- Page CSS --}}
    <link rel="stylesheet" href="{{ url("css/newBook.css") }}" />
            
@endpush

@section("mainContent")

    <h2>Nuevo Libro</h2>

    @if(session('message'))

        @php
            $message = session('message');
            $msgClass = ($message["type"] === "success") ? "success" : "danger";
        @endphp

        <div class="alert alert-{{ $msgClass }}">
            {{ $message["text"] }}
        </div>
    
    @endif

    <form 
        action="{{ route("books.store") }}" 
        method="post" 
        enctype="multipart/form-data" 
        id="newBookForm" 
        class="mx-auto mt-sm-5"
    >

        @csrf

        <div class="form-group mb-3">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required />
        </div>

        <div class="form-group mb-3">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" required />
        </div>

        <div class="mb-3 w-50">
            <label for="cover" class="form-label">Portada</label>
            <input class="form-control" type="file" id="cover" name="cover" />
        </div>

        <div class="form-group mb-3">
            <label for="price">Precio</label>
            <input type="number" class="form-control w-25" id="price" name="price" step="0.1" required />
        </div>

        <div class="form-group mb-3">
            <label for="publisher">Editorial</label>
        
            <select class="form-select w-50" id="publisher" name="publisher" required>

                @foreach($publishers as $publisher)

                    <option value="{{ $publisher->id }}">
                        {{ $publisher->name }}
                    </option>
                
                @endforeach

            </select>
        
        </div>

        <div class="form-group mb-3">
            <label for="edition">Edición</label>
            <input type="text" class="form-control w-50" id="edition" name="edition" required />
        </div>

        <div class="form-group mb-3">
            <label for="year">Año</label>
            <input type="number" class="form-control w-25" id="year" name="year" step="1" required />
        </div>

        <div class="form-group mb-3">
            <label for="summary">Sinopsis</label>
            <textarea class="form-control" id="summary" name="summary" ></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="language">Idioma</label>
            <select class="form-select w-25" id="language" name="language" required>

                @foreach($languages as $lang)

                    <option value="{{ $lang->id }}">
                        {{ $lang->name }}
                    </option>
                
                @endforeach

            </select>
        </div>

        <div class="form-group mb-3">
            <label for="authors" class="mb-2">Autor(es)</label>

            <select multiple="multiple" id="authors" name="authors[]">
                
                @foreach($authors as $author)

                    <option value="{{ $author->id }}">
                        {{ $author->getLastFirst() }}
                    </option>

                @endforeach

            </select>

        </div>

        <div class="form-group mb-3">
            <label for="category">Categorías</label>

            <div class="mt-3 categories-list">
                
                @foreach($categories as $category)
                
                    <div class="form-check form-check-inline">
                        
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="category[{{ $category->id }}]" 
                            id="category_{{ $category->id }}" 
                            value="{{ $category->id }}" 
                        />

                        <label class="form-check-label" for="category_{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    
                    </div>

                @endforeach
                
            </div>
            
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

    </form>

@endsection

@push('scripts')

    {{-- Multiselect --}}
    <script src="{{ url("js/multiselect/js/jquery.multi-select.js") }}"></script>

    <script>
        //Configuración del multiselect
        $('#authors').multiSelect();
    </script>

@endpush