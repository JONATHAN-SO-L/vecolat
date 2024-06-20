<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 06/2021 v1
 */
 ?>
<?php
//include ("conexi.php");
//if(isset($_SESSION['nombre']) && isset($_SESSION['tipo'])){

    if(isset($_POST['user_nomb']) && isset($_POST['clave_reg']) && isset($_POST['nom_complete_reg'])){
        if(isset($_POST['nom_complete_reg'])){
			$nombre_reg= $_POST['nom_complete_reg'];
		}else{
			$nombre_reg="";
		}	
		if(isset($_POST['user_nomb'])){
			$user_nomb= $_POST['user_nomb'];
		}else{
			$user_nomb="";
		}
		if(isset($_POST['clave_reg'])){
			$clave_reg2= $_POST['clave_reg'];
		}else{
			$clave_reg2="";
		}
		$clave_reg=md5 ($clave_reg2);
		
		if(isset($_POST['email_reg'])){
			$email_reg= $_POST['email_reg'];
		}else{
			$email_reg="";
		}
		if(isset($_POST['user_area'])){
			$user_area= $_POST['user_area'];
		}else{
			$user_area="";
		}
		if(isset($_POST['ubicacion'])){
			$user_ubicacion= $_POST['ubicacion'];
		}else{
			$user_ubicacion="";
		}
		if(isset($_POST['telefono_reg'])){
			$telefono_reg= $_POST['telefono_reg'];
		}else{
			$telefono_reg="";
		}
			
    $cabecera="From: Soporte Devinsa <sistemas@veco.lat>";
    
			  $mensaje="Estimado usuario ha sido dado de alta en el portal Devinsa,\r\n Link: https://veco.lat/soporte.php 
			  \r\n Sus credenciales son: \r\n \r\n Correo: ".$email_reg." \r\n  Contraseña:  ".$clave_reg2." \r\n En cualquier momento puede cambiar su contraseña. \r\n \r\n
          Saludos Cordiales\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
Por favor, NO responda a este mensaje, es un envío automático";
          $mensaje=wordwrap($mensaje, 70, "\r\n");
		  $asunto_admin= "Acceso a Portal de Soporte";
         
        if(MysqlQuery::Guardar("usuario_rh", "nombre_usuario, clave, nombre_comp, email_usuario, area, ubicacion, telefono", "'$nombre_reg', '$clave_reg', '$user_nomb',  '$email_reg', '$user_area','$user_ubicacion', '$telefono_reg'")){

		  echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">REGISTRO EXITOSO</h4>
                    <p class="text-center">
                        Cuenta creada exitosamente, ahora puedes iniciar sesión, ya eres usuario.
                    </p>
                </div>
            ';
            
            mail($email_reg, $asunto_admin, $mensaje, $cabecera);
            
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
                <h1 class="animated lightSpeedIn">Registro de Usuarios para Recursos Humanos</h1>
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
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder registrar un usuario nuevo debes de llenar todos los campos de este formulario</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
			
			
            <div class="form-group">
              <label><i class="fa fa-male"></i>&nbsp;Nombre Usuario</label>
              <input type="text" id="input_user" class="form-control" name="nom_complete_reg" placeholder="Nombre de usuario" required="" title="Nombre de Usuario" maxlength="10">
             <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Nombre Completo</label>
              <input type="text" class="form-control" name="user_nomb" placeholder="Nombre completo" required=""  title="Nombre y Apellidos" maxlength="50">
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
              <input type="text" id="input_user" class="form-control" name="user_area" placeholder="Area" required="" title="Maximo 30 caracteres" maxlength="30">
              <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-hospital-o"></i>&nbsp;Ubicacion</label>
                <select class="form-control" name="ubicacion" required="">          
						<option value=""></option>									
                        <option value="Oficinas">Oficinas</option>
                        <option value="Planta">Planta</option>
                </select>
             </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Telefono</label>
              <input type="text" id="input_user" class="form-control" name="telefono_reg" placeholder="Telefono de usuario" required="" pattern="[a-zA-Z0-9]{1,15}" title="Ejemplo maximo 15 caracteres" maxlength="15">
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