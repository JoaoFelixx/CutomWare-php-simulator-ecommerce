<?php

session_start();
if (!isset($_SESSION['id_usuario'])) {
	header("location:../index.php");
	exit;
}

?>
<?php

require_once '../../model/Peripheral.php';
$peripheral = new Peripheral("projeto_login", "localhost", "root", "");
global $peripheral;

?>
<!DOCTYPE html>
<html>

<head>
	<link href="img/favicon.ico" rel="shortcut icon" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../assets/css/slicknav.min.css" />
	<link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="../assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/css/animate.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="../assets/css/style.css" />
	<title>Custom Ware - Conserto</title>

	<style>
		body {
			background: url(../assets/img/12.png) no-repeat center top fixed;

			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;

		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			margin: 0;
			color: white;
			font-weight: 500;
		}

		h1 {
			font-size: 70px;
		}

		h2 {
			font-size: 36px;
		}

		h3 {
			font-size: 30px;
		}

		h4 {
			font-size: 24px;
		}

		h5 {
			font-size: 18px;
		}

		h6 {
			font-size: 16px;
		}
	</style>
</head>

<body>
	<!-- Header section -->
	<header class="header-section">
		<div class="">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="../home" class="site-logo">
					<img src="../assets/img/logo.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href="../conta">Minha Conta</a>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="../home">Início</a></li>
						<li><a href="../plataformas">Personalização</a></li>
						<li><a href="../consertos">Conserto</a></li>
						<li><a href="../contato">Contato</a></li>
						<li><a href="../somos">Quem Somos</a></li>
					</ul>
				</nav>
			</div>
			<div class="container">

				<br><br><br>

				<font color="white">
					<center>
						<b>
							<h2>Mouse/Teclado</h2>
							<form action="#" method="POST">
								Modelo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="model" placeholder="Modelo">
								<br>
								Problema apresentado:<input type="text" name="proble" placeholder="Problema apresentado">
								<br>
								<center><input type="submit" name="" value="Enviar"></center>

							</form>

							<b>
								<h2>Playstation</h2>
								<form action="#" method="POST">
									Modelo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="model" placeholder="Modelo">
									<br>
									Problema apresentado:<input type="text" name="proble" placeholder="Problema apresentado">
									<br>
									<center><input type="submit" name="" value="Enviar"></center>

								</form>

								<b>
									<h2>Xbox</h2>
									<form action="#" method="POST">
										Modelo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="model" placeholder="Modelo">
										<br>
										Problema apresentado:<input type="text" name="proble" placeholder="Problema apresentado">
										<br>
										<center><input type="submit" name="" value="Enviar"></center>

									</form>

									<!--====== Javascripts & Jquery ======-->
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

if (isset($_POST['model'])) {

	$id = $_SESSION['id_usuario'];
	$model = addslashes($_POST['model']);
	$problem = addslashes($_POST['proble']);

	if (!empty($id) && !empty($model) && !empty($problem)) {
		$peripheral->createRepair($id, $model, $problem);
		header("location: ../lugar-conserto");
	} else {
		echo 'Preencha todos os campos';
	}
}


?>
</center>
</div>
</font>
</header>