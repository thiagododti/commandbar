<?php

namespace src\controllers;

use \core\Controller;
use src\models\Funcionario;
use src\models\Endereco;
use src\dao\FuncionarioDao;
use src\dao\EnderecoDao;
use src\helper\LoginSuport;

class FuncionarioController extends Controller
{

    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginSuport::verificaLogin();

        if ($this->usuarioLogado === false) {

            $this->redirect('/login');
        }
    }

    public function funcList()
    {

        $funcionarioDao = new FuncionarioDao();
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

            $endereco = new Endereco();
            $enderedodao = new EnderecoDao();
            $funcionario = new Funcionario();
            $funcionariodao = new FuncionarioDao();

            /*RECEBER DADOS DO NAVEGADOR */
            $endereco->setEndLogr($funcEnd);
            $endereco->setEndNum($funcNum);
            $endereco->setEndCep($funcCep);
            $endereco->setEndDistric($funcDistric);
            $endereco->setEndCity($funcCity);
            $endereco->setEndUf($funcUf);

            /* INSERIR ENDEREÇO CASO NAO EXISTA NO BANCO DE DADOS */
            $e = $enderedodao->buscarEndereco($endereco);
            if (empty($e)) {
                $enderedodao->inserirEndereco($endereco);
            }

            foreach ($e as $endereco) {
                $endid = $endereco->getEndId();
            }

            /* RECEBER DADOS DO FUNCIONARIO DO NAVEGADOR */
            $funcionario->setFuncName($funcName);
            $funcionario->setFuncSname($funcSname);
            $funcionario->setFuncCpf($funcCpf);
            $funcionario->setFuncEmail($funcEmail);
            $funcionario->setFuncSal($funcSal);
            $funcionario->setFuncCarg($funcCarg);
            $funcionario->setFuncAdmDate($funcAdmDate);
            $funcionario->setFuncDmsDate($funcDmsDate);
            $funcionario->setFuncPass($funcPassHash);
            $funcionario->setFuncEnd($endid);

            /* VERIFICAR SE O FUNCIONARIO EXISTE */
            $f = $funcionariodao->buscarFuncionario($funcionario);

            /* SE NAO EXISTIR O FUNCIONARIO É INSERIDO */
            if (empty($f)) {

                $funcionariodao->inserirFuncionario($funcionario);

                $this->redirect('/funcionarios');

                echo 'alert("Funcionário Cadastrado com Sucesso");';
            }
        }

        $this->redirect('/funcionarios');
    }
}
