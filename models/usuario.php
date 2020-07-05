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
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}

	function setPassword($password) {
		$this->password = $password;
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

    //Metodo para login de usuario
    public function login(){
        $result = false;
        $email = $this->email;
        $password = $this->password;
        
        //Comprobamos si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        /* 
            Verificamos si la consulta solo posee 1 registro en la fila
            para pode verificar la contraseña de ese registro, ya que si
            da mas de 1 quiere decir que son mas de 1 usuario y por lo tanto
            no podemos verificar la contraseña de todos a la vez.
        */
        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();

            //Verificar si la contraseña es correcta
            $verify = password_verify($password, $usuario->password);

            if($verify){
                $result = $usuario;
            }
        }

        return $result;
    }

}