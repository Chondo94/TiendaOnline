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

    // metodo para obtener los productos por categoria, aca saco el objeto
    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
        return $categoria->fetch_object();
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

	// Metodo de eliminar para llamarlo desde el controlador
	public function delete(){
        $sql = "DELETE FROM categorias WHERE id={$this->id}";
        $delete = $this->db->query($sql);
    
        $result = false;
            if($delete){
                $result = true;
            }
            return $result;
        
        }

}//Fin de la clase