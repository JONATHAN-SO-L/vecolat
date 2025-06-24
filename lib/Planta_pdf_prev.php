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
$pdf->Cell (35,7,'Usuario',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (100,7,utf8_decode($reg['usuario']),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,94);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,utf8_decode('Identificación'),0,0,'C');
$pdf->SetXY(15,98);
$pdf->Cell (35,7,utf8_decode('del Equipo'),0,0,'C');
$pdf->SetXY(50,95);
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode($reg['equipo']),1,1,'L');

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(15,111);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,7,utf8_decode('Fecha de Ejecución'),0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (30,7,utf8_decode($reg['date_hecho_sgc']),1,1,'L');


$asunto= utf8_decode($reg['asunto']);
$mantenimiento= utf8_decode($reg['mantenimiento']);
$observaciones= $reg['observaciones'];

/************************************************************************************************************* 
*							       	Encabezado de las casillas de verificación								 *
*************************************************************************************************************/
$pdf->SetXY(134,121.5);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('Aplica'),0,0,'C');

$pdf->SetXY(154,121.5);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,utf8_decode('N/A'),0,0,'C');

/************************************************************************************************************* 
*														Casillas											 *
*************************************************************************************************************/
// Actividad 1
switch ($reg['actividad_1']) {
    case 'Aplica':
    $pdf->SetXY(150,129);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,129);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,129);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,129);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,129);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,129);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 2
switch ($reg['actividad_2']) {
    case 'Aplica':
    $pdf->SetXY(150,135);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,135);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,135);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,135);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,135);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,135);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 3
switch ($reg['actividad_3']) {
    case 'Aplica':
    $pdf->SetXY(150,140);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,140);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,140);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,140);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,140);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,140);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 4
switch ($reg['actividad_4']) {
    case 'Aplica':
    $pdf->SetXY(150,144);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,144);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,144);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,144);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,144);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,144);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 5
switch ($reg['actividad_5']) {
    case 'Aplica':
    $pdf->SetXY(150,148);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,148);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,148);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,148);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,148);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,148);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 6
switch ($reg['actividad_6']) {
    case 'Aplica':
    $pdf->SetXY(150,152);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,152);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,152);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,152);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,152);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,152);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 7
switch ($reg['actividad_7']) {
    case 'Aplica':
    $pdf->SetXY(150,156);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,156);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,156);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,156);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,156);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,156);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 8
switch ($reg['actividad_8']) {
    case 'Aplica':
    $pdf->SetXY(150,160);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,160);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,160);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,160);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,160);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,160);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 9
switch ($reg['actividad_9']) {
    case 'Aplica':
    $pdf->SetXY(150,164);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,164);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,164);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,164);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,164);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,164);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 10
switch ($reg['actividad_10']) {
    case 'Aplica':
    $pdf->SetXY(150,168);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,168);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,168);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,168);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,168);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,168);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 11
switch ($reg['actividad_11']) {
    case 'Aplica':
    $pdf->SetXY(150,172);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,172);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,172);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,172);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,172);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,172);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 12
switch ($reg['actividad_12']) {
    case 'Aplica':
    $pdf->SetXY(150,176);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    $pdf->SetXY(170,176);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;

    case 'N/A':
    $pdf->SetXY(150,176);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,176);
    $pdf->Cell (3,3,utf8_decode('X'),1,0,'C');
    break;
    
    default:
    $pdf->SetXY(150,176);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    $pdf->SetXY(170,176);
    $pdf->Cell (3,3,utf8_decode(''),1,0,'C');
    break;
}

// Actividad 13
/*$pdf->SetXY(150,197);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');
$pdf->SetXY(170,197);
$pdf->Cell (3,3,utf8_decode(''),1,0,'C');*/

/*************************************************************************************************************/
$mantto_wordwrap = wordwrap($mantenimiento, 60, "\n", false);
$mantto_substr = substr($mantto_wordwrap, 0, 555);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,125);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Actividades a realizar',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->Cell (135,62,'',1,0,'C');
$pdf->SetXY(52,128);
$pdf->MultiCell (97,4,utf8_decode($mantto_substr),0,0,'L');

$obs_low = strtolower($observaciones);
$obs_parse = ucfirst($obs_low);
$obs_wordwrap = wordwrap($obs_parse, 200, "\n", false);
$obs_substr = substr($obs_wordwrap, 0, 400);

$pdf->SetDrawColor(0,0,0);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(15,193);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Observaciones',0,0,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(50,193);
$pdf->Cell (135,20,'',1,1,'C');
$pdf->SetXY(52,194);
$pdf->MultiCell (120,4,utf8_decode($reg['observaciones']),0,1,'');

$pdf->SetXY(15,219);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (35,10,'Ingeniero de Soporte',0,0,'C');
$pdf->SetXY(50,220);
$pdf->SetFont("Arial","",9);
$pdf->Cell (50,7,utf8_decode($res['nombre']),1,1,'L');

$pdf->SetY(249);
$pdf->SetFont('Arial','I',8);
$pdf->SetX(160);
$pdf->Cell (30,10, 'REV.1; 06/25 FV-05-7-005' ,0,0,'C');
				
$pdf->Ln();
$pdf->output('I',utf8_decode($reg['serie'].' - '.$reg['date_hecho_sgc']).'.pdf');