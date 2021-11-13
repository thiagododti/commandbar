<?php

namespace src\controllers;

use \core\Controller;
use src\dao\ComandaDao;
use src\dao\ProdutoDao;
use src\models\Comanda;

class ComandaController extends Controller
{

    public function mesas()
    {

        $comandaDao = new ComandaDao();
        $comanda = new Comanda();
        $mesas = array();

        $this->render('mesas');

        /*
        for ($i = 1; $i <= 50; $i++) {
            $statusMesa = $comandaDao->buscarMesa($i);
            $mesa[$i] = $statusMesa->getComStatus();
        }*/
    }

    public function mesa($idMesa)
    {

        $comandaDao = new ComandaDao();
        $comanda = new Comanda();

        $comanda->setComMesa($idMesa['id']);
        $comandaAberta = $comandaDao->buscarMesa($comanda);


        if (empty($comandaAberta)) {
            $produtoDao = new ProdutoDao();
            $array = $produtoDao->buscarProdutos();
            $this->render('mesa', [
                'produtos' => $array,
                'numMesa' => $idMesa
            ]);
        } else {
            $produtoDao = new ProdutoDao();
            $array = $produtoDao->buscarProdutos();
            $this->render('mesa', [
                'produtos' => $array,
                'numMesa' => $idMesa
            ]);
        }
    }
}
