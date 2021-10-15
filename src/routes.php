<?php

use core\Router;
use src\controllers\LoginController;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/mesas', 'HomeController@mesas');

$router->get('/funcionarios', 'FuncionarioController@funcList');

$router->get('/funcionarios/cadastrar', 'FuncionarioController@cadFunc');
$router->post('/funcionarios/cadastrar', 'FuncionarioController@cadFuncAdd');
