<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ScraperInstagram.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Perfil_modelo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Publicacion_modelo.php";

function pretty_print($elemento = false)
{
    echo "\n<pre style=\"background: #FFFF99; font-size: 10px;\">\n";
    $elemento = print_r($elemento, true);
    echo $elemento . "\n</pre>\n";
}


$lista_perfiles = [
    //DEPORTES
    [
        "leomessi",
        "deportes",
    ],
    [
        "neymarjr",
        "deportes",
    ],
    [
        "3gerardpique",
        "deportes",
    ],
    [
        "luissuarez9",
        "deportes",
    ],
    [
        "mterstegen1",
        "deportes",
    ],
    [
        "samumtiti",
        "deportes",
    ],
    [
        "sergiroberto",
        "deportes",
    ],
    [
        "andresiniesta8",
        "deportes",
    ],
    [
        "ivanrakitic",
        "deportes",
    ],
    //MUSICA
    [
        "ledzeppelin",
        "musica",
    ],
    [
        "etjusticepourtous",
        "musica",
    ],
    [
        "billytalentband",
        "musica",
    ],
    [
        "bmthofficial",
        "musica",
    ],

];

$modelo_perfiles = new Perfil_modelo();
$modelo_publicaciones = new Publicacion_Modelo();

foreach ($lista_perfiles as $elemento){
    $scrapper = new ScrapperInstagram($elemento[0]);
    //INSERCIÓN EN DB DEL PERFIL
    if (!$modelo_perfiles->insertar_perfil($scrapper->id_usuario, $scrapper->nombre_usuario, $scrapper->descripcion,
        $scrapper->url_imagen, $scrapper->numero_seguidores, $scrapper->numero_publicaciones,
        $elemento[1])){
        print_r("Fallo en la inserción del perfil $scrapper->nombre_usuario (Posiblemente Repetido)"."<br/>");
    }

    //DESCARGA E INSERCIÓN EN DB DE PUBLICACIONES
    $array_publicaciones = $scrapper->descargar_array_media();
    foreach ($array_publicaciones as $indice => $publicacion){
        if (!$modelo_publicaciones->insertar_publicacion($publicacion["id_publicacion"], $publicacion["titulo"],
            $publicacion["fecha_creacion"], $publicacion["ruta_recurso_media"], $publicacion["texto"], $publicacion["origen_publicacion"],
            $publicacion["tipo_recurso_media"], $publicacion["id_perfil"])){
            print_r("  Fallo en la inserción de publicación de $scrapper->nombre_usuario "."(Posiblemente Repetido)<br/>");
        }
    }

    //MOSTRAR PUBLICACIONES
    $publicaciones_perfil = $modelo_publicaciones->get_publicaciones_perfil($scrapper->id_usuario);
    pretty_print($publicaciones_perfil);
}
