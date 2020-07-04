<?php

class usuarioController{
    public function index(){
        echo "Controlador Usuarios, Accion Index";
    }

    //Metodo para Registrar usuarios
    public function registro(){
        require_once 'views/usuario/registro.php';
    }

    // Metodo para Guardar el usuario
    public function save(){
        if(isset($_POST)){
            var_dump($_POST);
        }
    }
}