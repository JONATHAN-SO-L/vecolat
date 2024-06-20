<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<?php
 include ("conexi.php");
include "./inc/navbarsop.php"; 
//header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="user"){ 
        
        /*Script para eliminar cuenta*/
        if(isset($_POST['usuario_delete']) && isset($_POST['clave_delete'])){
          $usuario_delete=MysqlQuery::RequestPost('usuario_delete');
          $clave_delete=md5(MysqlQuery::RequestPost('clave_delete'));
         
          $sql=Mysql::consulta("SELECT * FROM usuario_sop WHERE nombre_usuario= '$usuario_delete' AND clave='$clave_delete'");

          if(mysqli_num_rows($sql)>=1){
             MysqlQuery::Eliminar("usuario_sop", "nombre_usuario='$usuario_delete' and clave='$clave_delete'");
             echo '<script type="text/javascript"> window.location="eliminar.php"; </script>';
          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido eliminar la cuenta por que los datos son incorrectos
                    </p>
                </div>
            '; 
          }
        }
         
         
        /*Script para actualizar datos de cuenta*/
        if(isset($_POST['name_complete_update']) && isset($_POST['old_user_update']) && isset($_POST['email_update'])){

          $nombre_complete_update=MysqlQuery::RequestPost('name_complete_update');
          $old_user_update=MysqlQuery::RequestPost('old_user_update');
          $old_pass_update=md5(MysqlQuery::RequestPost('old_pass_update'));
          $new_pass_update=md5(MysqlQuery::RequestPost('new_pass_update'));
          $email_update=MysqlQuery::RequestPost('email_update');
          
           $sql=Mysql::consulta("SELECT * FROM usuario_sop WHERE nombre_usuario= '$old_user_update' AND clave='$old_pass_update'");
           
          if(mysqli_num_rows($sql)>=1){
            MysqlQuery::Actualizar("usuario_sop", " clave='$new_pass_update'", "nombre_usuario='$old_user_update' and clave='$old_pass_update'");

            $_SESSION['clave']=$new_pass_update;

            echo '
              <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="text-center">CUENTA ACTUALIZADA</h4>
                  <p class="text-center">
                    ¡Tus datos han sido actualizados correctamente!
                  </p>
              </div>
            ';
          }else{
            echo '
              <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="text-center">OCURRIO UN ERROR</h4>
                  <p class="text-center">
                    Asegurese que los datos ingresados son validos. Por favor intente nuevamente</p>
                  </p>
              </div>
            '; 
          }
        }
        ?>
        <div class="container">
          <div class="row well">
            <div class="col-sm-3">
              <img src="img/settings.png" alt="Image" class="img-responsive">
            </div>
            <div class="col-sm-9 lead">
              <h2 class="text-info">Bienvenido a la configuración de tu cuenta</h2>
              <p>Aqui puedes <strong>cambiar </strong> tu contraseña </p>
            </div>
          </div><!--Fin row well-->
          
          <div class="row">
            <div class="col-sm-8">
              <div class="panel panel-info">
                <div class="panel-heading text-center"><i class="fa fa-retweet"></i>&nbsp;&nbsp;<strong>Actualizar Contraseña de la cuenta</strong></div>
                <div class="panel-body">
                    <form action="" method="post" role="form">
                    <div class="form-group">
                      <label class="text-primary"><i class="fa fa-male"></i>&nbsp;&nbsp;Nombre completo</label>
                      <input type="text" class="form-control" placeholder="Nombre completo" name="name_complete_update" readonly="" value="<?php echo $_SESSION['nombre_completo']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="text-primary"><i class="fa fa-user"></i>&nbsp;&nbsp;Nombre de usuario</label>
                      <input type="text" class="form-control" placeholder="Nombre de usuario actual" name="old_user_update" readonly="" value="<?php echo $_SESSION['nombre']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="text-primary"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Email</label>
                      <input type="email" class="form-control"  placeholder="Escriba su email" name="email_update" readonly="" value="<?php echo $_SESSION['email']; ?>">
                    </div>
                    <div class="form-group">
                      <label class="text-primary"><i class="fa fa-key"></i>&nbsp;&nbsp;Contraseña actual</label>
                      <input type="password" class="form-control" placeholder="Contraseña actual" name="old_pass_update" required="">
                    </div>
                    <div class="form-group">
                      <label class="text-danger"><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;Contraseña nueva</label>
                      <input type="password" class="form-control" placeholder="Nueva Contraseña" name="new_pass_update" required="">
                    </div>
                    <button type="submit" class="btn btn-info">Actualizar datos</button>
                  </form>
                </div>
              </div>
            </div><!--Fin col 8-->
            <div class="col-sm-4 text-center well">
              <br><br><br><br><br><br><br><br>
              <img src="img/delete_user.png" alt="Image"><br><br><br>
              <!--button class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar cuenta</button-->
              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title text-center text-danger" id="myModalLabel">¿Deseas eliminar tu cuenta?</h4>
                    </div>
                    <form action="" method="post" role="form" style="padding:20px;">
                      <p class="text-warning">Si estas seguro que deseas eliminar tu cuenta por favor introduce tu nombre de usuario y contraseña</p>
                      <div class="input-group input-group-sm">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="usuario_delete" placeholder="Nombre de usuario" required="">
                      </div><br>
                      <div class="input-group input-group-sm">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" name="clave_delete" placeholder="Contraseña" required="">
                      </div><br>
                      
                      <div class="modal-footer">
                       <button type="submit" class="btn btn-danger btn-sm">Eliminar cuenta</button>
                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <br><br><br><br><br><br><br>
            </div>
          </div>
        </div>
<?php
}else{
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="img/SadTux.png" alt="Image" class="img-responsive"/>
                
            </div>
            <div class="col-sm-7 animated flip">
                <h1 class="text-danger">Lo sentimos esta página esta en mantenimiento</h1>
                <h3 class="text-info text-center">No es necesario reportarla ¡Gracias!</h3>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div>
<?php
}
?>
<script>
    $(document).ready(function(){
        $("#input_user").keyup(function(){
          $.ajax({
            url:"./process/val.php?id="+$(this).val(),
            success:function(data){
              $("#com_form").html(data);
            }
          });
        });
    });
</script>