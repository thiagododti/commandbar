<?php

namespace src\dao;

use core\Database;
use Exception;
use PDO;
use src\models\Produto;

class ProdutoDao
{


    public function inserirProduto(Produto $p)
    {

        try {
            $sql = "INSERT INTO PRODUTOS(PROD_DESC,PROD_MARCA,PROD_VALOR,PROD_STAT,PROD_CATEG)
            VALUE (?,?,?,?,?)";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $p->getProdDesc());
            $stmt->bindValue(2, $p->getProdMarca());
            $stmt->bindValue(3, $p->getProdValor());
            $stmt->bindValue(4, $p->getProdStat());
            $stmt->bindValue(5, $p->getProdCateg());
            $stmt->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Produto <br>" . $e;
        }
    }

    public function buscarProdutos()
    {

        try {
            $sql = "SELECT * FROM PRODUTOS";
            $stmt = Database::getInstance()->query($sql);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }
    public function buscarProduto(Produto $p)
    {

        try {
            $sql = "SELECT * FROM PRODUTOS WHERE PROD_ID = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $p->getProdId());
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }

    public function buscarProdutoId($p)
    {
        try {
            $sql = "SELECT * FROM PRODUTOS WHERE PROD_ID = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $p);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }

    public function buscarProdutosByDesc()
    {
        try {
            $sql = "SELECT * FROM PRODUTOS ORDER BY PROD_DESC ASC";
            $stmt = Database::getInstance()->query($sql);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }



    public function buscarProdutosByQtd()
    {
        try {
            $sql = "SELECT * FROM PRODUTOS ORDER BY PROD_QTD DESC";
            $stmt = Database::getInstance()->query($sql);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }
    public function buscarProdutosByValor()
    {
        try {
            $sql = "SELECT * FROM PRODUTOS ORDER BY PROD_VALOR DESC";
            $stmt = Database::getInstance()->query($sql);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }
    public function buscarProdutosByCateg()
    {
        try {
            $sql = "SELECT * FROM PRODUTOS ORDER BY PROD_CATEG ASC";
            $stmt = Database::getInstance()->query($sql);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }
    public function buscarProdutosByStat()
    {
        try {
            $sql = "SELECT * FROM PRODUTOS ORDER BY PROD_STAT ASC";
            $stmt = Database::getInstance()->query($sql);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarprodutos = array();
            foreach ($lista as $l) {
                $listarprodutos[] = $this->listarProdutos($l);
            }
            return $listarprodutos;
        } catch (Exception $e) {
            print "Erro ao Buscar Produto <br>" . $e;
        }
    }



    public function listarProdutos($lista)
    {

        $produto = new Produto();
        $produto->setProdId($lista['PROD_ID']);
        $produto->setProdDesc($lista['PROD_DESC']);
        $produto->setProdValor($lista['PROD_VALOR']);
        $produto->setProdMarca($lista['PROD_MARCA']);
        $produto->setProdCateg($lista['PROD_CATEG']);
        $produto->setProdStat($lista['PROD_STAT']);

        $produto->setProdQtd($lista['PROD_QTD']);

        return $produto;
    }
}
