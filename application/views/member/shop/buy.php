<?php

?>
<div class="col-sm-12">
    <div class="row">
        <?php
        if (!$product) {
            if (is_array($categories)){ ?>
            <?php foreach ($categories as $e) { ?>
                    <a href="<?php echo site_url('cart/show_products/' . $e->cat_id) ?>" style="width: 50%;">
                        <div class="col-sm-4 img-thumbnail thumbnail" style="border-radius: 10%;"> <!--style="background-color: snow"
                            <img src="<?php echo base_url('uploads/' . ($e->image ? $e->image : 'default.jpg')) ?>"
                             style="height: 150px !important;" alt="<?php echo $e->cat_name ?>" >-->
                            <h4 align="center" style="color: #e7505b"><?php echo $e->cat_name ?></h4>
                            <h4 style="align-items: center;"> <?php echo $e->description ?> </h4>
                        </div>
                    </a>
            <?php }
        }
        } ?>
    </div>
</div>
<?php if (isset($product_top)) { 
    if (is_array($product_top)){
    foreach ($product_top as $e) { ?>
        <a href="<?php echo site_url('cart/buy_2/' . $e->id) ?>"  style="width:50%;">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="<?php echo base_url('uploads/' . ($e->image ? $e->image : 'default.jpg')) ?>"
                         style="height: 150px !important;" alt="<?php echo $e->prod_name ?>">
                    <div class="caption">
                        <h3><?php echo $e->prod_name ?></h3>
                        <p><strong>Cost: </strong><?php echo $e->prod_price ?></p>
                        <p><a href="<?php echo site_url('cart/buy_2/' . $e->id) ?>" class="btn btn-primary"
                              role="button">Buy</a></p>
                    </div>
                </div>
            </div>
        </a>
    <?php } 
  }
} ?>
<?php
if (is_array($product)){
foreach ($product as $e) { ?>
    <a href="<?php echo site_url('cart/buy_2/' . $e->id) ?>">
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="<?php echo base_url('uploads/' . ($e->image ? $e->image : 'default.jpg')) ?>"
                     style="height: 150px !important;" alt="<?php echo $e->prod_name ?>">
                <div class="caption">
                    <h3><?php echo $e->prod_name ?></h3>
                    <p><strong>Cost: </strong><?php echo $e->prod_price ?></p>
                    <p><a href="<?php echo site_url('cart/buy_2/' . $e->id) ?>" class="btn btn-primary" role="button">Buy</a>
                    </p>
                </div>
            </div>
        </div>
    </a>
<?php } 
}?>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("cart").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>