<?php

namespace src\controllers;

use \core\Controller;
use src\dao\ProdutoDao;

class ComandaController extends Controller
{

    public function mesas()
    {
        $this->render('mesas');
    }

    public function mesa($idMesa)
    {
        $produtoDao = new ProdutoDao();
        $array = $produtoDao->buscarProdutos();
        $this->render('mesa', [
            'produtos' => $array,
            'numMesa' => $idMesa
        ]);
    }
}
