<?php

class Database
{
    protected static $conexion;

    public function conectar()
    {
        if (!isset(self::$conexion)){
            $config_database = parse_ini_file("./configuration/database_config.ini");

            self::$conexion = new mysqli($config_database["host"],
                                         $config_database['usuario'],
                                         $config_database['password'],
                                         $config_database['nombre_db']);
        }

        if(self::$conexion === false) {
            return false;
        }

        return self::$conexion;
    }
}