<?php
    namespace app\controllers;
    use app\models\nuevaPropiedadModel;

    class nuevaPropiedadController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new nuevaPropiedadModel();
        }

        public function insertarPropiedad($datos){
            // Manejamos la subida de las fotos de la galería
            if(isset($_FILES['fotos'])) {
                $fotos = $_FILES['fotos'];

                // Limitar el número de fotos de la galería a 10
                if(count($fotos['name']) > 10) {
                    die('No puedes subir más de 10 fotos para la galería');
                }

                for($i = 0; $i < count($fotos['name']); $i++) {
                    $datosFoto = file_get_contents($fotos['tmp_name'][$i]);
                    if ($datosFoto === false) {
                        die('Error al leer la foto de la galería');
                    }

                    // Asignamos los datos de cada foto de la galería a 'foto_galeria_X'
                    $datos['foto_galeria_' . ($i + 1)] = $datosFoto;
                }
            }

            // Llamar al método insertarPropiedad del modelo y capturar el resultado
            $resultado = $this->model->insertarPropiedad($datos);

            // Comprobar el resultado
            if($resultado !== false) {
                // La propiedad se insertó correctamente
                return $resultado;
            } else {
                die('Error al insertar la propiedad');
            }
        }

        

        public function mostrarFormularioPropiedad() {
            $asesores = $this->model->obtenerAsesores();
            $tipos = $this->model->obtenerTipos();
            $paises = $this->model->obtenerPaises();
            $ciudades = $this->model->obtenerCiudades();

            return ['asesores' => $asesores, 'tipos' => $tipos, 'paises' => $paises, 'ciudades' => $ciudades];
        }
    }
?>