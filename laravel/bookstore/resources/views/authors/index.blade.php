@extends('layouts.main')

@section('pageTitle', "Autores")
  
@section('mainContent')
    
    <h1 class="text-center mb-4">Autores</h1>

    <ul class="list-group">
        
        @forelse($authors as $author)

            <li class="list-group-item">
                {{ $author["first_name"] . " " . $author["last_name"] }}
            </li>

        @empty

            <div class="alert alert-warning">
                No se encontraron autores.
            </div>

        @endforelse

    </ul>

@endsection
