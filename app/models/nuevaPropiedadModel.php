<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){
        require_once(__DIR__ . "/../../config/server.php");
    }

    class nuevaPropiedadModel {
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

        public function insertarPropiedad($datos) {
            $conexion = $this->conectar();
            $sql = 'INSERT INTO propiedades (fecha_alta, titulo, descripcion, tipo, estado, ubicacion, habitaciones, banios, pisos, garage, dimensiones, precio, moneda, url_foto_principal, pais, ciudad, propietario, telefono_propietario, asesor_id) VALUES (:fecha_alta, :titulo, :descripcion, :tipo, :estado, :ubicacion, :habitaciones, :banios, :pisos, :garage, :dimensiones, :precio, :moneda, :url_foto_principal, :pais, :ciudad, :propietario, :telefono_propietario, :asesor_id)';
            $stmt = $conexion->prepare($sql);
            
            // Bind values
            // Aquí  vinculamos cada valor con su respectivo parámetro en la consulta SQL
            $stmt->bindParam(':fecha_alta', $datos['fecha_alta']);
            $stmt->bindParam(':titulo', $datos['titulo']);
            $stmt->bindParam(':descripcion', $datos['descripcion']);
            $stmt->bindParam(':tipo', $datos['tipo']);
            $stmt->bindParam(':estado', $datos['estado']);
            $stmt->bindParam(':ubicacion', $datos['ubicacion']);
            $stmt->bindParam(':habitaciones', $datos['habitaciones']);
            $stmt->bindParam(':banios', $datos['banios']);
            $stmt->bindParam(':pisos', $datos['pisos']);
            $stmt->bindParam(':garage', $datos['garage']);
            $stmt->bindParam(':dimensiones', $datos['dimensiones']);
            $stmt->bindParam(':precio', $datos['precio']);
            $stmt->bindParam(':moneda', $datos['moneda']);
            $stmt->bindParam(':url_foto_principal', $datos['url_foto_principal']);
            $stmt->bindParam(':pais', $datos['pais']);
            $stmt->bindParam(':ciudad', $datos['ciudad']);
            $stmt->bindParam(':propietario', $datos['propietario']);
            $stmt->bindParam(':telefono_propietario', $datos['telefono_propietario']);
            $stmt->bindParam(':asesor_id', $datos['asesor_id']);
            
            // Execute
            if($stmt->execute()){
                // Return el ID de la inserted property
                return $conexion->lastInsertId();
            } else {
                return false;
            }
        }    

        
        public function insertarFoto($datos) {
            if (!isset($datos['id_propiedad'])) {
                // Handle the case where 'id_propiedad' is not set
                return false;
            }

            $conexion = $this->conectar();
            $stmt = $conexion->prepare('INSERT INTO fotos (id_propiedad, nombre_foto) VALUES (:id_propiedad, :nombre_foto)');
                
            // Bind values
            $stmt->bindParam(':id_propiedad', $datos['id_propiedad']);
            $stmt->bindParam(':nombre_foto', $datos['nombre_foto']);

            // Execute
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }
    
        
        public function obtenerAsesores() {
            $conexion = $this->conectar();
            $stmt = $conexion->prepare("SELECT * FROM asesores");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function obtenerTipos() {
            $conexion = $this->conectar();
            $stmt = $conexion->prepare("SELECT * FROM tipos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function obtenerPaises() {
            $conexion = $this->conectar();
            $stmt = $conexion->prepare("SELECT * FROM paises");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        
        public function obtenerCiudades() {
            $conexion = $this->conectar();
            $stmt = $conexion->prepare("SELECT * FROM ciudades");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        
    }
?>