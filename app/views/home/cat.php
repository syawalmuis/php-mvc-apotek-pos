<div class="card" align="center">
    <div class="card-body">
        <div class="row">
            <?php foreach ($data['product'] as $pr) : ?>
            <div class="col-sm-3">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <img style="max-height: 160px;" class="img-fluid img-thumbnail img-rounded mb-3"
                            src="<?=BASEURL?>/img/product/<?=$pr['image'];?>" alt="">
                        <h5 class="title"><?=$pr['name'];?>
                        </h5>
                        <p><?=$pr['stock'];?>
                        </p>
                        <p>Rp. <?=$pr['price'];?>/<span class="text-muted"><?=$pr['unit']?></span></p>
                        <!-- <?php

                            $value = $pr['value'];
                            
                            if ($value == '') {
                                $value = 0;
                                $color = 'black';
                                $i = 'far fa-heart';
                            } else {
                                if ($value == 1) {
                                    $color = 'red';
                                    $i = 'fas fa-heart';
                                } elseif ($value == 0) {
                                    $color = 'black';
                                    $i = 'far fa-heart';
                                }
                            }

                            ?> -->

                        <!-- <a href="#Like" data-id="<?=$pr['code']?>-<?=$value?>" id="like-a-<?=$pr['code']?>"
                            style="color:<?=$color?>" class="like-a"><i id="like-icon-<?=$pr['code']?>"
                                class="<?=$i?>"></i></a> -->
                        <a href="#like" style="color: black;" class="like-home"><i class="far fa-heart">
                                <!-- <p><?=$pr['value']?></p> -->
                            </i></a>
                        <h6 class="h6 text-muted" style="color: black;"><small><?=$pr['value']?> Suka</small></h6>
                    </div>
                </div>
                <br>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>


<script src="<?=BASEURL;?>/bootstrap/js/jquery-3.5.1.js">
</script>
<script src="<?=BASEURL;?>/costum/js/home-load.js"></script>