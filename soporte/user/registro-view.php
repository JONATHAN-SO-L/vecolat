<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<?php
//include ("conexi.php");
//if(isset($_SESSION['nombre']) && isset($_SESSION['tipo'])){

    if(isset($_POST['user_nomb']) && isset($_POST['clave_reg']) && isset($_POST['nom_complete_reg'])){
        $nombre_reg=MysqlQuery::RequestPost('nom_complete_reg');
        $user_nomb=MysqlQuery::RequestPost('user_nomb');
       //$clave_reg=md5(MysqlQuery::RequestPost('clave_reg'));
        $clave_reg2=MysqlQuery::RequestPost('clave_reg');
		$clave_reg=md5 ($clave_reg2);
        $email_reg=MysqlQuery::RequestPost('email_reg');
         $user_area=MysqlQuery::RequestPost('user_area');
		$telefono_reg=MysqlQuery::RequestPost('telefono_reg');
         
        if(MysqlQuery::Guardar("usuario_sop", "nombre_usuario, clave, nombre_comp, email_usuario, area, telefono", "'$nombre_reg', '$clave_reg', '$user_nomb',  '$email_reg', '$user_area', '$telefono_reg'")){

		  echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">REGISTRO EXITOSO</h4>
                    <p class="text-center">
                        Cuenta creada exitosamente, ahora puedes iniciar sesión, ya eres usuario.
                    </p>
                </div>
            ';
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        ERROR AL REGISTRARSE: Por favor intente nuevamente.
                    </p>
                </div>
            '; 
        }
    }
?>

<style>
.page-header{
display:none;
}

</style>


        <!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Registro de Usuarios</h1>
                <span class="label label-danger">Veco S.A de C.V</span>
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
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder registrar un usuario nuevo debes de llenar todos los campos de este formulario</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
			
			
            <div class="form-group">
              <label><i class="fa fa-male"></i>&nbsp;Nombre Usuario</label>
              <input type="text" id="input_user" class="form-control" name="nom_complete_reg" placeholder="Nombre de usuario" required="" pattern="[a-zA-Z ]{1,40}" title="Nombre de Usuario" maxlength="40">
             <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Nombre Completo</label>
              <input type="text" class="form-control" name="user_nomb" placeholder="Nombre completo" required=""  title="Nombre Apellido" maxlength="50">
            </div>
            <div class="form-group">
              <label><i class="fa fa-key"></i>&nbsp;Contraseña</label>
              <input type="password" class="form-control" name="clave_reg" placeholder="Contraseña" required="">
            </div>
            <div class="form-group">
              <label><i class="fa fa-envelope"></i>&nbsp;Email</label>
              <input type="email" class="form-control"  name="email_reg"  placeholder="Escriba su email" required="">
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Area</label>
              <input type="text" id="input_user" class="form-control" name="user_area" placeholder="Area" required="" pattern="[a-zA-Z0-9]{1,15}" title="Ejemplo7 maximo 15 caracteres" maxlength="20">
              <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Telefono</label>
              <input type="text" id="input_user" class="form-control" name="telefono_reg" placeholder="Telefono de usuario" required="" pattern="[a-zA-Z0-9]{1,15}" title="Ejemplo7 maximo 15 caracteres" maxlength="20">
              <div id="com_form"></div>
            </div>
            <button type="submit" class="btn btn-danger">Crear cuenta</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-4 text-center hidden-xs">
      <img src="img/linux.png" class="img-responsive" alt="Image">
      <h2 class="text-primary">¡Gracias! Por preferirnos</h2>
    </div>

  </div>
</div>

<?php
//}else{
?>
    <!--div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                
            </div>
            <div class="col-sm-7 text-center">
                <h1 class="text-danger">Lo sentimos esta página es solamente para Administradores de Devecchi</h1>
                <h3 class="text-info">Inicia sesión para poder acceder</h3>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div-->
<?php
//}
?>

<script>
    $(document).ready(function(){
        $("#input_user").keyup(function(){
            $.ajax({
                url:"./process2/val.php?id="+$(this).val(),
                success:function(data){
                    $("#com_form").html(data);
                }
            });
        });
    });
</script>