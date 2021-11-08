<?php

namespace src\dao;

use core\Database;
use Exception;
use PDO;
use src\models\Fornecedor;

class FornecedorDao
{
    public function buscarFornecedores()
    {
        try {
            $sql = "SELECT * FROM FORNECEDORES";
            $resultado = Database::getInstance()->query($sql);
            $lista = $resultado->fetchAll(PDO::FETCH_ASSOC);

            $listaFornecedor = array();
            foreach ($lista as $l) {
                $listaFornecedor[] = $this->listarFornecedor($l);
            }
            return $listaFornecedor;
        } catch (Exception $e) {
            print "Erro ao buscar todos os Fornecedores <br>" . $e;
        }
    }

    public function buscarFornecedor(Fornecedor $f)
    {
        try {
            $sql = "SELECT * FROM FORNECEDORES WHERE FORN_CNPJ = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $f->getForCnpj());
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $fornecedor = array();
            foreach ($lista as $f) {
                $fornecedor[] = $this->listarFornecedor($f);
            }
            return $fornecedor;
        } catch (Exception $e) {
            print "Erro ao buscar Fornecedor <br>" . $e . '<br>';
        }
    }

    public function inserirFornecedor(Fornecedor $f)
    {
        try {
            $sql = "INSERT INTO FORNECEDORES (FOR_RAZAO, FOR_DDD, FOR_TEL, FOR_CNPJ, END_ID) VALUE (?,?,?,?,?)";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $f->getForRazao());
            $stmt->bindValue(2, $f->getForDdd());
            $stmt->bindValue(3, $f->getForTel());
            $stmt->bindValue(4, $f->getForCnpj());
            $stmt->bindValue(5, $f->getForEnd());

            return $stmt->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Fornecedor <br>" . $e . '<br>';
        }
    }

    public function listarFornecedor($lista)
    {
        $fornecedor = new Fornecedor();
        $fornecedor->setForId($lista['FOR_ID']);
        $fornecedor->setForRazao($lista['FOR_RAZAO']);
        $fornecedor->setForDdd($lista['FOR_DDD']);
        $fornecedor->setForTel($lista['FOR_TEL']);
        $fornecedor->setForCnpj($lista['FOR_TEL']);
        $fornecedor->setForEnd($lista['END_ID']);

        return $fornecedor;
    }
}
