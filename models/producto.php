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


	function getId() {
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getCategoria_id() {
		return $this->categoria_id;
	}

	function setCategoria_id($categoria_id) {
		$this->categoria_id = $categoria_id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
    }

	function getDescripcion() {
		return $this->descripcion;
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function getPrecio() {
		return $this->precio;
	}

	function setPrecio($precio) {
		$this->precio = $this->db->real_escape_string($precio);
	}

	function getStock() {
		return $this->stock;
	}

	function setStock($stock) {
		$this->stock = $this->db->real_escape_string($stock);
	}

	function getOferta() {
		return $this->oferta;
	}

	function setOferta($oferta) {
		$this->oferta = $this->db->real_escape_string($oferta);
	}

	function getFecha() {
		return $this->fecha;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
    }
    
    // Metodo para listar los productos
    function getall(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
	}

	 // metodo para obtener tods los productos de una categoria
	 function getAllCategory(){
		 $sql = "SELECT p.*, c.nombre AS 'catnombre'  FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id = {$this->getCategoria_id()} ORDER BY id DESC";
		 /* "SELECT p.*, c.nombre AS 'CatNombre' FROM productos p"
		."INNER JOIN categorias c ON c.id = p.categoria_id"
		. "WHERE p.categoria_id = {$this->getId()}"
		."ORDER BY id DESC";  */
		$productos = $this->db->query($sql);
        return $productos;
	}

	// Metodo para mostrar algunos productos aleatorios en a pagina principal
	public function getRandom($limit){
		$productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
		return $productos;
	}
	
	
	// Metodo para listar 1 solo producto en el formulario de actualizacion
    function getOne(){
	$producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }

     // metodo para guardar toda la informacion de un nuevo producto
     public function save(){
        $sql = "INSERT INTO productos VALUES (
            null, 
            {$this->getCategoria_id()}, 
            '{$this->getNombre()}', 
            '{$this->getDescripcion()}', 
            {$this->getPrecio()}, 
            {$this->getStock()}, 
            null, 
            CURDATE(), 
            '{$this->getImagen()}' 
            );";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
	}

	     // metodo para editar toda la informacion de un producto creado
		 public function edit(){
			$sql = "UPDATE productos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', precio={$this->getPrecio()}, stock={$this->getStock()}, categoria_id={$this->getCategoria_id()} ";

				if($this->getImagen() != null){
					$sql .= ", imagen = '{$this->getImagen()}'";
				}

			// sacamos el id que tenemos guardado en nuestro objeto
			$sql .= "WHERE id={$this->id};";
			
			$save = $this->db->query($sql);
	
			$result = false;
			if($save){
				$result = true;
			}
			return $result;
		}
	
	// Metodo de eliminar para llamarlo desde el controlador
	public function delete(){
	$sql = "DELETE FROM productos WHERE id={$this->id}";
	$delete = $this->db->query($sql);

	$result = false;
        if($delete){
            $result = true;
        }
        return $result;
	
	}
    
}//fin de la clase


