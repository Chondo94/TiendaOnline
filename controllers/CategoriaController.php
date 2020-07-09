<?php
require_once 'models/categoria.php';
// importo el modelo del producto para mostrar los productos de las categorias especificas
require_once 'models/producto.php';

class categoriaController{

    //cargar vista donde tendre el listado de categorias
    public function index(){
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        // echo "Controlador categorias, Accion Index";
        require_once 'views/categoria/index.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            // guardo el id que esta en la url
            $id = $_GET['id'];

            /* Conseguir la categoria */
            // utilizo el metodo getOne del modelo categoria para obtener los productos de una categoria
            $categoria = new Categoria();
            // le paso el id que me llega por la url
            $categoria->setId($id);
            $categoria = $categoria->getOne();
           
            // Conseguir el producto
            $producto = new Producto();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
        }
        
        require_once 'views/categoria/ver.php';
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

    // metodo para eliminar una categoria en especifico
    public function eliminar(){
        Utils::isAdmin();
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            
            $delete = $categoria->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'categoria/index');

    }

}