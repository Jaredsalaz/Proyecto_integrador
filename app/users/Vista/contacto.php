<?php
require_once '../../../config/app.php';
require_once '../../../autoload.php';
require_once 'inc/session_start.php';
$response = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../../autoload.php';

    $controlador = new \app\controllers\cotizacionesController();
    $resultado = $controlador->procesarFormulario();

    if ($resultado['status'] == 'success') {
        $response = ['status' => 'success', 'message' => 'El correo se envió correctamente.'];
    } else {
        $response = ['status' => 'error', 'message' => 'Hubo un error al enviar el correo. Por favor, inténtalo de nuevo.'];
    }
    echo json_encode($response);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-cotizaciones.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <form action="contacto.php" method="post">
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
    <script>
        const form = document.querySelector('form');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            if (data.status === 'success') {
                Swal.fire(
                    '¡Éxito!',
                    data.message,
                    'success'
                );
            } else {
                Swal.fire(
                    'Error',
                    data.message,
                    'error'
                );
            }
        });
    </script>
</body>
</html>