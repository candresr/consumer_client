<?php

namespace ConsumerClient;

use ConsumerClient\Resource\Construdata;
use ConsumerClient\Resource\Siab;
use ConsumerClient\Resource\Terceros;

class Main{

    private $siab;
    private $terceros;
    private $construdata;

    public function __construct()
    {
        $this->construdata = new Construdata();
        $this->siab = new Siab();
        $this->terceros = new Terceros();
    }

    /**
     * Crea un caso en Siab
     *
     * @param array $data
     * @return mixed
     */
    public function crearCaso($data = []){
        return $this->siab->crearUserCiencuadras($data);
    }

    /**
     * Consultar un caso en Siab
     *
     * @param array $data
     * @return mixed
     */
    public function estadoCaso($data = []){
        return $this->siab->estadoCaso($data);
    }

    /**
     * Consultar listados en Construdata
     *
     * @param array $data
     * @return mixed
     */
    public function listarCategorias($data = []){
        return $this->construdata->listarCategorias($data);
    }

    /**
     * Crear Cotizacion en Construdata
     *
     * @param array $data
     * @return mixed
     */
    public function crearCotizacion($data = []){
        return $this->construdata->crearCotizacion($data);
    }

    /**
     * Editar Cotizacion en Construdata
     *
     * @param array $data
     * @return mixed
     */
    public function editarCotizacion($data = []){
        return $this->construdata->editarCotizacion($data);
    }

    /**
     * Agregar cantidad en Construdata
     *
     * @param array $data
     * @return mixed
     */
    public function agregarCantidad($data = []){
        return $this->construdata->agregarCantidad($data);
    }

    /**
     * Consultar Cotizacion en Construdata
     *
     * @param array $data
     * @return mixed
     */
    public function consultarCotizacion($data = []){
        return $this->construdata->consultarCotizacion($data);
    }
}