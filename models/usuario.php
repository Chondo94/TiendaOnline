<?php


// Clase para mi modelo de usuario
class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
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

	function getNombre() {
		return $this->nombre;
	}

	function setNombre( $nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function getApellidos() {
		return $this->apellidos;
	}

	function setApellidos($apellidos) {
		$this->apellidos = $this->db->real_escape_string($apellidos);
	}

	function getEmail() {
		return $this->email;
	}

	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}

	function getPassword() {
        // encripto la contraseña para mayor seguridad
		return $this->password;
	}

	function setPassword($password) {
		$this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function getRol() {
		return $this->rol;
	}

	function setRol($rol) {
		$this->rol = $rol;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
    }
    
    // metodo para guardar toda la informacion de un nuevo usuario
    public function save(){
        $sql = "INSERT INTO usuarios VALUES (NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}