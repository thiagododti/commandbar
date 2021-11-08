<?php

namespace src\controllers;

use \core\Controller;
use src\dao\ProdutoDao;
use src\models\Produto;

class ProdutoController extends Controller
{

    public function productList()
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutos();
        $this->render('productlist', ['produtos' => $array]);
    }

    public function prodByDesc()
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutosByDesc();
        $this->render('productlist', ['produtos' => $array]);
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
}
