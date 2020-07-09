<?php
require_once 'models/producto.php';

class productoController{
    // function index sirve para mostrar el contendido qu quiero segun la ruta que especifique.
    public function index(){
        // echo "Controlador productos, Accion Index";
        // creo mi objeto para sacar productos utilizo el metodo ramdom de mi modelo para que aparezca aleatoriamente
        $producto = new Producto();
        $productos = $producto->getRandom(6);

        // Renderizar a la Vista
        // Ruta especificada
        require_once 'views/producto/destacados.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);
            // obtengo mi objeto del modelo de producto donde consulto solo 1 producto.
            $product = $producto->getOne();

        }
        require_once 'views/producto/ver.php';
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
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if($nombre && $descripcion && $precio && $stock && $categoria){
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                // Recibir y Guardar la imagen
                    // con esta condicional comprobaremos si la imagen Llega
                if(isset($_FILES['imagen'])){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    // Verificamos si estamos recibiendo un archivo tipo imagen
                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                    /*
                    vemos el directorio donde se guardara la imagen y si este no existe, por medio del
                    mkdir se crea el directerio con subdirectioros y para que eso funcion se agrega un tercer
                    parametro que es true.
                    */
                        if(!is_dir('uploads/images')){
                            mkdir('uploads/images', 0777, true);
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    }
                }

                // condicional para verficar si estoy creado o editando el producto
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $producto->setId($id);

                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
                }


                if($save){
                    $_SESSION['producto'] = "complete";
                }else{
                    $_SESSION['producto'] = "failed";
                }
            }else{
                $_SESSION['producto'] = "failed";
            }
        }else{
            $_SESSION['producto'] = "failed";
        }
        header('Location:'.base_url.'producto/gestion');
    }

    // Metodo para actualizar un producto
    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);
            // obtengo mi objeto del modelo de producto donde consulto solo 1 producto.
            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        }else{
            header('Location:'.base_url.'producto/gestion');
        }
        
    }

    // Metodo para eliminar un producto
    public function eliminar(){
        Utils::isAdmin();
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            
            $delete = $producto->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'producto/gestion');

    }
}