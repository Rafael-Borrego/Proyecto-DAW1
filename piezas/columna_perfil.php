<!--COLUMNA PERFIL-->
<div class="col-xs-8 col-md-4">
    <a class="mostrar_dialogo" data-url="../vistas/usuario_mis_perfiles.php?add_perfil=1&id_perfil=<?=$perfil["id_perfil"]?>">
        <figure class="card_popular">
            <img src="<?= $perfil["url_imagen"] ?>"/>
            <figcaption>
                <h3><?= $perfil["nombre_perfil"] ?></h3>
            </figcaption>
        </figure>
    </a>
</div><!--COLUMNA PERFIL-->


