<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';
//instanciamos el controlador
$controlador = new \app\controllers\listaTipoPropiedadesController();
//llamamos al metodo obtenerTiposPropiedades y capturamos el resultado
$tiposPropiedades = $controlador->getTiposPropiedades();

// Verificar si se enviaron datos para actualizar o eliminar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos de la solicitud POST
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'update') {
        // Actualizar
        $nombre_tipo = $_POST['nombre_tipo'];
        $result = $controlador->updateTipoPropiedad($id, $nombre_tipo);
        $status_message = $result ? 'Actualización exitosa' : 'Error en la actualización';
    } elseif ($action === 'delete') {
        // Eliminar
        $result = $controlador->deleteTipoPropiedad($id);
        $status_message = $result ? 'Eliminación exitosa' : 'Error en la eliminación';
    }
}

//instanciamos el controlador
$controlador = new \app\controllers\listaTipoPropiedadesController();
//llamamos al metodo obtenerTiposPropiedades y capturamos el resultado
$tiposPropiedades = $controlador->getTiposPropiedades();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/listado-tipo-propiedades.css">
    <title>Listado Tipo de Propiedades</title>
</head>

<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="list-propiedades">
        <h1>Listado Tipo de Propiedades</h1>
    </section>
    <main class="table">
        <div class="table-container">
            <section class="listado-propiedades">
                <H1>Tipos de Propiedades</H1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tiposPropiedades as $tipo): ?>
                        <tr>
                            <td class="id"><?php echo htmlspecialchars($tipo['id']); ?></td>
                            <form action="listado-tipo-propiedades.php" method="post">
                                <td>
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($tipo['id']); ?>">
                                    <input class="nombre_tipo" type="text" name="nombre_tipo" value="<?php echo htmlspecialchars($tipo['nombre_tipo']); ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="action" value="update">
                                    <input type="submit" class="btn-action" value="Actualizar">
                                </td>
                            </form>
                            <form action="listado-tipo-propiedades.php" method="post">
                                <td>
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($tipo['id']); ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="submit" class="btn-action" value="Eliminar">
                                </td>
                            </form>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if (isset($status_message)): ?>
                <p><?php echo $status_message; ?></p>
                <?php endif; ?>
            </section>
        </div>
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    <?php if (isset($status_message)): ?>
    Swal.fire({
        title: 'Estado de la operación',
        text: '<?php echo $status_message; ?>',
        icon: '<?php echo $result ? 'success' : 'error'; ?>',
        confirmButtonText: 'OK'
    })
    <?php endif; ?>
    </script>
</body>
</html>