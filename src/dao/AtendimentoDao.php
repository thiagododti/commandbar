<?php

namespace src\dao;

use Attribute;
use core\Database;
use Exception;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use PDO;
use src\models\Atendimento;

class AtendimentoDao
{
    public function pedirProduto(Atendimento $a)
    {
        try {
            $sql = "INSERT INTO ATENDIMENTOS(QT_PROD,VL_PROD,PROD_ID,COM_ID)
            VALUE (?,?,?,?)";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $a->getQtProd());
            $stmt->bindValue(2, $a->getVlProd());
            $stmt->bindValue(3, $a->getMesProd());
            $stmt->bindValue(4, $a->getMesCom());



            $sql1 = "UPDATE PRODUTOS SET PROD_QTD = PROD_QTD-? WHERE PROD_ID = ?";
            $stmt1 = Database::getInstance()->prepare($sql1);
            $stmt1->bindValue(1, $a->getQtProd());
            $stmt1->bindValue(2, $a->getMesProd());

            $sql2 = "UPDATE COMANDAS SET COM_TOTAL = COM_TOTAL+? WHERE COM_ID = ?";
            $stmt2 = Database::getInstance()->prepare($sql2);
            $stmt2->bindValue(1, $a->getVlProd());
            $stmt2->bindValue(2, $a->getMesCom());

            $sql3 = "UPDATE COMANDAS SET COM_VLGARC = COM_VLGARC+? WHERE COM_ID = ?";
            $stmt3 = Database::getInstance()->prepare($sql3);
            $stmt3->bindValue(1, ($a->getVlProd() * 10) / 100);
            $stmt3->bindValue(2, $a->getMesCom());



            $stmt->execute();
            $stmt1->execute();
            $stmt2->execute();
            $stmt3->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir Produto <br>" . $e;
        }
    }
    public function retirarProduto($a)
    {
        try {

            $sql = "SELECT * FROM ATENDIMENTOS WHERE ATE_ID = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $a);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $r);

            $sql1 = "UPDATE PRODUTOS SET PROD_QTD = PROD_QTD+? WHERE PROD_ID = ?";
            $stmt1 = Database::getInstance()->prepare($sql1);
            $stmt1->bindValue(1, $r['QT_PROD']);
            $stmt1->bindValue(2, $r['PROD_ID']);

            $sql2 = "UPDATE COMANDAS SET COM_TOTAL = COM_TOTAL-? WHERE COM_ID = ?";
            $stmt2 = Database::getInstance()->prepare($sql2);
            $stmt2->bindValue(1, $r['VL_PROD']);
            $stmt2->bindValue(2, $r['COM_ID']);

            $sql4 = "UPDATE COMANDAS SET COM_VLGARC = COM_VLGARC-? WHERE COM_ID = ?";
            $stmt4 = Database::getInstance()->prepare($sql4);
            $stmt4->bindValue(1, ($r['VL_PROD'] * 10) / 100);
            $stmt4->bindValue(2, $r['COM_ID']);

            $sql3 = "DELETE FROM ATENDIMENTOS WHERE ATE_ID = ?";
            $stmt3 = Database::getInstance()->prepare($sql3);
            $stmt3->bindValue(1, $a);


            $stmt1->execute();
            $stmt2->execute();
            $stmt3->execute();
            $stmt4->execute();
            return $r['COM_ID'];
        } catch (Exception $e) {
            print "Erro ao Inserir Produto <br>" . $e;
        }
    }

    public function buscarAtendimento($comId)
    {
        try {
            $sql = "SELECT * FROM ATENDIMENTOS WHERE COM_ID = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $comId);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarAtendimento = array();
            foreach ($lista as $l) {
                $listarAtendimento[] = $this->listarAtendimento($l);
            }
            return $listarAtendimento;
        } catch (Exception $e) {
            print "Erro ao Buscar Atendimentos <br>" . $e;
        }
    }

    public function listarAtendimento($listar)
    {
        $atendimento = new Atendimento();
        $atendimento->setAteId($listar['ATE_ID']);
        $atendimento->setQtProd($listar['QT_PROD']);
        $atendimento->setVlProd($listar['VL_PROD']);
        $atendimento->setMesProd($listar['PROD_ID']);
        $atendimento->setMesCom($listar['COM_ID']);

        return $atendimento;
    }
}
