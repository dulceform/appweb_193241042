<?php
    /*
    login del negocio para la tabla usuarios
    */
    interface IntUsuariosService{
        public function guardar($usuario);
        public function buscarPorUsernamePassword($usuario,$password);
        /*
        public function eliminar($idUsuario);
        public function modificar($usuario);
        public fuction buscarUsuario($idUsuario);
        public function onbtenerTodos los datos
        */

    }
?>