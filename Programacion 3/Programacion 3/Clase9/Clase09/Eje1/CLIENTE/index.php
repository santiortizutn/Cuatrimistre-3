<html>
<head>
	<title>WEB SERVICE TEST</title>
	  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--final de Estilos-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
	<div class="container">
	  	<div class="page-header">
        </div>
		<div class="page-header" align="center">
			<h1>WEB SERVICE #3</h1>      
		</div>
		<div>
			<form action="index.php" method="post" >
				<input type="text" placeholder="Ingrese un n&uacute;mero ENTERO" name="txtNumero1" style="width:250px" required/>
				<br/>
				<br/>
				<input type="text" placeholder="Ingrese un n&uacute;mero ENTERO" name="txtNumero2" style="width:250px" required/>
				<br/>
				<br/>
				<div class="btn-group">
					<input class="btn btn-success" type="submit" value="Sumar" name="btnSumar"/>
					<input class="btn btn-success" type="submit" value="Multiplicar" name="btnMultiplicar"/>
					<input class="btn btn-success" type="submit" value="Restar" name="btnRestar"/>
				</div>
			</form>
		</div>
	<?php
	if(isset($_POST['txtNumero1']) && isset($_POST['txtNumero2']) && isset($_POST['btnSumar'])){
///***********************************************************************************************///
///COMO CLIENTE DEL SERVICIO WEB///
///***********************************************************************************************///
		
//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
		require_once('../lib/nusoap.php');

//2.- INDICAMOS URL DEL WEB SERVICE
		$host = 'http://localhost:8080/Clase09/Eje1/SERVIDOR/testWS.php';
		
//3.- CREAMOS LA INSTANCIA COMO CLIENTE
		$client = new nusoap_client($host . '?wsdl');

//3.- CHECKEAMOS POSIBLES ERRORES AL INSTANCIAR
		$err = $client->getError();
		if ($err) {
			echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
			die();
		}

//4.- INVOCAMOS AL METODO SOAP, PASANDOLE EL PARAMETRO DE ENTRADA
		$result = $client->call('Sumar', array($_POST["txtNumero1"],$_POST["txtNumero2"]));

//5.- CHECKEAMOS POSIBLES ERRORES AL INVOCAR AL METODO DEL WS 
		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($result);
			echo '</pre>';
		} 
		else {// CHECKEAMOS POR POSIBLES ERRORES
			$err = $client->getError();
			if ($err) {//MOSTRAMOS EL ERROR
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {//MOSTRAMOS EL RESULTADO DEL METODO DEL WS.
				echo '<h2>Resultado</h2>';
				echo '<pre>' . $result . '</pre>';
			}
		}
	}
	if(isset($_POST['txtNumero1']) && isset($_POST['txtNumero2']) && isset($_POST['btnMultiplicar'])){
		///***********************************************************************************************///
		///COMO CLIENTE DEL SERVICIO WEB///
		///***********************************************************************************************///
				
		//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
				require_once('../lib/nusoap.php');

		//2.- INDICAMOS URL DEL WEB SERVICE
				$host = 'http://localhost:8080/Clase09/Eje1/SERVIDOR/testWS.php';
				
		//3.- CREAMOS LA INSTANCIA COMO CLIENTE
				$client = new nusoap_client($host . '?wsdl');

		//3.- CHECKEAMOS POSIBLES ERRORES AL INSTANCIAR
				$err = $client->getError();
				if ($err) {
					echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
					die();
				}

		//4.- INVOCAMOS AL METODO SOAP, PASANDOLE EL PARAMETRO DE ENTRADA
				$result = $client->call('Multiplicar', array($_POST["txtNumero1"],$_POST["txtNumero2"]));

		//5.- CHECKEAMOS POSIBLES ERRORES AL INVOCAR AL METODO DEL WS 
				if ($client->fault) {
					echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
					print_r($result);
					echo '</pre>';
				} 
				else {// CHECKEAMOS POR POSIBLES ERRORES
					$err = $client->getError();
					if ($err) {//MOSTRAMOS EL ERROR
						echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
					} 
					else {//MOSTRAMOS EL RESULTADO DEL METODO DEL WS.
						echo '<h2>Resultado</h2>';
						echo '<pre>' . $result . '</pre>';
					}
				}
	}
	if(isset($_POST['txtNumero1']) && isset($_POST['txtNumero2']) && isset($_POST['btnRestar'])){
		///***********************************************************************************************///
		///COMO CLIENTE DEL SERVICIO WEB///
		///***********************************************************************************************///
				
		//1.- INCLUIMOS LA LIBRERIA NUSOAP DENTRO DE NUESTRO ARCHIVO
				require_once('../lib/nusoap.php');

		//2.- INDICAMOS URL DEL WEB SERVICE
				$host = 'http://localhost:8080/Clase09/Eje1/SERVIDOR/testWS.php';
				
		//3.- CREAMOS LA INSTANCIA COMO CLIENTE
				$client = new nusoap_client($host . '?wsdl');

		//3.- CHECKEAMOS POSIBLES ERRORES AL INSTANCIAR
				$err = $client->getError();
				if ($err) {
					echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
					die();
				}

		//4.- INVOCAMOS AL METODO SOAP, PASANDOLE EL PARAMETRO DE ENTRADA
				$result = $client->call('Restar', array('numeroUno' => $_POST['txtNumero1'],'numeroDos' => $_POST['txtNumero2']));

		//5.- CHECKEAMOS POSIBLES ERRORES AL INVOCAR AL METODO DEL WS 
				if ($client->fault) {
					echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
					print_r($result);
					echo '</pre>';
				} 
				else {// CHECKEAMOS POR POSIBLES ERRORES
					$err = $client->getError();
					if ($err) {//MOSTRAMOS EL ERROR
						echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
					} 
					else {//MOSTRAMOS EL RESULTADO DEL METODO DEL WS.
						echo '<h2>Resultado</h2>';
						echo '<pre>' . $result . '</pre>';
					}
				}
	}
	
	?>
	</div>
</body>
</html>