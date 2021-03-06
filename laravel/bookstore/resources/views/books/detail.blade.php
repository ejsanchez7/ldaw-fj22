@extends('layouts.main')

@section("pageTitle", "Detalle de Libro")

@push('styles')
    
    {{-- Page CSS --}}
    <link rel="stylesheet" href="{{ url("css/book.css") }}" />

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

    <h2 class="mb-5"><?php echo($book->title); ?></h2>

    <div class="row mt-4">
        
        <div class="col-4 text-center">
            
            <img 
                src="{{ $book->coverPath() }}" 
                alt="El Conde de Montecristo"
                class="book-cover"
            />

            <h3 class="rounded-pill text-center py-3 mx-4 mt-4 price">
                ${{ $book->price }}
            </h3>

            @can("update", $book)

                <a
                    href="{{ route('books.edit', ['book' => $book->id]) }}"
                    class="btn btn-warning mt-3"
                >
                    Editar
                </a>

            @endcan

            @can("buy", App\Models\Book::class)
                <a
                    href="{{ route('books.buy', ['book' => $book->id]) }}"
                    class="btn btn-success mt-3 ms-3"
                >
                    Comprar
                </a>

            @endcan

        </div>

        <div class="col">

            <p>{{ $book->summary }}</p>

            <ul class="list-group list-group-flush details-list rounded-3 mt-4">
                <li class="list-group-item">
                    <strong class="me-2">ISBN:</strong>
                    <span>{{ $book->isbn }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="me-2">Autor(es):</strong>
                    <span>{{ $book->authorsNames() }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="me-2">Editorial:</strong>
                    <span>{{ $book->publisher->name }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="me-2">A??o:</strong>
                    <span>{{ $book->year }}</span>
                </li>
                <li class="list-group-item">
                    <strong class="me-2">Edici??n:</strong>
                    <span>{{ $book->edition }} edici??n</span>
                </li>
                <li class="list-group-item">
                    <strong class="me-2">Idioma:</strong>
                    <span>{{ $book->language->name }}</span>
                </li>
            </ul>

            <div class="keywords mt-5">

                @foreach($book->categories as $category)

                    <span class="badge rounded-pill px-3 py-2 me-2">
                        {{ $category->name }}
                    </span>

                @endforeach

            </div>

        </div>

    </div>

@endsection