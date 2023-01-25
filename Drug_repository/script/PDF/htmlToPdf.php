<?php

require __DIR__.'../../../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$html2pdf = new Html2Pdf();
$html2pdf->addFont('bookantique', '', '../../vendor/tecnickcom/tcpdf/fonts/bookantique.php');
$html2pdf->addFont('bookantiquebold', 'B', '../../vendor/tecnickcom/tcpdf/fonts/bookantiquebold.php');

ob_start();
include './data.php';
$html_code = ob_get_clean();
$html2pdf->writeHTML($html_code);
$html2pdf->output();


?>