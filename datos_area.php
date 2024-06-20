<?php 
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
$conexion=mysqli_connect('localhost',"veco", "Vec83Dv19iSa@",'veco_sims_devecchi');
$empresa=$_POST['empresa'];

	$sql="SELECT id,
			 empresa_id,
			 descripcion 
		from edificio 
		where empresa_id='$empresa'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label>SELECT 2 (edificio)</label> 
			<select id='lista2' name='lista2'>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
	}

	echo  $cadena."</select>";
	

?>