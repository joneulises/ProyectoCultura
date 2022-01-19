<?php

require './con_db.php';
$con = conectar();

///********************plantilla encabezado******************
require './fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {
        $this->Ln(10);
       // $this->Image('./images/img_casacultura/logo.png', 250, 10, 30);
        $this->Image('./images/img_casacultura/logo.png', 100, 10, 30);
        //$this->Image('images/ayuda.PNG', 0,0,600,600);

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(40, 6, '', 0, 0, 'C');
        $this->SetTextColor(0);
        $this->SetDrawColor(231, 169, 249);
        $this->SetLineWidth(1.5);
        $this->Cell(250, 10, 'Casa de la cultura San Vicente', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(30);
        $this->Cell(250, 10, 'Listado de eventos', 0, 0, 'C');

 
        $this->SetDrawColor(0, 80, 180);
        $this->SetFillColor(230, 230, 0);
        $this->SetTextColor(220, 50, 50);
        // Ancho del borde (1 mm)
        $this->SetLineWidth(1);
        #Establecemos los márgenes izquierda, arriba y derecha: 
        $this->SetMargins(30, 25, 30);

#Establecemos el margen inferior: 
        $this->SetAutoPageBreak(true, 25);
        // Título
        // Salto de línea
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}


//****************************fin de la plantilla encabezado.******************
$reporte = mysqli_query($con, "SELECT
tb_eventos.nombre_evento, 
DATE_FORMAT(tb_eventos.fecha_evento,'%d/%m/%y') AS fecha, 
tb_eventos.hora_evento, 
tb_eventos.direccion_evento, 
tb_cantones.nombre_canton
FROM
tb_eventos
INNER JOIN
tb_cantones
ON 
    tb_eventos.id_canton = tb_cantones.id_canton  ");

$pdf = new PDF('L','mm','Legal');//tamano oficio horizontal PDF()= carta vertical
$pdf->AliasNbPages();
$pdf->AddPage();
//Para los grados
//$pdf->Cell(30);
$pdf->Ln(20);
     
$pdf->SetFillColor(204,220,255 );
$pdf->SetFont('Arial', 'B', 11);
//ENCABEZADO DE LA TABLA

$pdf->Cell(75, 6, utf8_decode ('NOMBRE'),       1, 0, 'C', 1);
$pdf->Cell(60, 6, 'FECHA',     1, 0, 'C', 1);
$pdf->Cell(40, 6, 'HORA DE EVENTO',       1, 0, 'C', 1);
$pdf->Cell(65, 6, 'LOCALIDAD',       1, 0, 'C', 1);
$pdf->Cell(80, 6, utf8_decode('DIRECCIÓN DE EVENTO'), 1, 1, 'C', 1);


//BODY DE LA TABLA 
$pdf->SetFont('Arial', '', 10);


while ($row = $reporte->fetch_assoc()) {
    $pdf->Cell(75, 6,$row['nombre_evento'], 1, 0, 'C');
    $pdf->Cell(60, 6, $row['fecha'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['hora_evento'], 1, 0, 'C');
    $pdf->Cell(65, 6, $row['nombre_canton'], 1, 0, 'C');
    $pdf->Cell(80, 6, $row['direccion_evento'], 1, 1, 'C');
    
    ;
}

$pdf->Output();
?>