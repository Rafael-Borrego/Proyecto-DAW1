<?php

class Database
{
    protected static $conexion;

    public function conectar()
    {
        if (!isset(self::$conexion)){
            $config_database = parse_ini_file($_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/configuration/database_config.ini");

            self::$conexion = new mysqli($config_database["host"],
                                         $config_database['usuario'],
                                         $config_database['password'],
                                         $config_database['nombre_db']);

            //self::$conexion = new mysqli("localhost", "root", "root", "daw1_database");
        }

        if(self::$conexion === false) {
            return false;
        }

        return self::$conexion;
    }
}