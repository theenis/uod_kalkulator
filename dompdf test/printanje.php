<?php 
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = new Options();
$options->set('isJavascriptEnabled', TRUE);

$page = file_get_contents('template.html');
$dompdf = new Dompdf($options);
$dompdf->loadHtml($page);


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();


?>