<?php
    namespace app\controllers;
    use app\models\dashboardModel;

    class dashboardController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new dashboardModel();
        }

        public function obtenerUsuarios($limit = 4) {
            // Llamar a la función obtenerUsuarios del modelo
            return $this->model->obtenerUsuarios($limit);
        }

        public function mostrarPrincipal($limit = 4) {
            // Verificar si el usuario ha iniciado sesión
            if (!isset($_SESSION['usuario'])) {
                header('Location: https://wayloa.000webhostapp.com/index.php');
                exit;
            }

            // Obtener el número total de propiedades y ciudades
            $totalPropiedades = $this->model->contarPropiedades();
            $totalCiudades = $this->model->contarCiudades();

            // Obtener los usuarios
            $usuarios = $this->obtenerUsuarios($limit);

            // Pasar los resultados a la vista
            require_once 'principal.php';
            return ['totalPropiedades' => $totalPropiedades, 'totalCiudades' => $totalCiudades, 'usuarios' => $usuarios];
        }

        
        // Función para registrar un usuario
        public function registrarUsuario($u_tipo, $nombre, $apellido, $email, $clave) {
            // Verificar si ya existe un usuario con el correo electrónico proporcionado
            if ($this->model->existeUsuario($email)) {
                return "Ya existe un usuario con el correo electrónico $email.";
            }

            // Registra el usuario usando el modelo
            $resultado = $this->model->registrarUsuario($u_tipo, $nombre, $apellido, $email, $clave);

            // Devolver un mensaje de éxito o de error
            return $resultado ? "Sea registrado con éxito." : "Error al registrar el usuario.";
        }
    }    
?>