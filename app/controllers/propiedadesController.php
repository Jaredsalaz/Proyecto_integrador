<?php
    namespace app\controllers;
    use app\models\propiedadesModel;

    class propiedadesController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new propiedadesModel();
        }

        public function getPropiedades() {
            // Llamamos a la función getPropiedadesConCiudadPais del modelo
            $propiedades = $this->model->getPropiedadesConCiudadPais();

            // Devolvemos las propiedades
            return $propiedades;
        }
    }
?>   