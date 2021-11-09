<?php

namespace src\controllers;

use \core\Controller;

class ComandaController extends Controller
{

    public function mesas()
    {
        $this->render('mesas');
    }

    public function mesa($idMesa)
    {
        
        $this->render('mesa', ['numMesa' => $idMesa]);
    }
}
