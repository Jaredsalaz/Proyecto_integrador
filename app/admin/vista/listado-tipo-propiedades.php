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