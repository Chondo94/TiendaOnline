<?php

class Database{
    public static function connect(){
        // Mi coneccion a la base de datos
        $db = new mysqli('localhost', 'root', '1234', 'tienda_online');
        // consulta para que mis datos los sirva en castellano
        $db->query("SET NAMES 'utf8'");
        return $db;

    }
}