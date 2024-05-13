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
            $mail = new PHPMailer(true);

            try {
                // Configuración del servidor
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'administrador@wayloa.com'; // Tu dirección de correo
                $mail->Password = 'Messi18*'; // Tu contraseña de correo
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configuración del correo
                $mail->setFrom('administrador@wayloa.com', 'Wayloa');
                $mail->addAddress($correo, $nombre); // El correo del destinatario
                $mail->isHTML(true);
                $mail->Subject = 'Cotizacion Wayloa';
                $mail->Body = 'Estamos procesando su solicitud de cotización. Nos pondremos en contacto con usted lo antes posible, le asignaremos un Asesor, Gracias por elegir Wayloa.';

                // Enviar el correo
                $mail->send();
                return ['status' => 'success', 'message' => 'El correo se envió correctamente.'];
            } catch (Exception $e) {
                return ['status' => 'error', 'message' => 'El mensaje no pudo ser enviado. Mailer Error: ' . $mail->ErrorInfo];
            }
        }
    
    
        
    } 
?>