<?php
  function Conecta(){   
    $elServidor = "localhost";
    $elUsuario ="root";
    $elPassword = "";
    $laBD = "trueque-libros";
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
        $trueque = trim($_POST['trueque']);//borra en caso de q la variable no este vacia
    }
        //ya
    $titulo = $_POST['titulo'];
    $año = $_POST['año'];
    $autore = $_POST['autore'];
    $isbn = $_POST['isbn'];
    $genero = $_POST['genero'];
    $idioma = $_POST['idioma'];
    $editorial = $_POST['editorial'];
    $descripcion = $_POST['descripcion'];
    $creador = $_SESSION["usuarioActivoNombre"];

    mysqli_set_charset($laconexion, "utf8");

        if (!empty($trueque)) {
        $accion = "actualizado";
        //Conexión Correcta. Ejecuto mis comandos.
        //Configuración de la codificación de los carácteres
        
        //Redacto String con COMANDO SQL
        $comando = "UPDATE 'venta' SET titulo='" .$titulo . "', año='" .$año . "', autore='" .$autore . "', isbn='" .$isbn . "', genero='" .$genero . "', 
        idioma='" .$idioma . "',  editorial='" .$editorial . "', descripcion='" .$descripcion . "',creador='" .$creador . "' WHERE venta=" . $trueque;
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
