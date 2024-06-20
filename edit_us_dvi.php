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
  <title>Editar De Vecchi</title>
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
		@media (min-width: 768px)
.col-sm-222 {
    width: 50%;
}
@media (min-width: 768px)
.col-sm-110 {
    width: 80%;
}
.panel-success>.panel-heading {
    color: #2774e8;
    background-color: #d8e8f0;
    border-color: #c6e9e9;
}
@media (min-width: 768px)
.col-sm-offset-2 {
    margin-left: 10.66666667%;
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
        <li class="active">
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
                <h1 class="animated lightSpeedIn">Editar Usuario Devecchi</h1>
                <span class="label label-danger"></span>
                <p class="pull-right text-primary">
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
        <div class="panel-heading text-center"><strong>Edite la información que se muestra a continuación</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
		
    <?php
	
	include './lib/class_mysql.php';
include './lib/config.php';
/*
if(isset($_POST['nombre_completo']) && isset($_POST['nombre_usuario']) && isset($_POST['email_cliente'])){
		$id_edit=MysqlQuery::RequestPost('id_edit');
		$empresa_id=  MysqlQuery::RequestPost('empresa_id');
		$razon_social=  MysqlQuery::RequestPost('razon_social');
		$nombre_usuario= MysqlQuery::RequestPost('nombre_usuario');
		$clave=  MysqlQuery::RequestPost('clave');
		$clave2=md5 ($clave);
		$nombre=  MysqlQuery::RequestPost('nombre');
		$apellido=  MysqlQuery::RequestPost('apellido');
		$especialidad=  MysqlQuery::RequestPost('especialidad');
		$horario=  MysqlQuery::RequestPost('horario');
		$email_cliente=  MysqlQuery::RequestPost('email_cliente');
		$telefono=  MysqlQuery::RequestPost('telefono');


		//if(MysqlQuery::Actualizar("empresas", "nom_largo='$nom_largo', nom_corto='$nom_corto', telefono='$telefono'", "id='$id_edit'")){
	if(MysqlQuery::Actualizar("usuario", "empresa_id='$empresa_id',razon_social='$razon_social', nombre_usuario='$nombre_usuario', clave='$clave2', nombre='$nombre', apellido='$apellido', especialidad='$especialidad', horario='$horario', email_cliente='$email_cliente', telefono='$telefono'", "id='$id_edit'")){
	
	*/
	include ("conexi.php");
	
	 if(isset($_POST['nombre_usuario']) && isset($_POST['clave'])){ 
		if(isset($_POST['id_edit'])){
			$id_edit= $_POST['id_edit'];
		}else{
			$id_edit="";
		}
		
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
			if(mysqli_query($con,("UPDATE usuario_devecchi set nombre_usuario='$nombre_usuario', clave='$clave2', nombre='$nombre', apellido='$apellido', especialidad='$especialidad', horario='$horario', email_devecchi='$email_devecchi', telefono='$telefono' WHERE id='$id_edit'"))){
		
			echo  '<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="tabla_devecchi.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Usuario GUARDADO</h4>
                    <p class="text-center">
                        El usuario ha sido guardado exitosamente
                    </p>
                </div>
            ';
		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="tabla_devecchi.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido Actualizar el  usuario
                    </p>
                </div>
            '; 
		}
}
$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM usuario_devecchi WHERE id= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
					 <div class="form-group">
                            <label class="col-sm-222 control-label">ID</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" readonly="" class="form-control" name="id_edit" readonly="" value="<?php echo $reg['id']?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>						
                    
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Usuario</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" placeholder="Nombre de Usuario" type="text" name="nombre_usuario" value="<?php echo utf8_encode($reg['nombre_usuario'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Password</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
								  <input type="password" required="" class="form-control" name="clave" placeholder="Contraseña" value="<?php echo utf8_encode($reg['clave'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						 <!--div class="form-group">
                            <label for="logotipo" class="col-sm-222 control-label">Fotografia</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="file" name="fotografia" value="" accept="image/*">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div-->
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Nombre</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Nombre" name="nombre" value="<?php echo utf8_encode($reg['nombre'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Apellido</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Apellido" name="apellido" value="<?php echo utf8_encode($reg['apellido'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Especialidad</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" placeholder="Especialidad" name="especialidad" value="<?php echo utf8_encode($reg['especialidad'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Horario</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" placeholder="Horarios" name="horario" value="<?php echo utf8_encode($reg['horario'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Correo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" ="email" placeholder="Escriba su Correo" name="email_devecchi" value="<?php echo utf8_encode($reg['email_devecchi'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Telefono</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Telefono" name="telefono" value="<?php echo utf8_encode($reg['telefono'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			</fieldset>			
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Guardar</button>
                          </div>
                        </div>
                    <br>
            </form>
            </div><!--col-md-12-->
		</div>
	  </div>
      </div>
	  <?php
}else{
	header('Location: index.php');
}
?>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>