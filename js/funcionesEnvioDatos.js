$(document).ready(function() {    
    /************ LIMPIEZA Y EDICION DE BOTONES************/    
    $("#btnNuevoServ").click(function(){
        $("input[id=txtManId]").val("");
        $("input[id=cboEstServ]").val("");
        $("input[id=txtSev]").val("");
        $("input[id=txtDesSev]").val("");
        
        $('#cboEstServ option[value="0"]').attr("selected", true);
        $('#cboEstServ').attr("disabled", false);
        $("input[name=txtManId]").attr("disabled", true);
        $("#Accion").val("nuevo");
    }); 
    
    $("#btnNuevoSector").click(function(){
        $("input[id=txtManId]").val("");
        $("input[id=txtSector]").val("");
        $("input[id=txtSectorDescr]").val("");
        $("input[id=txtNroManz]").val("");
        $("input[id=txtNroIni]").val("");
        $("input[id=txtNroFin]").val("");
        $("input[id=cboEstServ]").val("");
        $("input[id=txtUbicacion]").val("");
        
        $('#cboEstServ option[value="0"]').attr("selected", true);
        $('#cboEstServ').attr("disabled", false);
        $("input[name=txtManId]").attr("disabled", false);
        $("#Accion").val("nuevo");
    }); 
    
    $("#btnNuevoUsuario").click(function(){
        $("input[id=txtManId]").val("");
//        $("input[id=txtcodpers]").val("");
//        $("input[id=txtPersonal]").val("");
        $("input[id=txtUsuario]").val("");
        $("input[id=txtClave]").val("");
        $("input[id=txtPerfil]").val("");
        $("input[id=cboEstServ]").val("");
        
        $('#cboEstServ option[value="0"]').attr("selected", true);
        $('#cboEstServ').attr("disabled", false);
        $("input[name=txtManId]").attr("disabled", true);
        $("#Accion").val("nuevo");
    }); 
    
   
    /**-------------FIN----------------**/
    //////TRANSACCIONES REGISTRO O MODIFICACION..//////////////
    /****************Sucursal**************************/
    $("#btnRegTraServ").click(function(){
        var accion = $("#Accion").val();
        var id_serv = $("#txtManId").val();        
        var estado = $("#cboEstServ").val();
        var servicio = $("#txtSev").val();
        var descripcion = $("#txtDesSev").val(); 
        
        if (accion == "editar") {
           if($.trim(servicio) == ''){
              alert(servicio);
              $("#txtSev").val("");
              $("#txtSev").focus();
              $('.msgCons').text('* INGRESE NOMBRE DEL SERVICIO!').addClass('msj_err').animate({'opacity':'1' }, 1500).animate({'opacity':'0' }, 3000);
           }else{
              $.ajax({
                 type: "POST",
                 url: "../controladores/controlador.php?funcion=modifica_servicio",
                 data: {var0x: id_serv, var1x: estado, var2x: servicio, var3x: descripcion},
                 success: function(datade) {
                    $("#resultadoMan").html(datade);
                 }
             });
           }
        }
        if (accion == "nuevo"){
           if($.trim(servicio) == ''){
              $("#txtSev").val("");
              $("#txtSev").focus();
              $('.msgCons').text('* INGRESE NOMBRE DEL SERVICIO!').addClass('msj_err').animate({'opacity':'1' }, 1500).animate({'opacity':'0' }, 3000);
           }else{
              $.ajax({
                 type: "POST",
                 url: "../controladores/controlador.php?funcion=registra_servicio",
                 data: {var0x: id_serv, var1x: estado, var2x: servicio, var3x: descripcion},
                 success: function(datade) {
                    $("#resultadoMan").html(datade);
                 }
              });
           }
        }
    });    
    
    $("#btnRegTraSector").click(function(){
        var accion = $("#Accion").val();        
        var id = $("#txtManId").val();
        var sector= $("#txtSector").val();
        var descripcion = $("#txtSectorDescr").val(); 
        var nromanz = $("#txtNroManz").val();        
        var nroinimanz = $("#txtNroIni").val();
        var nrofinmanz = $("#txtNroFin").val();
        var estado = $("#cboEstServ").val();
        var ubicion = $("#txtUbicacion").val();
        var eess = $("#txteess").val();
        var codpers = $("#txtpers").val();
         
        if (accion == "editar") {
           if($.trim(sector) == ''){                
              $("#txtSector").val("");
              $("#txtSector").focus();
              $('.msgCons').text('* INGRESE NOMBRE DEL SECTOR!').addClass('msj_err').animate({'opacity':'1' }, 1500).animate({'opacity':'0' }, 3000);
           }else{
              $.ajax({
                 type: "POST",
                 url: "../controladores/controlador.php?funcion=modifica_sector",
                 data: {var0x: id, var1x: sector, var2x: descripcion, var3x: nromanz,var4x: nroinimanz, var5x: nrofinmanz, var6x: estado, var7x: ubicion,var8x: eess,var9x: codpers},
                 success: function(datade) {
                    $("#resultadoMan").html(datade);
                 }
             });
           }
        }
        
        if (accion == "nuevo"){
           if($.trim(sector) == ''){
              $("#txtSector").val("");
              $("#txtSector").focus();
              $('.msgCons').text('* INGRESE NOMBRE DEL SECTOR!').addClass('msj_err').animate({'opacity':'1' }, 1500).animate({'opacity':'0' }, 3000);
           }else{
              $.ajax({
                 type: "POST",
                 url: "../controladores/controlador.php?funcion=registra_sector",
                 data: {var0x: id, var1x: sector, var2x: descripcion, var3x: nromanz,var4x: nroinimanz, var5x: nrofinmanz, var6x: estado, 
                     var7x: ubicion,var8x: eess,var9x: codpers},
                 success: function(datade) {
                    $("#resultadoMan").html(datade);
                 }
              });
           }
        }
    });    
    
    $("#btnRegTraUsuario").click(function(){
        var accion = $("#Accion").val();   
        var id = $("#txtManId").val();
        var txtcodpers= $("#txtcodpers").val();
        var txtPersonal = $("#txtcodpers").val();
        var txtUsuario = $("#txtUsuario").val();
        var txtClave = $("#txtClave").val();
        var txtPerfil = $("#txtPerfil").val();
        var estado = $("#cboEstServ").val();
       
        if (accion == "editar") {   
           if($.trim(txtcodpers) == ''){
              $("#txtcodpers").val("");
              $("#txtcodpers").focus();
              $('.msgCons').text('* INGRESE NOMBRE DEL USUARIO!').addClass('msj_err').animate({'opacity':'1' }, 1500).animate({'opacity':'0' }, 3000);
           }else{
              $.ajax({
                 type: "POST",
                 url: "../controladores/controlador.php?funcion=modifica_usuario",
                 data: {var0x: id, var1x: txtcodpers, var2x: txtPersonal, var3x: txtUsuario,var4x: txtClave, var5x: txtPerfil,var6x: estado},           
                 success: function(datade) {
                    $("#resultadoMan").html(datade);
                 }
             });
           }
        }
        
        if (accion == "nuevo"){            
           if($.trim(txtcodpers) == ''&&$.trim(txtUsuario) == ''&&$.trim(txtClave) == ''){
              $("#txtcodpers").val("");
              $("#txtcodpers").focus();
              $('.msgCons').text('* INGRESE NOMBRE DEL USUARIO!').addClass('msj_err').animate({'opacity':'1' }, 1500).animate({'opacity':'0' }, 3000);
           }else{
              $.ajax({
                 type: "POST",
                 url: "../controladores/controlador.php?funcion=registra_usuario",
                 data: {var0x: id, var1x: txtcodpers, var2x: txtPersonal, var3x: txtUsuario,var4x: txtClave, var5x: txtPerfil,var6x: estado},
                 success: function(datade) {
                    $("#resultadoMan").html(datade);
                 }
              });
           }
        }
    });    
    
    /// TRANSACCIONES ELIMINACION
    $("#btneliminar").click(function(){
        var id = $("#txtManId").val();
        var eess = $("#eess").val();
        var estado = $("#estado").val();
        var tab = $("#txtTab").val(); 
        
        if (tab == "SERVICIO") {
            $.ajax({
                type: "POST",
                url: "../controladores/controlador.php?funcion=elimina_servicio",
                data: {varId: id},
                success: function(datade) {
                    $("#resultadoMan").html(datade);
                }
            });
        }
        if (tab == "SECTOR") {
            $.ajax({
                type: "POST",
                url: "../controladores/controlador.php?funcion=elimina_sector",
                data: {varId: id},
                success: function(datade) {
                    $("#resultadoMan").html(datade);
                }
            });
        }
        if (tab == "PACIENTE") {
            $.ajax({
                type: "POST",
                url: "../controladores/controlador.php?funcion=eliminar_paciente",
                data: {varId: id, varEess: eess, estado: estado},
                success: function(datade) {
                    $("#resultadoMan").html(datade);
                }
            });
        }
        if (tab == "USUARIO") {
            $.ajax({
                type: "POST",
                url: "../controladores/controlador.php?funcion=elimina_usuario",
                data: {varId: id},
                success: function(datade) {
                    $("#resultadoMan").html(datade);
                }
            });
        }
    });
});
function ocultarMensaje(){
    var xmlhttp;
    $("#borraMensaje").addClass('ocultar');
}