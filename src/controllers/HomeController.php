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

        if (LoginSuport::checkLogin() === false) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        $this->render('mesas');
    }

    public function mesas()
    {
        $this->render('mesas');
    }
}
