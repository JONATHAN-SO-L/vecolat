<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<?php if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="superoot" ){ ?>

<style>
.page-header{
display:none;
}
footer {
    display: none;
}
.fa-copyright:before {
    content: "\f1f9";
    display: none;
}
.reportexcel{
   float: inline-end; 
}
</style>
<?php include "./inc/navbarsop.php"; ?>
<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Tickets</h1>
                <span class="label label-danger">Sistemas</span>
                <p class="pull-right text-primary">
                  <strong>
                  <?php include "./inc/timezone.php"; ?>
                 </strong>
               </p>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-sm-2">
              <img src="./img/msj.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-10">
              <p class="lead text-info">Bienvenido <strong><?php echo $_SESSION['nombre_completo']; ?></strong>, aqui se muestran todos los Tickets de Planta.</p>
            </div>
          </div>
        </div>
        <div class="reportexcel">
        <form method="POST" class="form" action="ticket_Excel_pl.php">
                <input type="date" name="fecha1">
                <input type="date" name="fecha2">
                <input type="submit" name="generar_reporte">
			 </form>
		</div>
            <?php
                if(isset($_POST['id_del'])){
                    $id = MysqlQuery::RequestPost('id_del');
                    if(MysqlQuery::Eliminar("ticket", "id='$id'")){
                        echo '
                            <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="text-center">Incidencias ELIMINADA</h4>
                                <p class="text-center">
                                    La Incidencia fue eliminado del sistema con exito
                                </p>
                            </div>
                        ';
                    }else{
                        echo '
                            <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                                <p class="text-center">
                                    No hemos podido eliminar la incidencia
                                </p>
                            </div>
                        '; 
                    }
                }

                /* Todos los tickets
                $num_ticket_all=Mysql::consulta("SELECT * FROM sop_preventivo");
                $num_total_all=mysqli_num_rows($num_ticket_all);*/

                /* Tickets pendientes*/
                $num_ticket_pend=Mysql::consulta("SELECT * FROM ticket WHERE estado_ticket='Pendiente' AND ubicacion='Planta'");
                $num_total_pend=mysqli_num_rows($num_ticket_pend);

                /* Tickets en proceso*/
                $num_ticket_proceso=Mysql::consulta("SELECT * FROM ticket WHERE estado_ticket='En proceso' AND ubicacion='Planta'");
                $num_total_proceso=mysqli_num_rows($num_ticket_proceso);

                /* Tickets resueltos*/
                $num_ticket_res=Mysql::consulta("SELECT * FROM ticket WHERE estado_ticket='Resuelto' AND ubicacion='Planta'");
                $num_total_res=mysqli_num_rows($num_ticket_res);
                
                /* Tickets compra*/
                $num_ticket_compra=Mysql::consulta("SELECT * FROM ticket WHERE estado_ticket='Requisicion de compra' AND ubicacion='Planta'");
                $num_total_compra=mysqli_num_rows($num_ticket_compra);
                
                /* Tickets garantia*/
                $num_ticket_gara=Mysql::consulta("SELECT * FROM ticket WHERE estado_ticket='Reparacion en Garantia' AND ubicacion = 'Planta'");
                $num_total_gara=mysqli_num_rows($num_ticket_gara);

                /* Tickets cancelados */
                $num_ticket_cancel=Mysql::consulta("SELECT * FROM ticket WHERE estado_ticket='Cancelado' AND ubicacion = 'Planta'");
                $num_total_cancel=mysqli_num_rows($num_ticket_cancel);

                /* Tickets Por compra */
                $num_ticket_entrega=Mysql::consulta("SELECT * FROM ticket WHERE estado_ticket='Resuelto compra' AND ubicacion = 'Planta'");
                $num_total_entrega=mysqli_num_rows($num_ticket_entrega);
                ?>


            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified"><li><a href="./root.php?view=ticketof"><i class="fa fa-home"></i>&nbsp;&nbsp;Tickets en Oficina&nbsp;&nbsp;<span class="badge"><?php echo $num_total_oficina; ?></span></a></li>
                            <li><a href="./root.php?view=ticketpl&ticket=pending"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Tickets pendientes&nbsp;&nbsp;<span class="badge"><?php echo $num_total_pend; ?></span></a></li>
                            <li><a href="./root.php?view=ticketpl&ticket=process"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;Tickets en proceso&nbsp;&nbsp;<span class="badge"><?php echo $num_total_proceso; ?></span></a></li>
                            <li><a href="./root.php?view=ticketpl&ticket=compra"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Requisicion de compra&nbsp;&nbsp;<span class="badge"><?php  echo $num_total_compra; ?></span></a></li>
                            <li><a href="./root.php?view=ticketpl&ticket=gara"><i class="fa fa-shield"></i>&nbsp;&nbsp;Reparacion en Garantia&nbsp;&nbsp;<span class="badge"><?php  echo $num_total_gara; ?></span></a></li>
                            <li><a href="./root.php?view=ticketpl&ticket=resolved"><i class="fa fa-thumbs-o-up"></i>&nbsp;&nbsp;Tickets resueltos&nbsp;&nbsp;<span class="badge"><?php echo $num_total_res; ?></span></a></li>
                            <li><a href="./root.php?view=ticketpl&ticket=canceled"><i class="fa fa-window-close"></i>&nbsp;&nbsp;Tickets cancelados&nbsp;&nbsp;<span class="badge"><?php echo $num_total_cancel; ?></span></a></li>
                            <li><a href="./root.php?view=ticketpl&ticket=entrega"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Tickets por compra&nbsp;&nbsp;<span class="badge"><?php echo $num_total_entrega; ?></span></a></li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php
                                $mysqli = mysqli_connect(SERVER, USER, PASS, BD);
                                mysqli_set_charset($mysqli, "utf8");

                                $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                                $regpagina = 20;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

                                
                                if(isset($_GET['ticket'])){
                                   // if($_GET['ticket']=="all"){
                                     //   $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM sop_preventivo LIMIT $inicio, $regpagina";
                                    //}else
                                    if($_GET['ticket']=="pending"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE estado_ticket='Pendiente' AND ubicacion='Planta' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="process"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE estado_ticket='En proceso' AND ubicacion='Planta' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="compra"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE estado_ticket='Requisicion de compra' AND ubicacion='Planta' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="gara"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE estado_ticket='Reparacion en Garantia' AND ubicacion='Planta' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="resolved"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE estado_ticket='Resuelto' AND ubicacion='Planta' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="canceled"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE estado_ticket='Cancelado' AND ubicacion = 'Planta' LIMIT $inicio, $regpagina";
                                    }elseif($_GET['ticket']=="entrega"){
                                        $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE estado_ticket='Resuelto compra' AND ubicacion = 'Planta' LIMIT $inicio, $regpagina";
                                    }else{
                                    $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket AND ubicacion='Planta' LIMIT $inicio, $regpagina";
                                    }
                                }else{
                                    $consulta="SELECT SQL_CALC_FOUND_ROWS * FROM ticket WHERE ubicacion='Planta' LIMIT $inicio, $regpagina";
                                }



                                $selticket=mysqli_query($mysqli,$consulta);

                                $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);

                                if(mysqli_num_rows($selticket)>0):
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Acción</th>
                                        <th class="text-center">Fecha</th>	
                                        <th class="text-center">Usuario</th>									
                                        <th class="text-center">Equipo</th>
                                        <th class="text-center">Serie</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Asesor Técnico</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ct=$inicio+1;
                                        while ($row=mysqli_fetch_array($selticket, MYSQLI_ASSOC)): 
                                    ?>
                                    <tr>
									<td class="text-center">
                                            <a href="root.php?view=ticketedit&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="./lib/<?php echo $row['ubicacion']; ?>_pdf.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                                            <a href="ticket_eliminar.php?id=<?php echo $fila['id']; ?>"class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                        <!--td class="text-center"><?php //echo $ct; ?></td-->
                                        <td class="text-center"><?php echo $row['fecha']; ?></td>
                                        <td class="text-center"><?php echo $row['nombre_usuario']; ?></td>
                                        <td class="text-center"><?php echo $row['equipo']; ?></td>
                                        <td class="text-center"><?php echo $row['serie']; ?></td>
                                        <td class="text-center"><?php echo $row['estado_ticket']; ?></td>
                                        <td class="text-center"><?php echo $row['tipo']; ?></td>
                                        <td class="text-center"><?php echo $row['observaciones']; ?></td>
                                        
                                    </tr>
                                    <?php
                                        $ct++;
                                        endwhile; 
                                    ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <h2 class="text-center">No hay Tickets registrados en el sistema</h2>
                            <?php endif; ?>
                        </div>
                        <?php 
                            if($numeropaginas>=1):
                            if(isset($_GET['ticket'])){
                                $ticketselected=$_GET['ticket'];
                            }else{
                                $ticketselected="all";
                            }
                        ?>
                        <nav aria-label="Page navigation" class="text-center">
                            <ul class="pagination">
                                <?php if($pagina == 1): ?>
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="./root.php?view=ticketpl&ticket=<?php echo $ticketselected; ?>&pagina=<?php echo $pagina-1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                
                                
                                <?php
                                    for($i=1; $i <= $numeropaginas; $i++ ){
                                        if($pagina == $i){
                                            echo '<li class="active"><a href="./root.php?view=ticketpl&ticket='.$ticketselected.'&pagina='.$i.'">'.$i.'</a></li>';
                                        }else{
                                            echo '<li><a href="./root.php?view=ticketpl&ticket='.$ticketselected.'&pagina='.$i.'">'.$i.'</a></li>';
                                        }
                                    }
                                ?>
                                
                                
                                <?php if($pagina == $numeropaginas): ?>
                                    <li class="disabled">
                                        <a aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a href="./root.php?view=ticketpl&ticket=<?php echo $ticketselected; ?>&pagina=<?php echo $pagina+1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!--container principal-->
            <?php include "./inc/foother.php"; ?>
<?php
}else{
?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="./img/Stop.png" alt="Image" class="img-responsive animated slideInDown"/><br>
                    <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                    
                </div>
                <div class="col-sm-7 animated flip">
                    <h1 class="text-danger">Lo sentimos esta página es solamente para administradores del Sistema</h1>
                    <h3 class="text-info text-center">Inicia sesión como administrador para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>