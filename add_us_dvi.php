<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head>
  <meta charset="UTF-8">
  <title>Adicionar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="shortcut icon" href="img/favicon.ico">
  <link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css'>
  <link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
  <script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <script type="text/javascript" src="angular/angular.min.js"></script>
        <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/sweetalert.css">
<script src="js/custom.js"></script>
     <script src="js/sweetalert.min.js"></script>
  
</head>
<style>
    .btn { 
        padding: 10px;
		}
		.btno { 
        padding: 30px;
		}

</style>
  
  <body>
    
<div id="menu-overlay"></div>
<div id="menu-toggle" class="closed" data-title="Menu">
    <i class="fa fa-bars"></i>
    <i class="fa fa-times"></i>
  </div>
<header id="main-header">
  <nav id="sidenav">
    <div id="sidenav-header">
      <div id="profile-picture">
      	<img src="img/owl.png"/>
      </div>
       <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nombre']; ?></h4>
    </div>
    <div id="account-actions">
    <a href="index.php" ><button class="btn btn-success" title="Regresar al incio"><i class="fa fa-home"></i></button></a>
        </div>
       
    <ul id="main-nav">
      <li>
        <a href="inicio.php">
          <i class="fa fa-grav"></i>
          Inicio
        </a>
      </li>
      <li>
        <a href="empresa.php">
          <i class="fa fa-hospital-o"></i>
        Empresa
        </a>
      </li>
      <li>
        <a href="edificio.php">
          <i class="fa fa-university"></i>
          Edificio
        </a>
      </li>
	 
	   <li>
        <a href="ubicacion.php">
          <i class="fa fa-map-marker"></i>
          Ubicación
        </a>
      </li>
	   <li>
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
        </a>
      </li>
      <li>
        <a href="equipo.php">
          <i class="fa fa-cubes"></i>
        Equipo
        </a>
      </li>
      <li>
        <a href="tarea.php">
          <i class="fa fa-cogs"></i>
          Config
        </a>
      </li>
	  <li>
        <a href="seccion_admin.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li>	
	  <li>
        <a href="tabla_servicios.php">
          <i class="fa fa-pencil-square-o"></i>
        Editar Servicio
        </a>
      </li>
		<li>
        <a href="diario_servic.php">
          <i class="fa fa-calendar-check-o"></i>
        Diario
        </a>
      </li>	  
      <li>
        <a href="menu_grafica.php">
          <i class="fa fa-line-chart"></i>
          Grafica
        </a>
      </li>
	   <li  class="active">
        <a href="tabla_usuarios.php">
          <i class="fa fa-user"></i>
          Usuario
        </a>
		 </li>
	      </ul>
  </nav>
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>
<section id="content">
  <header id="content-header">
  
  <table>  
    <td>
		<tr>
       <a href="tabla_devecchi.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Adicionar Usuario Devecchi</h1>
                <span class="label label-danger"></span>
                <p class="pull-right text-primary">
               </p>
              </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->

<?php
 include ("conexi.php");
 
 if(isset($_POST['nombre_usuario']) && isset($_POST['clave'])){        

        if(isset($_POST['nombre_usuario'])){
			$nombre_usuario= $_POST['nombre_usuario'];
		}else{
			$nombre_usuario="";
		}
		if(isset($_POST['clave'])){
			$clave= $_POST['clave'];
			$clave2=md5 ($clave);
		}else{
			$clave2="";
		}
		if(isset($_POST['nombre'])){
			$nombre= $_POST['nombre'];
		}else{
			$nombre="";
		}
		if(isset($_POST['apellido'])){
			$apellido= $_POST['apellido'];
		}else{
			$apellido="";
		}
		if(isset($_POST['especialidad'])){
			$especialidad= $_POST['especialidad'];
		}else{
			$especialidad="";
		}
		if(isset($_POST['horario'])){
			$horario= $_POST['horario'];
		}else{
			$horario="";
		}
		if(isset($_POST['email_devecchi'])){
			$email_devecchi= $_POST['email_devecchi'];
		}else{
			$email_devecchi="";
		}
		if(isset($_POST['telefono'])){
			$telefono= $_POST['telefono'];
		}else{
			$telefono="";
		}
		
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO usuario_devecchi(nombre_usuario, clave, nombre, apellido, especialidad, horario, email_devecchi, telefono)VALUES('$nombre_usuario','$clave2','$nombre','$apellido','$especialidad','$horario','$email_devecchi','$telefono')"))){
			
            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="tabla_devecchi.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Usuario GUARDADO</h4>
                    <p class="text-center">
                        El usuario ha sido guardada exitosamente
                    </p>
                </div>
            ';

          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="tabla_devecchi.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido guardar el usuario. Por favor intente nuevamente.
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

<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder registrar un usuario nuevo debes de llenar todos los campos de este formulario</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
			
             <div class="form-group">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Nombre de Usuario</label>
              <input type="text" id="input_user" class="form-control" name="nombre_usuario" placeholder="Nombre de usuario" required=""  maxlength="10">
              <div id="com_form"></div>
            </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Password</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
								  <input type="password" class="form-control" required="" name="clave" placeholder="Contraseña" value="">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Nombre</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" required=""  placeholder="Nombre" name="nombre" value="" maxlength="30">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Apellido</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" required=""  placeholder="Apellido" name="apellido" value="" maxlength="30">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Especialidad</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" placeholder="Especialidad" name="especialidad" maxlength="30"value="" maxlength="30">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Horario</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" placeholder="Horarios" name="horario" value="" maxlength="100">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Correo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="email" placeholder="Escriba su Correo" required="" name="email_devecchi" value="" maxlength="100">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Telefono</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" placeholder="Telefono" required="" name="telefono" value="" maxlength="50">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Guardar</button>
                          </div>
                        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
}else{
	header('Location: index.php');
}
?>
<script>
    $(document).ready(function(){
        $("#input_user").keyup(function(){
            $.ajax({
                url:"./process/val_devecchi.php?id="+$(this).val(),
                success:function(data){
                    $("#com_form").html(data);
                }
            });
        });
    });
</script>