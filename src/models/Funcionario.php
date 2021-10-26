<?php

namespace src\models;

use core\Database;
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

    public function buscarFuncionario($cpf)
    {
        $array = [];

        $sql = Database::getInstance()->prepare("SELECT FUNC_CPF FROM FUNCIONARIOS WHERE FUNC_CPF = ?");
        $sql->bindValue(1, $cpf->getFuncCpf());
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $funcionarios = $sql->fetchAll();

            foreach ($funcionarios as $funcionario) {
                $func = new Funcionario();
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
        $sql = Database::getInstance()->prepare(
            "INSERT INTO FUNCIONARIOS (FUNC_NAME, FUNC_SNAME, FUNC_CPF, FUNC_EMAIL, FUNC_SAL,
            FUNC_CARG, FUNC_ADMDATE, FUNC_DMSDATE, FUNC_PASS, END_ID) VALUE (?,?,?,?,?,?,?,?,?,?)"
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
        $sql->execute();

        $f->setFuncId(Database::getInstance()->lastInsertId());
        return $f;
    }

    public function atualizarFuncionario(Funcionario $f)
    {
    }

    public function buscarTodos()
    {
        $array = [];

        $sql = Database::getInstance()->query(
            "SELECT FUNC_ID, FUNC_NAME, FUNC_CARG, FUNC_CPF, FUNC_EMAIL FROM FUNCIONARIOS "
        );

        if ($sql->rowCount() > 0) {
            $funcionarios = $sql->fetchAll();

            foreach ($funcionarios as $funcionario) {
                $func = new Funcionario();
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
