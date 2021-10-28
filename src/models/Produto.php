<?php

namespace src\models;

use \core\Model;

class Produto extends Model
{

    private $prodId;
    private $prodStat;
    private $prodValor;
    private $prodQtd;
    private $prodMarca;
    private $prodCateg;
    private $prodDesc;

    function getProdId()
    {
        return $this->prodId;
    }

    function getProdStat()
    {
        return $this->prodStat;
    }

    function getProdValor()
    {
        return $this->prodValor;
    }

    function getProdQtd()
    {
        return $this->prodQtd;
    }

    function getProdMarca()
    {
        return $this->prodMarca;
    }

    function getProdCateg()
    {
        return $this->prodCateg;
    }

    function getProdDesc()
    {
        return $this->prodDesc;
    }

    function setProdId($prodId)
    {
        $this->prodId = $prodId;
    }

    function setProdStat($prodStat)
    {
        $this->prodStat = $prodStat;
    }

    function setProdValor($prodValor)
    {
        $this->prodValor = $prodValor;
    }

    function setProdQtd($prodQtd)
    {
        $this->prodQtd = $prodQtd;
    }

    function setProdMarca($prodMarca)
    {
        $this->prodMarca = $prodMarca;
    }

    function setProdCateg($prodCateg)
    {
        $this->prodCateg = $prodCateg;
    }

    function setProdDesc($prodDesc)
    {
        $this->prodDesc = $prodDesc;
    }
}
