<?php
    namespace app\controllers;
    use app\models\propiedadesModel;

    class propiedadesController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new propiedadesModel();
        }

        
        public function getPropiedades($filters = []) {
            $propiedades = $this->model->filterPropiedades($filters);
            if ($propiedades === false) {
                echo "Error: " . $this->model->getError();
                die();
            }
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
        // filterPropiedades 
        public function filterPropiedades($filters) {
            // Llamar al método filterPropiedades del modelo y capturar el resultado
            $resultado = $this->model->filterPropiedades($filters);

            // Comprobar el resultado
            if($resultado !== false) {
                // El filtrado fue exitoso
                return $resultado;
            } else {
                die('Error al realizar el filtrado');
            }
        }
        // obtenemos los tipos de propiedades
        public function getTipos() {
            $tipos = $this->model->getTipos();
            if ($tipos === false) {
                echo "Error: " . $this->model->getError();
                die();
            }
            return $tipos;
        }
        
    
    }
?>   