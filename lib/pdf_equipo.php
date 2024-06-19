<?php
/*
 * @author: Meraz Prudencio Griselda  
 * ghriz2811@gmail.com
 * @version: 04/2020 v1
 */
 ?>
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
$this->Image('../img/Logo-DV-final.png',25,20,45);

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
$this->SetFont("Arial","B",12);
$this->SetXY(237,29);
$this->Cell (30,7,utf8_decode(""),1,1,'C', true);
$this->SetXY(120,22);
$this->Cell (30,7,utf8_decode("Relación de Equipo de Computo"),0,0,'C');
$this->SetFont("Arial","",9);

$this->Ln(30);
    $this->Cell (50,7,"Usuario",1,0,'C',true);
    $this->Cell (37,7,utf8_decode("Área"),1,0,'C',true);
    $this->Cell (30,7,"Equipo",1,0,'C',true);
    $this->Cell (35,7,"Serie",1,0,'C',true);
    $this->Cell (20,7,"Marca",1,0,'C',true);
    $this->Cell (20,7,"Tipo",1,0,'C',true);
    $this->Cell (20,7,"Procesador",1,0,'C',true);
    $this->Cell (22,7,"Sistema",1,0,'C',true);
    $this->Cell (18,7,"HDD",1,0,'C',true);
    $this->Cell (18,7,"Ram",1,1,'C',true);
    }	
     function footer(){
    	$this->SetY(200);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
				$this->SetXY(240,200);
					$this->Cell (30,10, 'Rev. 0:06/20 FDV-T-001' ,0,0,'C');
     }
}


$pdf=new PDF('L','mm','A4');
$pdf->SetMargins(15,20);
$pdf->AliasNbPages();
$pdf->AddPage();
/*
$pdf->SetDrawColor(18, 139, 240);
$pdf->SetXY(12,10);
$pdf->Cell (190,35,'',1,0,'C');

$pdf->SetTextColor(2,5,6);
$pdf->SetFillColor(203, 208, 211);
$pdf->SetDrawColor(0,0,0);
$pdf->SetFont("Arial","b",9);
$pdf->Image('../img/Logo-DV-final.png',25,20,45);

$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(130,15);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (37,7,utf8_decode('Fecha emisión'),1,1,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(167,15);
$pdf->Cell (30,7,utf8_decode(""),1,1,'C', true);

$pdf->SetXY(130,22);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (37,7,utf8_decode('Fecha revisión'),1,1,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(167,22);
$pdf->Cell (30,7,utf8_decode(""),1,1,'C', true);

$pdf->SetXY(130,29);
$pdf->SetFont("Arial","b",9);
$pdf->Cell (37,7,utf8_decode('Vigencia'),1,1,'C');
$pdf->SetFont("Arial","",9);
$pdf->SetXY(167,29);
$pdf->Cell (30,7,utf8_decode(""),1,1,'C', true);
*/

	$usuario = "veco_dvi";
	$password = "Vec83Dv19iSa@";
	$servidor = "localhost";
	$basededatos = "veco_sims_devecchi";
	
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
	$conexion ->set_charset('utf8');
	$conexion->query("SET NAMES UTF8");
    $conexion->query("SET CHARACTER SET utf8");
	
	// Selección de la base de datos
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

	$consulta = "SELECT * from equipo_usuario 
	 inner join usuario_sop on equipo_usuario.nombre_comp=usuario_sop.id_usuario ";
	$reg = mysqli_query( $conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");

    while ($row = mysqli_fetch_array( $reg )){
    $pdf->Cell (50,7,$row['nombre_comp'],1,0,'C');
    $pdf->Cell (37,7,$row['area'],1,0,'C');
    $pdf->Cell (30,7,$row['equipo'],1,0,'C');
    $pdf->Cell (35,7,$row['num_serie'],1,0,'C');
    $pdf->Cell (20,7,$row['marca'],1,0,'C');
    $pdf->Cell (20,7,$row['tipo'],1,0,'C');
    $pdf->Cell (20,7,$row['procesador'],1,0,'C');
    $pdf->Cell (22,7,$row['sis_ope'],1,0,'C');
    $pdf->Cell (18,7,$row['disco'],1,0,'C');
    $pdf->Cell (18,7,$row['ram'],1,1,'C');
}


$pdf->Ln();
$pdf->output();