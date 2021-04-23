<?php

$codeContent='usr0003';
$tempdir = "img/qrcode/user/"; //Nama folder tempat menyimpan file qrcode
if (!file_exists($tempdir)) { //Buat folder bername temp
    mkdir($tempdir);
}

$level=QR_ECLEVEL_H;
//Ukuran pixel
$UkuranPixel=6;
//Ukuran frame
$UkuranFrame=4;

QRcode::png($codeContent, $tempdir.$codeContent.'.png', $level, $UkuranPixel, $UkuranFrame);

//QRcode::png($codeContent,$temp.'002qr.png');