<?php

class Utils{

    // metodo para eliminar mi sesion iniciada si es que existe.
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }
}