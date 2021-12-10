<?php

session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("location:../index.php");
	exit;
}

?>
<?php
require_once '../../model/User.php';
$user = new User("projeto_login", "localhost", "root", "");

global $user;
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
	<title>Custom Ware - Quem Somos !</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="img/favicon.ico" rel="shortcut icon" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../assets/css/slicknav.min.css" />
	<link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="../assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/css/animate.css" />

	<link rel="stylesheet" href="../assets/css/style.css" />

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

					<ul class="main-menu primary-menu">
						<li><a href="../home">Início</a></li>
						<li><a href="../plataformas">Personalização</a></li>
						<li><a href="../consertos">Conserto</a></li>
						<li><a href="../contato">Contato</a></li>
						<li><a href="../somos">Quem Somos</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	
	<section class="page-top-section set-bg" data-setbg="../assets/img/cw.png">
		<div class="page-info">
			<h2>Quem Somos !</h2>
			<div class="site-breadcrumb">
				<a href="">Início</a> /
				<span>Quem Somos !</span>
			</div>
		</div>
	</section>

	<section class="featured-section">
		<div class="featured-bg set-bg" data-setbg="../assets/img/featured-bg.png"></div>

		<div style="font-size: 20px;" class="featured-box">
			Somos uma empresa que visa espandir o entretenimento gamer, visto que essa demanda é de muita alta, e as pessoas cada vez mais querem fazer as suas jogadas, suas idéias e seus talentos sejam reconhecidos. Então a Custom Ware pensou em não só ajudar essas pessoas como também crescer. Consertando periféricos e personalizando-os (sempre com ferramentas de qualidade)
			<div class="text-box">
				<h3>Quem Somos !</h3>
				<p style="font-size: 24px;">
				</p>

			</div>
		</div>
	</section>

	<footer class="footer-section">
		<div class="container">

			<a href="#" class="footer-logo">
				<img src="../assets/img/logo.png" alt="">
			</a>

			<div class="copyright"><a href="">Custom Ware</a> 2020 @ All rights reserved</div>
		</div>
	</footer>

	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery.slicknav.min.js"></script>
	<script src="../assets/js/owl.carousel.min.js"></script>
	<script src="../assets/js/jquery.sticky-sidebar.min.js"></script>
	<script src="../assets/js/jquery.magnific-popup.min.js"></script>
	<script src="../assets/js/main.js"></script>

</body>

</html>
<?php
if (isset($_POST['nome'])) {

	$assunto = addslashes($_POST['assunto']);
	$nome = addslashes($_POST['nome']);
	$comentario = addslashes($_POST['comenta']);

	if (!empty($assunto) && !empty($nome) && !empty($comentario)) {
		$user->comment($assunto, $nome, $comentario);
	} else {
		echo 'Preencha todos os campos';
	}
}

?>