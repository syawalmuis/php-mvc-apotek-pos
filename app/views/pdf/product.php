<?php

class Pdft extends TCPDF
{
}

$pdf = new Pdft('L', 'mm', 'A4', true, 'UTF-8', false);

// set document information
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->SetTitle('Qrcode');

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

//  $pdf->Cell(8, 3, $no++, 0, 0, 'C');
$html =
    '
        <table>
  <tr>';
foreach ($data['pdf'] as $set) {
    // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

    // $pdf->Image('img/qrcode/product/' . $set['code'] . '.png', '5', '', 25, 25, 'png', '', '', true);

    $html .= '          <td align="center"><img style="width:120px; " src="img/qrcode/product/' . $set['code'] . '.png" alt="">
    <p>' . $set['code'] . '</p></td>
        ';
}
$html .= '</tr> </table>';

// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)



$pdf->writeHTMLCell(100, 0, '0', '0', $html, 0, 1);


//$pdf->writeHTMLCell(1, 0, '', '', $html, 0, 1);

















// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('qrcode.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+