<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesores</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilo_asesores.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="row">
        <div class="col">
            <div class="card full-border">
                <div class="shadow" style="--url: url('../imagenes/retrato1.png')"></div>
                <div class="image background" style="--url: url('../imagenes/retrato2-background.png')"></div>
                <div class="image cutout" style="--url: url('../imagenes/retrato1-cutout.png')"></div>
                <div class="content">
                    <h2 class="asesores-h2">Contador Wayloa</h2>
                    <h3 class="asesores-h3">Josue Hernadez Santiago</h3>
                    <button class="contact-button">Contactar</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card full-border">
                <div class="shadow" style="--url: url('../imagenes/retrato2.png')"></div>
                <div class="image background" style="--url: url('../imagenes/retrato2-background.png')"></div>
                <div class="image cutout" style="--url: url('../imagenes/retrato2-cutout.png')"></div>
                <div class="content">
                    <h2 class="asesores-h2">Contador Wayloa</h2>
                    <h3 class="asesores-h3">Eric Mendez Suarez</h3>
                    <button class="contact-button">Contactar</button>
                </div>
            </div>
        </div>
                <div class="col">
            <div class="card full-border">
                <div class="shadow" style="--url: url('../imagenes/retrato3.png')"></div>
                <div class="image background" style="--url: url('../imagenes/retrato2-background.png')"></div>
                <div class="image cutout" style="--url: url('../imagenes/retrato3-cutout.png')"></div>
                <div class="content">
                    <h2 class="asesores-h2">Contador Wayloa</h2>
                    <h3 class="asesores-h3">Jared Salazar Sanchez</h3>
                    <button class="contact-button">Contactar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="full-screen">
        <div class="section">
            <p class="large-text"><strong>Conocimiento</strong><br>
            Estamos comprometidos con la excelencia en el servicio al cliente. Nuestro equipo altamente calificado y con conocimiento del mercado está a su disposición para acompañarlos en cada etapa del proceso y asegurar una experiencia de compra excepcional.</p>
            <div class="number-background-1">1</div>
        </div>
        <div class="section">
            <p class="medium-text"><strong>Capacitaciones</strong><br>
            Nuestro equipo esta actualmente capacitado en dar la mejor atencion a los clientes ya que contamos con asesores certificados</p>
            <div class="number-background-2">2</div>
        </div>
        <div class="section">
            <p class="small-text"><strong>Especialidad</strong><br>
            Contamos con un equipo de expertos para brindar una mejor experiencia en la busqueda de tu hogar ideal</p>
            <div class="number-background-3">3</div>
        </div>
    </div>

    <script>
        // Selecciona todas las tarjetas
        const tarjetas = document.querySelectorAll('.card');

        // Agrega el controlador de eventos a cada tarjeta
        tarjetas.forEach(function(tarjeta) {
            tarjeta.addEventListener('mousemove', function(e) {
                // Calcula los ángulos de rotación
                const rect = tarjeta.getBoundingClientRect();
                const ejeX = ((rect.width / 2) - (e.pageX - rect.left)) / 25;
                const ejeY = ((rect.height / 2) - (e.pageY - rect.top)) / 25;

                // Aplica la transformación
                tarjeta.style.setProperty('--rotateY', `${ejeX}deg`);
                tarjeta.style.setProperty('--rotateX', `${ejeY}deg`);
            });

            // Restablece la transformación cuando el mouse sale
            tarjeta.addEventListener('mouseleave', function() {
                tarjeta.style.transition = '--rotateY 0.5s ease, --rotateX 0.5s ease';
                tarjeta.style.setProperty('--rotateY', '0deg');
                tarjeta.style.setProperty('--rotateX', '0deg');
            });

            // Elimina la transición cuando el mouse entra para evitar el efecto de volteo
            tarjeta.addEventListener('mouseenter', function() {
                tarjeta.style.transition = 'none';
            });
        });

        // Define la función de devolución de llamada para el observador
        const callback = function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'slideUp 1s ease-out forwards';
                    entry.target.style.opacity = '1';
                }
            });
        };

        // Crea el observador
        const observer = new IntersectionObserver(callback);

        // Observa cada tarjeta
        tarjetas.forEach(tarjeta => observer.observe(tarjeta));
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>