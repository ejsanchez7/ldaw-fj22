


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Error</title>

        <!--
        ***********************************
                        CSS
        ***********************************
        -->

        <!-- Partial con los estilos generales -->
        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        
        <!--Main CSS-->
        <link rel="stylesheet" href="./css/main.css" />

        <!-- Page CSS -->
        <link rel="stylesheet" href="./css/index.css" />
            
    </head>

    <body>
        <!-- Partial del header -->
        <header class="container-fluid">
    <h1>Laboratorio de Desarrollo de Aplicaciones Web</h1>
</header>
        <!-- Partial de navegación principal -->
        <nav class="container-fluid navbar navbar-expand-md navbar-light position-sticky top-0">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand d-md-none" href="#">Menu</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item">
                <a class="nav-link py-3 px-4 active" href="./index.php">Catálogo</a>
            </li>
            <li class="nav-item dropdown">
                <a 
                    class="nav-link dropdown-toggle py-3 px-4" 
                    id="booksDropdown" 
                    href="#" 
                    role="button"
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                >
                    Libros
                </a>

                <ul class="dropdown-menu m-0 border-0" aria-labelledby="booksDropdown">
                    <li>
                        <a class="dropdown-item text-center text-md-start" href="./newBook.php">
                            Nuevo
                        </a>
                    </li>
                </ul>

            </li>
            <li class="nav-item dropdown">
                <a 
                    class="nav-link dropdown-toggle py-3 px-4" 
                    href="#"
                    id="authorsDropdown" 
                    href="#" 
                    role="button"
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                >
                    Autores
                </a>

                <ul class="dropdown-menu m-0 border-0" aria-labelledby="authorsDropdown">
                    <li>
                        <a class="dropdown-item text-center text-md-start" href="./authors.php">
                            Listado
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-center text-md-start" href="./newAuthor.php">Nuevo</a>
                    </li>
                </ul>

            </li>
        </ul>

    </div>

</nav>
        
        <!-- Contenido principal -->
        <main class="container-fluid py-5 mb-5">

            <div class="alert alert-danger">
                <?php echo($message); ?>
            </div>

        </main>

        <!-- Partial del footer -->
        <footer class="container-fluid position-fixed bottom-0">

    <p class="m-0">Erik Sánchez - LDAW Febrero - Junio 2022</p>

</footer>        
    </body>

    <!--
    *******************************
            JAVASCRIPT
    *******************************
    -->
    
    <!-- Partial con los scripts generales -->
    <!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</html>