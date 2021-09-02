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
			<div class="container-fluid">
				<a class="navbar-brand " href="#">
					<img src="<?= $base; ?>/assets/img/icon.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
					Command Bar | Gerenciamento do estabelecimento
				</a>
			</div>
		</nav>
		<div class="row">
			<div class="col-1">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a align="center" class="nav-link" aria-current="page" href="#">
							<img src="<?= $base ?>/assets/img/mesa.png" />
							<p align="center">Mesas</p>
						</a>
					</li>
					<li class="nav-item">
						<a align="center" class="nav-link" aria-current="page" href="#">
							<img src="<?= $base ?>/assets/img/mesa.png" />
							<p align="center">Produtos</p>
						</a>
					</li>
					<li class="nav-item">
						<a align="center" class="nav-link" aria-current="page" href="#">
							<img src="<?= $base ?>/assets/img/mesa.png" />
							<p align="center">Funcionarios</p>
						</a>
					</li>
					<li class="nav-item">
						<a align="center" class="nav-link" aria-current="page" href="#">
							<img src="<?= $base ?>/assets/img/mesa.png" />
							<p align="center">Estoque</p>
						</a>
					</li>
				</ul>
			</div>