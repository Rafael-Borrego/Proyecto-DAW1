$('.mostrar_dialogo').click(function() {
    confirmar_añadir("usuario_mis_perfiles.php?holaaaa=1");
});

function confirmar_añadir(url_redireccion) {
    swal({
        title: "SEGUIR PERFIL",
        text: "¿Quieres añadir el perfil a tu lista de seguidos?",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonText: "Sí!",
        confirmButtonColor: "#7aec69",
    },function() {
        window.location.href = url_redireccion;
    });
}