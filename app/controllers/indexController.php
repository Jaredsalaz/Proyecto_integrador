<?php
    namespace app\controllers;
    use app\models\indexModel;

    class indexController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new indexModel();
        }

        // Función para obtener todas las propiedades
        public function obtenerTodasLasPropiedades() {
            // Llamamos a la función obtenerTodasLasPropiedades del modelo
            $propiedades = $this->model->obtenerTodasLasPropiedades();

            // Devolvemos las propiedades
            return $propiedades;
        }

        // Función para registrar un usuario
        public function registrarUsuario($nombre, $apellido, $email, $clave) {
            // Crear una instancia del modelo
            $modelo = new \app\models\indexModel();

            // Verificar si ya existe un usuario con el correo electrónico proporcionado
            if ($modelo->existeUsuario($email)) {
                return "Ya existe un usuario con el correo electrónico $email.";
            }

            // Registra el usuario usando el modelo
            $resultado = $modelo->registrarUsuario($nombre, $apellido, $email, $clave);

            // Devolver un mensaje de éxito o de error
            return $resultado ? "Sea registrado con éxito." : "Error al registrar el usuario.";
        }
       
        public function iniciarSesion($email, $clave) {
            // Crear una instancia del modelo
            $modelo = new \app\models\indexModel();

            // Intentar iniciar sesión y capturar el resultado
            $resultado = $modelo->iniciarSesion($email, $clave);

            // Devolver un mensaje de éxito o de error
            return $resultado ? "Inicio de sesión exitoso." : "Correo electrónico o contraseña incorrectos.";
        }
        
    }