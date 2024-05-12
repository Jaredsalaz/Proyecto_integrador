<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

use app\controllers\nuevaCiudadController;

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ciudad']) && isset($_POST['pais'])) {
        $ciudad = $_POST['ciudad'];
        $id_pais = $_POST['pais'];
        $controller = new nuevaCiudadController();
        $result = $controller->addCiudad($ciudad, $id_pais);

        switch ($result) {
            case 'success':
                $message = 'Swal.fire("", "Ciudad agregada con éxito", "success");';
                break;
            case 'exists':
                $message = 'Swal.fire("", "La ciudad ya existe", "error");';
                break;
            case 'error':
            default:
                $message = 'Swal.fire("", "Error al agregar la ciudad", "error");';
                break;
        }
    }
}

$paises = (new nuevaCiudadController())->index();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Ciudad</title>
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nueva-ciudad.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="nueva-ciudad-tit">
        <h1>Nueva Ciudad</h1>
    </section>
    <hr class="linea">
    <div class="contenedor-principal">
        <div class="nueva-ciudad">
            <section class="new-ciudad">
                <h2>Agregar Nueva Ciudad</h2>
            </section>
            <form action="nueva-ciudad.php" method="POST">
                <div class="box">
                    <label for="pais"> <h3>Seleccione el Pais</h3></label>
                    <select name="pais" id="" class="input-entrada-texto">
                        <option value=""></option>
                        <?php foreach ($paises as $pais): ?>
                            <option value="<?= $pais['id'] ?>"><?= $pais['nombre_pais'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <hr class="linea-1">
                <div class="box-nueva-ciudad">
                    <input type="text" name="ciudad" placeholder="Nueva Ciudad" class="box-tipo">
                    <input type="submit" name="agregar" value="Agregar" class="btn-action">
                </div>
            </form>
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