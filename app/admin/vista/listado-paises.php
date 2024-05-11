<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/listado-paises.css">
    <title>Listado de Paises</title>
</head>
<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="list-paises">
        <h1>Listado de Paises</h1>
    </section>
    <main class="table">
        <div class="table-container">
            <section class="listado-propiedades">
                <H1>Lista de Paises</H1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del Pais</th>
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