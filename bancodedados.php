<?php


/**
		Aqui já está tudo ok....  :)



*/
// Variaveis do sistemas

$link = "localhost";

$usuario = "root";

$senha = "";

 
//conexão com o servidor

$conecta = mysql_connect("$link", "$usuario", "$senha");
 
// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro
if (!$conecta) die ("<h1>Falha na conexao com o Banco de Dados!</h1>");
 
// Caso a conexão seja aprovada, então conecta o Banco de Dados.	
$db = mysql_select_db("geragua");



?>

