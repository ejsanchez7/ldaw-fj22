<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('pageTitle')</title>

        {{--
        ***********************************
                        CSS
        ***********************************
        --}}
        
        {{--Bootstrap--}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        
        {{--Main CSS--}}
        <link rel="stylesheet" href="./css/main.css" />

        @stack('styles')
        
    </head>

    <body>
        
        {{-- Partial del header --}}
        @include('layouts.partials.header')

        {{-- Partial de navegación principal --}}
        @include('layouts.partials.navigation')
        
        {{-- Contenido principal --}}
        <main class="container-fluid py-5 mb-5">

            @yield("mainContent")
            
        </main>

        {{-- Partial del footer --}}
        @include('layouts.partials.footer')
        
    </body>

    {{--
    *******************************
            JAVASCRIPT
    *******************************
    --}}
    
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    @stack("scripts")

</html>