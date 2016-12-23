<?php

function conectar_database()
{

    $config = parse_ini_file(realpath('../configuration/database_config.ini'));
    print_r(realpath('../configuration/database_config.ini'));
    print_r($config);

    static $connection;
    $connection= mysqli_connect($config['host'],$config['usuario'],$config['password'],$config['nombre_db']);

    if($connection === false) {
        printf("mala conexion");
    } else {
        printf($connection->character_set_name());
    }

    return $connection;
}
