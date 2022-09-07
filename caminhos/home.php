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

	//SELEÇÃO DE DADOS
	require('../controles/config.php');

	if (!empty($_GET['pesquisar'])) {

		$busca = $_GET['pesquisar'];
		$sql = "SELECT * FROM usuario WHERE email LIKE '%$busca%' or cpf LIKE '%$busca%'";
	}
	else{

		$sql = "SELECT * FROM usuario";
	}

	$resultado = $conexao->query($sql);

?>

<?php

	//DELETAR DADOS
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
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../estilos/home.css">
	<link rel="stylesheet" type="text/css" href="../estilos/tabela.css">

	<title>Home</title>

</head>
<body>

	<!--Menu-->
	<nav>
		<ul>
			<li>
				Bem-vindo:
				<?php echo"$logado";?>
			</li>
			<a href="../controles/sair.php" title="">Sair</a>
		</ul>
	</nav>

	<section>
		
		<form action="../controles/usuario.php" method="post" accept-charset="utf-8">

			<div class="dados">

				<h1>Inserir usuário</h1>
				
				<input type="text" name="nome" value="" placeholder="Nome"><br>

				<input type="text" name="sobrenome" value="" placeholder="Sobrenome"><br>

				<input type="email" name="email" value="" placeholder="Email"><br>

				<input type="tel" id="tel" name="telefone" value="" placeholder="Telefone" maxlength="15"  onkeyup="mascaraTel()"><br>

				<input type="text" id="cpf" name="cpf" value="" placeholder="cpf" maxlength="14" autocomplete="off" onkeyup="mascaraCPF()"><br>

				<fieldset>
					<legend>Sexo</legend>

					<input type="radio" id="mulher" name="sexo" value="mulher" checked>
					<label for="mulher">Mulher</label>

					<input type="radio" id="homem" name="sexo" value="homem">
					<label for="homem">Homem</label>
				</fieldset>

				<button type="submit" id="confirmar" name="cadastrar">Cadastrar</button>
				<button type="reset" id="limpar">Limpar</button>

			</div>

		</form>

		<div class="lista">

			<div class="pesquisa">
				<input type="search" name="" value="" placeholder="Pesquisar" id="pesquisar">
				<button type="button" onclick="buscar()">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  					<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
				</button>
			</div>

			<table>
				<tr id="cabeca">
					<th>nome</th>
					<th>sobrenome</th>
					<th>email</th>
					<th>telefone</th>
					<th>cpf</th>
					<th>sexo</th>
					<th></th>
					<th></th>
				</tr>


				<?php

					while($dado = mysqli_fetch_assoc($resultado)){
						echo "<tr>";
						echo "<td>".$dado['nome']."</td>";
						echo "<td>".$dado['sobrenome']."</td>";
						echo "<td>".$dado['email']."</td>";
						echo "<td>".$dado['telefone']."</td>";
						echo "<td>".$dado['cpf']."</td>";
						echo "<td>".$dado['sexo']."</td>";

						echo "<td> <a href='atualizar.php?id=$dado[id]' id='alterar'> alterar </a> 
							 </td>";

						echo "<td> <a href='../controles/deletar.php?id=$dado[id]'	id='excluir'> excluir </a> </td>";
						
						echo "</tr>";
					}

				?>

			</table>

		</div>

	</section>

	<script type="text/javascript" src="../scripts/mascaraCPF.js"></script>
	<script type="text/javascript" src="../scripts/mascaraTel.js"></script>
	<script type="text/javascript" src="../scripts/busca.js"></script>

</body>
</html>