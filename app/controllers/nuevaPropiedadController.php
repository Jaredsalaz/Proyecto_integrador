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
            $idPropiedad = $this->model->insertarPropiedad($datos);
            if ($idPropiedad) {
                // La propiedad se insertó correctamente, ahora podemos insertar las fotos
                foreach ($_FILES['fotos']['name'] as $key => $name) {
                    $datosFoto = [
                        'id_propiedad' => $idPropiedad,
                        'nombre_foto' => $name,
                        // ...
                    ];
                    if (!$this->model->insertarFoto($datosFoto)) {
                        die('Error al insertar la foto');
                    }
                }
            } else {
                die('Error al insertar la propiedad');
            }
        }

        public function insertarFoto($datos){
            return $this->model->insertarFoto($datos);
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