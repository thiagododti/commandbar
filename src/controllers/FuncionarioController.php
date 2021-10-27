<?php

namespace src\controllers;

use \core\Controller;
use core\Database;
use src\models\Funcionario;
use src\models\Endereco;
use src\dao\FuncionarioDao;
use src\dao\EnderecoDao;

class FuncionarioController extends Controller
{



    public function funcList()
    {

        $funcionarioDao = new FuncionarioDao(Database::getInstance());
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

            $novoEndereco = new Endereco();
            $inserirEndereco = new EnderecoDao();
            $novoFuncionario = new Funcionario();
            $inserirFuncionario = new FuncionarioDao();

            /*RECEBER DADOS DO NAVEGADOR */
            $novoEndereco->setEndLogr($funcEnd);
            $novoEndereco->setEndNum($funcNum);
            $novoEndereco->setEndCep($funcCep);
            $novoEndereco->setEndDistric($funcDistric);
            $novoEndereco->setEndCity($funcCity);
            $novoEndereco->setEndUf($funcUf);

            /* CONSULTAR SE O ENDEREÇO JA EXISTE*/
            $novoEnd = $inserirEndereco->buscarEndereco($novoEndereco);
            /* INSERIR ENDEREÇO CASO NAO EXISTA NO BANCO DE DADOS */
            if (empty($novoEnd)) {
                $novoEnd = $inserirEndereco->inserirEndereco($novoEndereco);
            }

            /* RECEBER DADOS DO FUNCIONARIO DO NAVEGADOR */
            $novoFuncionario->setFuncName($funcName);
            $novoFuncionario->setFuncSname($funcSname);
            $novoFuncionario->setFuncCpf($funcCpf);
            $novoFuncionario->setFuncEmail($funcEmail);
            $novoFuncionario->setFuncSal($funcSal);
            $novoFuncionario->setFuncCarg($funcCarg);
            $novoFuncionario->setFuncAdmDate($funcAdmDate);
            $novoFuncionario->setFuncDmsDate($funcDmsDate);
            $novoFuncionario->setFuncPass($funcPassHash);
            $novoFuncionario->setFuncEnd($novoEnd);

            /* VERIFICAR SE O FUNCIONARIO EXISTE */
            $data = $inserirFuncionario->buscarFuncionario($novoFuncionario);

            /* SE NAO EXISTIR O FUNCIONARIO É INSERIDO */
            if (empty($data)) {

                $inserirFuncionario->inserirFuncionario($novoFuncionario);

                $this->redirect('/funcionarios');

                echo 'alert("Funcionário Cadastrado com Sucesso");';
            }
        }

        $this->redirect('/funcionarios',);
    }
}
