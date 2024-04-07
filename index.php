<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Custom -->
    <link rel="stylesheet" href="SRC/Usuario/Vista/CSS/estilo-index.css">

    <title>Wayloa</title>
    <link rel="icon" href="SRC/Usuario/Vista/imagenes/navegador-icon.png">
</head>

<body>
    <!-- we started -->
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="SRC/Usuario/Vista/propiedades.php">Propiedades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Cotizaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SRC/Usuario/Vista/asesores.php">Nuestros Asesores</a>
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
            <a href="SRC/Usuario/Vista/propiedades.php">Propiedades</a>
            <a href="">Cotizaciones</a>
            <a href="SRC/Usuario/Vista/asesores.php">Nuestros Asesores</a>
            <a href="">Contacto</a>                
        </nav>
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-secondary dropdown-toggle d-flex align-items-center mi-boton-personalizado" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
                <img src="SRC/Usuario/Vista/imagenes/usuario-foto.png" class="rounded-circle ml-2" alt="Imagen de perfil">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal">Iniciar sesión</a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal">Registrarte</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Tarjetas de regalo</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase font-weight-bold" id="exampleModalLabel">Ingresa tu cuenta</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Bienvenido a wayloa</p>
                    <form action="ventas.html" class="py-4">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email"> <!--required-->
                        </div>
                        <div class="form-group">
                            <label for="pass">Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="pass"> <!--required-->
                        </div>
                        <input type="submit" value="Entrar" class="btn btn-secondary d-block mx-auto py-2 px-4 rounded-0">
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="d-block mx-auto">¿A&uacute;n no est&aacute; registrado?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Seccion Buscador -->
    <section class="buscador py-custom">
        <div class="container px-2 px-sm-4 px-md-5 contenedor-busqueda">
            <h2 class="text-center font-weight-bold pt-5"><strong>Encuentra tu hogar ideal</strong></h2>
            <ul class="nav nav-pills nav-fill my-5" role="tablist">
                <li class="nav-item">
                    <a href="#comprar" class="nav-link active" data-bs-toggle="pill">Comprar</a>
                </li>
                <li class="nav-item">
                    <a href="#alquilar" class="nav-link" data-bs-toggle="pill">Alquilar</a>
                </li>
                <li class="nav-item">
                    <a href="#vender" class="nav-link" data-bs-toggle="pill">Vender</a>
                </li>
            </ul>
            <div class="tab-content pb-5">
                <div class="tab-pane show active" id="comprar" role="tabpanel">
                    <div class="contenedor-input input-group">
                        <div class="col-12 my-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select class="form-control">
                                        <option value="casa">Casas</option>
                                        <option value="depa">Departamentos</option>
                                        <option value="oficina">Comercios</option>
                                        <option value="lote">Lotes</option>
                                        <option value="lote">Almacenes</option>
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
                                    <select class="form-control">
                                        <option value="casa">Casas</option>
                                        <option value="depa">Departamentos</option>
                                        <option value="oficina">Comercios</option>
                                        <option value="lote">Lotes</option>
                                        <option value="lote">Almacenes</option>
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
                                        <option value="casa">Casas</option>
                                        <option value="depa">Departamentos</option>
                                        <option value="oficina">Comercios</option>
                                        <option value="lote">Lotes</option>
                                        <option value="lote">Almacenes</option>
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


    

    <section class="main" id="main">
        <div class="container-fluid bg-blue text-center text-md-left">
            <div class="row">
                <div class="col-md-6 p-0 d-none d-md-block">
                    <img src="SRC/Usuario/Vista/imagenes/frame 3.png" alt="Busquedas Rapidas" class="img-fluid w-100 my-image">
                </div>
                <div class="col-md-6 px-5 py-4">
                    <h1 class="text-center text-md-left subtitle-1 work-sans-h1">Generando Soluciones <br> hace mas de 10 años</h1>
                    <p class="text-justify pt-4">
                    Los orígenes de Wayloa se remontan a principios de la década de 2010, cuando un grupo de emprendedores visionarios, frustrados por las limitaciones y la falta de oportunidades en el sector de servicios, decidieron crear una alternativa que les permitiera desarrollar plenamente su potencial.

                    Liderados por Juan Gómez, un experimentado profesional del sector, estos emprendedores se propusieron diseñar un modelo de negocio que rompiera con los esquemas tradicionales y ofreciera a los mejores talentos la posibilidad de alcanzar el máximo éxito a través de su propio esfuerzo y dedicación.

                    Así nació Wayloa, una compañía que desde sus inicios ha apostado por una filosofía de trabajo basada en la autonomía, la meritocracia y la búsqueda constante de la excelencia. El sistema creado por Juan Gómez y su equipo está diseñado para atraer y retener a los profesionales más destacados, ofreciéndoles un entorno estimulante y enriquecedor en el que pueden desarrollar todo su potencial.

                    La clave de este sistema radica en que los ingresos de cada profesional están directamente vinculados a los resultados que obtienen con su trabajo. Esta filosofía, que se refleja en el propio nombre de la compañía (Wayloa, una contracción de "Way to the top"), ha sido el motor del crecimiento y el éxito de Wayloa a lo largo de más de una década.

                    Desde sus humildes inicios, cuando abrieron las primeras oficinas en unas pocas ciudades, Wayloa ha experimentado un crecimiento exponencial, convirtiéndose en una de las empresas líderes en su sector a nivel nacional e internacional. Hoy en día, Wayloa cuenta con más de 5,000 profesionales altamente cualificados que trabajan en más de 500 oficinas distribuidas en 20 países.

                    La historia de Wayloa es la historia de un sueño hecho realidad, de un modelo de negocio innovador que ha transformado la forma de trabajar en el sector de servicios. Y es una historia que continúa escribiéndose, con la mirada puesta en el futuro y la determinación de seguir ofreciendo a los mejores talentos la oportunidad de alcanzar el máximo éxito.</p>
                    <button class="btn btn-light d-block mx-auto mx-md-0 mi-clase-especial">Ver más</button>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Categorias -->

    <section class="main" id="main">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="d-flex justify-content-between">
                    <div class="col-md-6 text-left mi-clase-categoria-texto">
                        <h2 class="background-image"><strong>Categorias</strong></h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="SRC/Usuario/Vista/categorias.php">
                            <img src="SRC/Usuario/Vista/imagenes/flecha-derecha.gif" alt="Flecha" class="img-fluid small-arrow">
                        </a>
                    </div>
                </div>
            <div class="row align-items-stretch">
                <div class="col-md-6 d-flex flex-column">
                    <img src="SRC/Usuario/Vista/imagenes/categoria-departamento.png" alt="Imagen 1" class="img-fluid img-large flex-grow-1">
                    <p><strong>Departamentos</strong></p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <video src="SRC/Usuario/Vista/imagenes/categoria-casas.mp4" alt="Video 2" class="img-fluid" autoplay loop muted></video>
                            <p><strong>Casas</strong></p>
                        </div>
                        <div class="col-md-6">
                            <img src="SRC/Usuario/Vista/imagenes/catagorias-comercio.png" alt="Imagen 3" class="img-fluid">
                            <p><strong>Comercio</strong></p>
                        </div>
                        <div class="col-md-6">
                            <img src="SRC/Usuario/Vista/imagenes/categorias-countries.png" alt="Imagen 4" class="img-fluid">
                            <p><strong>Countries</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
        <!-- Swiper -->
    <!-- Swiper -->
    <section class="cards-carrusel">
        <div class="col-md-6 text-left mi-clase-destacadas">
            <h2 class="background-image"><strong>Destacadas</strong></h2>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="carrusel">
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="SRC/Usuario/Vista/imagenes/card1.png" alt="">
                            <div class="card-description">
                                <div class="price">Precio: $500,000</div>
                                <div class="status">En venta</div>
                                <div class="title">Casa de ensueño</div>
                                <hr/>
                                <div class="details">
                                    <div><i class="fa-solid fa-door-open fa-sm"></i> 3 Ambientes</div>
                                    <div><i class="fa-solid fa-ruler-combined fa-sm"></i> 60m<sup>2</sup></div>
                                    <div><i class="fa-solid fa-bath fa-sm"></i> 3 Baños</div>
                                    <span class="material-symbols-outlined">bed</span> 3 Dormitorios
                                </div>
                                <div class="card-link">
                                    <a href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="img/02.jpg" alt="">
                            <div class="card-description">
                                <div class="price">Precio: $500,000</div>
                                <div class="status">En venta</div>
                                <div class="title">Casa de ensueño</div>
                                <hr/>
                                <div class="details">
                                    <div><i class="fa-solid fa-door-open fa-sm"></i> 3 Ambientes</div>
                                    <div><i class="fa-solid fa-ruler-combined fa-sm"></i> 60m<sup>2</sup></div>
                                    <div><i class="fa-solid fa-bath fa-sm"></i> 3 Baños</div>
                                    <span class="material-symbols-outlined">bed</span> 3 Dormitorios
                                </div>
                                <div class="card-link">
                                    <a href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="img/03.jpg" alt="">
                            <div class="card-description">
                                <div class="price">Precio: $500,000</div>
                                <div class="status">En venta</div>
                                <div class="title">Casa de ensueño</div>
                                <hr/>
                                <div class="details">
                                    <div><i class="fa-solid fa-door-open fa-sm"></i> 3 Ambientes</div>
                                    <div><i class="fa-solid fa-ruler-combined fa-sm"></i> 60m<sup>2</sup></div>
                                    <div><i class="fa-solid fa-bath fa-sm"></i> 3 Baños</div>
                                    <span class="material-symbols-outlined">bed</span> 3 Dormitorios
                                </div>
                                <div class="card-link">
                                    <a href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="img/04.jpg" alt="">
                            <div class="card-description">
                                <div class="price">Precio: $500,000</div>
                                <div class="status">En venta</div>
                                <div class="title">Casa de ensueño</div>
                                <hr/>
                                <div class="details">
                                    <div><i class="fa-solid fa-door-open fa-sm"></i> 3 Ambientes</div>
                                    <div><i class="fa-solid fa-ruler-combined fa-sm"></i> 60m<sup>2</sup></div>
                                    <div><i class="fa-solid fa-bath fa-sm"></i> 3 Baños</div>
                                    <span class="material-symbols-outlined">bed</span> 3 Dormitorios
                                </div>
                                <div class="card-link">
                                    <a href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="img/05.jpg" alt="">
                            <div class="card-description">
                                <div class="price">Precio: $500,000</div>
                                <div class="status">En venta</div>
                                <div class="title">Casa de ensueño</div>
                                <hr/>
                                <div class="details">
                                    <div><i class="fa-solid fa-door-open fa-sm"></i> 3 Ambientes</div>
                                    <div><i class="fa-solid fa-ruler-combined fa-sm"></i> 60m<sup>2</sup></div>
                                    <div><i class="fa-solid fa-bath fa-sm"></i> 3 Baños</div>
                                    <span class="material-symbols-outlined">bed</span> 3 Dormitorios
                                </div>
                                <div class="card-link">
                                    <a href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="img/06.jpg" alt="">
                            <div class="card-description">
                                <div class="price">Precio: $500,000</div>
                                <div class="status">En venta</div>
                                <div class="title">Casa de ensueño</div>
                                <hr/>
                                <div class="details">
                                    <div><i class="fa-solid fa-door-open fa-sm"></i> 3 Ambientes</div>
                                    <div><i class="fa-solid fa-ruler-combined fa-sm"></i> 60m<sup>2</sup></div>
                                    <div><i class="fa-solid fa-bath fa-sm"></i> 3 Baños</div>
                                    <span class="material-symbols-outlined">bed</span> 3 Dormitorios
                                </div>
                                <div class="card-link">
                                    <a href="#">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main" id="main">
        <!-- Contenedor de Tarjetas -->
        <div class="contenedor-tarjetas my-5">
            <div class="container py-custom-2">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4 text-center">
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
                    <div class="col-12 col-sm-6 col-lg-4 text-center">
                        <div class="card py-4 mx-auto">
                            <img class="pb-5 w-50 d-block mx-auto card-img-top"
                                src="SRC/Usuario/Vista/imagenes/conectividad-mundial_card.svg"
                                alt="Disponibilidad del Servicio en varios paises">
                            <div class="card-body border-top">
                                <h5 class="text-center font-weight-bold card-title">Servicio en varios Paises</h5>
                                <p class="text-justify my-4">Con nuestra presencia global, puedes confiar en un servicio consistente y de alta calidad en cualquier parte del mundo. Desde apartamentos de lujo     
                                    en ciudades cosmopolitas hasta retiros rurales exclusivos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4 text-center">
                        <div class="card py-4 mx-auto mt-2 mt-md-5 mt-lg-0">
                            <img class="pb-5 imx d-block mx-auto card-img-top" src="SRC/Usuario/Vista/imagenes/multiplataforma_card.svg"
                                alt="Servicio multiplataforma con diseño responsivo">
                            <div class="card-body border-top">
                                <h5 class="text-center font-weight-bold card-title">Servicio Multiplataforma</h5>
                                <p class="text-justify my-4">Nuestra plataforma multiplataforma te ofrece una experiencia inmersiva y sin complicaciones, con acceso a herramientas de búsqueda avanzadas.</p>
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
                        <div class="col-12 edit-form text-center">
                            <h1 class="display-5 display-md-4">Contáctanos aqui</h1>
                            <h3>Sabemos lo que necesitas</h3>
                            <button class="btn btn-large rounded mi-clase-especial">Enviar mensaje</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer style="background-color: #000; color: #fff;">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-3">
                    <img src="SRC/Usuario/Vista/imagenes/logo-footer.png" alt="Logo" style="width: 100%; height: 70%;">
                    <p>Persigue tu sueño</p>
                    <div class="d-flex">
                        <a href="https://www.facebook.com" target="_blank" style="margin-right: 15px; font-size: 24px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com" target="_blank" style="margin-right: 15px; font-size: 24px;"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.instagram.com" target="_blank" style="font-size: 24px;"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h5>Nuestros Servicios</h5>
                    <ul>
                        <li><a href="preguntas-frecuentes.html" style="color: #fff;">Compras</a></li>
                        <li><a href="sobre-nosotros.html" style="color: #fff;">Alquileres</a></li>
                        <li><a href="politicas-privacidad.html" style="color: #fff;">Vender</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Recursos</h5>
                    <ul>
                        <li><a href="preguntas-frecuentes.html" style="color: #fff;">Preguntas Frecuentes</a></li>
                        <li><a href="sobre-nosotros.html" style="color: #fff;">Sobre Nosotros</a></li>
                        <li><a href="politicas-privacidad.html" style="color: #fff;">Políticas de Privacidad</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Soporte</h5>
                    <ul>
                        <li><a href="email.html" style="color: #fff;">Email</a></li>
                        <li><a href="contactanos.html" style="color: #fff;">Contactanos</a></li>
                        <li><a href="centro-soporte.html" style="color: #fff;">Centro de soporte</a></li>
                    </ul>
                </div>
            </div>
            <hr style="background-color: #fff;">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; 2024, Wayloa. Todos los Derechos Reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="SRC/Usuario/Vista/JS/JS-index.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    

</body>
</html>