<?php

namespace src\controllers;

use \core\Controller;
use src\dao\AlmoxarifadoDao;
use src\dao\ProdutoDao;
use src\helper\LoginSuport;

class AlmoxarifadoController extends Controller
{
    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginSuport::verificaLogin();

        if ($this->usuarioLogado === false) {

            $this->redirect('/login');
        }
    }
    public function cancelarEntrada($id)
    {
        $almoxarifadoDao = new AlmoxarifadoDao();
        $a = $almoxarifadoDao->buscarAlmoxarifadosId($id['id']);
        foreach ($a as $qAl);

        $produtoDao = new ProdutoDao();
        $p = $produtoDao->buscarProdutoId($qAl->getAlmProd());
        foreach ($p as $qtp);

        $a1 = $qAl->getQtFornecida();
        $p1 = $qtp->getProdQtd();



        if ($p1 < $a1) {
            $almoxarifadoDao = new AlmoxarifadoDao();
            $relAlm = $almoxarifadoDao->buscarAlmoxarifados();
            $this->render('estoque', [
                'alerta' => 'onload',
                'almoxarifados' => $relAlm
            ]);
        } else {

            $almoxarifadoDao->cancelarEntradaId($qAl->getAlmProd(), $qAl->getQtFornecida(), $qAl->getEstId());
            $this->redirect('/produtos');
        }
    }
}
