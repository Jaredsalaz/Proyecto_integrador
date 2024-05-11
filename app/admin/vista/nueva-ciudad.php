<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Ciudad</title>
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <link rel="stylesheet" href="CSS/nueva-ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'inc/dashboard.php';   ?>
    <section class="nueva-ciudad-tit">
        <h1>Nueva Ciudad</h1>
    </section>
    <hr class="linea">
    <div class="contenedor-principal">
        <div class="nueva-ciudad">
            <section class="new-ciudad">
                <h2>Agregar Nuevo Tipo de Propiedad</h2>
            </section>
            <div class="box">
                <label for="pais"> <h3>Seleccione el Pais</h3></label>
                <select name="pais" id="" class="input-entrada-texto">
                    <option value=""></option>
                    <option value="">Tuxtla Gutierrez</option>
                    <option value="">Pijijiapan</option>
                </select>
            </div>
            <hr class="linea-1">
            <div class="box-nueva-ciudad">
                <form action="">
                    <input type="text" name="tipo" placeholder="Nueva Ciudad" class="box-tipo">
                    <input type="submit" name="agregar" value="Agregar" class="btn-action">
                </form>
            </div>
        </div>
    </div>
</body>
</html>