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

        $array = [];

        $sql = $this->pdo->prepare("SELECT FUNC_TOKEN
        FROM FUNCIONARIOS WHERE FUNC_TOKEN = ?");
        $sql->bindValue(1, $token);
        $sql->execute();
        $funcionario = $sql->fetchAll();
        if ($sql->rowCount() > 0) {
            $funcionarioLogado = new Funcionario();
            $funcionarioLogado->setFuncId($funcionario['FUNC_ID']);
            $funcionarioLogado->setFuncCpf($funcionario['FUNC_CPF']);
            $funcionarioLogado->setFuncName($funcionario['FUNC_NAME']);

            $array[] = $funcionarioLogado;
        }
        return $array;
    }
}
