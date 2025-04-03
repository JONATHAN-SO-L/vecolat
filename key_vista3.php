<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 12/2020 v1
 */
header('Content-Type: text/html; charset=UTF-8');
    //Iniciar una nueva sesi鐠愮珱 o reanudar la existente.
    session_start();
    require ('./inc/timezone.php');
	 if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="devecchi"){ 
?>
<!DOCTYPE html>
<?php include "./inc/links.php"; ?> 
<html >
<head><meta charset="gb18030">
  
  <title>Key</title>
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
      <li class="active">
        <a href="key_dvi.php">
          <i class="fa fa-key"></i>
          Claves
        </a>
      </li>
      <li class="active">
        <a href="key_vista3.php">
          <i class="fa fa-key"></i>
          Selección de día y mes
        </a>
      </li>
    </ul>
  </nav>
 
  <div id="header_logo">
    <a href=""></a>
  </div>
</header>



<section id="content">
    
  	<!--************************************ Page content******************************-->
		<div class="container" style="width:1180px;">
          <div class="row">
            <div class="col-sm-12">
           <div class="page-header2">
				
                <h1 class="animated lightSpeedIn">Introduzca C&oacute;digo</h1>
                <span class="label label-danger"></span> 		 
				<p class="pull-right text-primary"></p>
		   </div>
            </div>
          </div>
        </div>
		<!--************************************ Page content******************************-->
    <?php //echo date("h:i A"); ?>    
	<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong></strong></div>
        <div class="panel-body">
            <form role="form" action="key_vista4.php" method="POST">
			
            <div class="form-group">
              <label class="control-label"><i class="fa fa-sort-numeric-desc"></i>&nbsp;C&oacute;digo</label>
              <td>
		 <div class="form-group">
			  <br>
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Dia</font>
              <div class="col-sm-2">
                  <select class="form-control" name="dia" required="">             
						<option value=""></option>
						                <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                  </select>
              </div>
			<font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Mes</font>
              <div class="col-sm-2">
                  <select class="form-control" name="mes" required="">             
						<option value=""></option>
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                  </select>
              </div>
        <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Hora</font>
              <div class="col-sm-2">
                  <select class="form-control" name="hora" required="">             
						<option value=""></option>
						                <option value="1">1 AM</option>
                                        <option value="2">2 AM</option>
                                        <option value="3">3 AM</option>
                                        <option value="4">4 AM</option>
                                        <option value="5">5 AM</option>
                                        <option value="6">6 AM</option>
                                        <option value="7">7 AM</option>
                                        <option value="8">8 AM</option>
                                        <option value="9">9 AM</option>
                                        <option value="10">10 AM</option>
                                        <option value="11">11 AM</option>
                                        <option value="12">12 PM</option>
                                        <option value="13">13 PM</option>
                                        <option value="14">14 PM</option>
                                        <option value="15">15 PM</option>
                                        <option value="16">16 PM</option>
                                        <option value="17">17 PM</option>
                                        <option value="18">18 PM</option>
                                        <option value="19">19 PM</option>
                                        <option value="20">20 PM</option>
                                        <option value="21">21 PM</option>
                                        <option value="22">22 PM</option>
                                        <option value="23">23 PM</option>
                                        <option value="24">24 PM</option>
                  </select>
              </div>
			</div>
              
              <div class="form-group">
			  <br>
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">Letra</font>
              <div class="col-sm-2">
                  <select class="form-control" name="letra" required="">             
						<option value=""></option>
						                <option value="0">A_</option>
                                        <option value="1">B_</option>
                                        <option value="2">C_</option>
                                        <option value="3">D_</option>
                                        <option value="4">E_</option>
                                        <option value="5">F_</option>
                                        <option value="6">G_</option>
                                        <option value="7">H_</option>
                                        <option value="8">I_</option>
                  </select>
              </div>
			<div class="form-group">
              <font size=3 color="blue" FACE="arial"  class="col-sm-2 control-label">C&#243;digo</font>
              <div class="col-sm-2">
                  <input type="text" id="input_user" required="" class="form-control" name="codigo" placeholder="Introduzca c贸digo" required=""  maxlength="4">
              </div>
            </div>
			</div>
              <br><br>
              <div id="com_form"></div>
						<div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <button type="submit" class="btn btn-info">Generar Password</button>
                          </div>
                    
                    </div>
         </form>
        </div>
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