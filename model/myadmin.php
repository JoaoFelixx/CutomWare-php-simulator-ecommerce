<?php

	Class myAdmin {

	private $pdo;

	public function __construct(string $dbname,string $host,string $user,string $senha){
		try {
			$this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);

		} catch (PDOException $error) {
			echo 'erro com banco de dados: '.$error->getMessage();
			exit();

		} catch (Exception $error) {
			echo 'erro generico: '.$error->getMessage();
			exit();
		}
	}


	public function buscarDados(){
		$res = [];
		$cmd = $this->pdo->query("SELECT * FROM usuarios 
															ORDER BY nome");
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}

	//FUNÇÃO PARA CADASTRAR PESSOAS MO BANCO DE DADOS
	public function cadastarPessoa($nome,$email,$dinheiro){
	// ANTES DE CADASTRAR, VERIFICAR SE JÁ TEM EMAIL CADASTRADO. 
	$cmd = $this->pdo->prepare("SELECT id_usuario 
															FROM usuarios 
															WHERE email = :e");
	$cmd->bindValue(":e",$email);
	$cmd->execute();
			if ($cmd->rowCount() > 0) {
					// Email já cadastrado
							return false;
					}
			else { // Email não encontrado
			
			$cmd = $this->pdo->prepare("INSERT INTO usuarios 
																	(nome,email,dinheiro) 
																	VALUES (:n,:e,:d)");
			$cmd->bindValue(":n",$nome);
			$cmd->bindValue(":e",$email);
			$cmd->bindValue(":d",$dinheiro);
			$cmd->execute();
			//Cadastrado com sucesso
			return true; 
	}
	}

	//FUNÇÃO PARA EXCLUIR PESSOA POR ID 
	public function excluirPessoa($id){

	$cmd = $this->pdo->prepare("DELETE FROM usuarios 
															WHERE id_usuario = :id");
	$cmd->bindValue(":id",$id);
	$cmd->execute();
	}
	//FUNÇÃO PARA SELECIONAR DETERMINADA PESSOA
	public function buscarDadosPessoa($id){

	$res = array();
	$cmd = $this->pdo->prepare("SELECT * FROM usuarios 
															WHERE id_usuario = :id");
	$cmd->bindValue(":id",$id);
	$cmd->execute();
	$res = $cmd->fetch(PDO::FETCH_ASSOC);
	return $res;
	}

	//FUNÇÃO PARA ATUALIZAR DETERMINADOS DADOS DA PESSOA
	public function atualizarDados($id,$nome,$email,$dinheiro){
			
	$cmd = $this->pdo->prepare("UPDATE usuarios 
															SET nome =:n,email = :e,
															dinheiro = :d 
															WHERE id_usuario = :id");
	$cmd->bindValue(":n",$nome);
	$cmd->bindValue(":e",$email);
	$cmd->bindValue(":d",$dinheiro);
	$cmd->bindValue(":id",$id);
	$cmd->execute();
	return true;
	}

	//  FUNÇÃO PARA INSERIR COMENTÁRIOS
	public function Comentarios(){
			
	$res = array();
	$cmd = $this->pdo->query("SELECT * FROM contato 
															ORDER BY id");
	$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
	return $res;
	}

	// FUNÇÃO PARA REMOVER COMENTÁRIOS
	public function remove_comen($id){
			
	$cmd = $this->pdo->prepare("DELETE FROM contato 
															WHERE id = :id");
	$cmd->bindValue(":id",$id);
	$cmd->execute();
	}

	public function Ver_saldo_sistem(){
	$res = array();
	$cmd = $this->pdo->query("SELECT SUM(valorCust) 
															FROM costumiza ");
	$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
	return $res;
	}

	public function pedidos_conserto(){
	$res = array();
	$cmd = $this->pdo->query("SELECT modelPerif, problePerif, 
																			valorCons, ConserID 
															FROM conserto");
	$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
	return $res;
	}
	public function enviar_Conta($id){

	$res = array();
	$cmd = $this->pdo->prepare("SELECT valorCons 
															FROM conserto 
															WHERE id_user = :id");
	$cmd->bindValue(":id",$id);
	$cmd->execute();
	$res = $cmd->fetch(PDO::FETCH_ASSOC);
	return $res;
	}
	public function preco_pagar($id,$preco){
			
	$cmd = $this->pdo->prepare("UPDATE conserto 
															SET valorCons = :pr 
															WHERE ConserID = :id");
	$cmd->bindValue(":pr",$preco);
	$cmd->bindValue(":id",$id);
	$cmd->execute();
	return true;
	}
	}

?>