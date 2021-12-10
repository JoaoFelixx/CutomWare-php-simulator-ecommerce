<?php
	session_start();

	if (!isset($_SESSION['id_usuario'])) {
		header("location:../home");
		exit;
	}
	
	require_once '../../model/Account.php';
	$account = new Account("projeto_login", "localhost", "root", "");

	global $account;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../assets/css/slicknav.min.css" />
	<link rel="stylesheet" href="../assets/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="../assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/css/animate.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="../assets/css/style.css" />


	<title>Custom Ware - Minha conta</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<style>
		* {
			font-size: 20px;
			font-family: arial;

		}
	</style>
</head>

<body>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-warp">
			<div class="header-bar-warp d-flex">
				<!-- site logo -->
				<a href="inicio.php" class="site-logo">
					<img src="../assets/img/logo.png" alt="">
				</a>
				<nav class="top-nav-area w-100">
					<div class="user-panel">
						<a href="conta.php">Minha Conta</a>
					</div>
					<!-- Menu -->
					<ul class="main-menu primary-menu">
						<li><a href="inicio.php">Início</a></li>
						<li><a href="plat.html">Personalização</a></li>
						<li><a href="conserto.php">Conserto</a></li>
						<li><a href="contato.php">Contato</a></li>
						<li><a href="somos.php">Quem Somos</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<br><br><br>
		<div class="container">
			<?php
			try {
				$id = (int) addslashes($_SESSION['id_usuario']);
				
				$data = (array) $account->myData($id);
				$repair = (array) $account->myRepair($id);
				$customization = (array) $account->myCustomization($id);
				

				

				for ($i = 0; $i < count($data); $i++) {
					echo "Minha conta é: " . $data[$i]['email'];
					echo "<br>";
					echo 'Meu saldo: R$ ' . number_format($data[$i]['dinheiro'], 2, ",", ".");
					echo '<br>';
					echo '<hr>';
				}
				if (count($repair) > 0) {
					echo '<h1>Consertos</h1>';
					for ($i = 0; $i < count($repair); $i++) {
						echo "<b><br><br>Modelo: </b> " . $repair[$i]['modelPerif'];
						echo "<br>";
						echo "<b>Problema apresentado: </b> " . $repair[$i]['problePerif'];
						echo "<br>";
						if (!empty($repair[$i]['valorCons'])) {
							echo "<b>R$ </b>" . number_format($repair[$i]['valorCons'], 2, ",", ".");
							echo "<hr>";
						} else {
							echo 'Espere por um tempo de 3 dias úteis após a entrega do periférico para receber o preço do conserto';
						}
					}
				} else {
					echo 'Nenhum conserto registrado';
					echo "<hr>";
				}
				if (count($customization) > 0) {
					echo "<h1>Costumizações</h1>";
					for ($i = 0; $i < count($customization); $i++) {
	
						echo "<b>Periférico: </b>" . $customization[$i]['nomeCust'];
						echo "<br>";
						echo "<b>R$ </b>" . number_format($customization[$i]['valorCust'], 2, ",", ".");
						echo "<br>";
					}
				} else {
					echo '<br><br>Nenhuma personalização registrada<br><br>';
				}
			} catch (Exception $error) {
				echo 'error: '.$error->getMessage();
				return;
			}
			
			?>
			<br><br>
			<a href="sair.php">Sair da conta</a>
		</div>
	</header>

	<div>

	</div>

	<script src="../assets/js/jquery-3.2.1.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery.slicknav.min.js"></script>
	<script src="../assets/js/owl.carousel.min.js"></script>
	<script src="../assets/js/jquery.sticky-sidebar.min.js"></script>
	<script src="../assets/js/jquery.magnific-popup.min.js"></script>
	<script src="../assets/js/main.js"></script>
</body>

</html>