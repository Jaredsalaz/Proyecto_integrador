<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '..//..//..//autoload.php';

    $controlador = new \app\controllers\cotizacionesController();
    $resultado = $controlador->procesarFormulario();

    if ($resultado['status'] == 'success') {
        echo "El correo se envió correctamente.";
    } else {
        echo "Hubo un error al enviar el correo. Por favor, inténtalo de nuevo.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-cotizaciones.css">
    <title>Cotizaciones</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <section>
        <div class="container">
            <div class="image-container">
                <video autoplay loop muted>
                    <source src="imagenes/video_edificios.mp4" type="video/mp4">
                </video>
                <a href="https://www.google.com/maps/place/Tu+Ubicacion" target="_blank" class="location">
                    <p> <i class="fa-solid fa-location-dot"></i> Estamos en Tuxtla</p>
                </a>
            </div>
            <div class="left-side"></div>
            <div class="form-container">
                <h2 class="titulo">Estas a un paso de nosotros....</h2>
                <form action="cotizaciones.php" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" name="apellido" placeholder="Introduce tu Apellido">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" placeholder="Introduce tu Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" id="correo" name="correo" placeholder="Introduce tu Correo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" placeholder="Introduce tu Mensaje"></textarea>
                    </div>
                    <button type="submit">Contactar</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>