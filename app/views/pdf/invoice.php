<?php
$tes1= 0;
$ttl = 0;
$tes = 0;


// var_dump($_SESSION['pdf']);die;

//var_dump($_SESSION['pdf']); die;
foreach ($_SESSION['pdf'] as $print):
    
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
$ttl += $price*$qty;

// var_dump($date);

endforeach;
$gt = $ttl - ($ttl * $dsc);
$back = $cash - $gt;
if ($dsc > 0) {
    $dsc = '15%';
} else {
    $dsc = '0%';
}




$html ='<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Invoice</title>
            <style>
            .td td, th {
            border: 1px solid black;
            border-collapse: collapse;
            }

            .table {
            width: 100%;
            }
            .tb th,td{
                padding: 7px;
                text-align: left;
            }
            </style>

            
        </head>

        <body>
            <h1 align="center">Apotek_X</h1>
            <h5 align="center">Jl. Poros Pinrang-Polman, Km. 32, 91253 <br>
                Pinrang, Sulawesi Selatan<br>
                Indonesia<h5>
                    <hr>
                    <form style="margin-left:100px;margin-right:100px;" >
                        <h2 align="center">'.$inv.'</h2>
                        <h3>Date    : '.$date.'</h3>
                        <h3>Kasir   : '.$_SESSION['name'].'</h3>
                        <h3>Customer: '.$cust.'</h3> <br> ';
                        $html .='<table class="table td tb">
                        <tr>
                            <th>No</th>
                            <!--<th>Code</th> -->
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>';
                        $no = 1;
                        foreach ($_SESSION['pdf'] as $set) {
                            $html .='      
                        <tr>
                                <td>'.$no++.'</td>
                                <!--<td>'.$set['code'].'</td>-->
                                <td>'.$set['name'].'</td>
                                <td style="text-align:right;">'.$set['qty'].'</td>
                                <td style="text-align:right;">Rp. '.$set['price']*$set['qty'].'</td>
                            </tr>
                        ';
                        }
                        $html .= '
                        <tr>
                            <td colspan="3" style="text-align:center;">Total</td>
                            <td style="text-align:right;">Rp. '.$ttl.'</td>
                        <tr>
                        </table>
                        

                        <br>

                        
                        <table  border="0" cellpadding="0" cellspacing="0" style="font-size:.8em">
                        <tr>
                            <td>Sub Total</td>
                            <td>:</td>
                            <td>Rp. '.$ttl.'</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                            <td colspan="4" style="text-align:left">Tunai</td>
                            <td>:</td>
                            <td>Rp. '.$cash.'</td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td>:</td>
                            <td>'.$dsc.'</td>
                            
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="4" style="text-align:left">Kembalian</td>
                            <td>:</td>
                            <td>Rp. '.$back.'</td>
                        </tr>
                        <tr>
                            <td>Grand Total</td>
                            <td>:</td>
                            <td>Rp. '.$gt.'</td>
                        </tr>
                        </table>
                                                
                    </form>

            </body>

            </html>';
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML($html);


// Output a PDF file directly to the browser
//var_dump($date);
$mpdf->Output();
?>

<table border="0" cellpadding="100" cellspacing="10">
    <tr>
        <td>Sub Total</td>
        <td>'.$ttl.'</td>
        <td>:</td>
    </tr>
    <tr>
        <td>Discount</td>
        <td>'.dsc.'</td>
    </tr>
    <tr>
        <td>Grand Total</td>
        <td>'.$gt.'</td>
    </tr>
</table>
tes1