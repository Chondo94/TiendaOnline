<?php
require_once 'models/pedido.php';

class pedidoController{
    public function hacer(){

        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        if(isset($_SESSION['identity'])){
            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if($provincia & $localidad & $direccion){
            // Guardar datos a la base de datos
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setcoste($coste);

                // Guardo el pedido en la base de datos y verifico si se guardo correctamente
                $save = $pedido->save();

                // Guardar linea de pedido
                $save_linea = $pedido->save_linea();

                if($save & $save_linea){
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }

            }else{
                $_SESSION['pedido'] = "failed";
            }

            header("Location:".base_url.'pedido/confirmado');
                
        }else{
            // redirigir al index.
            header("Location".base_url);
        }
    }

    public function confirmado(){
        if(isset($_SESSION['identity'])){
            $identity = $_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOneByUser(); 

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }
        require_once 'views/pedido/confirmado.php';
    }

}