<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../../../config/app.php';
require_once './/..//../../autoload.php';
require_once 'inc/session_start.php';

$controller = new \app\controllers\detalleController();
$propiedad = $controller->detallePropiedad();

$controller = new \app\controllers\detalleController();
$datos = $controller->detallePropiedad();


$imagen_principal = isset($datos['imagen_principal']) ? $datos['imagen_principal'] : null;
$galeria = $datos['galeria'];
$dimensiones = $datos['dimensiones'];
$habitaciones = $datos['habitaciones'];
$banios = $datos['banios'];
$garage = $datos['garage'];
$precio = $datos['precio'];
$moneda = $datos['moneda'];
$estado = $datos['estado'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/detalle-propiedad.css">
    <title>Detalle</title>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="content">
        <section>

            <nav class="pt-4 pb-4" id="topNav">
                <div class="row">
                    
                    <div class="col-12">
                        <span class="mr-3 mt-3 float-right selectable flyerTopBtn"><img src="https://remax.com.mx/images/publico/2020-redesign/icon-compartir.svg" data-toggle="modal" data-target="#jsCompartirModal"></span>
                        <span class="mr-3 mt-3 float-right selectable flyerTopBtn jsFavorita" style="display: none;"><img src="https://remax.com.mx/images/publico/2020-redesign/icon-favorita-filled.png"></span>
                        <span class="mr-3 mt-3 float-right selectable flyerTopBtn jsDownloadBtn"><img src="https://remax.com.mx/images/publico/2020-redesign/icon-download.svg"></span>
                    </div>
                </div>
            </nav>
            
            <div class="d-flex anuncios w-100">
                <div class="col-md-6 p-1 propImage jsPropImage1" style="padding-bottom: 0px !important; padding-left:0px !important;">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($imagen_principal); ?>" id="galeria0" class="galeriaImg" style="width: 100%; position: relative; height: 100%; object-fit: cover;">
                </div>
                <div class="col-md-3 p-1">
                    <?php 
                    for ($i = 0; $i < 2; $i++) { 
                        if (!empty($galeria[$i])) {
                            echo '<div class="propImage jsPropImage' . ($i + 2) . '-3" style="padding-bottom: 0px !important;">';
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($galeria[$i]) . '" id="galeria' . ($i + 1) . '" class="pb-2 galeriaImg" style="width: 100%; height: 50%; object-fit: cover;">';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <?php 
                if (!empty($galeria[2])) {
                    echo '<div class="col-md-3 p-1 propImage jsPropImage4" style="padding-bottom: 0px !important;">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($galeria[2]) . '" id="galeria3" class="pb-2 galeriaImg" style="width: 100%; height: 100%; object-fit: cover;">';
                    echo '</div>';
                }
                ?>
                <button id="masFotos" class="rounded-pill btn-primary text-white jsMasFotos d-none d-md-block" style="position:absolute; right:20px; bottom:20px; width:235px;" data-toggle="modal" data-target="#jsGaleriaModal">Ver más fotos</button>
            </div>


            <div class="w-100 bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <div class="d-flex justify-content-center justify-content-md-start pt-1 pb-2" style="font-size:20px">
                                <div class="pt-3 ml-2 pr-3" style="border-right: 1px solid white !important;">
                                    <p class="text-white m-0 jsConstruccion jsConstruccionTop"><?php echo $propiedad['dimensiones']; ?> m2</p>
                                    <p class="text-white m-0 jsTerreno jsTerrenoTop d-none"><?php echo $propiedad['terreno']; ?> m2</p>
                                </div>
                                <div class="pt-3 ml-2 pr-3 jsBodegaShow d-none" style="border-right: 1px solid white !important;">
                                    <p class="text-white m-0 jsBodega"><?php echo $propiedad['bodega']; ?></p>
                                </div>
                                <div class="pt-1 ml-2 d-flex align-items-center jsBodegaHide">
                                    <span class="text-white m-0 jsCuartos"><?php echo $propiedad['habitaciones']; ?></span>
                                    <div class="ml-2 pb-1">
                                        <img src="https://remax.com.mx/images/publico/2020-redesign/cuartos-icon-white.svg" height="21px" width="35px">
                                    </div>
                                </div>
                                <div class="pt-1 ml-2 d-flex align-items-center jsBodegaHide">
                                    <span class="text-white m-0 jsBanos"><?php echo $propiedad['banios']; ?></span>
                                    <div class="ml-2 pb-1">
                                        <img src="https://remax.com.mx/images/publico/2020-redesign/banos-icon-white.svg" height="33px" width="31px">
                                    </div>
                                </div>
                                <div class="pt-1 ml-2 d-flex align-items-center jsBodegaHide">
                                    <span class="text-white m-0 jsEstacionamientos"><?php echo $propiedad['garage']; ?></span>
                                    <div class="ml-2 pb-1">
                                        <img src="https://remax.com.mx/images/publico/2020-redesign/estascionamiento-icon-white.svg" height="21px" width="38px">
                                    </div>
                                </div>
                                <div class="pt-3 ml-5 d-none d-md-block">          
                                    <p class="rounded-pill btn btn-primary text-white text-center jsVirtualBtn" style="padding: 1px 20px; width: 250px; border: 0.5px solid white !important; display: none;">Recorrido virtual <img src="https://remax.com.mx/images/publico/2020-redesign/icon-360.png"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-block d-md-none text-center">
                            <div class="pt-3">          
                                <p class="rounded-pill btn btn-primary text-white text-center jsMasFotos" style="border: 0.5px solid white !important; padding:1px 20px; width:250px;" data-toggle="modal" data-target="#jsGaleriaModal">Ver más fotos</p>
                            </div>
                        </div>
                        <div class="col-12 d-block d-md-none text-center">
                            <div class="pt-3">          
                                <p class="rounded-pill btn btn-primary text-white text-center jsVirtualBtn" style="padding: 1px 20px; width: 250px; border: 0.5px solid white !important; display: none;">Recorrido virtual <img src="https://remax.com.mx/images/publico/2020-redesign/icon-360.png"></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 text-center">
                            <div class="pt-3 pr-4">
                                <p class="text-white" style="font-size:21px"><span class="jsOperacion"><?php echo strtoupper($propiedad['estado']); ?></span> <span class="jsPrecio gotham-medium">$<?php echo $propiedad['precio']; ?></span> <span class="jsMoneda"><?php echo $propiedad['moneda']; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 order-2 order-lg-1 mt-5 pr-5" style="border-right: 0.7026335000991821px solid #949CA1;">
                        <h3 class="text-primary">
                            <span class="text-primary jsTipo">Inmueble</span> en <span class="text-primary jsOperacion"><?php echo $datos['estado']; ?></span>
                        </h3>
                        <div class="col pt-3 pl-0 text-dark-gray">
                            <p class="m-0">
                                <span class="jsUbicacion"><?php echo $datos['ubicacion']; ?></span> 
                            </p>
                            <p>
                                <span class="jsCiudad"><?php echo $datos['nombre_ciudad']; ?></span> 
                                <span class="jsPais"><?php echo $datos['nombre_pais']; ?></span> 
                            </p>
                        </div>
                        
                        <h3 class="text-primary pt-3">DESCRIPCIÓN</h3>
                        <p class="pt-2 text-dark-gray jsDescripcion"><?php echo $datos['descripcion']; ?></p>
                    </div>
                    <div class="col-12 col-lg-5 order-1 order-lg-2 mt-5 pl-3 pl-md-5">
                        <div id="jsAgenteInfoSection" class="">
                            <h3 class="text-primary text-center pb-3">CONTACTA AL ASESOR</h3>
                            <div class="d-flex justify-content-flex-start ">
                                <img class="jsAgenteImagen" src="https://cdn.remax.com.mx/agentes/1656531741.jpg" style="height:100px; width:100px ; border: 6px solid rgba(150, 157, 162,0.3); border-radius: 50%; object-fit: cover;">
                                <div class="col-8 text-center pl-0">
                                    <p class="text-primary fs-16 jsAgenteNombre"><?php echo $datos['nombre'] . ' ' . $datos['apellido']; ?></p>
                                    <p class="text-info" style="font-size:14px">Solicita información por</p>
                                    <div class="d-flex justify-content-around">
                                        <!-- TELEFONO DESKTOP -->
                                        <div class="d-none d-md-flex flex-column align-content-center pb-2 selectable" data-toggle="modal" data-target="#jsAgenteTelfonoModal">
                                            <img src="https://remax.com.mx/images/publico/2020-redesign/icon-telefono.png" style="width:50px;">
                                            <span class="text-info fs-12 pt-2"></span>
                                        </div>
                                        <!-- TELEFONO MOBILE -->
                                        <a class="d-flex d-md-none flex-column align-content-center pb-2" id="jsOficinaTelefonoMobile" href="tel:2222908877">
                                            <img src="https://remax.com.mx/images/publico/2020-redesign/icon-telefono.png" style="width:50px;">
                                            <span class="text-info fs-12 pt-2"></span>
                                        </a>
                                        <div class="d-none flex-column align-content-center pb-2 selectable jsAgenteCelularModalBtn" data-toggle="modal" data-target="#jsAgenteCelularModal">
                                            <img src="https://remax.com.mx/images/publico/2020-redesign/icon-telefono.png" style="width:50px;">
                                            <span class="text-info fs-12 pt-2"></span>
                                        </div>
                                        <div class="d-flex flex-column align-content-center pb-2 selectable" data-toggle="modal" data-target="#jsAgenteEmailModal">
                                            <img src="https://remax.com.mx/images/publico/2020-redesign/icon-email.png" style="width:50px;">
                                            <span class="text-info fs-12 pt-2"></span>
                                        </div>
                                        <div class="d-flex flex-column align-content-center pb-2 selectable jsWhatsapp" data-toggle="modal" data-target="#jsAgenteWhatsappModal">
                                            <img src="https://remax.com.mx/images/publico/2020-redesign/icon-whatsapp.png" style="width:50px;">
                                            <span class="text-info fs-12 pt-2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="w-100 btn btn-primary rounded-pill jsCalcular d-none d-md-block gotham-bold">Calcular Hipoteca</button>
                            <button class="w-100 btn btn-light-gray text-white rounded-pill mt-3 jsReunionVirtual d-none gotham-bold">Programar Reunión Virtual</button>
                            <div class="d-flex justify-content-center d-md-none gotham-bold">
                                <button class="w-50 btn btn-primary rounded-pill mr-1 jsCalcular">Calcular Hipoteca</button>
                                <button class="w-50 btn btn-light-gray text-white rounded-pill ml-1 jsReunionVirtual d-none">Programar Reunión Virtual</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="jsDetallesSection">
                    <div class="col-12 col-lg-6">
                        <h3 class="text-primary pt-3">DETALLES</h3>
                        <div class="row">
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-terreno.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Terreno</span> 
                                    <span class="text-primary jsTerreno"><?php echo $datos['dimensiones']; ?></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-estacionamiento.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Garage</span> 
                                    <div class="d-flex fs-12">
                                        <span class="text-primary jsEstacionamientos"><?php echo $datos['garage']; ?></span> <span class="text-primary ml-1 jsTipoEstacionamientos">Cubierto</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-conservacion.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Conservación</span> 
                                    <span class="text-primary jsConservacion">Buena</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-construccion.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Construcción</span> 
                                    <span class="text-primary jsConstruccion">128 m2</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-cuarto-servicio.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Cuarto Servicio</span> 
                                    <span class="text-primary jsCuartoServicio">No</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-edad.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Edad de Propiedad</span> 
                                    <span class="text-primary jsEdad">20 años</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-habitaciones.png" style="height:30px; width:30px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Habitaciones</span> 
                                    <span class="text-primary jsCuartos"><?php echo $datos['habitaciones']; ?></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-orientacion.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Orientación</span> 
                                    <span class="text-primary jsOrientacion">Oriente</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-uso-de-suelo.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Uso de Suelo</span> 
                                    <span class="text-primary jsUsoSuelo">Habitacional</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-banos.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Baños</span> 
                                    <span class="text-primary jsBanos"><?php echo $datos['banios']; ?></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-niveles.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Niveles/Piso</span> 
                                    <span class="text-primary jsNiveles"><?php echo $datos['pisos']; ?></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 d-flex align-items-center pt-2 pb-2">
                                <div class="mr-2">
                                    <img src="https://remax.com.mx/images/publico/2020-redesign/icon-mantenimiento.svg" style="height:36px; width:36px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="text-dark-gray fs-12">Mantenimiento</span> 
                                    <span class="text-primary jsMantenimiento">$0 MXN</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                
                
                
                <!-- Mapa -->
                <div class="row">
                    <div class="col-12 col-lg-7 pb-4 pt-3 jsMap">
                        <iframe class="w-100" frameborder="0" style="border:0; min-height: 450px;" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCa_x-67vlvtt8Eh7XQgTUbHplrSezOT7Q&amp;q=19.001,-98.2346" allowfullscreen=""></iframe>
                    </div>
                </div>
                
                
            </div>
    
        </section>

        <!-- Galeria Modal -->
        <div class="modal fade bd-example-modal-lg" id="jsGaleriaModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg w-100" style="margin: 0px; max-width: unset!important;">
                <div class="modal-content" style="background: #000;height: 100vh;">
                    <div class="modal-header" style="background:#000;color: white; border-bottom-color:#000;display: block;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;opacity: 1; font-size: 30px;"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"> <i class="fas fa-camera"></i> Galería</h4>
                    </div>
                    <section id="property-slider" style="display: flex;">
                        <div class="ocultafotos d-none d-md-block" style="margin-right:10px; background: red; background: #000; overflow-x: hidden;">
                        <div class="sliderThumbsContainer">
                            <?php 

                                $fotos = array_merge([$datos['imagen_principal']], $datos['galeria']);
                                foreach($fotos as $index => $foto) {
                                    if($foto != null && filter_var($foto, FILTER_VALIDATE_URL)) {
                                        echo '<div index="'.$index.'" class="jsJumpToImage sliderThumbContainer '.($index == 0 ? 'firstThumb' : '').' sliderThmb'.$index.'" id="#sliderThmb'.$index.'">';
                                        echo '<img clave="RDV606729-382" image="'.$foto.'" src="'.$foto.'">';
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </div>
                        </div>
                        <div class="fotos w-100">
                            <div class="sliderContainer">
                                <div class="sliderImageContainer">
                                    <div id="sliderImagen" style="background-image: url(&quot;https://cdn.remax.com.mx/properties/606473/2b8a65fd2ee689cb04a11a904a3ac444.jpg&quot;);"></div>
                                </div>
                                <span id="jsJumpToPrev" class="arrowLeft" style="background: rgba(255, 255, 255, 0);"><i class="fas fa-chevron-left sliderArrowIcon"></i></span>
                                <span id="jsJumpToNext" class="arrowRight" style="background: rgba(255, 255, 255, 0);" jq-id="nextImage"><i class="fas fa-chevron-right sliderArrowIcon"></i></span>
                            </div>
                            <div class="contadorima">
                                <i class="ion ion-camera"> <span jq-id="imageNum">1</span> de <span class="jsImageCount"><?php echo count($fotos); ?></span></i>
                            </div>
                        </div>
                    </section>
                    <div align="center">
                        <button type="button" data-dismiss="modal" class="btn btn-danger" style="border: 1px solid #ce0000!important; background-color: rgba(216, 0, 0, 0.91)!important; padding: 8px 12px; line-height: 1; border-radius: 6px; color: #fff; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.75);">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let currentImageIndex = 0;
            const images = <?php echo json_encode($fotos); ?>;
            
            function updateImage() {
                if (images[currentImageIndex] != null && images[currentImageIndex] != '') {
                    document.getElementById('sliderImagen').style.backgroundImage = 'url(' + images[currentImageIndex] + ')';
                    document.querySelector('[jq-id="imageNum"]').textContent = currentImageIndex + 1;
                }
            }
            
            document.getElementById('jsJumpToPrev').addEventListener('click', function() {
                if (currentImageIndex > 0) {
                    currentImageIndex--;
                    updateImage();
                }
            });
            
            document.getElementById('jsJumpToNext').addEventListener('click', function() {
                if (currentImageIndex < images.length - 1) {
                    currentImageIndex++;
                    updateImage();
                }
            });
            
            updateImage();
        </script>


        <!-- Recorrido Virtual Modal -->
        <div id="jsVirtualModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body jsVirtual">
                        <iframe class="w-100" style="height: 40vw;" src=""></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agente Telefono Modal -->
        <div id="jsAgenteTelfonoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <button style="z-index: 9999; position: absolute; right: 1rem;" type="button" class="close" data-dismiss="modal">×</button>
                        <div align="center" class="pull-right" style="text-align: -moz-center; position: relative; width: 100%;">
                            <div class="section-bar" style="text-align: -webkit-center;">
                                <div class="profile">
                                    <div class="profile__info">
                                        <div class="ase" align="center">
                                            <section id="property-contact-form">
                                                <img src="imagenes/logo_wayloa.jpg">
                                                <h4 class="jsOficinaNombre mb-3">Wayloa</h4>
                                                <h5 class="jsAgenteNombre"><?php echo $datos['nombre'] . ' ' . $datos['apellido']; ?></h5>
                                                <p><i class="fas fa-map-marker-alt"></i> <span class="jsOficinaAddress">Av. Central Ote. 956, San Roque<br> CP. 29066</span></p>
                                                <a class="jsOficinaTelefonoLink" href="tel:2222908877" style="color:white;">
                                                    <div class="btn btn-primary" style="width: 250px;"> 
                                                        <i class="fas fa-phone-alt" style="font-size: 20px;"></i> <span style="font-size: 19px;" class="jsAgenteTelefono"><?php echo $datos['telefono']; ?></span>
                                                    </div>
                                                </a>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Agente Email Modal -->
        <div id="jsAgenteEmailModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form id="contacto">
                                    <input type="hidden" id="flyerFlag" name="flyer_flag" value="1">
                                    <input type="hidden" name="agente_id" class="jsInputAgenteId" value="">
                                    <input type="hidden" name="oficina_email" class="jsInputOficinaEmail" value="remaxadvancepuebla@gmail.com">
                                    <input type="hidden" name="origen" value="1678">
                                    <input type="hidden" name="propiedad_id" class="jsInputPropiedadId" value="606473">
                                    <input type="hidden" name="titulo" class="jsInputTitulo" value="Casa en Renta Infonavit el Carmen Castillotla ">
                                    <input type="hidden" name="clave" class="jsInputClave" value="RCR606473-344">
                                    <input type="hidden" name="fecha_llamada" value="2024-05-09">
                                    <input type="hidden" name="tipo" class="jsInputTipo" value="1">
                                    <input type="hidden" name="oficina_id" class="jsInputOficinaId" value="344">
                                    <input type="hidden" name="opcion" class="jsInputOperacion" value="2">
                                    <input type="hidden" name="estado_nombre" class="jsInputEstadoNombre" value="Puebla">
                                    <input type="hidden" name="ciudad_nombre" class="jsInputCiudadNombre" value="Puebla (Heroica Puebla)">
                                    <input type="hidden" name="colonia_nombre" class="jsInputColoniaNombre" value="INFONAVIT El Carmen (Gastronómicos)">
                                    <input type="hidden" name="imagen" class="jsModalImagen" value="https://cdn.remax.com.mx/properties/606473/2b8a65fd2ee689cb04a11a904a3ac444.jpg">
                                    <input type="hidden" name="imagen2" class="jsModalImagen2" value="https://cdn.remax.com.mx/properties/606473/3f84d767662619e54bf7a1ad60d6e9e7.jpg">
                                    <input type="hidden" name="imagen3" class="jsModalImagen3" value="https://cdn.remax.com.mx/properties/606473/3126467d850cb3820886e9b738f7be07.jpg">
                                    <input type="hidden" name="imagen4" class="jsModalImagen4" value="https://cdn.remax.com.mx/properties/606473/673fc3f6aabbaf5c3685d2274a055df7.jpg">
                                    <div style="text-align: -webkit-left;">
                                        <span style="color: #636363;">Por favor ingresa tus datos para conectarte vía correo electrónico: </span>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <input placeholder="Nombre(s)" type="text" maxlength="40" class="form-control input-sm jsGenerarComentarioC" id="nombreContacto" name="cliente_nombre">        
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Apellido(s)" type="text" maxlength="40" class="form-control input-sm jsGenerarComentarioC" id="apellidoContacto" name="cliente_apellido">                
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon" style="background-color: #eeeeee54;"><i class="fas fa-envelope"></i></div>
                                            <input maxlength="70" class="form-control input-sm jsGenerarComentarioC" name="email" type="email" id="email" data-validation="email" value="" placeholder="Ingresa el correo electronico">   
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon" style="background-color: #eeeeee54;"><i class="fas fa-phone-alt"></i></div>
                                            <input placeholder="Numero telefonico (Ultimos 10 digitos)" type="tel" maxlength="10" class="form-control input-sm jsGenerarComentarioC" id="phone" name="telefono">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control jsGenerarComentarioC" rows="3" style="color: #595959;font-size: 13px;" id="message" name="comentarios">Estoy interesado... </textarea>
                                        <input class="form-control" type="hidden" id="resC" name="resC">
                                    </div>
                                    <div class="form-group col-sm-6 col-xs-12 float-right">
                                        <div id="enviarContactoCorreo" class="btn btn-success btn-block jsContactarAgenteCorreo" style=" background: #2461da; text-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);    border: 0;    color: #fff;    border-radius: 20px;    -ms-user-select: none;    user-select: none;    -webkit-appearance: none;    display: inline-block;    padding: 0 20px;    line-height: 30px;    font-size: 16px;      width: 100%!important;  font-weight: 400;    cursor: pointer;    border-radius: 8px;    text-align: center;    color: #fff;    margin-bottom: 10px;">Enviar</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agente Whatsapp Modal -->
        <div id="jsAgenteWhatsappModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <div id="formWhatsapp" align="center" class="pull-right" style="text-align: -moz-center; position: relative; width: 100%;">
                            <div class="section-bar" style="text-align: -webkit-center;">
                                <div class="profile">
                                    <div class="profile__info">
                                        <div class="ase" align="center">
                                            <section id="property-contact-form">
                                                <div class="" style="text-align: -webkit-left;">
                                                    <span style="color: #636363;">Por favor ingresa tus datos para conectarte vía whatsapp:</span>
                                                    <br><br>
                                                </div>
                                                <form id="contactoWhats" name="contactoWhats">
                                                    <input type="hidden" id="flyerFlag" name="flyer_flag" value="1">
                                                    <input type="hidden" id="wn" class="jsWhatsappContacto" value="52 ">
                                                    <input type="hidden" name="agente_id" class="jsInputAgenteId" value="">
                                                    <input type="hidden" name="oficina_email" class="jsInputOficinaEmail" value="remaxadvancepuebla@gmail.com">
                                                    <input type="hidden" name="origen" value="1943">
                                                    <input type="hidden" name="propiedad_id" class="jsInputPropiedadId" value="606473">
                                                    <input type="hidden" name="titulo" class="jsInputTitulo" value="Casa en Renta Infonavit el Carmen Castillotla ">
                                                    <input type="hidden" name="clave" class="jsInputClave" value="RCR606473-344">
                                                    <input type="hidden" name="fecha_llamada" value="2024-05-09">
                                                    <input type="hidden" name="tipo" class="jsInputTipo" value="1">
                                                    <input type="hidden" name="oficina_id" class="jsInputOficinaId" value="344">
                                                    <input type="hidden" name="opcion" class="jsInputOperacion" value="2">
                                                    <input type="hidden" name="estado_nombre" class="jsInputEstadoNombre" value="Puebla">
                                                    <input type="hidden" name="ciudad_nombre" class="jsInputCiudadNombre" value="Puebla (Heroica Puebla)">
                                                    <input type="hidden" name="colonia_nombre" class="jsInputColoniaNombre" value="INFONAVIT El Carmen (Gastronómicos)">
                                                    <input type="hidden" name="imagen" class="jsModalImagen" value="https://cdn.remax.com.mx/properties/606473/2b8a65fd2ee689cb04a11a904a3ac444.jpg">
                                                    <input type="hidden" name="imagen2" class="jsModalImagen2" value="https://cdn.remax.com.mx/properties/606473/3f84d767662619e54bf7a1ad60d6e9e7.jpg">
                                                    <input type="hidden" name="imagen3" class="jsModalImagen3" value="https://cdn.remax.com.mx/properties/606473/3126467d850cb3820886e9b738f7be07.jpg">
                                                    <input type="hidden" name="imagen4" class="jsModalImagen4" value="https://cdn.remax.com.mx/properties/606473/673fc3f6aabbaf5c3685d2274a055df7.jpg">
                                                    <div class="form-group">
                                                        <input placeholder="Nombre(s)" type="text" maxlength="40" class="form-control input-sm jsGenerarComentario" id="cliente_nombre" name="cliente_nombre">        
                                                    </div>
                                                    <div class="form-group ">
                                                        <input placeholder="Apellido(s)" type="text" maxlength="40" class="form-control input-sm jsGenerarComentario" id="cliente_apellido" name="cliente_apellido">      
                                                    </div>
                                                    <div class="form-group ">
                                                        <input maxlength="70" class="form-control input-sm jsGenerarComentario" name="email" type="hidden" id="email" data-validation="email" value="" placeholder="Ingresa el correo electronico">                            
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="input-group">
                                                            <div class="input-group-addon" style="background-color: #eeeeee54;"><i class="fas fa-phone-alt"></i></div>
                                                            <input placeholder="Numero celular (Ultimos 10 digitos)" type="tel" maxlength="10" class="form-control input-sm jsGenerarComentario" id="telefono" name="telefono"> 
                                                            <input maxlength="10" type="hidden" id="celular" name="celular">  
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <textarea class="form-control" style="display: none;" rows="4" id="message" name="comentarios"></textarea> 
                                                        <input class="form-control" type="hidden" id="resw" name="resw">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-xs-12 float-right">
                                                        <div id="enviarContactoWhats" class="btn btn-success btn-block jsContactarAgenteWhats" style=" background: #2461da; text-shadow: 0 1px 3px rgba(0, 0, 0, 0.75);    border: 0;    color: #fff;    border-radius: 20px;    -ms-user-select: none;    user-select: none;    -webkit-appearance: none;    display: inline-block;    padding: 0 20px;    line-height: 30px;    font-size: 16px;      width: 100%!important;  font-weight: 400;    cursor: pointer;    border-radius: 8px;    text-align: center;    color: #fff;    margin-bottom: 10px;">Enviar</div>
                                                    </div>
                                                </form>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- JS de jQuery (necesario para los plugins de JavaScript de Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        <!-- JS de Popper.js (necesario para los tooltips y popovers de Bootstrap) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>

        <!-- JS de Bootstrap -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
    <?php include 'footer.php'; ?>
    <script src="JS/JS-detalle-propiedad.js"></script>
</body>
</html>