<?php

// Clase para mi modelo de categoria
class Categoria{
    private $id;
    private $nombre;
    private $db;
    
    // Conexion a la base de datos
    public function __construct(){
        $this->db = Database::connect(); 
    }

	function getId() {
		return $this->$id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getNombre() {
		return $this->$nombre;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
    }
    
    // metodo para obtener todas la categorias
    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias;");
        return $categorias;
    }

}//Fin de la clase