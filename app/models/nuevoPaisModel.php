<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){
        require_once(__DIR__ . "/../../config/server.php");
    }

    class  nuevoPaisModel{
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
        public function addPais($pais) {
            $conexion = $this->conectar();

            // Verificar si el país ya existe
            $sql = "SELECT * FROM paises WHERE nombre_pais = :pais";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':pais', $pais);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // El país ya existe
                return 'exists';
            }

            // Insertar el nuevo país
            $sql = "INSERT INTO paises (nombre_pais) VALUES (:pais)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':pais', $pais);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // El país se agregó con éxito
                return 'success';
            } else {
                // Ocurrió un error
                return 'error';
            }
        }
    }
?>
