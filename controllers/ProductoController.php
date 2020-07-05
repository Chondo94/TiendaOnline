<?php
require_once 'models/producto.php';

class productoController{
    // function index sirve para mostrar el contendido qu quiero segun la ruta que especifique.
    public function index(){
        // echo "Controlador productos, Accion Index";

        // Renderizar a la Vista
        // Ruta especificada
        require_once 'views/producto/destacados.php';
    }

    public function gestion(){
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/gestion.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST)){
            var_dump($_POST);
        }
    }
}