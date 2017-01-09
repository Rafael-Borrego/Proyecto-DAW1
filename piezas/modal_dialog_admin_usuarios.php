<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Editar Usuario</h3>
            </div>

            <form class="form_actualizar" action="admin_administrarUsuarios.php" method="post" id="form_actualizar">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="control-label">Email</label>

                            <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->
                            <input type="text" name="submitted_actualizar" value="1" hidden="true">
                            <input type="text" class="modal-id_usuario" name="id_usuario" hidden="true">
                            <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->

                            <input type="text" class="modal-email form-control" required="required" name="email">
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">Contraseña</label>
                            <input type="text" class="modal-contrasena form-control" required="required" name="contrasena">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="control-label">Nombre usuario</label>
                            <input type="text" class="modal-nombre_usuario form-control" required="required" name="nombre_usuario">
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">Nombre completo</label>
                            <input type="text" class="modal-nombre_completo form-control" name="nombre_completo">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="control-label">Descripción</label>
                            <textarea class="modal-descripcion form-control" rows="8"  name="descripcion"></textarea>
                        </div>

                        <div class="col-sm-6">
                            <label class="control-label">Tipo Usuario</label>
                            <select class="modal-tipo_usuario form-control" name="tipo_usuario">
                                <option>administrador</option>
                                <option>normal</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label class="control-label">Sexo</label>
                            <select class="modal-sexo form-control" name="sexo">
                                <option>hombre</option>
                                <option>mujer</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <br>
                            <label class="control-label">Aficiones</label>
                            <input type="text" class="modal-aficiones form-control" name="aficiones" placeholder="POR IMPLEMENTAR">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cerrar</button>
                    <button type="submit" value=" Send" class="btn btn-success" form="form_actualizar"><i class="glyphicon glyphicon-inbox"></i> Modificar</button>
                </div>
        </div>
    </div>
</div>