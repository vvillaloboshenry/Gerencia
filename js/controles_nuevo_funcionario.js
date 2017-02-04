/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    /** ----------------------------------
     * Controladores para la vista: nuevo_funcionario
     ------------------------------------- */

    // ----------------------------
    // submit nuevo funcionario
    // ----------------------------
    $("#form_crear_funcionario").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                notificacion(data.titulo, data.mensaje, data.tipo);
                limpiar_();
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });

    // ----------------------------
    // submit nueva unidad organica
    // ----------------------------
    $("#form_crear_unidad_organica").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                notificacion(data.titulo, data.mensaje, data.tipo);
               limpiar_()
               ;
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });

    // ----------------------------
    // submit editar funcionario
    // ----------------------------
    $("#form_actualizar_funcionario").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
                //       loadTabla();
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });

    // ----------------------------
    // submit eliminar funcionario
    // ----------------------------
    $("#form_eliminar_funcionario").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
                //     loadTabla();
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });

// ----------------------------
    // submit editar unidad organica
    // ----------------------------
    $("#form_actualizar_unidad_organica").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
                //         loadTabla();
            },
            error: function (data) {
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });

    // ----------------------------
    // submit eliminar unidad organica
    // ----------------------------
    $("#form_eliminar_unidad_organica").bind("submit", function () {
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (data) {
                $(".close").click()
                notificacion(data.titulo, data.mensaje, data.tipo);
                //       loadTabla();
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
    // nuevo_funcionario
    // ----------------------------
    eliminarFuncionario = function (idFuncionario) {
        $('#m_eliminar_funcionario_idFuncionario').val(idFuncionario);
    };

    editarFuncionario = function (idFuncionario, nombreFuncionario, apellidoPaternoFuncionario, apellidoMaternoFuncionario, emailFuncionario, dniFuncionario, cargoFuncionario, idUnidadOrganica, unidadOrganica) {
        //JQuery
        $('#m_actualizar_funcionario_idFuncionario').val(idFuncionario);
        $('#m_actualizar_funcionario_nombreFuncionario').val(nombreFuncionario);
        $('#m_actualizar_funcionario_apellidoPFuncionario').val(apellidoPaternoFuncionario);
        $('#m_actualizar_funcionario_apellidoMFuncionario').val(apellidoMaternoFuncionario);
        $('#m_actualizar_funcionario_emailFuncionario').val(emailFuncionario);
        $('#m_actualizar_funcionario_dniFuncionario').val(dniFuncionario);
        $('#m_actualizar_funcionario_cargoFuncionario').val(cargoFuncionario);
        $('select[name=m_actualizar_funcionario_idUnidadOrganica]').val(idUnidadOrganica);
        $('#m_actualizar_funcionario_idUnidadOrganica').selectpicker('refresh');
    };

    eliminarUnidadOrganica = function (idUnidadOrganica) {
        $('#m_eliminar_unidad_organica_idUnidad').val(idUnidadOrganica);
    };

    editarUnidadOrganica = function (idUnidadOrganica, codigoUnidad, unidadOrganica, alias, jerarquiaOrganica, idJefeUnidad) {
        //JQuery
        $('#m_actualizar_unidad_organica_idUnidad').val(idUnidadOrganica);
        $('#m_actualizar_unidad_organica_codigoUnidad').val(codigoUnidad);
        $('#m_actualizar_unidad_organica_unidadOrganica').val(unidadOrganica);
        $('#m_actualizar_unidad_organica_aliasUnidad').val(alias);
        $('#m_actualizar_unidad_organica_jerarquiaOrganica').val(jerarquiaOrganica);
        $('select[name=m_actualizar_unidad_organica_idFuncionario]').val(idJefeUnidad);
        $('#m_actualizar_unidad_organica_idFuncionario').selectpicker('refresh');
    };

});