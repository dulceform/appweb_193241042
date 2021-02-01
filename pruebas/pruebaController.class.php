<?php
    require "../controller/ControllerUsuario.class.php";
    $ctr = new ControllerUsuario();
    //$ctr->agregar();
    $ctr->autentificacion("curiel",sha1("D5lce8$"));
?>