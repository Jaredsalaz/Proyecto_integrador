<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){

        require_once(__DIR__ . "/../../config/server.php");

    }

    class detalleModel{
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
        
        // funcion para mostrar los detalles de una propiedad
        public function getPropiedadById($id) {
            // Nos conectamos a la base de datos
            $conexion = $this->conectar();

            // Preparamos una consulta SQL para obtener los detalles de la propiedad y la información del asesor
            $stmt = $conexion->prepare('
                SELECT 
                    p.titulo, 
                    p.descripcion, 
                    p.habitaciones, 
                    p.banios, 
                    p.pisos, 
                    p.garage, 
                    p.dimensiones, 
                    p.precio,
                    p.estado, 
                    p.moneda, 
                    p.ubicacion, 
                    p.url_foto_principal, 
                    p.foto_galeria_1, 
                    p.foto_galeria_2, 
                    p.foto_galeria_3,
                    p.foto_galeria_4,
                    p.foto_galeria_5,
                    p.foto_galeria_6,
                    p.foto_galeria_7,
                    p.foto_galeria_8,
                    p.foto_galeria_9,
                    p.foto_galeria_10, 
                    a.nombre, 
                    a.apellido, 
                    a.email, 
                    a.telefono,
                    c.nombre_ciudad,
                    pa.nombre_pais
                FROM 
                    propiedades p 
                JOIN 
                    asesores a ON p.asesor_id = a.id 
                JOIN
                    ciudades c ON p.ciudad = c.id
                JOIN
                    paises pa ON p.pais = pa.id
                WHERE 
                    p.id = :id
            ');
            $stmt->execute(['id' => $id]);

            // Obtiene los detalles de la propiedad y la información del asesor
            $propiedad = $stmt->fetch(PDO::FETCH_ASSOC);

            // Comprueba si cada imagen de la galería es NULL y, si lo es, asigna un valor predeterminado
            for ($i = 1; $i <= 10; $i++) {
                $propiedad['foto_galeria_' . $i] = $propiedad['foto_galeria_' . $i] ?? 'ruta/a/imagen/predeterminada.jpg';
            }

            return $propiedad;
        }
        public function registrarUsuario($nombre, $apellido, $email, $clave, $idPropiedad) {
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
                return true;

            } catch(PDOException $e) {
                return false;
            }
        }
        public function iniciarSesion($email, $clave) {
            // Conectarse a la base de datos
            $conexion = $this->conectar();

            // Preparar la declaración SQL
            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE u_email = :email");
            $stmt->execute(['email' => $email]);

            // Obtener el usuario
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verificar la contraseña
            if ($usuario && password_verify($clave, $usuario['u_clave'])) {
                // Iniciar la sesión
                $_SESSION['usuario'] = $usuario;
                return true;
            } else {
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

                // Obtenemos el número de usuarios con el correo electrónico proporcionado
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