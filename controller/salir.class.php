<?php   
    session_start();
    //elimino la variable de sesion
    unset($_SESSION['miSesion']);
    //la redireccion a la pagina principal
    header("location:../index.html");

?>