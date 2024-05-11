<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo tipo de propiedad</title>
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nuevo-tipo-propiedad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="new-tipo-propiedad">
        <h1>Nuevo Tipo de Propiedad</h1>
    </section>
    <hr class="linea">
    <div class="contenedor-principal">
        <div class="nuevo-tipo-propiedad">
            <section class="tipo-propiedad">
                <h2>Agregar Nuevo Tipo de Propiedad</h2>
            </section>
            <hr class="linea-1">
            <div class="box-nuevo-tipo">
                <form action="">
                    <input type="text" name="tipo" placeholder="Tipo de Propiedad" class="box-tipo">
                    <input type="submit" name="agregar" value="Agregar" class="btn-action">
                </form>
            </div>
        </div>
    </div>
</body>
</html>