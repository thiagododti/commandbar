<?php

namespace src\controllers;

use \core\Controller;
use \src\suport\LoginSuport;

class LoginController extends Controller
{


    public function index()
    {
        $flash = '';
        if (!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('home', ['flash' => $flash]);
    }


    public function Acess()
    {
        $funcCpf = filter_input(INPUT_POST, 'FUNC_CPF');
        $funcPass = filter_input(INPUT_POST, 'FUNC_PASS');

        if ($funcCpf && $funcPass) {
            $token = LoginSuport::verificarLogin($funcCpf, $funcPass);

            if ($token) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'Cpf ou senha incorretos';
                $this->redirect('/login');
            }
        } else {
            $this->redirect('/login');
        }
    }
}
