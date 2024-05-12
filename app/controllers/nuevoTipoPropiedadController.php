<?php
namespace app\controllers;
use app\models\nuevoTipoPropiedadModel;
use PDOException;

    class nuevoTipoPropiedadController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new nuevoTipoPropiedadModel();
        }

        public function addTipoPropiedad($tipo) {
            // Intenta agregar el tipo de propiedad
            $result = $this->model->addTipoPropiedad($tipo);
    
            // Devuelve el resultado
            return $result;
        }
    }
?>