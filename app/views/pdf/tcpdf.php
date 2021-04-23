<?php

$tes1 = 0;
$ttl = 0;
$tes = 0;
$no = 1;

// var_dump($_SESSION['pdf']);die;

//var_dump($_SESSION['pdf']); die;
foreach ($_SESSION['pdf'] as $print) :

    $cust = $print['cust_name'];
    $cash = $print['cash'];
    $inv = $print['invoice'];
    $code = $print['code'];
    $name = $print['name'];
    $price = $print['price'];
    $qty = $print['qty'];
    $date = $print['date'];
    $dsc = $print['dsc'];

    $tes1 += count(array($print['invoice']));
    $ttl += $price * $qty;

// var_dump($date);

endforeach;
$discount = $ttl * $dsc;
$gt = $ttl - ($ttl * $dsc);
$back = $cash - $gt;
if ($dsc > 0) {
    $dsc = '15%';
} else {
    $dsc = '0%';
}

class Pdft extends TCPDF
{
}

$pdf = new Pdft('P', 'mm', 'A5', true, 'UTF-8', false);

// set document information
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetTitle($inv);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 10, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set font

$pdf->AddPage();

// set cell padding

$pdf->SetFont('times', 'BI', 16);
$pdf->Cell(0, 10, "Apotek_X", 0, 1, 'C', 0, '', 0);

$pdf->SetFont('times', 'BI', 10);
$pdf->Cell(118, 0, "Jl. Poros Pinrang-Polman, Km. 32, 91253", 0, 1, 'C', 0, '', 0);
$pdf->Cell(118, 0, "Pinrang, Sulawesi Selatan", 0, 1, 'C');
$pdf->Cell(118, 0, "Indonesia", 0, 1, 'C');
$pdf->Cell(118, 10, '- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -', 0, 1, 'C');


$pdf->SetFont('times', 'BI', 11);
$pdf->Cell(118, 5, $inv, 0, 1, 'C');


$pdf->Cell(118, 5, '', 0, 1);

$pdf->SetFont('times', 'BI', 10);

$pdf->setCellMargins(10, 1, 10, 1);

$pdf->Cell(7, 1, 'Date', 0,);
$pdf->Cell(30, 1, ': ' . $date, 0, 1);

$pdf->Cell(7, 1, 'Kasir', 0,);
$pdf->Cell(30, 1, ': ' . $_SESSION['name'], 0, 1);

$pdf->Cell(7, 1, 'Customer', 0,);
$pdf->Cell(30, 1, ': ' . $cust, 0, 1);





$pdf->SetMargins(25, 0, 25, 0);

$pdf->setCellMargins(0, 0, 0, 0);


$pdf->Cell(98, 1, '', 0, 1, 'C');

$pdf->Cell(98, 1, '- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -', 0, 1, 'C');
$pdf->Cell(98, 1, '', 0, 1, 'C');

$pdf->Cell(48, 5, '    ' . 'Product', 0, 0, 'L');
$pdf->Cell(10, 5, 'Qty', 0, 0, 'C');
$pdf->Cell(40, 5, 'Price' . '    ', 0, 1, 'R');

$pdf->Cell(98, 1, '', 0, 1);


$tes5 = 0;
foreach ($_SESSION['pdf'] as $set) {
    //  $pdf->Cell(8, 3, $no++, 0, 0, 'C');
    $pdf->Cell(48, 3, '    ' . $set['name'] . '    ', 0, 0, 'L');
    $pdf->Cell(10, 3, $set['qty'] . '    ', 0, 0, 'C');
    $pdf->Cell(40, 3, 'Rp. ' . $set['price'] * $set['qty'] . '    ', 0, 1, 'R');
    $tes5 += $set['qty'];
}


//$pdf->writeHTMLCell(1, 0, '', '', $html, 0, 1);

$pdf->Cell(98, 10, '- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -', 0, 1, 'C');
$pdf->Cell(28, 5.5, '    ' . 'Total Item', 0, 0, 'L');
$pdf->Cell(10, 5.5, $tes5, 0, 0, 'C');
$pdf->Cell(60, 5.5, 'Rp. ' . $ttl . '    ', 0, 1, 'R');

$pdf->Cell(28, 5.5, '    ' . 'Discount', 0, 0, 'L');
$pdf->Cell(10, 5.5, $dsc, 0, 0, 'C');
$pdf->Cell(60, 5.5, 'Rp. ' . $discount . '    ', 0, 1, 'R');

$pdf->Cell(53, 5.5, '    ' . 'Total Belanja', 0, 0, 'L');
$pdf->Cell(45, 5.5, 'Rp. ' . $gt . '    ', 0, 1, 'R');

$pdf->Cell(53, 5.5, '    ' . 'Tunai', 0, 0, 'L');
$pdf->Cell(45, 5.5, 'Rp. ' . $cash . '    ', 0, 1, 'R');

$pdf->Cell(53, 7, '    ' . 'Kembalian', 0, 0, 'L');
$pdf->Cell(45, 7, 'Rp. ' . $back . '    ', 0, 1, 'R');
















// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($inv . '.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+