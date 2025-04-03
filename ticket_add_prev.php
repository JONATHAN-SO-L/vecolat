<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 05/2020 v1
 */
?>
<?php
include ("conexi.php");
	include './lib/class_mysql.php';
include './lib/config.php';


 if(isset($_POST['fecha']) && isset($_POST['equipo'])){

/***************************************************************************************************************************************************************/

$ubicacion= $_POST['ubicacion'];

if ($ubicacion == 'Planta') {
			/*Este codigo nos servira para generar un numero diferente para cada ticket*/
		$codigo = ""; 
		$longitud = 2; 
		for ($i=1; $i<=$longitud; $i++){ 
			$numero = rand(0,100); 
			$codigo .= $numero; 
		} 
		$num=Mysql::consulta("SELECT * FROM sop_preventivo WHERE serie LIKE '%VEC-%'");
		$numero_filas = mysqli_num_rows($num);
		$numero_filas_total=$numero_filas+1;
		$id_ticket="VEC-".$numero_filas_total;

         //-- $id_ticket="TK".$codigo."N".$numero_filas_total;
		/*Fin codigo numero de ticket*/
		} elseif ($ubicacion == 'Oficinas') {
			$codigo = ""; 
		$longitud = 2; 
		for ($i=1; $i<=$longitud; $i++){ 
			$numero = rand(0,100); 
			$codigo .= $numero; 
		} 
		$num=Mysql::consulta("SELECT * FROM sop_preventivo WHERE serie LIKE '%VEC-%'");
		$numero_filas = mysqli_num_rows($num);
		$numero_filas_total=$numero_filas+1;
		$id_ticket="VEC-".$numero_filas_total;
		} else {
			echo "No hay Folio registrado correctamente";
		}

/***************************************************************************************************************************************************************/

		//$mantenimiento= $_POST['mantenimiento'];
		$solucion_admin= $_POST['solucion_admin'];
		$anio= $_POST['anio'];
		$fecha_lev= $_POST['fecha_lev'];
		$usuario= $_POST['usuario'];
		$ubicacion= $_POST['ubicacion'];
		
			if(isset($_POST['mantenimiento'])){
			$mantenimiento= $_POST['mantenimiento'];
		}else{
			$mantenimiento="";
		}
		if(isset($_POST['usuario'])){
			$usuario= $_POST['usuario'];
		}else{
			$usuario="";
		}
		if(isset($_POST['fecha'])){
			$fecha= $_POST['fecha'];
		}else{
			$fecha="";
		}
		if(isset($_POST['usuario_id'])){
			$usuario_id= $_POST['usuario_id'];
		}else{
			$usuario_id="";
		}
		if(isset($_POST['equipo'])){
			$equipo= $_POST['equipo'];
		}else{
			$equipo="";
		}
		if(isset($_POST['email_reg'])){
			$email_ticket= $_POST['email_reg'];
		}else{
			$email_ticket="";
		}
		
		//$mensaje_mail= $_POST['mensaje_mail'];
          $fecha_mant="";
		  $requisiciones = NULL;
          $asunto_ticket= "Aviso de Mantenimiento Preventivo ".$id_ticket."";
          $observaciones= "";
          $estado_ticket="Programado";
          $cabecera="From: Soporte Devinsa <tecnicos@veco.lat>";
          $mantenimiento2 = $mantenimiento;
          $mensaje_mail=utf8_decode("Estimado usuario, se le informa que en la siguiente fecha: ".$fecha." se realizará un mantenimiento a su equipo: ".$equipo.", para que tenga oportunidad de agendarse. \r\n
		  Su ID de mantenimiento preventivo es: ".$id_ticket."\r\n\r\n Motivo de Mantenimiento: ".$mantenimiento2." \r\n\r\n El Ingeniero(a) de Soporte asignado será:  ".$solucion_admin."\r\n Saludos cordiales. \r\n Área de Sistemas \r\n soporte_tecnico@veco.lat  \r\n  \r\n Por favor, responda a este mensaje CONFIRMANDO o INDICANDO la nueva fecha de REPROGRAMACIÓN.");
          $mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");
          
           $admin_mail=utf8_decode("Estimado Ingeniero(a) de Soporte, se le ha asignado un nuevo mantenimiento en la fecha ".$fecha.".\r\n\r\nEl usuario agendado es: ".$usuario."\r\nEl equipo para mantenimiento es: ".$equipo."\r\nEl ID ticket preventivo es: ".$id_ticket."\r\n\r\nMotivo de Mantenimiento: \r\n".$mantenimiento2." \r\n \r\n
		   || Recuerda tomar evidencia fotográfica del proceso de mantenimiento para fines documentales de nuestra área. ||\r\n\r\nSaludos cordiales. \r\n Área de Sistemas. \r\n soporte_tecnico@veco.lat  \r\n  \r\n Por favor, NO responda a este mensaje, es un envío automático.");
          $admin_mail=wordwrap($admin_mail, 70, "\r\n");
          
           $root_mail=utf8_decode("Estimado Gerente se ha levantado un nuevo Mantenimiento para la fecha: ".$fecha." !  \r\n\r\n 
		   El usuario agendado es: ".$usuario."\r\nEl equipo asignado es: ".$equipo."\r\nEl ID ticket preventivo es: ".$id_ticket."\r\n\r\nMotivo de Mantenimiento: ".$mantenimiento2." \r\n El Ingeniero(a) de Soporte será:  ".$solucion_admin."\r\n  Saludos cordiales. \r\n Área de Sistemas. \r\n soporte_tecnico@veco.lat  \r\n  \r\n Por favor, NO responda a este mensaje, es un envío automático.");
          $root_mail=wordwrap($root_mail, 70, "\r\n");
          
		  $date_programada_sgc = date('jMy');
          $email= "a.lorenzana@devinsa.com";
        	$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,(
			    "INSERT INTO sop_preventivo(fecha_lev, fecha, usuario, email_cliente, nombre_usuario, ubicacion, equipo, serie, estado_ticket, asunto, mantenimiento,solucion_admin, observaciones, fecha_mant, anio, requisiciones, date_programada_sgc)
			VALUES
		('$fecha_lev', '$fecha','$usuario', '$email_ticket','$usuario_id','$ubicacion', '$equipo', '$id_ticket','$estado_ticket','$asunto_ticket', '$mantenimiento','$solucion_admin', '$observaciones', '$fecha_mant', '$anio', '$requisiciones', '$date_programada_sgc')"))){
			        
			        
         /* if(MysqlQuery::Guardar("sop_preventivo", "fecha, email_cliente, nombre_usuario, equipo, tipo, serie, estado_ticket, asunto, mantenimiento,solucion_admin, observaciones", 
          "'$fecha', '$email_ticket','$usuario_id', '$equipo', '$tipo','$id_ticket','$estado_ticket',$asunto_ticket', $mantenimiento,'$solucion_admin', '$observaciones'")){
*/
            //----------  Enviar correo con los datos del ticket ----------
            mail($email_ticket, $asunto_ticket, $mensaje_mail, $cabecera);
            mail($solucion_admin, $asunto_ticket, $admin_mail, $cabecera);
            mail($email, $asunto_ticket, $root_mail, $cabecera);
            
            
            echo '<script language="javascript">
				alert("TICKET CREADO | Se han enviado los correos corespondientes con exito");
				window.location.href="admin.php?view=preventivo"</script>
            ';

          }else{
            echo '<script language="javascript">
				alert("OCURRIÓ UN ERROR | No hemos podido crear el ticket");
				window.location.href="admin.php?view=preventivo"</script>
            ';
          }
        }
?>