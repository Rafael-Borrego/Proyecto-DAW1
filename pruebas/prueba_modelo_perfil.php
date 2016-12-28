<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ScraperInstagram.php";

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Perfil_modelo.php";

function pretty_print($var = false)
{
    echo "\n<pre style=\"background: #FFFF99; font-size: 10px;\">\n";
    $var = print_r($var, true);
    echo $var . "\n</pre>\n";
}

$modelo_perfiles = new Perfil_modelo();
$scrapper = new ScrapperInstagram("neymarjr");


//INSERCIÓN DE UN PERFIL
if (!$modelo_perfiles->insertar_perfil($scrapper->id_usuario, $scrapper->nombre_usuario, $scrapper->descripcion,
                                        $scrapper->url_imagen, $scrapper->numero_seguidores, $scrapper->numero_publicaciones,
                                        "deportes")){
    print_r("Fallo en la inserción"."<br/>");
}

//ENCONTRAR PERFIL POR NOMBRE
print_r($modelo_perfiles->get_perfil_de_nombre("leomessi"));
