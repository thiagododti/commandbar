<?php

namespace src\dao;

use core\Database;
use Exception;
use PDO;
use src\models\Endereco;

class EnderecoDao
{
    public function inserirEndereco(Endereco $end)
    {

        try {
            $sql = Database::getInstance()->prepare(
                "INSERT INTO ENDERECOS (END_LOGR, END_NUM, END_CEP, END_CITY, END_DISTRIC, END_UF) VALUE (?,?,?,?,?,?)"
            );
            $sql->bindValue(1, $end->getEndLogr());
            $sql->bindValue(2, $end->getEndNum());
            $sql->bindValue(3, $end->getEndCep());
            $sql->bindValue(4, $end->getEndCity());
            $sql->bindValue(5, $end->getEndDistric());
            $sql->bindValue(6, $end->getEndUf());
            $sql->execute();

            $pegaId = new EnderecoDao();
            $id = $pegaId->buscarEndereco($end);

            return $id;
        } catch (Exception $e) {
            print "Erro ao tentar inserir um endereço" . $e;
        }
    }

    public function buscarEndereco(Endereco $end)
    {

        try {
            $sql = "SELECT * FROM ENDERECOS WHERE END_CEP = ? AND END_NUM = ?";
            $stmt = Database::getInstance()->prepare($sql);
            $stmt->bindValue(1, $end->getEndCep());
            $stmt->bindValue(2, $end->getEndNum());
            $stmt->execute();

            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $endereco = array();

            foreach ($lista as $e) {
                $endereco[] = $this->listarEndereco($e);
            }
            return $endereco;
        } catch (Exception $e) {
            print "Erro ao buscar um endereço" . $e;
        }
    }


    private function listarEndereco($end)
    {
        $endereco = new Endereco();
        $endereco->setEndId($end['END_ID']);
        $endereco->setEndLogr($end['END_LOGR']);
        $endereco->setEndNum($end['END_NUM']);
        $endereco->setEndCep($end['END_CEP']);
        $endereco->setEndCity($end['END_CITY']);
        $endereco->setEndUf($end['END_UF']);
        $endereco->setEndDistric($end['END_DISTRIC']);

        return $endereco;
    }
}
