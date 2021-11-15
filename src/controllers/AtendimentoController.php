<?php

namespace src\controllers;

use \core\Controller;
use src\dao\AtendimentoDao;
use src\dao\ComandaDao;
use src\dao\ProdutoDao;
use src\models\Atendimento;
use src\models\Comanda;
use src\models\Produto;

class AtendimentoController extends Controller
{

    public function novoProdutoMesa()
    {

        $atendimento = new Atendimento();
        $atendimentoDao = new AtendimentoDao();

        $produto = new Produto();
        $produtoDao = new ProdutoDao();

        $novoProd = filter_input_array(INPUT_POST);

        if (isset($_POST['novacompra'])) {
            $produto->setProdId($novoProd['PROD_ID']);
            $qtProduto = $produtoDao->buscarProdutos($produto);
            foreach ($qtProduto as $prod);

            $atendimento->setMesProd($novoProd['PROD_ID']);
            $atendimento->setMesCom($novoProd['COM_ID']);
            $atendimento->setQtProd($novoProd['QT_PEDIDO']);
            $atendimento->setVlProd(
                $novoProd['QT_PEDIDO'] * $prod->getProdValor()
            );

            if ($prod->getProdQtd() >= $atendimento->getQtProd()) {
                $atendimentoDao->pedirProduto($atendimento);

                $comanda = new Comanda();
                $comandaDao = new ComandaDao();
                $comanda->setComId($novoProd['COM_ID']);
                $buscarMesa = $comandaDao->buscarComanda($comanda);
                foreach ($buscarMesa as $mesa);
                $this->redirect('/mesa/' . $mesa->getComMesa());
            }
        }
    }
    public function retirarProdutoComanda($id)
    {
        $atendimentoDao = new AtendimentoDao();
        $com = $atendimentoDao->retirarProduto($id['id']);

        $comanda = new Comanda();
        $comandaDao = new ComandaDao();

        $comanda->setComId($com);
        $numMesas = $comandaDao->buscarComanda($comanda);
        foreach ($numMesas as $mesa);
        $this->redirect('/mesa/' . $mesa->getComMesa());
    }
}
