<?php
include 'conexi.php';

$delimiter = ",";

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$filename = "Reporte_Checadas_entre_".$fecha1."_y_".$fecha2.".csv";
//$ubi=$_POST['ubi'];

//create a file pointer
$f = fopen('php://memory', 'a');

//crea los encabezados de las columnas
$fields = array('Nombre Usuario', 'Ubicacion', 'Fecha','Hora de Entrada','Salida Comida','Entrada comida', 'Hora de Salida');

fputcsv($f, $fields, $delimiter);

//extrae cada fila de datos, les da formato csv y los escribe en fichero creado
$value="SELECT * from reg_checador2 WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY fecha ASC"; 

$result = $mysqli->query($value);

while($d = $result->fetch_assoc()){
    $lineData = array($d["usuario"], $d["ubicacion"], $d["fecha"], $d["hora_entrada"], $d["salida_comer"], $d["entrada_comer"], $d["hora_salida"]);

		fputcsv($f, $lineData, $delimiter);

	}
    //vuelve al principio de cada fila
	fseek($f, 0);    

	 //crea las cabeceras para la exportacion para descarga del archivo con el nombre y fecha
     header('Content-Type: text/csv; charset=UTF-8');
     header("Content-Disposition: attachment; filename=\"$filename\";");

	//Escribe toda la informacion restante de un puntero a un archivo
    fpassthru($f);

exit;

?>