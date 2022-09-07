<?php


 if(isset($_POST['confirmar']) && !empty($_POST['usuario']) && !empty($_POST['senha'])){

 	require('config.php');

 	$usuario = $_POST['usuario'];
 	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

 	$sql = "INSERT INTO admin (usuario,senha)
 			VALUES('$usuario','$senha')";

 	if ($conexao->query($sql) === TRUE) {
 		header('Location:../index.html');
 		die();
 	}
 	else{
 		echo "Error: " . $sql . "<br>" . $conexao->error;
 	}

 }
 else{
 	header('Location:../caminhos/cadastrar.html');
 }


?>