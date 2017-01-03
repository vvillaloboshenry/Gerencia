<html>
    <head>
        <?php
        include "../controller/conexion.php";
        include '../controller/recursos.php';
        ?>


        <style>     	
            @import url(http://fonts.googleapis.com/css?family=Lato:700,300,400);
            @import url(http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);
        </style>

        <link href="http://oss.maxcdn.com/icheck/1.0.2/skins/all.min.css" rel="stylesheet">

        <style>

      
            .wrap 
            {
                margin: 0 auto;
                height: 100%;
                padding: 5px 10px;
                position: relative; 
            }

            /* Dynamic Grid Styles */
            .wrap > .container 
            {
                max-width: 860px;
                width: 100%;
                height: 100%;
                position: relative;
                padding: 15px 0 15px; 
            }

            /* Well Styles */
            .well 
            {
                border: 0;
                padding: 20px;
                min-height: 63px;
                background: #fff;
                box-shadow: none;
                border-radius: 3px;
                position: relative;
                max-height: 100000px;
                border-bottom: 2px solid #ccc;
                transition: max-height 0.5s ease;
                -o-transition: max-height 0.5s ease;
                -ms-transition: max-height 0.5s ease;	
                -moz-transition: max-height 0.5s ease;
                -webkit-transition: max-height 0.5s ease;
            }
        </style>


    </head>
    <body class="left">
        <section class="wrap">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="#">Form Elements</a></li>
                    <li><a href="#">Components</a></li>
                    <li><a href="#">iCheck</a></li>
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-refresh"></i></a></li>
                </ol>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="well">
                            <div class="header">Minimal Skin <a class="headerclose"><i class="icon-remove pull-right"></i></a> <a class="headerrefresh"><i class="icon-refresh pull-right"></i></a> <a class="headershrink"><i class="icon-chevron-down pull-right"></i></a></div>
                            <div class="skin skin-minimal">
                                <div class="skin-section">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                            <div class="checkbox icheck form-group">
                                                <label for="minimal-checkbox-1" class="icheck">
                                                    <input tabindex="5" type="checkbox" id="minimal-checkbox-1"> Checkbox 1
                                                </label>
                                            </div>
                                            <div class="checkbox icheck form-group">
                                                <label for="minimal-checkbox-2" class="icheck">
                                                    <input tabindex="6" type="checkbox" id="minimal-checkbox-2" checked> Checkbox 2
                                                </label>
                                            </div>
                                            <div class="checkbox icheck form-group">
                                                <label for="minimal-checkbox-disabled" class="icheck">
                                                    <input type="checkbox" id="minimal-checkbox-disabled" disabled> Disabled
                                                </label>
                                            </div>
                                            <div class="checkbox icheck form-group">
                                                <label for="minimal-checkbox-disabled-checked" class="icheck">
                                                    <input type="checkbox" id="minimal-checkbox-disabled-checked" checked disabled> Disabled & checked
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>

</html>