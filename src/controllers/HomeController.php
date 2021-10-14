<?php

namespace src\controllers;

use \core\Controller;
use \src\suport\LoginSuport;

class HomeController extends Controller
{

    private $usuarioLogado;

    public function __construct()
    {
        $this->usuarioLogado = LoginSuport::checkLogin();

        if ($this->usuarioLogado === false) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->render('mesas', [

            'funcionarios' => $this->usuarioLogado
        ]);
    }

    public function mesas()
    {
        $this->render('mesas');
    }
}
