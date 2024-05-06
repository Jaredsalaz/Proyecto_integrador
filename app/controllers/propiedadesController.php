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
        
        // searchPropiedades
        public function searchPropiedades($query) {
            // Llamar al método searchPropiedades del modelo y capturar el resultado
            $resultado = $this->model->searchPropiedades($query);

            // Comprobar el resultado
            if($resultado !== false) {
                // La búsqueda fue exitosa
                return $resultado;
            } else {
                die('Error al realizar la búsqueda');
            }
        }
    }
?>   