<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 05/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="superoot"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
  <title>Equipos</title>
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
  <script src="js/jquery-1.9.1.min.js"></script>
</head>
<style>
    .btn { 
        padding: 10px;
		}
		table {
    background-color: #91bad152;
}		
	@media (min-width: 768px){
	.busc_dato{
    float: right;
    margin-right: -5%;
}
	}
	@media all and (max-width:2400px){
  #main-header {
    left:0px;
  }
  body.open-menu {
    overflow-x:hidden;
    overflow-y:auto;
  }
  .open-menu #main-header {
    left:300px;
  }
 
  #menu-overlay {
    height:100%;
    position:fixed;
    top:0;
    right:0;
    left:100%;
    background:transparent;
    z-index:499;
  }
  .open-menu #menu-overlay {
    left:300px;
    background:rgba(255,255,255,.9);
  }
  #content {
    position:relative;
    left:0;
  }
  .open-menu #content {
    left:300px;
  }
  #sidenav {
    left:-300px;
  }
  .open-menu #sidenav {
    left:0;
  }
  #account-actions {
    left:0;
    top:100px;
    width:100%;
  }
  #menu-toggle {
    width:40px;
    height:40px;
    line-height:5px;
    border-radius:0 5px 5px 0;
    font-size:20px;
  }
  #main-header {
    position: fixed;
    height: 50px;
    box-shadow: 0 1px 0 #f1f1f1;
    background-color: #337ab7;
}
  .open-menu #menu-toggle {
    left:300px;
    color:#0f92d1;
  }
  #content {
    padding:10px 30px 30px 30px;
  }
  #main-nav {
    margin:1px 0 0 0;
  }
  #account-actions {
    padding:0px 0 0 25px;
    background:#337ab7;
    height:65px;
  }
  #account-actions a {
    color:#69c0ea;
  }
  #account-actions a:hover {
    color:white;
  }
  #content-header {
    width:calc(100% + 60px);
    height:193px;
    margin:-30px 0 0 -30px;
    background:white;
    padding:30px;
  }
  #tabs ul {
    width:calc(100% + 60px);
    margin:0 0 30px -30px;
  }
  #tabs li {
    margin:0 30px 0 0;
  }

  #tabs li:first-of-type {
    margin:0 30px 0 30px;
  }
  .tab-target {
    padding:0 50px 50px 50px;
  }
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
      	<img src="img/root.png"/>
      </div>
       <a href="#" id="profile-link"><h4>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['nombre']; ?></h4>
    </div>
    <!--div id="account-actions">
    <a href="soporte.php" ><button class="btn btn-success" title="Regresar al incio"><i class="fa fa-home"></i></button></a>
        </div-->
       
    <ul id="main-nav">
      <li>
        <a href="ticket.php">
          <i class="fa fa-envelope"></i>
          Tickets
        </a>
      </li>
      <li>
        <a href="ticket_mant.php">
          <i class="fa fa-wrench"></i>
          Mantenimientos
        </a>
      </li>
      <li>
        <a href="ticket_usuarios.php">
          <i class="fa fa-users"></i>
          Usuarios
        </a>
      </li>
      <li>
        <a href="ticket_admin.php">
          <i class="fa fa-user"></i>
          Administradores
        </a>
      </li>
      <li>
        <a href="ticket_root_config.php">
          <i class="fa fa-cogs"></i>
          Configuracion
        </a>
      </li>
      <li>
        <a href="./soporte.php?view=registro">
          <i class="fa fa-users"></i>
          Registrar Usuario
        </a>
      </li>
      <li class="active">
        <a href="ticket_add_equi.php">
          <i class="fa fa-desktop"></i>
          Equipos
        </a>
      </li>
      <li>
        <a href="ticket_preventivo.php">
          <i class="fa fa-calendar"></i>
          Soporte Preventivo
        </a>
      </li>
      <li>
        <a href="./process/logouti.php">
          <i class="fa fa-power-off"></i>
         Cerrar sesión
        </a>
      </li>
    </ul>
  </nav>
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>  
<section id="content">	
<!--a href="soporte.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a-->
	 
  <header id="content-header">
      <table>  
    <td>
		<tr>
       <a href="ticket_add_equi.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
  	<!--************************************ Page content******************************-->
		<div class="container" >
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Equipos</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
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
 
 if(isset($_POST['nombre_comp']) && isset($_POST['ubicacion'])){ 
        if(isset($_POST['id_edit'])){
			$id_edit= $_POST['id_edit'];
		}else{
			$id_edit="";
		}
		$nombre_comp= $_POST['nombre_comp'];
		$ubicacion= $_POST['ubicacion'];
		
		if(isset($_POST['equipo'])){
			$equipo= $_POST['equipo'];
		}else{
			$equipo="";
		}
		if(isset($_POST['num_serie'])){
			$num_serie= $_POST['num_serie'];
		}else{
			$num_serie="";
		}
		if(isset($_POST['marca'])){
			$marca= $_POST['marca'];
		}else{
			$marca="";
		}
		if(isset($_POST['tipo'])){
			$tipo= $_POST['tipo'];
		}else{
			$tipo="";
		}
		if(isset($_POST['procesador'])){
			$procesador= $_POST['procesador'];
		}else{
			$procesador="";
		}
		if(isset($_POST['sis_ope'])){
			$sis_ope= $_POST['sis_ope'];
		}else{
			$sis_ope="";
		}
		if(isset($_POST['disco'])){
			$disco= $_POST['disco'];
		}else{
			$disco="";
		}
		if(isset($_POST['ram'])){
			$ram= $_POST['ram'];
		}else{
			$ram="";
		}
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE equipo_usuario set equipo='$equipo',num_serie='$num_serie',marca='$marca',tipo='$tipo',procesador='$procesador',sis_ope='$sis_ope',disco='$disco',
			ram='$ram'	WHERE id_eq_us ='$id_edit' "))){
		
		
			echo  '<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="ticket_add_equi.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Cambios Guardados</h4>
                    <p class="text-center">
                        Favor de verificar antes de CERRAR esta ventana
                    </p>
                </div>
            ';
		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="ticket_add_equi.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido Actualizar el equipo
                    </p>
                </div>
            '; 
		}
}
$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM equipo_usuario WHERE id_eq_us= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
	      	<input type="hidden" readonly="" name="id_edit" readonly="" value="<?php echo $reg['id_eq_us']?>">
							<!--input type="hidden" readonly="" name="id_edit" readonly="" value="<?php echo $id?>"-->
							
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Nombre Completo</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="nombre_comp" value="<?php echo utf8_decode($reg['nombre_comp'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-sm-222 control-label">Área</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="area" value="<?php echo utf8_decode($reg['area'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Ubicación</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="ubicacion" value="<?php echo utf8_decode($reg['ubicacion'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Email</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="email_usuario" value="<?php echo utf8_decode($reg['email_usuario'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Equipo</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="equipo" value="<?php echo utf8_decode($reg['equipo'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Número Serie</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="num_serie" value="<?php echo utf8_decode($reg['num_serie'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Marca</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="marca" value="<?php echo utf8_decode($reg['marca'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Tipo</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="tipo" value="<?php echo utf8_decode($reg['tipo'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Procesador</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="procesador" value="<?php echo utf8_decode($reg['procesador'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Sistema Operativo</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="sis_ope" value="<?php echo utf8_decode($reg['sis_ope'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Disco</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="disco" value="<?php echo utf8_decode($reg['disco'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                              </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Ram</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" name="ram" value="<?php echo utf8_decode($reg['ram'])?>">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
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
          </div><!--container-->
		</div>
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