<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/cadastro', 'FuncionarioController@cadFunc');
$router->post('/cadastro', 'FuncionarioController@cadFuncAction');
