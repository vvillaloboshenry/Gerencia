<html>
    <head>
        <?php
        include "../controller/conexion.php";
        include '../controller/recursos.php';
        ?>
        <link href="../css/plugins/iCheck/custom.css" rel="stylesheet" type="text/css"/>
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    </head>
    <script>
        $(document).ready(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });
        });
        //  $('#check').iCheck({checkboxClass: 'icheckbox_square-green'}).on('ifChecked', function (event) {
        //     alert($('#check').val());
        // });

    </script>
    <body>

        <div class="content-wrapper" style="min-height: 542px;">
            <div class="container" style="" id="entire_chat_window"></div>
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>
                    <li><a href=""> Roles & Permissions </a></li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class=""><a data-toggle="tab" aria-expanded="false">Roles</a></li>
                                <li class="active"><a data-toggle="tab" aria-expanded="true">Nuevo Rol con permisos</a></li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- ************** general *************-->
                                <div class="tab-pane active" id="new_client">
                                    <br>
                                    <form method="POST" action="" class="form-horizontal" >
                                        <div class="form-group">
                                            <label for="role" class=" col-lg-3 control-label">Rol </label>
                                            <div class="col-lg-5">
                                                <input id="role" class="form-control " maxlength="50" placeholder="Rol" required="true" name="role" type="text">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role" class=" col-lg-3 control-label">Descripcion </label>
                                            <div class="col-lg-5">
                                                <input id="role" class="form-control " maxlength="50" placeholder="Breve Descripcion de su funcion " required="true" name="role" type="text">
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="permission" class="col-lg-3 control-label company-label">Permisos</label>
                                            <div class="col-sm-9 col-md-offset-2" style="height: 300px; overflow-y: auto;">
                                                <h4>Seleccionar Permisos</h4>
                                                <ul class="k-group k-treeview-lines" role="tree">
                                                    <div>
                                                        <input type="checkbox">
                                                        <span style="padding-left: 40px;">Todos los Permisos</span>
                                                    </div>
                                                    <ul class="k-group" style="display: block;">
                                                        <li style="padding-bottom: 3px;">
                                                            <input type="checkbox">
                                                            <span class="k-in"><span class="k-sprite fa fa-tachometer"></span>Nuevo funcionario</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input type="checkbox">
                                                            <span class="k-in"><span class="k-sprite fa fa-compass"></span>Copiar Tabla</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input type="checkbox">
                                                            <span class="k-in"><span class="k-sprite fa fa-user-secret"></span>Roles & Permissions</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input type="checkbox">
                                                            <span class="k-in"><span class="k-sprite fa fa-users"></span>Funcionarios</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input type="checkbox">
                                                            <span class="k-in"><span class="k-sprite fa fa-file-text-o"></span>Reporte Pdf</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input type="checkbox">
                                                            <span class="k-in"><span class="k-sprite fa fa-cogs"></span>Reporte Excel</span>
                                                        </li>
                                                        <li style="padding-bottom: 3px;">
                                                            <input type="checkbox">
                                                            <span class="k-in"><span class="k-sprite fa fa-envelope"></span>Configuraciones</span>
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
