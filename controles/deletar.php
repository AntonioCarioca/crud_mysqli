<?php


	if(!empty($_GET['id'])){

		require('config.php');

		$id = $_GET['id'];

		$select = "SELECT * FROM usuario WHERE id = $id";
		$resultado_select = $conexao->query($select);

		if($resultado_select->num_rows > 0){

			$delete = "DELETE FROM usuario WHERE id = $id";
			$resultado = $conexao->query($delete);

			echo '<script>

					alert("Informações detelada");

					location.href=("../caminhos/home.php");

				 </script>"';

		}

	}
	else{
		header('Location:../caminhos/home.php');
	}


?>