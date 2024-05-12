<?php
namespace app\controllers;
use app\models\listaPaisesModel;
use PDOException;

class listaPaisesController {
    private $model;

    // En el constructor, instanciamos el modelo
    public function __construct() {
        $this->model = new listaPaisesModel();
    }
    // mostramos los paises
    public function getPaises() {
        return $this->model->getPaises();
    }
    // Actualizamos el pais
    public function updatePais($id, $nombre_pais) {
        return $this->model->updatePais($id, $nombre_pais);
    }
    // Eliminamos el pais
    public function deletePais($id) {
        return $this->model->deletePais($id);
    }
}
?>