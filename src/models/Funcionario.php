<?php

namespace src\models;

use core\Database;
use \core\Model;
use PDO;

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


    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

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


    public function buscarFuncionario($cpf)
    {
        $array = [];

        $sql = $this->pdo->prepare("SELECT FUNC_CPF
        FROM FUNCIONARIOS WHERE FUNC_CPF = ?");
        $sql->bindValue(1, $cpf->getFuncCpf());
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $funcionarios = $sql->fetchAll();

            foreach ($funcionarios as $funcionario) {
                $func = new Funcionario(Database::getInstance());
                $func->setFuncId($funcionario['FUNC_ID']);
                $func->setFuncName($funcionario['FUNC_NAME']);
                $func->setFuncCpf($funcionario['FUNC_CPF']);
                $func->setFuncEmail($funcionario['FUNC_EMAIL']);

                $array[] = $func;
            }
        }
        return $array;
    }



    public function inserirFuncionario(Funcionario $f)
    {
        $sql = $this->pdo->prepare(
            "INSERT INTO FUNCIONARIOS(
            FUNC_NAME,
            FUNC_SNAME,
            FUNC_CPF,
            FUNC_EMAIL,
            FUNC_SAL,
            FUNC_CARG,
            FUNC_ADMDATE,
            FUNC_DMSDATE,
            FUNC_PASS,
            FUNC_END,
            FUNC_NUM,
            FUNC_CEP,
            FUNC_DISTRIC,
            FUNC_CITY,
            FUNC_UF 
        )VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
        );
        $sql->bindValue(1, $f->getFuncName());
        $sql->bindValue(2, $f->getFuncSname());
        $sql->bindValue(3, $f->getFuncCpf());
        $sql->bindValue(4, $f->getFuncEmail());
        $sql->bindValue(5, $f->getFuncSal());
        $sql->bindValue(6, $f->getFuncCarg());
        $sql->bindValue(7, $f->getFuncAdmDate());
        $sql->bindValue(8, $f->getFuncDmsDate());
        $sql->bindValue(9, $f->getFuncPass());
        $sql->bindValue(10, $f->getFuncEnd());
        $sql->bindValue(11, $f->getFuncNum());
        $sql->bindValue(12, $f->getFuncCep());
        $sql->bindValue(13, $f->getFuncDistric());
        $sql->bindValue(14, $f->getFuncCity());
        $sql->bindValue(15, $f->getFuncUf());
        $sql->execute();

        $f->setFuncId($this->pdo->lastInsertId());
        return $f;
    }

    public function atualizarFuncionario(Funcionario $f)
    {
    }

    public function buscarTodos()
    {
        $array = [];

        $sql = $this->pdo->query(
            "SELECT 
            FUNC_ID,
            FUNC_NAME,
            FUNC_CARG,
            FUNC_CPF,
            FUNC_EMAIL 
        FROM 
            FUNCIONARIOS "
        );

        if ($sql->rowCount() > 0) {
            $funcionarios = $sql->fetchAll();

            foreach ($funcionarios as $funcionario) {
                $func = new Funcionario(Database::getInstance());
                $func->setFuncId($funcionario['FUNC_ID']);
                $func->setFuncName($funcionario['FUNC_NAME']);
                $func->setFuncCarg($funcionario['FUNC_CARG']);
                $func->setFuncCpf($funcionario['FUNC_CPF']);
                $func->setFuncEmail($funcionario['FUNC_EMAIL']);

                $array[] = $func;
            }
        }
        return $array;
    }

    public function deletarFuncionario($id)
    {
    }
}
