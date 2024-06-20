<?php

include ("./conexi.php");
include '././lib/class_mysql.php';
include '././lib/config.php';


/*if(isset($_POST['fecha']) && isset($_POST['equipo'])){

          //Este codigo nos servira para generar un numero diferente para cada ticket
	$codigo = ""; 
	$longitud = 2; 
	for ($i=1; $i<=$longitud; $i++){ 
		$numero = rand(0,9); 
		$codigo .= $numero; 
	} 
	$num=Mysql::consulta("SELECT * FROM sop_preventivo");
	$numero_filas = mysqli_num_rows($num);

	$numero_filas_total=$numero_filas+1;
	$id_ticket="PR".$codigo."N".$numero_filas_total;
          //Fin codigo numero de ticket*/

		//$mantenimiento= $_POST['mantenimiento'];
	$solucion_admin= $_POST['solucion_admin'];
	$usuario = $_POST['usuario'];
	$fecha_mantto = $_POST['fecha'];
	$anio= $_POST['anio'];
	$fecha_lev= $_POST['fecha_lev'];
		//$usuario= $_POST['usuario'];
	$ubicacion= $_POST['ubicacion'];

	/*if(isset($_POST['mantenimiento'])){
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
	}*/

		//$mensaje_mail= $_POST['mensaje_mail'];

	$fecha_mant="";
	$asunto_ticket= "Aviso de Mantenimiento";        
	$observaciones= "";
	$estado_ticket="Programado";
	$cabecera="From: Sistemas <sistemas@veco.lat>";
	$mantenimiento2 = utf8_decode($mantenimiento);
	$mensaje_mail="Estimado usuario, se le informa que en la siguiente fecha ".$fecha." se realizara un mantenimiento a su equipo, para que se agende. \r\n 
	Su ID ticket preventivo es: ".$id_ticket."\r\n Motivo de Mantenimiento: ".$mantenimiento2." \r\n El soporte tecnico sera  ".$solucion_admin."\r\n Saludos cordiales. \r\n Area de Sistemas \r\n sistemas@veco.mx";
	$mensaje_mail=wordwrap($mensaje_mail, 70, "\r\n");

	$admin_mail=utf8_decode("Estimado Soporte Técnico, se le ha asignado un nuevo mantenieminto en la fecha ".$fecha."  \r\n 
	El usuario agendado es: ".$usuario."\r\nEl ID ticket preventivo es: ".$id_ticket."\r\nMotivo de Mantenimiento: ".$mantenimiento2." \r\n \r\n Saludos cordiales. \r\n Área de Sistemas. \r\n sistemas@veco.mx  \r\n  \r\n Por favor, NO responda a este mensaje, es un envío automático.");
	$admin_mail=wordwrap($admin_mail, 70, "\r\n");

	$root_mail="Estimado Gerente se ha levantado un nuevo Mantenimiento  para la fecha: ".$fecha." !  \r\n 
	El ID ticket preventivo es: ".$id_ticket."\r\n Motivo de Mantenimiento: ".$mantenimiento2." \r\n \r\n Saludos cordiales.\r\n  Area de Sistemas. \r\n sistemas@veco.mx  \r\n  \r\n Por favor, NO responda a este mensaje, es un envio automatico.";
	$root_mail=wordwrap($root_mail, 70, "\r\n");

mail($solucion_admin, $asunto_ticket, $admin_mail, $cabecera);

	//$email= " a.lorenzana@devinsa.com";
	///$con=mysqli_connect($host,$user,$pw,$db);
	/*if(mysqli_query($con,(
		"INSERT INTO sop_preventivo(fecha_lev, fecha, usuario, email_cliente, nombre_usuario, ubicacion, equipo, serie, estado_ticket, asunto, mantenimiento,solucion_admin, observaciones, fecha_mant, anio)
		VALUES
		('$fecha_lev', '$fecha','$usuario', '$email_ticket','$usuario_id','$ubicacion', '$equipo', '$id_ticket','$estado_ticket','$asunto_ticket', '$mantenimiento','$solucion_admin', '$observaciones', '$fecha_mant', '$anio')"))){


         /* if(MysqlQuery::Guardar("sop_preventivo", "fecha, email_cliente, nombre_usuario, equipo, tipo, serie, estado_ticket, asunto, mantenimiento,solucion_admin, observaciones", 
          "'$fecha', '$email_ticket','$usuario_id', '$equipo', '$tipo','$id_ticket','$estado_ticket',$asunto_ticket', $mantenimiento,'$solucion_admin', '$observaciones'")){
*/
            //----------  Enviar correo con los datos del ticket ----------
          	//mail($email_ticket, $asunto_ticket, $mensaje_mail, $cabecera);
          	//mail($email, $asunto_ticket, $root_mail, $cabecera);
/*

          	echo '<script language="javascript">
          	alert("TICKET CREADO...Se ha enviado los correos corespondientes con exito");
          	window.location.href="soporte.php"</script>
          	';

          }else{
          	echo '<script language="javascript">
          	alert("OCURRIÓ UN ERROR..No hemos podido crear el ticket");
          	window.location.href="soporte.php"</script>
          	';
          }
      }*/

      class ICS { 
      	var $data; 
      	var $name; 
      	function ICS($start,$end,$name,$description,$location) { 
      		$this->name = $name; 
      		$this->data = "BEGIN:VCALENDAR\nVERSION:2.0\nMETHOD:PUBLISH\nBEGIN:VEVENT\nDTSTART:".date("Ymd\THis\Z",strtotime($start))."\nDTEND:".date("Ymd\THis\Z",strtotime($end))."\nLOCATION:".$location."\nTRANSP: OPAQUE\nSEQUENCE:0\nUID:\nDTSTAMP:".date("Ymd\THis\Z")."\nSUMMARY:".$name."\nDESCRIPTION:".$description."\nPRIORITY:1\nCLASS:PUBLIC\nBEGIN:VALARM\nTRIGGER:-PT10080M\nACTION:DISPLAY\nDESCRIPTION:Reminder\nEND:VALARM\nEND:VEVENT\nEND:VCALENDAR\n"; 
      	} 
      	function save() { 
      		file_put_contents($this->name.".ics",$this->data); 
      	} 
      	function show() { 
      		header("Content-type:text/calendar"); 
      		header('Content-Disposition: attachment; filename="'.$this->name.'.ics"'); 
      		Header('Content-Length: '.strlen($this->data)); 
      		Header('Connection: close'); 
      		echo $this->data; 
      	} 
      }

      $event = new ICS("".$fecha_mantto." 09:00 a.m.","".$fecha_mantto."10:00 a.m.","Mantenimiento Preventivo","Usuario: ".$usuario.,""); 
      $event->save(); 

      ?>
