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
                            <th>Acciones</th>
                            <th><button class="btn-action">Actualizar</button></th>
                        </tr>
                    </thead>
                </table>
            </section>
        </div>
    </main>
</body>

</html>