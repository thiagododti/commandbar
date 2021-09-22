<?php

namespace src\suport;

use ClanCats\Hydrahon\Query\Sql\Func;
use \src\models\Funcionario;

class LoginSuport
{
    public static function checkLogin()
    {
        if (!empty($_SESSION['FUNC_TOKEN'])) {

            $token = $_SESSION['FUNC_TOKEN'];

            $data = Funcionario::select()
                ->where('FUNC_TOKEN', $token)
                ->one();

            if (count($data) > 0) {

                $funcionarioLogado = new Funcionario();
                $funcionarioLogado->funcId = $data['FUNC_ID'];
                $funcionarioLogado->funcCpf = $data['FUNC_CPF'];
                $funcionarioLogado->funcName = $data['FUNC_NAME'];

                return $funcionarioLogado;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function verificarLogin($funcCpf, $funcPass)
    {

        $funcionario = Funcionario::select()->where('FUNC_CPF', $funcCpf)->one();

        if ($funcionario) {

            if (password_verify($funcPass, $funcionario['FUNC_PASS'])) {
                $token = md5(time() . rand(0, 9999) . time());

                Funcionario::update()
                    ->set('FUNC_TOKEN', $token)
                    ->where('FUNC_CPF', $funcCpf)
                    ->execute();
                return $token;
            }
        }

        return false;
    }
}
