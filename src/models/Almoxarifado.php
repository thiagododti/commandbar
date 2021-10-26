<?php

namespace src\models;

use core\Database;
use \core\Model;
use PDO;

class Almoxarifado extends Model {

    private $estId;
    private $qtFornecida;
    private $dtEntrada;
    private $almForn;
    private $almProd;

    function getEstId() {
        return $this->estId;
    }

    function getQtFornecida() {
        return $this->qtFornecida;
    }

    function getDtEntrada() {
        return $this->dtEntrada;
    }

    function getAlmForn() {
        return $this->almForn;
    }

    function getAlmProd() {
        return $this->almProd;
    }

    function setEstId($estId) {
        $this->estId = $estId;
    }

    function setQtFornecida($qtFornecida) {
        $this->qtFornecida = $qtFornecida;
    }

    function setDtEntrada($dtEntrada) {
        $this->dtEntrada = $dtEntrada;
    }

    function setAlmForn($almForn) {
        $this->almForn = $almForn;
    }

    function setAlmProd($almProd) {
        $this->almProd = $almProd;
    }

}
