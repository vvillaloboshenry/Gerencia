/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    /** ----------------------------------
     * Controladores para la vista: nuevo rol
     ------------------------------------- */

    // ----------------------------
    // submit nuevo rol
    // ----------------------------
    $("#form_crear_rol_permisos").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                notificacion(data.titulo, data.mensaje, data.tipo);
                 limpiar();
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });

    // ----------------------------
    // submit asignar rol
    // ----------------------------
    $("#form_asignar_rol_funcionario").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                notificacion(data.titulo, data.mensaje, data.tipo);
                 limpiar();
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });
    // ----------------------------
    // submit reestablecer clave default
    // ----------------------------
    $("#form_reestablecer_clave").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });
    /** --------------------------------------------
     * Modales para capturar los datos en las vistas
     ----------------------------------------------- */

    // ----------------------------
    // nuevo_roll
    // ----------------------------
    reestablecerClave = function (idFuncionario, usuario) {
        $('#m_reestablecer_clave_idFuncionario').val(idFuncionario);
        $('#m_reestablecer_clave_usuario').val(usuario);
    };
    $('#modalRestablecerClave').on('shown.bs.modal', function () {
        // Localiza nuestro modal #modalRestablecerClave. 
        // Aqui pongo en foco el elemento con id #boton
        $('#boton').focus()
    });


});