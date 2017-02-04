<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
$rol = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;
$permisos = isset($_SESSION['arr_permisos']) ? $_SESSION['arr_permisos'] : array('');
$mensaje = isset($_POST['message']) ? $_POST['message'] : null;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null;

switch ($rol) {
    case '' :
        //llamado a la clase que hace la conexcion a la base de datos
        require'../class/config.php';
//LLamado a la clase Usuarios para realizar el inicio de sesion
        require'../class/users.php';
//llamado a la clase que ejecutará los queries de Consulta, Adición y Eliminación
        require'../class/dbactions.php';
//llamado a la clase encargada de las sesiones
//creación o instanciamiento de un objeto de la Clase Connection
        $objConn = new Connection();
//objeto de la clase users
        $objUser = new Users();

//llamamos la funcion que nos conecta a la base de datos
        $objConn->get_connected();
//function que realiza la verificación de usuarios e inicio de sesion
        $objUser->login_in();


        print "<script>window.location='./#/administrador';</script>";
        break;
    default :
        print "<script>window.location='./#/administrador';</script>";
}
?>
<html>

    <head>
        <link href="../css/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="../css/plugins/bootstrap-select-1.12.1/js/bootstrap-select.js" type="text/javascript"></script>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
        <link href="../css/plugins/bootstrap-select-1.12.1/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/gerenciaJS.js"></script>
        <script src="../js/plugins/dateFormat/format.js"></script>

        <?php
        include "../controller/conexion.php";
        include "../controller/mostrar_visitas.php";
        include '../controller/recursos.php';
        ?>
        <script>
                    //elementos que se cargan al iniciar la vista
                    var table;
                    $(document).ready(function() {
            initDataTable ();
                    buscarFechas();
                    loadTabla();
            });
                    function initDataTable(){
                    // iniciando configuracion del DataTable
                    table = $('#miTabla').DataTable({
                    "dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
                            + "<'row' <'form-inline' <'col-sm-1'f>>>"
                            + "<rt>"
                            + "<'row'<'form-inline'"
                            + " <'col-sm-6 col-md-6 col-lg-6'l>"
                            + "<'col-sm-6 col-md-6 col-lg-6'p>>>",
                            "buttons": [
<?php if (in_array('nuevo_funcionario', $permisos)) : ?>
                                {
                                text: '<a class="btn btn-primary btn-xs" style="height: 40px;width:40px ;margin-bottom: 9.4px;font-size:24px;" id="nuevo_funcionario" name="nuevo_funcionario"><img alt="Ver" style="height:30px;padding-bottom: 7px;" src="../icon/agregarFuncionario.png"/></a>',
                                        titleAttr: 'Nuevo Funcionario',
                                        action: function (e, dt, node, config) {
                                        window.location = "./#/nuevo_funcionario"; // disable button
                                        }
                                },
<?php endif ?>
<?php if (in_array('crear_roles', $permisos)) : ?>
                                {
                                text: '<a class="btn btn-success btn-xs" style="height: 40px;width:40px;margin-bottom: 9.4px;font-size:24px;" id="crear_roles" name="crear_roles"><img alt="Ver" style="height:35px;padding-bottom: 7px;" src="../icon/roll.png"/></a>',
                                        titleAttr: 'Roles Y Permisos',
                                        action: function (e, dt, node, config) {
                                        window.location = "./#/crear_roles"; // disable button
                                        }
                                },
<?php endif ?>
<?php if (in_array('copiar_tabla', $permisos)) : ?>
                                {
                                extend: 'copy',
                                        text: '<button id="copiar_tabla"  style="font-size:24px;color:orange;"><i class="fa fa-files-o"></i></button>',
                                        titleAttr: 'Copiar Tabla'
                                },
<?php endif ?>
<?php if (in_array('reporte_pdf', $permisos)) : ?>
                                {
                                extend: 'pdf',
                                        text: '<button id="reporte_pdf" style="font-size:24px;color:red;"><i class="fa fa-file-pdf-o"></i></button>',
                                        orientation: 'landscape',
                                        pageSize: 'LEGAL',
                                        titleAttr: 'Reporte Pdf',
                                        customize: function (doc) {
                                        doc.content.splice(1, 0, {
                                        margin: [0, 0, 0, 12],
                                                alignment: 'center',
                                                image: <?php echo "'data:image/jpeg;base64," . $imgPDF . "'" ?>});
                                        }
                                },
<?php endif ?>
<?php if (in_array('reporte_excel', $permisos)) : ?>
                                {
                                extend: 'excel',
                                        text: '<button id="reporte_excel" name="excel" style="font-size:24px;color:green;"><i class="fa fa-file-excel-o"></i></button>',
                                        titleAttr: 'Reporte Excel'
                                },
<?php endif ?>
<?php if (in_array('imprimir_reporte', $permisos)) : ?>
                                {
                                extend: 'print',
                                        text: '<button id="imprimir_reporte" style="font-size:24px"><i class="fa fa-print"></i></button>',
                                        titleAttr: 'Imprimir Reporte'
                                }
<?php endif ?>
                            ], responsive: true,
                            "fnDrawCallback": function () {
                            //Metodo para la busqueda por selects inputs tipo funcionario y tipo oficina/cargo
                            this.api().columns([5, 6]).every(function () {
                            var column = this;
                                    var select = $('<select class="form-control"><option value=" "> </option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                            $(this).val()
                                            );
                                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });
                                    column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                            });
                            });
                            }
                    }); // Fin de la configuracion del DataTable  
                    }

            function buscarFechas(){
            // creando selectpicker bootstrap para una busqueda por fechas en el dataTable
            $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
                    clearBtn: true,
                    language: "es",
                    daysOfWeekDisabled: "0"
            });
                    // metodo que recoge los valores de los inputs del selectpicket bootstrap
                    $.fn.dataTableExt.afnFiltering.push(
                            function(oSettings, aData, iDataIndex) {
                            var iFini = document.getElementById('min').value;
                                    var iFfin = document.getElementById('max').value;
                                    var iStartDateCol = 6;
                                    var iEndDateCol = 7;
                                    iFini = iFini.substring(6, 10) + iFini.substring(3, 5) + iFini.substring(0, 2);
                                    iFfin = iFfin.substring(6, 10) + iFfin.substring(3, 5) + iFfin.substring(0, 2);
                                    var datofini = aData[iStartDateCol].substring(6, 10) + aData[iStartDateCol].substring(3, 5) + aData[iStartDateCol].substring(0, 2);
                                    var datoffin = aData[iEndDateCol].substring(6, 10) + aData[iEndDateCol].substring(3, 5) + aData[iEndDateCol].substring(0, 2);
                                    if (iFini === "" && iFfin === ""){
                            return true;
                            } else
                                    if (iFini <= datofini && iFfin === ""){
                            return true;
                            } else
                                    if (iFfin >= datoffin && iFini === ""){
                            return true;
                            } else
                                    if (iFini <= datofini && iFfin >= datoffin){
                            return true;
                            }
                            return false;
                            }
                    );
                    // Eventos que se disparan tras una accion por el usuario onChangeDate y keyUp
                    $("#min").datepicker().on('changeDate', function() {table.draw(); });
                    $("#max").datepicker().on('changeDate', function() {table.draw(); });
                    $('#min').keyup(function() { table.draw(); });
                    $('#max').keyup(function() { table.draw(); });
            }


            function loadTabla(){
            var table = $('#miTabla').DataTable().clear().draw();
                    $.ajax({
                    type: "POST",
                            url: "./controller/select.php",
                            contentType: "application/json; charset=utf-8",
                            dataType: "json",
                            success: function (response) {
                            var cod = 1;
                                    var result = response.map(function (item) {
                                    var result = []; var boton = ''; var labelEstado = ''; var clase = ''; var fechaTermino = "";
                                            result.push(cod);
                                            result.push(item.nombreVisitante + ' ' + item.apellidoPVisitante + ' ' + item.apellidoMVisitante);
                                            result.push(item.dniVisitante);
                                            result.push(item.motivo);
                                            result.push(item.lugar);
                                            result.push(item.nombreFuncionario + ' ' + item.apellidoPFuncionario + ' ' + item.apellidoMFuncionario);
                                            result.push(item.alias + '/' + item.cargoFuncionario);
                                            result.push($.format.date(item.fecha, "dd-MM-yyyy"));
                                            if (item.fechaTermino != '0'){
                                    fechaTermino = $.format.date(item.fechaTermino, "dd-MM-yyyy");
                                    } else{
                                    fechaTermino = '0000-00-00';
                                    }
                                    result.push(fechaTermino);
                                            if (item.estadoVisita == "Finalizado"){
                                    clase = "label label-primary";
                                    } else{
                                    clase = "label label-success";
                                    }
                                    labelEstado = '<div class = "label-block" > <span class="' + clase + '" >' + item.estadoVisita + '</span></div>';
                                            result.push(labelEstado);
<?php if (in_array('verVisita', $permisos)) : ?>
                                        boton += '                              <a class="btn btn-default btn-xs btn_verVisita" title="Ver" type="button" id="verVisita" name="verVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="verVisita(\'' + item.idVisitaVisitanteFuncionario + '\',\'' + item.idVisita + '\',\'' + item.idVisitante + '\',\'' + item.nombreVisitante + '\',\'' + item.apellidoPVisitante + '\',\'' + item.apellidoMVisitante + '\',\'' + item.dniVisitante + '\',\'' + item.idFuncionario + '\',\'' + item.nombreFuncionario + '\',\'' + item.apellidoPFuncionario + '\',\'' + item.apellidoMFuncionario + '\',\'' + item.fecha + '\',\'' + item.fechaTermino + '\',\'' + item.oficinaFuncionario + '\',\'' + item.motivo + '\',\'' + item.lugar + '\',\'' + item.estadoVisita + '\',\'verVisita\');"><img alt="Ver" style="width:19px;" src="../icon/eye.png"/></a>                                                      ';
<?php endif; ?>
<?php if (in_array('editarVisita', $permisos)) : ?>
                                        boton += '                              <a class="btn btn-warning btn-xs btn_editarVisita" title="Editar" id="editarVisita" name="editarVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="verVisita(\'' + item.idVisitaVisitanteFuncionario + '\',\'' + item.idVisita + '\',\'' + item.idVisitante + '\',\'' + item.nombreVisitante + '\',\'' + item.apellidoPVisitante + '\',\'' + item.apellidoMVisitante + '\',\'' + item.dniVisitante + '\',\'' + item.idFuncionario + '\',\'' + item.nombreFuncionario + '\',\'' + item.apellidoPFuncionario + '\',\'' + item.apellidoMFuncionario + '\',\'' + item.fecha + '\',\'' + item.fechaTermino + '\',\'' + item.oficinaFuncionario + '\',\'' + item.motivo + '\',\'' + item.lugar + '\',\'' + item.estadoVisita + '\',\'editar\');"><img alt="Editar" style="width:19px;" src="../icon/edit.png"></a>                                         ';
<?php endif; ?>
<?php if (in_array('eliminarVisita', $permisos)) : ?>
                                        boton += '                              <a class="btn btn-danger btn-xs btn_eliminarVisita" title="Eliminar" id="eliminarVisita" name="eliminarVisita" data-toggle="modal" data-target="#modalEliminar" onclick="eliminarVisita(\'' + item.idVisita + '\');"><img alt="Eliminar" style="width:19px;" src="../icon/trash.png"></a>                           ';
<?php endif; ?>
                                    result.push(boton);
                                            cod += 1;
                                            return result;
                                    });
                                    var table = $('#miTabla').DataTable();
                                    table.rows.add(result).draw();
                            }
                    });
            };
                    //popup de informacion en el modal de Visitas
                    $('[data-popup="popover"]').popover();
        </script>
        
        <title>Visitas a Funcionarios</title>
    </head>
    <body>        
        <div  class="cuerpo">
            <div id="cuerpo">
                <div  class="table-responsive" style="position: relative;">
                    <div class="form-group col-md-4" style="left: 18%;top:50px;position: absolute">
                        <label style="font-weight: 100;display: inline;">Selecciona fechas:</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <div class="input-group-addon" style="padding: 6px 12px; border-width: 1px;">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-rightl" id="min" name="min" />
                            <span class="input-group-addon" style="padding: 6px 12px;border-width: 1px;">hasta</span>
                            <input type="text" class="form-control pull-rightl" id="max" name="max" />
                        </div>
                    </div>
                    <table id="miTabla" class="table table-hover" cellspacing="0">
                        <thead>
                            <tr class="active">
                                <th id="thId">#</th>
                                <th id="thVisitante">VISITANTE</th>
                                <th id="thDni">DNI</th>
                                <th id="thMotivo">MOTIVO VISITA</th>
                                <th id="thLugar">LUGAR VISITA</th>
                                <th id="thFuncionario" class="select-filter">FUNCIONARIO</th>
                                <th id="thOficina" class="select-filter">OFI./CARGO</th>
                                <th id="thFInicio">F. INICIO</th>
                                <th id="thFFin">F. FIN</th>
                                <th id="thEstado">ESTADO</th>
                                <th id="thAcciones">ACCIONES</th>
                            </tr>
                        </thead> 
                        <tfoot>
                            <tr>
                                <th></th> <th></th>
                                <th></th> <th></th> <th></th>
                                <th>FUNCIONARIO</th>
                                <th>OFI./CARGO</th>
                            </tr>
                        </tfoot>
                        <tbody>   

                        </tbody>
                    </table>
                </div>  
                <!--- MODAL VISITA--> <?php require_once 'm_ver_visita.php'; ?><!--- FIN MODAL -->
                <!-- MODAL ELIMINAR --> <?php require_once 'm_eliminar_visita.php'; ?><!-- FIN MODAL -->
                <div id="nuevaVisita">
                    <?php if (in_array('nueva_visita', $permisos)) : ?>
                        <a class="btn btn-primary btn_nueva_visita" id="nueva_visita" href="./#/nueva_visita"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Visita</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
    <script src="../js/controles_listar_administrador.js" type="text/javascript"></script>
</html>
