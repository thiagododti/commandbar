<?php

namespace src\models;

use core\Database;
use \core\Model;
use PDO;

class Endereco extends Model
{

    private $endId;
    private $endLogr;
    private $endNum;
    private $endCep;
    private $endDistric;
    private $endCity;
    private $endUf;

    function getEndId()
    {
        return $this->endId;
    }

    function getEndLogr()
    {
        return $this->endLogr;
    }

    function getEndNum()
    {
        return $this->endNum;
    }

    function getEndCep()
    {
        return $this->endCep;
    }

    function getEndDistric()
    {
        return $this->endDistric;
    }

    function getEndCity()
    {
        return $this->endCity;
    }

    function getEndUf()
    {
        return $this->endUf;
    }

    function setEndId($endId)
    {
        $this->endId = $endId;
    }

    function setEndLogr($endLogr)
    {
        $this->endLogr = $endLogr;
    }

    function setEndNum($endNum)
    {
        $this->endNum = $endNum;
    }

    function setEndCep($endCep)
    {
        $this->endCep = $endCep;
    }

    function setEndDistric($endDistric)
    {
        $this->endDistric = $endDistric;
    }

    function setEndCity($endCity)
    {
        $this->endCity = $endCity;
    }

    function setEndUf($endUf)
    {
        $this->endUf = $endUf;
    }
}
