<!--COLUMNA PERFIL MIS PERFILES-->
<div class="col-xs-8 col-md-6">
    <a href="usuario_perfil_particular.php?nombre_perfil=<?=$array_perfiles[$indice]["nombre_perfil"]?>">
        <figure class="card_perfil">
            <img src="<?=$array_perfiles[$indice]["url_imagen"]?>" alt="<?=$array_perfiles[$indice]["nombre_perfil"]?>"/>
            <i><span></span><?=$array_perfiles[$indice]["num_publicaciones"]?></i>

            <figcaption>
                <h3><?=$array_perfiles[$indice]["nombre_perfil"]?></h3>
                <p><?=$array_perfiles[$indice]["nombre_perfil"]?><br><?=$array_perfiles[$indice]["descripcion"]?></p>
            </figcaption>
        </figure>
    </a>
    <a class="btn btn-danger" href="usuario_mis_perfiles.php?del_perfil=1&id_perfil=<?=$array_perfiles[$indice]["id_perfil"]?>">Dejar de seguir</a>
</div><!--COLUMNA PERFIL MIS PERFILES-->