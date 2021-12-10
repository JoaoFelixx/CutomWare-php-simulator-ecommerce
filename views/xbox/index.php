<?php
	require_once '../../model/Peripheral.php';

	session_start();

	if (!isset($_SESSION['id_usuario'])) {
		header("location:../index.php");
		exit;
	}

	$peripheral = new Peripheral("projeto_login", "localhost", "root", "");

	$id = (int) addslashes($_SESSION['id_usuario']);
	$balance = (array) $peripheral->getBalance($id);
	global $id;
	global $balance;

?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
	<title>Custom Ware-Xbox</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<link href="../assets/img/favicon.ico" rel="shortcut icon" />

	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../assets/css/slicknav.min.css" />
	<link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="../assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/css/animate.css" />


	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="../assets/css/style2.css">

</head>

<body>

	<div id="preloder">
		<div class="loader"></div>
	</div>

	<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<a href="../home" class="site-logo">
					<img src="../assets/img/logo.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href="../conta">Minha Conta</a>
					</div>
				</nav>
			</div>
		</div>
	</header>

	<section class="page-top-section set-bg" data-setbg="img/page-top-bg/xbox.png">
		<div class="page-info">
			<h2>Xbox</h2>
			<div class="site-breadcrumb">
				<a href="../plataformas">Personalização</a> /
				<span>Xbox</span>
			</div>
		</div>
	</section>

	<header>
		<ul>
			<i class='fa fa-shopping-cart'>
				<span class='counter'></span>
			</i>
		</ul>
	</header>
	<form action="#" method="POST">
		<div class='row'>
			<div class='product--blue'>
				<div class='product_inner'>
					<img src='../assets/img/xbox/branco.png' width='300'>
					<p>Controle Xbox Dourado</p>
					<p>Preço R$ 210,00</p>
					<button type="submit" name="control" value="1">Comprar</button>
				</div>
				<div class='product_overlay'>
					<h2>Adicionado ao Carinho</h2>
					<i class='fa fa-check'></i>
				</div>
			</div>
			<div class='product--orange'>
				<div class='product_inner'>
					<img src='../assets/img/xbox/egito.png' width='300'>
					<p>Controle Xbox Egito</p>
					<p>Preço R$ 230,00</p>
					<button type="submit" name="control" value="2">Comprar</button>
				</div>
				<div class='product_overlay'>
					<h2>Adicionado ao Carinho</h2>
					<i class='fa fa-check'></i>
				</div>
			</div>
			<div class='product--red'>
				<div class='product_inner'>
					<img src='../assets/img/xbox/estilo.png' width='300'>
					<p>Controle Xbox degradê</p>
					<p>Preço R$ 200,00</p>
					<button type="submit" name="control" value="3">Comprar</button>
				</div>
				<div class='product_overlay'>
					<h2>Adicionado ao Carinho</h2>
					<i class='fa fa-check'></i>
				</div>
			</div>
			<div class='product--green'>
				<div class='product_inner'>
					<img src='../assets/img/xbox/dark.png' width='300'>
					<p>Controle Xbox Dark</p>
					<p>Preço R$ 225,00</p>
					<button type="submit" name="control" value="4">Comprar</button>
				</div>
				<div class='product_overlay'>
					<h2>Adicionado ao Carinho</h2>
					<i class='fa fa-check'></i>
				</div>
			</div>
			<div class='product--yellow'>
				<div class='product_inner'>
					<img src='../assets/img/xbox/future.png' width='300'>
					<p>Controle Xbox militar</p>
					<p>Preço R$ 280,00</p>
					<button type="submit" name="control" value="5">Comprar</button>
				</div>
				<div class='product_overlay'>
					<h2>Adicionado ao Carinho</h2>
				</div>

			</div>
		</div>
	</form>

	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery.slicknav.min.js"></script>
	<script src="../assets/js/owl.carousel.min.js"></script>
	<script src="../assets/js/jquery.sticky-sidebar.min.js"></script>
	<script src="../assets/js/jquery.magnific-popup.min.js"></script>
	<script src="../assets/js/main.js"></script>
	<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
	<script src="../assets/js/index.js"></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>

</body>

</html>
<?php

if (isset($_POST['control'])) {
	$value = (int) $_POST['control'];


	switch ($valor) {

		case 1:
			$compra = $saldo['dinheiro'];
			$nome = "Controle Xbox Dourado";
			$preco = 210;
			$troco = $compra - $preco;
			if ($troco <= 0) {
				echo "<script>alert('Sem saldo para efetuar o pagamanto');</script>";
			} else {
				$peripheral->purchaseCustomization($id, $troco);
				$peripheral->createCustomization($id, $nome, $preco);
			}
			break;

		case 2:
			$compra = $saldo['dinheiro'];
			$nome = "Controle Xbox Egito";
			$preco = 230;
			$troco = $compra - $preco;
			if ($troco <= 0) {
				echo "<script>alert('Sem saldo para efetuar o pagamanto');</script>";
				echo "<script>alert('Sem saldo para efetuar o pagamanto');</script>";
			} else {
				$peripheral->purchaseCustomization($id, $troco);
				$peripheral->createCustomization($id, $nome, $preco);
			}
			break;

		case 3:
			$compra = $saldo['dinheiro'];
			$nome = "Controle Xbox degradê";
			$preco = 200;
			$troco = $compra - $preco;
			if ($troco <= 0) {
				echo "<script>alert('Sem saldo para efetuar o pagamanto');</script>";
			} else {
				$peripheral->purchaseCustomization($id, $troco);
				$peripheral->createCustomization($id, $nome, $preco);
			}
			break;

		case 4:
			$compra = $saldo['dinheiro'];
			$nome = "Controle Xbox Dark";
			$preco = 225;
			$troco = $compra - $preco;
			if ($troco <= 0) {
				echo "<script>alert('Sem saldo para efetuar o pagamanto');</script>";
			} else {
				$peripheral->purchaseCustomization($id, $troco);
				$peripheral->createCustomization($id, $nome, $preco);
			}
			break;

		case 5:
			$compra = $saldo['dinheiro'];
			$nome = "Controle Xbox militar";
			$preco = 280;
			$troco = $compra - $preco;
			if ($troco <= 0) {
				echo "<script>alert('Sem saldo para efetuar o pagamanto');</script>";
			} else {
				$peripheral->purchaseCustomization($id, $troco);
				$peripheral->createCustomization($id, $nome, $preco);
			}
			break;

		default:
			echo 'Erro de Analise';
			break;
	}
}
?>