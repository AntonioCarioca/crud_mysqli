<?php

	session_start();
	
	if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)){
		
		unset($_SESSION['usuario']);
		unset($_SESSION['senha']);
		header('Location:../index.html');
	}
	else{
		$logado = $_SESSION['usuario'];
	}

?>

<?php


	if (!empty($_GET['id'])) {
		require('../controles/config.php');

		$id = $_GET['id'];

		$select = "SELECT * FROM usuario WHERE id=$id";
		$resultado = $conexao->query($select);

		if ($resultado->num_rows > 0) {
			while($dados = mysqli_fetch_assoc($resultado)){
				$nome = $dados['nome'];
				$sobrenome = $dados['sobrenome'];
				$email = $dados['email'];
				$telefone = $dados['telefone'];
				$cpf = $dados['cpf'];
				$sexo = $dados['sexo'];
			}
		}
		else{
			header('Location:home.php');
		}
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>atualizar</title>
	<link rel="stylesheet" href="../estilos/atualizar.css">
</head>
<body>
	
	<!--Menu-->
	<nav>
		<ul>
			<li>
				Bem-vindo:
				<?php echo"$logado";?>
			</li>
			<a href="home.php" title="">Voltar</a>
		</ul>
	</nav>


	<form action="../controles/saveUpdate.php" method="post">

		<input type="text" name="nome" value="<?php echo($nome);?>" placeholder="Nome"><br>

		<input type="text" name="sobrenome" value="<?php echo($sobrenome);?>" placeholder="Sobrenome"><br>

		<input type="email" name="email" value="<?php echo($email);?>" placeholder="Email"><br>

		<input type="tel" id="tel" name="telefone" value="<?php echo($telefone);?>" placeholder="Telefone" maxlength="15"  onkeyup="mascaraTel()"><br>

		<input type="text" id="cpf" name="cpf" value="<?php echo($cpf);?>" placeholder="cpf" maxlength="14" autocomplete="off" onkeyup="mascaraCPF()"><br>

		<fieldset>
			<legend>Sexo</legend>

			<input type="radio" id="mulher" name="sexo" value="mulher" checked <?php echo($sexo == 'mulher')?'checked':''?> >
			<label for="mulher">Mulher</label>

			<input type="radio" id="homem" name="sexo" value="homem" <?php echo($sexo == 'homem')?'checked':''?> >
			<label for="homem">Homem</label>
		</fieldset>

		<input type="hidden" name="id" value="<?php echo($id)?>">

		<button type="submit" id="confirmar" name="atualizar">Atualizar</button>

	</form>


</body>
</html>