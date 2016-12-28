<!--COLUMNA PERFIL PARTICULAR-->
<div class="col-xs-12 col-md-12">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title"><?= $array_perfiles["publicaciones"][$indice]["titulo_publicacion"]?></h4>
            <h6 class="card-subtitle text-muted"><?= $array_perfiles["nombre_perfil"]?></h6>
        </div>
        <?php  if ($array_perfiles["publicaciones"][$indice]["tipo_publicacion"]=="video") { ?>
        <video width="320" height="240" controls>
            <source src="<?= $array_perfiles["publicaciones"][$indice]["src_publicacion"]?>" type="video/mp4">
        </video><?php }else {?>
        <img src="<?= $array_perfiles["publicaciones"][$indice]["src_publicacion"]?>" alt="Card image"><?php }?>
        <div class="card-block">
            <p class="card-text"><?= $array_perfiles["publicaciones"][$indice]["texto_publicacion"]?></p>
            <br>
        </div>
    </div>
</div><!--COLUMNA PERFIL PARTICULAR-->