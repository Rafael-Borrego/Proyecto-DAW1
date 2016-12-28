<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ScraperInstagram.php";

$scrapper = new ScrapperInstagram();
$resultado_busqueda = $scrapper->buscar_perfiles("messi");

function pretty_print($var = false)
{
    echo "\n<pre style=\"background: #FFFF99; font-size: 10px;\">\n";
    $var = print_r($var, true);
    echo $var . "\n</pre>\n";
}

//IMPRIMIR TODOS LOS RESULTADOS DE BÚSQUEDA
//pretty_print($resultado_busqueda);

//MOSTRAR RESULTADOS CON PAGINACIÓN DE PARÁMETROS URL
if (isset($_GET["offset"]) && isset($_GET["resultados_por_pagina"])) {
    foreach (array_slice($resultado_busqueda, $_GET["offset"], $_GET["resultados_por_pagina"]) as $elemento) {
        echo "<p><img src=" . $elemento->profilePicUrl . " >" . $elemento->username . "</p>";
    }
}else {
    print_r("SIN RESULTADOS");
}
