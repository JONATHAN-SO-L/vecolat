<?php
include ("conexi.php");
	

	if(isset($_POST['nombre']) && isset($_POST['fecha'])){ 
			
			$nombre= $_POST['nombre'];
			$fecha= $_POST['fecha'];
			$hora_salida= $_POST['hora'];;
			
			$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,("UPDATE reg_checador set hora_salida='$hora_salida' WHERE usuario='$nombre' AND fecha='$fecha' "))){
					
			echo  '<script language="javascript">
				alert("Se ha checado su salida. Gracias");
				window.location.href="checador2.php"</script>';
		}else{
			echo '<script language="javascript">
				alert("Su checada fue incorrecta favor de intentarlo. Gracias");
				window.location.href="checador2.php"</script>';
		}
	}
?>