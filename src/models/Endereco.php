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
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

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

    public function inserirEndereco(Endereco $end)
    {

        $sql = $this->pdo->prepare(
            "INSERT INTO ENDERECOS (END_LOGR, END_NUM, END_CEP, END_CITY, END_DISTRIC, END_UF) VALUE (?,?,?,?,?,?)"
        );
        $sql->bindValue(1, $end->getEndLogr());
        $sql->bindValue(2, $end->getEndNum());
        $sql->bindValue(3, $end->getEndCep());
        $sql->bindValue(4, $end->getEndCity());
        $sql->bindValue(5, $end->getEndDistric());
        $sql->bindValue(6, $end->getEndUf());
        $sql->execute();




        /*return $this->pdo->lastInsertId();*/
    }
}
