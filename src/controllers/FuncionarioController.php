<?php

namespace src\controllers;

use \core\Controller;
use core\Database;
use src\models\Funcionario;



class FuncionarioController extends Controller
{



    public function funcList()
    {

        $funcionarioDao = new Funcionario(Database::getInstance());
        $array = $funcionarioDao->buscarTodos();

        $this->render('funclist', [

            'funcionarios' => $array
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

            $novoFuncionario = new Funcionario(Database::getInstance());
            $novoFuncionario->setFuncName($funcName);
            $novoFuncionario->setFuncSname($funcSname);
            $novoFuncionario->setFuncCpf($funcCpf);
            $novoFuncionario->setFuncEmail($funcEmail);
            $novoFuncionario->setFuncSal($funcSal);
            $novoFuncionario->setFuncCarg($funcCarg);
            $novoFuncionario->setFuncAdmDate($funcAdmDate);
            $novoFuncionario->setFuncDmsDate($funcDmsDate);
            $novoFuncionario->setFuncPass($funcPassHash);
            $novoFuncionario->setFuncEnd($funcEnd);
            $novoFuncionario->setFuncNum($funcNum);
            $novoFuncionario->setFuncCep($funcCep);
            $novoFuncionario->setFuncDistric($funcDistric);
            $novoFuncionario->setFuncCity($funcCity);
            $novoFuncionario->setFuncUf($funcUf);

            $data = $novoFuncionario->buscarFuncionario($novoFuncionario);


            if (empty($data)) {

                $novoFuncionario->inserirFuncionario($novoFuncionario);

                $this->redirect('/funcionarios');
                echo 'alert("Funcionário Cadastrado com Sucesso");';
            }
        }

        $this->redirect('/funcionarios');
    }
}
