/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    /** ----------------------------------
     * Controladores para la vista: nueva visita
     ------------------------------------- */

    // ----------------------------
    // submit nueva visita
    // ----------------------------
    $("#form_crear_visita").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                notificacion(data.titulo, data.mensaje, data.tipo);
                limpiar_()();
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
    // nueva_visita
    // ----------------------------
});