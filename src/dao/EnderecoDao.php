<?php

namespace src\dao;

use core\Database;
use PDO;
use src\models\Endereco;

class EnderecoDao
{
    public function buscarEndereco(Endereco $end)
    {


        $sql = Database::getInstance()->prepare(
            "SELECT END_ID FROM ENDERECOS WHERE END_CEP = ? AND END_NUM = ?"
        );
        $sql->bindValue(1, $end->getEndCep());
        $sql->bindValue(2, $end->getEndNum());
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $id = $sql->fetch(PDO::FETCH_ASSOC);
        }

        return $id;
    }

    public function inserirEndereco(Endereco $end)
    {


        
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

        $pegaId = new Endereco();
        $id = $pegaId->buscarEndereco($end);

        return $id;
    }
}
