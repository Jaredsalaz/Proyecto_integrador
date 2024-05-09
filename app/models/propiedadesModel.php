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

        // funcion para mostrar las cards de las propiedades
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

            // Ejecutamos la consulta y obtener los resultados.
            $stmt = $this->conectar()->prepare($query);
            $stmt->execute();

            // Devolver los resultados.
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //funcion para buscar propiedades por ciudad o titulo
        public function searchPropiedades($query, $filters = []) {
            $query = "%$query%";
            $params = [$query, $query];

            $sql = "
                SELECT 
                    propiedades.*, 
                    ciudades.nombre_ciudad, 
                    paises.nombre_pais
                FROM propiedades
                INNER JOIN ciudades ON propiedades.ciudad = ciudades.id
                INNER JOIN paises ON propiedades.pais = paises.id
                WHERE (propiedades.titulo LIKE ? OR ciudades.nombre_ciudad LIKE ?)
            ";

            if (!empty($filters['tipo'])) {
                $filters['tipo'] = is_array($filters['tipo']) ? $filters['tipo'] : [$filters['tipo']];
                $sql .= " AND propiedades.tipo IN (" . implode(',', array_map(function() { return '?'; }, $filters['tipo'])) . ")";
                $params = array_merge($params, $filters['tipo']);
            }
            if (!empty($filters['estado'])) {
                $filters['estado'] = is_array($filters['estado']) ? $filters['estado'] : [$filters['estado']];
                $sql .= " AND propiedades.estado IN (" . implode(',', array_map(function() { return '?'; }, $filters['estado'])) . ")";
                $params = array_merge($params, $filters['estado']);
            }

            $stmt = $this->conectar()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }

        
        //funcion para filtrar propiedades
        public function filterPropiedades($filters) {
            // Iniciar la consulta SQL
            $sql = "
                SELECT 
                    propiedades.*, 
                    ciudades.nombre_ciudad, 
                    paises.nombre_pais,
                    tipos.nombre_tipo
                FROM propiedades
                INNER JOIN ciudades ON propiedades.ciudad = ciudades.id
                INNER JOIN paises ON propiedades.pais = paises.id
                INNER JOIN tipos ON propiedades.tipo = tipos.id
                WHERE 1=1
            ";

            // Agregamos condiciones a la consulta SQL para cada filtro
            $params = [];
            if (!empty($filters['tipo'])) {
                $filters['tipo'] = is_array($filters['tipo']) ? $filters['tipo'] : [$filters['tipo']];
                $sql .= " AND propiedades.tipo IN (" . implode(',', array_map(function() { return '?'; }, $filters['tipo'])) . ")";
                $params = array_merge($params, $filters['tipo']);
            }
            if (!empty($filters['estado'])) {
                $filters['estado'] = is_array($filters['estado']) ? $filters['estado'] : [$filters['estado']];
                $sql .= " AND propiedades.estado IN (" . implode(',', array_map(function() { return '?'; }, $filters['estado'])) . ")";
                $params = array_merge($params, $filters['estado']);
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
            if (!empty($filters['precio_min'])) {
                $sql .= " AND propiedades.precio >= ?";
                $params[] = $filters['precio_min'];
            }
            if (!empty($filters['precio_max'])) {
                $sql .= " AND propiedades.precio <= ?";
                $params[] = $filters['precio_max'];
            }
            if (!empty($filters['query'])) {
                $sql .= " AND (propiedades.titulo LIKE ? OR ciudades.nombre_ciudad LIKE ?)";
                $params[] = '%' . $filters['query'] . '%';
                $params[] = '%' . $filters['query'] . '%';
            }
            // Agregar el filtro de categoría
            if (!empty($filters['categoria'])) {
                $sql .= " AND tipos.nombre_tipo = ?";
                $params[] = $filters['categoria'];
            }

            // Prepararamos y ejecutar la consulta SQL
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

        //funcion para obtener los estados de las propiedades
        public function getEstados() {
            $sql = "SELECT DISTINCT estado FROM propiedades";
            $stmt = $this->conectar()->prepare($sql);
            $stmt->execute();
            if ($stmt === false) {
                $this->error = $this->conectar()->errorInfo();
                return false;
            }
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }
        
        
    }
?>