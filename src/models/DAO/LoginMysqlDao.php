<?php

namespace src\models\DAO;

use PDO;
use src\models\Funcionario;

class LoginMysqlDao
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }
    public function buscarToken($token)
    {
        $sql = $this->pdo->prepare(
            "SELECT *
            FROM FUNCIONARIOS 
            WHERE FUNC_TOKEN = ?"
        );
        $sql->bindValue(1, $token->getFuncToken());
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $funcionarioLogado = new Funcionario();
            $funcionarioLogado->setFuncId($sql['FUNC_ID']);
            $funcionarioLogado->setFuncCpf($sql['FUNC_CPF']);
            $funcionarioLogado->setFuncName($sql['FUNC_NAME']);
            
        } else {
            return false;
        }
    }
}
