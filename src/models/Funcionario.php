<?php

namespace src\models;

use \core\Model;

class Funcionario extends Model
{

    private $funcId;
    private $funcName;
    private $funcSname;
    private $funcCpf;
    private $funcEmail;
    private $funcSal;
    private $funcCarg;
    private $funcAdmDate;
    private $funcDmsDate;
    private $funcPass;
    private $funcToken;
    private $funcEnd;


    function getFuncId()
    {
        return $this->funcId;
    }

    function getFuncName()
    {
        return $this->funcName;
    }

    function getFuncSname()
    {
        return $this->funcSname;
    }

    function getFuncCpf()
    {
        return $this->funcCpf;
    }

    function getFuncEmail()
    {
        return $this->funcEmail;
    }

    function getFuncSal()
    {
        return $this->funcSal;
    }

    function getFuncCarg()
    {
        return $this->funcCarg;
    }

    function getFuncAdmDate()
    {
        return $this->funcAdmDate;
    }

    function getFuncDmsDate()
    {
        return $this->funcDmsDate;
    }

    function getFuncPass()
    {
        return $this->funcPass;
    }

    function getFuncToken()
    {
        return $this->funcToken;
    }

    function getFuncEnd()
    {
        return $this->funcEnd;
    }

    function setFuncId($funcId)
    {
        $this->funcId = $funcId;
    }

    function setFuncName($funcName)
    {
        $this->funcName = $funcName;
    }

    function setFuncSname($funcSname)
    {
        $this->funcSname = $funcSname;
    }

    function setFuncCpf($funcCpf)
    {
        $this->funcCpf = $funcCpf;
    }

    function setFuncEmail($funcEmail)
    {
        $this->funcEmail = $funcEmail;
    }

    function setFuncSal($funcSal)
    {
        $this->funcSal = $funcSal;
    }

    function setFuncCarg($funcCarg)
    {
        $this->funcCarg = $funcCarg;
    }

    function setFuncAdmDate($funcAdmDate)
    {
        $this->funcAdmDate = $funcAdmDate;
    }

    function setFuncDmsDate($funcDmsDate)
    {
        $this->funcDmsDate = $funcDmsDate;
    }

    function setFuncPass($funcPass)
    {
        $this->funcPass = $funcPass;
    }

    function setFuncToken($funcToken)
    {
        $this->funcToken = $funcToken;
    }

    function setFuncEnd($funcEnd)
    {
        $this->funcId = $funcEnd;
    }
}
