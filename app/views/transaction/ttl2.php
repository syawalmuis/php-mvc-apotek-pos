<?php $tb=0; $no=1; foreach($data['product'] as $pr) : ?>
<?php 
                            
    $price = $pr['price'];
    $qty = $pr['qty'];
    //$dsc = $pr['dsc'];
    $ttl = ($price * $qty);// - ($price * $qty* $dsc);
    // if ($dsc == 0){
    //     $dscv = '0%';
    // }else{
    //     $dscv = '15%';
    // }
    ?>

<?php $tb += $ttl;?>
<?php endforeach;?>
<div class="card shadow rounded bg-light">
    <div class="card-body">
        <form action="" align="right">
            <div class="form-group mb-0">
                <label for="sub-total">Sub Total</label>
                <input type="text" style="text-align: right;" class="form-control form-control-sm" name="sub-ttl1"
                    id="sub-ttl1" value="<?=$tb?>" hidden>
                <!-- <input type="text" style="text-align: right;" class="form-control form-control-sm" name="" id=""
                    value="Rp. <?=$tb?>" readonly> -->
                <p><b>Rp. <span><?=$tb?></span></b></p>
            </div>
            <div class="form-group mb-0">
                <label for="sub-total">Discount</label>
                <!-- <input type="text" style="text-align: right;" class="form-control form-control-sm" name="dsc-ttl"
                    id="dsc-ttl" readonly> -->
                <b>
                    <p id="dsc-ttl">0%</p>
                </b>
            </div>
            <div class="form-group mb-0">
                <label for="sub-total">Grand Total</label>
                <!-- <input type="text" style="text-align: right;" class="form-control form-control-sm" name="grand-ttl"
                    id="grand-ttl" readonly> -->
                <p><b><span id="rp">Rp.</span> <span id="grand-ttl"><?=$tb?></span></b></p>
            </div>
        </form>
    </div>
</div>