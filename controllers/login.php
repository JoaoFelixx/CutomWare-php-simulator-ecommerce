<?php
	try {

		function hasError(string $email, string $password): string | bool {
			
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false || strlen($email) < 8) {
				return "<div class='msg-erro'>Email inválido !</div>";
			}
			
			if (empty($email) || empty($password)) {
				return "<div class='msg-erro'>preencha todos os campos !</div>";
			}

			return false;
		}
		
	} catch (Exception $error) {
		echo "Error: ".$error->getMessage();
	}

?>