<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){
        require_once(__DIR__ . "/../../config/server.php");
    }

    class  listaTipoPropiedadesModel{
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
        public function getTiposPropiedades() {
            try {
                $conexion = $this->conectar();
    
                // Fetch all property types
                $sql = "SELECT * FROM tipos";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
    
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error al obtener los tipos de propiedades: " . $e->getMessage();
                return [];
            }
        }
        public function updateTipoPropiedad($id, $nombre_tipo) {
            try {
                $conexion = $this->conectar();
                $sql = "UPDATE tipos SET nombre_tipo = :nombre_tipo WHERE id = :id";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nombre_tipo', $nombre_tipo);
                $stmt->execute();

                // Devolver true si la actualización fue exitosa
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                // Manejar error
                return false;
            }
        }
        public function deleteTipoPropiedad($id) {
            try {
                $conexion = $this->conectar();
                $sql = "DELETE FROM tipos WHERE id = :id";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                // Devolver true si la eliminación fue exitosa
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                // Manejar error
                return false;
            }
        }

    }
?>    