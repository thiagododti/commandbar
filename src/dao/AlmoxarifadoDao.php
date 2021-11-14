<?php

namespace src\dao;

use core\Database;
use Exception;
use PDO;
use src\models\Almoxarifado;

class AlmoxarifadoDao
{
    public function entradaProduto(Almoxarifado $a)
    {
        try {
            $sql = "INSERT INTO ALMOXARIFADOS (QT_FORNECIDA, DT_ENTRADA, FOR_ID, PROD_ID) VALUE (?,?,?,?)";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $a->getQtFornecida());
            $stmt->bindValue(2, $a->getDtEntrada());
            $stmt->bindValue(3, $a->getAlmForn());
            $stmt->bindValue(4, $a->getAlmProd());



            $sql1 = "UPDATE PRODUTOS SET PROD_QTD = ? WHERE PROD_ID = ?";
            $stmt1 = Database::getInstance()->prepare($sql1);
            $stmt1->bindValue(1, $a->getQtFornecida());
            $stmt1->bindValue(2, $a->getAlmProd());

            $stmt->execute();
            $stmt1->execute();
        } catch (Exception $e) {
            print "Erro ao dar entrada no produto <br>" . $e . '<br>';
        }
    }
}
