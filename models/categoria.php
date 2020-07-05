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
		return $this->id;
	}

	function setId($id) {
		$this->id = $id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function setNombre($nombre) {
        // Limpiamos nuestro string, para evitar inyeccion sql
		$this->nombre = $this->db->real_escape_string($nombre);
    }
    
    // metodo para obtener todas la categorias
    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;
    }

    // metodo del modelo para guardar la categoria
    public function save(){
        $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}//Fin de la clase