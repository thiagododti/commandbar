<?php

namespace src\controllers;

use \core\Controller;
use src\models\Funcionario;
use \src\suport\LoginSuport;
use src\models\Funcionario\FuncionarioDAO;

class FuncionarioController extends Controller
{


    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginSuport::checkLogin();

        if (LoginSuport::checkLogin() === false) {
            $this->redirect('/login');
        }
    }


    public function funcList()
    {
        $funcionarios = Funcionario::select([
            'FUNC_ID',
            'FUNC_NAME',
            'FUNC_CARG',
            'FUNC_CPF',
            'FUNC_EMAIL'
        ])->execute();
        $this->render('funclist', [
            'funcionarios' => $funcionarios
        ]);
    }

    public function cadFunc()
    {
        $this->render('cadfunc');
    }

    public function cadFuncAdd()
    {
        $funcName = filter_input(INPUT_POST, 'FUNC_NAME');
        $funcSname = filter_input(INPUT_POST, 'FUNC_SNAME');
        $funcCpf = filter_input(INPUT_POST, 'FUNC_CPF');
        $funcEmail = filter_input(INPUT_POST, 'FUNC_EMAIL');
        $funcSal = filter_input(INPUT_POST, 'FUNC_SAL');
        $funcCarg = filter_input(INPUT_POST, 'FUNC_CARG');
        $funcAdmDate = filter_input(INPUT_POST, 'FUNC_ADMDATE');
        $funcDmsDate = filter_input(INPUT_POST, 'FUNC_DMSDATE');
        if (empty($funcDmsDate)) {
            $funcDmsDate = 'null';
        }
        $funcPass = filter_input(INPUT_POST, 'FUNC_PASS');
        $funcPassHash = password_hash($funcPass, PASSWORD_DEFAULT);
        $funcEnd = filter_input(INPUT_POST, 'FUNC_END');
        $funcNum = filter_input(INPUT_POST, 'FUNC_NUM');
        $funcCep = filter_input(INPUT_POST, 'FUNC_CEP');
        $funcDistric = filter_input(INPUT_POST, 'FUNC_DISTRIC');
        $funcCity = filter_input(INPUT_POST, 'FUNC_CITY');
        $funcUf = filter_input(INPUT_POST, 'FUNC_UF');

        if ($funcCpf && $funcPassHash) {

            $data = Funcionario::select()->where('FUNC_CPF', $funcCpf)->execute();

            if (count($data) === 0) {
                Funcionario::insert([
                    'FUNC_NAME' => $funcName,
                    'FUNC_SNAME' => $funcSname,
                    'FUNC_CPF' => $funcCpf,
                    'FUNC_EMAIL' => $funcEmail,
                    'FUNC_SAL' => $funcSal,
                    'FUNC_CARG' => $funcCarg,
                    'FUNC_ADMDATE' => $funcAdmDate,
                    'FUNC_DMSDATE' => $funcDmsDate,
                    'FUNC_PASS' => $funcPassHash,
                    'FUNC_END' => $funcEnd,
                    'FUNC_NUM' => $funcNum,
                    'FUNC_CEP' => $funcCep,
                    'FUNC_DISTRIC' => $funcDistric,
                    'FUNC_CITY' => $funcCity,
                    'FUNC_UF' => $funcUf,
                ])->execute();

                $this->redirect('/funcionarios');
                echo 'alert("Funcionário Cadastrado com Sucesso");';
            }
        }

        $this->redirect('/funcionarios');
    }
}
