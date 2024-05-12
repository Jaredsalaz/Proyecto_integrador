<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

$controlador = new \app\controllers\listaCiudadesController();
$ciudades = $controlador->getCiudades();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'update') {
        $nombre_ciudad = $_POST['nombre_ciudad'];
        $id_pais = $_POST['id_pais'];
        $result = $controlador->updateCiudades($id, $nombre_ciudad, $id_pais);
        $status_message = $result ? 'Actualización exitosa' : 'Error en la actualización';
    } elseif ($action === 'delete') {
        $result = $controlador->deleteCiudades($id);
        $status_message = $result ? 'Eliminación exitosa' : 'Error en la eliminación';
    }
}

$controlador = new \app\controllers\listaCiudadesController();
$ciudades = $controlador->getCiudades();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/listado-ciudades.css">
    <title>Listado de Ciudades</title>
</head>

<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="list-ciudades">
        <h1>Listado de Ciudades</h1>
    </section>
    <main class="table">
        <div class="table-container">
            <section class="listado-ciudades">
                <H1>Lista de Ciudades</H1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Pais</th>
                            <th>Nombre de la Ciudad</th>
                            <th>Actualizar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ciudades as $ciudad): ?>
                        <tr>
                            <td class="id"><?php echo htmlspecialchars($ciudad['id']); ?></td>
                            <form action="listado-ciudades.php" method="post">
                                <td>
                                    <?php echo htmlspecialchars($ciudad['nombre_pais']); ?>
                                </td>
                                <td>
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($ciudad['id']); ?>">
                                    <input type="text" name="nombre_ciudad" value="<?php echo htmlspecialchars($ciudad['nombre_ciudad']); ?>">
                                </td>
                                <td>
                                    <input type="hidden" name="action" value="update">
                                    <input type="submit" class="btn-action" value="Actualizar">
                                </td>
                            </form>
                            <form action="listado-ciudades.php" method="post">
                                <td>
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($ciudad['id']); ?>">
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