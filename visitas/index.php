
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    require'class/sessions.php';
    $objses = new Sessions();
    $objses->init();

    $profile = isset($_SESSION['idprofile']) ? $_SESSION['idprofile'] : null;
    ?>
    <head>
        <title>Visitas a Funcionarios - CSI - Gerencia Regional de Salud de Lambayeque</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap5.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/dataTables.min.css" rel="stylesheet" media="screen" type="text/css"/>
        <link href="../css/estilo.css" rel="stylesheet" media="screen" type="text/css"/>
        <!-- CSS DatePicker || https://uxsolutions.github.io/bootstrap-datepicker/-->
        <link href="../css/plugins/datapicker/css/bootstrap-datepicker3.css" rel="stylesheet">
        <!-- Icons Font Awesome-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" media="screen" type="text/css" />
        <!-- Buttons DataTables -->
        <link href="../css/plugins/dataTable/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- CSS Gerencia -->
        <link href="../css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" /> 
        <link href="http://fonts.googleapis.com/css?family=Roboto:100,300,400" media="screen" rel="stylesheet" type="text/css" /> 
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab" media="screen" rel="stylesheet" type="text/css" /> 
        <link href="../css/animate.min.css" media="screen" rel="stylesheet" type="text/css" /> 
        <link href="../css/custom.min.css" media="screen" rel="stylesheet" type="text/css" /> 

    </head>
    <body ng-app="MiApp" >
        <div class="marco" style="background-color: blue; width: 1280px; margin: 0 auto;">
            <div class='contenido' style="background-color: white; width: 1276px; margin: auto;">
                <div class="cabecera">
                    <?php
                    $rol = isset($_SESSION['idRol']) ? $_SESSION['idRol'] : null;
                    if ($rol == '') {
                        $url = "./#/ver_visitas";
                    } else {
                        $url = "./#/administrador";
                    }
                    echo '<a class="navbar-brand" href="' . $url . '">';
                    ?>        

                    <img src="../img/logolambayeque.png" alt="Gobierno Regional Lambayeque">  
                    <div class="title-web text-center">GOBIERNO REGIONAL DE
                        <div class="title-two-web">LAMBAYEQUE</div>   
                    </div>                
                    </a>
                    <h1 style="padding: 33px;font-weight:  bold">VISITAS A FUNCIONARIOS</h1>
                    <div class="gerencia" style="align-items: flex-end;padding-left: 10px;">
                        <h6>Gerencia Regional de Salud de Lambayeque: </h6>
                    </div>

                    <div style="background-color: #39699F; height: 4px"></div>
                    <div class="contenedor">
                        <?php
                        switch ($rol) {
                            case '' :
                                print ' <a href="login.php">
                                            <div class="btn btn-primary" style="align-items: flex-end;float:right; padding-right: 10px;">
                                                <h6> Iniciar Sesion</h6>
                                            </div>   
                                         </a> ';
                                break;
                            default :
                                print ' <a href="controller/log_out.php">
                                            <div class="btn btn-danger" style="align-items: flex-end;float:right; padding-right: 10px;">
                                                <h6>Bienvenido, ' . $_SESSION['usuario'] . ' || Cerrar Sesion</h6>
                                            </div>   
                                        </a> ';
                        }
                        ?>
                        <div ng-view style="padding-top: 2px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <br>  


        <footer id="footerWrapper" class="footer" style="background: #3d3d3d;padding: 10px 0 0 0;">     
            <section id="mainFooter">      
                <div class="container">       
                    <div class="row">        
                        <div class="col-md-8 col-sm-6">         
                            <div class="footerWidget">          
                                <h3 style="color: #fff">GOBIERNO REGIONAL DE LAMBAYEQUE</h3>          
                                <p>Responsable de acceso a la información pública:
                                    <br>Ing. Carlos Mejia Zelada<br>          
                                    <a href="http://siga.regionlambayeque.gob.pe/docs/adportal/010720151052561276166922.pdf" target="_blank" class="link-resolucion-footer">Resoluci&oacute;n que designa</a>          
                                    <br>          Responsable de la Elaboración del Portal Institucional:<br>Ing. Carlos Mejia Zelada<br>          
                                    <a href="http://siga.regionlambayeque.gob.pe/docs/adportal/20072015101959926872814.pdf" target="_blank" class="link-resolucion-footer">Resoluci&oacute;n que designa</a>                   
                                </p>         
                            </div> 

                        </div>      
                    </div>     
            </section>    
        </footer>

        <!--Librerias para los dataTables -->
        <script src="../js/lib/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="../js/lib/bootstrap.min.js"></script>
        <script src="../js/lib/dataTable.min.js"></script>
        <script src="../css/plugins/dataTable/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="../css/plugins/dataTable/buttons.flash.min.js" type="text/javascript"></script>
        <script src="../css/plugins/dataTable/jszip.min.js" type="text/javascript"></script>
        <script src="../css/plugins/dataTable/pdfmake.min.js" type="text/javascript"></script>
        <script src="../css/plugins/dataTable/vfs_fonts.js" type="text/javascript"></script>
        <script src="../css/plugins/dataTable/buttons.html5.min.js" type="text/javascript"></script>
        <script src="../css/plugins/dataTable/buttons.print.min.js" type="text/javascript"></script>
        <!-- Librerias para el Datepicker -->
        <script src="../css/plugins/datapicker/js/bootstrap-datepicker.js"></script>
        <script src="../css/plugins/datapicker/locales/bootstrap-datepicker.es.min.js"></script>
        <!--Libreria AngularJS -->
        <script src="../js/lib/angular.min.js"></script>
        <script src="../js/lib/angular-route.min.js"></script>
        <script src="../js/app.js"></script>
        <!-- NOTIFICACIONES PLUGIN -->
        <link href="../css/plugins/pnotify/pnotify.custom.min.css" rel="stylesheet" type="text/css"/>
        <script src="../css/plugins/pnotify/pnotify.min.js" type="text/javascript"></script>
        <script src="../css/plugins/pnotify/components_notifications_pnotify.js" type="text/javascript"></script>
        <link href="../css/plugins/pnotify/colors.css" rel="stylesheet" type="text/css"/>
    </body>
</html>