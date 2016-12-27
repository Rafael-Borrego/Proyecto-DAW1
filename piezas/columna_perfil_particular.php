<!--COLUMNA PERFIL PARTICULAR-->
<div class="col-xs-12 col-md-12">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title"><?= $array_perfiles["publicaciones"][$indice]["titulo_publicacion"]?></h4>
            <h6 class="card-subtitle text-muted"><?= $array_perfiles["nombre_perfil"]?></h6>
        </div>
        <img src="<?= $array_perfiles["publicaciones"][$indice]["imagen_publicacion"]?>" alt="Card image">
        <div class="card-block">
            <p class="card-text"><?= $array_perfiles["publicaciones"][$indice]["texto_publicacion"]?></p>
            <br>
        </div>
    </div>
</div><!--COLUMNA PERFIL PARTICULAR-->