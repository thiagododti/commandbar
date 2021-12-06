<?php

namespace src\controllers;

use \core\Controller;
use src\dao\AlmoxarifadoDao;
use src\dao\FornecedorDao;
use src\dao\ProdutoDao;
use src\helper\LoginSuport;
use src\models\Almoxarifado;
use src\models\Produto;

class ProdutoController extends Controller
{
    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginSuport::verificaLogin();

        if ($this->usuarioLogado === false) {

            $this->redirect('/login');
        }
    }
    public function productList()
    {
        $produtoDao = new ProdutoDao();
        $fornecedorDao = new FornecedorDao();
        $array = $produtoDao->buscarProdutos();
        $arrayforn = $fornecedorDao->buscarFornecedores();

        $this->render('productlist', [
            'produtos' => $array,
            'fornecedores' => $arrayforn
        ]);
    }


    public function relatorioAlmoxarifado()
    {

        $almoxarifadoDao = new AlmoxarifadoDao();
        $relAlm = $almoxarifadoDao->buscarAlmoxarifados();

        $this->render('estoque', [
            'almoxarifados' => $relAlm
        ]);
    }

    public function prodByDesc()
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutosByDesc();
        $this->render('productlist', [
            'produtos' => $array
        ]);
    }
    public function prodByQtd()
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutosByQtd();
        $this->render('productlist', ['produtos' => $array]);
    }
    public function prodByValor()
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutosByValor();
        $this->render('productlist', ['produtos' => $array]);
    }
    public function prodByCateg()
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutosByCateg();
        $this->render('productlist', ['produtos' => $array]);
    }
    public function prodByStat()
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutosByStat();
        $this->render('productlist', ['produtos' => $array]);
    }

    public function cadProdAdd()
    {

        $produto = new Produto();
        $produtodao = new ProdutoDao();

        $novoProd = filter_input_array(INPUT_POST);

        if (isset($_POST['novoproduto'])) {
            $produto->setProdDesc($novoProd['PROD_DESC']);
            $produto->setProdMarca($novoProd['PROD_MARCA']);
            $produto->setProdValor($novoProd['PROD_VALOR']);
            $produto->setProdStat($novoProd['PROD_STAT']);
            $produto->setProdCateg($novoProd['PROD_CATEG']);

            $produtodao->inserirProduto($produto);

            $this->redirect('/produtos');
        }
    }

    public function prodEntrada()
    {
        $almoxarifado = new Almoxarifado();
        $almoxarifadoDao = new AlmoxarifadoDao();

        $novaEntrada = filter_input_array(INPUT_POST);

        if (isset($_POST['novaentrada'])) {
            $almoxarifado->setAlmProd($novaEntrada['PROD_ID']);
            $almoxarifado->setAlmForn($novaEntrada['FOR_ID']);
            $almoxarifado->setQtFornecida($novaEntrada['QT_FORNECIDA']);
            $almoxarifado->setDtEntrada($novaEntrada['DT_ENTRADA']);

            $almoxarifadoDao->entradaProduto($almoxarifado);

            $this->redirect('/produtos');
        }
    }
}
