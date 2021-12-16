<?php
  function Conecta(){	
    $elServidor = "localhost";
    $elUsuario ="root";
    $elPassword = "";
    $laBD = "trueque_libros";
    $laconexion = new mysqli($elServidor, $elUsuario, $elPassword, $laBD);
    
    if ($laconexion->connect_error) {
      die("Error al Conectar con la BD: " . $laconexion->connect_error);
    } 
    //echo "Conexion exitosa <br>";
    
    return $laconexion;		
    //aca ya se supone q sirvio la conexion

    $trueque = null;
    $accion = "";

    if (isset($_POST["trueque"])) {
        $trueque = trim($_POST['trueque']);
    }
        //ya
    $titulo = $_POST['titulo'];
    $autore = $_POST['autore'];
    $año = $_POST['año'];
    $editorial = $_POST['editorial'];
    $descripcion = $_POST['descripcion'];
    $mensaje = $_POST['mensaje'];
    $creador = $_SESSION["usuarioActivoNombre"];

    mysqli_set_charset($laconexion, "utf8");

        if (!empty($trueque)) {
        $accion = "actualizado";
        //Conexión Correcta. Ejecuto mis comandos.
        //Configuración de la codificación de los carácteres
        
        //Redacto String con COMANDO SQL
        $comando = "UPDATE `truque` SET titulo='" .$titulo . "', autore='" .$autore . "', año='" .$año . "', editorial='" .$editorial . "',
        descripcion='" .$descripcion . "', mensaje='" .$mensaje . "',creador='" .$creador . "' WHERE trueque=" . $trueque;
        //Ejecuto COMANDO SQL
        $resultado = mysqli_query($laconexion, $comando);

    } else {
        $accion = "agregado";
        $comando = "INSERT INTO `truque`(titulo,autore,año,editorial,descripcion,mensaje,creador) 
        VALUES ('" . $titulo . "','" .$autore . "','" . $año . "','" .$editorial . "','" . $descripcion . "','". $mensaje . "','". $creador . "')";
        //Ejecuto COMANDO SQL
        $resultado = mysqli_query($laconexion, $comando);
    }
    mysqli_close($laconexion);

        if($resultado == true){
            echo "OK";
        }else{
            echo "ERROR";
        }
    
    }
    ?>