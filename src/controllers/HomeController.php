<?php

namespace src\controllers;

use \core\Controller;

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
