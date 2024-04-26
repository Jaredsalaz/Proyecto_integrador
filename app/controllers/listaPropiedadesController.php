<?php
    namespace app\controllers;
    use app\models\listaPropiedadesModel;

    class listaPropiedadesController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new listaPropiedadesModel();
        }

        // Función para obtener todas las propiedades
        public function obtenerTodasLasPropiedades() {
            // Llamamos a la función getPropiedades del modelo
            $propiedades = $this->model->getPropiedades();

            // Devolvemos las propiedades
            return $propiedades;
        }
    }    