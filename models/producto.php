<?php

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;
    
    // Conexion a la base de datos
    public function __construct(){
        $this->db = Database::connect(); 
    }


	public function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	public function getCategoria_id() {
		return $this->categoria_id;
	}

	function setCategoria_id($categoria_id) {
		$this->categoria_id = $categoria_id;
	}

	public function getNombre() {
		return $this->$nombre;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function getDescripcion() {
		return $this->$descripcion;
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	public function getPrecio() {
		return $this->$precio;
	}

	function setPrecio($precio) {
		$this->precio = $precio;
	}

	public function getStock() {
		return $this->$stock;
	}

	function setStock($stock) {
		$this->stock = $stock;
	}

	public function getOferta() {
		return $this->$oferta;
	}

	function setOferta($oferta) {
		$this->oferta = $oferta;
	}

	public function getFecha() {
		return $this->$fecha;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function getImagen() {
		return $this->$imagen;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
    }
    
    // Metodo para listar los productos
    public function getall(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }

}//fin de la clase