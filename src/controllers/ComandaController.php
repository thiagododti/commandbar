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
        $this->render('mesas');
    }

    public function mesa($idMesa)
    {
        $comandaDao = new ComandaDao();
        $comanda = new Comanda();

        $comanda->setComMesa($idMesa);
        $comandaAberta = $comandaDao->checarMesaAberta($comanda);

        if (empty($comandaAberta)) {
        }
        /*$produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutos();
        $this->render('mesa', [
            'produtos' => $array,
            'numMesa' => $idMesa
        ]);*/
    }
}
