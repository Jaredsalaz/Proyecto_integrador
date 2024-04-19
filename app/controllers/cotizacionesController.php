<?php

namespace app\controllers;
use app\models\cotizacionesModel;


class cotizacionesController {
    private $model;

    public function __construct() {
        $this->model = new cotizacionesModel();
    }

    
    public function procesarFormulario() {
        // Recoger los valores enviados por el formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $mensaje = $_POST['mensaje'];

        // Llamar al método del modelo para enviar el correo electrónico
        $correoEnviado = $this->model->enviarCorreo($nombre, $apellido, $telefono, $correo, $mensaje);

        // Verificar si el correo fue enviado correctamente
        if ($correoEnviado) {
            // El correo se envió correctamente
            return ['status' => 'success', 'message' => 'El correo se envió correctamente.'];
        } else {
            // Hubo un error al enviar el correo
            return ['status' => 'error', 'message' => 'Hubo un error al enviar el correo. Por favor, inténtalo de nuevo.'];
        }
    }
}
?>