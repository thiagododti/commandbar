<?php

namespace src\dao;

use core\Database;
use Exception;
use PDO;
use src\models\Funcionario;

class FuncionarioDao
{
    public function inserirFuncionario(Funcionario $f)
    {
        try {

            $sql = "INSERT INTO FUNCIONARIOS (FUNC_NAME, FUNC_SNAME, FUNC_CPF, FUNC_EMAIL, FUNC_SAL,
            FUNC_CARG, FUNC_ADMDATE, FUNC_DMSDATE, FUNC_PASS, END_ID) VALUE (?,?,?,?,?,?,?,?,?,?)";

            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $f->getFuncName());
            $stmt->bindValue(2, $f->getFuncSname());
            $stmt->bindValue(3, $f->getFuncCpf());
            $stmt->bindValue(4, $f->getFuncEmail());
            $stmt->bindValue(5, $f->getFuncSal());
            $stmt->bindValue(6, $f->getFuncCarg());
            $stmt->bindValue(7, $f->getFuncAdmDate());
            $stmt->bindValue(8, $f->getFuncDmsDate());
            $stmt->bindValue(9, $f->getFuncPass());
            $stmt->bindValue(10, $f->getFuncEnd());

            return $stmt->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Funcionario <br>" . $e . '<br>';
        }
    }

    public function buscarTodos()
    {
        try {
            $sql = "SELECT FUNC_ID, FUNC_NAME, FUNC_CARG, FUNC_CPF, FUNC_EMAIL FROM FUNCIONARIOS ";
            $resultado = Database::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $listaFuncionario = array();
            foreach ($lista as $l) {
                $listaFuncionario[] = $this->listarFuncionario($l);
            }
            return $listaFuncionario;
        } catch (Exception $e) {
            print "Erro ao buscar todos os Funcionario <br>" . $e;
        }
    }

    public function buscarFuncionario($cpf)
    {
        try {
            $sql = "SELECT * FROM FUNCIONARIOS WHERE FUNC_CPF = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $cpf->getFuncCpf());
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $funcionario = array();
            foreach ($lista as $f) {
                $funcionario[] = $this->listarFuncionario($f);
            }
            return $funcionario;
        } catch (Exception $e) {
            print "Erro ao buscar Funcionario <br>" . $e . '<br>';
        }
    }
    public function buscarFuncionarioId($id)
    {
        try {
            $sql = "SELECT * FROM FUNCIONARIOS WHERE FUNC_ID = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $funcionario = array();
            foreach ($lista as $f) {
                $funcionario[] = $this->listarFuncionario($f);
            }
            return $funcionario;
        } catch (Exception $e) {
            print "Erro ao buscar Funcionario <br>" . $e . '<br>';
        }
    }

    public function atualizarFuncionario(Funcionario $f)
    {
        try {
        } catch (Exception $e) {
            print "Erro ao atualizar Funcionario <br>" . $e . '<br>';
        }
    }

    public function deletarFuncionario($id)
    {
        try {
        } catch (Exception $e) {
            print "Erro ao deletar Funcionario <br>" . $e . '<br>';
        }
    }

    private function listarFuncionario($linha)
    {
        $funcionarios = new Funcionario();
        $funcionarios->setFuncId($linha['FUNC_ID']);
        $funcionarios->setFuncName($linha['FUNC_NAME']);
        $funcionarios->setFuncCarg($linha['FUNC_CARG']);
        $funcionarios->setFuncCpf($linha['FUNC_CPF']);
        $funcionarios->setFuncEmail($linha['FUNC_EMAIL']);

        return $funcionarios;
    }
}
