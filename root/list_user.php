<?php

if (isset($_POST['usuarios'])) {
	header('Content-Type: application/vnd.ms-excel; charset=utf');
	header('Content-Disposition: attachment; filename=Usuarios_Devinsa.xls');

	$query = "SELECT nombre_usuario, nombre_comp, email_usuario, area, ubicacion FROM `usuario_sop`";


$usuario = "veco_dvi";
$password = "Vec83Dv19iSa@";
$servidor = "localhost";
$basededatos = "veco_sims_devecchi";

$mysqli = mysqli_connect( $servidor, $usuario, $password, $basededatos);

?>

<meta charset="utf-8">

<table>
	<tr>
		<th>Nombre Usuario</th>
		<th>Nombre Completo</th>
		<th>Correo</th>
		<th>Área</th>
		<th>Ubicación</th>
	</tr>

<?php

if ($exec = $mysqli->query($query)) {
	while ($row = $exec->fetch_assoc()) {
		?>

		<tr><br>
			<td><?php echo utf8_decode($row['nombre_comp']); ?></td>
			<td><?php echo $row['nombre_comp']; ?></td>
			<td><?php echo $row['email_usuario']; ?></td>
			<td><?php echo $row['area']; ?></td>
			<td><?php echo $row['ubicacion']; ?></td>
		</tr>

<?php
}
}
}
?>

</table>
