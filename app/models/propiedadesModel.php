<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){

        require_once(__DIR__ . "/../../config/server.php");

    }


    class propiedadesModel{
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
        public function getPropiedadesConCiudadPais() {
            //  Dentro de esta función, creamos una consulta SQL que una las tres tablas.
            $query = "
                SELECT 
                    propiedades.titulo, 
                    propiedades.url_foto_principal, 
                    propiedades.foto_galeria_1, 
                    propiedades.foto_galeria_2, 
                    propiedades.foto_galeria_3, 
                    propiedades.foto_galeria_4, 
                    propiedades.foto_galeria_5, 
                    propiedades.foto_galeria_6, 
                    propiedades.foto_galeria_7, 
                    propiedades.foto_galeria_8, 
                    propiedades.foto_galeria_9, 
                    propiedades.foto_galeria_10, 
                    propiedades.ubicacion, 
                    propiedades.estado,
                    propiedades.precio, 
                    ciudades.nombre_ciudad, 
                    paises.nombre_pais
                FROM propiedades
                INNER JOIN ciudades ON propiedades.ciudad = ciudades.id
                INNER JOIN paises ON propiedades.pais = paises.id
            ";

            // Ejecutar la consulta y obtener los resultados.
            $stmt = $this->conectar()->prepare($query);
            $stmt->execute();

            // Devolver los resultados.
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        //funcion para buscar propiedades por ciudad o titulo
        /*esta consulta encontraría propiedades cuyo título contenga    
        la palabra "casa" o cuya ciudad contenga la palabra "casa".*/
        public function searchPropiedades($query) {
            $query = "%$query%";
            $sql = "
                SELECT 
                    propiedades.*, 
                    ciudades.nombre_ciudad, 
                    paises.nombre_pais
                FROM propiedades
                INNER JOIN ciudades ON propiedades.ciudad = ciudades.id
                INNER JOIN paises ON propiedades.pais = paises.id
                WHERE propiedades.titulo LIKE ? OR ciudades.nombre_ciudad LIKE ?
            ";
            $stmt = $this->conectar()->prepare($sql);
            $stmt->execute([$query, $query]);
            return $stmt->fetchAll();
        }
        //funcion para filtrar propiedades
        public function filterPropiedades($filters) {
            // Iniciar la consulta SQL
            $sql = "
                SELECT 
                    propiedades.*, 
                    ciudades.nombre_ciudad, 
                    paises.nombre_pais
                FROM propiedades
                INNER JOIN ciudades ON propiedades.ciudad = ciudades.id
                INNER JOIN paises ON propiedades.pais = paises.id
                WHERE 1=1
            ";

            // Agregar condiciones a la consulta SQL para cada filtro
            $params = [];
            if (!empty($filters['tipo'])) {
                $sql .= " AND propiedades.tipo = ?";
                $params[] = $filters['tipo'];
            }
            if (!empty($filters['estado'])) {
                $sql .= " AND propiedades.estado = ?";
                $params[] = $filters['estado'];
            }
            if (!empty($filters['habitaciones'])) {
                $sql .= " AND propiedades.habitaciones >= ?";
                $params[] = $filters['habitaciones'];
            }
            if (!empty($filters['banios'])) {
                $sql .= " AND propiedades.banios >= ?";
                $params[] = $filters['banios'];
            }
            if (!empty($filters['garage'])) {
                $sql .= " AND propiedades.garage >= ?";
                $params[] = $filters['garage'];
            }
            if (!empty($filters['precio'])) {
                $sql .= " AND propiedades.precio <= ?";
                $params[] = $filters['precio'];
            }

            // Preparar y ejecutar la consulta SQL
            $stmt = $this->conectar()->prepare($sql);
            $stmt->execute($params);

            // Devolver los resultados
            return $stmt->fetchAll();
        }
        //funcion para obtener los tipos de propiedades
        public function getTipos() {
            $sql = "SELECT * FROM tipos";
            $stmt = $this->conectar()->prepare($sql);
            $stmt->execute();
            if ($stmt === false) {
                $this->error = $this->conectar()->errorInfo();
                return false;
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }
?>        