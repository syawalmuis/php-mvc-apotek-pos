<?php
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

//  var_dump($data['qrcode']);die;
class dtcpdf extends TCPDF
{
    public function footer()
    {
        $this->SetFont('helvetica', 'B', '10');
        $this->SetTextColor('160', '160', '160');
        $this->writeHTMLCell(118, 1, '', '', '<hr>', 0, 1);
        // $this->Cell(115, 1, 'Apotek_X', 0, 1, 'R');
        $this->SetFont('times', 'B', '9');
        $this->SetTextColor('96', '96', '96');
        $this->writeHTMLCell(115, 0, '', '86', '<p align="right">Apotek_X</p>', 0, 0);
        // $this->writeHTMLCell(115, 0, '', '89', '<p align="right" style="transform:rotateX(180deg)">Apotek_X</p>', 0, 0);
        // $this->SetFont('helvetica', 'B', '9');
        // $this->writeHTMLCell(115, 0, '', '87', '<p align="right">Apotek_X</p>', 0, 0);
    }
}
// create new PDF document
$pdf = new dtcpdf('L', 'mm', 'A6', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Card ' . $data['name']);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
// $pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    
    .title {
        color: grey;
        font-size: 18px;
        margin-bottom: 500px;
    }

    

    a {
        text-decoration: none;
        font-size: 22px;
        color: black;
    
</style>
<body>

<div class="card">
  <img src="/w3images/team2.jpg" alt="John" style="width:100%">
  <h1 class="title">John Doe</h1>
  <p class="title">Pinrang</p>
  <p>Ms.muis.launggu@gmail.com</p>
</div>

</body>
EOF;

// output the HTML content
// $pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage();

$pdf->SetFont('helvetica', 'B', 16);
$pdf->SetTextColor(32, 32, 32);
$pdf->Cell(118, 10, "User Card", 0, 1, 'C', 0, '', 0);

$pdf->SetFont('times', 'BI', 16);
$pdf->SetTextColor(64, 64, 64);
$pdf->Cell(118, 10, '      ' . $data['name'], 0, 1, '', 0, '', 0);
$pdf->SetFont('times', 'BI', 14);
$pdf->Cell(118, 10, '      ' . $data['email'], 0, 1, '');
$html = '
        <table>
        <tr>
            <td>' . $data['alamat'] . '</td>
            <td align="right"><img style="width:80px; " src="img/qrcode/user/' . $data['qrcode'] . '.png" alt=""></td>
        </tr>
        </table>
';
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

$pdf->writeHTMLCell(100, 0, '22', '', $html, 0, 1);




// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)

// $pdf->Image('img/tes2/tes64.png', '100', '', 25, 25, 'png', '', '', true);

$pdf->Output('Card ' . $data['name'] . '.pdf', 'I');
