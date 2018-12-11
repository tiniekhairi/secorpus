<?php
 
// Include Composer autoloader if not already done.
include 'pdfparser-master/vendor/autoload.php';
 
// Parse pdf file and build necessary objects.
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile('exam.pdf');
 
$text = $pdf->getText();
//echo $text;
 
echo substr_count($text, 'software');
?>