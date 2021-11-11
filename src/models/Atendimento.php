<?php

namespace src\models;

use \core\Model;

class Atendimento extends Model
{

    private $ateId;
    private $qtProd;
    private $vlProd;
    private $mesProd;
    private $mesCom;

    function getAteId()
    {
        return $this->ateId;
    }

    function getQtProd()
    {
        return $this->qtProd;
    }

    function getVlProd()
    {
        return $this->vlProd;
    }

    function getMesProd()
    {
        return $this->mesProd;
    }

    function getMesCom()
    {
        return $this->mesCom;
    }

    function setAteId($ateId)
    {
        $this->ateId = $ateId;
    }

    function setQtProd($qtProd)
    {
        $this->qtProd = $qtProd;
    }

    function setVlProd($vlProd)
    {
        $this->vlProd = $vlProd;
    }

    function setMesProd($mesProd)
    {
        $this->mesProd = $mesProd;
    }

    function setMesCom($mesCom)
    {
        $this->mesCom = $mesCom;
    }
}
