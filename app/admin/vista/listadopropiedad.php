<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/lista-propiedades.css">
    <title>Listado Propiedades</title>
</head>

<body>
    <?php include 'inc/dashboard.php';   ?>
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
                            <th>Ubicacion</th>
                            <th>Fecha de publicacion</th>
                            <th>Acciones</th>
                            <th><button>Ver detalle</button></th>
                            <th><button >Actualizar</button></th>
                            <th><button >Eliminar</button></th>
                        </tr>
                    </thead>
                </table>
            </section>
        </div>
    </main>
</body>

</html>