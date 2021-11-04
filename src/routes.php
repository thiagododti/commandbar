<?php

use core\Router;
use src\controllers\LoginController;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/mesas', 'HomeController@mesas');

$router->get('/funcionarios', 'FuncionarioController@funcList');

$router->post('/funcionarios/cadastrar', 'FuncionarioController@cadFuncAdd');

$router->get('/produtos', 'ProdutoController@productList');
$router->get('/produtos/Descricao', 'ProdutoController@prodByDesc');
$router->get('/produtos/Quantidade', 'ProdutoController@prodByQtd');
$router->get('/produtos/Valor', 'ProdutoController@prodByValor');
$router->get('/produtos/Categoria', 'ProdutoController@prodByCateg');
$router->get('/produtos/Status', 'ProdutoController@prodByStat');

$router->get('/produtos/cadastrar', 'ProdutoController@cadProd');
$router->post('/produtos/cadastrar', 'ProdutoController@cadProdAdd');

$router->get('/fornecedores', 'FornecedorController@fornList');