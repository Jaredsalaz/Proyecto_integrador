
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../config/app.php';
require_once './/..//../../autoload.php';
require_once 'inc/session_start.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Bootstrap CSS -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Custom -->
    <link rel="stylesheet" href="CSS/estilo-propiedades.css">
    <title>Propiedades</title>
</head>
<body>
    <?php include 'header.php'; ?>

     <!-- Cuerpo -->
    <section class="main my-5" id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-xl-3">
                    <div class="contenedor-filtros d-none d-xl-block">
                        <!-- Tarjeta de Filtros -->
                        <div class="card mb-5" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">B&uacute;squeda</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Agregue filtros para una b&uacute;squeda m&aacute;s exacta:</h6>
                                <hr>
                                <div class="accordion" id="filterAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTarea">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTarea" aria-expanded="false" aria-controls="collapseTarea">
                                                <h5>Tarea</h5>
                                            </button>
                                        </h2>
                                        <div id="collapseTarea" class="accordion-collapse collapse" aria-labelledby="headingTarea" data-bs-parent="#filterAccordion">
                                            <div class="accordion-body">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="tareaCheckbox1" value="option1">
                                                    <label class="form-check-label" for="tareaCheckbox1">Alquiler</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="tareaCheckbox2" value="option2">
                                                    <label class="form-check-label" for="tareaCheckbox2">Vender</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="tareaCheckbox3" value="option3">
                                                    <label class="form-check-label" for="tareaCheckbox3">Comprar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="accordion" id="filterAccordion-2">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTipoInmueble">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTipoInmueble" aria-expanded="false" aria-controls="collapseTipoInmueble">
                                                <h5>Tipo de Inmueble</h5>
                                            </button>
                                        </h2>
                                        <div id="collapseTipoInmueble" class="accordion-collapse collapse" aria-labelledby="headingTipoInmueble" data-bs-parent="#filterAccordion-2">
                                            <div class="accordion-body">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Departamentos
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                                    <label class="form-check-label" for="defaultCheck2">
                                                        Casas
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                                    <label class="form-check-label" for="defaultCheck3">
                                                        Oficinas
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                                    <label class="form-check-label" for="defaultCheck4">
                                                        Comercios
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="accordion" id="filterAccordion-3"> 
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPresupuesto">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePresupuesto" aria-expanded="false" aria-controls="collapsePresupuesto">
                                                <h5>Presupuesto</h5>
                                            </button>
                                        </h2>
                                        <div id="collapsePresupuesto" class="accordion-collapse collapse" aria-labelledby="headingPresupuesto" data-bs-parent="#filterAccordion-3">
                                            <div class="accordion-body">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    <label class="form-check-label" for="inlineRadio1">Pesos</label>
                                                </div>  
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">Dólares</label>
                                                </div>
                                                <form class="mt-3">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Minimo">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" placeholder="Maximo">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <form class="mt-3 custom">
                                    <h5 class="card-title">Caracteristicas</h5>
                                    <br>
                                    <div class="row">
                                        <div class="col">                                      
                                            <div class="input-group">
                                                <input id="ambientes" type="text" required>
                                                <label for="ambientes">   Ambientes</label>
                                            </div>
                                        </div>
                                        -
                                        <div class="col">
                                            
                                            <div class="input-group">
                                                <input id="dormitorios" type="text" required>
                                                <label for="dormitorios">Dormitorios</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">                                          
                                            <div class="input-group">
                                                <input id="baños" type="text" required>
                                                <label for="baños">Baños</label>
                                            </div>
                                        </div>
                                            -
                                        <div class="col">
                                            <div class="input-group">
                                                <input id="cochera" type="text" required>
                                                <label for="cochera">Cochera</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button class="filtros-button-pc">Aplicar filtros</button>
                                </form>
                            </div>
                        </div>
                        <!------------------------> 
                    </div>
                </div>

                <div class="col-12 col-xl-9">
                    <form class="form-inline mb-5">
                        <input class="form-control w-custom mr-sm-1" type="search"
                            placeholder="Buscar por departamento o ciudad" aria-label="Search">
                        <button class="btn btn-outline-success my-2" type="submit"><i
                                class="fas fa-search"></i></button>
                    </form>

                    <div class="container-fluid mb-5 d-block d-xl-none">
                        <button class="w-100 text-center btn btn-success" data-bs-toggle="collapse" data-bs-target="#filtrosCollapse">
                            <i class="fas fa-chevron-down"></i> &nbsp; Filtros &nbsp; <i class="fas fa-chevron-down"></i>
                        </button>
            
                        <div class="collapse" id="filtrosCollapse">
                            <div class="card mb-5" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">B&uacute;squeda</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Agregue filtros para una b&uacute;squeda m&aacute;s exacta:</h6>
                                    <hr>
                                    <div class="accordion" id="filterAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTarea">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTarea" aria-expanded="false" aria-controls="collapseTarea">
                                                    <h5>Tarea</h5>
                                                </button>
                                            </h2>
                                            <div id="collapseTarea" class="accordion-collapse collapse" aria-labelledby="headingTarea" data-bs-parent="#filterAccordion">
                                                <div class="accordion-body">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="tareaCheckbox1" value="option1">
                                                        <label class="form-check-label" for="tareaCheckbox1">Alquiler</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="tareaCheckbox2" value="option2">
                                                        <label class="form-check-label" for="tareaCheckbox2">Vender</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" id="tareaCheckbox3" value="option3">
                                                        <label class="form-check-label" for="tareaCheckbox3">Comprar</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="accordion" id="filterAccordion-2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTipoInmueble">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTipoInmueble" aria-expanded="false" aria-controls="collapseTipoInmueble">
                                                    <h5>Tipo de Inmueble</h5>
                                                </button>
                                            </h2>
                                            <div id="collapseTipoInmueble" class="accordion-collapse collapse" aria-labelledby="headingTipoInmueble" data-bs-parent="#filterAccordion-2">
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">
                                                            Departamentos
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                                        <label class="form-check-label" for="defaultCheck2">
                                                            Casas
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                                        <label class="form-check-label" for="defaultCheck3">
                                                            Oficinas
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                                        <label class="form-check-label" for="defaultCheck4">
                                                            Comercios
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="accordion" id="filterAccordion-3"> 
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingPresupuesto">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePresupuesto" aria-expanded="false" aria-controls="collapsePresupuesto">
                                                    <h5>Presupuesto</h5>
                                                </button>
                                            </h2>
                                            <div id="collapsePresupuesto" class="accordion-collapse collapse" aria-labelledby="headingPresupuesto" data-bs-parent="#filterAccordion-3">
                                                <div class="accordion-body">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">Pesos</label>
                                                    </div>  
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">Dólares</label>
                                                    </div>
                                                    <form class="mt-3">
                                                        <div class="row">
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="Minimo">
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" class="form-control" placeholder="Maximo">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <form class="mt-3 custom">
                                        <h5 class="card-title">Caracteristicas</h5>
                                        <br>
                                        <div class="row">
                                            <div class="col">                                      
                                                <div class="input-group">
                                                    <input id="ambientes" type="text" required>
                                                    <label for="ambientes">   Ambientes</label>
                                                </div>
                                            </div>
                                            -
                                            <div class="col">
                                                
                                                <div class="input-group">
                                                    <input id="dormitorios" type="text" required>
                                                    <label for="dormitorios">Dormitorios</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">                                          
                                                <div class="input-group">
                                                    <input id="baños" type="text" required>
                                                    <label for="baños">Baños</label>
                                                </div>
                                            </div>
                                                -
                                            <div class="col">
                                                <div class="input-group">
                                                    <input id="cochera" type="text" required>
                                                    <label for="cochera">Cochera</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="filtros-button-pc">Aplicar filtros</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        // Importamos el espacio de nombres del controlador
                        use app\controllers\propiedadesController;

                        // Instanciamos la clase propiedadesController
                        $controlador = new propiedadesController();

                        // Llamamos a la función getPropiedades
                        $propiedades = $controlador->getPropiedades();

                        echo '<div class="container">';
                        $carouselId = 0; // Inicializa $carouselId antes del bucle
                        foreach ($propiedades as $propiedad) {
                            if ($carouselId % 3 == 0) {
                                echo '<div class="row">';
                            }
                            echo '<div class="col-md-4">';
                            echo '<div class="card">';
                            echo '<div id="carouselExampleIndicators' . $carouselId . '" class="carousel slide image_container" data-bs-ride="carousel">';
                            echo '<div class="carousel-inner">';
                            echo '<div class="carousel-item active">';
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($propiedad['url_foto_principal']) . '" class="d-block w-100" alt="Imagen principal">';
                            echo '</div>';

                            // Aquí puedes agregar las imágenes de la galería
                            for ($i = 1; $i <= 10; $i++) {
                                if (!empty($propiedad['foto_galeria_' . $i])) {
                                    echo '<div class="carousel-item">';
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($propiedad['foto_galeria_' . $i]) . '" class="d-block w-100" alt="Imagen de galería ' . $i . '">';
                                    echo '</div>';
                                }
                            }

                            echo '</div>';
                            echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators' . $carouselId . '" data-bs-slide="prev">';
                            echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                            echo '<span class="visually-hidden">Previous</span>';
                            echo '</button>';
                            echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators' . $carouselId . '" data-bs-slide="next">';
                            echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                            echo '<span class="visually-hidden">Next</span>';
                            echo '</button>';
                            echo '</div>';

                            echo '<div class="title">';
                            echo '<span>' . $propiedad['titulo'] . '</span>';
                            echo '</div>';
                            echo '<div class="location">';
                            echo '<span>' . $propiedad['ubicacion'] . '</span><br>';
                            echo '<span>' . $propiedad['nombre_ciudad'] . ', ' . $propiedad['nombre_pais'] . '</span>';
                            echo '</div>';
                            echo '<div class="status">';
                            echo '<span>Estado: ' . $propiedad['estado'] . '</span>';
                            echo '</div>';
                            echo '<div class="price">';
                            echo '<span>Precio: $' . $propiedad['precio'] . '</span>';
                            echo '</div>';
                            echo '<div class="action">';
                            echo '<button class="details-button">';
                            echo '<span>Ver detalles</span>';
                            echo '</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';

                            if ($carouselId % 3 == 2) {
                                echo '</div>'; // Cierra el div de la fila
                                echo '<br>'; // Agrega un salto de línea
                            }

                            echo '<script>';
                            echo '$(document).ready(function() {';
                            echo '$("#carouselExampleIndicators' . $carouselId . '").carousel();';
                            echo '});';
                            echo '</script>';

                            $carouselId++; // Incrementa $carouselId en cada iteración del bucle
                        }
                        if ($carouselId % 3 != 0) {
                            echo '</div>'; // Cierra el último div de la fila si no se cerró en el bucle
                        }
                        echo '</div>';
                    ?>

                </div>    

                    
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <?php include 'footer.php'; ?>
    <script>
      $(document).ready(function() {
        $('.carousel').carousel();
      });
    </script>
</body>
</html>