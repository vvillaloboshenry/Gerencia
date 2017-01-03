function fn_id_eliminar(id,tabla) {     
	document.getElementById("txtManId").value = id;
	document.getElementById("txtTab").value = tabla;                
}
function fn_id_eliminar_paciente(id,eess,estado,tabla) {     
	document.getElementById("txtManId").value = id;
	document.getElementById("txtTab").value = tabla;                
	document.getElementById("eess").value = eess;
	document.getElementById("estado").value = estado;        
}
function fn_muestra_servicio(accion,id,nom,desc,est) {
    if (accion == 'ver'){
        document.getElementById("txtManId").disabled = true;
        document.getElementById("cboEstServ").disabled = true;
        document.getElementById("txtSev").disabled = true;
        document.getElementById("txtDesSev").disabled = true;

        document.getElementById("txtManId").value = id;
        document.getElementById("cboEstServ").value =est ;
        document.getElementById("txtSev").value = nom ;
        document.getElementById("txtDesSev").value =desc ;
    }
    if (accion == 'editar'){
        document.getElementById('Accion').value = accion;
        document.getElementById("txtManId").disabled = true;
        document.getElementById("cboEstServ").disabled = false;
        document.getElementById("txtSev").disabled = false;
        document.getElementById("txtDesSev").disabled = false;

        document.getElementById("txtManId").value = id;
        document.getElementById("cboEstServ").value =est ;
        document.getElementById("txtSev").value = nom ;
        document.getElementById("txtDesSev").value =desc ;
    }
}

function fn_muestra_sector(accion,id,sect,desc,nro_mnz,nro_ini,nro_fin,ubicacion,est) {
    if (accion == 'ver'){
        document.getElementById('Accion').value = accion;
        document.getElementById("txtManId").disabled = true;
        document.getElementById("txtSector").disabled = true;
        document.getElementById("txtSectorDescr").disabled = true;
        document.getElementById("txtNroManz").disabled = true;
        document.getElementById("txtNroIni").disabled = true;
        document.getElementById("txtNroFin").disabled = true;
        document.getElementById("cboEstServ").disabled = true;
        document.getElementById("txtUbicacion").disabled = true;

        document.getElementById("txtManId").value = id;
        document.getElementById("txtSector").value =sect ;
        document.getElementById("txtSectorDescr").value = desc ;
        document.getElementById("txtNroManz").value =nro_mnz ;
        document.getElementById("txtNroIni").value = nro_ini;
        document.getElementById("txtNroFin").value =nro_fin ;
        document.getElementById("cboEstServ").value = ubicacion ;
        document.getElementById("txtUbicacion").value =est ;
    }
    if (accion == 'editar'){
        document.getElementById('Accion').value = accion;
        document.getElementById("txtManId").disabled = true;
        document.getElementById("txtSector").disabled = false;
        document.getElementById("txtSectorDescr").disabled = false;
        document.getElementById("txtNroManz").disabled = false;
        document.getElementById("txtNroIni").disabled = false;
        document.getElementById("txtNroFin").disabled = false;
        document.getElementById("cboEstServ").disabled = false;
        document.getElementById("txtUbicacion").disabled = false;

        document.getElementById("txtManId").value = id;
        document.getElementById("txtSector").value =sect ;
        document.getElementById("txtSectorDescr").value = desc ;
        document.getElementById("txtNroManz").value =nro_mnz ;
        document.getElementById("txtNroIni").value = nro_ini;
        document.getElementById("txtNroFin").value =nro_fin ;
        document.getElementById("cboEstServ").value = ubicacion ;
        document.getElementById("txtUbicacion").value =est ;
    }
}

function fn_muestra_usuario(accion,id,cod_pers,nomb_pers, nom_usua, cla_usua, cod_perf, vig_usua){
    if (accion == 'nuevo'){
        document.getElementById('Accion').value = accion;
        document.getElementById("txtManId").disabled = true;
        document.getElementById("txtcodpers").disabled = true;
        document.getElementById("txtPersonal").disabled = true;
        document.getElementById("txtUsuario").disabled = false;
        document.getElementById("txtClave").disabled = false;
        document.getElementById("txtPerfil").disabled = false;
        document.getElementById("cboEstServ").disabled = false;

        document.getElementById("txtManId").value = id;
        document.getElementById("txtcodpers").value =cod_pers;
        document.getElementById("txtPersonal").value = nomb_pers ;
        document.getElementById("txtUsuario").value =nom_usua ;
        document.getElementById("txtClave").value = cla_usua;
        document.getElementById("txtPerfil").value =cod_perf ;
        document.getElementById("cboEstServ").value = vig_usua ;
    }
    if (accion == 'ver'){
        document.getElementById('Accion').value = accion;
        document.getElementById("txtManId").disabled = true;
        document.getElementById("txtcodpers").disabled = true;
        document.getElementById("txtPersonal").disabled = true;
        document.getElementById("txtUsuario").disabled = true;
        document.getElementById("txtClave").disabled = true;
        document.getElementById("txtPerfil").disabled = true;
        document.getElementById("cboEstServ").disabled = true;

        document.getElementById("txtManId").value = id;
        document.getElementById("txtcodpers").value =cod_pers;
        document.getElementById("txtPersonal").value = nomb_pers ;
        document.getElementById("txtUsuario").value =nom_usua ;
        document.getElementById("txtClave").value = cla_usua;
        document.getElementById("txtPerfil").value =cod_perf ;
        document.getElementById("cboEstServ").value = vig_usua ;
    }
    if (accion == 'editar'){
        document.getElementById('Accion').value = accion;
        document.getElementById("txtManId").disabled = true;
        document.getElementById("txtcodpers").disabled = false;
        document.getElementById("txtPersonal").disabled = false;
        document.getElementById("txtUsuario").disabled = false;
        document.getElementById("txtClave").disabled = false;
        document.getElementById("txtPerfil").disabled = false;
        document.getElementById("cboEstServ").disabled = false;
        
        document.getElementById("txtManId").value = id;
        document.getElementById("txtcodpers").value =cod_pers;
        document.getElementById("txtPersonal").value = nomb_pers ;
        document.getElementById("txtUsuario").value =nom_usua ;
        document.getElementById("txtClave").value = cla_usua;
        document.getElementById("txtPerfil").value =cod_perf ;
        document.getElementById("cboEstServ").value = vig_usua;
    }
}