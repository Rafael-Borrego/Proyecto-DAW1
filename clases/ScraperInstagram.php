<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/vendor/autoload.php";
use InstagramScraper\Instagram;
use InstagramScraper\Model\Media;
use Unirest\Request;

date_default_timezone_set('Europe/Madrid');

class ScrapperInstagram
{

    /*---ATRIBUTOS---*/
    public $nombre_usuario;
    public $id_usuario;
    public $url_imagen;
    public $nombre_completo;
    public $descripcion;
    public $numero_publicaciones;
    public $numero_seguidores;
    public $numero_seguidos;
    public $cuenta_instagram;
    public $array_media;
    public $limite_descargas = 10;

    /*---MÉTODOS---*/
    /*---Constructor de la clase*/
    public function __construct($nombre_usuario=null)
    {
        Request::verifyPeer(false);
        if ($nombre_usuario){
            $this->nombre_usuario = $nombre_usuario;
            $this->cuenta_instagram = Instagram::getAccount($this->nombre_usuario);
            $this->id_usuario = $this->cuenta_instagram->id;
            $this->url_imagen = $this->cuenta_instagram->profilePicUrl;
            $this->nombre_completo = $this->cuenta_instagram->fullName;
            $this->descripcion = $this->cuenta_instagram->biography;
            $this->numero_publicaciones = $this->cuenta_instagram->mediaCount;
            $this->numero_seguidores = $this->cuenta_instagram->followedByCount;
            $this->numero_seguidos = $this->cuenta_instagram->followsCount;
            $this->array_media = Instagram::getMedias($this->nombre_usuario, $this->limite_descargas/*$this->numero_publicaciones*/);
        }

    }

    /*---Método para mostrar la información básica del perfil de instagram*/
    public function echo_basic_info()
    {
        print_r("-----INFO CUENTA INSTAGRAM-----" . '<br/>');
        print_r("&nbsp&nbsp&nbspNOMBRE CUENTA=> " . $this->nombre_usuario . '<br/>');
        print_r("&nbsp&nbsp&nbspID DE USUARIO=> " . $this->id_usuario . '<br/>');
        print_r("&nbsp&nbsp&nbspNOMBRE COMPLETO=> " . $this->nombre_completo . '<br/>');
        print_r("&nbsp&nbsp&nbspNº PUBLICACIONES=> " . $this->numero_publicaciones . '<br/>');
        print_r("&nbsp&nbsp&nbspNº SEGUIDORES=> " . $this->numero_seguidores . '<br/>');
        print_r("&nbsp&nbsp&nbspNº SEGUIDOS=> " . $this->numero_seguidos . '<br/>');
        print_r("<br/><br/>");
    }

    /*---Método para descargar el array de recursos media en una carpeta con el nombre del usuario*/
    public function descargar_array_media()
    {
        $num_repetidos = 0;

        if (!file_exists($_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/descargas_rrss")) {
            mkdir($_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/descargas_rrss", 0777, true);
        }
        chdir($_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/descargas_rrss");
        if (!file_exists($_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/descargas_rrss/instagram")) {
            mkdir($_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/descargas_rrss/instagram", 0777, true);
        }
        chdir($_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/descargas_rrss/instagram");
        //Se crea la carpeta con el nombre del usuario si no existe
        if (!file_exists($this->nombre_usuario)) {
            mkdir($this->nombre_usuario, 0777, true);
        }
        //Se cambia el directorio actual al nuevo creado
        chdir($this->nombre_usuario);

        $array_resultado = array();

        //Se recorre el array de media resources y se descargan en la carpeta
        foreach ($this->array_media as $indice => $elemento) {
            //print_r("+++Descargando recurso " . date('Y-m-d H:i:s', $elemento->createdTime) . "
             //           <br/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTipo=> " . $elemento->type);
            if ($elemento->type == "video") {//CASO VÍDEO
                $nombre_archivo = date('Y-m-d_H-i-s', $elemento->createdTime) . ".mp4";
                if (!file_exists($nombre_archivo)) {
                    copy($elemento->videoStandardResolutionUrl, $nombre_archivo);
                    print_r("<br/>");
                } else {
                    //print_r("  NO SE DESCARGA PORQUE YA ESTÁ GUARDADO" . "<br/>");
                    $num_repetidos++;
                }
            } else {//CASO IMAGEN
                $nombre_archivo = date('Y-m-d_H-i-s', $elemento->createdTime) . ".png";
                if (!file_exists($nombre_archivo)) {
                    copy($elemento->imageHighResolutionUrl, $nombre_archivo);
                    print_r("<br/>");
                } else {
                    //print_r("  NO SE DESCARGA PORQUE YA ESTÁ GUARDADO" . "<br/>");
                    $num_repetidos++;
                }
            }


            /*print_r("&nbsp&nbspid_publicacion => ".$elemento->id. '<br/>');
            print_r("&nbsp&nbsptitulo => ".substr($elemento->caption, 0, 20)."...". '<br/>');
            print_r("&nbsp&nbspfecha => ".date('Y-m-d H:i:s', $elemento->createdTime). '<br/>');
            print_r("&nbsp&nbspruta_media => ".$_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/descargas_rrss/instagram/".
                    $this->nombre_usuario."/".$nombre_archivo. '<br/>');
            print_r("&nbsp&nbsptexto => ".$elemento->caption. '<br/>');
            print_r("&nbsp&nbspid_perfil => ".$this->id_usuario."($this->nombre_usuario)<br/>");*/


            $array_resultado[$indice] = [
                "id_publicacion" => $elemento->id,
                "titulo" => strlen($elemento->caption) < 20 ? $elemento->caption : substr($elemento->caption, 0, 20) . "...",
                "fecha_creacion" => date('Y-m-d H:i:s', $elemento->createdTime),
                "ruta_recurso_media" => /*$_SERVER["DOCUMENT_ROOT"] . */"http://localhost/proyecto_daw1/descargas_rrss/instagram/" .
                    $this->nombre_usuario . "/" . $nombre_archivo,
                "texto" => $elemento->caption,
                "origen_publicacion" => "instagram",
                "tipo_recurso_media" => $elemento->type,
                "id_perfil" => $this->id_usuario,
            ];
        }

        print_r("<br/><br/>");
        $num_descargados = ($indice + 1) - $num_repetidos;
        print_r("--- LÍMITE DE DESCARGA = 10 ÚLTIMAS PUBLICACIONES.<br>
                    --- DESCARGADOS " . $num_descargados . " ARCHIVOS NUEVOS DE "
            . $this->numero_publicaciones . " PUBLICACIONES TOTALES ---");
        print_r("<br/><br/>");

        return $array_resultado;
    }

    /*Método para buscar perfiles en Instagram*/
    public function buscar_perfiles($termino_búsqueda)
    {
        $perfiles = Instagram::searchAccountsByUsername($termino_búsqueda);
        return $perfiles;
    }
}

?>
