<?php

namespace src\models;

use core\Database;
use \core\Model;
use PDO;

class Fornecedor extends Model {

    private $forId;
    private $forRazao;
    private $forDdd;
    private $forTel;
    private $forCnpj;
    private $forEnd;

    function getForId() {
        return $this->forId;
    }

    function getForRazao() {
        return $this->forRazao;
    }

    function getForDdd() {
        return $this->forDdd;
    }

    function getForTel() {
        return $this->forTel;
    }

    function getForCnpj() {
        return $this->forCnpj;
    }

    function getForEnd() {
        return $this->forEnd;
    }

    function setForId($forId) {
        $this->forId = $forId;
    }

    function setForRazao($forRazao) {
        $this->forRazao = $forRazao;
    }

    function setForDdd($forDdd) {
        $this->forDdd = $forDdd;
    }

    function setForTel($forTel) {
        $this->forTel = $forTel;
    }

    function setForCnpj($forCnpj) {
        $this->forCnpj = $forCnpj;
    }

    function setForEnd($forEnd) {
        $this->forEnd = $forEnd;
    }

}
