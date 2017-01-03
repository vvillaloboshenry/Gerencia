<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;
$permisos = isset($_SESSION['arr_permisos']) ? $_SESSION['arr_permisos'] : null;


switch ($profile) {
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
                        <?php if(in_array('nuevo_funcionario', $permisos)) : ?>
                        {
                            text: '<a class="btn btn-primary btn-xs" style="height: 40px;width:40px ;margin-bottom: 9.4px;font-size:24px;" id="nuevo_funcionario" name="nuevo_funcionario"><img alt="Ver" style="height:30px;padding-bottom: 7px;" src="../icon/agregarFuncionario.png"/></a>',
                            titleAttr: 'Nuevo Funcionarios',
                            action: function (e, dt, node, config) {
                                window.location = "./#/nuevo_funcionario"; // disable button
                            }
                        },
                       <?php endif ?>
                       <?php if(in_array('crear_roles', $permisos)) : ?>        
                        {
                            text: '<a class="btn btn-success btn-xs" style="height: 40px;width:40px;margin-bottom: 9.4px;font-size:24px;" id="crear_roles" name="crear_roles"><img alt="Ver" style="height:35px;padding-bottom: 7px;" src="../icon/roll.png"/></a>',
                            titleAttr: 'Crear Roles con Permisos',
                            action: function (e, dt, node, config) {
                                window.location = "./#/crear_roles"; // disable button
                            }
                        },
                        <?php endif ?>
                        <?php if(in_array('copiar_tabla', $permisos)) : ?>         
                        {
                            extend: 'copy',
                            text: '<button id="copiar_tabla"  style="font-size:24px;color:orange;"><i class="fa fa-files-o"></i></button>',
                            titleAttr: 'Copiar Tabla'
                        },
                        <?php endif ?>
                        <?php if(in_array('reporte_pdf', $permisos)) : ?>  
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
                        <?php if(in_array('reporte_excel', $permisos)) : ?>  
                        {
                            extend: 'excel',
                            text: '<button id="reporte_excel" name="excel" style="font-size:24px;color:green;"><i class="fa fa-file-excel-o"></i></button>',
                            titleAttr: 'Reporte Excel'
                        },
                       <?php endif ?>
                        <?php if(in_array('imprimir_reporte', $permisos)) : ?> 
                        {
                            extend: 'print',
                            text: '<button id="imprimir_reporte" style="font-size:24px"><i class="fa fa-print"></i></button>',
                            titleAttr: 'Imprimir Reporte'
                        }
                        <?php endif ?>
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
                    $('#mbtn_actualizarVisita').prop("disabled", true);
                } else {
                    $('#m_nombreVisitante').prop("disabled", false);
                    $('#m_dniVisitante').prop("disabled", false);
                    $('#m_nombreFuncionario').prop("disabled", false);
                    $('#m_oficinaFuncionario').prop("disabled", false);
                    $('#m_cargoFuncionario').prop("disabled", false);
                    $('#m_motivo').prop("disabled", false);
                    $('#m_lugar').prop("disabled", false);
                    $('#mbtn_actualizarVisita').prop("disabled", false);
                    //$('#m_estadoVisita').prop("disabled", false);
                    //$('#m_fecha').prop("disabled", false);
                    //$('#m_fechaTermino').prop("disabled", false);
                    //$('#m_horaEntrada').prop("disabled", false);
                    //$('#m_horaTermino').prop("disabled", false);
                }
            };

            $('#datepicker').datepicker({
                format: "dd/mm/yyyy",
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
                    <div class="form-group col-md-4" style="left: 18%;top:5.52%;position: absolute">
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
                                            echo  $r["oficinaFuncionario"] == "" ? $r["cargoFuncionario"] : $r["oficinaFuncionario"];
                                        }
                                        ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($r["fecha"])); ?></td>
                                    <td><?php
                                        echo $r["fechaTermino"] ? date('d-m-Y', strtotime($r["fechaTermino"])) : '0000-00-00';
                                        ?></td>
                                    <td><?php echo $r["estadoVisita"]; ?></td>
                                    <td>
                                        <?php if(in_array('verVisita', $permisos)) : ?>
                                            <a class="btn btn-default btn-xs btn_verVisita " title="Ver" type="button" id="verVisita" name="verVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="<?php echo "verVisita('" . $r["idVisita"] . "','" . $r["nombreVisitante"] . "','" . $r["dniVisitante"] . "','" . $r["nombreFuncionario"] . "','" . $r["oficinaFuncionario"] . "','" . $r["cargoFuncionario"] . "','" . $r["motivo"] . "','" . $r["lugar"] . "','" . $r["estadoVisita"] . "','verVisita');"; ?>"><img alt="Ver" style="width:19px;" src="../icon/eye.png"/></a>
                                        <?php endif; ?>
                                        <?php if(in_array('editarVisita', $permisos)) : ?>     
                                            <a class="btn btn-warning btn-xs btn_editarVisita" title="Editar" id="editarVisita" name="editarVisita" data-toggle="modal" data-target="#modalVerEditar" onclick="<?php echo "verVisita('" . $r["idVisita"] . "','" . $r["nombreVisitante"] . "','" . $r["dniVisitante"] . "','" . $r["nombreFuncionario"] . "','" . $r["oficinaFuncionario"] . "','" . $r["cargoFuncionario"] . "','" . $r["motivo"] . "','" . $r["lugar"] . "','" . $r["estadoVisita"] . "','editar');"; ?>"><img alt="Editar" style="width:19px;" src="../icon/edit.png"></a>
                                        <?php endif; ?>
                                        <?php if(in_array('eliminarVisita', $permisos)) : ?>
                                        <a class="btn btn-danger btn-xs btn_eliminarVisita" title="Eliminar" id="eliminarVisita" name="eliminarVisita" data-toggle="modal" data-target="#modalEliminar" onclick="<?php echo "eliminarVisita('" . $r["idVisita"] . "');"; ?>"><img alt="Eliminar" style="width:19px;" src="../icon/trash.png"></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $cod+=1 ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>  
                <!-- MODAL ELIMINAR --> <?php require_once 'm_eliminar.php'; ?><!-- FIN MODAL -->
                <!--- MODAL VISITA--> <?php require_once 'm_visita.php';?><!--- FIN MODAL -->
                <!--- MODAL FUNCIONARIOS --><?php require_once 'm_funcionarios.php'?><!--- FIN MODAL FUNCIONARIOS-->
                <div id="nuevaVisita">
                    <a class="btn btn-primary btn_nueva_visita" id="nueva_visita" href="./#/nueva_visita"><i class="fa fa-plus" aria-hidden="true"></i> Nueva Visita</a>
                </div>
            </div>
        <?php endif; ?>
    </body>
</html>