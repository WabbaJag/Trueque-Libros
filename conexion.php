<?php
  function Conectar(){	
    $elServidor = "localhost";
    $elUsuario ="root";
    $elPassword = "";
    $laBD = "trueque_libros";
    $con = mysql_connect($elServidor, $elUsuario, $elPassword) or die ("Error al conectar".mysql_error());
    mysql_select_db($laBD, $con);

    return $con;
  }
?>