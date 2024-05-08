<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

// Instanciar el controlador
$controlador = new \app\controllers\listaPropiedadesController();
// Llamar al método obtenerTodasLasPropiedades y capturar el resultado
$propiedades = $controlador->obtenerTodasLasPropiedades();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/estilo-listaPropiedad.css">
    <title>Document</title>
</head>

<body>
    <?php require_once 'inc/dashboard.php';   ?>
    <main class="table">
        <div class="table-container">
            <section class="list-propiedades">
                <H1>Listado Propiedad</H1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Pais</th>
                            <th>Fecha de publicacion</th>
                            <th>Propietario</th>
                            <th><button>Ver detalle</button></th>
                            <th><button >Actualizar</button></th>
                            <th><button >Eliminar</button></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($propiedades as $propiedad): ?>
                            <tr>
                                <td><?php echo $propiedad->id; ?></td>
                                <td><?php echo $propiedad->titulo; ?></td>
                                <td><?php echo $propiedad->tipo; ?></td>
                                <td><?php echo $propiedad->estado; ?></td>
                                <td><?php echo $propiedad->pais; ?></td>
                                <td><?php echo $propiedad->fecha_alta; ?></td>
                                <td><?php echo $propiedad->propietario; ?></td>
                                <td><button>Ver detalle</button></td>
                                <td><button>Actualizar</button></td>
                                <td><button>Eliminar</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>

</html>