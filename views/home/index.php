<?php

	session_start();

	if (!isset($_SESSION['id_usuario'])) {
		header("location: ../../index.php");
		exit;
	}

?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<title>Custom Ware</title>
	
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="../assets/img/favicon.ico" rel="shortcut icon" />
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

				<a href="inicio.php" class="site-logo">
					<img src="../assets/img/logo.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						 <a href="../conta">Minha Conta</a>
					</div>

					<ul class="main-menu primary-menu">
						<li><a href="#">Início</a></li>
						<li><a href="../plataformas">Personalização</a></li>
						<li><a href="../consertos">Conserto</a>
						</li>
						</li>
						<li><a href="../contato">Contato</a></li>
						<li><a href="../somos">Quem Somos</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	
	<section class="hero-section overflow-hidden">
		<div class="hero-slider owl-carousel">
			<div class="hero-item set-bg d-flex">
				<img style="width: 100%;" src="../assets/img/Banner.jpg">
		</div>
	</section>

	<section class="featured-section">
		<div class="featured-bg set-bg" data-setbg="../assets/img/featured-bg.png"></div>
		<div class="featured-box">
			<div class="text-box">
				<h3>Sobre a Custom Ware !</h3>
				<p style="font-size: 20px;"> A Custom Ware busca ajudar essas pessoas, modificando e customizando seus produtos, para fazer cada vez mais este mercado que tem investimento de bilhões. Além para aqueles que possuíram um periférico porem, foi quebrado, nós oferecemos o serviço de conserto desses produtos.
				</p>

			</div>
		</div>
	</section>
	</div>

	
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
	<script src="../assets/js/index.js"></script>
	<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>

	</body>
</html>
