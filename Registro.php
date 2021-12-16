<?php
	$usuario = $_POST["un"];
	$clave = $_POST["up"];
    $idUsuario = $_POST ["id"];

	$claveE = hash("sha256", $clave);

	$elServidor = "localhost";
    $elUsuario ="root";
    $elPassword = "";
    $laBD = "trueque-libro";
    $conn = new mysqli($elServidor, $elUsuario, $elPassword, $laBD);

	if($conn->connect_error){
	
		echo "ERROR";
	}else{
		$conn->set_charset("utf8");

		$insertar = "INSERT INTO `usuario`(`cedula`, `nombreUsuario`,`clave` ) VALUES ('$idUsuario','$usuario','$claveE')";

		$respuesta = $conn->query($insertar);

		if($respuesta == true){
			session_start();
		
			$_SESSION["usuarioActivoNombre"] = $usuario;
			echo "OK";
		}else{
			echo "ERROR";
		}
	}

	mysqli_close($conn);
?>