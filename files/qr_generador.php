<?php
require '../lib/fpdf/fpdf.php';
require '../conexi.php';

class PDF extends FPDF {}

// Generación del formato
$pdf=new PDF('L','mm',array(29,90)); // Portrait milimétricos en carta
$pdf->SetMargins(12,0); // Margen de 12 mm
$pdf->AddPage(); // Creación de hoja pdf

$equipo = $_SERVER['QUERY_STRING'];

// Consulta de información;
$query = "SELECT * FROM equipo_usuario WHERE id_eq_us = '$equipo'";
$query = mysqli_query($mysqli, $query);

while ($fila = mysqli_fetch_assoc($query)) {
    $nombre_comp = $fila['nombre_comp'];
    $area = $fila['area'];
    $num_serie = $fila['num_serie'];
    $tipo_equipo = $fila['equipo'];
    $marca = $fila['marca'];
    $procesador = $fila['procesador'];
    $ram = $fila['ram'];
    $disco = $fila['disco'];
    $sis = $fila['sis_ope'];
}

// QR del documento
require '../lib/phpqrcode/qrlib.php';
$dir = '../files/';

if(!file_exists($dir))
mkdir($dir);

$nombre_qr = $num_serie.' '.$nombre_comp;
$rev = 'REV. 6; 06/25 EV-05-7-001';

$filename = $dir.$nombre_qr.'.png';
$size = 1;
$level = 'L';
$framesize = 1;

$contenido = 'https://192.168.33.81/vecolat/admin/responsiva.php?'.$equipo;

QRCode::png($contenido, $filename, $level, $size, $framesize);

// Eqtiqueta 1
$pdf->Image($filename, 7, 8, 20);

$pdf->SetFont('Arial','',6);
$pdf->SetXY(11,1);
$pdf->Cell (12,5,utf8_decode('Identificación de Equipo: ').$num_serie ,0,0,'C');
$pdf->SetFont('Arial','',6);
$pdf->SetXY(13,3.5);
$pdf->Cell (10,5, $rev ,0,0,'C');

// Eqtiqueta 2
$pdf->Image($filename, 56, 8, 20);

$pdf->SetFont('Arial','',6);
$pdf->SetXY(60,1);
$pdf->Cell (12,5,utf8_decode('Identificación de Equipo: ').$num_serie ,0,0,'C');
$pdf->SetFont('Arial','',6);
$pdf->SetXY(60,3.5);
$pdf->Cell (10,5, $rev ,0,0,'C');

#$pdf->Ln();
$pdf->output('I',utf8_decode('EV-05-07-001').' '.$num_serie.' '.$nombre_comp.'.pdf');

?>