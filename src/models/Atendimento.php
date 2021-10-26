<?php

namespace src\models;

use core\Database;
use \core\Model;
use PDO;

class Atendimento extends Model {

    private $mesId;
    private $numMesa;
    private $qtProd;
    private $vlProd;
    private $mesProd;
    private $mesCom;

    function getMesId() {
        return $this->mesId;
    }

    function getNumMesa() {
        return $this->numMesa;
    }

    function getQtProd() {
        return $this->qtProd;
    }

    function getVlProd() {
        return $this->vlProd;
    }

    function getMesProd() {
        return $this->mesProd;
    }

    function getMesCom() {
        return $this->mesCom;
    }

    function setMesId($mesId) {
        $this->mesId = $mesId;
    }

    function setNumMesa($numMesa) {
        $this->numMesa = $numMesa;
    }

    function setQtProd($qtProd) {
        $this->qtProd = $qtProd;
    }

    function setVlProd($vlProd) {
        $this->vlProd = $vlProd;
    }

    function setMesProd($mesProd) {
        $this->mesProd = $mesProd;
    }

    function setMesCom($mesCom) {
        $this->mesCom = $mesCom;
    }

}
