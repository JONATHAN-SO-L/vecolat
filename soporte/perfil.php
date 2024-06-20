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
  <title>Perfil</title>
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
      	<img src="img/owl.jpg"/>
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
      <li  class="active">
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
        <a href="area.php">
          <i class="fa fa-rss-square"></i>
          Área
        </a>
      </li>
	   <li>
        <a href="ubicacion.php">
          <i class="fa fa-map-marker"></i>
          Ubicación
        </a>
      </li>
      <li>
        <a href="equipo.php">
          <i class="fa fa-cubes"></i>
        Equipo
        </a>
      </li>
	  <li>
        <a href="seccion.php">
          <i class="fa fa-pie-chart"></i>
        Sección
        </a>
      </li>
	  <li>
        <a href="componente.php">
          <i class="fa fa-codepen"></i>
        Componente
        </a>
      </li>
	   <li>
        <a href="instrumento.php">
          <i class="fa fa-tachometer"></i>
        Instrumento
        </a>
      </li>
	  <li>
        <a href="tarea.php">
          <i class="fa fa-cogs"></i>
          Servicio
        </a>
      </li>
	  <li>
        <a href="./index.php?view=soporte">
          <i class="fa fa-file-archive-o"></i>
        Incidencia
        </a>
      </li>
        <li>
        <a href="tabla_usuarios.php">
          <i class="fa fa-user"></i>
          Usuario
        </a>
		 </li>
	  <li>
        <a href="new_incidencia.php">
          <i class="fa fa-handshake-o"></i>
          Pru Incidencia
        </a>
      </li>
	   <li>
        <a href="list_incidencia.php">
          <i class="fa fa-list"></i>
          Lista Incidencia
        </a>
      </li>
    </ul>
  </nav>
  
 <?php
 include './lib/class_mysql.php';
include './lib/config.php';

$nombre = MysqlQuery::RequestGet('nombre');
	$sql = Mysql::consulta("SELECT * FROM administrador WHERE nombre= '$nombre'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
 
 <div class="row"><!-- .row -->
                <div class="col-md-4">
                    <div class="image view view-first">
                        <img class="thumb-image" style="width: 100%; display: block;" src="images/profiles/<?php echo $nombre ?>"" alt="image">
                    </div>
                        <span class="btn btn-my-button btn-file" style="width: 345px; margin-top: 5px;">
                            <form method="post" id="formulario" enctype="multipart/form-data">
                            Cambiar Imagen de perfil: <input type="file" name="file">
                            </form>
                        </span>
                        <div id="respuesta"></div>
                    <br>
                </div> 
                <div class="col-md-2"></div>
                <div class="col-md-6">
                <!-- <div id="result"></div> -->
                    <div class="box box-primary"><!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Datos Personales: </h3>
                        </div> <!-- /.box-header -->
                        <form role="form" method="post" action="action/updprofile2.php"><!-- form start -->
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="fullname">Nombre Completo</label>
                                    <input name="fullname" type="text" class="form-control" id="fullname" value="<?php echo $fullname ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input name="email" type="email" class="form-control" id="email" value="<?php echo $email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Contraseña Actual</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="*******">
                                </div>
                                <div class="form-group">
                                    <label for="new_password">Nueva Contraseña</label>
                                    <input name="new_password" type="password" class="form-control" placeholder="*******" id="new_password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_new_password">Confirmar Nueva Contraseña</label>
                                    <input name="confirm_new_password" type="password" class="form-control" placeholder="*******" id="confirm_new_password">
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button name="token" type="submit" class="btn btn-success">Actualizar Datos</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.row -->
			
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