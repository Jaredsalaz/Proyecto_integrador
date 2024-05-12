<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){
        require_once(__DIR__ . "/../../config/server.php");
    }

    class  listaCiudadesModel {
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
        public function getCiudades() {
            try {
                $conexion = $this->conectar();
    
                // Fetch all cities with their corresponding country name
                $sql = "SELECT ciudades.*, paises.nombre_pais FROM ciudades INNER JOIN paises ON ciudades.id_pais = paises.id";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
    
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error al obtener las ciudades: " . $e->getMessage();
                return [];
            }
        }
        public function updateCiudades($id, $nombre_ciudad) {
            try {
                $conexion = $this->conectar();
                $sql = "UPDATE ciudades SET nombre_ciudad = :nombre_ciudad WHERE id = :id";
                $stmt = $conexion->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nombre_ciudad', $nombre_ciudad);
                $stmt->execute();

                // Devolver true si la actualización fue exitosa
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                // Manejar error
                return false;
            }
        }
        public function deleteCiudades($id) {
            try {
                $conexion = $this->conectar();
                $sql = "DELETE FROM ciudades WHERE id = :id";
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