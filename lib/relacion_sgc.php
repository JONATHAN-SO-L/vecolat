<?php
require "./fpdf/fpdf.php";

class PDF extends FPDF
{
function header(){
$this->SetDrawColor(18, 139, 240);
$this->SetXY(12,10);
$this->Cell (273,35,'',1,0,'C');

$this->SetTextColor(2,5,6);
$this->SetFillColor(203, 208, 211);
$this->SetDrawColor(0,0,0);
$this->SetFont("Arial","b",9);
$this->Image('../img/vecoo.png',25,7,45);

$this->SetDrawColor(0,0,0);
$this->SetXY(200,15);
$this->SetFont("Arial","b",9);
$this->Cell (37,7,utf8_decode('Fecha emisión'),1,1,'C');
$this->SetFont("Arial","",9);
$this->SetXY(237,15);
$this->Cell (30,7,utf8_decode(""),1,1,'C', true);

$this->SetXY(200,22);
$this->SetFont("Arial","b",9);
$this->Cell (37,7,utf8_decode('Fecha revisión'),1,1,'C');
$this->SetFont("Arial","",9);
$this->SetXY(237,22);
$this->Cell (30,7,utf8_decode(""),1,1,'C', true);

$this->SetXY(200,29);
$this->SetFont("Arial","b",9);
$this->Cell (37,7,utf8_decode('Vigencia'),1,1,'C');
$this->SetFont("Arial","",9);
$this->SetXY(237,29);
$this->Cell (30,7,utf8_decode(""),1,1,'C', true);
$this->SetXY(120,22);
$this->Cell (30,7,utf8_decode("Relación de Equipo de Cómputo"),0,0,'C');
$this->SetFont("Arial","",9);

$this->Ln(30);
$this->SetXY(12,52);
$this->Cell (50,7,"Usuario",1,0,'C',true);
$this->Cell (40,7,utf8_decode("Área"),1,0,'C',true);
$this->Cell (20,7,"Sede",1,0,'C',true);
$this->Cell (30,7,"Equipo",1,0,'C',true);
$this->Cell (25,7,"Serie Calidad",1,0,'C',true);
$this->Cell (20,7,"Marca",1,0,'C',true);
$this->Cell (20,7,"Procesador",1,0,'C',true);
$this->Cell (22,7,"S.O.",1,0,'C',true);
$this->Cell (28,7,"Almacenamiento",1,0,'C',true);
$this->Cell (18,7,"RAM",1,1,'C',true);
}	

function footer(){
$this->SetY(200);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Número de página
$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
$this->SetXY(240,200);
$this->Cell (30,10, 'REV. 8; 11/24 FV-05-7-002' ,0,0,'C');
}
}

$pdf=new PDF('L','mm','A4');
$pdf->SetMargins(15,20);
$pdf->AliasNbPages();
$pdf->AddPage();

// Fila 1
$pdf->SetXY(12,59);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 2
$pdf->SetXY(12,66);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 3
$pdf->SetXY(12,73);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 4
$pdf->SetXY(12,73);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 5
$pdf->SetXY(12,80);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 6
$pdf->SetXY(12,87);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 7
$pdf->SetXY(12,94);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 8
$pdf->SetXY(12,101);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 9
$pdf->SetXY(12,108);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 10
$pdf->SetXY(12,115);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 11
$pdf->SetXY(12,122);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 12
$pdf->SetXY(12,129);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 13
$pdf->SetXY(12,136);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 14
$pdf->SetXY(12,143);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 15
$pdf->SetXY(12,150);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 16
$pdf->SetXY(12,157);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 17
$pdf->SetXY(12,164);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

// Fila 18
$pdf->SetXY(12,171);
$pdf->Cell (50,7,'',1,0,'C');
$pdf->Cell (40,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (30,7,'',1,0,'C');
$pdf->Cell (25,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (20,7,'',1,0,'C');
$pdf->Cell (22,7,'',1,0,'C');
$pdf->Cell (28,7,'',1,0,'C');
$pdf->Cell (18,7,'',1,1,'C');

$pdf->Ln();

$datetime_sgc = strftime('%d%b%y');

$pdf->output('I',utf8_decode('Plantilla SGC FV-05-7-002 Relación de Equipo de Cómputo ').$datetime_sgc.'.pdf');