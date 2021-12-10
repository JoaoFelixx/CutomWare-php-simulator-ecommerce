<?php

Class Peripheral{

	private $pdo;

    public function __construct(string $dbname, string $host, string $user, string $password) {

      try {
   			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$password);
    		
    	} catch (PDOException $e) {
    		echo 'erro com banco de dados: '.$e->getMessage();
    		exit();
    	
			} catch (Exception $e) { 
				echo 'erro generico: '.$e->getMessage();
    		exit();
    	}
    }

		public function createRepair(int $id, string $model,string $problem): bool {
			try {
				$command = $this->pdo->prepare("INSERT INTO conserto(id_user,
																												modelPerif,
																												problePerif)
																				VALUES (:id,:m,:p)");
				$command->bindValue(":id",$id);
				$command->bindValue(":m",$model);
				$command->bindValue(":p",$problem);
				$command->execute();
				return true; 
			} catch (Exception $error) {
				echo $error->getMessage();
				return false;
			}
			
    }

    public function getBalance(int $id): array {
			try {
				$command = $this->pdo->prepare("SELECT dinheiro 
																				FROM usuarios 
																				WHERE id_usuario = :id");
				$command->bindValue(":id",$id);
				$command->execute();
				$balance = (array) $command->fetch(PDO::FETCH_ASSOC);
				
				return $balance; 
			} catch (Exception $error) {
				echo $error->getMessage();
				return [];
			}
		
    }
    
    public function purchaseCustomization(int $id, int $money): bool {
			try {
				$command = $this->pdo->prepare("UPDATE usuarios 
																				SET dinheiro = :d 
																				WHERE id_usuario = :id");
        $command->bindValue(":id",$id);
        $command->bindValue(":d",$money);
        $command->execute();

        return true;
			} catch (Exception $error) {
				echo $error->getMessage();
				return false;
			}     
    }

    public function createCustomization(int $id, string $nome, int $value): bool {
      try {
				$command = $this->pdo->prepare("INSERT INTO costumiza(id_user,
																															nomeCust,
																															valorCust)
																				VALUES (:id,:n,:v)");
				$command->bindValue(":id",$id);
				$command->bindValue(":n",$nome);
				$command->bindValue(":v",$value);
				$command->execute();
			
				return true;
			} catch (Exception $error) {
				echo $error->getMessage();
				return false;
			}
    }
}

?>