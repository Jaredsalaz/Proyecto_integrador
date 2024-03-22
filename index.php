<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Custom -->
    <link rel="stylesheet" href="SRC/Usuario/Vista/CSS/estilo-index.css">

    <title>Inmobiliaria</title>
</head>

<body>
    <!-- Header -->
    <!-- Navbar para pantallas grandes -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5 d-none d-lg-block">
        <a class="navbar-brand" href="#">+52 961 3231092</a>
        <a class="navbar-brand" href="#">wayloa@info.com</a>
        <a href="https://www.facebook.com" target="_blank">
            <i class="fab fa-facebook-square"></i>
        </a>
        <a href="https://www.instagram.com" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://web.whatsapp.com" target="_blank">
            <i class="fa-brands fa-whatsapp"></i>
        </a>
    </nav>

    <!-- Navbar para pantallas pequeñas -->
    <nav class="navbar navbar-light bg-light px-5 d-lg-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">Propiedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Cotizaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Nuestros Asesores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- menu -->
    <div class="navbar" id="mainNavbar">
        <img class="logo" src="SRC/Usuario/Vista/imagenes/logo.png" alt="logo bienes raices">
        <nav class="nav_links">
            <a href="">Propiedades</a>
            <a href="">Cotizaciones</a>
            <a href="">Nuestros Asesores</a>
            <a href="">Contacto</a>                
        </nav>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Inicio de sesión
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal">Iniciar sesión</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal">Registrarte</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Tarjetas de regalo</a>
            </div>
        </div>
    </div>
    <!-- Seccion Buscador -->
    <section class="buscador py-custom">
        <div class="container px-2 px-sm-4 px-md-5 contenedor-busqueda">
            <h2 class="text-center font-weight-bold pt-5">Encuentra tu hogar ideal</h2>
            <ul class="nav nav-pills nav-fill my-5" role="tablist">
                <li class="nav-item">
                    <a href="#comprar" class="nav-link active" data-toggle="pill">Comprar</a>
                </li>
                <li class="nav-item">
                    <a href="#alquilar" class="nav-link" data-toggle="pill">Alquilar</a>
                </li>
                <li class="nav-item">
                    <a href="#vender" class="nav-link" data-toggle="pill">Vender</a>
                </li>
            </ul>
            <div class="tab-content pb-5">
                <div class="tab-pane show active" id="comprar" role="tabpanel">
                    <div class="contenedor-input input-group">
                        <div class="col-12 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select class="form-control">
                                        <option value="casa">Casa</option>
                                        <option value="depa">Departamento</option>
                                        <option value="oficina">Oficina</option>
                                        <option value="lote">Lote</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control pl-1 pl-md-2 border-0 rounded-right"
                                    id="inlineFormInputGroupUsername" placeholder="Ingresar ubicaci&oacute;n">
                            </div>
                            <input type="submit" class="btn btn-x" value="Buscar">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="alquilar" role="tabpanel">
                    <div class="contenedor-input input-group">
                        <div class="col-12 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select class="form-control rounded-0">
                                        <option value="casa">Casa</option>
                                        <option value="depa">Departamento</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control pl-1 pl-md-2 border-0 rounded-0"
                                    id="inlineFormInputGroupUsername" placeholder="Ingresar ubicaci&oacute;n">
                            </div>
                            <input type="submit" class="btn btn-x" value="Buscar">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="vender" role="tabpanel">
                    <div class="contenedor-input input-group">
                        <div class="col-12 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select class="form-control">
                                        <option value="casa">Casa</option>
                                        <option value="depa">Departamento</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control pl-1 pl-md-2 border-0 rounded-right"
                                    id="inlineFormInputGroupUsername" placeholder="Ingresar ubicaci&oacute;n">
                            </div>
                            <input type="submit" class="btn btn-x" value="Buscar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cuerpo Principal -->
    <section class="main" id="main">
        <!-- Contenedor de Informacion -->
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-md-6 order-2 order-md-1 img-cont">
                    <img src="SRC/Usuario/Vista/imagenes/img-busqueda-casa.svg" alt="Busquedas Rapidas" class="hov-img img-fluid d-block mx-auto w-75">
                </div>
                <div class="col-12 col-md-6 order-1 order-md-2 d-flex">
                    <div class="align-self-center">
                        <h2 class="text-center subtitle-1">Generando Soluciones hace mas de 10 años</h2>
                        <p class="text-justify pt-4">A lo largo de esta década, hemos construido una sólida reputación basada en la transparencia, la integridad    
                            y el compromiso con la calidad. Nuestro equipo de profesionales altamente cualificados y apasionados por el sector inmobiliario trabaja     
                            incansablemente para ofrecer soluciones innovadoras y efectivas que se ajusten a las necesidades específicas de cada uno de nuestros clientes.</p>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-12 col-md-6 d-flex">
                    <div class="align-self-center">
                        <h2 class="text-center subtitle-1">Conocenos</h2>
                        <p class="text-justify pt-4">La satisfacción de nuestros clientes es el pilar de nuestro éxito, lo que se refleja en la cantidad de recomendaciones y clientes  
                            que regresan en busca de nuestros servicios. Este reconocimiento es el resultado de nuestro compromiso continuo con la excelencia, que nos motiva a seguir innovando    
                             y mejorando en todo lo que hacemos.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 img-cont">
                    <img src="SRC/Usuario/Vista/imagenes/img-select-casa.svg" alt="Seleccion de Domicilios"
                        class="hov-img img-fluid d-block mx-auto w-75">
                </div>
            </div>
        </div>

        <!-- Contenedor de Tarjetas -->
        <div class="contenedor-tarjetas my-5">
            <div class="container py-custom-2">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 text-center">
                        <div class="card py-4 mx-auto">
                            <img class="pb-5 w-50 d-block mx-auto card-img-top"
                                src="SRC/Usuario/Vista/imagenes/casas-exclusivas_card.svg"
                                alt="Disponibilidad del Servicio en varios paises">
                            <div class="card-body border-top">
                                <h5 class="text-center font-weight-bold card-title">Exclusividad en Inmuebles</h5>
                                <p class="text-justify my-4">¿Quieres vender tu propiedad de manera rápida y efectiva? ¡La exclusividad es la respuesta! Al confiar     
                                    en nosotros con la exclusividad de tu propiedad, te aseguras de recibir un servicio dedicado y estratégico que hará que tu inmueble brille en el mercado.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 text-center">
                        <div class="card py-4 mx-auto">
                            <img class="pb-5 w-50 d-block mx-auto card-img-top"
                                src="SRC/Usuario/Vista/imagenes/conectividad-mundial_card.svg"
                                alt="Disponibilidad del Servicio en varios paises">
                            <div class="card-body border-top">
                                <h5 class="text-center font-weight-bold card-title">Servicio en varios Paises</h5>
                                <p class="text-justify my-4">Con nuestra presencia global, puedes confiar en un servicio consistente y de alta calidad en cualquier parte del mundo. Desde apartamentos de lujo     
                                    en ciudades cosmopolitas hasta retiros rurales exclusivos, tenemos la experiencia y los recursos para hacer realidad tus sueños inmobiliarios, sin importar la ubicación.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card py-4 mx-auto mt-2 mt-md-5 mt-lg-0">
                            <img class="pb-5 imx d-block mx-auto card-img-top" src="SRC/Usuario/Vista/imagenes/multiplataforma_card.svg"
                                alt="Servicio multiplataforma con diseño responsivo">
                            <div class="card-body border-top">
                                <h5 class="text-center font-weight-bold card-title">Servicio Multiplataforma</h5>
                                <p class="text-justify my-4">Nuestra plataforma multiplataforma te ofrece una experiencia inmersiva y sin complicaciones, con acceso a herramientas de búsqueda avanzadas, imágenes de  
                                    alta calidad y descripciones detalladas de propiedades, todo al alcance de tus dedos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Servicio de Contacto -->
        <div class="formulario position-relative" id="formulario">
            <div class="px-custom py-0 py-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 edit-form">
                            <form action="" class="w-100">
                                <h2 class="display-5 display-md-4">Cont&aacute;ctanos</h2>
                                <p class="mb-5 text-muted">Sabemos lo que necesitas, estamos para ayudarte.
                                </p>
                                <div class="form-group">
                                    <input class="form-control" type="text" id="nombre" name="nombre" required>
                                    <label for="nombre">Nombre</label>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" id="email" name="email" required>
                                    <label for="email">Correo Electronico</label>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="mensaje" id="mensaje" required></textarea>
                                    <label for="mensaje">Mensaje</label>
                                </div>
                                <input type="submit" value="Enviar" class="btn btn-secondary mt-4">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer>
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="#"><h2>Inmobiliaria</h2></a>
                    <p>&copy;&nbsp;Todos los Derechos Reservados</p>
                    <div class="mt-2 d-block redes">
                        <a href="#" class="mr-2"><i class="fas fa-globe-africa"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="SRC/Usuario/Vista/JS/JS-index.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>