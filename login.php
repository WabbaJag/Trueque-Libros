<?php
	
	$usuario = $_GET["un"];
	$clave = $_GET["up"];
	
	$claveE = hash("sha256", $clave);
	
	$elServidor = "localhost";
    $elUsuario ="root";
    $elPassword = "";
    $laBD = "trueque-libro";
    $conn = new mysqli($elServidor, $elUsuario, $elPassword, $laBD);

	if(!$conn){
		
		echo "ERROR";
	}else{
	
		mysqli_set_charset($conn, "utf8");
	
		$select = "SELECT * FROM `usuario` WHERE `nombreUsuario`='$usuario' AND `clave`='$claveE'";
		
		$resultado = mysqli_query($conn, $select);
	
		if (mysqli_num_rows($resultado) > 0) {
		
			while($arreglo=mysqli_fetch_assoc($resultado)){
				$usuarioID = $arreglo["id_usuario"];
				$usuarioNombre = $arreglo["nombreUsuario"];
			}
		
			$_SESSION["usuarioActivoID"] = $usuarioID;
			$_SESSION["usuarioActivoNombre"] = $usuarioNombre;
		
			echo "OK";
		}else{
		
			$select = "SELECT * FROM `usuario` WHERE `nombreUsuario`='$usuario'";
		
			$resultado = mysqli_query($conn, $select);
			if (mysqli_num_rows($resultado) > 0) {
			
				echo "NOCLAVE";
			}else{
				
				echo "NOUSUARIO";
			}
		}
	}

?>
