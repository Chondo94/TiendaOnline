<?php

class Pedido{
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
    public function __construct(){
        $this->db = Database::connect(); 
    }


	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getUsuario_id() {
		return $this->usuario_id;
	}

	function setUsuario_id($usuario_id) {
		$this->usuario_id = $usuario_id;
	}

	function getProvincia() {
		return $this->provincia;
	}

	function setProvincia($provincia) {
		$this->provincia = $this->db->real_escape_string($provincia);
    }

	function getLocalidad() {
		return $this->localidad;
	}

	function setLocalidad($localidad) {
		$this->localidad = $this->db->real_escape_string($localidad);
	}

	function getDireccion() {
		return $this->direccion;
	}

	function setDireccion($direccion) {
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	function getCoste() {
		return $this->coste;
	}

	function setCoste($coste) {
		$this->coste = $coste;
	}

	function getEstado() {
		return $this->estado;
	}

	function setEstado($estado) {
		$this->estado = $estado;
	}

	function getFecha() {
		return $this->fecha;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function getHora() {
		return $this->hora;
	}

	function setHora($hora) {
		$this->hora = $hora;
    }
    
    // Metodo para listar los pedidos
    function getall(){
        $productos = $this->db->query("SELECT * FROM pedidos ORDER BY id DESC");
        return $productos;
	}

	// Metodo para listar 1 solo pedidos en el formulario de actualizacion
    function getOne(){
	$producto = $this->db->query("SELECT * FROM pedidos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

     // metodo para guardar toda la informacion de un nuevo producto
     public function save(){
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
        if($save){
            $result = true;
        }
        return $result;
	}
    
}//fin de la clase


