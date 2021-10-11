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
    private $funcEnd;
    private $funcNum;
    private $funcCep;
    private $funcDistric;
    private $funcCity;
    private $funcUf;
    private $funcToken;


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

    function getFuncEnd()
    {
        return $this->funcEnd;
    }

    function getFuncNum()
    {
        return $this->funcNum;
    }

    function getFuncCep()
    {
        return $this->funcCep;
    }

    function getFuncDistric()
    {
        return $this->funcDistric;
    }

    function getFuncCity()
    {
        return $this->funcCity;
    }

    function getFuncUf()
    {
        return $this->funcUf;
    }
    function getFuncToken()
    {
        return $this->funcToken;
    }

    function setFuncId($funcid)
    {
        $this->funcId = $funcid;
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

    function setFuncEnd($funcEnd)
    {
        $this->funcEnd = $funcEnd;
    }

    function setFuncNum($funcNum)
    {
        $this->funcNum = $funcNum;
    }

    function setFuncCep($funcCep)
    {
        $this->funcCep = $funcCep;
    }

    function setFuncDistric($funcDistric)
    {
        $this->funcDistric = $funcDistric;
    }

    function setFuncCity($funcCity)
    {
        $this->funcCity = $funcCity;
    }

    function setFuncUf($funcUf)
    {
        $this->funcUf = $funcUf;
    }

    function setFuncToken($funcToken)
    {
        $this->funcToken = $funcToken;
    }
}

interface FuncionarioDao
{
    public function buscarFuncionario($cpf);
    public function inserirFuncionario(Funcionario $f);
    public function atualizarFuncionario(Funcionario $f);
    public function buscarTodos();
    public function deletarFuncionario($id);
}
