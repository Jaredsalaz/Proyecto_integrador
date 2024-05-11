<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nuevo-pais.css">
    <title>Nuevo Pais</title>
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
                <form action="">
                    <input type="text" name="tipo" placeholder="Nuevo Pais" class="box-pais">
                    <input type="submit" name="agregar" value="Agregar" class="btn-action">
                </form>
            </div>
        </div>
    </div>
</body>
</html>