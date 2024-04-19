<?php
    namespace app\models;
    use \PDO;

    if(file_exists(__DIR__ . "/../../config/server.php")){

        require_once(__DIR__ . "/../../config/server.php");

    }


    class cotizacionesModel{
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
        
 
    
        public function enviarCorreo($nombre, $apellido, $telefono, $correo, $mensaje) {
            $to = $correo;
            $subject = 'Cotizacion Wayloa';
            $message = 'Estamos procesando su solicitud de cotización. Nos pondremos en contacto con usted lo antes posible, le asignaremos un Asesor, Gracias por elegir Wayloa.';
            $headers = 'From: jaredsalazajdss@gmail.com' . "\r\n" .
                       'Reply-To: jaredsalazajdss@gmail.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();

            if(mail($to, $subject, $message, $headers)) {
                return ['status' => 'success', 'message' => 'El correo se envió correctamente.'];
            } else {
                return ['status' => 'error', 'message' => 'El mensaje no pudo ser enviado.'];
            }
        }
    
    
        
        
    } 
?>