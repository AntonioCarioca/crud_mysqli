<?php

	session_start();

	if (isset($_POST['entrar']) && !empty($_POST['usuario']) && !empty($_POST['senha'])) {

		require('config.php');
		
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha'];

		$sql = "SELECT * FROM admin
				WHERE usuario = '$usuario' LIMIT 1";

		$resultado = $conexao->query($sql);

		$verificar = $resultado->fetch_assoc();

		if(password_verify($senha, $verificar['senha'])){
			$_SESSION['usuario'] = $usuario;
			$_SESSION['senha'] = $senha;
			header('Location:../caminhos/home.php');
		}
		else{
			unset($_SESSION['usuario']);
			unset($_SESSION['senha']);
			header('Location:../index.html');
		}

	}
	else{
		header('Location:../index.html');
	}

?>