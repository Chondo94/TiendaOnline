<?php

class Pedido
{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;

    private $db;

    // Conexion a la base de datos
    public function __construct()
    {
        $this->db = Database::connect();
    }


    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getUsuario_id()
    {
        return $this->usuario_id;
    }

    function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    function getProvincia()
    {
        return $this->provincia;
    }

    function setProvincia($provincia)
    {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function getLocalidad()
    {
        return $this->localidad;
    }

    function setLocalidad($localidad)
    {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function setDireccion($direccion)
    {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function getCoste()
    {
        return $this->coste;
    }

    function setCoste($coste)
    {
        $this->coste = $coste;
    }

    function getEstado()
    {
        return $this->estado;
    }

    function setEstado($estado)
    {
        $this->estado = $estado;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function getHora()
    {
        return $this->hora;
    }

    function setHora($hora)
    {
        $this->hora = $hora;
    }

    // Metodo para listar los pedidos
    function getall()
    {
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
    }

    // Metodo para listar 1 solo pedidos en el formulario de actualizacion
    function getOne()
    {
        $producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

    // Metodo para sacar todos lor productos del ultimo pedido de un usuario en especifico
    function getOneByUser()
    {
        $sql = "SELECT p.id, p.coste FROM pedidos p "
                // esto inner lo puedo evitar ."INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                ."WHERE p.usuario_id = {$this->getUsuario_Id()} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
        
        return $pedido->fetch_object();
    }

    // Metodo para sacar todos los pedidos de un usuario
    function getAllByUser()
    {
        $sql = "SELECT p.* FROM pedidos p "
                // esto inner lo puedo evitar ."INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                ."WHERE p.usuario_id = {$this->getUsuario_Id()} ORDER BY id DESC";
        $pedido = $this->db->query($sql);
        
        return $pedido;
    }

    // Metodo para sacar todos los pruductos que se encuentran en la lineas de pedios
    public function getProductosByPedido($id){
       /* 
        $sql = "SELECT * FROM productos WHERE id IN "
        ."(SELECT productos_id FROM lineas_pedidos WHERE pedido_id={$id})";
         */
        $sql = "SELECT pr.*, lp.unidades FROM productos pr "
                . "INNER JOIN lineas_pedidos lp ON pr.id = lp.producto_id "
                . "WHERE lp.pedido_id={$id}";

        $productos = $this->db->query($sql);
        
        return $productos;
    }

    // metodo para guardar toda la informacion de un nuevo producto
    public function save()
    {
        $sql = "INSERT INTO pedidos VALUES (
            null, 
            {$this->getUsuario_id()}, 
            '{$this->getProvincia()}', 
            '{$this->getLocalidad()}', 
            '{$this->getDireccion()}', 
            {$this->getCoste()}, 
            'confirm', 
            CURDATE(), 
            CURTIME() 
            );";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    // Metodo para guardar una linea de pedido, aca me relaciono los productos con el pedido.
    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];

            $insert = "INSERT INTO lineas_pedidos VALUES(null, {$pedido_id}, {$producto->id}, {$elemento['unidades']})";
            $save = $this->db->query($insert);
            
        }


        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;

        var_dump($pedido_id);
    }
}//fin de la clase
