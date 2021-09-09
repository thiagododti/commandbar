<!DOCTYPE html>

<head>
	<title>Meu Crud MVC</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?= $base; ?>/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?= $base; ?>/assets/css/variaveis.css" />
	
</head>

<body>
	<div class="container-fluid.no-gutters">
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand " href="#">
				<img src="<?= $base; ?>/assets/img/loja.png" alt="" class="d-inline-block align-text-block">
				Command Bar | Gerenciamento do estabelecimento
			</a>
		</nav>
		<div class="row">
			<div class="col-1">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a align="center" class="nav-link link-dark" aria-current="page" href="<?= $base; ?>/mesas">
							<img src="<?= $base ?>/assets/img/cardapio.png" />
							<p align="center">Mesas</p>
						</a>
					</li>
					<li class="nav-item">
						<a align="center" class="nav-link link-dark" aria-current="page" href="#">
							<img src="<?= $base ?>/assets/img/prateleira.png" />
							<p align="center">Produtos</p>
						</a>
					</li>
					<li class="nav-item">
						<a align="center" class="nav-link link-dark" aria-current="page" href="<?= $base; ?>/funcionarios">
							<img src="<?= $base ?>/assets/img/funcionarios.png" />
							<p align="center">Funcionarios</p>
						</a>
					</li>
					<li class="nav-item">
						<a align="center" class="nav-link link-dark" aria-current="page" href="#">
							<img src="<?= $base ?>/assets/img/grafico.png" />
							<p align="center">Relátorios</p>
						</a>
					</li>
				</ul>
			</div>