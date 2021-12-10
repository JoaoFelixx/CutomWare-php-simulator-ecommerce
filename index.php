<?php

	require './controllers/login.php';
	require './model/User.php';

	session_start();

	if ($_SESSION['created_user']) 
		echo "<div class='msg-sucesso'> Usuário criado </div>";

	if (isset($_POST['email'])) {
		try {

			$user = new User("projeto_login", "localhost", "root", "");
			
			$email = (string) addslashes($_POST['email']);
			$password = (string) addslashes($_POST['password']);	
			
			$hasSomeError = hasError($email, $password);
	
			if ($hasSomeError) {
				echo $hasSomeError;
				return;
			}
	
			$user->login($email, $password) && header("location:./views/home/");
			
			echo "<div class='msg-error'> Email ou Senha incorreto !</div>";
	
		} catch (Exception $error) {
			echo $error;
			return;
		}
	}

?>
<!DOCTYPE ht0ml>
<html lang="pt-br">

<head>
	<title>Custom Ware - Login</title>
	<meta charset="UTF-8">
	<meta name="description" content="EndGam Gaming Magazine Template">
	<meta name="keywords" content="endGam,gGaming, magazine, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="views/css/bootstrap.min.css" />
	<link href="views/assets/img/favicon.ico" rel="shortcut icon" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="views/assets/css/index.css">
	<style>
		div.msg-error {
			width: 400px;
			position: relative;
			top: 10px;
			margin-left: auto;
			font-size: 18px;
			text-align: center;
			padding: 14px;
			margin-right: auto;
			background-color: rgba(250, 128, 114, 0.3);
			border: 1px solid rgb(165, 42, 42);
		}
		div.msg-sucesso {
		  width: 400px;
			margin: 10px auto;
			padding: 10px;
			position: flex;
			top: 50px;
			left: -35px;
			text-align: center;
			background-color: rgba(250, 128, 114, 0.3);
			border: 1px solid rgb(9, 255, 0);
		}
	</style>
</head>

<body>

	<div class="form" id="corpo-form">
		<form action="#" method="POST">
			<h1>Login Custom Ware</h1>
			
			<input class="input-control" type="email" placeholder="Usuario" name="email">
			<input class="input-control" type="password" placeholder="Senha" name="password">
			<br><br>
			<input type="submit" placeholder="Acessar" name="" value="Entrar">
			<br><br>

		</form>
		<a href="views/cadastre-se/">
			<button>Ainda não é cadastrado ? Cadastre-se</button> 
		</a>
	</div>

</body>

</html>