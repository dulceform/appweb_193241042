<?php
     require "../config/configdb.class.php";
     require "../config/conexion.class.php";
     $objeto = new Conexion($servidor,$usuario,$password,$dbname);
     $objeto->obtenerConn();
?>