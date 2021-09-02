<?php

namespace src\controllers;

use \core\Controller;

class FuncionarioController extends Controller
{

    public function funcList()
    {
        $this->render('funclist');
    }

    public function cadFunc()
    {
        $this->render('cadfunc');
    }
}
