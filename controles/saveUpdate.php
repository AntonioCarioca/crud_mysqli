<?php

	if (isset($_POST['atualizar'])) {

		require('config.php');

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$cpf = $_POST['cpf'];
		$sexo = $_POST['sexo'];

		$update = "UPDATE usuario SET
				  nome = '$nome',sobrenome = '$sobrenome',
				  email = '$email',telefone = '$telefone',
				  cpf = '$cpf', sexo = '$sexo'
				  WHERE id = '$id'";

		if($conexao->query($update) === TRUE){
			echo '<script> 	
					alert("Atualização realizada");
					location.href=("../caminhos/home.php");
				  </script>';
		}
		else{
			echo "Error: " . $sql . "<br>" . $conexao->error;
		}
	}
	else{
		header('Location:../caminhos/home.php');
	}


?>