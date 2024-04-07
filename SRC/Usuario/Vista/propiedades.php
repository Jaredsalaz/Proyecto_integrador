


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
                                    <h5 class="card-title">Busqueda</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Agregue filtros para una busqueda m&aacute;s
                                        exacta</h6>
                                    <hr>
                                    <h5 class="card-title">Tarea</h5>
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
                                    <hr>
                                    <h5 class="card-title">Tipo de Inmueble</h5>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Departamentos</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Casas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Oficinas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Comercios</label>
                                    </div>
                                    <hr>
                                    <h5 class="card-title">Ubicaci&oacute;n</h5>
                                    <form class="form-inline">
                                        <input class="form-control" type="search" placeholder="Buscar por ciudad"
                                            aria-label="Search">
                                        <button class="btn btn-outline-success my-2" type="submit"><i
                                                class="fas fa-search"></i></button>
                                    </form>
                                    <hr>
                                    <h5 class="card-title">Presupuesto</h5>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Pesos</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                            id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Dolares</label>
                                    </div>
                                    <form class="mt-3">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Minimo">
                                            </div>
                                            _
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Maximo">
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form class="mt-3 custom">
                                        <h5 class="card-title">Caracteristicas</h5>
                                        <br>
                                        <div class="row">
                                            <div class="input-field col">
                                                <input id="ambientes" type="text" class="validate">
                                                <label for="ambientes">Ambientes</label>
                                            </div>
                                            <div class="input-field col">
                                                <div class="input-group">
                                                    <input id="dormitorios" type="text" required>
                                                    <label for="dormitorios">Dormitorios</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="input-field col">
                                                <input id="banos" type="text" class="validate">
                                                <label for="banos">Baños</label>
                                            </div>
                                            <div class="input-field col">
                                                <input id="cochera" type="text" class="validate">
                                                <label for="cochera">Cochera</label>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="filtros-button-pc">Aplicar filtros</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>

</body>
</html>