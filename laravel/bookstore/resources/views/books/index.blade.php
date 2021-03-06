@extends("layouts.main")

@section('pageTitle', "Catálogo de Libros")

{{-- Estilos personalizados --}}
@push('styles')

  <link rel="stylesheet" href="./css/index.css" />

@endpush

@section('mainContent')

    @if(session('message'))

        @php
            $message = session('message');
            $msgClass = ($message["type"] === "success") ? "success" : "danger";
        @endphp

        <div class="alert alert-{{ $msgClass }}">
            {{ $message["text"] }}
        </div>
    
    @endif

    <div class="card-group justify-content-center books-container">

        @forelse($books as $book)

            <div class="card mx-3 border-0 text-center my-3">

                <div class="card-header">
                    {{ $book->authors[0]->fullName() }}
                </div>

                <img 
                    src="{{ $book->coverPath() }}" 
                    class="card-img-top mt-2" 
                    alt="{{ $book->title }}"
                />

                <div class="card-body">
                    <h5 class="card-title">
                        {{ $book->title }}
                    </h5>
                    <p class="card-text">
                        ${{ $book->price }}
                    </p>
                </div>

                <div class="card-footer d-flex justify-content-center">
                    <a 
                        href="{{ $book->detailUrl() }}" 
                        class="btn btn-primary"
                        target="_blank"
                    >
                        Detalle
                    </a>

                    @can("delete", $book)

                        <form 
                            action="{{ route("books.destroy", ["book" => $book->id]) }}" 
                            method="POST" 
                            class="ms-3" 
                        >

                            @csrf
                            @method("DELETE")
                            {{-- <input type="hidden" value="DELETE" name="_method" /> --}}

                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        
                        </form>

                    @endcan

                </div>

            </div>

        @empty

            <div class="alert alert-warning">No se encontraron libros</div>

        @endforelse

    </div>

@endsection