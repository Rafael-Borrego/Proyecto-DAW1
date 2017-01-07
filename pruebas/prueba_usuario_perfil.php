<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/UsuarioPerfil_modelo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Usuario_modelo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Perfil_modelo.php";

function pretty_print($var = false)
{
    echo "\n<pre style=\"background: #FFFF99; font-size: 10px;\">\n";
    $var = print_r($var, true);
    echo $var . "\n</pre>\n";
}

//$usu_per_modelo = new UsuarioPerfil_modelo();
//$usuario_modelo = new Usuario_Modelo();
$perfil_modelo = new Perfil_modelo();

//$perfil_modelo->eliminar_perfil("1146885610");

//INSERCIÓN
/*if (!$usu_per_modelo->insertar_usuario_perfil(1,"1756749631")){
       print_r("dfklajsldfj");
}*/

//EXISTE RELACIÓN?
/*if (!$usu_per_modelo->existe_relacion(2,"1146885610")){
    print_r("<br>NO EXISTE ESA RELACIÓN");
}*/

//AÑADIR A LISTA DE SEGUIDOS
//$usuario_modelo->add_perfil_a_seguidos(1,"20740995");

//ElIMINAR DE LA LISTA DE SEGUIDOS
//$usuario_modelo->quitar_perfil_de_seguidos(1,"20740995");

//pretty_print($usuario_modelo->get_all_perfiles_usuario(1));

//ACTUALIZAR PERFIL
