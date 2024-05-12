<?php

namespace app\controllers;

use app\models\nuevaCiudadModel;

class nuevaCiudadController
{
    private $model;

    public function __construct()
    {
        $this->model = new nuevaCiudadModel();
    }

    public function index()
    {
        return $this->model->getPaises();
    }

    public function addCiudad($ciudad, $id_pais)
    {
        return $this->model->addCiudad($ciudad, $id_pais);
    }
}