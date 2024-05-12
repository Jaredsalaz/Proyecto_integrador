<?php

namespace app\controllers;

use app\models\listaCiudadesModel;

class listaCiudadesController
{
    private $model;

    public function __construct()
    {
        $this->model = new listaCiudadesModel();
    }
    //Mostrar las ciudades
    public function getCiudades()
    {
        return $this->model->getCiudades();
    }
    //Actualizar las ciudades
    public function updateCiudades($id, $nombre_ciudad) {
        $model = new listaCiudadesModel();
        return $model->updateCiudades($id, $nombre_ciudad);
    }
    //Eliminar las ciudades
    public function deleteCiudades($id)
    {
        return $this->model->deleteCiudades($id);
    }
}