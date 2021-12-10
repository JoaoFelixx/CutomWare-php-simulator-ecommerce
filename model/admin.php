<?php

	session_start();

	if (!isset($_SESSION['admin'])) {
		header("location:/views/index.php");
		exit;
	}

	require_once 'myAdmin.php';
	$admin = new myAdmin("projeto_login", "localhost", "root", "");

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<link rel="stylesheet" type="text/css" href="/css/estilo.css">
	<title>Página da administração</title>
	<style>
		* {
			padding: 0px;
			margin: 0px;
			font-family: arial;
		}

		label,
		input {
			display: block;
			line-height: 30px;
			height: 30px;
			outline: none;
			font-size: 13pt;
			width: 100%;

		}

		h2 {
			text-align: center;
		}

		form {
			width: 330px;
			background-color: rgba(0, 0, 0, .2);
			padding: 20px;
			margin: 30px auto;
			border: 1px solid black;
		}

		input[type="submit"] {
			margin-top: 10px;
			cursor: pointer;
			border: 1px solid black;
		}

		#esquerda {

			width: 35%;
			height: 500px;
			float: left;
		}

		#direita {
			width: 65%;
			height: 500px;
			float: left;
		}

		table {
			font-size: 18px;
			background-color: rgba(0, 0, 0, .1);
			width: 90%;
			padding: 0px;
			margin: 30px auto;
			border: 1px solid black;
		}

		tr {
			line-height: 30px;
		}

		tr#titulo {
			font-weight: bold;
			background-color: rgba(0, 0, 0, .6);
			color: white;
		}

		td {
			padding: 0px 5px;
		}

		a {
			border: 2px solid black;
			background-color: white;
			color: black;
			padding: 5px;
			margin: 0px 5px;
			text-decoration: none;
		}

		#caixa {
			text-align: center;
			position: relative;
			margin: 10px;
			padding: 5px;
			width: 400px;
			background: rgba(0, 0, 0, .2);
			border: 1px solid black;

		}

		#comentarios {

			margin: 10px;
			padding: 5px;
			position: relative;
			left: 64%;
			top: -159px;
			width: 450px;
			background: rgba(0, 0, 0, .2);
			border: 1px solid black;

		}

		#valor_conserto {
			margin: 10px;
			padding: 0px;
			width: 600px;
			position: relative;
			text-align: center;
			background: rgba(0, 0, 0, .2);
			color: black;
		}

		#conserto {
			margin: 10px;
			padding: 0px;
			width: 455px;
			position: relative;
			top: -200px;
			left: 65%;
			background: rgba(0, 0, 0, .2);
			color: black;
			display: block;

		}

		p {
			margin: 5px;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_POST['nome'])) {
		// SE A PESSOA CLICAR NO BOTÃO CADASTRAR OU ATUALIZAR
		//----- EDITAR AS INFORMAÇÕES ------//
		if (isset($_GET['id_up']) && !empty($_GET['id_up'])) {

			$id_upd = addslashes($_GET['id_up']);
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$dinheiro = addslashes($_POST['dinheiro']);
			// VERIFICANDO SE HÁ ALGUNA VARIAVEL VAZIA
			if (!empty($nome) && !empty($email) && !empty($dinheiro)) {
				// ATUALIZAR
				$p->atualizarDados($id_upd, $nome, $email, $dinheiro);
				header("location:admin.php");
			} else {
				echo "Preencha todos os campos";
			}
		} else {
			// ------------  BOTÃO CADASTRAR   --------//
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$dinheiro = addslashes($_POST['dinheiro']);
			// VERIFICANDO SE HÁ ALGUNA VARIAVEL VAZIA
			if (!empty($nome) && !empty($email) && !empty($dinheiro)) { // CADASTRAR
				if (!$p->cadastarPessoa($nome, $email, $dinheiro)) {
					echo "Emaail já cadastrado";
				}
			} else {
				echo "Preencha todos os campos";
			}
		}
	}

	?>

	<?php
	// VERIFICANDO SE O BOTÃO AYUALIZAR FOI ACIONADO
	if (isset($_GET['id_up'])) {
		$id_update = addslashes($_GET['id_up']);
		$res = $p->buscarDadosPessoa($id_update);
	}


	?>

	<section id="esquerda">
		<form method="POST">
			<h2>Cadastrar Pessoa</h2>

			<label for="nome"><b>Nome</b></label>
			<input type="text" name="nome" id="nome" value="<?php if (isset($res)) {
																												echo $res['nome'];
																											} ?>">
			<label id="email"><b>Email</b></label>
			<input type="email" name="email" id="email" value="<?php if (isset($res)) {
																														echo $res['email'];
																													} ?>">
			<label for="dinheiro"><b>Dinheiro</b></label>
			<input type="number" name="dinheiro" id="dinheiro" value="<?php if (isset($res)) {
																																	echo $res['dinheiro'];
																																} ?>">
			<input type="submit" value="<?php if (isset($res)) {
																		echo "atualizar";
																	} else {
																		echo "Cadastrar";
																	}  ?>">
		</form>
	</section>

	<section id="direita">
		<table>
			<tr id="titulo">
				<td>NOME</td>
				<td>Email</td>
				<td colspan="">Dinheiro</td>
			</tr>
			<?php
			$dados = $p->buscarDados();
			//Vendo se a informações no banco de dados
			//TEM PESSOAS NO BANCO DE DADOS 
			if (count($dados) > 0) {
				// FOREACH percorre apenas arrays e não matrizes, por isso que estou usando o for junto com ele
				for ($i = 0; $i < count($dados); $i++) {

					echo '<tr>';
					foreach ($dados[$i] as $k => $v) {

						if ($k != "id_usuario" && $k != "senha") {
							echo "<td>" . $v . "</td>";
						}
					}
			?>
					<td>
						<a href="admin.php?id_up=<?php echo $dados[$i]['id_usuario']; ?>">Editar</a>
						<a href="admin.php?id=<?php echo $dados[$i]['id_usuario']; ?>">Excluir</a>
					</td>

			<?php
					echo '</tr>';
				}
			} else { // BANCO DE DADOS VAZIO 
				echo "Nã há pessoas cadastradas";
			}

			?>


		</table>
	</section>
	<hr>
	<div id="caixa">

		<h1>Caixa do site (Personalização)</h1>
		<?php
		$caixa_sistem = $p->Ver_saldo_sistem();
		echo "<br>";
		echo "<p style='font-size:30px;'>R$ " . number_format($caixa_sistem['0']["SUM(valorCust)"], 2, ",", ".") . "</p>";



		?>
	</div>
	<div id="comentarios">
		<h1>Comentários do Sistema</h1>
		<?php
		//FUNÇÃO PARA EXIBIR OS COMENTÁRIOS
		$dados = $p->Comentarios();

		//veriicando se há comentários 
		if (count($dados) > 0) {
			// SE TIVER ALGUM COMENTÁRIO, MOSTRARÁ O RESULTADO NA TELA
			for ($i = 0; $i < count($dados); $i++) {
				//DADOS DO COMENTÁRIO
				echo "<p><b>Assunto: </b>" . $dados[$i]['assunto'] . "</p>";
				echo "<p><b>Nome: </b>" . $dados[$i]['nome'] . "</p>";
				echo "<p><b>Comentário: </b>" . $dados[$i]['comentario'] . "</p>";
		?>
				<a style="position:relative;top:0px;" href="admin.php?id_apaga=<?php echo $dados[$i]['id']; ?>">Excluir</a>
		<?php

			}
		} else {
			echo 'Não há Comentários sobre o sistema';
		}
		?>
	</div>
	<?php
	// VERIFICAR SE O BOTÃO DELETAR FOI CLICADO
	if (isset($_GET['id'])) {
		$id_pessoa = addslashes($_GET['id']);
		$p->excluirPessoa($id_pessoa);
		header("location:admin.php ");
	}



	?>
</body>

</html>

<!-- FUNÇÃO PARA REMOVER COMENTÁRIOS -->
<?php
// VERIFICAR SE O BOTÃO DELETAR FOI CLICADO
if (isset($_GET['id_apaga'])) {
	$id_apaga = addslashes($_GET['id_apaga']);
	$p->remove_comen($id_apaga);
	header("location:admin.php ");
}



?>
<hr>
<?php
// VERIFICANDO SE O BOTÃO AYUALIZAR FOI ACIONADO
if (isset($_GET['vl_conserto'])) {
	$id_user = addslashes($_GET['vl_conserto']);
	$conta = $p->enviar_Conta($id_user);
}

?>
<div id="valor_conserto">
	<h1>Consertos</h1>
	<form action="#" method="POST">
		<label for="email"><b>Valor Conserto</b></label>
		<input type="number" name="enviapreco" id="dinheiro" value="<?php if (isset($conta)) {
																																	echo $conta['valorCons'];
																																} ?>">
		<input type="submit" name="" value="Enviar">
	</form>
</div>
<?php
if (isset($_POST['enviapreco'])) {
	$id_conta = addslashes($_GET['vl_conserto']);
	$preco = addslashes($_POST['enviapreco']);
	if (!empty($id_conta) && !empty($preco)) {
		$p->preco_pagar($id_conta, $preco);
		header("location:admin.php");
	}
	$p;
}



?>

<div id="conserto">
	<h1>Pedidos de conserto</h1>
	<pre>
<?php

$conserto = $p->pedidos_conserto();
for ($i = 0; $i < count($conserto); $i++) {
	if (empty($conserto[$i]['valorCons'])) {

		echo "<b>Modelo: </b> " . $conserto[$i]['modelPerif'];
		echo "<br>";
		echo "<b>Problema apresentado: </b> " . $conserto[$i]['problePerif'];
		echo "<br>";
		echo "<b>Valor: Indefinido</b>";
?>
		<br>
<a style="position: relative; top: -10px;" href="admin.php?vl_conserto=<?php echo $conserto[$i]['ConserID']; ?>">Enviar Preço</a>
<?php
	}
}

?>
</div>
</pre>