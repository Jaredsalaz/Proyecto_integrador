<?php
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

//instanciamos el controlador
$controlador = new \app\controllers\listaTipoPropiedadesController();

// Verificar si se enviaron datos para actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos de la solicitud POST
    $id = $_POST['id'];
    $nombre_tipo = $_POST['nombre_tipo'];

    // Llamar al método para actualizar
    $controlador->updateTipoPropiedad($id, $nombre_tipo);
}
?>