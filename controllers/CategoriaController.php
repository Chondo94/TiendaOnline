<?php
require_once 'models/categoria.php';

class categoriaController{

    //cargar vista donde tendre el listado de categorias
    public function index(){
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        // echo "Controlador categorias, Accion Index";
        require_once 'views/categoria/index.php';
    }
}