<html>

	<script language = "JavaScript" type = "text/javascript">
		decisao = confirm("Deseja realmente editar este e-mail? ");
		if(decisao){
		}else{
			window.location = "index.php";
		}
	</script>

<?php

	include "conecta.php";

	$arquivo = "Logs\\editaLog.txt";
	$redirect = "index.php";
	$emailBef = $_POST['emailBefore'];
	$emailAft = $_POST['emailAfter'];
	date_default_timezone_set("America/Sao_Paulo");
	$date = date('Y-m-d H:i');

	$aux = 0;
	$aux2 = 0;
	$jaGerado = 0;

	if(!filter_var($_POST['emailAfter'], FILTER_VALIDATE_EMAIL) || !filter_var($_POST['emailBefore'],FILTER_VALIDATE_EMAIL)){
		echo "Novo e-mail informado invalido. ";
		$aux = 1;
		geraLog($arquivo, $emailBef, $emailAft, $date, "(tentativa) - Novo email informado invalido");
		$jaGerado = 1;
	}

	$query = "UPDATE usuarios SET email = '$emailAft', data = '$date' WHERE email = '$emailBef'";
	$queryBusca = "SELECT email FROM usuarios WHERE email = '$emailAft'";

	if($aux !=1 ){
		$exec = mysql_query($queryBusca, $conecta);
			while($do = mysql_fetch_array($exec)){
				$aux2 = 1;
			}

		if($aux2 != 1) mysql_query($query, $conecta);
	}

	if(mysql_affected_rows() >= 1 && $aux2 != 1){
		echo "O e-mail ".$emailBef. " foi trocado para ". $emailAft;
		geraLog($arquivo, $emailBef, $emailAft, $date, "(efetuada)");
	}else{
		echo "Nao foi possivel alterar o e-mail.";
		if($jaGerado != 1){
			geraLog($arquivo, $emailBef, $emailAft, $date, "(tentativa) - Novo email informado ja existe / email antigo nao encontrado");
		}
	}
	
	header("refresh:5 ; url=$redirect");
	print("<br/></br>Voce sera redirecionado");

	function geraLog($arquivo, $txtGravado, $txtGravado2, $txtGravado3, $situacao){
		$handler = fopen($arquivo, "a");
		fwrite($handler, $txtGravado." ".$txtGravado2." "." ".$txtGravado3." ".$situacao."\r\n");
		fclose($handler);
	}

?>

</html>