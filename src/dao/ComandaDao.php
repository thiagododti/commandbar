<?php

namespace src\dao;

use ClanCats\Hydrahon\Query\Sql\Insert;
use core\Database;
use Exception;
use PDO;
use src\models\Comanda;

class ComandaDao
{


    public function abrirComanda(Comanda $c)
    {
        try {
            $sql = "INSERT INTO COMANDAS(COM_MESA,COM_STATUS,FUNC_ID,COM_TOTAL,COM_VLGARC)
            VALUE (?,?,?,?,?)";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $c->getComMesa());
            $stmt->bindValue(2, $c->getComStatus());
            $stmt->bindValue(3, $c->getComFunc());
            $stmt->bindValue(4, '0');
            $stmt->bindValue(5, '0');

            return $stmt->execute();
        } catch (Exception $e) {
            print "Erro ao abrir nova mesa" . $e;
        }
    }

    public function buscarComanda(Comanda $c)
    {
        $sql = "SELECT * FROM COMANDAS WHERE COM_ID = ?";
        $stmt = Database::getInstance()->prepare($sql);
        $stmt->bindValue(1, $c->getComId());
        $stmt->execute();

        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $comanda = array();

        foreach ($lista as $e) {
            $comanda[] = $this->listarComanda($e);
        }
        return $comanda;
    }

    public function buscarStatus(Comanda $c)
    {
        try {

            $sql = "SELECT COM_STATUS FROM COMANDAS WHERE COM_MESA = ? and COM_STATUS = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $c->getComMesa());
            $stmt->bindValue(2, "ABERTA");
            $stmt->execute();

            $lista = $stmt->fetch(PDO::FETCH_ASSOC);



            if (isset($lista['COM_STATUS'])) {
                return "aberta";
            } else {
                return "fechada";
            }



            /*$comanda = array();

            foreach ($lista as $e) {
                $comanda[] = $this->listarComanda($e);
            }

            if ($comanda->getComStatus() == "ABERTA") {
                return "Aberta";
            }*/
        } catch (Exception $e) {
            print "Erro ao buscar mesa" . $e;
        }
    }

    public function buscarMesa(Comanda $c)
    {
        try {

            $sql = "SELECT * FROM COMANDAS WHERE COM_MESA = ? AND COM_STATUS = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $c->getComMesa());
            $stmt->bindValue(2, $c->getComStatus());
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $comanda = array();

            foreach ($lista as $e) {
                $comanda[] = $this->listarComanda($e);
            }
            return $comanda;
        } catch (Exception $e) {
            print "Erro ao buscar mesa" . $e;
        }
    }
    public function fecharComissionado(Comanda $c)
    {
        try {
            $sql = "UPDATE COMANDAS SET COM_CPF = ?, COM_PAG = ?, COM_DATA = ?, COM_STATUS = ? WHERE COM_ID = ? ";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $c->getComCpf());
            $stmt->bindValue(2, $c->getComPag());
            $stmt->bindValue(3, $c->getComData());
            $stmt->bindValue(4, $c->getComStatus());
            $stmt->bindValue(5, $c->getComId());

            $stmt->execute();
        } catch (Exception $e) {
            print "Erro ao fechar mesa" . $e;
        }
    }

    public function fecharNaoComissionado(Comanda $c)
    {
        try {
            $sql = "UPDATE COMANDAS SET COM_CPF = ?, COM_PAG = ?, COM_DATA = ?, COM_STATUS = ?, COM_VLGARC = COM_VLGARC - COM_VLGARC WHERE COM_ID = ? ";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $c->getComCpf());
            $stmt->bindValue(2, $c->getComPag());
            $stmt->bindValue(3, $c->getComData());
            $stmt->bindValue(4, $c->getComStatus());
            $stmt->bindValue(5, $c->getComId());

            $stmt->execute();
        } catch (Exception $e) {
            print "Erro ao fechar mesa" . $e;
        }
    }

    public function listarComanda($lista)
    {

        $comanda = new Comanda();
        $comanda->setComId($lista['COM_ID']);
        $comanda->setComStatus($lista['COM_STATUS']);
        $comanda->setComMesa($lista['COM_MESA']);
        $comanda->setComPag($lista['COM_PAG']);
        $comanda->setComTotal($lista['COM_TOTAL']);
        $comanda->setComCpf($lista['COM_CPF']);
        $comanda->setComData($lista['COM_DATA']);
        $comanda->setComVlGarc($lista['COM_VLGARC']);
        $comanda->setComFunc($lista['FUNC_ID']);

        return $comanda;
    }
}
