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

        $comandaDao = new ComandaDao();

        $statusComanda = array();


        for ($i = 1; $i <= 50; $i++) {
            $comanda = new Comanda();
            $comanda->setComMesa($i);
            $resultado = $comandaDao->buscarStatus($comanda);

            if ($resultado == "aberta") {
                $statusComanda[$i] = "success";
            } else {
                $statusComanda[$i] = "danger";
            }
        }



        $this->render('mesas', [
            'funcionarios' => $array,
            'status' => $statusComanda
        ]);
    }
    public function abrirMesa()
    {
        $comanda = new Comanda();
        $comandaDao = new ComandaDao();

        $novaMesa = filter_input_array(INPUT_POST);

        if (isset($_POST['novamesa'])) {
            $comanda->setComMesa($novaMesa['COM_MESA']);
            $comanda->setComStatus($novaMesa['COM_STATUS']);
            $comanda->setComFunc($novaMesa['FUNC_ID']);

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

    public function fecharMesa()
    {
        $comanda = new Comanda();
        $comandaDao = new ComandaDao();

        $novaMesa = filter_input_array(INPUT_POST);


        if (isset($_POST['fecharcomanda'])) {
            $comanda->setComCpf($novaMesa['COM_CPF']);
            $comanda->setComPag($novaMesa['COM_PAG']);
            $comanda->setComStatus($novaMesa['COM_STATUS']);
            $comanda->setComId($novaMesa['COM_ID']);
            $comanda->setComData($novaMesa['COM_DATE']);

            if ($novaMesa['PAG_COMISS'] == 'sim') {
                $comandaDao->fecharComissionado($comanda);
                $this->redirect('/mesas');
            } else {
                $comandaDao->fecharNaoComissionado($comanda);
                $this->redirect('/mesas');
            }
        }
    }
}
