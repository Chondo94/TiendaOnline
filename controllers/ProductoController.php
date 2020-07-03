<?php

class productoController{
    // function index sirve para mostrar el contendido qu quiero segun la ruta que especifique.
    public function index(){
        // echo "Controlador productos, Accion Index";

        // Renderizar a la Vista
        // Ruta especificada
        require_once 'views/producto/destacados.php';
    }
}