<?php

require_once 'models/usuario.php';

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
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            // guardo el registro en la base datos
            $save = $usuario->save();

            // verifico si se guardo el registro en la DB
            if($save){
                // echo "Se Registro su usuario con Exito";
                $_SESSION['register'] = "complete";
            }else{
                $_SESSION['register'] = "failed";
                // echo "Lo sentimos, no se completo el registro";
            }

        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuario/registro');

    }
}