<?php

namespace src\helper;

use src\models\Funcionario;

class LoginSuport
{
    public static function verificaLogin()
    {
        if (!empty($_SESSION['token'])) {

            $token = $_SESSION['token'];

            $data = Funcionario::select()->where('FUNC_TOKEN', $token)->one();

            if (count($data) > 0) {

                $funcionario = new Funcionario();
                $funcionario->setFuncId($data['FUNC_ID']);
                $funcionario->setFuncName($data['FUNC_NAME']);
                $funcionario->setFuncCarg($data['FUNC_CARG']);

                return $funcionario;
            }
        }
        return false;
    }

    public static function buscaLogin($funcCpf, $funcPass)
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
