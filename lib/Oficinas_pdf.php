<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';
header('Content-Type: text/html; charset=UTF-8');

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM ticket WHERE id= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$nomcom = Mysql::consulta("SELECT nombre, email_admin, nombre_comp FROM ticket, admin_soporte, usuario_sop WHERE ticket.observaciones = admin_soporte.nombre AND admin_soporte.email_admin = usuario_sop.email_usuario AND ticket.serie = '$id'");
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

$serie = utf8_decode($reg['serie']);
$fecha = utf8_decode($reg['datetime_inicio_sgc']);
$hora = utf8_decode($reg['hora']);
$estado_ticket = utf8_decode($reg['estado_ticket']);
$fecha_solucion = utf8_decode($reg['datetime_fin_sgc']);
$hora_solucion = utf8_decode($reg['hora_solucion']);
$nombre_usuario = utf8_decode($reg['nombre_usuario']);
$email_cliente = utf8_decode($reg['email_cliente']);
$area = utf8_decode($reg['area']);
$equipo = utf8_decode($reg['equipo']);
$tipo = utf8_decode($reg['tipo']);
$asunto = utf8_decode($reg['asunto']);
$mensaje = utf8_decode($reg['mensaje']);
$estatus = utf8_decode($reg['estatus']);
$solucion = utf8_decode($reg['solucion']);
$observaciones = utf8_decode($reg['observaciones']);

$pdf->SetTextColor(2,5,6);
$pdf->SetFillColor(203, 208, 211);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont("Arial","b",9);
$pdf->Image('../img/Logo-DV-final.png',25,20,45);
$pdf->SetXY(45,20);
$pdf->Cell (0,5,utf8_decode('Reporte de conformidad de Solución a Ticket en Oficinas'),0,1,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetXY(30,52);
$pdf->Cell (0,5,utf8_decode('Información del Ticket # '.$serie),0,1,'C');

$pdf->SetDrawColor(18, 139, 240);
$pdf->SetXY(12,50);
$pdf->Cell (190,190,'',1,0,'C');
$pdf->SetXY(12,50.3);
$pdf->Cell (190,10,'',1,0,'C');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(110,28);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (46,7,'Fecha de levantamiento',1,1,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(156,28);
$pdf->Cell (35,7,utf8_decode($fecha),1,1,'C', true);
$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(110,35);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (46,7,'Hora de levantamiento',1,1,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(156,35);
$pdf->Cell (35,7,utf8_decode($hora),1,1,'C', true);

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(12,65);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (40,10,'Estado del Ticket',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (25,7,utf8_decode($estado_ticket),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(80,65);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (30,10,utf8_decode('Hora Solución'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (25,7,utf8_decode($hora_solucion),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(140,65);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (30,10,utf8_decode('Fecha Solución'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (20,7,utf8_decode($fecha_solucion),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,80);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Nombre',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($nombre_usuario),1,1,'L');

$pdf->SetXY(15,90);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Email',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (65,7,utf8_decode($email_cliente),1,1,'L');

$pdf->SetXY(110,90);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (25,10,utf8_decode('Área'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (50,7,utf8_decode($area),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,100);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Equipo',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($equipo),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,110);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Tipo',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($tipo),1,1,'L');

/*$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,120);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Prioridad',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['prioridad']),1,1,'L');
*/

$asunto_up = strtoupper($asunto);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,120);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Asunto',0,0,'C');
$pdf->SetFont("Arial","",9);
//$pdf->Cell (135,25,'',1,1,'C');
$pdf->SetXY(50,123);
$pdf->Cell (120,7, utf8_decode($asunto_up),1,1,'L');

$mensaje_low = strtolower($mensaje);
$mensaje_parse = ucfirst($mensaje_low);
$mensaje_wordwrap = wordwrap($mensaje_parse, 500, "\n", false);
$mensaje_substr = substr($mensaje_wordwrap, 0, 300);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,135);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Mensaje ',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,25,'',1,1,'C');
$pdf->SetXY(53,136);
$pdf->MultiCell (130,4,utf8_decode($mensaje_substr),0,1,'L');

$seg_low = strtolower($estatus);
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

$solu_low = strtolower($solucion);
$solu_parse = ucfirst($solu_low);
$solu_wordwrap = wordwrap($solu_parse, 500, "\n", false);
$solu_substr = substr($solu_wordwrap, 0, 300);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,200);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('Solución'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,25,'',1,1,'C');
$pdf->SetXY(53,203);
$pdf->MultiCell (120,5,utf8_decode($solu_substr),0,1,'L');

			/*....:::::Foote:::::.....*/
			$pdf->SetFillColor(203, 208, 211);
			$pdf->SetXY(12,230);
			$pdf->Cell (190,5,'Cuadro de Firmas ',1,0,'C',true);
			$pdf->SetXY(12,235);
			$pdf->Cell (95,5,utf8_decode('Resolvió Ticket'),1,0,'C',true);
			$pdf->SetXY(107,235);
			$pdf->Cell (95,5,utf8_decode('Conformidad del usuario'),1,0,'C',true);
			$pdf->SetXY(107,240);
			$pdf->Cell (95,15,utf8_decode($reg['nombre_usuario']),0,0,'C');

			$pdf->SetXY(12,235);
			$pdf->Cell (95,15, '' ,1,0,'C');
			$pdf->SetXY(12,240);
			$pdf->Cell (95,15,utf8_decode($reg['observaciones']),0,0,'C');
			$pdf->SetXY(107,235);
			$pdf->Cell (95,15,'',1,0,'C');			



			$pdf->SetY(249);
			// Arial italic 8
			$pdf->SetFont('Arial','I',8);
			// Número de página
			$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
				$pdf->SetX(160);
					$pdf->Cell (30,10, 'Rev. 1:06/20 FDV-T-005' ,0,0,'C');
				
$pdf->Ln();
$pdf->output();