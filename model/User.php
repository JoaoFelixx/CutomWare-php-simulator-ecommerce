<?php

class User {

	private $pdo;

	public function __construct($dbname, $host, $user, $password) {
		try {
			$this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $password);

		} catch (PDOException $error) {
			echo 'Database error: ' . $error->getMessage();
			exit();

		} catch (Exception $error) {
			echo 'Generic error: ' . $error->getMessage();
			exit();
		}
	}

	public function create(string $nome, string $email, string $password,int $money) : bool {
		try {
			$sql = $this->pdo->prepare("SELECT id_usuario 
																	FROM usuarios 
																	WHERE email = :e");
			$sql->bindValue(":e", $email);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				return false;
			} 
			
			$sql = $this->pdo->prepare("INSERT INTO usuarios(nome, email, senha, dinheiro) VALUES(?, ?, ?, ?)");
			$sql->bindParam(1, $nome);
			$sql->bindParam(2, $email);
			$sql->bindParam(3, password_hash($password, PASSWORD_DEFAULT));
			$sql->bindParam(4, $money);
			$sql->execute();
			return true;
		} catch (Exception $error) {
			echo 'Error:  '.$error->getMessage();
			return false;
		}
	}


	public function login(string $email, string $password) : bool {
		try {
			$data = (array) [];

			$sql = $this->pdo->prepare("SELECT id_usuario, senha 
																	FROM usuarios 
																	WHERE email = :e");
			$sql->bindValue(":e", $email);
			$sql->execute();
	
			$data = $sql->fetch();
	
			$hash = $data['senha'];
	
			if (password_verify($password, $hash)) {
				session_start();
				$_SESSION['id_usuario'] = $data['id_usuario'];
				return true;
			} else {
				return false;
			}
		} catch (Exception $err) {
			echo $err->getMessage();
		}
	}

	public function comment(string $subject, string $name, string $comment) {
		try {
			$sql = $this->pdo->prepare("INSERT INTO contato(assunto, nome, comentario) VALUES(?, ?, ?)");
			$sql->bindParam(1, $subject);
			$sql->bindParam(2, $name);
			$sql->bindParam(3, $comment);
			$sql->execute();
			return true;
		} catch (Exception $err) {
			echo $err->getMessage();
		}
	}
}

?>