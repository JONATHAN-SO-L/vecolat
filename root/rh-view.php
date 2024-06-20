<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 06/2021 v1
 */
 ?>
<?php if($_SESSION['nombre']!="" && $_SESSION['tipo']=="superoot"){ ?>    
        <?php
            

            $idA=$_SESSION['id'];
            /* Todos los admins*/
            $num_admin=Mysql::consulta("SELECT * FROM admin_soporte WHERE id!='1' AND id!='$idA'");
            $num_total_admin = mysqli_num_rows($num_admin);

            /* Todos los users*/
            $num_user=Mysql::consulta("SELECT * FROM usuario_sop");
            $num_total_user = mysqli_num_rows($num_user);
            
            /* Todos los admin*/
            $num_admin=Mysql::consulta("SELECT * FROM admin_soporte");
            $num_total_admin = mysqli_num_rows($num_admin);
            
            /* Todos los rh*/
            $num_rh=Mysql::consulta("SELECT * FROM usuario_rh");
            $num_total_user = mysqli_num_rows($num_rh);
            
        ?>
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
</style>
<?php include "./inc/navbarsop.php"; ?>
<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Recursos Humanos</h1>
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
                <img src="./img/card_identy.png" alt="Image" class="img-responsive animated flipInY">
            </div>
            <div class="col-sm-10">
              <p class="lead text-info">Bienvenido <strong><?php echo $_SESSION['nombre_completo']; ?></strong>, en esta página se muestran todos los RH registrados en el Sistema.</p>
            </div>
            <div>
        <form method = "POST" action = "./root/listado_rh.php">
            <input type = "submit" value = "Listado de RH registrados" id = "rh" name = "rh">
        </form>
        </div>
          </div>
        </div>
        
        <br><br>
        
        <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="./root.php?view=users"><i class="fa fa-users"></i>&nbsp;&nbsp;Usuarios&nbsp;&nbsp;<span class="badge"><?php echo $num_total_user; ?></span></a></li>
                            <li><a href="./root.php?view=admin"><i class="fa fa-male"></i>&nbsp;&nbsp;Soporte&nbsp;&nbsp;<span class="badge"><?php echo $num_total_admin; ?></span></a></li>
                            <li><a href="./root.php?view=rh"><i class="fa fa-male"></i>&nbsp;&nbsp;RH&nbsp;&nbsp;<span class="badge"><?php echo $num_total_rh; ?></span></a></li>
                            <li><a href="./soporte.php?view=registro"><i class="fa fa-male"></i>&nbsp;&nbsp;Registrar nuevo usuario&nbsp;&nbsp;<span class="badge"><?php echo $num_total_equipo; ?></span></a></li>
                            <li><a href="./root.php?view=adminregistro"><i class="fa fa-user"></i>&nbsp;&nbsp;Registrar nuevo Soporte &nbsp;&nbsp;<span class="badge"></span></a></li>
                            <li><a href="./root.php?view=rhregistro"><i class="fa fa-user"></i>&nbsp;&nbsp;Registrar nuevo RH &nbsp;&nbsp;<span class="badge"></span></a></li>
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
                                $regpagina = 15;
                                $inicio = ($pagina > 1) ? (($pagina * $regpagina) - $regpagina) : 0;

                                $selrh=mysqli_query($mysqli,"SELECT SQL_CALC_FOUND_ROWS * FROM usuario_rh LIMIT $inicio, $regpagina");

                                $totalregistros = mysqli_query($mysqli,"SELECT FOUND_ROWS()");
                                $totalregistros = mysqli_fetch_array($totalregistros, MYSQLI_ASSOC);
                        
                                $numeropaginas = ceil($totalregistros["FOUND_ROWS()"]/$regpagina);
                                if(mysqli_num_rows($selrh)>0):
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Accion</th>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Nombre Usuario</th>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Area</th>
										<th class="text-center">Email</th>
										<th class="text-center">Ubicacion</th>
										<th class="text-center">Telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ct=$inicio+1;
                                        while ($row=mysqli_fetch_array($selrh, MYSQLI_ASSOC)): 
                                    ?>
                                    <tr>
									<td class="text-center">
                                            <form action="" method="POST" style="display: inline-block;">
                                                <a href="root.php?view=rhedit&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="root.php?view=rhpass&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success" ><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                                <a href="root.php?view=deleterh&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </form>
                                        </td>
                                        <td class="text-center"><?php echo $ct; ?></td>
                                        <td class="text-center"><?php echo $row['nombre_usuario']; ?></td>
                                        <td class="text-center"><?php echo $row['nombre_comp']; ?></td>
                                        <td class="text-center"><?php echo $row['area']; ?></td>
                                        <td class="text-center"><?php echo $row['email_usuario']; ?></td>
                                        <td class="text-center"><?php echo $row['ubicacion']; ?></td>
                                        <td class="text-center"><?php echo $row['telefono']; ?></td>
                                        
                                    </tr>
                                    <?php
                                        $ct++;
                                        endwhile; 
                                    ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                                <h2 class="text-center">No hay RH registrados en el sistema</h2>
                            <?php endif; ?>
                        </div>
                        <?php if($numeropaginas>=1): ?>
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
                                        <a href="./root.php?view=rh&pagina=<?php echo $pagina-1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                
                                
                                <?php
                                    for($i=1; $i <= $numeropaginas; $i++ ){
                                        if($pagina == $i){
                                            echo '<li class="active"><a href="./root.php?view=rh&pagina='.$i.'">'.$i.'</a></li>';
                                        }else{
                                            echo '<li><a href="./root.php?view=rh&pagina='.$i.'">'.$i.'</a></li>';
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
                                        <a href="./root.php?view=rh&pagina=<?php echo $pagina+1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
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
                    <h1 class="text-danger">Lo sentimos esta página es solamente para Superoot de Veco</h1>
                    <h3 class="text-info text-center">Inicia sesión como Superoot para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>