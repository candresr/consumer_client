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


}