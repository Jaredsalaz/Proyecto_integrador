<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){

        require_once(__DIR__ . "/../../config/server.php");

    }


    class dashboardModel{
        private $server=DB_SERVER;
        private $db=DB_NAME;
        private $user=DB_USER;
        private $pass=DB_PASS;
        
        //funcion para conectar a la base de datos
        protected function conectar(){
            try{
                $conexion=new PDO("mysql:host=".$this->server.";dbname=".$this->db.";charset=utf8mb4",$this->user,$this->pass);
                $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                return $conexion;
            }catch(PDOException $e){
                echo "Error en la conexion a la base de datos: ".$e->getMessage();
            }
        }

        public function contarPropiedades() {
            // Preparar la declaración SQL
            $stmt = $this->conectar()->prepare("SELECT COUNT(*) FROM propiedades");

            // Ejecutar la declaración SQL
            $stmt->execute();

            // Devolver el número total de propiedades
            return $stmt->fetchColumn();
        }

        public function contarCiudades() {
            // Preparar la declaración SQL
            $stmt = $this->conectar()->prepare("SELECT COUNT(*) FROM ciudades");

            // Ejecutar la declaración SQL
            $stmt->execute();

            // Devolver el número total de ciudades
            return $stmt->fetchColumn();
        }
        

    }
?>        