<!--FILA CATEGORÍA-->
<div class="clearfix">
    <div class="col-xs-12">
        <h2><?= $nombre_categoria ?></h2>
    </div>
</div>
<div class="clearfix">
    <div class="col-xs-8 col-md-4">
        <a class="mostrar_dialogo" data-url="../vistas/usuario_mis_perfiles.php?add_perfil=1&id_perfil=<?=$array_perfiles_populares[0]["id_perfil"]?>">
            <figure class="card_popular">
                <img src="<?= $array_perfiles_populares[0]["url_imagen"] ?>"/>
                <figcaption>
                    <h3><?= $array_perfiles_populares[0]["nombre_perfil"] ?></h3>
                </figcaption>
            </figure>
        </a>
    </div>
    <div class="col-xs-8 col-md-4">
        <a class="mostrar_dialogo" data-url="../vistas/usuario_mis_perfiles.php?add_perfil=1&id_perfil=<?=$array_perfiles_populares[1]["id_perfil"]?>">
            <figure class="card_popular">
                <img src="<?= $array_perfiles_populares[1]["url_imagen"] ?>"/>
                <figcaption>
                    <h3><?= $array_perfiles_populares[1]["nombre_perfil"] ?></h3>
                </figcaption>
            </figure>
        </a>
    </div>
    <div class="col-xs-8 col-md-4">
        <a class="mostrar_dialogo" data-url="../vistas/usuario_mis_perfiles.php?add_perfil=1&id_perfil=<?=$array_perfiles_populares[2]["id_perfil"]?>">
            <figure class="card_popular">
                <img src="<?= $array_perfiles_populares[2]["url_imagen"] ?>"/>
                <figcaption>
                    <h3><?= $array_perfiles_populares[2]["nombre_perfil"] ?></h3>
                </figcaption>
            </figure>
        </a>
    </div>
</div><!--FILA CATEGORÍA-->


