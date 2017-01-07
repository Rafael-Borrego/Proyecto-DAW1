<!--FILA TABLA ADMINISTRAR PERFILES-->
<tr>
    <td><?=$usuario["email"]?></td>
    <td><?=$usuario["contrasena"]?></td>
    <td><?=$usuario["tipo_usuario"]?></td>
    <td><?=$usuario["nombre_usuario"]?></td>
    <td><?=$usuario["nombre_completo"]?></td>
    <td><?=$usuario["sexo"]?></td>
    <td>
        <p data-placement="top" data-toggle="tooltip" title="Edit">
            <button class="abrir_modal_actualizar btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                    data-target="#edit"
                    data-id_usuario="<?=$usuario["id_usuario"]?>"
                    data-email="<?=$usuario["email"]?>"
                    data-contrasena="<?=$usuario["contrasena"]?>"
                    data-tipo_usuario="<?=$usuario["tipo_usuario"]?>"
                    data-nombre_usuario="<?=$usuario["nombre_usuario"]?>"
                    data-nombre_completo="<?=$usuario["nombre_completo"]?>"
                    data-sexo="<?=$usuario["sexo"]?>"
                    data-descripcion="<?=$usuario["descripcion"]?>"
                    data-aficiones="<?=$usuario["aficiones"]?>"
                    ><span class="glyphicon glyphicon-pencil"></span>
            </button>
        </p>
    </td>
    <td>
        <p data-placement="top" data-toggle="tooltip" title="Delete">
            <a href="admin_administrarUsuarios.php?del_usuario=1&id_usuario=<?=$usuario["id_usuario"]?>">
                <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                    data-target="#delete"><span class="glyphicon glyphicon-trash"></span>
                </button>
            </a>
        </p>
    </td>
</tr>
<!--FILA TABLA ADMINISTRAR PERFILES-->