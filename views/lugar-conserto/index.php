<?php

session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("location:../home");
	exit;
}

require_once '../../model/User.php';
$user = new User("projeto_login", "localhost", "root", "");

global $user;
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
	<title>Envio de Periférico</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="../assets/img/favicon.ico" rel="shortcut icon" />

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

	<section class="page-top-section set-bg" data-setbg="../assets/img/page-top-bg/4.jpg">
		<div class="page-info">
			<font color="white" size="6px">
				Envie seu periférico para esse endereço, onde será avaliado o custo do conserto</font>
			<div class="site-breadcrumb">
				<a href="">Início</a> /
				<span>Envio de Periférico</span>
			</div>
		</div>
	</section>

	<section class="contact-page">
		<div class="container">
			<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29157.48755762499!2d-46.441261417858954!3d-24.00686475565324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce1c2b9117f9e7%3A0xde28918ce195e82e!2sETEC%20PRAIA%20GRANDE!5e0!3m2!1spt-BR!2sbr!4v1582036091413!5m2!1spt-BR!2sbr" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				<div class="row">
					<div class="col-lg-7 order-2 order-lg-1">
						<form action="#" method="POST" class="contact-form">
							<input type="text" name="assunto" placeholder="Assunto" maxlength="50">
							<input type="text" name="nome" placeholder="Seu nome" maxlength="50">
							<textarea name="comenta" placeholder="Comentário" maxlength="200"></textarea>
							<button class="site-btn">Enviar Comentário<img src="../assets/img/icons/double-arrow.png" alt="#" /></button>
						</form>
					</div>
					<div class="col-lg-5 order-1 order-lg-2 contact-text text-white">

						<div class="cont-info">
							<div class="ci-icon"><img src="../assets/img/icons/location.png" alt=""></div>
							<div class="ci-text">Endereço: Rua Guadalajara, 941 - Guilhermina, Praia Grande - SP, 11702-210</div>
						</div>

					</div>
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