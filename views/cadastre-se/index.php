<?php
	try {
		require '../../controllers/register.php';
		require '../../model/User.php';

		if (isset($_POST['nome'])) {
			$user = new User("projeto_login", "localhost", "root", "");

			$money = (int) 0;
			$name = (string) 	addslashes($_POST['nome']);
			$email = (string) addslashes($_POST['email']);
			$password = (string) addslashes($_POST['senha']);
			$confPassword = (string) addslashes($_POST['confSenha']);
	
			$hasSomeError = hasErrorAtInputs($name, $email, $password, $confPassword);
	
			if ($hasSomeError) {
				echo $hasSomeError;
			}
	
			if ($hasSomeError === false && $user->create($name, $email, $password, $money)) {
				session_start();
				$_SESSION['created_user'] = true;
				header("location: ../../index.php");
			}
	
			echo "<div class='msg-erro'>Email já cadastrado !</div>";
		}
	
	} catch (Exception $err) {
		echo $err->getMessage();
	}	

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Custom Ware - Cadastre-se</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../assets/img/favicon.ico" rel="shortcut icon" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="../assets/css/cadastre-se.css">
	<style>
		div.msg-erro {
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

	<div id="corpo-form">
		<form action="#" method="POST">
			<h1>Cadastre-se</h1>
			<input type="text" name="nome" placeholder="Nome completo" maxlength="40">
			<input type="email" name="email" placeholder="Email" maxlength="50">
			<input type="password" name="senha" placeholder="Senha" maxlength="32">
			<input type="password" name="confSenha" placeholder="Confirme a senha">
			<br>
			<input value="Criar conta" type="submit" placeholder="Cadastrar">
			<br>
		</form>
	</div>

</body>

</html>