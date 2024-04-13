<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){

        require_once(__DIR__ . "/../../config/server.php");

    }


    class indexModel{
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
        // Función para obtener todas las propiedades
        public function obtenerTodasLasPropiedades() {
            try {
                // Conectarse a la base de datos
                $conexion = $this->conectar();

                // Preparar la declaración SQL
                $stmt = $conexion->prepare("SELECT * FROM propiedades");

                // Ejecutar la declaración SQL
                $stmt->execute();

                // Obtener todas las filas como un array asociativo
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Devolver el resultado
                return $result;
            } catch(PDOException $e) {
                echo "Error al obtener las propiedades: " . $e->getMessage();
            }
        }
        
    
        public function registrarUsuario($nombre, $apellido, $email, $clave) {
            try {
                // Conectarse a la base de datos
                $conexion = $this->conectar();

                // Preparar la declaración SQL
                $stmt = $conexion->prepare("INSERT INTO usuarios (u_tipo, u_nombre, u_apellido, u_email, u_clave, u_foto, u_creado) VALUES (:tipo, :nombre, :apellido, :email, :clave, :foto, NOW())");

                // Vincular los parámetros
                $stmt->bindValue(':tipo', 'usuario normal y corriente'); // Todos los nuevos usuarios serán de este tipo
                $stmt->bindValue(':foto', '../users/Vista/fotos/image.png'); //  la ruta a la foto predeterminada
                $stmt->bindValue(':nombre', $nombre);
                $stmt->bindValue(':apellido', $apellido);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':clave', password_hash($clave, PASSWORD_DEFAULT)); // Encriptamos la contraseña

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
                // Conectarse a la base de datos
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
        public function iniciarSesion($email, $clave) {
            try {
                // Conectarse a la base de datos
                $conexion = $this->conectar();

                // Preparar la declaración SQL
                $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE u_email = :email");

                // Vincular los parámetros
                $stmt->bindValue(':email', $email);

                // Ejecutar la declaración SQL
                $stmt->execute();

                // Obtener el usuario con el correo electrónico proporcionado
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar si el usuario existe y la contraseña es correcta
                if ($usuario && password_verify($clave, $usuario['u_clave'])) {
                    // Iniciar sesión y devolver true
                    $_SESSION['usuario'] = $usuario;
                    return true;
                } else {
                    // El usuario no existe o la contraseña es incorrecta, devolver false
                    return false;
                }
            } catch(PDOException $e) {
                echo "Error al iniciar sesión: " . $e->getMessage();
                return false;
            }
        }

       
    }