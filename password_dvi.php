<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="devecchi"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head>
  <meta charset="UTF-8">
  <title>Cambio Password</title>
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
    <a href="./process/logout.php" ><button class="btn btn-success" title="Regresar al incio"><i class="fa fa-home"></i></button></a>
        </div>
       
    <ul id="main-nav">
      <li>
        <a href="inicio_dvi_user.php">
          <i class="fa fa-grav"></i>
          Inicio
        </a>
      </li>
      <li>
        <a href="seccion.php">
          <i class="fa fa-wrench"></i>
        Servicio
        </a>
      </li> 
      <li>
        <a href="diario_servic_dvi.php">
          <i class="fa fa-calendar-check-o"></i>
        Diario
        </a>
      </li>	
	  <li>
        <a href="menu_grafica_dvi.php">
          <i class="fa fa-line-chart"></i>
        Grafica
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
       <a href="./process/logout.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Cambiar Contraseña</h1>
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
			if(isset($_POST['editar'])){
			$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	$mysqli = new mysqli('localhost', "veco", "Vec83Dv19iSa@", 'veco_sims_devecchi');
	
			$passActual = $mysqli->real_escape_string($_POST['passActual']);
			$pass1 = $mysqli->real_escape_string($_POST['pass1']);
			$pass2 = $mysqli->real_escape_string($_POST['pass2']);
			
			$passActual = md5($passActual);
			$pass1 = md5($pass1);
			$pass2 = md5($pass2);
			
			$sqlA = $mysqli->query("SELECT clave FROM usuario_devecchi WHERE nombre_usuario ='".$_SESSION['nombre']."' ");			
			$rowA = $sqlA ->fetch_array();
			
			if($rowA['clave'] == $passActual){
				if($pass1 == $pass2){
					$update = $mysqli->query("update usuario_devecchi set clave = '$pass1' WHERE nombre_usuario ='".$_SESSION['nombre']."' ");
					if($update){
						echo "Se ha actualizado la contraseña";
					}
				}else{
				echo "Las contraseñas no coinciden";
				}
			}else{
			echo "Tu contraseña actual no coincide";
			}
		}
?>
			 
		<div class="form-group">
               <label class="col-sm-222 control-label">Contraseña Actual</label>
                <div class="col-sm-110">
                    <div class='input-group'>
                        <input type="password" class="form-control" name="passActual"  placeholder="Password Actual" required="">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                    </div>
                </div>
        </div>
						
		<div class="form-group">
               <label class="col-sm-222 control-label">Contraseña Nueva</label>
                <div class="col-sm-110">
                    <div class='input-group'>
                        <input type="password" class="form-control" name="pass1"  placeholder="Nueva Password" required="">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                    </div>
                </div>
        </div>
		
		<div class="form-group">
               <label class="col-sm-222 control-label">Repetir Contraseña Nueva</label>
                <div class="col-sm-110">
                    <div class='input-group'>
                        <input type="password" class="form-control" name="pass2"  placeholder="Confirmar Password" required="">
                        <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                    </div>
                </div>
        </div>
       
            <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10 text-center">
                <input class="btn btn-info" type="submit" name="editar" value="Cambiar Password">
            </div>
			</div>
        </form>
    </div>
	</div><!--col-md-12-->
          </div><!--container-->
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