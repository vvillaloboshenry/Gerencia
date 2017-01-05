<?php
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();

$user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;

switch ($profile) {
    case '' :
        header('Location: ../views/listar.php');
        break;
}
?>
<html>
    <head>
        <?php
        include "../controller/conexion.php";
        include "../controller/mostrar_roles.php";
        ?>

        <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" type="text/css"/>
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="../js/gerenciaJS.js"></script>

    </head>
    <script>
        $(document).ready(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });
        });
    </script>
    <style>
        .hiddenRow {
            padding: 2 !important;
        }
        .table-responsive .area { border-left: 4px solid #f38787; }

    </style>
    <body>

        <div class="container">
            <div class="content-wrapper" style="min-height: 542px;">
                <!-- Menu Flotante-->
                <div>
                    <div class="container"></div>
                    <section class="content-header">
                        <ol class="breadcrumb">
                            <li><a href="#/administrador" style="color: #0088cc"><i class="fa fa-home"></i>Principal</a></li>
                            <li><a style="color: black"> Roles & Permisos </a></li>
                        </ol>
                    </section>
                </div>
                <!-- Fin Menu Flotante-->
                <section class="content">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <!-- Roll page -->
                            <div class="nav-tabs-custom"> 
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" id="ul-menu-list">
                                    <li class="active" id="tabone"><a data-toggle="tab">Roles</a></li>
                                    <li class="" id="tabtwo"><a data-toggle="tab">Nuevo Rol con permisos</a></li>
                                </ul>
                                <!-- Fin Nav Tabs  -->
                                <br>
                                <!-- ************** Tabla Roll con Permisos ************* -->
                                <div class="box" id="box-one" style="display: block;">
                                    <?php if ($query_rol->num_rows > 0): ?>
                                        <!-- Users table -->
                                        <div class="table-responsive">
                                            <table class="table table-condensed" style="border-collapse:collapse;">  
                                                <tbody>
                                                    <?php $cod = 1 ?>
                                                    <?php while ($r = $query_rol->fetch_array()): ?>
                                                        <tr>
                                                            <td class="accordion-toggle area" data-toggle="collapse" data-target="<?php echo '#' . $cod; ?>" style="width: 800px;" ><a href=""><?php echo $r["nameProfi"]; ?></a></td>
                                                            <td style="border-right:0.5px solid rgba(68, 68, 68, 0.22)">
                                                                <span class="pull-right" style=" ">
                                                                    <a href="" class="btn btn-xs btn-info" title="" data-original-title="Show Detail"><i class="fa fa-list-alt"></i></a>
                                                                    <a href="" class="btn btn-primary btn-xs" title=""  data-original-title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                                    <a href="" class="btn btn-xs btn-danger" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                                                    <a class="accordion-toggle" data-toggle="collapse" data-target="<?php echo '#' . $cod; ?>" href="" aria-expanded="false">
                                                                        <i style="margin-top: 4px;padding-left: 8px" class="fa fa-chevron-down"></i>
                                                                    </a>
                                                                </span>
                                                            </td>
                                                        </tr>

                                                        <tr style="border-left: 0.5px solid rgba(68, 68, 68, 0.22);border-right: 0.5px solid rgba(68, 68, 68, 0.22);">
                                                            <td colspan="7" class="hiddenRow">
                                                                <div id="<?php echo $cod; ?>" class="accordian-body collapse">
                                                                    <div  class="accordion-inner">
                                                                        <?php echo $cod; ?>
                                                                    </div> 
                                                                </div>
                                                            </td>
                                                        </tr>   
                                                        <?php $cod+=1 ?>
                                                    <?php endwhile; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Fin Tabla Roll con Permisos-->

                                <!-- ************** Crear Roll con Permisos *************-->
                                <div class="box" id="box-two" style="display: none;">
                                    <form method="POST" action="./controller/crear_roll_permisos.php" class="form-horizontal" >
                                        <div class="form-group"><br>
                                            <label for="role" class=" col-lg-3 control-label">Rol </label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="inputNameProfi"  name="inputNameProfi"  maxlength="50" placeholder="Rol" required="true" >
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role" class=" col-lg-3 control-label">Descripcion </label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="inputDescripcion"   name="inputDescripcion" maxlength="50" placeholder="Breve Descripcion de su funcion " required="true">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="permission" class="col-lg-3 control-label company-label">Permisos</label>
                                            <div class="col-sm-9 col-md-offset-2" style="height: 310px; overflow-y: auto;">
                                                <h4>Seleccionar Permisos</h4>
                                                <ul class="k-group k-treeview-lines" role="tree">
                                                    <div>
                                                        <input type="checkbox" name="all">
                                                        <span style="padding-left: 40px;">Todos los Permisos</span>
                                                    </div>
                                                    <ul class="k-group" style="display: block;">
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox" id="1" name="permisos[]" value="1">
                                                            <span class="k-in"><span class="fa fa-users"></span>Nuevo Funcionario (*)</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox" id="2" name="permisos[]" value="2">
                                                            <span class="k-in"><span class="fa fa-user-secret"></span>Roles & Permissions (*)</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox" id="3" name="permisos[]" value="3">
                                                            <span class="k-in"><span class="fa fa-files-o"></span>Copiar Tabla</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox" id="4" name="permisos[]" value="4">
                                                            <span class="k-in"><span class="fa fa-file-text-o"></span>Reporte Pdf</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox"  id="5" name="permisos[]" value="5">
                                                            <span class="k-in"><span class="fa fa-file-excel-o"></span>Reporte Excel</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox"  id="6" name="permisos[]" value="6">
                                                            <span class="k-in"><span class="fa fa-print"></span>Imprimir Reporte</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox"  id="7" name="permisos[]" value="7">
                                                            <span class="k-in"><span class="fa fa-plus"></span>Nueva Visita (*)</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox"  id="8" name="permisos[]" value="8">
                                                            <span class="k-in"><span class="fa fa-eye"></span>Ver Visita</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox"  id="9" name="permisos[]" value="9">
                                                            <span class="k-in"><span class="fa fa-pencil-square-o"></span>Editar Visita (*)</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input class="chk_listado" type="checkbox"  id="10" name="permisos[]" value="10"> 
                                                            <span class="k-in"><span class="fa fa-trash-o"></span>Eliminar Visita (*)</span>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class=" col-md-3 control-label"></label>
                                            <div class="col-md-7">
                                                <input class="btn btn-primary" type="submit" value="Crear Rol">
                                            </div>
                                        </div> <br><br>
                                    </form>
                                </div>
                                <!-- Fin Rol y Permisos -->
                            </div> 
                            <!--Fin Roll page -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
