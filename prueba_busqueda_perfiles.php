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

//pretty_print($resultado_busqueda);

foreach ($resultado_busqueda as $elemento){
    echo "<p><img src=".$elemento->profilePicUrl." >".$elemento->username."</p>";
}