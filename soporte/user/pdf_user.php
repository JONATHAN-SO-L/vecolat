<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 08/2019 v1
 */
 ?>
<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';
$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM servicio2 WHERE id_servicio= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

class PDF extends FPDF
{
}

$pdf=new PDF('P','mm','Letter');
$pdf->SetMargins(15,20);

#Establecemos el margen inferior:
$pdf->SetAutoPageBreak(true,25); 
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetTextColor(0,0,128);
$pdf->SetFillColor(254, 254, 254);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont("Arial","b",9);
$pdf->Image('../img/Logo-DV-final.png',15,20,50);
$pdf->Cell (0,5,utf8_decode('Devecchi Ingenieros'),0,1,'C');
$pdf->Cell (0,5,utf8_decode('Reporte de Servicio para la UMA  ' .utf8_decode($reg['equipo'])),0,1,'C');
$pdf->Image('../img/abc_logo.png',160,13,40);

$fecha_serv = $reg['fecha_servicio'];
$equi = $reg['equipo'];

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell (0,5,utf8_decode('Ficha Técnica de la Unidad Manejadora'),1,1,'C');
$pdf->SetXY(5,53);
$pdf->Cell (35,10,'Fecha',0,1,'C');
$pdf->SetXY(33,53);
$pdf->Cell (40,10,utf8_decode($reg['fecha_servicio']),1,1,'L');

$pdf->SetXY(69,53);
$pdf->Cell (35,10,'Empresa',0,1,'C');
$pdf->SetXY(98,53);
$pdf->Cell (40,10,utf8_decode($reg['empresa']),1,1,'L');

$pdf->SetXY(133,53);
$pdf->Cell (35,10,'Edificio',0,1,'C');
$pdf->SetXY(161,53);
$pdf->Cell (40,10,utf8_decode($reg['edificio']),1,1,'L');

$pdf->SetXY(5,65);
$pdf->Cell (35,10,'Ubicacion',0,1,'C');
$pdf->SetXY(33,65);
$pdf->Cell (40,10,utf8_decode($reg['ubicacion']),1,1,'L');

$pdf->SetXY(69,65);
$pdf->Cell (35,10,'Equipo',0,1,'C');
$pdf->SetXY(98,65);
$pdf->Cell (40,10,utf8_decode($reg['equipo']),1,1,'L');

#Primera Etapa
$pdf->SetY(80);
$pdf->Cell (0,5,utf8_decode($reg['servicio']),1,1,'C');

$pdf->SetXY(14,87);
$pdf->MultiCell (30,5,utf8_decode($reg['etiqueta1']),0,1,'C');
$pdf->SetXY(15,98);
$pdf->SetFont("Arial","",8);
$pdf->Cell (20,6.5,utf8_decode($reg['valor1']),1,1,'L');
$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM ser_img WHERE id_ser_img= '$id' AND fecha_servicio = '$fecha_serv' AND equipo ='$equi'");
$rim = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$imagen = $rim['img1'];
$pdf->Image('../files/servicio/2019-09-18/AHU-2-07/Filtro 1era Etapa/Lectura de presion (Max 1.90)/LOGinf.png',48,88,20);

$pdf->SetXY(66.5,85);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta2']),0,1,'C');

$pdf->SetXY(78,94);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (30,3.7,utf8_decode($reg['valor2']),1,1,'L');
$imagen2 = $rim['img2'];
$pdf->Image($imagen2,113,88,20);

$pdf->SetXY(130,85);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta3']),0,1,'C');
$pdf->SetXY(140,94);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (30,3.7,utf8_decode($reg['valor3']),1,1,'C');
$imagen3 = $rim['img3'];
$pdf->Image($imagen3,176,88,20);
	
$pdf->SetXY(20,120);				
//$pdf->Image(utf8_decode($row['img1']),160,13,40);

#Segunda Etapa	

$pdf->SetY(117);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio2']),1,1,'C');

$pdf->SetXY(20,123);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta1_s2']),0,1,'C');
$pdf->SetXY(15,134);
$pdf->SetFont("Arial","",8);
$pdf->Cell (40,5,utf8_decode($reg['valor1_s2']),1,1,'L');
$imagen1_s2 = $rim['img1_s2'];
$pdf->Image($imagen1_s2,65,123,20);


$pdf->SetXY(98,123);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta2_s2']),0,1,'C');
$pdf->SetXY(110,132);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (40,4,utf8_decode($reg['valor2_s2']),1,1,'L');
$imagen2_s2 = $rim['img2_s2'];
$pdf->Image($imagen2_s2,165,123,20);

#Tercer Etapa

$pdf->SetY(145);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio3']),1,1,'C');

$pdf->SetXY(20,152);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta1_s3']),0,1,'C');
$pdf->SetXY(15,162);
$pdf->SetFont("Arial","",8);
$pdf->Cell (40,8,utf8_decode($reg['valor1_s3']),1,1,'L');
$imagen1_s3 = $rim['img1_s3'];
$pdf->Image($imagen1_s3,65,153,20);

$pdf->SetXY(98,152);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta2_s3']),0,1,'C');
$pdf->SetXY(110,162);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (40,4,utf8_decode($reg['valor2_s3']),1,1,'L');
$imagen2_s3 = $rim['img2_s3'];
$pdf->Image($imagen2_s2,165,153,20);

#Cuarta Etapa

$pdf->SetY(176);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio4']),1,1,'C');

$pdf->SetXY(20,183);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta1_s4']),0,1,'C');
$pdf->SetXY(15,193);
$pdf->SetFont("Arial","",8);
$pdf->Cell (40,5,utf8_decode($reg['valor1_s4']),1,1,'L');
$imagen1_s4 = $rim['img1_s4'];
$pdf->Image($imagen1_s4,65,181,20);

$pdf->SetXY(98,183);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta2_s4']),0,1,'C');
$pdf->SetXY(110,193);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (40,5,utf8_decode($reg['valor2_s4']),1,1,'L');
$imagen2_s4 = $rim['img2_s4'];
$pdf->Image($imagen2_s4,165,181,20);

#Manometro

$pdf->SetY(207);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio5']),1,1,'C');

$pdf->SetXY(5,214);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta1_s5']),0,1,'C');
$pdf->SetXY(15,224);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (30,4,utf8_decode($reg['valor1_s5']),1,1,'L');
$imagen1_s5 = $rim['img1_s5'];
$pdf->Image($imagen1_s5,48,213.5,20);

$pdf->SetXY(68,214);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta2_s5']),0,1,'C');
$pdf->SetXY(78,224);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (30,5,utf8_decode($reg['valor2_s5']),1,1,'L');
$imagen2_s5 = $rim['img2_s5'];
$pdf->Image($imagen2_s5,113,213.5,20);

$pdf->SetXY(133,214);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta3_s5']),0,1,'C');
$pdf->SetXY(143,224);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (30,5,utf8_decode($reg['valor3_s5']),1,1,'C');
$imagen3_s5 = $rim['img3_s5'];
$pdf->Image($imagen3_s5,176,213.5,20);

#Serpentín

$pdf->SetY(250);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio6']),1,1,'C');

$pdf->SetX(15);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta1_s6']),0,1,'C');
$pdf->SetFont("Arial","",8);
$pdf->Cell (40,8,utf8_decode($reg['valor1_s6']),1,1,'L');
$imagen1_s6 = $rim['img1_s6'];
$pdf->Image($imagen1_s6,76,29,20);

#Estructura

$pdf->SetY(53);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio7']),1,1,'C');

$pdf->SetX(20);
$pdf->Cell (5,10,utf8_decode($reg['etiqueta1_s7']),0,1,'C');
$pdf->SetXY(15,69);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (40,8,utf8_decode($reg['valor1_s7']),1,1,'L');
$imagen1_s7 = $rim['img1_s7'];
$pdf->Image($imagen1_s7,65,60,20);

$pdf->SetXY(98,58);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta2_s7']),0,1,'C');
$pdf->SetXY(110,69);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (40,5,utf8_decode($reg['valor2_s7']),1,1,'L');
$imagen2_s7 = $rim['img2_s7'];
$pdf->Image($imagen2_s7,165,62,20);

#Condensador Charola

$pdf->SetY(85);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio8']),1,1,'C');

$pdf->SetXY(5,92);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta1_s8']),0,1,'C');
$pdf->SetXY(15,103);
$pdf->SetFont("Arial","",8);
$pdf->Cell (40,8,utf8_decode($reg['valor1_s8']),1,1,'L');
$imagen1_s8 = $rim['img1_s8'];
$pdf->Image($imagen1_s8,76,95,20);

#Tuberias

$pdf->SetY(120);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (0,5,utf8_decode($reg['servicio9']),1,1,'C');

$pdf->SetXY(20,127);
$pdf->Cell (5,10,utf8_decode($reg['etiqueta1_s9']),0,1,'C');
$pdf->SetXY(15,138);
$pdf->SetFont("Arial","",8);
$pdf->Cell (40,8,utf8_decode($reg['valor1_s9']),1,1,'L');
$imagen1_s9 = $rim['img1_s9'];
$pdf->Image($imagen1_s9,65,130,20);

$pdf->SetXY(98,127);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode($reg['etiqueta2_s9']),0,1,'C');
$pdf->SetXY(110,138);
$pdf->SetFont("Arial","",8);
$pdf->MultiCell (40,5,utf8_decode($reg['valor2_s9']),1,1,'L');
$imagen2_s9 = $rim['img2_s9'];
$pdf->Image($imagen2_s9,165,130,20);

$pdf->Ln();

$pdf->cell(0,5,"Devecchi 2019",0,0,'C');

$pdf->output("Reporte_".$equi.".pdf",'D');