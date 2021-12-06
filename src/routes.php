<?php

use core\Router;
use src\controllers\LoginController;

$router = new Router();



$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@entrar');
$router->post('/login', 'LoginController@entradaUsuario');
$router->get('/sair', 'LoginController@sairSistema');


$router->get('/mesas', 'ComandaController@mesas');
$router->get('/mesa/{id}', 'ComandaController@mesa');


$router->get('/funcionarios', 'FuncionarioController@funcList');


$router->post('/funcionarios/cadastrar', 'FuncionarioController@cadFuncAdd');
$router->get('/lista/entradas', 'ProdutoController@relatorioAlmoxarifado');


$router->get('/produtos', 'ProdutoController@productList');

$router->get('/produtos/Descricao', 'ProdutoController@prodByDesc');
$router->get('/produtos/Quantidade', 'ProdutoController@prodByQtd');
$router->get('/produtos/Valor', 'ProdutoController@prodByValor');
$router->get('/produtos/Categoria', 'ProdutoController@prodByCateg');
$router->get('/produtos/Status', 'ProdutoController@prodByStat');

$router->post('/produtos/cadastrar', 'ProdutoController@cadProdAdd');
$router->post('/produtos/entrada', 'ProdutoController@prodEntrada');

$router->get('/produto/atualizar/{id}', 'ProdutoController@atualizarProduto');


$router->get('/fornecedores', 'FornecedorController@fornList');
$router->post('/fornecedores/cadastrar', 'FornecedorController@cadFornAdd');

$router->post('/mesas/nova/mesa', 'ComandaController@abrirMesa');
$router->post('/mesa/fechar', 'ComandaController@fecharMesa');

$router->post('/mesa/novo/produto', 'AtendimentoController@novoProdutoMesa');
$router->get('/retirar/produto/{id}', 'AtendimentoController@retirarProdutoComanda');

$router->get('/cancelar/entrada/{id}', 'AlmoxarifadoController@cancelarEntrada');
