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

            return $stmt->execute();
        } catch (Exception $e) {
            print "Erro ao dar entrada no produto <br>" . $e . '<br>';
        }
    }
}
