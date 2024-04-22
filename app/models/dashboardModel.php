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
        
        
        public function obtenerUsuarios($limit = 4) {
            // Asegurarse de que el límite es un número entero
            $limit = (int) $limit;

            // Preparar la declaración SQL
            $stmt = $this->conectar()->query("SELECT * FROM usuarios LIMIT $limit");

            // Ejecutar la declaración SQL
            $stmt->execute();

            // Devolver los usuarios
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function registrarUsuario($tipo, $nombre, $apellido, $email, $clave) {
            try {
                // Conectar a la base de datos
                $conexion = $this->conectar();

                // Preparar la declaración SQL
                $stmt = $conexion->prepare("INSERT INTO usuarios (u_tipo, u_nombre, u_apellido, u_email, u_clave, u_foto, u_creado) VALUES (:tipo, :nombre, :apellido, :email, :clave, :foto, NOW())");

                // Vincular los parámetros
                $stmt->bindValue(':tipo', $tipo);
                $stmt->bindValue(':nombre', $nombre);
                $stmt->bindValue(':apellido', $apellido);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':clave', password_hash($clave, PASSWORD_DEFAULT)); // Encriptamos la contraseña
                $stmt->bindValue(':foto', '../users/Vista/fotos/image.png'); // La ruta a la foto predeterminada

                // Ejecutar la declaración SQL
                $stmt->execute();

                // Devolver true si la inserción fue exitosa
                return true;
            } catch(PDOException $e) {
                echo "Error al registrar el usuario: " . $e->getMessage();
                return false;
            }
        }
        

        public function existeUsuario($email) {
            try {
                // Conectar a la base de datos
                $conexion = $this->conectar();

                // Preparar la declaración SQL
                $stmt = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE u_email = :email");

                // Vincular los parámetros
                $stmt->bindValue(':email', $email);

                // Ejecutar la declaración SQL
                $stmt->execute();

                // Obtener el número de usuarios con el correo electrónico proporcionado
                $numUsuarios = $stmt->fetchColumn();

                // Devolver true si el correo electrónico ya existe, false en caso contrario
                return $numUsuarios > 0;
            } catch(PDOException $e) {
                echo "Error al verificar la existencia del usuario: " . $e->getMessage();
                return false;
            }
        }
        
        

    }
?>        