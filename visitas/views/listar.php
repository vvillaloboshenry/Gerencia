<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

switch ($profile) {
    case '' :
        print "<script>window.location='./#/ver_visitas';</script>";
        break;
    default :
        print "<script>window.location='./#/administrador';</script>";
}
?>
<html>
    <head>
        <?php
        include "../controller/conexion.php";
        include "../controller/mostrar_visitas.php";
        include '../controller/recursos.php';
        ?>


        <script>
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
                    ]
                });
            });
            eliminarVisita = function (idVisita) {
                $('#m_idVisitaEliminada').val(idVisita);
            };
            verVisita = function (idVisita, nombreVisitante, dniVisitante, nombreFuncionario, oficinaFuncionario, cargoFuncionario, motivo, lugar, estadoVisita, accion) {
                //JQuery
                $('#m_idVisita').val(idVisita);
                $('#m_nombreVisitante').val(nombreVisitante);
                $('#m_dniVisitante').val(dniVisitante);
                $('#m_nombreFuncionario').val(nombreFuncionario);
                $('#m_oficinaFuncionario').val(oficinaFuncionario);
                $('#m_cargoFuncionario').val(cargoFuncionario);
                $('#m_motivo').val(motivo);
                $('#m_lugar').val(lugar);
                $('#m_estadoVisita').val(estadoVisita);
                // JavaScript
                // document.getElementById("m_idVisita").value = idVisita;
                // document.getElementById("m_nombreVisitante").value = nombreVisitante;
                // document.getElementById("m_motivo").value = motivo;
                if (accion == "verVisita") {
                    $('#m_nombreVisitante').prop("disabled", true);
                    $('#m_dniVisitante').prop("disabled", true);
                    $('#m_nombreFuncionario').prop("disabled", true);
                    $('#m_oficinaFuncionario').prop("disabled", true);
                    $('#m_cargoFuncionario').prop("disabled", true);
                    $('#m_motivo').prop("disabled", true);
                    $('#m_lugar').prop("disabled", true);
                    $('#m_estadoVisita').prop("disabled", true);
                    $('#m_fecha').prop("disabled", true);
                    $('#m_fechaTermino').prop("disabled", true);
                    $('#m_horaEntrada').prop("disabled", true);
                    $('#m_horaTermino').prop("disabled", true);
                } else {
                    $('#m_nombreVisitante').prop("disabled", false);
                    $('#m_dniVisitante').prop("disabled", false);
                    $('#m_nombreFuncionario').prop("disabled", false);
                    $('#m_oficinaFuncionario').prop("disabled", false);
                    $('#m_cargoFuncionario').prop("disabled", false);
                    $('#m_motivo').prop("disabled", false);
                    $('#m_lugar').prop("disabled", false);
                    //$('#m_estadoVisita').prop("disabled", false);
                    //$('#m_fecha').prop("disabled", false);
                    //$('#m_fechaTermino').prop("disabled", false);
                    //$('#m_horaEntrada').prop("disabled", false);
                    //$('#m_horaTermino').prop("disabled", false);
                }
            };
            $('#datepicker').datepicker({
                format: "yyyy/mm/dd",
                clearBtn: true,
                language: "es",
                daysOfWeekDisabled: "0"
            });
        </script>
        <title>Visitas a Funcionarios</title>
    </head>
    <body>

        <?php if ($query->num_rows > 0): ?>
            <div class="cuerpo">
                <div  class="table-responsive" style="position: relative;">
                    <div class="form-group col-md-4" style="left: 18%;top:5.38%;position: absolute">
                        <label style="font-weight: 100;display: inline;">Selecciona fechas:</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <div class="input-group-addon" style="padding: 6px 12px; border-width: 1px;">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-rightl" name="start" />
                            <span class="input-group-addon" style="padding: 6px 12px;border-width: 1px;">hasta</span>
                            <input type="text" class="form-control pull-rightl" name="end" />
                        </div>
                    </div>
                    <table id="miTabla" class="table table-hover" cellspacing="0">
                        <thead>
                            <tr class="active">
                                <th>#</th>
                                <th id="thVisitante">VISITANTE</th>
                                <th>DNI</th>
                                <th id="thMotivo">MOTIVO VISITA</th>
                                <th>LUGAR VISITA</th>
                                <th>FUNCIONARIO</th>
                                <th>OFI./CARGO</th>
                                <th>FECHA INICIO</th>
                                <th id="thFechaTermino">FECHA FIN</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cod = 1 ?>
                            <?php while ($r = $query->fetch_array()): ?>
                                <tr>
                                    <td><?php echo $cod ?></td> 
                                    <td><?php echo $r["nombreVisitante"] . ' ' . $r["apellidoVisitante"]; ?></td>
                                    <td><?php echo $r["dniVisitante"]; ?></td>
                                    <td><?php echo $r["motivo"]; ?></td>
                                    <td><?php echo $r["lugar"]; ?></td>
                                    <td><?php echo $r["nombreFuncionario"] . ' ' . $r["apellidoFuncionario"]; ?></td>
                                    <td><?php
                                        if ($r["oficinaFuncionario"] != "" && $r["cargoFuncionario"] != "") {
                                            echo $r["oficinaFuncionario"] . '/' . $r["cargoFuncionario"];
                                        } else {
                                            if ($r["oficinaFuncionario"] == "") {
                                                echo $r["cargoFuncionario"];
                                            } else {
                                                echo $r["oficinaFuncionario"];
                                            }
                                        }
                                        ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($r["fecha"])); ?></td>
                                    <td><?php
                                        echo $r["fechaTermino"] ? date('d-m-Y', strtotime($r["fechaTermino"])) : '0000-00-00';
                                        ?></td>
                                    <td><?php echo $r["estadoVisita"]; ?></td>
                                    <td><a class="btn btn-default btn-xs" title="Ver" type="button" id="verVisita" name="verVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="<?php echo "verVisita('" . $r["idVisita"] . "','" . $r["nombreVisitante"] . "','" . $r["dniVisitante"] . "','" . $r["nombreFuncionario"] . "','" . $r["oficinaFuncionario"] . "','" . $r["cargoFuncionario"] . "','" . $r["motivo"] . "','" . $r["lugar"] . "','" . $r["estadoVisita"] . "','verVisita');"; ?>"><img alt="Ver" style="width:19px;" src="../icon/eye.png"/></a>
                                    </td>
                                </tr>
                                <?php $cod+=1 ?>
                            <?php endwhile; ?>
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
                                                <input type="text" class="form-control" id="m_idVisita" name="m_idVisita" readonly="">
                                            </div>   
                                            <label class="col-lg-2 control-label">ESTADO VISITA:   </label>
                                            <div class="col-lg-4">
                                                <select id="m_estadoVisita" class="col-lg-2 form-control" title="Seleccione Estado" disabled="">
                                                    <option value="Finalizado">Finalizado</option>
                                                    <option value="Pendiente">Pendiente</option>
                                                </select>
                                            </div> 
                                        </div>    
                                        <div id="divtxtId1" class="form-group">                                        
                                            <label class="col-lg-2 control-label">VISITANTE:   </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_nombreVisitante" name="m_nombreVisitante" placeholder="NOMBRE DEL VISITANTE" disabled="" onkeypress="return soloLetras(event)">
                                            </div>                    
                                            <label class="col-lg-2 control-label">DNI VISITANTE:</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_dniVisitante" name="m_dniVisitante" placeholder="DNI VISITANTE" disabled="">
                                            </div>
                                        </div>
                                        <div id="divtxtId2" class="form-group">                                        
                                            <label class="col-lg-2 control-label">FUNCIONARIO:   </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_nombreFuncionario" name="m_nombreFuncionario" placeholder="NOMBRE DEL FUNCIONARIO" disabled="">
                                            </div>                    
                                            <label class="col-lg-2 control-label">OFICINA FUNC:</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_oficinaFuncionario" name="m_oficinaFuncionario"  placeholder="OFICINA DEL FUNCIONARIO" disabled="">
                                            </div>
                                        </div>
                                        <div id="divtxtId3" class="form-group">                                        
                                            <label class="col-lg-2 control-label">CARGO FUNC:   </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_cargoFuncionario" name="m_cargoFuncionario" placeholder="CARGO DEL FUNCIONARIO" disabled="">
                                            </div>                    
                                        </div>
                                        <div id="divtxtId4" class="form-group">                                        
                                            <label class="col-lg-2 control-label">F. ENTRADA:   </label>
                                            <div class="col-lg-4">
                                                <input type="date" class="form-control" id="m_fecha" name="m_fecha" disabled="">
                                            </div>                  
                                            <label class="col-lg-2 control-label">FECHA SALIDA:</label>
                                            <div class="col-lg-4">
                                                <input type="date" class="form-control" id="m_fechaTermino" name="m_fechaTermino" disabled="">
                                            </div>
                                        </div>
                                        <div id="divtxtId5" class="form-group">                                        
                                            <label class="col-lg-2 control-label">H. ENTRADA:   </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_horaEntrada" name="m_horaEntrada" placeholder="HORA DE ENTRADA" disabled="">
                                            </div>
                                            <label class="col-lg-2 control-label">HORA SALIDA:</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_horaTermino" name="m_horaTermino" placeholder="HORA DE SALIDA" disabled="">
                                            </div>
                                        </div> <div id="divtxtId6" class="form-group">                                        
                                            <label class="col-lg-2 control-label">MOTIVO VISITA:   </label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_motivo" name="m_motivo" placeholder="MOTIVO DE LA VISITA" disabled="">
                                            </div>                    
                                            <label class="col-lg-2 control-label">LUGAR VISITA:</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="m_lugar" name="m_lugar" placeholder="LUGAR DE LA VISITA" disabled="">
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
        <?php endif; ?>
    </body>
</html>