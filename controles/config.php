<?php

define('HOST','127.0.0.1');
define('USUARIO','root');
define('SENHA','123');
define('DBNOME','Pratica1');

$conexao = new mysqli(HOST,USUARIO,SENHA,DBNOME);

/*if ($conexao->connect_error) {
	die("Conexão Falhou: ". $conexao->connect_error);
}
else{
	echo("Conectado com sucesso");
}*/

?>