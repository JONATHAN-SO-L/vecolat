<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';
header ('Content-Type: text/html; charset=utf-8');

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$nomcom = Mysql::consulta("SELECT nombre,email_admin, nombre_comp FROM ticket, admin_soporte, usuario_sop WHERE ticket.observaciones = admin_soporte.nombre AND admin_soporte.email_admin = usuario_sop.email_usuario AND ticket.serie = '$id'");
$rel = mysqli_fetch_array($nomcom, MYSQLI_ASSOC);

class PDF extends FPDF
{
	
}

$pdf=new PDF('P','mm','Letter');
$pdf->SetMargins(15,20);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetDrawColor(18, 139, 240);
$pdf->SetXY(12,10);
$pdf->Cell (190,35,'',1,0,'C');

$pdf->SetTextColor(2,5,6);
$pdf->SetFillColor(203, 208, 211);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont("Arial","b",9);
$pdf->Image('../img/vecoo.png',25,7,45);
$pdf->SetXY(45,20);
$pdf->Cell (0,5,utf8_decode('Orden de Mantenimiento Correctivo'),0,1,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetXY(30,52);
$pdf->Cell (0,5,utf8_decode('Información del Ticket # '.$reg['serie']),0,1,'C');

$pdf->SetDrawColor(18, 139, 240);
$pdf->SetXY(12,50);
$pdf->Cell (190,190,'',1,0,'C');
$pdf->SetXY(12,50.3);
$pdf->Cell (190,10,'',1,0,'C');

$pdf->SetDrawColor(0,0,0);
$pdf->SetFont("Arial","b",9);
$pdf->SetXY(132,23);
$pdf->Cell (25,7,utf8_decode('Fecha'),0,0,'C');
$pdf->SetXY(152,23);
$pdf->Cell (25,7,utf8_decode('Hora'),0,0,'C');

$pdf->SetXY(110,28);
$pdf->Cell (25,7,utf8_decode('Levantamiento'),1,1,'C');
$pdf->SetXY(110,35);
$pdf->Cell (25,7,utf8_decode('Solución'),1,1,'C');

$pdf->SetFont("Arial","",9);
$pdf->SetXY(135,28);
$pdf->Cell (20,7,utf8_decode($reg['datetime_inicio_sgc']),1,1,'C', true); # Fecha Levantamiento
$pdf->SetXY(135,35);
$pdf->Cell (20,7,utf8_decode($reg['datetime_fin_sgc']),1,1,'C', true); # Fecha Solución
$pdf->SetXY(155,28);
$pdf->Cell (20,7,utf8_decode($reg['hora']),1,1,'C', true); # Hora Levantamiento
$pdf->SetXY(155,35);
$pdf->Cell (20,7,utf8_decode($reg['hora_solucion']),1,1,'C', true); # Hora Solución

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(12,65);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (40,10,'Estado del Ticket',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (31,7,utf8_decode($reg['estado_ticket']),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,80);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Usuario',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['nombre_usuario']),1,1,'L');

$pdf->SetXY(15,90);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('Área'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (65,7,utf8_decode($reg['area']),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,99);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,utf8_decode('Identificación'),0,0,'C');
$pdf->SetXY(15,103);
$pdf->Cell (35,7,utf8_decode('del Equipo'),0,0,'C');
$pdf->SetXY(50,100);
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['equipo']),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,111);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Tipo de Falla',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(50,112);
$pdf->Cell (100,7,utf8_decode($reg['tipo']),1,1,'L');

$asunto = utf8_decode($reg['asunto']);
$asunto_up = strtoupper($asunto);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,122);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Falla reportada',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(50,123);
$pdf->Cell (120,7, utf8_decode($asunto_up),1,1,'L');

$mensaje = utf8_decode($reg['mensaje']);
$mensaje_low = strtolower($mensaje);
$mensaje_parse = ucfirst($mensaje_low);
$mensaje_wordwrap = wordwrap($mensaje_parse, 500, "\n", false);
$mensaje_substr = substr($mensaje_wordwrap, 0, 400);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(14,135);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('Descripción de la falla'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(50,135);
$pdf->Cell (135,25,'',1,1,'C');
$pdf->SetXY(53,136);
$pdf->MultiCell (130,4,utf8_decode($mensaje_substr),0,1,'L');

$seguimiento = utf8_decode($reg['estatus']);
$seg_low = strtolower($seguimiento);
$seg_parse = ucfirst($seg_low);
$seg_wordwrap = wordwrap($seg_parse, 500, "\n", false);
$seg_substr = substr($seg_wordwrap, 0, 300);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,165);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Seguimiento',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,27,'',1,1,'C');
$pdf->SetXY(53,168);
$pdf->MultiCell (120,5,utf8_decode($seg_substr),0,1,'L');

$solucion = utf8_decode($reg['solucion']);
$solu_low = strtolower($solucion);
$solu_parse = ucfirst($solu_low);
$solu_wordwrap = wordwrap($solu_parse, 500, "\n", false);
$solu_substr = substr($solu_wordwrap, 0, 330);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,200);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('Solución'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,25,'',1,1,'C');
$pdf->SetXY(53,203);
$pdf->MultiCell (120,5,utf8_decode($solu_substr),0,1,'L');

$pdf->SetXY(11,228);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (40,10,utf8_decode('Ingeniero de Soporte'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(50,229);
$pdf->Cell (50,7,utf8_decode($reg['observaciones']),1,1,'L');

$pdf->SetY(249);
$pdf->SetFont('Arial','I',8);
$pdf->SetX(160);
$pdf->Cell (30,10, 'Rev.6; 06/25 FV-05-7-003' ,0,0,'C');
				
$pdf->Ln();
$pdf->output('I',utf8_decode($reg['serie'].' - '.$reg['datetime_fin_sgc']).'.pdf');