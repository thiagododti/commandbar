<?php

namespace src\models\DAO;

use PDO;
use src\models\Funcionario;
use src\models\FuncionarioDao;

class FuncionarioMysqlDAO implements FuncionarioDao
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function buscarFuncionario($cpf)
    {
        $sql = $this->pdo->prepare("SELECT FUNC_CPF
        FROM FUNCIONARIOS WHERE FUNC_CPF = ?");
        $sql->bindValue(1, $cpf->getFuncCpf());
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
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
