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
        //$nombre_reg=MysqlQuery::RequestPost('nom_complete_reg');
        //$user_nomb=MysqlQuery::RequestPost('user_nomb');
       //$clave_reg=md5(MysqlQuery::RequestPost('clave_reg'));
        //$clave_reg2=MysqlQuery::RequestPost('clave_reg');
		
        //$email_reg=MysqlQuery::RequestPost('email_reg');
         //$user_area=MysqlQuery::RequestPost('user_area');
		  //$user_ubicacion=MysqlQuery::RequestPost('ubicacion');
		//$telefono_reg=MysqlQuery::RequestPost('telefono_reg');
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
		if(isset($_POST['area'])){
			$area= $_POST['area'];
		}else{
			$area="";
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
    if(isset($_POST['tipo_usuario'])){
			$tipo_usuario= $_POST['tipo_usuario'];
		}else{
			$tipo_usuario="";
		}
			$from="Soporte Devinsa <tecnicos@veco.mx>";
			 $cabecera="From:".$from;
			  $mensaje=utf8_decode("Estimado usuario ha sido dado de alta en el Portal de Tickets Devinsa,,\r\n Link: https://veco.lat/soporte.php 
			  \r\n Sus credenciales de acceso son: \r\n \r\n Correo: ".$email_reg." \r\n  Contraseña:  ".$clave_reg2." \r\n En cualquier momento puede cambiar su contraseña. \r\n \r\n
          Saludos Cordiales\r\n Área de sistemas \r\n Ext. 250 \r\n   tecnicos@veco.mx \r\n \r\n Por favor, responda de RECIBIDO a este mensaje");
          $mensaje=wordwrap($mensaje, 70, "\r\n");
		  $asunto_admin= "Acceso a Portal de Tickets Devinsa";
         
      if(MysqlQuery::Guardar("usuario_sop", "nombre_usuario, clave, nombre_comp, email_usuario, area, ubicacion, telefono, tipo_usuario", "'$nombre_reg', '$clave_reg', '$user_nomb',  '$email_reg', '$area','$user_ubicacion', '$telefono_reg', '$tipo_usuario'")){
        
		  echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">REGISTRO EXITOSO</h4>
                    <p class="text-center">
                        Cuenta creada exitosamente, ahora puedes iniciar sesin, ya eres usuario.
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
                <h1 class="animated lightSpeedIn">Registro de Usuarios</h1>
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
              <label><i class="fa fa-male"></i>&nbsp;Nombre de Usuario</label>
              <input type="text" id="input_user" class="form-control" name="nom_complete_reg" placeholder="Ejemplo: JULIANRO" required="" title="Nombre de Usuario" maxlength="10">
              <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Nombre Completo <i>(Evita usar acentos)</i></label>
              <input type="text" class="form-control" name="user_nomb" placeholder="Ejemplo: Julian Rodriguez" required=""  title="Nombre y Apellidos" maxlength="50">
            </div>
            <div class="form-group">
              <label><i class="fa fa-envelope"></i>&nbsp;Email</label>
              <input type="email" class="form-control"  name="email_reg" placeholder="email@email.com" required="" value="@veco.mx">
            </div>
            <div class="form-group">
              <label><i class="fa fa-key"></i>&nbsp;Contraseña</label>
              <input type="password" class="form-control" name="clave_reg" placeholder="Ingresa la contraseña del usuario aquí" required="">
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Área</label>
              <select class="form-control" name="area" required="">          
                <option value="">Selecciona un Área</option>
                <option value="Direccion General">Dirección General</option>
                <option value="Gerencia General">Gerencia General</option>
                <option value="Aseguramiento de Calidad">Aseguramiento de la Calidad</option>
                <option value="Desarrollo Organizacional">Desarrollo Organizacional</option>
                <option value="Finanzas">Finanzas - Contabilidad - Cobranza</option>
                <option value="Exportaciones">Exportaciones</option>
                <option value="Planta Equipos">Planta 1</option>
                <option value="Planta Filtros">Planta 2</option>
                <option value="Desarrollo">Desarrollo</option>
                <option value="Proyectos">Proyectos</option>
                <option value="Suministros">Suministros</option>
                <option value="Seguridad e Higiene">Seguridad e Higiene</option>
                <option value="Logistica">Logistica - Tráfico</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Ingenieria">Ingeniería</option>
                <option value="Juridico">Jurídico</option>
                <option value="Servicios">Servicios</option>
                <option value="Sistemas">Sistemas</option>
                <option value="Mercadotecnia">Mercadotecnia</option>
                <option value="Validacion">Validacion</option>
                <option value="Ventas">Comercial - Ventas</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-hospital-o"></i>&nbsp;Ubicación</label>
              <select class="form-control" name="ubicacion" required="">          
                <option value="">Selecciona una Ubicación</option>
                <option value="Oficinas">Oficinas</option>
                <option value="Planta">Planta</option>
              </select>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Teléfono</label>
              <input type="text" id="input_user" class="form-control" name="telefono_reg" placeholder="Ejemplo: XXX-XXX-XX-XX" required="" pattern="[a-zA-Z0-9]{1,15}" title="Ejemplo maximo 15 caracteres" maxlength="15">
              <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Tipo de Usuario</label>
              <select class="form-control" name="tipo_usuario" required>
                <option>Selecciona el tipo de usuario</option>
                <option value="Empleado">Empleado</option>
                <option value="Becario">Becario</option>
              </select>
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