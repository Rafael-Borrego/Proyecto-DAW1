<!--FILA TABLA ADMINISTRAR PERFILES-->
<tr>
    <td><?=$perfil["id_perfil"]?></td>
    <td><?=$perfil["nombre_perfil"]?></td>
    <td><?=$perfil["descripcion"]?></td>
    <td><?=$perfil["categoria"]?></td>
    <td>
        <p data-placement="top" data-toggle="tooltip" title="Edit">
            <button class="abrir_modal_actualizar btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                    data-target="#edit"
                    data-id_perfil="<?=$perfil["id_perfil"]?>"
                    data-nombre_perfil="<?=$perfil["nombre_perfil"]?>"
                    data-descripcion="<?=$perfil["descripcion"]?>"
                    data-url_imagen="<?=$perfil["url_imagen"]?>"
                    data-num_seguidores="<?=$perfil["num_seguidores"]?>"
                    data-num_publicaciones="<?=$perfil["num_publicaciones"]?>"
                    data-categoria="<?=$perfil["categoria"]?>"
                    ><span class="glyphicon glyphicon-pencil"></span>
            </button>
        </p>
    </td>
    <td>
        <p data-placement="top" data-toggle="tooltip" title="Delete">
            <a href="admin_administrarPerfiles.php?del_perfil=1&id_perfil=<?=$perfil["id_perfil"]?>">
                <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                    data-target="#delete"><span class="glyphicon glyphicon-trash"></span>
                </button>
            </a>
        </p>
    </td>
</tr>
<!--FILA TABLA ADMINISTRAR PERFILES-->