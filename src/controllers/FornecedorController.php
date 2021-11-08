<?php

namespace src\controllers;

use \core\Controller;
use src\dao\EnderecoDao;
use src\dao\FornecedorDao;
use src\models\Endereco;
use src\models\Fornecedor;

class FornecedorController extends Controller
{

    public function fornList()
    {
        $fornecedorDao = new FornecedorDao();
        $array = $fornecedorDao->buscarFornecedores();
        $this->render('fornlist', ['fornecedores' => $array]);
    }

    public function cadFornAdd()
    {

        $fornecedor = new Fornecedor();
        $fornecedorDao = new FornecedorDao();
        $endereco = new Endereco();
        $enderecoDao = new EnderecoDao();

        $novoFornecedor = filter_input_array(INPUT_POST);

        if (isset($_POST['novofornecedor'])) {
            $endereco->setEndLogr($novoFornecedor['FORN_END']);
            $endereco->setEndNum($novoFornecedor['FORN_NUM']);
            $endereco->setEndCep($novoFornecedor['FORN_CEP']);
            $endereco->setEndDistric($novoFornecedor['FORN_DISTRIC']);
            $endereco->setEndCity($novoFornecedor['FORN_CITY']);
            $endereco->setEndUf($novoFornecedor['FORN_UF']);

            $e = $enderecoDao->buscarEndereco($endereco);
            if (empty($e)) {
                $enderecoDao->inserirEndereco($endereco);
            }
            foreach ($e as $endereco) {
                $endid = $endereco->getEndId();
            }
            $fornecedor->setForRazao($novoFornecedor['FORN_RAZAO']);
            $fornecedor->setForCnpj($novoFornecedor['FORN_CNPJ']);
            $fornecedor->setForDdd($novoFornecedor['FORN_DDD']);
            $fornecedor->setForTel($novoFornecedor['FORN_TEL']);
            $fornecedor->setForEnd($endid);

            $forn = $fornecedorDao->buscarFornecedor($fornecedor);

            if (empty($forn)) {
                $fornecedorDao->inserirFornecedor($fornecedor);
                $this->redirect('/fornecedores');

                echo 'alert("Fornecedor cadastrado com sucesso");';
            }
        }
        $this->redirect('/fornecedores');
    }
}
