<?php

namespace src\controllers;

use \core\Controller;
use \src\helper\LoginSuport;

class LoginController extends Controller
{

    public function entrar()
    {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('home', [
            'flash' => $flash
        ]);
    }

    public function entradaUsuario()
    {
        $funcCpf = filter_input(INPUT_POST, 'FUNC_CPF');
        $funcPass = filter_input(INPUT_POST, 'FUNC_PASS');

        if ($funcCpf && $funcPass) {

            $token = LoginSuport::buscaLogin($funcCpf, $funcPass);

            if ($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'CPF ou Senha inválido';
                $this->redirect('/login');
            }
        } else {
            $_SESSION['flash'] = 'Digite os campos de CPF e Senha';
            $this->redirect('/login');
        }
    }

    public function sairSistema()
    {
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }
}
