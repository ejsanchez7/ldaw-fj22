@extends('layouts.main')

@section("pageTitle", "Editar Autor")

@section("mainContent")

    <h1 class="text-center mb-4" >Editar Autor</h1>

    <form 
        {{--
        la función helper "url" genera una URL abosoluta calculando
        el dominio automáticamente.
        Recibe el path que irá después del dominio y, opcionalmente,
        un arreglo con los parámetros a pasar a la URL en el caso de
        que la ruta declarada el "/routes/web.php" se haya configurado
        para recibir parámetros.   
        --}}
        action="{{ url("authors/edit", ["id" => $author["id"]]) }}" 
        method="post" 
        id="newAuthorForm" 
        class="mx-auto mt-sm-5"
    >

        {{--
        Este es una directiva de blade que sirve para generar un token 
        CSRF para evitar ataques de este tipo
        --}}
        @csrf

        <div class="form-group mb-3">
            <label for="first_name">Nombre</label>
            <input 
                type="text" 
                class="form-control" 
                id="first_name" 
                name="first_name" 
                value="{{ $author['first_name'] }}"
                required 
            />
        </div>

        <div class="form-group mb-3">
            <label for="last_name">Apellido</label>
            <input 
                type="text" 
                class="form-control" 
                id="last_name" 
                name="last_name" 
                value="{{ $author['last_name'] }}"
                required 
            />
        </div>

        <div class="form-group mb-3">
            <label for="country">País</label>
        
            <select class="form-select w-50" id="country" name="country" required>

                @foreach($countries as $id => $country)

                    <option 
                        value="{{ $id }}"
                        {{-- 
                        la directiva @selected despliega el texto "selected" sí y solo
                        sí se cumple la condición que está dentro de ella
                        --}}
                        @selected($author["country_id"] === intval($id))
                    >
                        {{ $country }}
                    </option>

                @endforeach
               
            </select>
        
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

    </form>

@endsection