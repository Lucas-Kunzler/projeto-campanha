<?php
		$localhost = "localhost";
		$user = "root";
		$password = "12345";
		$banco = "campanha_agasalho2";

		$conn = mysqli_connect($localhost, $user, $password, $banco);

		if (!$conn)
		{
			echo  "<script>alert('Não foi possível conectar ao Banco de Dados. Usuário ou Senha inválidos!');</script>";
			header('Location: index.html');
		}
?>