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
      
            $('#check').iCheck({
                
                checkboxClass: 'icheckbox_square-green',
            }).on('ifChecked', function (event) {

                alert($('#check').val());

            })
        ;
    </script>
    <body>
    
        <div class="col-lg-7">
            <input id="check" icheck type="checkbox"> 
        </div>
       

    </body>

</html>