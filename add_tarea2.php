<?php

 include ("conexi.php");

	if(isset($_POST['empresa']) && isset($_POST['edificio']) && isset($_POST['ubicacion'])){ 
		
		$empresa= $_POST['empresa'];
		$edificio= $_POST['edificio'];
		$ubicacion= $_POST['ubicacion'];
		$equipo= $_POST['equipo'];
		$servicio= $_POST['servicio'];
		$etiqueta1= $_POST['etiqueta1'];
		$etiqueta2= $_POST['etiqueta2'];
		$etiqueta3= $_POST['etiqueta3'];
		$servicio2= $_POST['servicio2'];
		$etiqueta1_s2= $_POST['etiqueta1_s2'];
		$etiqueta2_s2= $_POST['etiqueta2_s2'];
		$etiqueta3_s2= $_POST['etiqueta3_s2'];
		//$etiqueta3_s2= $_POST['etiqueta4_s2'];
		$servicio3= $_POST['servicio3'];
		$etiqueta1_s3= $_POST['etiqueta1_s3'];
		$etiqueta2_s3= $_POST['etiqueta2_s3'];
		$etiqueta3_s3= $_POST['etiqueta3_s3'];
		//$etiqueta3_s2= $_POST['etiqueta4_s3'];
		$servicio4= $_POST['servicio4'];
		$etiqueta1_s4= $_POST['etiqueta1_s4'];
		$etiqueta2_s4= $_POST['etiqueta2_s4'];
		$etiqueta3_s4= $_POST['etiqueta3_s4'];
		//$etiqueta3_s2= $_POST['etiqueta4_s4'];
		$servicio5= $_POST['servicio5'];
		$etiqueta1_s5= $_POST['etiqueta1_s5'];
		$etiqueta2_s5= $_POST['etiqueta2_s5'];
		$etiqueta3_s5= $_POST['etiqueta3_s5'];
		$etiqueta3_s2= $_POST['etiqueta4_s2'];
		$etiqueta3_s2= $_POST['etiqueta5_s2'];
		$etiqueta3_s2= $_POST['etiqueta6_s2'];
		$servicio6= $_POST['servicio6'];
		$etiqueta1_s6= $_POST['etiqueta1_s6'];
		//$servicio7= $_POST['servicio7'];
		//$etiqueta1_s7= $_POST['etiqueta1_s7'];
		//$etiqueta2_s7= $_POST['etiqueta2_s7'];
		$servicio8= $_POST['servicio8'];
		$etiqueta1_s8= $_POST['etiqueta1_s8'];
		//$servicio9= $_POST['servicio9'];
		//$etiqueta1_s9= $_POST['etiqueta1_s9'];
		//$etiqueta2_s9= $_POST['etiqueta2_s9'];
		$uptime=$_POST['uptime'];

		
		$con=mysqli_connect($host,$user,$pw,$db);
			if(mysqli_query($con,(
			"INSERT INTO servicio(empresa, edificio, ubicacion,  equipo, servicio, etiqueta1, etiqueta2, etiqueta3, servicio2, etiqueta1_s2, etiqueta2_s2, etiqueta3_s2, servicio3, etiqueta1_s3, etiqueta2_s3, etiqueta3_s3, servicio4, etiqueta1_s4, etiqueta2_s4, etiqueta3_s4, servicio5, etiqueta1_s5, etiqueta2_s5, etiqueta3_s5, etiqueta4_s5, etiqueta5_s5, etiqueta6_s5, servicio6, etiqueta1_s6, servicio8, etiqueta1_s8, uptime )VALUES('$empresa','$edificio','$ubicacion', '$equipo','$servicio','$etiqueta1','$etiqueta2','$etiqueta3','$servicio2','$etiqueta1_s2','$etiqueta2_s2','$etiqueta3_s2','$servicio3','$etiqueta1_s3','$etiqueta2_s3','$etiqueta3_s3','$servicio4','$etiqueta1_s4','$etiqueta2_s4','$etiqueta3_s4','$servicio5','$etiqueta1_s5','$etiqueta2_s5','$etiqueta3_s5','$etiqueta4_s5','$etiqueta5_s5','$etiqueta6_s5','$servicio6','$etiqueta1_s6','$servicio8','$etiqueta1_s8','$uptime')"))){
		  echo '
               <script language="javascript">
				alert("Servicio agregado correctamente");
				window.location.href="tarea.php"</script>
            ';

          }else{
            echo '
                 <script language="javascript">
				alert("OCURRIÓ UN ERROR. No hemos podido guardar el equipo y sus servicios ");
				window.location.href="tarea.php"</script>
            ';
          }
        }
		?>
		  <?php
