<?php
    include_once("../php/dbcon.php");
	header('Content-Type: text/html; charset=utf-8');
	
	//--- verificar se é o método POST e processar -------------------------------
	if($_SERVER['REQUEST_METHOD'] == "POST"){
	
		//echo(var_dump( file_get_contents('php://input')));
		
		if(isset($_POST["valor"]) && isset($_POST["nome"]) && isset($_POST["hora"]) && $_POST["token"]==md5("ProjetoCRI")) {
			$nome=mysqli_real_escape_string($con, $_POST['nome']);
            $valor=mysqli_real_escape_string($con, $_POST['valor']);
            $hora=mysqli_real_escape_string($con, $_POST['hora']);
            
			// Verificar último registo da tabela
			$checkLastRegist=mysqli_query($con, "SELECT * FROM {$nome} ORDER BY id DESC");
			$resCheckLastRegist=mysqli_fetch_assoc($checkLastRegist);

			/*
			if(mysqli_num_rows($checkLastRegist)>0) {
				mysqli_query($con, "UPDATE {$nome} SET valor='$valor', hora='$hora' WHERE id=1");
			} else {
				mysqli_query($con, "INSERT INTO {$nome}(valor, hora) VALUES('$valor', '$hora')");
			}
			*/
			
			if($resCheckLastRegist["valor"]!=$valor || mysqli_num_rows($checkLastRegist)<=0) {
				mysqli_query($con, "INSERT INTO {$nome}(valor, hora) VALUES('$valor', '$hora')");
			}

        } else {
			http_response_code(403);
			echo('{"erro": "Os parametros recebidos nao sao validos!"}' . PHP_EOL);
			exit();
		}
		
		exit();
	}
	//--- verificar se é o método GET e processar ----------------------------
	else if($_SERVER['REQUEST_METHOD'] == "GET"){
		//echo("GET\n");
		
		if(isset($_GET["nome"])){
			echo file_get_contents("../files/".$_GET["nome"]."/valor.txt");			
		}
		else{
			http_response_code(403);
			echo('{"erro": "Sensor invalido!"}' . PHP_EOL);
			exit();
		}
		
		exit();
	} else {
		http_response_code(403);
		echo('{"erro": "Metodo ' . $_SERVER['REQUEST_METHOD'] . ' nao permitido!"}' . PHP_EOL);
		exit();
	}
?>