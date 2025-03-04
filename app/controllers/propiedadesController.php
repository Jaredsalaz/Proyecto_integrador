<?php
    namespace app\controllers;
    use app\models\propiedadesModel;

    class propiedadesController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new propiedadesModel();
        }

        //mostrar las cards de las propiedades con la varibale $filters
        public function getPropiedades($filters = []) {
            $propiedades = $this->model->filterPropiedades($filters);
            if ($propiedades === false) {
                echo "Error: " . $this->model->getError();
                return [];
            }
            return $propiedades;
        }
        

        // searchPropiedades
        public function searchPropiedades($query, $filters = []) {
            // Llamar al método searchPropiedades del modelo y capturar el resultado
            $resultado = $this->model->searchPropiedades($query, $filters);

            // Comprobamos el resultado
            if($resultado === false) {
                echo 'Error al realizar la búsqueda';
                return [];
            } else {
                // La búsqueda fue exitosa
                return $resultado;
            }
        }
        // filterPropiedades 
        public function filterPropiedades($filters) {
            // Llamamos al método filterPropiedades del modelo y capturar el resultado
            $resultado = $this->model->filterPropiedades($filters);

            // Comprobamos el resultado
            if($resultado === false) {
                echo 'Error al realizar el filtrado';
                return [];
            } else {
                // El filtrado fue exitoso
                return $resultado;
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
        // obtenemos getEstados
        public function getEstados() {
            $estados = $this->model->getEstados();
            if ($estados === false) {
                echo "Error: " . $this->model->getError();
                die();
            }
            return $estados;
        }
    
    }
?>