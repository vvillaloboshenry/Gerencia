/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    /** ----------------------------------
     * Controladores para la vista: listar_administrador
     ------------------------------------- */

    // ----------------------------
    // submit finalizar visita
    // ----------------------------
    $("#m_ver_visita_finalizarVisita").click(function () {
        var idVisitas = $('#m_ver_visita_idVisita').val();
        var fechaTerminos = $('#m_ver_visita_fechaTermino').val();
        $.ajax({
            data: {"idVisita": idVisitas, "fechaTermino": fechaTerminos}, // Adjuntar los campos del formulario enviado.
            type: "POST",
            url: "./controller/finalizar_visita.php",
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
                loadTabla();
            }
        });
        return false;
    });

    // ----------------------------
    // submit ver/editar visita
    // ----------------------------
    $("#form_actualizar_visita").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
                loadTabla();
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });

    // ----------------------------
    // submit eliminar visita
    // ----------------------------
    $("#form_eliminar_visita").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
                loadTabla();
            },
            error: function (data) {
            }
        });
        return false;
    });

    /** --------------------------------------------
     * Modales para capturar los datos en las vistas
     ----------------------------------------------- */

    // ----------------------------
    // modal eliminar visita
    // ----------------------------
    eliminarVisita = function (idVisita) {
        $('#m_eliminar_visita_idVisita').val(idVisita);
    };

    // ----------------------------
    // modal ver/editar visita
    // ----------------------------
    verVisita = function (idVisitaVisitanteFuncionario, idVisita, idVisitante, nombreVisitante, apellidoPVisitante, apellidoMVisitante, dniVisitante, idFuncionario, nombreFuncionario, apellidoPFuncionario, apellidoMFuncionario, fecha, fechaTermino, oficinaFuncionario, motivo, lugar, estadoVisita, accion) {
        //JQuery      
        // formateo fechas Y-M-D y Horas
        var fechaFormat = $.format.date(fecha, "yyyy-MM-dd");
        var horaEntradaFormat = $.format.date(fecha, "HH:mm:ss");
        $('#m_ver_visita_idVisitaVisitanteFuncionario').val(idVisitaVisitanteFuncionario);
        $('#m_ver_visita_idVisita').val(idVisita);
        $('#m_ver_visita_estadoVisita').val(estadoVisita);
        $('#m_ver_visita_idVisitante').val(idVisitante);
        $('#m_ver_visita_nombreVisitante').val(nombreVisitante);
        $('#m_ver_visita_apellidoPVisitante').val(apellidoPVisitante);
        $('#m_ver_visita_apellidoMVisitante').val(apellidoMVisitante);
        $('#m_ver_visita_dniVisitante').val(dniVisitante);
        $('#m_ver_visita_idFuncionario').val(idFuncionario);
        $('#m_ver_visita_unidadOrganica').val(oficinaFuncionario);
        $('#m_ver_visita_fecha').val(fechaFormat);
        $('#m_ver_visita_horaEntrada').val(horaEntradaFormat);
        $('#m_ver_visita_lugar').val(lugar);
        $('#m_ver_visita_motivo').val(motivo);
        if (fechaTermino != 0) {// Valido que la fechaTermino y horaTermino no sean null
            var fechaTerminoFormat = $.format.date(fechaTermino, "yyyy-MM-dd");
            var horaTerminoFormat = $.format.date(fechaTermino, "HH:mm:ss");
            $('#m_ver_visita_fechaTermino').val(fechaTerminoFormat);
            $('#m_ver_visita_horaTermino').val(horaTerminoFormat);
        } else { // si es nul vuelvelo cero
            $('#m_ver_visita_fechaTermino').val('0');
            $('#m_ver_visita_horaTermino').val('0');
        }
        // accion que se escoge si ver visita o editar visita
        if (accion == "verVisita") {
            $('#m_ver_visita_nombreVisitante').prop("disabled", true);
            $('#m_ver_visita_apellidoPVisitante').prop("disabled", true);
            $('#m_ver_visita_apellidoMVisitante').prop("disabled", true);
            $('#m_ver_visita_dniVisitante').prop("disabled", true);
            $('#m_ver_visita_idFuncionario').prop("disabled", true);
            $('#m_ver_visita_unidadOrganica').prop("disabled", true);
            $('#m_ver_visita_fechaTermino').prop("disabled", true);
            $('#m_ver_visita_horaTermino').prop("disabled", true);
            $('#m_ver_visita_lugar').prop("disabled", true);
            $('#m_ver_visita_motivo').prop("disabled", true);
            if (estadoVisita == "Finalizado" || estadoVisita == "Pendiente") {//validacion para el boton finalizar visita
                $('#m_ver_visita_estadoVisita').show();
                $('#m_ver_visita_finalizarVisita').hide();
            }
            $('#mbtn_actualizarVisita').hide();
        } else {
            if (estadoVisita != "Finalizado") {//validacion para el boton finalizar visita
                $('#m_ver_visita_nombreVisitante').prop("disabled", false);
                $('#m_ver_visita_apellidoPVisitante').prop("disabled", false);
                $('#m_ver_visita_apellidoMVisitante').prop("disabled", false);
                $('#m_ver_visita_dniVisitante').prop("disabled", false);
                $('#m_ver_visita_idFuncionario').prop("disabled", false);
                $('#m_ver_visita_fechaTermino').prop("disabled", false);
                $('#m_ver_visita_horaTermino').prop("disabled", false);
                $('#m_ver_visita_lugar').prop("disabled", false);
                $('#m_ver_visita_motivo').prop("disabled", false);
                $('#m_ver_visita_estadoVisita').hide();
                $('#m_ver_visita_finalizarVisita').show();
            } else {
                $('#m_ver_visita_nombreVisitante').prop("disabled", true);
                $('#m_ver_visita_apellidoPVisitante').prop("disabled", true);
                $('#m_ver_visita_apellidoMVisitante').prop("disabled", true);
                $('#m_ver_visita_dniVisitante').prop("disabled", true);
                $('#m_ver_visita_idFuncionario').prop("disabled", true);
                $('#m_ver_visita_fechaTermino').prop("disabled", true);
                $('#m_ver_visita_horaTermino').prop("disabled", true);
                $('#m_ver_visita_lugar').prop("disabled", true);
                $('#m_ver_visita_motivo').prop("disabled", true);
                $('#m_ver_visita_fechaTermino').prop("disabled", true);
                $('#m_ver_visita_horaTermino').prop("disabled", true);
                $('#m_ver_visita_estadoVisita').show();
                $('#m_ver_visita_finalizarVisita').hide();
            }
            $('#mbtn_actualizarVisita').show();
        } // se actualiza el select picker plugin de funcionarios
        $('#m_ver_visita_idFuncionario').selectpicker('refresh');
    };

});