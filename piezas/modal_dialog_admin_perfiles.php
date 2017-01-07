<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">Editar Usuario</h3>
            </div>

            <form class="form_actualizar" action="admin_administrarPerfiles.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="control-label">Nombre de Perfil</label>

                            <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->
                            <input type="text" name="submitted_actualizar" value="1" hidden="true">
                            <input type="text" class="modal-id_perfil" name="id_perfil" hidden="true">
                            <input type="text" class="modal-url_imagen" name="url_imagen" hidden="true">
                            <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->

                            <input type="text" class="modal-nombre_perfil form-control" required="required" name="nombre_perfil">
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label">Número de seguidores</label>
                            <input type="text" class="modal-num_seguidores form-control"  required="required" name="num_seguidores">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-6">
                            <label class="control-label">Descripción</label>
                            <textarea class="modal-descripcion form-control" rows="8"  name="descripcion"></textarea>
                        </div>

                        <div class="col-sm-6">
                            <label class="control-label">Número de publicaciones</label>
                            <input type="text" class="modal-num_publicaciones form-control" required="required" name="num_publicaciones">
                        </div>

                        <div class="col-sm-6">
                            <br>
                            <label class="control-label">Categoría</label>
                            <input type="text" class="modal-categoria form-control" required="required" name="categoria">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cerrar</button>
                    <button type="submit" value=" Send" class="btn btn-success" id="submit"><i class="glyphicon glyphicon-inbox"></i> Modificar</button>
                </div>
        </div>
    </div>
</div>