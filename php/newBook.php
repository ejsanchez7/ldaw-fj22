<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Nuevo Libro</title>

        <!--
        ***********************************
                        CSS
        ***********************************
        -->
           
        <!-- Partial con los estilos generales -->
        <?php require_once(dirname(__FILE__) . "/partials/styles.php"); ?>

        <!-- Multiselect -->
        <link rel="stylesheet" href="./js/multiselect/css/multi-select.css" />

        <!-- Page CSS -->
        <link rel="stylesheet" href="./css/newBook.css" />
            
    </head>

    <body>

        <!-- Partial del header -->
        <?php require_once(dirname(__FILE__) . "/partials/header.php"); ?>

        <!-- Partial de navegación principal -->
        <?php require_once(dirname(__FILE__) . "/partials/main_nav.php"); ?>

        <!-- Contenido principal -->
        <main class="container-fluid py-5 mb-5">

            <h2>Nuevo Libro</h2>

            <form action="" method="post" id="newBookForm" class="mx-auto mt-sm-5">

                <div class="form-group mb-3">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required />
                </div>

                <div class="form-group mb-3">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required />
                </div>

                <div class="form-group mb-3">
                    <label for="publisher">Editorial</label>
                    <input type="text" class="form-control w-50" id="publisher" name="publisher" required />
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
                        <option value="1">Español</option>
                        <option value="2">Inglés</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="authors" class="mb-2">Autor(es)</label>

                    <select multiple="multiple" id="authors" name="authors[]">
                        <option value='1'>Asimov, Isaac</option>
                        <option value='2'>Dumas, Alexander</option>
                        <option value='3'>Hawthorne, Nathaniel</option>
                        <option value='4'>Verne, Julio</option>
                      </select>
                </div>

                <div class="form-group mb-3">
                    <label for="category">Categorías</label>

                    <div class="mt-3 categories-list">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="category[1]" id="category_1" value="1" />
                            <label class="form-check-label" for="category_1">Novela</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="category_2" type="checkbox" name="category[2]" value="2" />
                            <label class="form-check-label" for="category_2">Drama</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="category_3" type="checkbox" name="category[3]" value="3" />
                            <label class="form-check-label" for="category_3">Comedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="category_4" type="checkbox" name="category[4]" value="4" />
                            <label class="form-check-label" for="category_4">Clásicos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="category_5" type="checkbox" name="category[5]" value="5" />
                            <label class="form-check-label" for="category_5">Infantil</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="category_6" type="checkbox" name="category[6]" value="6" />
                            <label class="form-check-label" for="category_6">Teatro</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  id="category_7" type="checkbox" name="category[7]" value="7" />
                            <label class="form-check-label" for="category_7">Poesía</label>
                        </div>
                    </div>
                    
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

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

    <!-- Multiselect -->
    <script src="./js/multiselect/js/jquery.multi-select.js"></script>

    <script>
        //Configuración del multiselect
        $('#authors').multiSelect();
    </script>

</html>