<?php
// Tengo acceso a todos lo controladores
require_once 'autoload.php';
// este requiere es parte de los parametros que me sirven para limpiar la url
require_once 'config/parameters.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

// creo la funcion error para retornar una vista al usuario.
function show_error(){
    $error = new errorController();
    $error->index();
}

// Compruebo si me llega el Controlador
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;

}else{
    show_error();
    exit();
}

// Compruebo si existe el controlador
if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        // Cargo la accion especificada por defecto que especifique en mi archivo parameters
        $action_default = action_default;
        $controlador->$action_default();
    }else{
        show_error();
    }
}else{
    show_error();
}

require_once 'views/layout/footer.php';
