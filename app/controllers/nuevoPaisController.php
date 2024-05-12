<?php
namespace app\controllers;
use app\models\nuevoPaisModel;
use PDOException;

    class nuevoPaisController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new nuevoPaisModel();
        }

        public function addPais($pais) {
            // Intenta agregar el país
            $result = $this->model->addPais($pais);
    
            // Devuelve el resultado
            return $result;
        }
    }
?>