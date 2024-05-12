<?php
    namespace app\controllers;
    use app\models\detalleModel;

    class detalleController{
        private $model;

        public function __construct(){
            $this->model = new detalleModel();
        }
        
        public function detallePropiedad() {
            $id = $_GET['id'] ?? null; // Si 'id' no está definido, se asigna null

            $propiedad = $this->model->getPropiedadById($id);

            // Verifica si las claves existen antes de acceder a ellas
            $imagen_principal = $propiedad['url_foto_principal'] ?? null;
            $dimensiones = $propiedad['dimensiones'] ?? null;
            $habitaciones = $propiedad['habitaciones'] ?? null;
            $banios = $propiedad['banios'] ?? null;
            $garage = $propiedad['garage'] ?? null;
            $precio = $propiedad['precio'] ?? null;
            $moneda = $propiedad['moneda'] ?? null;
            $estado = $propiedad['estado'] ?? null;
            $ubicacion = $propiedad['ubicacion'] ?? null;
            $nombre_ciudad = $propiedad['nombre_ciudad'] ?? null;
            $nombre_pais = $propiedad['nombre_pais'] ?? null;
            $descripcion = $propiedad['descripcion'] ?? null;
            $nombre = $propiedad['nombre'] ?? null;
            $apellido = $propiedad['apellido'] ?? null;
            $pisos = $propiedad['pisos'] ?? null;
            $telefono = $propiedad['telefono'] ?? null;

            $galeria = [];
            for ($i = 1; $i <= 10; $i++) { 
                $galeria[] = $propiedad['foto_galeria_' . $i] ?? null;
            }

            return [
                'imagen_principal' => $imagen_principal, 
                'galeria' => $galeria,
                'dimensiones' => $dimensiones,
                'habitaciones' => $habitaciones,
                'banios' => $banios,
                'garage' => $garage,
                'precio' => $precio,
                'moneda' => $moneda,
                'estado' => $estado,
                'ubicacion' => $ubicacion,
                'nombre_ciudad' => $nombre_ciudad,
                'nombre_pais' => $nombre_pais,
                'descripcion' => $descripcion,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'pisos' => $pisos,
                'telefono' => $telefono
            ];
        }

        public function registrarUsuario($nombre, $apellido, $email, $clave, $idPropiedad) {
            $modelo = new \app\models\detalleModel();

            if ($modelo->existeUsuario($email)) {
                return "Ya existe un usuario con el correo electrónico $email.";
            }

            $resultado = $modelo->registrarUsuario($nombre, $apellido, $email, $clave, $idPropiedad);

            if ($resultado) {
                // Si el registro fue exitoso, iniciamos sesión automáticamente
                $resultadoSesion = $modelo->iniciarSesion($email, $clave);
                if ($resultadoSesion) {
                    return "Se ha registrado con éxito y se ha iniciado sesión.";
                } else {
                    return "Se ha registrado con éxito, pero no se pudo iniciar sesión automáticamente.";
                }
            } else {
                return "Error al registrar el usuario.";
            }
        }
        public function iniciarSesion($email, $clave) {
            $modelo = new \app\models\detalleModel();

            $resultado = $modelo->iniciarSesion($email, $clave);

            if ($resultado) {
                return "Inicio de sesión exitoso.";
            } else {
                return "Error al iniciar sesión.";
            }
        }
    }
?>