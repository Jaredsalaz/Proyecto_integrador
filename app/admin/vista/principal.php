<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '..//..//..//config/app.php';
require_once './/..//.//..//..//autoload.php';
require_once '..//..//users/Vista/inc/session_start.php';

// Instanciar el controlador
$controlador = new \app\controllers\dashboardController();
// Obtener el número de usuarios a mostrar de la URL, o usar el valor predeterminado
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 4;
// Llamar al método mostrarPrincipal y capturar el resultado
$data = $controlador->mostrarPrincipal($limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilo-principal.css">
    <link rel="stylesheet" href="CSS/estilo-dashboard.css">
    <title>Admin-Wayloa</title>
</head>
<body>
    <?php require_once 'inc/dashboard.php'; ?>
            <main>
                <h1>Dashboard</h1>
                <div class="date">
                    <input type="date">
                </div>
                <div class="insights">
                    <div class="sales">
                        <h3>Total de ciudades</h3>
                        <div class="middle">
                            <div class="left">
                                <?php echo $data['totalCiudades']; ?>
                            </div>
                            <div class="progress">
                            </div>
                        </div>
                        <small class="text-muted">Ultimas 24 Horas</small>
                    </div>
                    
                    <div class="income">
                        <h3>Total Propiedades</h3>
                        <div class="middle">
                            <div class="left">
                                <?php echo $data['totalPropiedades']; ?>
                            </div>
                            <div class="progress">
                            </div>
                        </div>
                        <small class="text-muted">Ultimas 24 Horas</small>
                    </div>
                </div>
                <!------------ Fin Icones ----------->
                <br>
                <br>
                <!--------- END OF INSIGHTS ---------------->
                <div class="recent-orders">
                    <h2>Usuarios</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Fecha de Creación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['usuarios'] as $usuario): ?>
                                <tr>
                                    <td><?php echo $usuario['usuario_id']; ?></td>
                                    <td><?php echo $usuario['u_tipo']; ?></td>
                                    <td><?php echo $usuario['u_nombre']; ?></td>
                                    <td><?php echo $usuario['u_apellido']; ?></td>
                                    <td><?php echo $usuario['u_email']; ?></td>
                                    <td><?php echo $usuario['u_creado']; ?></td>
                                    <td class="primary">Detalles</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="?limit=<?php echo $limit + 10; ?>">Ver Mas</a>
                </div>
            </main>
        </div>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <label for="theme" class="theme">
                    <span class="theme__toggle-wrap">
                        <input id="theme" class="theme__toggle" type="checkbox" role="switch" name="theme" value="dark">
                        <span class="theme__fill"></span>
                        <span class="theme__icon">
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                            <span class="theme__icon-part"></span>
                        </span>
                    </span>
                </label>
                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Jacob</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class  ="profile-photo">
                        <img src="img/logo-isoxo.png" alt="">
                    </div>
                </div>
            </div>
            
            <!-------------- END OF RECENT UPDATES ----------------------------->
            <div class="sales-analytics">
                <h2>Analisis de Ventas</h2>
                <div class="item customers">
                    <div class="icon">
                    <svg xmlns= "http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><<path d="M8.49626 20.6667H10.0474L10.5852 17.2912C10.8012 15.93 11.9747 14.9253 13.3545 14.9253H13.8545C16.5322 14.9253 17.915 13.9421 18.4055 11.4224C18.6134 10.3564 18.5222 9.69183 18.2339 9.32047C17.0272 12.3744 14.4449 13.4793 11.2725 13.4793H10.3878C10.004 13.4793 9.59454 13.6889 9.53611 14.0602L8.49626 20.6667ZM3.55247 20.3733C3.21381 20.3733 2.95514 20.0713 3.00781 19.736L5.68247 2.776C5.75314 2.32933 6.13847 2 6.59047 2H13.0138C15.2265 2 16.9558 2.46733 17.9131 3.558C18.783 4.54853 19.0364 5.64237 18.7846 7.25001C19.1438 7.44133 19.4518 7.67467 19.6998 7.956C20.5185 8.88867 20.6785 10.216 20.3685 11.8053C19.6278 15.6107 17.0925 16.9253 13.8545 16.9253H13.3545C12.9591 16.9253 12.6225 17.214 12.5605 17.6047L11.8578 21.988C11.7958 22.3787 11.4591 22.6667 11.0638 22.6667H6.72114C6.42447 22.6667 6.19781 22.402 6.24381 22.1093L6.51781 20.3733H3.55247ZM10.3878 11.4793H11.2725C14.462 11.4793 16.1671 10.2667 16.7549 7.2501C16.7744 7.14856 16.7919 7.04727 16.8086 6.94101C16.9746 5.88187 16.8586 5.38808 16.4104 4.87773C15.9451 4.34763 14.8073 4 13.0138 4H7.51416L5.24742 18.3733H6.80845L7.53821 13.7452L7.54562 13.7463C7.84632 12.4296 9.0169 11.4793 10.3878 11.4793Z"/></svg>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Depositos con Paypal</h3>
                            <small class="text-muted">Ultimas 24 Horas</small>
                        </div>
                        
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-icons-sharp">person</span>
                    </div>
                    <div class="right">
                        <div class="info" style="margin-top: 108px;">
                            <h3>Usuario</h3>
                            <small class="text-muted">Administrador</small>
                        </div>
                    </div>
                </div>


                <?php
                // Instanciamos la clase dashboardController
                $controlador = new \app\controllers\dashboardController();

                // Verificamos si se ha enviado el formulario de registro
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['u_tipo'], $_POST['u_nombre'], $_POST['u_apellido'], $_POST['u_email'], $_POST['u_clave'])) {
                    // Registramos el usuario y capturamos el resultado
                    $resultado_registro = $controlador->registrarUsuario($_POST['u_tipo'], $_POST['u_nombre'], $_POST['u_apellido'], $_POST['u_email'], $_POST['u_clave']);
                    // Almacenamos el resultado en la sesión
                    $_SESSION['resultado_registro'] = $resultado_registro;
                }
                ?>
                <script>
                    document.addEventListener('DOMContentLoaded', (event) => {
                        // Obtén el resultado de la función registrarUsuario
                        var resultado_registro = "<?php echo $_SESSION['resultado_registro']; ?>";

                        // Si hay un resultado, muestra la alerta
                        if (resultado_registro) {
                            console.log(resultado_registro); // Agrega esta línea
                            Swal.fire({
                                title: resultado_registro,
                                icon: resultado_registro.includes("éxito") ? "success" : "error",
                                confirmButtonText: "OK"
                            });

                            // Limpia el resultado de la sesión para que la alerta no se muestre de nuevo
                            <?php unset($_SESSION['resultado_registro']); ?>
                        }
                    });
                </script>
                <!------------- añadir papus ------------------------------>
                <div class="item">
                    <div class="item add-product">
                        <div>
                            <span class="material-icons-sharp">add</span>
                            <h3>Añadir</h3>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form action="principal.php" method="post">
                            <label for="u_tipo">Tipo:</label>
                            <input type="text" id="u_tipo" name="u_tipo">
                            <label for="u_nombre">Nombre:</label>
                            <input type="text" id="u_nombre" name="u_nombre">
                            <label for="u_apellido">Apellido:</label>
                            <input type="text" id="u_apellido" name="u_apellido">
                            <label for="u_email">Email:</label>
                            <input type="email" id="u_email" name="u_email">
                            <label for="u_clave">Clave:</label>
                            <input type="password" id="u_clave" name="u_clave">
                            <input type="submit" value="Agregar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="JS/tema.js"></script>
    <script src="JS/principal.js"></script>
</body>
</html>