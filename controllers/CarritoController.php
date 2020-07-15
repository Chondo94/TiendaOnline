<?php
require_once 'models/producto.php';

class carritoController{

    public function index(){
        if(isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
            $carrito = $_SESSION['carrito'];
        }else{
            $carrito = array();
        }
        require_once 'views/carrito/index.php';
    }

    public function add(){
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            header('location:'.base_url);
        }

        if(isset($_SESSION['carrito'])){
            // bucle y condicional para aumentar las unidades que se agreguen al carrito
            $counter = 0;
            foreach($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        
        if(!isset($counter) || $counter == 0){
            // Conseguir el producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();
            // añadir al carrito
            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        
        header('Location:'.base_url."carrito/index");
    }

    // Metodo para eliminar un producto del carrito de compra
    public function remove(){
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);
        }
        header('Location:'.base_url."carrito/index");
    }

    // Metodo para eliminar todos los producto del carrito de compra
    public function delete_all(){
        unset($_SESSION['carrito']);
        header('Location:'.base_url."carrito/index");
    }

}