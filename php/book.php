<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Detalle de Libro</title>

        <!--
        ***********************************
                        CSS
        ***********************************
        -->
           
        <!-- Partial con los estilos generales -->
        <?php require_once(dirname(__FILE__) . "/partials/styles.php"); ?>

        <!-- Page CSS -->
        <link rel="stylesheet" href="./css/book.css" />
            
    </head>

    <body>

        <!-- Partial del header -->
        <?php require_once(dirname(__FILE__) . "/partials/header.php"); ?>

        <!-- Partial de navegación principal -->
        <?php require_once(dirname(__FILE__) . "/partials/main_nav.php"); ?>

        <!-- Contenido principal -->
        <main class="container-fluid py-5 mb-5">

           <h2 class="mb-5">El Conde de Montecristo</h2>

           <div class="row mt-4">
               
            <div class="col-4 text-center">
                   <img 
                        src="./img/books_covers/conde_montecristo.jpg" 
                        alt="El Conde de Montecristo"
                        class="book-cover"
                    />

                    <h3 class="rounded-pill text-center py-3 mx-4 mt-4 price">$150.00</h3>

            </div>

            <div class="col">

                <p>
                    Una Novela Publicada tan solo veintitrés años después de la muerte de Napoleón y 
                    que es un éxito hasta nuestros días. ¿Quién mas podría levantarse de sus cenizas 
                    como lo hizo Edmundo Dantés, cuya misión es recuperar todo lo que le fue robado: 
                    Su prometida, su posición y su Honor?
                </p>

                <ul class="list-group list-group-flush details-list rounded-3 mt-4">
                    <li class="list-group-item">
                        <strong class="me-2">ISBN:</strong><span>9786071436252</span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Autor(es):</strong><span>Alejandro Dumas</span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Editorial:</strong><span>Editores Mexicanos Unidos</span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Año:</strong><span>2021</span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Edición:</strong><span>100a edición</span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Idioma:</strong><span>Español</span>
                    </li>
                </ul>

                <div class="keywords mt-5">
                    <span class="badge rounded-pill px-3 py-2 me-2">Novela</span>
                    <span class="badge rounded-pill px-3 py-2 me-2">Drama</span>
                    <span class="badge rounded-pill px-3 py-2 me-2">Clásicos</span>
                </div>

            </div>

           </div>

        </main>

        <!-- Partial del footer -->
        <?php require_once(dirname(__FILE__) . "/partials/footer.php"); ?>
        
    </body>

    <!--
    *******************************
            JAVASCRIPT
    *******************************
    -->

    <!-- Partial con los scripts generales -->
    <?php require_once(dirname(__FILE__) . "/partials/scripts.php"); ?>

</html>