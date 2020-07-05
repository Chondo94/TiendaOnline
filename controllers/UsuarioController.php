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
            // Valido si los compas los quieren enviar rellenados o vacios.
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;
            
            // Valido si el campo biene completado para que prosiga a la insertacion de DB.
            if($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);
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

        }else{
        }
        header("Location:".base_url.'usuario/registro');

    }

    public function login(){
        if(isset($_POST)){
            //Identificar al usuario
            //Consulta a la base de datos
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            
            $identity = $usuario->login();

             //Crear una sesion para mantener al Usuario identificado.
            if(identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }
            }else{
                $_SESSION['error_login'] = 'Fallo la Identificacion';
            }
            

           
        }

        header("Location:".base_url);
    }

    // Metodo para cerrar Session
    public function logout(){
        if(isset($_SESSION['identity'])){
            unset($_SESSION['identity']);
        }

        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }

        header("location:".base_url);
    }

}//fin de clase