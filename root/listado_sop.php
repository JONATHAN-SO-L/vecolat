<?php

if (isset($_POST['tecnicos'])) {
	header('Content-Type: application/vnd.ms-excel; charset=utf');
	header('Content-Disposition: attachment; filename=Tecnicos_Devinsa.xls');

	$query = "SELECT nombre_admin, nombre, apellido, email_admin, telefono, ubicacion FROM `admin_soporte`";

$usuario = "veco";
$password = "Vec83Dv19iSa@";
$servidor = "localhost";
$basededatos = "veco_sims_devecchi";

$mysqli = mysqli_connect( $servidor, $usuario, $password, $basededatos);

?>

<meta charset="utf-8">

<table>
	<tr>
		<th>Nombre Usuario</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Correo</th>
		<th>Extensión</th>
		<th>Ubicación</th>
	</tr>

<?php

if ($exec = $mysqli->query($query)) {
	while ($row = $exec->fetch_assoc()) {
		?>

		<tr><br>
			<td><?php echo utf8_decode($row['nombre_admin']); ?></td>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $row['apellido']; ?></td>
			<td><?php echo $row['email_admin']; ?></td>
			<td><?php echo $row['telefono']; ?></td>
			<td><?php echo $row['ubicacion']; ?></td>
		</tr>

<?php
}
}
}
?>

</table>
