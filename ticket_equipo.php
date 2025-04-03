<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
?>
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
<head><meta charset="gb18030">
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  
  <title>Equipo</title>
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
        <a href="root.php?view=ticketroot">
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
        <a href="root.php?view=users">
          <i class="fa fa-users"></i>
          Todos los Usuarios
        </a>
      </li>
      <li>
        <a href="ticket_root_config.php">
          <i class="fa fa-cogs"></i>
          Configuracion
        </a>
      </li>
      <li class="active" >
        <a href="root.php?view=equipo">
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

<style>
.page-header{
display:none;
}
</style>
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>
		
		<script language="javascript">
			$(document).ready(function(){
				$("#usuario_id").change(function () {
					$("#usuario_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_soporte_usuario.php", { id: id }, function(data){
							$("#email_reg").html(data);
						});            
					});
				})
			});
			$(document).ready(function(){
				$("#usuario_id").change(function () {
					$("#usuario_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_soporte_usnom.php", { id: id }, function(data){
							$("#usuario").html(data);
						});            
					});
				})
			});
			$(document).ready(function(){
				$("#usuario_id").change(function () {
					$("#usuario_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_soporte_usarea.php", { id: id }, function(data){
							$("#area").html(data);
						});            
					});
				})
			});
			$(document).ready(function(){
				$("#usuario_id").change(function () {
					$("#usuario_id option:selected").each(function () {
						id = $(this).val();
						$.post("get_soporte_usubi.php", { id: id }, function(data){
							$("#ubicacion").html(data);
						});            
					});
				})
			});
			
		</script>
 <!--/////////////////////////////////////////////////////////-->
 
 
<header id="content-header">
        <!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Registro de Equipos de Usuarios</h1>
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
                
            </div>
            <div class="col-sm-9">
                <a href="ticket_add_equi.php" class="btn btn-danger btn-sm pull-right"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;Extraer Archivo</a>
            </div>
          </div>
        </div>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para poder registrar un Equipo de algun usuario nuevo debes de llenar todos los campos de este formulario</strong></div>
        <div class="panel-body">
            <form role="form" action="add_equipo_soporte.php" method="POST">
			
			
            <div><label><i class="fa fa-user"></i>&nbsp;Usuario</label>
						<select class="form-control" name="usuario_id" id="usuario_id">
				<option class="form-control" required="" value="0">Seleccionar Usuario</option>
				<?php
								$connect = mysqli_connect("localhost","veco", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM usuario_sop Order by nombre_comp ASC";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['id']; ?>"><?php echo $row['nombre_comp']; ?></option>
				<?php } ?>
            </select>
            </div>
            <br>
           
			<div><label><i class="fa fa-user"></i>&nbsp;Nombre</label>
			<select class="form-control" required="" name="usuario" id="usuario" readonly="" ></select></div>
			<br>
			<div><label><i class="fa fa-envelope"></i>&nbsp;Email</label>
			<select class="form-control" required="" name="email_reg" id="email_reg" readonly="" ></select></div>
			<br>
			<div><label><i class="fa fa-hospital-o"></i>&nbsp;Area</label>
			<select class="form-control" required="" name="area" id="area" readonly="" ></select></div>
			<br>
			<div><label><i class="fa fa-hospital-o"></i>&nbsp;Ubicacion</label>
			<select class="form-control" required="" name="ubicacion" id="ubicacion" readonly="" ></select></div>
			<br>
            <div class="form-group">
              <label class="control-label">&nbsp;Equipo</label>
              <input type="text" class="form-control" name="equipo" placeholder="Equipo a su cargo" required="" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;No. Serie</label>
              <input type="text" class="form-control" name="num_serie" placeholder="# Serie Calidad" required="" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Marca</label>
              <input type="text" class="form-control" name="marca" placeholder="Marca" required="" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Tipo</label>
              <input type="text" class="form-control" name="tipo" placeholder="Tipo" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Procesador</label>
              <input type="text" class="form-control" name="procesador" placeholder="Procesador"  maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Sistema Operativo</label>
              <input type="text" class="form-control" name="sis_ope" placeholder="Escriba el S.O" maxlength="50">
             </div>
             
             <div class="form-group">
              <label class="control-label">&nbsp;Disco Duro</label>
              <input type="text" class="form-control" name="disco" placeholder="Disco duro del Equipo"  maxlength="20">
             </div>
             
              <div class="form-group">
              <label class="control-label">&nbsp;Ram</label>
              <input type="text" class="form-control" name="ram" placeholder="Ram del Equipo"  maxlength="50">
             </div>
            
            <button type="submit" class="btn btn-danger">Asignar Equipo</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-4 text-center hidden-xs">
      <img src="img/equipos.png" class="img-responsive" alt="Image">
      <h2 class="text-primary">¡Control de Equipos!</h2>
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