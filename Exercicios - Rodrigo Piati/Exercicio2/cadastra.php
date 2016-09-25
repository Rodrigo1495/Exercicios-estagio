	<?php

		include "conecta.php";

		$redirect = "index.php";
		$email = $_POST['email'];
		$nome = $_POST['nome'];

		$arquivo = "Logs\\cadastroLog.txt";
		date_default_timezone_set("America/Sao_Paulo");
		$date = date('Y-m-d H:i');

		$jaGerado = 0;

		if($email == null || $nome == null){
			echo "Nome e e-mail precisam ser preenchidos.";
			
		}else{
			
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

				echo "O email informado esta incorreto"; 
				geraLog($arquivo, $nome, $email, $date, "(tentativa) - Email invalido ");
				$jaGerado = 1;

			}else{

				$query = "INSERT INTO usuarios (nome,email,data)  VALUES ('$nome', '$email','$date')";
				$queryBusca = "SELECT email FROM usuarios WHERE email = '$email'";

				$busca = mysql_query($queryBusca, $conecta) or die(mysql_error());
				$aux = 0;

				while($row = mysql_fetch_array($busca)){
					echo "O email ja esta em uso, digite outro. ";
					if($jaGerado != 1) geraLog($arquivo, $nome, $email, $date, "(tentativa) - Email ja cadastrado ");
					$aux = 1;
				}

				if($aux != 1){
					$exec = mysql_query($query, $conecta);
					geraLog($arquivo, $nome, $email, $date, "(efetuado)");
				}

				if($exec){
					echo "informacoes cadastradas: <br/>";
					echo "Email = "."$email". "<br/>";
					echo "Nome = "."$nome". "<br/>";
					echo "Data = "."$date". "<br/>";
				}else{
					echo "Problema na insercao dos dados.";
				}
			}
		}

	header("refresh:5; url=$redirect");
	print("<br/></br>Voce sera redirecionado");

	function geraLog($arquivo, $txtGravado, $txtGravado2, $txtGravado3, $situacao){
		$handler = fopen($arquivo, "a");
		fwrite($handler, $txtGravado." ".$txtGravado2." ".$txtGravado3." ".$situacao. "\r\n");
		fclose($handler);
	}	

	?>


