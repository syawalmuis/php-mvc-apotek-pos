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
                        <p>Rp. <?=$pr['price'];?>/<?=$pr['unit']?></p>

                        <?php 
                            $value = $pr['like_value'];
                            
                            // $like_pr = $like['code'];
                            // $like = $pr['code'];

                            // if($like_pr == $like){
                              
                                    if ($value == 1) {
                                        $color = 'red';
                                        $i = 'fas fa-heart';
                                    } elseif ($value == 0) {
                                        $color = 'black';
                                        $i = 'far fa-heart';
                                    // }
                                
                            }
                            
                           

                        ?>
                        <!-- <p id="vote">1</p> -->

                        <a href="#like" data-id="<?=$pr['code']?>-<?=$pr['like_value']?>" id="like-a-<?=$pr['code']?> "
                            style="color:<?=$color?>" class="like-a"><i id="like-icon-<?=$pr['code']?>"
                                class="<?=$i?> mb-n5">

                            </i>

                        </a>
                        <div id="url-member" hidden><?=$data['url']?></div>
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
<script src="<?=BASEURL;?>/costum/js/like.js"></script>