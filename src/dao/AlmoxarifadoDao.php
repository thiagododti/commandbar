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



            $sql1 = "UPDATE PRODUTOS SET PROD_QTD = PROD_QTD + ? WHERE PROD_ID = ?";
            $stmt1 = Database::getInstance()->prepare($sql1);
            $stmt1->bindValue(1, $a->getQtFornecida());
            $stmt1->bindValue(2, $a->getAlmProd());

            $stmt->execute();
            $stmt1->execute();
        } catch (Exception $e) {
            print "Erro ao dar entrada no produto <br>" . $e . '<br>';
        }
    }

    public function buscarAlmoxarifados()
    {
        try {
            $sql = "SELECT * FROM ALMOXARIFADOS";
            $stmt = Database::getInstance()->query($sql);
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $listarAlmoxarifados = array();
            foreach ($lista as $l) {
                $listarAlmoxarifados[] = $this->listarAlmoxarifado($lista);
            }
            return $listarAlmoxarifados;
        } catch (Exception $e) {
            print "Erro ao Buscar Atendimentos <br>" . $e;
        }
    }

    public function listarAlmoxarifado($lista)
    {
        $almoxarifado = new Almoxarifado();
        $almoxarifado->setEstId($lista['EST_ID']);
        $almoxarifado->setQtFornecida($lista['QT_FORNECIDA']);
        $almoxarifado->setDtEntrada($lista['DT_ENTRADA']);
        $almoxarifado->setAlmForn($lista['FOR_ID']);
        $almoxarifado->setAlmProd($lista['PROD_ID']);

        return $almoxarifado;
    }
}
