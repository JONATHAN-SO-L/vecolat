<?php
require '../conexi.php';
$equipo = $_SERVER['QUERY_STRING'];

// Consulta de información;
$query = "SELECT * FROM equipo_usuario WHERE id_eq_us = '$equipo'";
$query = mysqli_query($mysqli, $query);

while ($fila = mysqli_fetch_assoc($query)) {
    $nombre_comp = $fila['nombre_comp'];
    $area = $fila['area'];
    $sede = $fila['ubicacion'];
    $equipo = $fila['equipo'];
    $num_serie = $fila['num_serie'];
    $marca = $fila['marca'];
    $procesador = $fila['procesador'];
    $sis = $fila['sis_ope'];
    $disco = $fila['disco'];
    $ram = $fila['ram'];
}

// Muestreo de información en texto plano 
/*echo '<h3><strong>Asignación de equipos</strong></h3>';
echo '<br><br>';*/
echo '<strong>Usuario: </strong>'.$nombre_comp;
echo '<br><br>';
echo '<strong>Area: </strong>'.$area;
echo '<br><br>';
echo '<strong>Sede: </strong>'.$sede;
echo '<br><br>';
echo '<strong>Equipo: </strong>'.$equipo;
echo '<br><br>';
echo '<strong>Identificacion de Equipo: </strong>'.$num_serie;
echo '<br><br>';
echo '<strong>Marca: </strong>'.$marca;
echo '<br><br>';
echo '<strong>Procesador: </strong>'.$procesador;
echo '<br><br>';
echo '<strong>Sistema Operativo: </strong>'.$sis;
echo '<br><br>';
echo '<strong>Capacidad de Almacenamiento: </strong>'.$disco;
echo '<br><br>';
echo '<strong>Memoria RAM: </strong>'.$ram;
?>