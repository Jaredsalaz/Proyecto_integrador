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
            $result = $this->model->addTipoPropiedad($tipo);
        
            switch ($result) {
                case 'success':
                    // Display success alert
                    break;
                case 'exists':
                    // Display error alert: "The property type already exists"
                    break;
                case 'error':
                default:
                    // Display error alert: "Error al insertar el tipo de propiedad"
                    break;
            }
        }
    }
?>