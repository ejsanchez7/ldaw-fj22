@extends("layouts.main")

@section('pageTitle', "Comprar - " . $book->title)

{{-- Estilos personalizados --}}
@push('styles')

  <link rel="stylesheet" href="./css/index.css" />

@endpush

@section('mainContent')

    <h1 class="text-center" >Comprar Libro "{{ $book->title }}"</h1>

@endsection