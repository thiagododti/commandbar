<?php

namespace src\controllers;

use \core\Controller;
use src\dao\AtendimentoDao;
use src\dao\ComandaDao;
use src\dao\FuncionarioDao;
use src\dao\ProdutoDao;
use src\models\Comanda;

class ComandaController extends Controller
{

    public function mesas()
    {
        $funcionarioDao = new FuncionarioDao();

        $array = $funcionarioDao->buscarTodos();
        $this->render('mesas', [
            'funcionarios' => $array
        ]);

        /*
        for ($i = 1; $i <= 50; $i++) {
            $statusMesa = $comandaDao->buscarMesa($i);
            $mesa[$i] = $statusMesa->getComStatus();
        }*/
    }
    public function abrirMesa()
    {
        $comanda = new Comanda();
        $comandaDao = new ComandaDao();

        $novaMesa = filter_input_array(INPUT_POST);

        if (isset($_POST['novamesa'])) {
            $comanda->setComMesa($novaMesa['COM_MESA']);
            $comanda->setComStatus($novaMesa['COM_STATUS']);

            $verificarMesa = $comandaDao->buscarMesa($comanda);

            if (empty($verificarMesa)) {
                $comandaDao->abrirComanda($comanda);
                $this->redirect('/mesa/' . $novaMesa['COM_MESA']);
            } else {

                $this->redirect('/mesas');
            }
        }
    }

    public function mesa($idMesa)
    {


        $comanda = new Comanda();
        $comandaDao = new ComandaDao();
        $produtoDao = new ProdutoDao();
        $atendimentoDao = new AtendimentoDao();

        $comanda->setComMesa($idMesa['id']);
        $comanda->setComStatus("ABERTA");
        $comandaAberta = $comandaDao->buscarMesa($comanda);

        if (empty($comandaAberta)) {
            $this->redirect('/Mesas');
        } {
            foreach ($comandaAberta as $comanda);
            $array = $produtoDao->buscarProdutos();
            $atendimentos = $atendimentoDao->buscarAtendimento($comanda->getComId());


            $this->render('mesa', [
                'produtos' => $array,
                'numMesa' => $comandaAberta,
                'atendimentos' => $atendimentos
            ]);
        }
    }
}
