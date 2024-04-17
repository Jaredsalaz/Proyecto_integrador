<?php
    namespace app\controllers;
    use app\models\dashboardModel;

    class dashboardController{
        private $model;

        // En el constructor, instanciamos el modelo
        public function __construct(){
            $this->model = new dashboardModel();
        }


 
       
        public function mostrarPrincipal() {
            // Obtener el número total de propiedades y ciudades
            $totalPropiedades = $this->model->contarPropiedades();
            $totalCiudades = $this->model->contarCiudades();

            // Pasar los resultados a la vista
            require_once 'principal.php';
            return ['totalPropiedades' => $totalPropiedades, 'totalCiudades' => $totalCiudades];
        }
        
        
    }    
?>