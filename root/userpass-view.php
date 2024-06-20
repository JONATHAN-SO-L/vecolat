<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 06/2021 v1
 */
 ?>
<?php if($_SESSION['nombre']!="" && $_SESSION['tipo']=="superoot"){ 

          /* Actualizar cuenta admin */
        
         if(isset($_POST['email_usuario']) && isset($_POST['nombre_comp'])){
            $email_reg=MysqlQuery::RequestPost('email_usuario');
            $usuario=MysqlQuery::RequestPost('nombre_comp');
            $pass_admin_update=md5(MysqlQuery::RequestPost('admin_clave_up'));

            $sql=Mysql::consulta("SELECT * FROM usuario_sop WHERE nombre_comp= '$usuario' AND email_usuario='$email_reg'");
            if(mysqli_num_rows($sql)>=1){
                if(MysqlQuery::Actualizar("usuario_sop", "clave='$pass_admin_update' ", "nombre_comp='$usuario' and email_usuario='$email_reg'")){
                    
                    //$_SESSION['clave']=$pass_admin_update;
                    echo '
                        <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="text-center">PASSWORD ACTUALIZADO</h4>
                            <p class="text-center">
                                La contraseña se actualizo con exito
                            </p>
                        </div>
                    ';
                }else{
                    echo '
                        <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                            <p class="text-center">
                                No hemos podido actualizar la contraseña
                            </p>
                        </div>
                    ';
                }
            }else{
                echo '
                    <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                        <p class="text-center">
                            Usuario y clave incorrectos
                        </p>
                    </div>
                ';
           }
        }
        
   
        
	$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM usuario_sop WHERE id= '$id' ");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>

        <!--************************************ Page content******************************-->
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
                <h1 class="animated lightSpeedIn">Actualización de Contraseña</h1>
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
		<!--************************************ Page content******************************-->
		
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
                <img src="./img/Edit.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-9">
                <a href="root.php?view=users" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver</a>
            </div>
          </div>
        </div>
            
            
          <div class="container">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                		<input type="hidden" name="id_edit" value="<?php echo $reg['id']?>">
                        <div class="form-group">
                    
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="nombre_comp" readonly="" value="<?php echo $reg['nombre_comp']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
						

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="email" readonly="" class="form-control"  name="email_usuario" readonly="" value="<?php echo utf8_decode($reg['email_usuario'])?>">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Área</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="area" readonly="" value="<?php echo $reg['area']?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
						
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Ubicacion</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="ubicacion" readonly="" value="<?php echo $reg['ubicacion']?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Extención</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="telefono" readonly="" value="<?php echo $reg['telefono']?>">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                              </div> 
                          </div>
                        </div>
                        
						 <div class="form-group">
                               <label class="col-sm-2 control-label"><i class="fa fa-unlock-alt"></i>&nbsp;Nueva contraseña</label>
                               <div class="col-sm-10">
                              <div class='input-group'>
                               <input type="password" class="form-control" name="admin_clave_up" placeholder="Nueva contraseña" required="">
                               <span class="input-group-addon"><i class="fa fa-users"></i></span>
                             </div>
                              </div>
                        </div>
                             <button type="submit" class="btn btn-info">Actualizar Contraseña</button>
                        
                    <br>
                    

                      </form>
            </div><!--col-md-12-->
          </div><!--container-->
          
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