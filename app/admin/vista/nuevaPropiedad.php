<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

// Instanciar el controlador
$controlador = new \app\controllers\nuevaPropiedadController();

// Llamar al método para obtener los datos necesarios para el formulario
$datosFormulario = $controlador->mostrarFormularioPropiedad();

// Comprobar si el formulario se ha enviado
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recoger los datos del formulario
    $datos = [
        'fecha_alta' => date('Y-m-d H:i:s'), // Fecha y hora actual
        'titulo' => $_POST['titulo'],
        'descripcion' => $_POST['descripcion'],
        'tipo' => $_POST['tipo'],
        'estado' => $_POST['estado'],
        'ubicacion' => $_POST['ubicacion'],
        'habitaciones' => $_POST['habitaciones'],
        'banios' => $_POST['banios'],
        'pisos' => substr($_POST['pisos'], 0, 10), // Trunca a 10 caracteres
        'garage' => $_POST['garage'],
        'dimensiones' => $_POST['dimensiones'],
        'precio' => $_POST['precio'],
        'moneda' => $_POST['moneda'],
        'pais' => $_POST['pais'],
        'ciudad' => $_POST['ciudad'],
        'propietario' => trim($_POST['propietario']), // Usamos trim() para eliminar espacios en blanco al principio y al final
        'telefono_propietario' => $_POST['telefono_propietario'],
        'asesor_id' => $_POST['asesor_id'], // El ID del asesor
    ];
    // Crear una carpeta para la propiedad basada en su título
    $carpetaPropiedad = 'fotos-Propiedad/' . preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($datos['titulo'])));
    if (!file_exists($carpetaPropiedad)) {
        mkdir($carpetaPropiedad, 0755, true);
    }

    
    // Manejamos la subida de la foto principal
    $foto1 = $_FILES['foto1'];
    $rutaFoto1 = $carpetaPropiedad . '/' . $foto1['name'];
    if (!move_uploaded_file($foto1['tmp_name'], $rutaFoto1)) {
        die('Error al subir la foto principal');
    }

    // Asignar la ruta de la foto principal a 'url_foto_principal'
    $datos['url_foto_principal'] = $rutaFoto1;

    // Llamar al método insertarPropiedad y capturar el resultado
    $resultado = $controlador->insertarPropiedad($datos);
    
        // Subir las fotos de la galería
    if(isset($_FILES['fotos'])) {
        $fotos = $_FILES['fotos'];

        // Limitar el número de fotos de la galería a 10
        if(count($fotos['name']) > 10) {
            die('No puedes subir más de 10 fotos para la galería');
        }

        for($i = 0; $i < count($fotos['name']); $i++) {
            $rutaFoto = $carpetaPropiedad . '/' . $fotos['name'][$i];
            if (move_uploaded_file($fotos['tmp_name'][$i], $rutaFoto)) {
                // Insertar la ruta de cada foto de la galería en la base de datos
                $controlador->insertarFoto(['id_propiedad' => $resultado, 'nombre_foto' => $rutaFoto]);
            } else {
                die('Error al subir la foto de la galería');
            }
        }
    }
    // Comprobar el resultado
    if($resultado) {
        // Guardar el resultado en la sesión
        $_SESSION['resultado_insercion'] = 'La propiedad fue insertada correctamente';
    } else {
        // Guardar el resultado en la sesión
        $_SESSION['resultado_insercion'] = 'Hubo un error al insertar la propiedad';
    }
    
}
?>
<!-- Resto del código HTML... -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nueva-propiedad.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Nueva Propiedad</title>
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
    <form action="nuevaPropiedad.php" method="post" enctype="multipart/form-data">
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
                                            <label for="estado">Elija estado de la propiedad</label>
                                            <select name="tipo" id="tipo" class="input-entrada-texto">
                                                <?php foreach($datosFormulario['tipos'] as $tipo): ?>
                                                    <option value="<?php echo $tipo->id; ?>">
                                                        <?php echo $tipo->nombre_tipo; ?>
                                                    </option>
                                                <?php endforeach; ?>
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
                                            <input type="text" name="pisos" value=" " class="input-entrada-texto" maxlength="4">
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
                                        <button type="button" class="boton-elegante" onclick="document.getElementById('foto1').click();">
                                            Subir foto
                                        </button>
                                        <div id="preview1"></div>
                                        <input type="file" id="foto1" accept="image/*" name="foto1" style="display: none;">
                                    </div>

                                    <div class="gale-fotos-gale">
                                        <h2>Galería</h2>
                                        
                                        <button  type="button" class="boton-elegante" onclick="document.getElementById('fotos').click();">
                                            Agregar más fotos
                                        </button>
                                        <div id="preview"></div>
                                        <div id="contenedor-fotos-nuevas">
                                        </div>
                                        <input type="file" id="fotos" accept="image/*" name="fotos[]" value="Foto" multiple="" style="display:none">
                                    </div>

                                    <div class="fila">
                                        <div class="box">
                                                <label for="estado">Elija estado de la propiedad</label>
                                                <select name="pais" id="pais" class="input-entrada-texto">
                                                    <?php foreach($datosFormulario['paises'] as $pais): ?>
                                                        <option value="<?php echo $pais->id; ?>">
                                                            <?php echo $pais->nombre_pais; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                        </div>

                                    <div class="box">
                                            <label for="ciudad">Ciudad</label>
                                            <select name="ciudad" id="ciudad" class="input-entrada-texto">
                                                <?php foreach($datosFormulario['ciudades'] as $ciudad): ?>
                                                    <option value="<?php echo $ciudad->id; ?>">
                                                        <?php echo $ciudad->nombre_ciudad; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                        <div class="box">
                                            <label for="propietario">Nombre del propietario</label>
                                            <input type="text" name="propietario" class="input-entrada-texto">
                                        </div>
                                    </div>
                                    <div class="fila">
                                        <div class="box">
                                            <label for="telefono_propietario">Teléfono del propietario</label>
                                            <input type="text" name="telefono_propietario"  class="input-entrada-texto">
                                        </div>
                                    </div>
                                    <!--======= CONTENIDO DEL ASCESOR ========-->
                                    <section id="ascesor-h1">
                                        <h1>Informacion del Ascesor</h1>
                                    </section>
                                    <div class="fila">
                                        <div class="box">
                                            <label for="asesor_id">Asesor</label>
                                            <select name="asesor_id" id="asesor_id" class="input-entrada-texto">
                                                <?php foreach($datosFormulario['asesores'] as $asesor): ?>
                                                    <option value="<?php echo $asesor->id; ?>">
                                                        <?php echo $asesor->nombre . ' ' . $asesor->apellido; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>    
                                        </div>
                                        <div class="box">
                                            
                                        </div>                                   
                                    <div class="fila">
                                        <div class="box">
                                            <button class="boton-elegante" type="submit">
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
    </form>
    <script>
        // Selecciona el formulario
        var form = document.querySelector('form');

        // Escucha el evento submit del formulario
        form.addEventListener('submit', function(e) {
            // Selecciona todos los campos requeridos
            var camposRequeridos = Array.from(form.querySelectorAll('[required]'));

            // Comprueba si todos los campos requeridos están llenos
            var todosLosCamposEstanLlenos = camposRequeridos.every(function(campo) {
                return campo.value.trim() !== '';
            });

            // Si no todos los campos requeridos están llenos, muestra una alerta y previene el envío del formulario
            if (!todosLosCamposEstanLlenos) {
                e.preventDefault();
                Swal.fire(
                    'Error!',
                    'Debe llenar todos los datos antes de guardar la propiedad.',
                    'error'
                );
            }
        });
    </script>
    <script>
        // Obtén el resultado de la función insertarPropiedad
        var resultado_insercion = "<?php echo $_SESSION['resultado_insercion'] ?? ''; ?>";
    
        // Si hay un resultado, muestra la alerta
        if (resultado_insercion) {
            var tipoAlerta = 'error';
            var mensajeAlerta = 'Hubo un error al insertar la propiedad.';
    
            if (resultado_insercion === 'La propiedad fue insertada correctamente') {
                tipoAlerta = 'success';
                mensajeAlerta = resultado_insercion;
            }
    
            Swal.fire(
                'Guardado!',
                mensajeAlerta,
                tipoAlerta
            );
    
            // Limpia el resultado de la sesión para que la alerta no se muestre de nuevo
            <?php unset($_SESSION['resultado_insercion']); ?>
        }
    </script>

    <script>
        // Selecciona los input file
        var fileInput1 = document.getElementById('foto1');
        var fileInput2 = document.getElementById('fotos');

        // Función para mostrar la previsualización de las fotos
        function mostrarPrevisualizacion(fileInput, previewId) {
            fileInput.addEventListener('change', function(e) {
                var files = e.target.files;
                var preview = document.getElementById(previewId);
                preview.innerHTML = '';
                for (var i = 0; i < files.length; i++) {
                    var reader = new FileReader();
                    reader.addEventListener('load', function(e) {
                        var img = new Image();
                        img.src = e.target.result;
                        preview.appendChild(img);
                    });
                    reader.readAsDataURL(files[i]);
                }
            });
        }

        // Mostrar la previsualización de las fotos
        mostrarPrevisualizacion(fileInput1, 'preview1'); // Para la foto principal
        mostrarPrevisualizacion(fileInput2, 'preview'); // Para la galería de fotos
    </script>
</body>
</html>