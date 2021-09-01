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
				<a class="navbar-brand" href="#">
					<img src="<?= $base; ?>/assets/img/icon.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
					Command Bar | Gerenciamento do estabelecimento
				</a>
			</div>
		</nav>
		<div class="row">
			<div class="col-1">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">
							<img src="<?= $base ?>/assets/img/mesa.png" />
							<p>Mesas</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Produtos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Funcionários</a>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
					</li>
				</ul>
			</div>