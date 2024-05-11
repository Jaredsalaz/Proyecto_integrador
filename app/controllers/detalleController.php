<?php
    namespace app\controllers;
    use app\models\detalleModel;

    class detalleController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new detalleModel();
        }
        
        // Función para obtener los detalles de una propiedad
        public function detallePropiedad() {
            // Obtén el ID de la propiedad desde la URL o la entrada del usuario
            $id = $_GET['id'];

            // Usamos el modelo para obtener los detalles de la propiedad
            $propiedad = $this->model->getPropiedadById($id);

            // Extrae la imagen principal
            $imagen_principal = $propiedad['url_foto_principal'];

            // Extrae las imágenes de la galería
            $galeria = [];
            for ($i = 1; $i <= 10; $i++) { 
                if (!empty($propiedad['foto_galeria_' . $i])) {
                    $galeria[] = $propiedad['foto_galeria_' . $i];
                }
            }

            // Devuelve los detalles de la propiedad
            return [
                'imagen_principal' => $imagen_principal, 
                'galeria' => $galeria,
                'dimensiones' => $propiedad['dimensiones'],
                'habitaciones' => $propiedad['habitaciones'],
                'banios' => $propiedad['banios'],
                'garage' => $propiedad['garage'],
                'precio' => $propiedad['precio'],
                'moneda' => $propiedad['moneda'],
                'estado' => $propiedad['estado']
            ];
        }
        
    }
?>