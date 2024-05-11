<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){
        require_once(__DIR__ . "/../../config/server.php");
    }

    class  nuevoTipoPropiedadModel{
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
        public function addTipoPropiedad($tipo) {
            $conexion = $this->conectar();

            // Check if the property type already exists
            $sql = "SELECT * FROM tipos WHERE nombre_tipo = :tipo";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // The property type already exists
                return 'exists';
            }

            // Insert the new property type
            $sql = "INSERT INTO tipos (nombre_tipo) VALUES (:tipo)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // The property type was added successfully
                return 'success';
            } else {
                // An error occurred
                return 'error';
            }
        }
        
    }
?>
