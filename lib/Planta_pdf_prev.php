<?php
require "./fpdf/fpdf.php";
include './class_mysql.php';
include './config.php';

$id = MysqlQuery::RequestGet('id');
$sql = Mysql::consulta("SELECT * FROM sop_preventivo WHERE serie= '$id'");
$reg = mysqli_fetch_array($sql, MYSQLI_ASSOC);

$new_sql = Mysql::consulta("SELECT nombre, email_admin, nombre_comp FROM sop_preventivo, admin_soporte, usuario_sop WHERE sop_preventivo.solucion_admin = admin_soporte.email_admin AND admin_soporte.email_admin = usuario_sop.email_usuario AND sop_preventivo.serie = '$id'");
$res = mysqli_fetch_array($new_sql, MYSQLI_ASSOC);

$equipo = $reg['equipo'];
$mantto_exe = $reg['fecha_mant']; 

$query_serial = Mysql::consulta("SELECT * FROM equipo_usuario, sop_preventivo WHERE sop_preventivo.email_cliente = equipo_usuario.email_usuario AND equipo_usuario.nombre_comp = sop_preventivo.usuario AND sop_preventivo.equipo = equipo_usuario.equipo and sop_preventivo.serie = '$id'");
$serial_cal = mysqli_fetch_array($query_serial, MYSQLI_ASSOC);

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
$pdf->SetXY(50,15);
$pdf->Cell (0,5,utf8_decode(''),0,1,'C');
$pdf->SetXY(53,20);
$pdf->Cell (165,15,utf8_decode('Orden de Mantenimiento Preventivo'),0,1,'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetXY(30,52);
$pdf->Cell (160,7,utf8_decode('Mantenimiento Preventivo # '.utf8_decode($reg['serie'])),0,1,'C');

$pdf->SetDrawColor(18, 139, 240);
$pdf->SetXY(12,50);
$pdf->Cell (190,190,'',1,0,'C');
$pdf->SetXY(12,50.3);
$pdf->Cell (190,10,'',1,0,'C');

$originalDate1=$reg['fecha'];
$original1 = date("d/m/Y", strtotime($originalDate1));
$fecha = $original1;

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(10,65);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (45,8,'Estado del Ticket',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(50,65);
$pdf->Cell (40,7,utf8_decode($reg['estado_ticket']),1,1,'L');


$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,80);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,'Nombre del Usuario',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['usuario']),1,1,'L');

$pdf->SetXY(15,95);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,utf8_decode('Correo Electrónico'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['email_cliente']),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,110);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,utf8_decode('Número de Serie'),0,0,'C');
$pdf->SetXY(15,113);
$pdf->Cell (35,7,utf8_decode('del Equipo'),0,0,'C');
$pdf->SetXY(50,111);
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['equipo']),1,1,'L');

/*$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,110);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,'Serie Calidad',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($serial_cal['num_serie']),1,1,'L');*/

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,125);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,utf8_decode('Fecha de Ejecución'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['date_hecho_sgc']),1,1,'L');


$asunto= utf8_decode($reg['asunto']);
$mantenimiento= utf8_decode($reg['mantenimiento']);
$observaciones= $reg['observaciones'];

$mantto_wordwrap = wordwrap($mantenimiento, 60, "\n", false);
$mantto_substr = substr($mantto_wordwrap, 0, 500);

/************************************************************************************************************* 
*							       	Encabezado de las casillas de verificación								 *
*************************************************************************************************************/
$pdf->SetXY(134,137.5);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('Aplica'),0,0,'C');

$pdf->SetXY(154,137.5);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('N/A'),0,0,'C');

/************************************************************************************************************* 
*														Casillas											 *
*************************************************************************************************************/
// Actividad 1
$pdf->SetXY(150,146);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,146);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 2
$pdf->SetXY(150,151);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,151);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 3
$pdf->SetXY(150,157);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,157);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 4
$pdf->SetXY(150,161);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,161);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 5
$pdf->SetXY(150,165);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,165);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 6
$pdf->SetXY(150,169);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,169);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 7
$pdf->SetXY(150,173);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,173);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 8
$pdf->SetXY(150,177);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,177);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 9
$pdf->SetXY(150,181);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,181);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 9
$pdf->SetXY(150,185);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,185);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

// Actividad 10
$pdf->SetXY(150,189);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,189);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');

/*************************************************************************************************************/

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,140);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Actividades a realizar',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,55,'',1,0,'C');
$pdf->SetXY(52,145);
$pdf->MultiCell (97,4,utf8_decode($mantto_substr),0,0,'L');

$obs_low = strtolower($observaciones);
$obs_parse = ucfirst($obs_low);
$obs_wordwrap = wordwrap($obs_parse, 85, "\n", false);
$obs_substr = substr($obs_wordwrap, 0, 400);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,200);
$pdf->SetFont("Arial","b",9);
$pdf->MultiCell (30,10,'Observaciones',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(50,200);
$pdf->Cell (135,20,'',1,1,'C');
$pdf->SetXY(52,202);
$pdf->MultiCell (120,4,utf8_decode($reg['observaciones']),0,1,'L');

			/*....:::::Footer:::::.....*/
			$pdf->SetFillColor(203, 208, 211);
			$pdf->SetXY(12,230);
			$pdf->Cell (190,5,'Cuadro de Firmas ',1,0,'C',true);
			$pdf->SetXY(12,235);
			$pdf->Cell (95,5,utf8_decode('Resolvió Ticket'),1,0,'C',true);
			$pdf->SetXY(107,235);
			$pdf->Cell (95,5,utf8_decode('Conformidad del usuario'),1,0,'C',true);
			$pdf->SetXY(107,245);
			$pdf->Cell (95,5,utf8_decode($reg['usuario']),0,0,'C');

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
			$pdf->Cell(0,10,utf8_decode('Página '.$pdf->PageNo().'/{nb}'),0,0,'C');
				$pdf->SetX(160);
					$pdf->Cell (30,10, 'REV. 0;10/23 FV-05-7-005' ,0,0,'C');
				
$pdf->Ln();
$pdf->output();