<html>

	<script language = "JavaScript" type = "text/javascript">
	decisao = confirm("Deseja realmente excluir este e-mail? ");
		if(decisao){
		}else{
			window.location = "index.php";
		}
	</script>

<?php

	include "conecta.php";

	$arquivo = "Logs\\ExclusaoLog.txt";
	$redirect = "index.php";
	$email = $_POST['email'];
	date_default_timezone_set("America/Sao_Paulo");
	$date = date('Y-m-d H:i');

	geraLog($arquivo, $email, $date);
	
	$query = "DELETE FROM usuarios WHERE email = '$email'";
	
	$do = mysql_query($query, $conecta) or die(mysql_error());

		if(mysql_affected_rows() >= 1){
			echo "Email ". "$email". " deletado";
		}else{
			echo "O email nao foi encontrado.";
		}
	
	header("refresh:5; url=$redirect");
	print("<br/></br>Voce sera redirecionado");


	function geraLog($arquivo, $txtGravado, $txtGravado2){
		$handler = fopen($arquivo, "a");
		fwrite($handler, $txtGravado." ".$txtGravado2."\r\n");
		fclose($handler);
	}
?>

</html>