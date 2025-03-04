
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../config/app.php';
require_once './/..//../../autoload.php';
require_once 'inc/session_start.php';


                                                
    $controller = new \app\controllers\propiedadesController();
    // Obtenemos los tipos y estados de las propiedades
    $tipos = $controller->getTipos();
    $estados = $controller->getEstados();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-categorias.css">
    <title>Categorias</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <section class="main" id="main">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex justify-content-between">
                    <div class="col-md-6 text-left mi-clase-categoria-texto">
                        <h2 class="background-image"><strong>Categorias</strong></h2>
                    </div>
                </div>
            <div class="row align-items-stretch">
                <div class="col-md-6 d-flex flex-column img-container">
                    <a href="propiedades.php?categoria=Departamentos"> 
                        <img src="imagenes/categoria-departamento.png" alt="Imagen 1" class="img-fluid img-large flex-grow-1">
                    </a>
                    <p><strong>Departamentos</strong></p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 img-container">
                            <a href="propiedades.php?categoria=Casas"> 
                                <video src="imagenes/categoria-casas.mp4" alt="Video 2" class="img-fluid" autoplay loop muted></video>
                            </a>
                            <p><strong>Casas</strong></p>
                        </div>
                        <div class="col-md-6 img-container">
                            <a href="propiedades.php?categoria=Comercios"> 
                                <img src="imagenes/catagorias-comercio.png" alt="Imagen 3" class="img-fluid">
                            </a>
                            <p><strong>Comercios</strong></p>
                        </div>
                        <div class="col-md-6 img-container">
                            <a href="propiedades.php?categoria=Countries"> 
                                <img src="imagenes/categorias-countries.png" alt="Imagen 4" class="img-fluid">
                            </a>
                            <p><strong>Countries</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-md-4 d-flex flex-column img-container">
                    <a href="propiedades.php?categoria=Hoteles">  
                        <img src="imagenes/categorias-hoteles.png" alt="Imagen 5" class="img-fluid flex-grow-1">
                    </a> 
                    <p><strong>Hoteles</strong></p>
                </div>
                <div class="col-md-8 d-flex flex-column img-container">
                    <a href="propiedades.php?categoria=Residencias Universitarias"> 
                        <img src="imagenes/categorias-universitarias.png" alt="Imagen 6" class="img-fluid flex-grow-1">
                    </a> 
                    <p><strong>Residencias Universitarias</strong></p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-md-8 d-flex flex-column img-container">
                    <a href="propiedades.php?categoria=Almacenes"> 
                        <img src="imagenes/categorias-almacenes1.png" alt="Imagen 5" class="img-fluid flex-grow-1">
                    </a> 
                    <p><strong>Almacenes</strong></p>
                </div>
                <div class="col-md-4 d-flex flex-column img-container">
                    <a href="propiedades.php?categoria=Almacenes"> 
                        <img src="imagenes/categorias-almacenes2.png" alt="Imagen 6" class="img-fluid flex-grow-1">
                    </a> 
                    <p><strong>Almacenes</strong></p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-md-6 d-flex flex-column img-container">
                    <a href="propiedades.php?categoria=Casas de Verano"> 
                        <img src="imagenes/categoria-casa-verano.png" alt="Imagen 5" class="img-fluid flex-grow-1">
                    </a> 
                    <p><strong>Casas de Verano</strong></p>
                </div>
                <div class="col-md-6 d-flex flex-column img-container"> 
                    <a href="propiedades.php?categoria=Barrio Cerrado">
                        <img src="imagenes/categoria-barrio-cerrado.png" alt="Imagen 6" class="img-fluid flex-grow-1">
                    </a> 
                    <p><strong>Barrio Cerrado</strong></p>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>