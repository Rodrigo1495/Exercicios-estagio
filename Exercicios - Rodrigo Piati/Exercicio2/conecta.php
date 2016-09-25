<?php
	
	$host = "localhost"; 
	$login = "root";
	$senha = "";
	$database_name = "usuarios";

	$conecta = mysql_connect($host, $login, $senha) or die (mysql_error());
	$dataBase = mysql_select_db($database_name) or die(mysql_error());

?>