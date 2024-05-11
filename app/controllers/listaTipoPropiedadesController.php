<?php
namespace app\controllers;
use app\models\listaTipoPropiedadesModel;
use PDOException;

class listaTipoPropiedadesController {
    private $model;

    // En el constructor, instanciamos el modelo
    public function __construct() {
        $this->model = new listaTipoPropiedadesModel();
    }
    // mostramos los tipos de propiedades
    public function getTiposPropiedades() {
        return $this->model->getTiposPropiedades();
    }
    // Actualizamos el tipo de propiedad
    public function updateTipoPropiedad($id, $nombre_tipo) {
        return $this->model->updateTipoPropiedad($id, $nombre_tipo);
    }
    // Eliminamos el tipo de propiedad
    public function deleteTipoPropiedad($id) {
        return $this->model->deleteTipoPropiedad($id);
    }
}
?>