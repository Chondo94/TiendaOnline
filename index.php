<?php
// Tengo acceso a todos lo controladores
require_once 'autoload.php';

require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

// Compruebo si me llega el Controlador
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'controller';
}else{
    echo "la Pagina no existe";
    exit();
}

// Compruebo si existe el controlador
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }else{
        echo "La Pagina no existe";
    }
}else{
    echo "La pagina no existe";
}

require_once 'views/layout/footer.php';
