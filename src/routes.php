<?php

use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/mesas', 'HomeController@mesas');

$router->get('/funcionarios', 'FuncionarioController@funcList');
$router->get('/cadastrar/funcionario', 'FuncionarioController@cadFunc');
