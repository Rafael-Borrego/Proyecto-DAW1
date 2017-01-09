<div class="col-md-4">
<div class="card" style="width: 8rem;">
    <img class="card-img-top" src="<?=$perfil->profilePicUrl?>" alt="Card image cap">
    <div class="card-block">
        <h4 class="card-title"><?=$perfil->username?></h4>
        <p class="card-text"><?=(($perfil->isVerified)=="1") ? "<strong>verificado</strong>" : "no verificado"?></p>
        <a href="admin_nuevo_perfil.php?insertar_perfil=1&nombre_perfil=<?=$perfil->username?>" class="btn btn-primary">Añadir perfil</a>
    </div>
</div>
    <br>
</div>