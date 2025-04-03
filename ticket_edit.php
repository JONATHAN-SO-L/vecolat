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
       
    <ul id="main-nav">
      <li  class="active">
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
      <li>
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
</header>
<section id="content">
      
      <table>  
    <td>
		<tr>
       <a href="ticket.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Editar Tickets</h1>
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


		include ("conexi.php");
 
 if(isset($_POST['email_cliente']) && isset($_POST['estado_ticket'])){ 
			
		if(isset($_POST['id'])){
			$id= $_POST['id'];
		}else{
			$id="";
		}
		
        	if(isset($_POST['admin_solucion'])){
			$admin_solucion= $_POST['admin_solucion'];
		}else{
			$admin_solucion="";
		}
		if(isset($_POST['estatus_ticket'])){
			$estatus= $_POST['estatus_ticket'];
		}else{
			$estatus="";
		}
		if(isset($_POST['fecha'])){
			$fecha= $_POST['fecha'];
		}else{
			$fecha="";
		}
		if(isset($_POST['email_cliente'])){
			$email_cliente= $_POST['email_cliente'];
		}else{
			$email_cliente="";
		}
		if(isset($_POST['estado_ticket'])){
			$estado_edit= $_POST['estado_ticket'];
		}else{
			$estado_edit="";
		}
		if(isset($_POST['solucion'])){
			$solucion_edit= $_POST['solucion'];
		}else{
			$solucion_edit="";
		}
		if(isset($_POST['fecha_solucion'])){
			$solucion_fecha= $_POST['fecha_solucion'];
		}else{
			$solucion_fecha="";
		}
		if(isset($_POST['observaciones'])){
			$solucion_usuario= $_POST['observaciones'];
		}else{
			$solucion_usuario="";
		}
		
		$serie=$_POST['serie'];
		$from="sistemas@veco.lat";
		$cabecera="From:".$from;
		$asunto= "Seguimiento de Ticket";
		$mensaje_mail="Estimado usuario, se ha solucionado su ticket \r\n la solucion es la siguiente : ".$solucion_edit."\r\n \r\n
		Saludos Cordiales.\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, responda a este mensaje de la solución aprobado";
		$mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");
		
		$status_mail="Estimado usuario, se ha revisado su ticket \r\n el Estatus es el siguiente : ".$estatus."\r\n \r\n 
		Saludos Cordiales\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático";
		$status_mail=wordwrap($status_mail, 70, "\r\n");
		
		$email_root=" a.lorenzana@devinsa.com";
		$asunto_root="Ticket resuelto";
		$mensaje_root="Estimado Gerente \r\n El ticket ".$serie_ticket."  ha sido resuelto por  ".$solucion_usuario."\r\n \r\n
		Saludos Cordiales.\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático";
        
        $mensaje_root_status="Estimado Gerente \r\n El ticket ".$serie_ticket."  ha sido revisado por  ".$solucion_usuario."\r\n 
        el Estatus es el siguiente : ".$estatus."\r\n \r\n
		Saludos Cordiales.\r\n Área de sistemas \r\n sistemas@veco.mx \r\n \r\n 
        Por favor, NO responda a este mensaje, es un envío automático";

			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE ticket set estado_ticket='$estado_edit', estatus='$estatus', solucion='$solucion_edit', fecha_solucion='$solucion_fecha', observaciones='$solucion_usuario'
			WHERE id ='$id'"))){
		
        // mail($admin_solucion, $asunto, $mensaje_mail, $cabecera);
		
			echo  '<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="ticket.php" class="alert-link"><span aria-hidden="true">Cerrar</span></a>
                    <h4 class="text-center">Cambios Guardados</h4>
                    <p class="text-center">
                        El correo se ha enviado con exito al Administrador asignado favor de CERRAR esta ventana
                    </p>
                </div>
            ';
            
			if($radio_email=="option2"){
			//	mail($email_root, $asunto, $mensaje_root, $cabecera);
			//	mail($email, $asunto, $mensaje_mail, $cabecera);
			}
			if($radio_email=="option1"){
			//	mail($email_root, $asunto, $mensaje_root_status, $cabecera);
			//	mail($email, $asunto, $status_mail, $cabecera);
			}
		}else{
			echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="area.php"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido Actualizar el ticket.
                    </p>
                </div>
            '; 
		}
}
$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
	  <fieldset>
                		<input type="hidden" readonly="" name="id" readonly="" value="<?php echo $reg['id']?>">
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Fecha</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
							  <?php
							  $sql2 = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
								$reg2=mysqli_fetch_array($sql2, MYSQLI_ASSOC);
								?>
                                <input type="text" class="form-control" readonly="" name="fecha" readonly="" value="<?php echo utf8_decode($reg2['fecha'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Email</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="email_cliente" readonly="" value="<?php echo utf8_decode($reg2['email_cliente'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Usuario</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" readonly="" type="text" name="nombre_usuario" readonly="" value="<?php echo utf8_decode($reg['nombre_usuario'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Area</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" name="area" readonly="" value="<?php echo utf8_decode($reg['area'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Equipo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" name="equipo" readonly="" value="<?php echo utf8_decode($reg['equipo'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Tipo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" name="tipo" readonly="" value="<?php echo utf8_decode($reg['tipo'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Serie</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" name="serie" readonly="" value="<?php echo utf8_decode($reg['serie'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Estado</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="estado_ticket">
                                        <option value="<?php echo $reg['estado_ticket']?>"><?php echo $reg['estado_ticket']?> (Actual)</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="En proceso">En proceso</option>
                                        <option value="Requisicion de compra">Requisición de compra</option>
                                        <option value="Resuelto">Resuelto</option>
                                      </select>
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Asunto</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" readonly="" name="asunto" value="<?php echo utf8_decode($reg['asunto'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        
                         <div class="form-group">
                          <label  class="col-sm-222 control-label">Mensaje</label>
                          <div class="col-sm-110">
                              <textarea class="form-control" readonly="" rows="3"  name="mensaje_ticket" readonly=""><?php echo utf8_decode($reg['mensaje'])?></textarea>
                          </div>
                        </div>
                        
                       
                        
			<br>
			            <div class="form-group">
                          <label  class="col-sm-222 control-label">Seguimiento</label>
                          <div class="col-sm-110">
                            <textarea class="form-control" rows="3" title="Favor de introducir Mayusculas y Minusculas" name="estatus_ticket" ><?php echo utf8_decode($reg['estatus'])?></textarea>
                          </div>
                        </div>
                        
            <br>
                        
                         <div class="form-group">
                          <label  class="col-sm-222 control-label">Solucion</label>
                          <div class="col-sm-110">
                              <textarea class="form-control" rows="3" title="Favor de introducir Mayusculas y Minusculas" name="solucion" ><?php echo utf8_decode($reg['solucion'])?></textarea>
                          </div>
                        </div>
                        
                        <!--div class="form-group">
                            <label class="col-sm-222 control-label">Fecha de Solucion</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" readonly="" name="fecha_solucion" value="<?php echo utf8_decode($reg['fecha_solucion'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Quien resolvio</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control"  type="text" readonly="" readonly="" name="observaciones" value="<?php echo utf8_decode($reg['observaciones'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div-->
                        
                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Fecha Solucion</label>
                          <div class="col-sm-110">
                            <input class="form-control" rows="1"  name="fecha_solucion" readonly="" required="" value="<?php echo date("d/m/Y");?>">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label  class="col-sm-222 control-label">Resuelto por:</label>
                          <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" readonly="" class="form-control"  name="observaciones" readonly="" value="<?php echo $_SESSION['nombre_completo'];?>">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
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
                    <div class="row">
                            <div class="col-sm-offset-5">
								
								<div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option1" checked>
                                         Enviar estatus al Usuario y Gerente
                                    </label>
                                 </div>
								 
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" value="option2" >
                                        Enviar Solucion al Usuario y Gerente
                                    </label>
                                 </div>
                                
                            </div>
                        </div>
            </form>
            </div><!--col-md-12-->
          </div><!--container-->
		</div>
	  </div>
      </div>
    </div>
      
      
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