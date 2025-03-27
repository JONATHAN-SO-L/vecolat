<?php
require './fpdf/fpdf.php';
include '../comercial/config/conex.php';

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
$this->Cell (30,7,utf8_decode("10ENE25"),1,1,'C', true);

$this->SetXY(200,22);
$this->SetFont("Arial","b",9);
$this->Cell (37,7,utf8_decode('Fecha revisión'),1,1,'C');
$this->SetFont("Arial","",9);
$this->SetXY(237,22);
$this->Cell (30,7,utf8_decode("10MAR26"),1,1,'C', true);

$this->SetXY(200,29);
$this->SetFont("Arial","b",9);
$this->Cell (37,7,utf8_decode('Vigencia'),1,1,'C');
$this->SetFont("Arial","",9);
$this->SetXY(237,29);
$this->Cell (30,7,utf8_decode("1 Año"),1,1,'C', true);
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
$pdf->SetMargins(12,0);
$pdf->AliasNbPages();
$pdf->AddPage();

/****************************
CONEXIÓN A EQUIPOS EN DEVINSA
****************************/
$buscar_equipos = $con->prepare("SELECT nombre_comp, area, ubicacion, equipo, num_serie, marca, procesador, sis_ope, disco, ram FROM equipo_usuario WHERE equipo != 'Celular' AND nombre_comp != 'Pruebas' AND equipo != 'Maquinaria' AND nombre_comp != 'Liz Villegas' Order by area ASC, num_serie");
$buscar_equipos->setFetchMode(PDO::FETCH_OBJ);
$buscar_equipos->execute();
$mostrar_equipos = $buscar_equipos->fetchAll();

if ($buscar_equipos -> rowCount() > 0) {
    foreach ($mostrar_equipos as $equipos) {
        $nombre_completo = $equipos -> nombre_comp;
        $area = $equipos -> area;
        $sede = $equipos -> ubicacion;
        $equipo = $equipos -> equipo;
        $num_serie = $equipos -> num_serie;
        $marca = $equipos -> marca;
        $procesador = $equipos -> procesador;
        $so = $equipos -> sis_ope;
        $almacenamiento = $equipos -> disco;
        $ram = $equipos -> ram;

        /********************************
        Configuración de ubicación / sede
        ********************************/
        switch ($sede) {
            case 'Oficinas':
                $sede = 'CDMX';
            break;
            case 'Planta':
                $sede = 'Morelos';
            break;
        }

        $pdf->Cell (50,7,utf8_decode($nombre_completo),1,0,'C');
        $pdf->Cell (40,7,utf8_decode($area),1,0,'C');
        $pdf->Cell (20,7,utf8_decode($sede),1,0,'C');
        $pdf->Cell (30,7,utf8_decode($equipo),1,0,'C');
        $pdf->Cell (25,7,utf8_decode($num_serie),1,0,'C');
        $pdf->Cell (20,7,utf8_decode($marca),1,0,'C');
        $pdf->Cell (20,7,utf8_decode($procesador),1,0,'C');
        $pdf->Cell (22,7,utf8_decode($so),1,0,'C');
        $pdf->Cell (28,7,utf8_decode($almacenamiento),1,0,'C');
        $pdf->Cell (18,7,utf8_decode($ram),1,1,'C');

    }
} else {
    echo 'No se lograron mostrar correctamente, error en conexión con servidor';
    echo '<script>console.log("ERROR 100: Fallo al mostrar datos, no se lograron mostrar correctamente, error en conexión con servidor")</script>';
}

$pdf->Ln();
$datetime_sgc = strftime('%d%b%y');
$pdf->output('I',utf8_decode('FV-05-7-002 Relación de Equipo de Cómputo ').$datetime_sgc.'.pdf');