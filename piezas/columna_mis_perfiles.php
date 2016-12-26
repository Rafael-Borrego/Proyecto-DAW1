<!--COLUMNA PERFIL MIS PERFILES-->
<div class="col-xs-8 col-md-6">
    <a href="usuario_perfil_particular.html?nombre_perfil=<?=$array_perfiles[$indice]["nombre_perfil"]?>">
        <figure class="card_perfil">
            <img src="<?=$array_perfiles[$indice]["imagen_perfil"]?>" alt="<?=$array_perfiles[$indice]["nombre_perfil"]?>"/>
            <i><span>1</span></i>

            <figcaption>
                <h3><?=$array_perfiles[$indice]["nombre_perfil"]?></h3>
                <p><?=$array_perfiles[$indice]["nombre_perfil"]?><br><?=$array_perfiles[$indice]["descripcion_perfil"]?></p>
            </figcaption>
        </figure>
    </a>
</div><!--COLUMNA PERFIL MIS PERFILES-->