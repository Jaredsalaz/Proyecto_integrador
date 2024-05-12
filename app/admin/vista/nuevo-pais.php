<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

use app\controllers\nuevoPaisController;

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pais'])) {
        $pais = $_POST['pais'];
        $controller = new nuevoPaisController();
        $result = $controller->addPais($pais);

        switch ($result) {
            case 'success':
                $message = 'Swal.fire("", "País agregado con éxito", "success");';
                break;
            case 'exists':
                $message = 'Swal.fire("", "El país ya existe", "error");';
                break;
            case 'error':
            default:
                $message = 'Swal.fire("", "Error al agregar el país", "error");';
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
    <title>Nuevo Pais</title>
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nuevo-pais.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="new-pais">
        <h1>Nuevo Pais</h1>
    </section>
    <hr class="linea">
    <div class="contenedor-principal">
        <div class="nuevo-pais">
            <section class="pais">
                <h2>Agregar Nuevo Pais</h2>
            </section>
            <hr class="linea-1">
            <div class="box-nuevo-pais">
                <form action="nuevo-pais.php" method="POST">
                    <input type="text" name="pais" placeholder="Nuevo Pais" class="box-pais">
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