<?php

namespace src\models;

use core\Database;
use \core\Model;
use PDO;

class Comanda extends Model {

    private $comId;
    private $comPag;
    private $comTotal;
    private $comCpf;
    private $comData;
    private $comVlGarc;
    private $comFunc;

    function getComId() {
        return $this->comId;
    }

    function getComPag() {
        return $this->comPag;
    }

    function getComTotal() {
        return $this->comTotal;
    }

    function getComCpf() {
        return $this->comCpf;
    }

    function getComData() {
        return $this->comData;
    }

    function getComVlGarc() {
        return $this->comVlGarc;
    }

    function getComFunc() {
        return $this->comFunc;
    }

    function setComId($comId) {
        $this->comId = $comId;
    }

    function setComPag($comPag) {
        $this->comPag = $comPag;
    }

    function setComTotal($comTotal) {
        $this->comTotal = $comTotal;
    }

    function setComCpf($comCpf) {
        $this->comCpf = $comCpf;
    }

    function setComData($comData) {
        $this->comData = $comData;
    }

    function setComVlGarc($comVlGarc) {
        $this->comVlGarc = $comVlGarc;
    }

    function setComFunc($comFunc) {
        $this->comFunc = $comFunc;
    }

}
