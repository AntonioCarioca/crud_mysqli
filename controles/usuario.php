<?php

	if (isset($_POST['cadastrar'])) {

		require('config.php');

		$nome = $_POST['nome'];
		$sobrenome = $_POST['sobrenome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$cpf = $_POST['cpf'];
		$sexo = $_POST['sexo'];


		$sql = "INSERT INTO usuario(nome,sobrenome,email,telefone,cpf,sexo)
				VALUES('$nome','$sobrenome','$email','$telefone','$cpf','$sexo')";

		if($conexao->query($sql) === TRUE){
			echo '<script> 	
					alert("Cadastro realizado");
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