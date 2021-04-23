<?php 

$oto = $data['oto']['inv'];
$urutan = (int) substr($oto, 21, 6);

//Invoice-2020-07-05-AX000001
$urutan ++;
$huruf = 'AX';
$inv = $huruf.sprintf("%06s",$urutan);


$tb=0; $no=1; $unik = uniqid(); foreach($data['product'] as $pr) : 

                            
    $price = $pr['price'];
    $qty = $pr['qty'];
   // $dsc = $pr['dsc'];
    $ttl = ($price * $qty);// - ($price * $qty* $dsc);
    //if ($dsc == 0){
    //     $dscv = '0%';
    // }else{
    //     $dscv = '15%';
    // }
    

$tb += $ttl;
endforeach;?>
<div class="card shadow bg-light rounded">
    <div class="card-body">
        <form action="">
            <div align="right">
                <h5 class="title mt-2" style="font-family: Arial, Helvetica, sans-serif;">
                    <span id="inv-4">Invoice-<?=date('Y-m-d')?>-<?=$inv;?></span>
                </h5>
                <h1 class="title mt-1 mb-2" style="font-family: Arial, Helvetica, sans-serif;">Rp.
                    <span id="total-2"><?=$tb;?></span>
                </h1>
            </div>
        </form>
    </div>
</div>