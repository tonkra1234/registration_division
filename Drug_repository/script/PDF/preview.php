<?php
require('../../resource/fpdf/fpdf.php');

$pdf = new FPDF();

$pdf->AddPage();

$image ='../../public/image/logo.png';
$image2 = '../../public/image/logo2.png';
$image3 = '../../public/image/center.png';
$pdf->SetFont('Arial','B',12);
$pdf->cell(50,37,$pdf->Image($image2, $pdf->GetX()+9, $pdf->GetY()+3, 32),0,0);
$pdf->Cell(90,37,$pdf->Image($image3, $pdf->GetX()+5, $pdf->GetY()+5, 80),0,0);
$pdf->cell(50,37,$pdf->Image($image, $pdf->GetX()+9, $pdf->GetY()+1, 32),0,1);
$pdf->Cell(190,12,'CERTIFICATE OF REGISTRATION OF MEDICINAL PRODUCT (S)',0,1,'C');
$pdf->Cell(190,12,'Registration No :',0,1);
$pdf->SetFont('Arial','',12);
$pdf->MultiCell(190,5,'The following medicinal product (s) is/are registered for sale/distribution in Bhutan under the provisions of the Medicines Act of the Kingdom of Bhutan 2003.',0,0);
$pdf->ln(5);
$pdf->MultiCell(190,5,'This registration is valid up to xx/xx/xxxx (three years from the date of issue) unless it is earlier canceled or suspended or revoked.',0,0);
$pdf->ln(5);
$pdf->Cell(45,24,'Name of the Product',1,0,'C');
$pdf->Cell(72.5,10,'Generic Name',1,0,'C');
$pdf->Cell(72.5,10,'Trade Name',1,1,'C');
$pdf->SetX(55);
$pdf->Cell(72.5,14,'xxxxxxxxxxx',1,0,'L');
$pdf->Cell(72.5,14,'xxxxxxxxxxx',1,1,'L');
$pdf->Cell(45,65,'Strength with Composition',1,0);
$pdf->MultiCell(72.5,65,'Generic Name',1,1);
$pdf->Output();
?>