<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 10/2020 v1
 */
?>
<?php if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="user" ){ ?>

		<style>
.page-header{
display:none;
}
footer {
    display: none;
}
.fa-copyright:before {
    content: "\f1f9";
    display: none;
}
</style>
<?php include "./inc/navbarsop.php"; ?>
<div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="page-header2">
                <h1 class="animated lightSpeedIn">Mis tickets</h1>
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
		
        <div class="container">
          <div class="row">
            <div class="col-sm-2">
                <img src="./img/write_email.png" alt="Image" class="img-responsive animated flipInY">
            </div>
            <div class="col-sm-10">
            <p class="lead text-info">Bienvenido <strong><?php echo $_SESSION['nombre_completo'];?></strong>, en esta página se muestran todos tus tickets registrados en el Sistema.</p>
            </div>
        </div>
        </div>
        
        <br><br>
         <div class="container">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
    <?php
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
     $email= $_SESSION['email'];

	$consulta = "SELECT * from ticket where email_cliente ='$email' ORDER BY serie DESC";
	$resultado = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");

ECHO "<table class='table table-hover table-striped table-bordered'>
<th><center>Ver</center></th>
<th><center>Fecha de Reporte</center></th>
<th><center>Serie / Folio</center></th>
<th><center>Usuario</center></th>
<th><center>Estado</center></th>
<th><center>Tipo de Falla</center></th>
<th><center>Falla Reportada</center></th>
<th><center>Fecha de Solución</center></th>
<th><center>Ingeniero de Soporte</center></th>";

while ($fila = mysqli_fetch_array( $resultado )){
	echo "<tr>";
  echo '<td><center><a href="./lib/Planta_pdf.php?id='.$fila['id'].'" class="btn btn-sm btn-info" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a></center></td>';
  echo " <TD><center>".utf8_decode($fila["fecha"])."</center></TD>";
  echo " <TD><center>".utf8_decode($fila["serie"])."</center></TD>";
  echo " <TD><center>".utf8_decode($fila["nombre_usuario"])."</center></TD>";
  echo " <TD><center>".utf8_decode($fila["estado_ticket"])."</center></TD>";
  echo " <TD><center>".utf8_decode($fila["tipo"])."</center></TD>";
  echo " <TD><center>".utf8_decode($fila["asunto"])."</center></TD>";
  echo " <TD><center>".utf8_decode($fila["fecha_solucion"])."</center></TD>";
  echo " <TD><center>".utf8_decode($fila["observaciones"])."</center></TD>";
     
  echo "</tr>";
}
echo "</table>";


		  ?>
	</div>
                </div>
            </div>
        <?php
}else{
?>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <img src="./img/Stop.png" alt="Image" class="img-responsive animated slideInDown"/><br>
                    <img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
                    
                </div>
                <div class="col-sm-7 animated flip">
                    <h1 class="text-danger">Lo sentimos esta página es solamente para RH de Veco</h1>
                    <h3 class="text-info text-center">Inicia sesión como RH para poder acceder</h3>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
<?php
}
?>