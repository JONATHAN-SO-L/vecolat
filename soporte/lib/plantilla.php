<?php
	
	require 'fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/base.png', 10, 5, 50 );
			$this->SetFont('Arial','B',15);
			$this->Cell(0,10, 'VECO S.A de C.V',0,0,'C');
			$this->Ln(10);
			$this->SetFillColor(232,232,232);
			$this->SetFont('Arial', 'I', 12);
			$this->Cell(200);
			$this->Cell(30,5,'Fecha:',1,0,'C',1);
			$this->Cell(40,5, date('d/m/Y'),1,0,'C');
			$this->Ln(5);
			$this->Cell(200);
			$this->Cell(30,5,'Folio: ',1,0,'C',1);
			$this->Cell(40,5,'',1,0,'C');
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
	$this->Cell(30,10,'REV. 4; 05/18 FV-04-8-008',0,0,'C');
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}		
	}
?>