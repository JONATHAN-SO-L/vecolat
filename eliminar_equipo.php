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
  <title>Eliminar Equipo</title>
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
    width: 100%;
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
      <li class="active">
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
    <td>
		<tr>
       <a href="equipo.php" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	   </tr>
	</td>
	   </table>
		<!--************************************ Page content******************************-->
		<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Borrar Equipo</h1>
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
        <div class="panel-heading text-center"><strong>Verifique información del resgistro a borrar</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
		
    <?php
	
	include './lib/class_mysql.php';
include './lib/config.php';
if(isset($_POST['equipo']) && isset($_POST['id_edit']) && isset($_POST['equipo'])){
		$id_edit=MysqlQuery::RequestPost('id_edit');
		$descripcion=  MysqlQuery::RequestPost('equipo');
		$area_id=  MysqlQuery::RequestPost('area_id');
		$edificio_id=  MysqlQuery::RequestPost('edificio_id');

	if(isset($_POST['equipo']) && isset($_POST['equipo'])){
          $empresa_delete=MysqlQuery::RequestPost('equipo');
          $corto_delete=MysqlQuery::RequestPost('equipo');
         
          $sql=Mysql::consulta("SELECT * FROM equipo WHERE equipo= '$empresa_delete' AND equipo='$corto_delete'");

          if(mysqli_num_rows($sql)>=1){
             MysqlQuery::Eliminar("equipo", "equipo='$empresa_delete' and equipo='$corto_delete'");
			 
			 echo 
			 '<script language="javascript">
				alert("Equipo Eliminado");
				window.location.href="equipo.php"</script>';
          }else{
            echo'
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <a href="equipo.php"><button type="button" class="close"  data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCURRIÓ UN ERROR</h4>
                    <p class="text-center">
                        No hemos podido eliminar el equipo por que los datos son incorrectos
                    </p>
                </div>
            '; 
          }
        }
}
$id = MysqlQuery::RequestGet('id');
	$sql = Mysql::consulta("SELECT * FROM equipo WHERE id_equipo= '$id'");
	$reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);

?>
					<form action="" method="POST" style="display: inline-block;">
	  <fieldset>
                		<input type="hidden" name="id_edit" value="<?php echo $reg['id_equipo']?>">
						
                        <div class="form-group">
                            <label class="col-sm-222 control-label">Empresa</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
							  <?php
							  $sql2 = Mysql::consulta("SELECT * FROM equipo inner join empresas on equipo.empresa_id=empresas.id 
							  inner join edificio on equipo.edificio_id=edificio.id_edificio
							  inner join ubicacion on equipo.ubicacion_id=ubicacion.id_ubicacion
							  inner join area on equipo.area_id=area.id_area WHERE id_equipo= '$id'");
								$registro=mysqli_fetch_array($sql2, MYSQLI_ASSOC);
								?>
                                <input type="text" class="form-control" readonly="" name="empresa_id" value="<?php echo utf8_decode($registro['razon_social'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Edificio</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="edificio_id" value="<?php echo utf8_decode($registro['descripcion'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Ubicación</label>
                             <div class="col-sm-110">
                              <div class='input-group'>
                                <input type="text" class="form-control" readonly="" name="edificio_id" value="<?php echo utf8_decode($registro['ubicacion'])?>">
                                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                              </div>
                          </div>
                        </div>
						
						 <div class="form-group">
                            <label>&nbsp;Área</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                    <input class="form-control" readonly="" name="area_id" value="<?php echo utf8_decode($reg['area'])?>.  Con prioridad: <?php echo $reg['prioridad']; ?>">
									  <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-sm-222 control-label">Número de Serie</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" readonly="" type="text" placeholder="Descripción" name="equipo" value="<?php echo utf8_decode($reg['equipo'])?>">
								   <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        
							<div class="form-group">
                    <label class="col-sm-222 control-label">Flujo de aire a manejar (CFM)</label>
                        <div class='col-sm-110'>
                        <div class="input-group">
                        <input class="form-control" type="text" readonly="" name="cfm_equipo" value="<?php echo utf8_decode($reg['cfm_equipo'])?>">
				  	   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                        </div>
                    </div>
            </div>	
						
						
						<font size=4 color="blue" FACE="arial" class="col-sm-222 control-label">Filtro 1era Etapa</font>
			<br>		
				<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="vel_filtro_f1" value="<?php echo utf8_decode($reg['vel_filtro_f1'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>	
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="area_filt_f1" value="<?php echo utf8_decode($reg['area_filt_f1'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f1" value="<?php echo utf8_decode($reg['modelo_f1'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" name="alto_f1" readonly="" value="<?php echo utf8_decode($reg['alto_f1'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" name="frente_f1" readonly="" value="<?php echo utf8_decode($reg['frente_f1'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" name="fondo_f1" readonly="" value="<?php echo utf8_decode($reg['fondo_f1'])?>">
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f1" value="<?php echo utf8_decode($reg['um_f1'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="pz_f1" value="<?php echo utf8_decode($reg['pz_f1'])?>" >
              </div>
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f1" value="<?php echo utf8_decode($reg['cfm_filtro_f1'])?>">
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f1" value="<?php echo utf8_decode($reg['cfm_fil_fab_f1'])?>">
              </div>
              </div>   
              
			  <br><br><br><br><br>
			  
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			  <div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f1_2" value="<?php echo utf8_decode($reg['modelo_f1_2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f1_2" value="<?php echo utf8_decode($reg['alto_f1_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f1_2" value="<?php echo utf8_decode($reg['frente_f1_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f1_2" value="<?php echo utf8_decode($reg['fondo_f1_2'])?>">
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f1_2" value="<?php echo utf8_decode($reg['um_f1_2'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f1_2" value="<?php echo utf8_decode($reg['pz_f1_2'])?>" >
              </div>
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f1_2" value="<?php echo utf8_decode($reg['cfm_filtro_f1_2'])?>">
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f1_2" value="<?php echo utf8_decode($reg['cfm_fil_fab_f1_2'])?>">
              </div>
              </div>   
              
			 <br><br><br><br><br>
			  
			  <div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f1_3" value="<?php echo utf8_decode($reg['modelo_f1_3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="alto_f1_3" value="<?php echo utf8_decode($reg['alto_f1_3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="frente_f1_3" value="<?php echo utf8_decode($reg['frente_f1_3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="fondo_f1_3" value="<?php echo utf8_decode($reg['fondo_f1_3'])?>">
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f1_3" value="<?php echo utf8_decode($reg['um_f1_3'])?>">
              </div>
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f1_3" value="<?php echo utf8_decode($reg['pz_f1_3'])?>">
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f1_3" value="<?php echo utf8_decode($reg['cfm_filtro_f1_3'])?>" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f1_3" value="<?php echo utf8_decode($reg['cfm_fil_fab_f1_3'])?>">
              </div>
              </div> 
            <br><br><br><br><br>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_ini_wg_f1" value="<?php echo utf8_decode($reg['sp_ini_wg_f1'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_can_wg_f1" value="<?php echo utf8_decode($reg['sp_can_wg_f1'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			  <font size=4 color="blue" FACE="arial" background="green" class="col-sm-222 control-label">Filtro 2da Etapa</font>
			<br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly=""name="vel_filtro_f2" value="<?php echo utf8_decode($reg['vel_filtro_f2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>		
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="area_filt_f2" value="<?php echo utf8_decode($reg['area_filt_f2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f2" value="<?php echo utf8_decode($reg['modelo_f2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f2" value="<?php echo utf8_decode($reg['alto_f2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f2" value="<?php echo utf8_decode($reg['frente_f2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f2" value="<?php echo utf8_decode($reg['fondo_f2'])?>">
              </div>	
				<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
				 <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f2" value="<?php echo utf8_decode($reg['um_f2'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f2" value="<?php echo utf8_decode($reg['pz_f2'])?>" >
              </div>
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f2" value="<?php echo utf8_decode($reg['cfm_filtro_f2'])?>">
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f2" value="<?php echo utf8_decode($reg['cfm_fil_fab_f2'])?>">
              </div>
              </div>   
              <br><br><br><br><br>
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f2_2" value="<?php echo utf8_decode($reg['modelo_f2_2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f2_2" value="<?php echo utf8_decode($reg['alto_f2_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f2_2" value="<?php echo utf8_decode($reg['frente_f2_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f2_2" value="<?php echo utf8_decode($reg['fondo_f2_2'])?>">
              </div>	
				<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f2_2" value="<?php echo utf8_decode($reg['um_f2_2'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f2_2" value="<?php echo utf8_decode($reg['pz_f2_2'])?>" >
              </div>			
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f2_2" value="<?php echo utf8_decode($reg['cfm_filtro_f2_2'])?>" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f2_2" value="<?php echo utf8_decode($reg['cfm_fil_fab_f2_2'])?>">
              </div>
              </div>  
              
		<br><br><br><br><br>
			
			  <div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f2_3" value="<?php echo utf8_decode($reg['modelo_f2_3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="alto_f2_3" value="<?php echo utf8_decode($reg['alto_f2_3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="frente_f2_3" value="<?php echo utf8_decode($reg['frente_f2_3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="fondo_f2_3" value="<?php echo utf8_decode($reg['fondo_f2_3'])?>">
              </div>
					<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f2_3" value="<?php echo utf8_decode($reg['um_f2_3'])?>">
              </div>
				 <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f2_3" value="<?php echo utf8_decode($reg['pz_f2_3'])?>">
              </div>	
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f2_3" value="<?php echo utf8_decode($reg['cfm_filtro_f2_3'])?>" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f2_3" value="<?php echo utf8_decode($reg['cfm_fil_fab_f2_3'])?>">
              </div>
              </div> 
            <br><br><br><br><br>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_ini_wg_f2" value="<?php echo utf8_decode($reg['sp_ini_wg_f2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_can_wg_f2" value="<?php echo utf8_decode($reg['sp_can_wg_f2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			 <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			<font size=4 color="blue" FACE="arial" background="green" class="col-sm-222 control-label">Filtro 3era Etapa</font>
			<br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="vel_filtro_f3" value="<?php echo utf8_decode($reg['vel_filtro_f3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly=""  name="area_filt_f3" value="<?php echo utf8_decode($reg['area_filt_f3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f3" value="<?php echo utf8_decode($reg['modelo_f3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f3" value="<?php echo utf8_decode($reg['alto_f3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f3" value="<?php echo utf8_decode($reg['frente_f3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f3" value="<?php echo utf8_decode($reg['fondo_f3'])?>">
              </div>
				<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f3" value="<?php echo utf8_decode($reg['um_f3'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f3" value="<?php echo utf8_decode($reg['pz_f3'])?>" >
              </div>			  
              </div>   
              <br><br><br><br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f3_2" value="<?php echo utf8_decode($reg['modelo_f3_2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f3_2" value="<?php echo utf8_decode($reg['alto_f3_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f3_2" value="<?php echo utf8_decode($reg['frente_f3_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f3_2" value="<?php echo utf8_decode($reg['fondo_f3_2'])?>">
              </div>
				<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f3_2" value="<?php echo utf8_decode($reg['um_f3_2'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f3_2" value="<?php echo utf8_decode($reg['pz_f3_2'])?>" >
              </div>			  
               <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f3_2" value="<?php echo utf8_decode($reg['cfm_filtro_f3_2'])?>" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f3_2" value="<?php echo utf8_decode($reg['cfm_fil_fab_f3_2'])?>">
              </div>
              </div>
              <br><br><br><br><br>
              <div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_ini_wg_f3" value="<?php echo utf8_decode($reg['sp_ini_wg_f3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_can_wg_f3" value="<?php echo utf8_decode($reg['sp_can_wg_f3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
			  <font size=4 color="blue" FACE="arial" background="green" class="col-sm-222 control-label">Filtro 4ta Etapa</font>
			<br>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Velocidad paso por filtro</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="vel_filtro_f4" value="<?php echo utf8_decode($reg['vel_filtro_f4'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>	
				<div class="form-group">
                            <label class="col-sm-222 control-label">Area Filtracion(ft)</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="area_filt_f4" value="<?php echo utf8_decode($reg['area_filt_f4'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			<div class="form-group">
                            <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f4" value="<?php echo utf8_decode($reg['modelo_f4'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f4" value="<?php echo utf8_decode($reg['alto_f4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f4" value="<?php echo utf8_decode($reg['frente_f4'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f4" value="<?php echo utf8_decode($reg['fondo_f4'])?>">
              </div>	
				<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f4" value="<?php echo utf8_decode($reg['um_f4'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f4" value="<?php echo utf8_decode($reg['pz_f4'])?>" >
              </div>			  
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f4" value="<?php echo utf8_decode($reg['cfm_filtro_f4'])?>" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f4" value="<?php echo utf8_decode($reg['cfm_fil_fab_f4'])?>">
              </div>
              </div>   
			  <br><br><br><br><br>
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
				<div class="form-group">
                        <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                              <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f4_2" value="<?php echo utf8_decode($reg['modelo_f4_2'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                            </div>
                </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f4_2" value="<?php echo utf8_decode($reg['alto_f4_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f4_2" value="<?php echo utf8_decode($reg['frente_f4_2'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f4_2" value="<?php echo utf8_decode($reg['fondo_f4_2'])?>">
              </div>	
				<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f4_2" value="<?php echo utf8_decode($reg['um_f4_2'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f4_2" value="<?php echo utf8_decode($reg['pz_f4_2'])?>" >
              </div>			  
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f4_2" value="<?php echo utf8_decode($reg['cfm_filtro_f4_2'])?>" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f4_2" value="<?php echo utf8_decode($reg['cfm_fil_fab_f4_2'])?>">
              </div>
              </div>
              
               <br><br><br><br><br>
			  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
				<div class="form-group">
                        <label class="col-sm-222 control-label">Modelo</label>
                            <div class='col-sm-110'>
                              <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="modelo_f4_3" value="<?php echo utf8_decode($reg['modelo_f4_3'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              </div>
                            </div>
                </div>
			
			<div class="form-group">
              <font size=3 color="red" FACE="arial"  class="col-sm-222 control-label">Medidas:</font>
			  <br>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Alto:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="alto_f4_3" value="<?php echo utf8_decode($reg['alto_f4_3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Frente:</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="frente_f4_3" value="<?php echo utf8_decode($reg['frente_f4_3'])?>">
              </div>
                        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Fondo</font>
              <div class="col-sm-2">
                  <input type="number" class="form-control" readonly="" name="fondo_f4_3" value="<?php echo utf8_decode($reg['fondo_f4_3'])?>">
              </div>	
				<font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">UM</font>
              <div class="col-sm-2">
                  <input type="text" class="form-control" readonly="" name="um_f4_3" value="<?php echo utf8_decode($reg['um_f4_3'])?>">
              </div>
			   <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">Pz</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="pz_f4_3" value="<?php echo utf8_decode($reg['pz_f4_3'])?>" >
              </div>			  
              <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/Filtro</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_filtro_f4_3" value="<?php echo utf8_decode($reg['cfm_filtro_f4_3'])?>" >
              </div>
			  <font size=2 color="blue" FACE="arial"  class="col-sm-2 control-label">CFM/ Filtro a 500</font>
              <div class="col-sm-2">
                  <input type="text" readonly="" class="form-control" name="cfm_fil_fab_f4_3" value="<?php echo utf8_decode($reg['cfm_fil_fab_f4_3'])?>">
              </div>
              </div>
             <br><br><br><br><br>			  
			<div class="form-group">
                            <label class="col-sm-222 control-label">SP Inicial "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_ini_wg_f4" value="<?php echo utf8_decode($reg['sp_ini_wg_f4'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-222 control-label">SP Cambio "W.G"</label>
                            <div class='col-sm-110'>
                                <div class="input-group">
                                   <input class="form-control" type="text" readonly="" name="sp_can_wg_f4" value="<?php echo utf8_decode($reg['sp_can_wg_f4'])?>">
								   <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                </div>
                            </div>
                        </div>
			</fieldset>	
			
			        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
						  <div class="form-group">
                          <label  class="col-sm-222 control-label text-center"> *Confirme borrado de registro* </label>
                        </div>   
                <input type="hidden" name="id_edit" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"> Borrar</i></button>
				 </div>
                        </div>
            </form>
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