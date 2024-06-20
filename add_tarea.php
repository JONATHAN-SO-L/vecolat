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
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <!--meta http-equiv="Content-type" content="text/html; charset=utf-8" /-->
  
  <title>Servicio</title>
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
	
</style>

  <body style="width: 1200px;">
    
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
      <li class="active">
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
        <li>
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
		<tr>
       <a href="tarea.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
 <tr>
      <button onClick="document.location.reload();" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click Actualizar Datos" HSPACE="10" VSPACE="10"><i class="fa fa-refresh fa-spin  fa-fw"></i>
		<span class="sr-only">Loading...</span></button>
        </tr>
          </td>
       </table>
		
				<!--************************************ Page content******************************-->
		<div class="container" style="width: 1030px;">
          <div class="row" style="width: 770px;">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Adicionar Configuración de Servicio</h1>
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
        <div class="panel-heading text-center"><strong>Para poder Agregar un equipo y sus servicios es necesario llenar los siguientes campos</strong></div>
        <div class="panel-body">
            <form role="form" action="add_tarea2.php" method="POST"">
            			
			
			<div class="form-group">
              <label class="control-label">&nbsp;Empresa</label>
              <select class="form-control" name="empresa" id="empresa">
				<option class="form-control" required="" value="">Seleccionar Empresa</option>
				<?php
								$connect = mysqli_connect("localhost", "veco_dvi", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM empresas Order by razon_social";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['razon_social']; ?>"><?php echo $row['razon_social']; ?></option>
				<?php } ?>
			</select>
            </div>
			
						<div class="form-group">
                            <label class="col-sm-222 control-label">Edificio</label>
                             <select class="form-control" name="edificio" id="edificio">
				<option class="form-control" required="" value="">Seleccionar Edificio</option>
				<?php
								$connect = mysqli_connect("localhost", "veco_dvi", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM edificio";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['descripcion']; ?>"><?php echo $row['descripcion']; ?></option>
				<?php } ?>
			</select>
                        </div>
                    
                        <div class="form-group">
                            <label  class="col-sm-222 control-label">Ubicacion</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <select class="form-control" name="ubicacion" required="">            
										<option value=""></option>                                      
                                        <option value="Azotea">Azotea</option>                               
                                <option value="Mezanine">Mezanine</option>  
                                      </select>
									  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Equipo</label>
                            <select class="form-control" name="equipo" id="equipo">
				<option class="form-control" required="" value="">Seleccionar Equipo</option>
				<?php
								$connect = mysqli_connect("localhost", "veco_dvi", "Vec83Dv19iSa@", "veco_sims_devecchi");
								$query = "SELECT * FROM equipo";
								$result = mysqli_query($connect, $query);
								?>	
				<?php foreach($result as $row){ ?> 
					<option value="<?php echo $row['equipo']; ?>"><?php echo $row['equipo']; ?></option>
				<?php } ?>
			</select>
                        </div>

                        
                        <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Servicio 1</font>
						  <div class="col-sm-110">
                              <div class='input-group'>
                                  <input type="text" class="form-control" readonly="" name="servicio" value="Filtro 1era Etapa">
								  <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div> 
                          </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta1" value="Lectura de Presion (In H2O/Pa)">
									 <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 2</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta2" value="Cambio de Filtros">
									 <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 3</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta3" value="Limpieza">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Servicio 2</font>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" name="servicio2" value="Filtro 2da Etapa">					
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta1_s2" value="Lectura de Presion (In H2O/Pa)">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 2</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control"  name="etiqueta2_s2" value="Cambio de Filtros">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 3</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta3_s2" value="Limpieza">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						
						 <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Servicio 3</font>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" name="servicio3" value="Filtro 3era Etapa">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta1_s3" value="Lectura de Presion (In H2O/Pa)">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 2</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta2_s3" value="Cambio de Filtros">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 3</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input type="text" class="form-control" name="etiqueta3_s3" value="Limpieza">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        
                       
						 <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Servicio 4</font>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" name="servicio4" value="Filtro 4a Etapa">						
                                       <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input type="text" class="form-control" name="etiqueta1_s4" value="Lectura de Presion (In H2O/Pa)">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 2</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input type="text" class="form-control" name="etiqueta2_s4" value="Cambio de Filtros">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 3</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta3_s4" value="Limpieza">
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                       
						 <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Servicio 5</font>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input type="text" class="form-control" readonly="" name="servicio5" value="Motoventilador">									
									<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta1_s5" value="Lectura de Vibracion (Axial)">
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 2</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta2_s5" value="Lectura de Vibracion (Vertical)">
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>&nbsp;Etiquta 3</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta3_s5" value="Lectura de Vibracion (Horizontal)">
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        
						<div class="form-group">
                            <label>&nbsp;Etiquta 4</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta4_s5" value="Limpieza">
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>&nbsp;Etiquta 5</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta5_s5" value="Engrasado de Chumacera">
                                     <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>&nbsp;Etiquta 6</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta6_s5" value="Cambio de Bandas">
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						
						 <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Servicio 6</font>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" name="servicio6" value="Serpentin de Evaporacion">								
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta1_s6" value="Limpieza General">
                                     <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						
						 
					 <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Servicio 8</font>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" name="servicio8" value="Charola de Condensados">				
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label>&nbsp;Etiquta 1</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="etiqueta1_s8" value="Limpieza">
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						
                        <div class="form-group">
                            <font size=4 color="red" FACE="arial"  class="col-sm-222 control-label">&nbsp;Up Time</font>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly="" name="uptime" value="uptime">
                                      <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
						
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" name="boton" class="btn btn-info">Guardar</button>
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
	<script src="/devecchi/ejercicio/Resources/js/empresa.js"></script>
	<script src="/devecchi/ejercicio/Models/empresa.js"></script>
</body>
</html>