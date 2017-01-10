<?php
include "../controller/mostrar_roles.php";
?>
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
                            <td class="accordion-toggle area" data-toggle="collapse" data-target="<?php echo '#' . $cod; ?>" style="width: 145px;" ><a href=""><?php echo $r["nameProfi"]; ?></a></td>
                            <td style="color:#337ab7;" data-toggle="collapse" data-target="<?php echo '#' . $cod; ?>">
                                <?php
                                $sqlPermisos = "SELECT *FROM dt_permiso_perfil dpp inner join permisos p ON dpp.id_permiso=p.id where dpp.id_perfil='" . $r["idProfile"] . "'";
                                $query_permisos = $con->query($sqlPermisos);
                                if ($query_permisos->num_rows > 0):
                                    while ($columnaRol = $query_permisos->fetch_array()):
                                        ?>
                                        <span class="<?php echo $columnaRol["icon"] ?>" title="<?php echo $columnaRol["nombre"] ?>" style="padding-right: 45px"></span>
                                        <?php
                                    endwhile;
                                endif;
                                ?>
                            </td>

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
<!-- ************** Fin Tabla Roll con Permisos ************* -->

