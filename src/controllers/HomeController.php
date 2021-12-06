<?php

namespace src\controllers;

use \core\Controller;
use src\dao\ComandaDao;
use src\dao\FuncionarioDao;
use src\models\Comanda;
use src\helper\LoginSuport;


class HomeController extends Controller
{

    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginSuport::verificaLogin();

        if ($this->usuarioLogado === false) {

            $this->redirect('/login');
        }
    }

    public function index()
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
}
