<div class="row mb-4" onload="tes()">
    <div class="col-sm-12">
        <div class="card pt-3 pl-3 pr-3 shadow bg-light rounded ">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-striped table-bordered">
                    <thead class="bg-primary text-white" align="center">
                        <tr>
                            <th>#</th>
                            <th>Code Proudct</th>
                            <th>Product Item</th>
                            <th>Price</th> 
                            <th>Qty</th>
                            <!-- <th>Discount Item</th> -->
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        <tr>
                            <td align="center"><?=$no++;?></td>
                            <td align="center"><?=$pr['code'];?></td>
                            <td align="center"><?=$pr['name'];?></td>
                            <td align="right">Rp. <?=$pr['price'];?></td>
                            <td align="right"><?=$pr['qty'];?></td>
                            <!-- <td align="right"><?=$dscv;?></td> -->
                            <td align="right">Rp. <?=$ttl?></td>
                        </tr>
                        <?php $tb += $ttl;?>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>

                        <tr>
                            <td colspan="5" align="center"><b> Sub Total</b></td>
                            <!-- <td><a name="sub-ttl" id="sub-ttl" class="sub-ttl"><?=$tb?></a></td> -->
                            <td align="right"><b>Rp. <?=$tb;?></b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>