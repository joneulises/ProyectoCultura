<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
 
    <script>
    window.location.replace("index.php");
    </script>
</head>
</html>

<?php
require('fpdf/fpdf.php');
date_default_timezone_set('America/El_Salvador');
// Creación del objeto de la clase heredada
//

    //Datos de Responsable 
    $nombre_res = trim($_POST['nombre_res']);
    $ape_res =  trim($_POST['apellido_res']);
    $parentesco =  trim($_POST['parentesco']);
    $numero_res = trim($_POST['telefono_res']);

    //Datos de Alumno 

    $nombre_alumno = trim($_POST['nombre']);
    $apellido_alumno = trim($_POST['apellido']);
    $fecha_alumno = $_REQUEST['fechanac'];
    $municipio_alumno = trim($_POST['municipio']);
    $sexo_alumno = trim($_POST['sexo']);
    $zona_alumno = trim($_POST['canton']);
    $canton_alumno = trim($_POST['canton']);
    $direccion_alumno = trim($_POST['direccion']);
    $telefono_alumno = trim($_POST['phone']);
    $taller_alumno = trim($_POST['taller']);

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('helvetica', 'B', 13);
    // Movernos a la derecha
    $this->Cell(60);
  $this->SetTextColor(30,30,32);
  $this->Text(70, 15, 'COMPROBANTE DE INSCRIPCION');
  /* --- Line --- */

   $this->SetLineWidth(8); //antes de dibujar la linea
    $this->setDrawColor(24,68,104);
    $this->Line(0, 0, 500, 0);
    // Salto de línea
     $this->Ln(10);
}

// Pie de página
function Footer()
{
        $this->SetY(-15);
        $this->SetFont('Arial','B',8);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y') ,00,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("Facultad Multidisciplinaria Paracentral - Universidad de El Salvador. © Todos los derechos reservados."),0,0,"C");
        
}

var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
        //Save the current POSTtion
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h,'FD');
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a,1);
        //Put the POSTtion to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
        $this->setX(20);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

 //***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='', $scale=false, $force=true)
    {
        //Get string width
        $str_width=$this->GetStringWidth($txt);
 
        //Calculate ratio to fit cell
        if($w==0)
            $w = $this->w-$this->rMargin-$this->x;
        $ratio = ($w-$this->cMargin*2)/$str_width;
 
        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit)
        {
            if ($scale)
            {
                //Calculate horizontal scaling
                $horiz_scale=$ratio*100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET',$horiz_scale));
            }
            else
            {
                //Calculate character spacing in points
                $char_space=($w-$this->cMargin*2-$str_width)/max($this->MBGetStringLength($txt)-1,1)*$this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET',$char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align='';
        }
 
        //Pass on to Cell method
        $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link);
 
        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT '.($scale ? '100 Tz' : '0 Tc').' ET');
    }
 
    function CellFitSpace($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link='')
    {
        $this->CellFit($w,$h,$txt,$border,$ln,$align,$fill,$link,false,false);
    }
 
    //Patch to also work with CJK double-byte text
    function MBGetStringLength($s)
    {
        if($this->CurrentFont['type']=='Type0')
        {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++)
            {
                if (ord($s[$i])<128)
                    $len++;
                else
                {
                    $len++;
                    $i++;
                }
            }
            return $len;
        }
        else
            return strlen($s);
    }
}
//------------------------------------------------------------------------------------------------
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln();

$pdf->SetXY(15, 35);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'INFORMACION PERSONAL', 0, 1, 'C', false);
$pdf->Line(15, 40, 192, 40);
$pdf->Ln(10);

$pdf->SetX(10);
$pdf->Cell(0, 4, 'NOMBRE: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, utf8_decode($nombre_alumno.' '.$apellido_alumno), 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'FECHA DE NACIMIENTO: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $fecha_alumno, 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'SEXO: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $sexo_alumno, 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'MUNICIPIO: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $municipio_alumno, 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'CANTON: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $canton_alumno, 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'DIRECCION: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $direccion_alumno, 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'TELEFONO: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $telefono_alumno, 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'TALLER: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $taller_alumno, 0, 1, 'L', false);
$pdf->Ln(25);


$pdf->SetXY(20, 150);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'DATOS DEL REPONSABLE', 0, 1, 'C', false);
$pdf->Line(20, 155, 192, 155);
$pdf->Ln(10);

$pdf->SetX(10);
$pdf->Cell(0, 4, 'NOMBRE: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, utf8_decode($nombre_res. ' ' .$ape_res), 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'PARENTESCO: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $parentesco, 0, 1, 'L', false);
$pdf->Ln(5);

$pdf->SetX(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 4, 'TELEFONO: ', 0, 1, 'L', false);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 4, $numero_res, 0, 1, 'L', false);

$pdf->Output('D','Comprobante de Inscripcion.pdf');
?>