<?php include_once("../connection.php");
include_once("../../fpdf/fpdf.php");
class PDF extends FPDF
{
    function Header()
    {   $this->Image('../../coop.png',10,6,30);
        $this->SetFont('Arial','B',13);
        $this->Cell(144);
        $this->Cell(40,10,'Temperatuurid',0,0,'C');
        $this->Ln(20);
        
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Leht '.$this->PageNo().'',0,0,'C');

    }
}
if(isset($_POST['generate_pdf'])) {
    $algus_aeg = $_POST['algus_kuupaev'];
    $lopp_aeg = $_POST['lopp_kuupaev'];
} else {
    echo 'Pole vajutatud PDF nuppu, mine tagasi.';
    return;
}

$display_heading = array('reading_time'=>'Kellaaeg', 'device'=>'Seadme nimetus', 'temperature'=>'Temperatuur', 'humidity'=>'Niiskus %',);
$result = mysqli_query($conn, "SELECT reading_time, device, temperature, humidity FROM temp WHERE reading_time >= '" . $algus_aeg . "' AND reading_time <= '" . $lopp_aeg . "' ORDER BY id DESC");
$header = mysqli_query($conn, "SHOW columns FROM temp");
echo $heading['field'];
// Instantiate and use the FPDF class  
 $pdf = new PDF(); 
  
//Add a new page 
$pdf->AddPage(); 
 
$pdf->AliasNbPages();
// Set the font for the text 
$pdf->SetFont('Arial', 'B', 10); 
foreach($display_heading as $thisHeading) {
    $pdf->Cell(47, 15, $thisHeading, 1); 
}
foreach($result as $row) {
    $pdf->Ln();

    foreach($row as $key => $column) {
        if ($key == 'temperature') {
            $column .= iconv('UTF-8', 'windows-1252', "°C");
        }
        if ($key == 'humidity') {
            $column .= '%';
        }

        $pdf->Cell(47, 10, $column, 1);
        
    }
}
  
// return the generated output 
$pdf->Output(); 


?>
