<?php
require_once 'models/categoria.php';

class categoriaController{

    //cargar vista donde tendre el listado de categorias
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        // echo "Controlador categorias, Accion Index";
        require_once 'views/categoria/index.php';
    }

    // metodo para crear categorias
    public function crear(){
        // utilizo este metodo para evitar que un usuario sin previlegios ingrese a la gestion de categorias
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    // metodo para guardar la categoria creada
    public function save(){
        Utils::isAdmin();

        // Guardar la categoria a la DB
        if(isset($_POST) && isset($_POST['nombre'])){
            // uso de la clase Categoria para crear una nueva categoria
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            // uso del mudelo de categoria
            $categoria->save();
        }

        header("Location:".base_url."categoria/index");
    }

}