<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nueva-propiedad.css">
    <title>Document</title>
</head>

<body>
    <?php require_once 'inc/dashboard.php';   ?>
    <div class="nueva-propiedad-h1">
        <label for="theme" class="theme">
            <span class="theme__toggle-wrap">
                <input id="theme" class="theme__toggle" type="checkbox" role="switch" name="theme" value="dark">
                <span class="theme__fill"></span>
                <span class="theme__icon">
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                    <span class="theme__icon-part"></span>
                </span>
            </span>
        </label>
        <div class="profile">
            <div class="info">
                <p>Hey, <b>Jacob</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="img/logo-isoxo.png" alt="">
            </div>
        </div>
        <h1>Nueva Propiedad</h1>
    </div>
    <hr class="linea">
    <br>
    <br>
    <main>
        <div class="table-container">
            <section class="table__body">
                <table id="edit-table">
                    <div id="contenedor-admin">
                        <div class="contenedor-principal">
                            <div id="actualizar-propiedad">
                                <hr>
                                <div class="fila-una-columna">
                                    <label for="titulo">Título de la Propiedad</label>
                                    <input type="text" name="titulo" value=" " required class="input-entrada-texto">
                                </div>
                                <div class="fila-una-columna">
                                    <label for="descripcion">Descripción de la Propiedad</label>
                                    <textarea name="descripcion" id="" cols="30" rows="10" class="input-entrada-texto"></textarea>
                                </div>
                                <div class="fila">
                                    <div class="box">
                                        <label for="tipo">Tipo de propiedad</label>
                                        <select name="tipo" id="" class="input-entrada-texto">
                                            <!-- Incluye las opciones de tipos de propiedades aquí -->
                                        </select>
                                    </div>
                                    <div class="box">
                                        <label for="estado">Elija estado de la propiedad</label>
                                        <select name="estado" id="" class="input-entrada-texto">
                                            <option value="venta" selected>Venta</option>
                                            <option value="Alquiler">Alquiler</option>
                                        </select>
                                    </div>
                                    <div class="box">
                                        <label for="ubicacion">Ubicación</label>
                                        <input type="text" name="ubicacion" value=" " class="input-entrada-texto">
                                    </div>
                                </div>
                                <div class="fila">
                                    <div class="box">
                                        <label for="habitaciones">Habitaciones</label>
                                        <input type="text" name="habitaciones" value=" " class="input-entrada-texto">
                                    </div>
                                    <div class="box">
                                        <label for="baños">Baños</label>
                                        <input type="text" name="banios" value=" " class="input-entrada-texto">
                                    </div>
                                    <div class="box">
                                        <label for="pisos">Pisos</label>
                                        <input type="text" name="pisos" value=" " class="input-entrada-texto">
                                    </div>
                                </div>
                                <div class="fila">
                                    <div class="box">
                                        <label for="garage">Garage</label>
                                        <select name="garage" id="" class="input-entrada-texto">
                                            <option value="No" selected>No</option>
                                            <option value="Si">Si</option>
                                        </select>
                                    </div>
                                    <div class="box">
                                        <label for="dimensiones">Dimensiones</label>
                                        <input type="text" name="dimensiones" value=" " class="input-entrada-texto">
                                    </div>
                                    <div class="box">
                                        <label for="precio">Precio (Alquiler o Venta)</label>
                                        <input type="text" name="precio" value=" " class="input-entrada-texto">
                                    </div>
                                </div>
                                <div class="fila">
                                    <div class="box">
                                        <label for="moneda">Moneda</label>
                                        <input type="text" name="moneda" class="input-entrada-texto" required value=" ">
                                    </div>
                                </div>
                                <!--=== -->
                                <h2>Galería de Fotos</h2>
                                <div class="gale-fotos">
                                    <button class="boton-elegante" onclick="document.getElementById('foto1').click();">
                                        Subir fotos
                                    </button>
                                    <input type="file" id="foto1" accept="image/*" name="foto1" style="display: none;">
                                </div>

                                <div class="gale-fotos-gale">
                                    <h2>Galería</h2>
                                    <button class="boton-elegante" onclick="document.getElementById('fotos').click();">
                                        Agregar más fotos
                                    </button>
                                    <div id="contenedor-fotos-publicacion">
                                        <!-- Incluye aquí la galería de fotos -->
                                    </div>
                                    <div id="contenedor-fotos-nuevas">
                                    </div>
                                    <input type="file" id="fotos" accept="image/*" name="fotos[]" value="Foto" multiple="" style="display:none">
                                </div>

                                <div class="fila">
                                    <div class="box">
                                        <label for="pais"> País de la Propiedad</label>
                                        <select name="pais" id="" onchange="muestraselect(this.value)" class="input-entrada-texto">
                                            <!-- Incluye las opciones de países aquí -->
                                        </select>
                                    </div>
                                    <div class="box">
                                        <label for="ciudad">Ciudad de la propiedad</label>
                                        <select name="ciudad" id="ciudad" class="input-entrada-texto">
                                            <!-- Incluye las opciones de ciudades aquí -->
                                        </select>
                                    </div>
                                    <div class="box">
                                        <label for="propietario">Nombre del propietario</label>
                                        <input type="text" name="nombre_propietario" value=" " class="input-entrada-texto">
                                    </div>
                                </div>
                                <div class="fila">
                                    <div class="box">
                                        <label for="telefono_propietario">Teléfono del propietario</label>
                                        <input type="text" name="telefono_propietario" value=" " class="input-entrada-texto">
                                    </div>
                                </div>
                                <!--======= CONTENIDO DEL ASCESOR ========-->
                                <section id="ascesor-h1">
                                    <h1>Informacion del Ascesor</h1>
                                </section>
                                <div class="fila">
                                    <div class="box">
                                        <label for="tipo">Nombre Ascesor</label>
                                        <input type="text" name="ascesor" value=" " class="input-entrada-texto">
                                        <!-- Incluye las opciones de tipos de propiedades aquí -->
                                        </input>
                                    </div>
                                    <div class="box">
                                        <label for="estado">Telefono del Ascesor</label>
                                        <input type="text" name="tel-ascesor" class="input-entrada-texto">
                                        </input>
                                    </div>
                                    <div class="box">
                                    </div>
                                </div>
                                <div class="fila">
                                    <div class="box">
                                        <label for="telefono_propietario">Correo del ascesor</label>
                                        <input type="text" name="tcorreo-ascesor" value=" " class="input-entrada-texto">
                                    </div>

                                    <div class="box">
                                        <button class="boton-elegante" onclick="document.getElementById('').click();">
                                            Guardar Propiedad
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </table>
            </section>
        </div>
    </main>

</body>
</html>