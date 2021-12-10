<?php

class Account
{

	private $pdo;

	public function __construct(string $dbname, string $host, string $user, string $senha) {
		try {
			$this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
		
		} catch (PDOException $error) {
			echo 'erro com banco de dados: ' . $error->getMessage();
			exit();
		
		} catch (Exception $error) {
			echo 'erro generico: ' . $error->getMessage();
			exit();
		}
	}

	public function myData(int $id) {
		$result = [];
		$command = $this->pdo->prepare("SELECT nome, email, dinheiro 
																		FROM usuarios 
																		WHERE id_usuario = :id");
		$command->bindValue(":id", $id);
		$command->execute();
		$result = $command->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}


	public function myRepair(int $id) {
		$result = [];
		$command = $this->pdo->prepare("SELECT modelPerif, problePerif, valorCons
            										FROM conserto 
            										WHERE id_user = :id");
		$command->bindValue(":id", $id);
		$command->execute();
		$result = $command->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function myCustomization(int $id) {
		$result = [];
		$command = $this->pdo->prepare("SELECT nomeCust, valorCust 
																FROM costumiza 
																WHERE id_user = :id");
		$command->bindValue(":id", $id);
		$command->execute();
		$result = $command->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}
