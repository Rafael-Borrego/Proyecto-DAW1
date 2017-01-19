<form action="admin_configuracion.php" method='post'>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" name="email" value="<?=$usuario_logueado["email"]?>">
    </div>
    <div class="form-group">
        <label>Contraseña</label>
        <input type="text" class="form-control" name="contrasena" value="<?=$usuario_logueado["contrasena"]?>">
    </div>
    <div class="form-group">
        <label class="control-label">Tipo de Usuario</label>
        <select class="modal-tipo_usuario form-control" name="tipo_usuario" value="<?=$usuario_logueado["tipo_usuario"]?>">
            <option>administrador</option>
            <option>normal</option>
        </select>
    </div>
    <div class="form-group">
        <label>Nombre de Usuario</label>
        <input type="text" class="form-control" name="nombre_usuario" value="<?=$usuario_logueado["nombre_usuario"]?>">
    </div>
    <div class="form-group">
        <label>Nombre Completo</label>
        <input type="text" class="form-control" name="nombre_completo" value="<?=$usuario_logueado["nombre_completo"]?>">
    </div>
    <div class="form-group">
        <label class="control-label">Sexo</label>
        <select class="modal-sexo form-control" name="sexo" value="<?=$usuario_logueado["sexo"]?>">
            <option>hombre</option>
            <option>mujer</option>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label">Descripción</label>
        <textarea class="modal-descripcion form-control" rows="8"  name="descripcion"><?=$usuario_logueado["descripcion"]?></textarea>
    </div>
    <br>

    <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->
    <input type="text" name="submitted_actualizar" value="1" hidden="true">
    <input type="text" class="id_usuario" name="id_usuario" value="<?=$usuario_logueado["id_usuario"]?>" hidden="true">
    <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->

    <button type="submit" class="btn btn-primary">Modificar Datos</button>
</form>