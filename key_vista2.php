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
				
                <h1 class="animated lightSpeedIn">Tu Password es: </h1>
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
            <form role="form" action="key_vista.php" method="POST">
			
                        
            <?php
        //date_default_timezone_set('America/Mexico_City');
        
        $seed1 = $_POST['letra'];
        $seed2 = $_POST['codigo'];
         $seed = $seed1 .$seed2;
               // $seed = 6868;
		$mes = date("m");
		$dia = date("d");
		$hora = date("H");
		//$mes = 02;
		//$dia =24;
		//$hora =10;
		$token;
		$mTmpShift;
       
        
//        load time stamp
        $mParam[0] = $hora % 10; //10= 1
        $mParam[1] = $hora / 10; //10= 1
        $mParam[2] = $dia % 10;	//24= 2.4
        $mParam[3] = $dia / 10;	//24= 2.4
        $mParam[4] = $mes % 10;//03= 0.3
        $mParam[5] = $mes / 10;//03= 0.3
//        load seed = 6868 
        $mIdValue[5] = $seed / 100000;		//0.06868
        $mIdValue[4] = ($seed / 10000) % 10;	//0.06868
        $mIdValue[3] = ($seed / 1000) % 10;	//0.6868
        $mIdValue[2] = ($seed / 100) % 10;	//6.868
        $mIdValue[1] = ($seed / 10) % 10;		//68.68
        $mIdValue[0] = $seed % 10;			//686.8
//        Generate shifting based on cross references
        $mTmpShift = 0xFF & ($mParam[0] % 8);	// 0.08
        $mParam[5] = 0xFF & (($mParam[5] << $mTmpShift) | ($mParam[5] >> (8 - $mTmpShift)));// 0.3 << 0.08 | 0.3 >> (8- 0.08) 7.92
        $mParam[3] = 0xFF & (($mParam[3] >> $mTmpShift) | ($mParam[3] << (8 - $mTmpShift)));// 2.4 >> 0.08 | 2.4 << (8- 0.08) 7.92
        $mParam[1] = 0xFF & (($mParam[1] << $mTmpShift) | ($mParam[1] >> (8 - $mTmpShift)));//   1 << 0.08 | 1 >> (8- 0.08)	 7.92

        $mTmpShift = 0xFF & ($mParam[2] % 8);// 0.192
        $mParam[4] = 0xFF & (($mParam[4] << $mTmpShift) | ($mParam[4] >> (8 - $mTmpShift)));// 0.3 << 0.192 | 0.3 >> (8- 0.192) 7.808
        $mParam[2] = 0xFF & (($mParam[2] >> $mTmpShift) | ($mParam[2] << (8 - $mTmpShift)));// 2.4 >> 0.192 | 2.4 << (8- 0.192) 7.808
        $mParam[0] = 0xFF & (($mParam[0] << $mTmpShift) | ($mParam[0] >> (8 - $mTmpShift)));//   1 << 0.192 | 1 >> (8- 0.192)   7.808

        $mTmpShift = 0xFF & ($mParam[4] % 8);// 0.024
        $mParam[5] = 0xFF & (($mParam[5] << $mTmpShift) | ($mParam[5] >> (8 - $mTmpShift)));// 0.3 << 0.192 | 0.3 >> (8- 0.024) 7.976
        $mParam[2] = 0xFF & (($mParam[2] >> $mTmpShift) | ($mParam[2] << (8 - $mTmpShift)));// 2.4 >> 0.192 | 2.4 << (8- 0.024) 7.976
        $mParam[1] = 0xFF & (($mParam[1] << $mTmpShift) | ($mParam[1] >> (8 - $mTmpShift)));//   1 << 0.192 | 1 >> (8- 0.024)   7.976

//        Mix shifted day data and seed
        for ($mTmpShift = 0; $mTmpShift < 6; $mTmpShift++) {
            $mParam[$mTmpShift] += $mIdValue[$mTmpShift];
        }

        // Final digits calculation
        $mIdValue[5] = 0xFF & (($mParam[0]) % 10); // 0.1
        $mIdValue[4] = 0xFF & ((($mParam[5] << 5) | ($mParam[5] >> (8 - 5))) % 10); // 0.3 << 5 | 0.3 >> (3) =0.3
        $mIdValue[3] = 0xFF & ((($mParam[2] >> 2) | ($mParam[2] << (8 - 2))) % 10); // 2.4 >> 2 | 2.4 << (6) =0.6
        $mIdValue[2] = 0xFF & ((($mParam[3] << 3) | ($mParam[3] >> (8 - 3))) % 10); // 2.4 << 3 | 2.4 >> (4) =0.4
        $mIdValue[1] = 0xFF & ((($mParam[4] >> 4) | ($mParam[4] << (8 - 4))) % 10); // 0.3 >> 4 | 0.3 << (4) =0.4
        $mIdValue[0] = 0xFF & ((($mParam[1] << 1) | ($mParam[1] >> (8 - 1))) % 10); //   1 << 1 |   1 >> (7) =0.7

        $mToken  = $mIdValue[5] * 100000;	//0.00008
        $mToken += $mIdValue[4] * 10000;	//0.0000
        $mToken += $mIdValue[3] * 1000;	//0.006
        $mToken += $mIdValue[2] * 100;	//0.04
        $mToken += $mIdValue[1] * 10;		//0.4
        $mToken += $mIdValue[0];			//4
        // Resultado de la app = 806444
        //echo "Password = " .$mToken;
                   //Mostramos la contraseña generada
                   
                
                ?>
                <div class="form-group">
              <label class="control-label"><i class="fa fa-sort-numeric-desc"></i>&nbsp;Password generado</label>
              <input type="text" id="input_user" readonly="" class="form-control" name="codigo" readonly="" value="<?php echo $mToken;?>">
              <div id="com_form"></div>
            </div>
						<div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10 text-center">
                              <!--a href="key_vista.php" ><button type="submit" class="btn btn-info">Regresar</button-->
                              <a href="key_vista.php" ><button type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center">&nbsp;&nbsp;Regresar</button></a>
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