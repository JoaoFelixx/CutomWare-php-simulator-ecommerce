<?php

	function hasErrorAtInputs(string $name, string $email, string $password, string $confPassword): string | bool {
		try {
			if (empty($name) || empty($email) || empty($password) || empty($confPassword)) 
				return "<div class='msg-erro'>Preencha todos os campos !</div>";
			
			if ($password !== $confPassword) 
				return "<div class='msg-erro'>Senha e confirmar senha não conrespondem !</div>";		
			
			return false;
			
		} catch (Exception $err) {
			echo $err->getMessage();
		}
	}
?>