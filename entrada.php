<?php
 include ("conexi.php");
	

	if(isset($_POST['nombre']) && isset($_POST['nombre'])){ 
			
			$nombre= $_POST['nombre'];
			$fecha= $_POST['fecha'];
			$hora_entrada= $_POST['hora'];
			$hora_salida= "";
			$sis_func= $_POST['sis_func'];
			
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("INSERT INTO reg_checador(usuario, fecha, hora_entrada, hora_salida, sis_func)VALUES('$nombre','$fecha','$hora_entrada','$hora_salida','$sis_func')"))){
			
		
			echo  '<script language="javascript">
				alert("Se ha checado su entrada. Gracias");
				window.location.href="checador2.php"</script>';
		}else{
			echo '<script language="javascript">
				alert("Su checada fue incorrecta favor de intentarlo. Gracias");
				window.location.href="checador2.php"</script>';
		}
	}
?>