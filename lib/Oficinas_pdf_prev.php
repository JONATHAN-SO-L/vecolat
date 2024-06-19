<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
 ?>
<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM sop_preventivo WHERE serie= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$new_sql = Mysql::consulta("SELECT nombre, email_admin, nombre_comp FROM sop_preventivo, admin_soporte, usuario_sop WHERE sop_preventivo.solucion_admin = admin_soporte.email_admin AND admin_soporte.email_admin = usuario_sop.email_usuario AND sop_preventivo.serie = '$id'");
$res = mysqli_fetch_array($new_sql, MYSQLI_ASSOC);

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
$pdf->Image('../img/Logo-DV-final.png',25,20,45);
$pdf->SetXY(50,15);
$pdf->Cell (0,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(53,20);
$pdf->Cell (0,5,utf8_decode('Reporte de conformidad a mantenimiento preventivo'),0,1,'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetXY(30,52);
$pdf->Cell (0,5,utf8_decode('Información del Mantenimiento # '.utf8_decode($reg['serie'])),0,1,'C');

$pdf->SetDrawColor(18, 139, 240);
$pdf->SetXY(12,50);
$pdf->Cell (190,190,'',1,0,'C');
$pdf->SetXY(12,50.3);
$pdf->Cell (190,10,'',1,0,'C');

$originalDate1=$reg['fecha'];
$original1 = date("d/m/Y", strtotime($originalDate1));
$fecha = $original1;

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(110,30);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (46,7,'Fecha Programada',1,1,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(156,30);
$pdf->Cell (25,7,utf8_decode($fecha),1,1,'C', true);

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(12,65);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (45,10,'Estado del Ticket',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (40,7,utf8_decode($reg['estado_ticket']),1,1,'L');

/*$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(110,65);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Fecha Solucion',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (40,7,utf8_decode($reg['fecha_mant']),1,1,'L');*/

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,80);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Nombre',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['usuario']),1,1,'L');

$pdf->SetXY(15,90);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Email',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['email_cliente']),1,1,'L');


$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,100);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Equipo',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['equipo']),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,110);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Fecha del Mto',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['fecha_mant']),1,1,'L');

$asunto= utf8_decode($reg['asunto']);
$mantenimiento= utf8_decode($reg['mantenimiento']);
$observaciones= utf8_decode($reg['observaciones']);

$asunto_low = strtolower($asunto);
$asunto_parse = ucfirst($asunto_low);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,120);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Asunto',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,25,'',1,1,'C');
$pdf->SetXY(53,123);
$pdf->MultiCell (120,7,utf8_decode($asunto_parse),0,1,'L');

$mantto_wordwrap = wordwrap($mantenimiento, 85, "\n", false);
$mantto_substr = substr($mantto_wordwrap, 0, 400);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,150);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Mantenimiento',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,37,'',1,1,'C');
$pdf->SetXY(53,153);
$pdf->MultiCell (120,4,utf8_decode($mantto_substr),0,1,'L');

$obs_low = strtolower($observaciones);
$obs_parse = ucfirst($obs_low);
$obs_wordwrap = wordwrap($obs_parse, 85, "\n", false);
$obs_substr = substr($obs_wordwrap, 0, 400);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,190);
$pdf->SetFont("Arial","b",9);
$pdf->MultiCell (30,4,'Observaciones del mantenimiento',0,0,'R');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(51.5,190);
$pdf->Cell (135,25,'',1,1,'C');
$pdf->SetXY(53,192);
$pdf->MultiCell (120,4,$obs_substr,0,1,'L');

			/*....:::::Foote:::::.....*/
			$pdf->SetFillColor(203, 208, 211);
			$pdf->SetXY(12,230);
			$pdf->Cell (190,5,'Cuadro de Firmas ',1,0,'C',true);
			$pdf->SetXY(12,235);
			$pdf->Cell (95,5,utf8_decode('Resolvió Ticket'),1,0,'C',true);
			$pdf->SetXY(107,235);
			$pdf->Cell (95,5,utf8_decode('Conformidad del usuario'),1,0,'C',true);
			$pdf->SetXY(107,245);
			$pdf->Cell (95,5,$reg['usuario'],0,0,'C');

			$pdf->SetXY(12,235);
			$pdf->Cell (95,15, '' ,1,0,'C');
			$pdf->SetXY(12,240);
			$pdf->Cell (95,15,utf8_decode($res['nombre']),0,0,'C');
			$pdf->SetXY(107,235);
			$pdf->Cell (95,15,'',1,0,'C');			



			$pdf->SetY(249);
			// Arial italic 8
			$pdf->SetFont('Arial','I',8);
			// Número de página
			$pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
				$pdf->SetX(160);
					$pdf->Cell (30,10, 'REV. 5; 09/23 FV-05-7-003' ,0,0,'C');
				
$pdf->Ln();
$pdf->output();