<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 03/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	// if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head><meta charset="gb18030">
  
  <title>Editar Usuario</title>
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
      <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php //echo $_SESSION['nombre']; ?></h4>
    </div>
    <div id="account-actions">
    <a href="checador.php" ><button class="btn btn-success" title="Salir"><i class="fa fa-home"></i></button></a>
        </div>
       
    <ul id="main-nav">
      <li>
        <a href="inicio_admin.php">
          <i class="fa fa-pencil-square"></i>
          Inicio
        </a>
      </li>
	  <li>
        <a href="checador2.php">
          <i class="fa fa-clock-o"></i>
          Checador
        </a>
      </li>
	 <li class="active">
        <a href="usuarios.php">
          <i class="fa fa-user"></i>
        Usuarios
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
       <a href="usuarios.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Editar Usuario</h1>
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
	include ("conexi.php");
	
	 if(isset($_POST['nombre_comp']) && isset($_POST['usuario'])){        
        	if(isset($_POST['id'])){
			$id= $_POST['id'];
		}else{
			$id="";
		}
		if(isset($_POST['nombre_comp'])){
			$nombre_comp= $_POST['nombre_comp'];
		}else{
			$nombre_comp="";
		}
		if(isset($_POST['clave'])){
			$clave= $_POST['clave'];
			$clave2=md5 ($clave);
		}else{
			$clave2="";
		}		 
		if(isset($_POST['usuario'])){
			$usuario= $_POST['usuario'];
		}else{
			$usuario="";
		}
		if(isset($_POST['email'])){
			$email= $_POST['email'];
		}else{
			$email="";
		}
		if(isset($_POST['ip'])){
			$ip= $_POST['ip'];
		}else{
			$ip="";
		}
		
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE usuarios set usuario='$usuario', contrasena='$clave2', nombre_comp='$nombre_comp', email='$email', ip='$ip' WHERE id='$id'"))){
		
			echo  '<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="usuarios.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Usuario GUARDADO</h4>
                    <p class="text-center">
                        El usuario ha sido guardado exitosamente
                    </p>
                </div>
            ';
		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                  <a href="usuarios.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido Actualizar el  usuario
                    </p>
                </div>
            '; 
		}
}
$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM usuarios WHERE id= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
					 <div class="form-group">
                            <label class="col-sm-222 control-label">ID</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" readonly="" class="form-control" name="id" readonly="" value="<?php echo $reg['id']?>">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>						
                		
                       
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Usuario</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" placeholder="Nombre de Usuario" required="" type="text" name="usuario" value="<?php echo utf8_decode($reg['usuario'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Password</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
								  <input type="password" class="form-control" name="clave" required="" placeholder="clave" value="<?php echo utf8_decode($reg['contrasena'])?>">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                          </div>
                        </div>
						
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Completo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Nombre" name="nombre_comp" value="<?php echo utf8_decode($reg['nombre_comp'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Correo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="email" placeholder="Escriba su Correo" name="email" value="<?php echo utf8_decode($reg['email'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Telefono Ip</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" required="" type="text" placeholder="Telefono IP" name="ip" value="<?php echo utf8_decode($reg['ip'])?>">
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
//}else{
	//header('Location: index.php');
//}
?>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
</body>
</html>