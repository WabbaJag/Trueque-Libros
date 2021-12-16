<?php


    $titulo = isset($_POST['titulo']) ?  $_POST['titulo'] : '';
    $año = isset($_POST['año']) ?  $_POST['año'] : '';
    $autore = isset($_POST['autore']) ?  $_POST['autore'] : '';
    $isbn = isset($_POST['isbn']) ?  $_POST['isbn'] : '';
    $genero = isset($_POST['genero']) ?  $_POST['genero'] : '';
    $idioma = isset($_POST['idioma']) ?  $_POST['idioma'] : '';
    $editorial = isset($_POST['editorial']) ?  $_POST['editorial'] : '';
    $descripcion = isset($_POST['descripcion']) ?  $_POST['descripcion'] : '';
    //$creador = isset($_SESSION["usuarioActivoNombre"]) ?  $_POST['usuarioActivoNombre'] : '';

    try{
        
        include("conexion.php");
        
        $con =  conectar();
        //$laconexion = conecta();
        /*$elServidor = "localhost";
            $elUsuario ="root";
            $elPassword = "";
            $laBD = "trueque-libros";
            $laconexion = new mysqli($elServidor, $elUsuario, $elPassword, $laBD);*/

           // $laconexion = new PDO('mysql:host=localhost; port=8080; dbname=trueque-libros', 'root', '');
            $laconexion->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $laconexion->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_WARNING);

            echo json_encode('Conectado Correctamente');
        

    } catch (PDOException $error) {
        
        echo $error->getMessage();
        die();
    }

    ?>