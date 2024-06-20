<?php 
session_start();
include "./inc/navbarsop.php"; 
//Iniciar una nueva sesión o reanudar la existente.

if( $_SESSION['nombre']!="" && $_SESSION['clave']!="" && $_SESSION['tipo']=="user"){ 
	
	include ("conexi.php");
	header('Content-Type: text/html; charset=UTF-8');
	
	if(isset($_POST['fecha_ticket']) && isset($_POST['name_ticket'])){
		
		$ubicacion=$_POST['ubicacion'];
		$tipo_falla = $_POST['tipo'];
		
		////////////////////////////////////////////////////////////////////////////
		switch ($ubicacion) {
			case 'Oficinas':
			if ($tipo_falla = 'Hardware') {
				$codigo = ""; 
				$longitud = 2; 
				for ($i=1; $i<=$longitud; $i++){ 
					$numero = rand(0,100); 
					$codigo .= $numero; 
				} 
				$num=Mysql::consulta("SELECT * FROM ticket WHERE serie LIKE '%VEC000%'");
				$numero_filas = mysqli_num_rows($num);
				$numero_filas_total=$numero_filas+1;
				$id_ticket="VEC000".$numero_filas_total;

				//mail($email_oficinas, $asunto_admin, $mensaje_admin, $cabecera);

			} elseif ($tipo_falla = 'Software') {
				$codigo = ""; 
				$longitud = 2; 
				for ($i=1; $i<=$longitud; $i++){ 
					$numero = rand(0,100); 
					$codigo .= $numero; 
				} 
				$num=Mysql::consulta("SELECT * FROM ticket WHERE serie LIKE '%VEC000%'");
				$numero_filas = mysqli_num_rows($num);
				$numero_filas_total=$numero_filas+1;
				$id_ticket="VEC000".$numero_filas_total;

				//mail($email_software, $asunto_admin, $mensaje_admin, $cabecera);
			}
			break;
			
			case 'Planta':
			if ($tipo_falla = 'Hardware') {
				$codigo = ""; 
				$longitud = 2; 
				for ($i=1; $i<=$longitud; $i++){ 
					$numero = rand(0,100); 
					$codigo .= $numero; 
				} 
				$num=Mysql::consulta("SELECT * FROM ticket WHERE serie LIKE '%VEC000%'");
				$numero_filas = mysqli_num_rows($num);
				$numero_filas_total=$numero_filas+1;
				$id_ticket="VEC000".$numero_filas_total;

				//mail($email_planta, $asunto_admin, $mensaje_admin, $cabecera);

			} elseif ($tipo_falla = 'Software') {
				$codigo = ""; 
				$longitud = 2; 
				for ($i=1; $i<=$longitud; $i++){ 
					$numero = rand(0,100); 
					$codigo .= $numero; 
				} 
				$num=Mysql::consulta("SELECT * FROM ticket WHERE serie LIKE '%VEC000%'");
				$numero_filas = mysqli_num_rows($num);
				$numero_filas_total=$numero_filas+1;
				$id_ticket="VEC000".$numero_filas_total;

				//mail($email_software, $asunto_admin, $mensaje_admin, $cabecera);
			}
			break;
		}
		
		
		///////////////////////////////////////////////////////////////////////////
		
		$estado_ticket="Pendiente";
		if(isset($_POST['hora_ticket'])){
			$hora_ticket= $_POST['hora_ticket'];
		}else{
			$hora_ticket="";
		}
		if(isset($_POST['fecha_ticket'])){
			$fecha_ticket= $_POST['fecha_ticket'];
		}else{
			$fecha_ticket="";
		}
		if(isset($_POST['fecha2_ticket'])){
			$fecha2_ticket= $_POST['fecha2_ticket'];
		}else{
			$fecha2_ticket="";
		}
		if(isset($_POST['equipo_ticket'])){
			$equipo_ticket= $_POST['equipo_ticket'];
		}else{
			$equipo_ticket="";
		}
		if(isset($_POST['name_ticket'])){
			$name_ticket= $_POST['name_ticket'];
		}else{
			$name_ticket="";
		}
		if(isset($_POST['email_ticket'])){
			$email_ticket= $_POST['email_ticket'];
		}else{
			$email_ticket="";
		}
		if(isset($_POST['area_ticket'])){
			$area_ticket= $_POST['area_ticket'];
		}else{
			$area_ticket="";
		}
		if(isset($_POST['tipo'])){
			$tipo= $_POST['tipo'];
		}else{
			$tipo="";
		}
		if(isset($_POST['asunto_ticket'])){
			$asunto_ticket= $_POST['asunto_ticket'];
		}else{
			$asunto_ticket="";
		}
		//descripcion de problema
		$frase= $_POST['mensaje_ticket'];
		
		$mensaje_ticket = preg_replace('/\s+/', ' ', $frase); 
		
		if(isset($_POST['mes'])){
			$mes= $_POST['mes'];
		}else{
			$mes="";
		}
		if(isset($_POST['hrs'])){
			$hrs= $_POST['hrs'];
		}else{
			$hrs="";
		}

/*************************************************************
Condicional para guardar imagenes en BLOB
*************************************************************/
// Recuperar la imagen cargada
$imagen = $_FILES['imagen']['name'];
$temp = $_FILES['imagen']['tmp_name'];
$folder = 'img_tickets';

$solucion="";

$ubicacion=$_POST['ubicacion'];

$fecha_solucion="";
$hora_solucion="";

$fecha_hora_sol=NULL;

$admin_solucion="";
$estatus="";
$observaciones="";

$cabecera="From: Soporte Devinsa <tecnicos@veco.lat>";

		$mensaje_mail=utf8_decode("Estimado usuario,  \r\n 
		Para seguimiento se ha generado el ticket #  ".$id_ticket."\r\n  
		¡Gracias por reportarnos su problema! \r\n  \r\n  \r\n 
		Saludos Cordiales\r\n Soporte Devinsa \r\n soporte_tecnico@veco.lat \r\n \r\n 
		Por favor, responda a este mensaje de ENTERADO \r\n");
		
		$mensaje_gere=utf8_decode("Estimado Gerente,  \r\n 
		El usuario ".$_SESSION['nombre_completo']." ha generado un nuevo ticket con el ID #".$id_ticket." en ".$ubicacion.".\r\n
		El asunto es: ".$asunto_ticket."\r\n
		El tipo de falla es: ".$tipo."\r\n
		Saludos Cordiales\r\n Soporte Devinsa \r\n soporte_tecnico@veco.lat \r\n \r\n 
		Por favor, responda a este mensaje de ENTERADO \r\n");
		
		$mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");
		$email= $email_ticket;
		$email_gere= "a.lorenzana@devinsa.com";
		$mensaje_admin=utf8_decode("Estimado Soporte Técnico, el usuario ".$_SESSION['nombre_completo']." ha levantado el ticket: ".$id_ticket.".\r\n
		Puede comunicarse con el usuario para resolver el problema. \r\n \r\n
		Saludos Cordiales\r\n Área de Sistemas \r\n soporte_tecnico@veco.lat \r\n \r\n 
		Por favor, responda a este mensaje de ENTERADO");
		$mensaje_admin=wordwrap($mensaje_admin, 70, "\r\n");

		//$email_pruebas= "j.sanchez@veco.mx";
		$email_oficinas = "hw_oficinas@veco.lat";
		$email_planta= "hw_planta@veco.lat";
		$email_software = "soporte_tecnico@veco.lat";

		$asunto_admin= "Nuevo ticket reportado ".$id_ticket."";
		$asunto_gere= "Nuevo ticket reportado ".$id_ticket."";
		$asunto_usuario = "Ticket ".$id_ticket.": ".utf8_decode($asunto_ticket);

		$fecha_hora= date('Y-m-d H:i:s');
		setlocale(LC_TIME,"es_MX.UTF-8");
		date_default_timezone_set ('America/Mexico_City');
		$datetime_inicio_sgc = strftime('%d%b%y');

		$con=mysqli_connect($host,$user,$pw,$db);

		if ($size = $_FILES['imagen']['size']) {
			$size_max = 15728640;
			if ($size <= $size_max) {
			  // Archivación temporal
				move_uploaded_file($temp, $folder.'/'.$imagen);

			  // Extracción de bytes
				$bytes_arch = file_get_contents($folder.'/'.$imagen);
				$img = base64_encode($bytes_arch);

				if(mysqli_query($con,("INSERT INTO ticket(hora, fecha, fecha_2, email_cliente, nombre_usuario, area, ubicacion, equipo, tipo,  serie, estado_ticket, asunto, mensaje, img, admin_solucion, estatus, solucion, fecha_solucion,hora_solucion, observaciones,mes,hrs, fecha_hora, fecha_hora_sol, datetime_inicio_sgc)
					VALUES
					('$hora_ticket','$fecha_ticket','$fecha2_ticket','$email_ticket','$name_ticket','$area_ticket', '$ubicacion','$equipo_ticket','$tipo','$id_ticket','$estado_ticket','$asunto_ticket','$mensaje_ticket','$img', '$admin_solucion', '$estatus', '$solucion','$fecha_solucion','$hora_solucion','$observaciones','$mes','$hrs', '$fecha_hora', '$fecha_hora_sol', '$datetime_inicio_sgc')"))){

					echo '
				<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="text-center">TICKET CREADO</h4>
				<p class="text-center">
				Ticket creado con exito '.$_SESSION['nombre'].'<br>Su Ticket ID es: <strong>'.$id_ticket.'</strong>
				</p>
				<p class="text-center">
				Se recomienda guardar su ID
				</p>
				</div>';

			}else{
				echo '
				<div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="text-center"><strong>OCURRIÓ UN ERROR</strong></h4>
				<p class="text-center">
				No hemos podido crear su Ticket. Por favor intente nuevamente.
				</p>
				</div>
				';
			}
		} else {
			echo '
			<div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="text-center"><strong>PESO SUPERADO</strong></h4>
			<p class="text-center">
			No hemos podido crear su Ticket, el peso de 15 MB para la imagen fue superada.
			</p>
			</div>';
		}
	} else {
		mysqli_query($con,"INSERT INTO ticket(hora, fecha, fecha_2, email_cliente, nombre_usuario, area, ubicacion, equipo, tipo,  serie, estado_ticket, asunto, mensaje, img, admin_solucion, estatus, solucion, fecha_solucion,hora_solucion, observaciones,mes,hrs, fecha_hora, fecha_hora_sol, datetime_inicio_sgc)
			VALUES
			('$hora_ticket','$fecha_ticket','$fecha2_ticket','$email_ticket','$name_ticket','$area_ticket', '$ubicacion','$equipo_ticket','$tipo','$id_ticket','$estado_ticket','$asunto_ticket','$mensaje_ticket','$img', '$admin_solucion', '$estatus', '$solucion','$fecha_solucion','$hora_solucion','$observaciones','$mes','$hrs', '$fecha_hora', '$fecha_hora_sol', '$datetime_inicio_sgc')");

		echo '
		<div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		<h4 class="text-center">TICKET CREADO</h4>
		<p class="text-center">
		Ticket creado con exito '.$_SESSION['nombre'].'<br>Su Ticket ID es: <strong>'.$id_ticket.'</strong>
		</p>
		<p class="text-center">
		Se recomienda guardar su ID
		</p>
		</div>';

		/////////////////////////////////////////////////////////////////////////////////////
		/*----------  Enviar correo con los datos del ticket----------*/
		mail($email, $asunto_usuario, $mensaje_mail, $cabecera);
		mail($email_gere, $asunto_gere, $mensaje_gere, $cabecera);
	}

	switch ($ubicacion) {
		case 'Oficinas':
			switch ($tipo_falla) {
				case 'Hardware':
				mail($email_oficinas, $asunto_admin, $mensaje_admin, $cabecera);
				break;

				case 'Software':
				mail($email_software, $asunto_admin, $mensaje_admin, $cabecera);
				break;
				
				default:
				mail($email_software, $asunto_admin, $mensaje_admin, $cabecera);
				break;
			}
		break;

		case 'Planta':
			switch ($tipo_falla) {
				case 'Hardware':
				mail($email_planta, $asunto_admin, $mensaje_admin, $cabecera);
				break;
	
				case 'Software':
				mail($email_software, $asunto_admin, $mensaje_admin, $cabecera);
				break;
					
				default:
				mail($email_software, $asunto_admin, $mensaje_admin, $cabecera);
				break;
			}
		break;
	}
}

?>	  

<meta charset="UTF-8">

<div class="container">
	<div class="row well">
		<div class="col-sm-3">
			<img src="img/ticket.png" class="img-responsive" alt="Image">
		</div>
		<div class="col-sm-9 lead">
			<h3 class="text-info">¿Cómo abrir un nuevo Ticket?</h3>
			<p>Para abrir un Ticket, deberá de llenar todos los campos del siguiente formulario.</p>
			<p> Usted podra verificar el estado de su Ticket, mediante el <strong>Ticket ID</strong> que se le proporcionar al final.</p>
		</div>
	</div><!--fin row 1-->

	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title text-center"><strong><i class="fa fa-ticket"></i>&nbsp;&nbsp;&nbsp;Ticket</strong></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 text-center">
							<br><br><br>
							<img src="img/write_email.png" alt=""><br><br>
							<p class="text-primary text-justify">Por favor llene todos los datos de este formulario para abrir su Ticket. Se recomienda que guarde el <strong>Ticket ID</strong> que se le asignara para futuras consultas.</p>
						</div>
						<div class="col-sm-8">
							<form class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group">
										<label class="col-sm-2 control-label">Hora</label>
										<div class='col-sm-10'>
											<div class="input-group">
												<input class="form-control" type="text" name="hora_ticket"  readonly value="<?php echo date("H:i");?> hrs">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
									</div>
									<input type="hidden" readonly="" name="mes" readonly="" value="<?php echo date("M");?>">
									<input type="hidden" readonly="" name="hrs" readonly="" value="<?php echo date("h");?>">
									<input type="hidden" name="fecha2_ticket"  readonly value="<?php echo date("Y-m-d");?>">
									<div class="form-group">
										<label class="col-sm-2 control-label">Fecha</label>
										<div class='col-sm-10'>
											<div class="input-group">
												<input class="form-control" type="text" name="fecha_ticket"  readonly value="<?php echo date("d/m/Y");?>">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label  class="col-sm-2 control-label">Usuario</label>
										<div class="col-sm-10">
											<div class='input-group'>
												<input type="text" class="form-control" readonly="" value="<?php echo $_SESSION['nombre_completo']; ?>" name="name_ticket" >
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label  class="col-sm-2 control-label">Email</label>
										<div class="col-sm-10">
											<div class='input-group'>
												<input type="text" class="form-control" readonly="" value="<?php echo $_SESSION['email']; ?>" name="email_ticket" >
												<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-2 control-label">Área</label>
										<div class="col-sm-10">
											<div class='input-group'>
												<input type="text" class="form-control"readonly="" value="<?php echo $_SESSION['ar']; ?>" name="area_ticket">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-2 control-label">Ubicación</label>
										<div class="col-sm-10">
											<div class='input-group'>
												<input type="text" class="form-control" readonly="" value="<?php echo $_SESSION['ubi']; ?>" name="ubicacion" >
												<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label  class="col-sm-2 control-label">Equipo</label>
										<div class="col-sm-10">
											<div class='input-group'>
												<select class="form-control" name="equipo_ticket" required="">
													<option  value="">Seleccionar Equipo</option>
													<?php
													$usuario= $_SESSION['id'];
													$connect = mysqli_connect("localhost","veco_dvi", "Vec83Dv19iSa@", "veco_sims_devecchi");
													$query = "SELECT * FROM equipo_usuario where usuario ='$usuario'";
													$result = mysqli_query($connect, $query);
													
													foreach($result as $row){
														echo '<option value="'.$row['num_serie'].'">'.$row['num_serie'].'</option>';
													}
													?>
												</select><span class="input-group-addon"><i class="fa fa-user"></i></span>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label  class="col-sm-2 control-label">Tipo</label>
										<div class='col-sm-10'>
											<div class="input-group">
												<select class="form-control" name="tipo" required="" onclick="showImg()">          
													<option value=""></option>
													<option value="Hardware">Hardware</option>
													<option value="Software">Software</option>
												</select>
												<span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
											</div>
										</div>
									</div>

			<div class="form-group">
				<label  class="col-sm-2 control-label">Asunto</label>
				<div class="col-sm-10">
					<div class='input-group'>
						<input type="text" class="form-control" placeholder="Asunto" title="Favor de introducir Mayusculas y Minusculas" name="asunto_ticket" required="" maxlength="40">
						<span class="input-group-addon"><i class="fa fa-paperclip"></i></span>
					</div> 
				</div>
			</div>

			<div class="form-group">
				<label  class="col-sm-2 control-label">Describa su problema </label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="3" placeholder="Escriba el problema que presenta" title="Favor de introducir Mayusculas y Minusculas" name="mensaje_ticket" required=""></textarea>
				</div>
			</div>
			<br>

			<font size=3 color="green" >Agregar Imagen </font><font size=1.5 color="red" >(Solo se aceptan el formato de imagen PNG, JPEG y JPG) </font><br>
			<label  class="control-label">Opcional - </label>
			<label  class="control-label">Máximo 15 MB* </label><br>
			<input accept="image/png, .jpeg, .jpg" name="imagen" id="imagen" type="file"><br>

			<br>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-info">Crear Ticket</button>

				</div>
			</div>
		</fieldset> 
	</form>
	<div class="col-sm-6">
		<a href="./soporte.php?view=soporte" ><button  type="submit" value="Regresar" name="" class="btn btn-primary" style="text-align:center; width: 100%;"><i class="fa fa-reply"></i>&nbsp;&nbsp;Regresar</button></a>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="class_ticket" id="class_ticket" style="display: none;">
<img class="img-responsive animated tada" src="img/class_ticket.gif" style="position: absolute; left: 10%; float: right; top: 60%; width: 30%; border: 5px solid; border-radius: 10px;">
</div>

<script type="text/javascript">
	function showImg(){
		$("#class_ticket").css("display","block");
	}
</script>

<?php
}else{
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img src="./img/SadTux.png" alt="Image" class="img-responsive"/>
				
			</div>
			<div class="col-sm-7 text-center">
				<h1 class="text-danger">Lo sentimos esta página es solamente para usuarios registrados en el Sistema</h1>
				<h3 class="text-info">Inicia sesión para poder acceder</h3>
			</div>
			<div class="col-sm-1">&nbsp;</div>
		</div>
	</div>
	<?php
}

?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#fechainput").datepicker();
	});
</script>