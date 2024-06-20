<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 05/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesión o reanudar la existente.
    session_start();
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="admin"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html>
<head>
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  <meta charset="ISO-8859-1">
  <title>Tickets</title>
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
	@media all and (max-width:1900px){
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
        <a href="ticket_admin_view.php">
          <i class="fa fa-envelope"></i>
          Tickets
        </a>
      </li>
      <li  class="active">
        <a href="ticket_prev_prog.php">
          <i class="fa fa-wrench"></i>
          Mantenimientos
        </a>
      </li>
      <li>
        <a href="admin.php?view=users">
          <i class="fa fa-users"></i>
          Usuarios
        </a>
      </li>
      <li>
        <a href="admin.php?view=admin">
          <i class="fa fa-user"></i>
          Administradores
        </a>
      </li>
      <li>
        <a href="admin.php?view=config">
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
      <li>
        <a href="admin.php?view=equipo">
          <i class="fa fa-desktop"></i>
          Equipos
        </a>
      </li>
      <li>
        <a href="admin.php?view=preventivo">
          <i class="fa fa-calendar"></i>
          Soporte Preventivo
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
	 
<?php
    include './lib/class_mysql.php';
    include './lib/config.php';
    include ("conexi.php");
//if($_SESSION['nombre']!="" && $_SESSION['tipo']=="admin"){
    
	if(isset($_POST['id_edit']) && isset($_POST['observaciones']) && isset($_POST['estado_ticket'])){
		$id_edit=MysqlQuery::RequestPost('id_edit');
		$estado_edit=  MysqlQuery::RequestPost('estado_ticket');
		$solucion_edit=  MysqlQuery::RequestPost('observaciones');
		$fecha_mant=  MysqlQuery::RequestPost('fecha_mant');
		$email=  MysqlQuery::RequestPost('email_ticket');
		$serie_ticket=  MysqlQuery::RequestPost('serie_ticket');
		$radio_email=  MysqlQuery::RequestPost('optionsRadios');

		$from="sistemas@veco.lat";
		$cabecera="From:".$from;
		$asunto="Mantenimiento llevado en tiempo y forma";
		$mensaje_mail="Estimado usuario se ha realizado el mantenimiento correspondiente a su equipo con es la siguientes observaciones: ".$solucion_edit." \r\n \r\n 
		Saludos Cordiales\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático";
		$mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");
		
		 $email_root=" a.lorenzana@devinsa.com";
		 $mensaje_root="Estimado Gerente se ha realizado el mantenimiento correspondiente al ticket #".$serie_ticket." con es las siguientes observaciones: ".$solucion_edit." \r\n \r\n 
		Saludos Cordiales\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático";
		$mensaje_root=wordwrap($mensaje_root, 70, "\r\n");

		if(MysqlQuery::Actualizar("sop_preventivo", "estado_ticket='$estado_edit', observaciones='$solucion_edit', fecha_mant='$fecha_mant'", "id='$id_edit'")){

			echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">Mantenimiento Actualizado</h4>
                    <p class="text-center">
                        El Mantenimiento fue actualizado con exito
                    </p>
                </div>
            ';
			if($radio_email=="option2"){
				mail($email, $asunto, $mensaje_mail, $cabecera);
				mail($email_root, $asunto, $mensaje_root, $cabecera);
			}

		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido actualiza el Mantenimiento
                    </p>
                </div>
            '; 
		}
	}     

	     
	$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM sop_preventivo WHERE id= '$id' ");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>

        <!--************************************ Page content******************************-->
	
<title>Editar Preventivo</title>
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Actualización</h1>
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
            <div class="col-sm-3">
                <img src="./img/Edit.png" alt="Image" class="img-responsive animated tada">
            </div>
            <div class="col-sm-9">
                <a href="ticket_prev_prog.php" class="btn btn-primary btn-sm pull-right"><i class="fa fa-reply"></i>&nbsp;&nbsp;Volver administrar Ticket</a>
            </div>
          </div>
        </div>
            
            
          <div class="container">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" action="" method="POST">
                		<input type="hidden" name="id_edit" value="<?php echo $reg['id']?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="fecha_ticket" readonly="" value="<?php echo $reg['fecha']?>">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Serie</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" type="text" name="serie_ticket" readonly="" value="<?php echo $reg['serie']?>">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                </div>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Estado</label>
                            <div class='col-sm-10'>
                                <div class="input-group">
                                    <select class="form-control" name="estado_ticket">
                                        <option value="<?php echo $reg['estado_ticket']?>"><?php echo $reg['estado_ticket']?> (Actual)</option>
                                        <option value="Programado">Programado</option>
                                        <option value="Resuelto">Resuelto</option>
                                      </select>
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>

                        <!--div class="form-group">
                          <label  class="col-sm-2 control-label">Usuario</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="name_usuario" readonly="" value="<?php echo $reg['nombre_usuario']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div-->
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Equipo</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="name_equipo" readonly="" value="<?php echo $reg['equipo']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="email" readonly="" class="form-control"  name="email_ticket" readonly="" value="<?php echo $reg['email_cliente']?>">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                              </div> 
                          </div>
                        </div>

                        
						
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Asunto</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="asunto_ticket" readonly="" value="<?php echo $reg['asunto']?>">
                                <span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
                              </div> 
                          </div>
                        </div>
                    
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Mantenimiento</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3"  name="mantenimiento" readonly="" required=""><?php echo utf8_decode($reg['mantenimiento'])?></textarea>
                          </div>
                        </div>
						
						<div class="form-group">
                          <label  class="col-sm-2 control-label">Observaciones del mantenimiento</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" rows="3"  name="observaciones" required=""><?php echo utf8_decode($reg['observaciones'])?></textarea>
                          </div>
                        </div>
                        
                        	<div class="form-group">
                          <label  class="col-sm-2 control-label">Fecha Mantenimiento</label>
                          <div class="col-sm-10">
                               <input type="text" readonly="" class="form-control"  name="fecha_mant" readonly="" value="<?php echo date("d/m/Y");?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-2 control-label">Encargado de Mantenimiento:</label>
                          <div class="col-sm-10">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="solucion_admin" readonly="" value="<?php echo $reg['solucion_admin']?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              </div>
                          </div>
                        </div>
						
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Actualizar Mantenimiento</button>
                          </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-sm-offset-5">
								
								<div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option2" checked>
                                         Enviar email de solución del mantenieminto al usuario
                                    </label>
                                 </div>
								 
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option1" >
                                        No enviar email de solución del mantenieminto al usuario
                                    </label>
                                 </div>
                                
                            </div>
                        </div>
                    
                    <br>
                    

                      </form>
            </div><!--col-md-12-->
          </div><!--container-->

 <?php
}else{
	header('Location: soporte.php');
}
?>

<footer></footer>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
	<script src="/devecchi/ejercicio/Resources/js/empresa.js"></script>
	<script src="/devecchi/ejercicio/Models/empresa.js"></script>
</body>
</html>