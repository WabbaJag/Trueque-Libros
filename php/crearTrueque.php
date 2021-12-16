<?php
    $laconexion = new mysqli("localhost", "root", "", "trueque-libro");
    
    if ($laconexion->connect_error) {
        
      echo "ERROR";
    }else{

    $titulo = $_POST['titulo'];
    $año = $_POST['año'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $genero = $_POST['genero'];
    $idioma = $_POST['idioma'];
    $editorial = $_POST['editorial'];
    $descripcion = $_POST['descripcion'];
    $creador =1;
        $comando = "INSERT INTO `venta` (`ID`, `id_usuario`, `titulo`, `autor`, `isbn`, `año`, `genero`, `editorial`, `idioma`, `descripcion`) 
        VALUES (NULL, '".$creador ."', '".$titulo ."', '".$autor ."', '".$isbn ."', '".$año ."', '".$genero ."', '".$editorial ."', '".$idioma ."', '".$descripcion ."');";

        $resultado = mysqli_query($laconexion, $comando);
        if($resultado == true){
            echo "OK";
        }else{
            echo "ERROR";
        }
        mysqli_close($laconexion);
    }

    ?>
