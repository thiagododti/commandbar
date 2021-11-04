<?php

namespace src\controllers;

use \core\Controller;

class FornecedorController extends Controller
{
    public function fornList()
    {
        $this->render('fornlist');
    }
}
