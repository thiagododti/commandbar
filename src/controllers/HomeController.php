<?php

namespace src\controllers;

use \core\Controller;
use src\dao\FuncionarioDao;
use src\models\Funcionario;

class HomeController extends Controller
{

    public function index()
    {

        $resultado = false;


        $this->render('mesas', [
            'comando' => $resultado

        ]);
    }
}
