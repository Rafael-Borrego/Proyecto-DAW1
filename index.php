<?php

require_once 'clases/Usuario.class.php';
require_once 'modelos/Usuario_modelo.php';
require_once 'database/funciones_database.php';
require_once 'database/Database.php';


$usuario = new Usuario();
$usuario->__SET('email','usuario1@email.com');
$usuario->__SET('contrasena','pass');
$usuario->__SET('tipo_usuario','normal');
$usuario->__SET('nombre_usuario','usuario1');
$usuario->__SET('nombre_completo','usuario1_completo');
$usuario->__SET('sexo','hombre');
$usuario->__SET('descripcion','descripcion usuario1');

$modelo_usuario = new Usuario_Modelo();

print_r($modelo_usuario->get_array_usuarios());


/*$db = new Database();
$conexion = $db->conectar();


$resultado = $conexion->query("SELECT * FROM Usuario");
print_r($resultado->fetch_assoc());
*/

$conexion->close();