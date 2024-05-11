<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

use app\controllers\nuevoTipoPropiedadController;

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
        $controller = new nuevoTipoPropiedadController();
        $result = $controller->addTipoPropiedad($tipo);

        switch ($result) {
            case 'success':
                $message = 'Swal.fire("", "Tipo de propiedad agregado con éxito", "success");';
                break;
            case 'exists':
                $message = 'Swal.fire("", "El tipo de propiedad ya existe", "error");';
                break;
            case 'error':
            default:
                $message = 'Swal.fire("", "Error al agregar el tipo de propiedad", "error");';
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo tipo de propiedad</title>
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nuevo-tipo-propiedad.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="new-tipo-propiedad">
        <h1>Nuevo Tipo de Propiedad</h1>
    </section>
    <hr class="linea">
    <div class="contenedor-principal">
        <div class="nuevo-tipo-propiedad">
            <section class="tipo-propiedad">
                <h2>Agregar Nuevo Tipo de Propiedad</h2>
            </section>
            <hr class="linea-1">
            <div class="box-nuevo-tipo">
                <form action="nuevo-tipo-propiedad.php" method="POST">
                    <input type="text" name="tipo" placeholder="Tipo de Propiedad" class="box-tipo">
                    <input type="submit" name="agregar" value="Agregar" class="btn-action">
                </form>
            </div>
        </div>
    </div>
    <script>
        <?php
        if (!empty($message)) {
            echo $message;
        }
        ?>
    </script>
</body>
</html>