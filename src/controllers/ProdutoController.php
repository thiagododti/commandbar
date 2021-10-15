<?php

namespace src\controllers;

use \core\Controller;
use core\Database;
use src\models\Funcionario;

class ProdutoController extends Controller
{

    public function productList()
    {
        $this->render('productlist');
    }

    public function cadProd(){
        $this->render('cadprod');
    }

    public function cadProdAdd(){

    }
}
