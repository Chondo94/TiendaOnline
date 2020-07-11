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

    // metodo para comprobar si el usuario es administrador y asi que pueda gestionar las categorias y productos
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    // Metodo para mostrar las categorias en el header
    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    // Metodo para que saque las estadisticas del carrito
    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            
            // bucle para sacar el total de costo de los productos que agregue al carrito
            foreach($_SESSION['carrito'] as $producto){
                $stats['total'] += $producto['precio'] * $producto['unidades'];
            }
        }

        return $stats;
    }
}