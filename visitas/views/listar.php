<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$rol = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;

switch ($rol) {
    case '' :
        print "<script>window.location='./#/ver_visitas';</script>";
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
        include "../controller/mostrar_visitas_generico.php";
        include "../controller/mostrar_funcionarios.php";
        include '../controller/recursos.php';
        ?>

        <script>
            //elementos que se cargan al iniciar la vista

            // iniciando configuracion del DataTable
            $(document).ready(function () {
                var table = $('#miTabla').DataTable({
                    "dom": "<'row'<'form-inline' <'col-sm-offset-5'B>>>"
                            + "<'row' <'form-inline' <'col-sm-1'f>>>"
                            + "<rt>"
                            + "<'row'<'form-inline'"
                            + " <'col-sm-6 col-md-6 col-lg-6'l>"
                            + "<'col-sm-6 col-md-6 col-lg-6'p>>>",
                    "buttons": [
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
                        {
                            extend: 'excel',
                            text: '<button id="reporte_excel" name="excel" style="font-size:24px;color:green;"><i class="fa fa-file-excel-o"></i></button>',
                            titleAttr: 'Reporte Excel'
                        },
                        {
                            extend: 'print',
                            text: '<button id="imprimir_reporte" style="font-size:24px"><i class="fa fa-print"></i></button>',
                            titleAttr: 'Imprimir Reporte'
                        }
                    ], responsive: true,
                    initComplete: function () {
                        //Metodo para la busqueda por selects inputs tipo funcionario y tipo oficina/cargo
                        this.api().columns([5, 6]).every(function () {
                            var column = this;
                            var select = $('<select class="form-control"><option value=""></option></select>')
                                    .appendTo($(column.footer()).empty())
                                    .on('change', function () {
                                        var val = $.fn.dataTable.util.escapeRegex(
                                                $(this).val()
                                                );
                                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    });
                            column.data().unique().sort().each(function (d, j) {
                                select.append('<option value="' + d + '">' + d + '</option>')
                            });
                        });
                    }
                }); // Fin de la configuracion del DataTable

                // creando selectpicker bootstrap para una busqueda por fechas en el dataTable
                $('#datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    clearBtn: true,
                    language: "es",
                    daysOfWeekDisabled: "0"
                });
                // metodo que recoge los valores de los inputs del selectpicket bootstrap
                $.fn.dataTableExt.afnFiltering.push(
                        function (oSettings, aData, iDataIndex) {
                            var iFini = document.getElementById('min').value;
                            var iFfin = document.getElementById('max').value;
                            var iStartDateCol = 6;
                            var iEndDateCol = 7;
                            iFini = iFini.substring(6, 10) + iFini.substring(3, 5) + iFini.substring(0, 2);
                            iFfin = iFfin.substring(6, 10) + iFfin.substring(3, 5) + iFfin.substring(0, 2);
                            var datofini = aData[iStartDateCol].substring(6, 10) + aData[iStartDateCol].substring(3, 5) + aData[iStartDateCol].substring(0, 2);
                            var datoffin = aData[iEndDateCol].substring(6, 10) + aData[iEndDateCol].substring(3, 5) + aData[iEndDateCol].substring(0, 2);
                            if (iFini === "" && iFfin === "") {
                                return true;
                            } else
                            if (iFini <= datofini && iFfin === "") {
                                return true;
                            } else
                            if (iFfin >= datoffin && iFini === "") {
                                return true;
                            } else
                            if (iFini <= datofini && iFfin >= datoffin) {
                                return true;
                            }
                            return false;
                        }
                );
                // Eventos que se disparan tras una accion por el usuario onChangeDate y keyUp
                $("#min").datepicker().on('changeDate', function () {
                    table.draw();
                });
                $("#max").datepicker().on('changeDate', function () {
                    table.draw();
                });
                $('#min').keyup(function () {
                    table.draw();
                });
                $('#max').keyup(function () {
                    table.draw();
                });
            });
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
        } 
        $('#m_ver_visita_idFuncionario').selectpicker('refresh');
    };

         
        </script>

        <title>Visitas a Funcionarios</title>
    </head>
    <body>
        <div class="cuerpo">
            <div  class="table-responsive" style="position: relative;">
                <div class="form-group col-md-4" style="left: 18%;top:5.38%;position: absolute">
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
                        <?php if ($query->num_rows > 0): ?>
                            <?php $cod = 1; ?>
                            <?php while ($r = $query->fetch_array()): ?>
                                <tr>
                                    <td><?php echo $cod ?></td> 
                                    <td><?php echo $r["nombreVisitante"] . ' ' . $r["apellidoPVisitante"] . ' ' . $r["apellidoMVisitante"]; ?></td>
                                    <td><?php echo $r["dniVisitante"]; ?></td>
                                    <td><?php echo $r["motivo"]; ?></td>
                                    <td><?php echo $r["lugar"]; ?></td>
                                    <td><?php echo $r["nombreFuncionario"] . ' ' . $r["apellidoPFuncionario"] . ' ' . $r["apellidoMFuncionario"]; ?></td>
                                    <td><?php
                                        if ($r["oficinaFuncionario"] != "" && $r["cargoFuncionario"] != "") {
                                            echo $r["alias"] . '/' . $r["cargoFuncionario"];
                                        } else {// if oficinaFuncionario es vacio imprime el cargo, sino imprime la oficina(alias)
                                            echo $r["oficinaFuncionario"] == "" ? $r["cargoFuncionario"] : $r["alias"]; // expresion ternaria
                                        }
                                        ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($r["fecha"])); ?></td>
                                    <td><?php echo $r["fechaTermino"] != '0' ? date('d-m-Y', strtotime($r["fechaTermino"])) : '0000-00-00'; ?></td>
                                    <td><?php $r["estadoVisita"] == "Finalizado" ? $class = "label label-primary" : $class = "label label-success"; ?>
                                        <div class="label-block">
                                            <span class="<?php echo $class; ?>"><?php echo $r["estadoVisita"]; ?></span>
                                        </div>        
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs btn_verVisita " title="Ver" type="button" id="verVisita" name="verVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="<?php echo "verVisita('" . $r["idVisitaVisitanteFuncionario"] . "','" . $r["idVisita"] . "','" . $r["idVisitante"] . "','" . $r["nombreVisitante"] . "','" . $r["apellidoPVisitante"] . "','" . $r["apellidoMVisitante"] . "','" . $r["dniVisitante"] . "','" . $r["idFuncionario"] . "','" . $r["nombreFuncionario"] . "','" . $r["apellidoPFuncionario"] . "','" . $r["apellidoMFuncionario"] . "','" . $r["fecha"] . "','" . $r["fechaTermino"] . "','" . $r["oficinaFuncionario"] . "','" . $r["motivo"] . "','" . $r["lugar"] . "','" . $r["estadoVisita"] . "','verVisita');"; ?>"><img alt="Ver" style="width:19px;" src="../icon/eye.png"/></a>

                                    </td>
                                </tr>
                                <?php $cod+=1 ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>  

            <!--- MODAL VISITA-->
            <div class="modal fade" id="modalVerEditar" tabindex="-1" role="dialog" aria-labelledby="modalVerEditar">
                <div class="modal-dialog modal-lg" id="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h4 id="m_title"><i class="fa fa-stethoscope fa-lg"></i> PESTAÑA DETALLE DE VISITAS</h4>
                        </div>
                        <div class="modal-footer"></div>
                        <div class="modal-body">
                            <form class="form-horizontal" >
                                <div class="panel-body">
                                    <div id="divtxtId" class="form-group">
                                        <label class="col-lg-2 control-label">CODIGO:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="m_ver_visita_idVisita" name="m_ver_visita_idVisita" readonly="">
                                            <input type="text" hidden="" class="form-control" id="m_ver_visita_idVisitaVisitanteFuncionario" name="m_ver_visita_idVisitaVisitanteFuncionario">
                                        </div>
                                        <label class="col-lg-2 control-label" id="hola">ESTADO VISITA</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="m_ver_visita_estadoVisita" name="m_ver_visita_estadoVisita" readonly="">
                                        </div>
                                    </div>    
                                    <div id="divtxtId1" class="form-group">                                        
                                        <label class="col-lg-2 control-label">VISITANTE:</label>
                                        <div class="col-lg-4">
                                            <input type="text" hidden="" id="m_ver_visita_idVisitante" name="m_ver_visita_idVisitante">
                                            <input type="text" class="form-control" id="m_ver_visita_nombreVisitante" name="m_ver_visita_nombreVisitante" placeholder="NOMBRE DEL VISITANTE" disabled="" onkeypress="return soloLetras(event)">
                                        </div>                    
                                        <label class="col-lg-2 control-label">AP. PATERNO:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="m_ver_visita_apellidoPVisitante" name="m_ver_visita_apellidoPVisitante" placeholder="DNI VISITANTE" disabled="">
                                        </div>
                                    </div>
                                    <div id="divtxtId2" class="form-group">                                        
                                        <label class="col-lg-2 control-label">AP. MATERNO:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="m_ver_visita_apellidoMVisitante" name="m_ver_visita_apellidoMVisitante" placeholder="NOMBRE DEL VISITANTE" disabled="" onkeypress="return soloLetras(event)">
                                        </div>                    
                                        <label class="col-lg-2 control-label">DNI VISITANTE:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="m_ver_visita_dniVisitante" name="m_ver_visita_dniVisitante" placeholder="DNI VISITANTE" disabled="">
                                        </div>
                                    </div>
                                    <div id="divtxtId3" class="form-group">                                        
                                        <label class="col-lg-2 control-label">FUNCIONARIO:</label><a class="btn btn-default" style="left: 157px;position: fixed;background: white;border-color: rgba(255, 255, 255, 0);padding-left: 4px;" data-trigger="hover" data-popup="popover" data-toggle="popover"  data-placement="top" title="" data-content="El cambio o modificacion del Funcionario ocasionara que se derive esta visita hacia otra Unidad Organica perteneciente al nuevo Funcionario elegido" data-original-title="DERIVAR VISITA" aria-describedby="popover132247" ><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                        <div class="col-lg-4">
                                            <?php if ($query_funcionarios->num_rows > 0): ?>
                                                <select class="selectpicker form-control" name="m_ver_visita_idFuncionario" id="m_ver_visita_idFuncionario" data-live-search="true" title="NOMBRE DEL FUNCIONARIO" required autofocus disabled>
                                                    <?php while ($rr = $query_funcionarios->fetch_array()): ?>
                                                        <option value="<?php echo $rr["idFuncionario"]; ?>"  data-subtext="<?php echo $rr["dniFuncionario"] . ' - ' . $rr["cargo"] . ' - ' . $rr["unidadOrganica"] . ' - ' . $rr["alias"]; ?>" > <?php echo $rr["nombre"] . ' ' . $rr["apellidoPaterno"] . ' ' . $rr["apellidoMaterno"]; ?> </option>
                                                    <?php endwhile; ?>
                                                </select> 
                                            <?php endif; ?>
                                        </div> 
                                        <label class="col-lg-2 control-label">U. ORGANICA:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="m_ver_visita_unidadOrganica" name="m_ver_visita_unidadOrganica"  placeholder="OFICINA DEL FUNCIONARIO" readonly="">
                                        </div>
                                    </div>
                                    <div id="divtxtId6" class="form-group">                                        
                                        <label class="col-lg-2 control-label">FECHA INICIO:</label>
                                        <div class="col-lg-4">
                                            <input type="date" class="form-control" id="m_ver_visita_fecha" name="m_ver_visita_fecha" disabled="">
                                        </div>                  
                                        <label class="col-lg-2 control-label">FECHA FIN:</label>
                                        <div class="col-lg-4">
                                            <input type="date" class="form-control" id="m_ver_visita_fechaTermino" name="m_ver_visita_fechaTermino" disabled="">
                                        </div>
                                    </div>
                                    <div id="divtxtId7" class="form-group">           
                                        <label class="col-lg-2 control-label">H. ENTRADA:</label>
                                        <div class="col-lg-4">
                                            <input type="time" step="1" class="form-control" id="m_ver_visita_horaEntrada" name="m_ver_visita_horaEntrada" placeholder="HORA DE ENTRADA" disabled="">
                                        </div>
                                        <label class="col-lg-2 control-label">H. SALIDA:</label>
                                        <div class="col-lg-4">
                                            <input type="time" step="1" class="form-control" id="m_ver_visita_horaTermino" name="m_ver_visita_horaTermino" placeholder="HORA DE SALIDA" disabled="">
                                        </div>
                                    </div> 
                                    <div id="divtxtId8" class="form-group">                                                          
                                        <label class="col-lg-2 control-label">LUGAR VISITA:</label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" id="m_ver_visita_lugar" name="m_ver_visita_lugar" placeholder="LUGAR DE LA VISITA" disabled="">
                                        </div>
                                        <label class="col-lg-2 control-label">MOTIVO VISITA:</label>
                                        <div class="col-lg-4">
                                            <textarea class="form-control" id="m_ver_visita_motivo" name="m_ver_visita_motivo" style="height:33px ;max-height: 85px;" placeholder="DESCRIBA DE MANERA BREVE EL MOTIVO DE LA VISITA" required autofocus disabled=""></textarea>
                                        </div>  
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" id="mbtn_cancelarVisita" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> <!--- FIN MODAL -->
        </div>
    </body>
</html>
</div>  

