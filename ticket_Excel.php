<?php

require 'conexi.php';

$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

if (isset($_POST['generar_reporte'])) {
	header('Content-Type: application/vnd.ms-excel; charset=utf');
	header('Content-Disposition: attachment; filename=Reporte_Oficinas.xls');

	$query = "SELECT * FROM ticket WHERE ubicacion = 'Oficinas' AND fecha_2 BETWEEN '$fecha1' AND '$fecha2' AND (estado_ticket= 'En proceso' OR estado_ticket = 'Reparacion en garantia' OR estado_ticket = 'Requisicion de compra' OR estado_ticket = 'Resuelto' OR estado_ticket = 'Cancelado' OR estado_ticket = 'Resuelto compra')";
}?>

<meta charset="utf-8">

<table>
	<tr>
	<th>Fecha y Hora</th>
		<th>Nombre Usuario</th>
		<th>Área</th>
		<th>Equipo</th>
		<th>Serie</th>
		<th>Estado</th>
		<th>Asunto</th>
		<th>Tipo de Falla</th>
		<th>Quién Soluciona</th>
		<th>Fecha y Hora de Solución</th>
		<th>En proceso</th>
		<th>Requisición de Compra</th>
		<th>Reparación en Garantía</th>
		<th>Tiempo que tardo en pasar a Proceso</th>
		<th>Tiempo que tardo en pasar a Compra</th>
		<th>Tiempo que tardo la Compra</th>
		<th>Tiempo que tardo en pasar a Garantía</th>
		<th>Tiempo que tardo la Garantía</th>
		<th>Tiempo Solución</th>
	</tr>

	<?php
if ($exec = $mysqli->query($query)) {
	while ($row = $exec->fetch_assoc()) {
		?>

		<tr><br>
		<td><?php echo $row['fecha_hora']; ?></td>
			<td><?php echo utf8_decode($row['nombre_usuario']); ?></td>
			<td><?php echo $row['area']; ?></td>
			<td><?php echo $row['equipo']; ?></td>
			<td><?php echo $row['serie']; ?></td>
			<td><?php echo $row['estado_ticket']; ?></td>
			<td><?php echo utf8_decode($row['asunto']); ?></td>
			<td><?php echo $row['tipo']; ?></td>
			<td><?php echo utf8_decode($row['observaciones']); ?></td>
			<td><?php echo $row['fecha_hora_sol']; ?></td>
			<td><?php echo $row['proceso']; ?></td>
			<td><?php echo $row['req_compra']; ?></td>
			<td><?php echo $row['garantia']; ?></td>
		</tr>

	<?php }} 

$inicio2022 = "SELECT * FROM ticket WHERE ubicacion = 'Oficinas' AND fecha_2 BETWEEN '2021-01-01' AND '2022-05-31' AND (estado_ticket= 'Pendiente' OR estado_ticket= 'En proceso' OR estado_ticket = 'Reparacion en garantia' OR estado_ticket = 'Requisicion de compra')";

if ($eje = $mysqli->query($inicio2022)) {
while ($rauw = mysqli_fetch_assoc($eje)) {
	?>

	<tr>
		<td><?php echo $rauw['fecha_hora']; ?></td>
		<td><?php echo utf8_decode($rauw['nombre_usuario']); ?></td>
		<td><?php echo $rauw['area']; ?></td>
		<td><?php echo $rauw['equipo']; ?></td>
		<td><?php echo $rauw['serie']; ?></td>
		<td><?php echo $rauw['estado_ticket']; ?></td>
		<td><?php echo utf8_decode($rauw['asunto']); ?></td>
		<td><?php echo $rauw['tipo']; ?></td>
		<td><?php echo utf8_decode($rauw['observaciones']); ?></td>
		<td><?php echo $rauw['fecha_hora_sol']; ?></td>
		<td><?php echo $row['proceso']; ?></td>
		<td><?php echo $rauw['req_compra']; ?></td>
		<td><?php echo $rauw['garantia']; ?></td>
	</tr>

<?php }}

?>

</table>
