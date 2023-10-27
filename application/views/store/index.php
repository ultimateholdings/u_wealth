<?php
session_start();
if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        //echo $_POST["hidden_image"];
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        
        $count = count($_SESSION["shopping_cart"]);
        //echo $count;
        $item_array = array(
        'item_id'       =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'        =>  $_POST["hidden_price"],
        'item_image'        =>  $_POST["hidden_image"],
        'item_quantity'     =>  $_POST["qty"]
        );
        //print_r($item_array);die();
        $_SESSION["shopping_cart"][$count] = $item_array;
        
        echo '<script>window.location="store"</script>';
        //echo "hi";
        /*else
        {
        echo '<script>alert("Item Already Added")</script>';
        }*/
    }
    else
    {
        $item_array = array(
        'item_id'       =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'        =>  $_POST["hidden_price"],
        'item_image'        =>  $_POST["hidden_image"],
        'item_quantity'     =>  $_POST["qty"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                //echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="store"</script>';
            }
        }
    }
}
?>

<!doctype html>
<html lang="en">
 <head>
    <?php include 'includes_top.php' ?>
</head>

<body style="overflow: auto;">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div class="home-page-1">
        <!-- header start -->
        <?php include 'header.php' ?>

        <div class="slider-area">
            <!-- slider start 
           <div class="home-page-3"> -->
              <div class="slider">
	                <div id="topSlider" class="nivoSlider nevo-slider">
	                    <img src="<?php echo $home_banner1[0]['image'] ? base_url('uploads/' . $home_banner1[0]['image']) : base_url('uploads/store_default/1920x750.jpg'); ?>" alt="main slider" title="#htmlcaption1" />
                        <img src="<?php echo $home_banner2[0]['image'] ? base_url('uploads/' . $home_banner2[0]['image']) : base_url('uploads/store_default/1920x750.jpg'); ?>" alt="main slider" title="#htmlcaption2" />
	                </div>
	                <div id="htmlcaption1" class="nivo-html-caption slider-caption">
	                    <div class="slider-progress"></div>
	                    <div class="bannerslideshow slider-1">
                            <div style="display: none;">
	                        <h1 class="title1">
	                            <span class="word1">Main</span>
	                            <span class="word2">Heading</span>
	                        </h1>
	                        <h2 class="title2" style="color: #fff;">
	                                <span class="word1">Small</span>
	                                <span class="word2">Caption</span>
	                                <span class="word3">goes</span>
	                                <span class="word4">Here</span>
	                                <span class="word5">!!!</span>
	                            </h2>
                            </div>
	                        <div class="banner7-readmore">
	                            <a title="Shop Now" href="<?php echo site_url('emart/shop')?>">shop now</a>
	                        </div>
	                    </div>
	                </div>
	                <div id="htmlcaption2" class="nivo-html-caption slider-caption">
	                    <div class="slider-progress"></div>
	                    <div class="bannerslideshow slider-2 h3sldr">
                          <div style="display: none">
	                        <h1 class="title1">
	                            <span class="word1">Green</span>
	                            <span class="word2">Supper</span>
	                            <span class="word3">Market</span>
	                        </h1>
	                        <h2 class="title2">
	                            <span class="word1">We</span>
	                            <span class="word2">alway</span>
	                            <span class="word3">try</span>
	                            <span class="word4">our</span>
	                            <span class="word5">best</span>
	                            <span class="word6">because</span>
	                            <span class="word7">your</span>
	                            <span class="word8">family</span>
	                            <span class="word9">heath</span>
	                            <span class="word10">!</span>
	                        </h2>
                            </div>
	                        <div class="banner7-readmore">
	                            <a title="Shop Now" href="<?php echo site_url('emart/shop')?>">shop now</a>
	                        </div>
	                    </div>
	                </div>
               </div>
            <!-- </div>
             slider end -->
        </div>

         <div class="banner-area">
	            <div class="container">
	                <div class="banner-inner">
	                    <div class="row">
	                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                            <!--single-banner-start-->
	                            <div class="single-banner res2">
	                            	<?php $product_detail= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,image', 'product', array('id' => $product_1_v2[0]['prod_id'])); ?>
	                                <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $product_detail->id;?>"><img src="<?php echo $product_1_v2[0]['image'] ? base_url('uploads/' . $product_1_v2[0]['image']) : base_url('uploads/store_default/370x375.jpg'); ?>"></a>
	                            </div>
	                            <!--single-banner-end-->
	                        </div>
	                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                            <!--single-banner-start-->
	                            <div class="single-banner res2">
	                            	<?php $product_detail= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,image', 'product', array('id' => $product_2_v2[0]['prod_id'])); ?>
	                                <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $product_detail->id;?>"><img src="<?php echo $product_2_v2[0]['image'] ? base_url('uploads/' . $product_2_v2[0]['image']) : base_url('uploads/store_default/370x375.jpg'); ?>"></a>
	                            </div>
	                            <!--single-banner-end-->
	                        </div>
	                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                            <!--single-banner-start-->
	                            <div class="single-banner">
	                            	<?php $product_detail= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,image', 'product', array('id' => $product_3_v2[0]['prod_id'])); ?>
	                                <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $product_detail->id;?>"><img src="<?php echo $product_3_v2[0]['image'] ? base_url('uploads/' . $product_3_v2[0]['image']) : base_url('uploads/store_default/370x375.jpg'); ?>"></a>
	                            </div>
	                            <!--single-banner-end-->
	                        </div>
	                    </div>
	                </div>
	            </div>
         </div>
         <div class="featured-products-area featured-products-area-2">
	            <div class="container">
	                <div class="row">
	                    <div class="section-title">
	                        <h2>Featured</h2>
	                        <h1>Products</h1>
	                    </div>
	                </div>
	                <div class="row">
                    <div class="single-carousel">
                        <!-- single-product start-->
                        
                        <?php if($featured_products){ 
                              foreach ($featured_products as $f) {?>
                              <?php $prod_detail_featured= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,discount,image', 'product', 
                               array('id' => $f['prod_id'])); ?>
                        <div class="col-lg-3">  
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><img src="<?php echo $f['image'] ? base_url('uploads/' . $f['image']) : base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                </div>
                                <div class="product-desc">
                                    <h2 class="product-name"><a class="product-name" href="#"><?php echo $prod_detail_featured->prod_name;?></a></h2>
                                    <div class="price-box floatleft">
                                        <p class="old-price"><?php echo config_item('currency'). " ". $prod_detail_featured->prod_price;?></p>
                                        <p class="normal-price"><?php echo config_item('currency'). " ";?><?php echo $prod_detail_featured->prod_price-($prod_detail_featured->prod_price*($prod_detail_featured->discount/100)); ?></p>
                                        
                                    </div>
                                    <div class="product-action floatright">
                                        <input type="hidden" name="hidden_name" value="<?php echo $prod_detail_featured->prod_name;?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $prod_detail_featured->prod_price;?>" />
                                        <input type="hidden" name="hidden_image" value="<?php echo $prod_detail_featured->image ? base_url('uploads/' . $prod_detail_featured->image) : base_url('uploads/store_default/900x1167.jpg'); ?>" />
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-shopping-cart"></i></a> 
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-heart-o"></i></a>
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-exchange"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }} else{?>
                              <div class="col-lg-3">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <a href="#"><img src="<?php echo base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                    </div>
                                        <div class="product-desc">
                                            <h2 class="product-name"><a class="product-name" href="#">Product Name</a></h2>
                                            <div class="price-box floatleft">
                                                <p class="normal-price">Product Price</p>
                                            </div>
                                            <div class="product-action floatright">
                                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                <a href="#"><i class="fa fa-heart-o"></i></a>
                                                <a href="#"><i class="fa fa-exchange"></i></a>
                                            </div>
                                        </div>
                                </div>
                              </div>
                              <?php  } ?>
                            <?php if($featured_products2){ 
                                foreach ($featured_products2 as $f) {?>
                            <?php $prod_detail_featured= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,image', 'product', 
                              array('id' => $f['prod_id'])); ?>
                            <div class="col-lg-3">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><img src="<?php echo $f['image'] ? base_url('uploads/' . $f['image']) : base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                </div>
                                <div class="product-desc">
                                    <h2 class="product-name"><a class="product-name" href="#"><?php echo $prod_detail_featured->prod_name;?></a></h2>
                                    <div class="price-box floatleft">
                                        <p class="normal-price"><?php echo config_item('currency'). " ". $prod_detail_featured->prod_price;?></p>
                                    </div>
                                    <div class="product-action floatright">
                                        <input type="hidden" name="hidden_name" value="<?php echo $prod_detail_featured->prod_name;?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $prod_detail_featured->prod_price;?>" />
                                        <input type="hidden" name="hidden_image" value="<?php echo $prod_detail_featured->image ? base_url('uploads/' . $prod_detail_featured->image) : base_url('uploads/store_default/900x1167.jpg'); ?>" />
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-shopping-cart"></i></a>
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-heart-o"></i></a>
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-exchange"></i></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php }
                          } else{?>
                             <div class="col-lg-3">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <a href="#"><img src="<?php echo base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                    </div>
                                        <div class="product-desc">
                                            <h2 class="product-name"><a class="product-name" href="#">Product Name</a></h2>
                                            <div class="price-box floatleft">
                                                <p class="normal-price">Product Price</p>
                                            </div>
                                            <div class="product-action floatright">
                                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                <a href="#"><i class="fa fa-heart-o"></i></a>
                                                <a href="#"><i class="fa fa-exchange"></i></a>
                                            </div>
                                        </div>
                                </div>
                             </div>
                              <?php  } ?>

                        <?php if($featured_products3){ foreach ($featured_products3 as $f) {?>
                            <?php $prod_detail_featured= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,image', 'product', 
                              array('id' => $f['prod_id'])); ?>
                           <div class="col-lg-3">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <span class="label-pro-sale">-9%</span>
                                    <span class="new">new</span>
                                    <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><img src="<?php echo $f['image'] ? base_url('uploads/' . $f['image']) : base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                </div>
                                <div class="product-desc">
                                    <h2 class="product-name"><a class="product-name" href="#"><?php echo $prod_detail_featured->prod_name;?></a></h2>
                                    <div class="price-box floatleft">
                                        <p class="normal-price"><?php echo config_item('currency'). " ". $prod_detail_featured->prod_price;?></p>
                                    </div>
                                    <div class="product-action floatright">
                                        <input type="hidden" name="hidden_name" value="<?php echo $prod_detail_featured->prod_name;?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $prod_detail_featured->prod_price;?>" />
                                        <input type="hidden" name="hidden_image" value="<?php echo $prod_detail_featured->image ? base_url('uploads/' . $prod_detail_featured->image) : base_url('uploads/store_default/900x1167.jpg'); ?>" />               
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-shopping-cart"></i></a>
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-heart-o"></i></a>
                                        <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-exchange"></i></a>
                                    </div>
                                </div>
                            </div>
                           </div>
                        <?php }
                              }else{?>
                             <div class="col-lg-3">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <span class="label-pro-sale">-9%</span>
                                        <span class="new">new</span>
                                        <a href="#"><img src="<?php echo base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                    </div>
                                        <div class="product-desc">
                                            <h2 class="product-name"><a class="product-name" href="#">Product Name</a></h2>
                                            <div class="price-box floatleft">
                                                <p class="normal-price">Product Price</p>
                                            </div>
                                            <div class="product-action floatright">
                                               <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                <a href="#"><i class="fa fa-heart-o"></i></a>
                                                <a href="#"><i class="fa fa-exchange"></i></a>
                                            </div>
                                        </div>
                                </div>
                             </div>
                              <?php  } ?>

                        <?php if($featured_products4){ 
                              foreach ($featured_products4 as $f) {?>
                              <?php $prod_detail_featured= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,image', 'product', 
                              array('id' => $f['prod_id'])); ?>
                             <div class="col-lg-3">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <span class="label-pro-sale">-9%</span>
                                    <span class="new">new</span>
                                    <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><img src="<?php echo $f['image'] ? base_url('uploads/' . $f['image']) : base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                </div>
                                <div class="product-desc">
                                    <h2 class="product-name"><a class="product-name" href="#"><?php echo $prod_detail_featured->prod_name;?></a></h2>
                                    <div class="price-box floatleft">
                                        <p class="normal-price"><?php echo config_item('currency'). " ". $prod_detail_featured->prod_price;?></p>
                                    </div>
                                    <div class="product-action floatright">
                                         <input type="hidden" name="hidden_name" value="<?php echo $prod_detail_featured->prod_name;?>" />
                                                      <input type="hidden" name="hidden_price" value="<?php echo $prod_detail_featured->prod_price;?>" />
                                                      <input type="hidden" name="hidden_image" value="<?php echo $prod_detail_featured->image ? base_url('uploads/' . $prod_detail_featured->image) : base_url('uploads/store_default/900x1167.jpg'); ?>" />               
                                                      <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-shopping-cart"></i></a>
                                                    <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-heart-o"></i></a>
                                                    <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail_featured->id;?>"><i class="fa fa-exchange"></i></a>
                                            </div>
                                    </div>
                            </div>
                             </div>
                        <?php } }
                         else{?>
                             <div class="col-lg-3">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <span class="label-pro-sale">-9%</span>
                                        <span class="new">new</span>
                                        <a href="#"><img src="<?php echo base_url('uploads/store_default/900x1167.jpg'); ?>" alt="" /></a>
                                    </div>
                                        <div class="product-desc">
                                            <h2 class="product-name"><a class="product-name" href="#">Product Name</a></h2>
                                            <div class="price-box floatleft">
                                                <p class="normal-price">Product Price</p>
                                            </div>
                                            <div class="product-action floatright">
                                                <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                <a href="#"><i class="fa fa-heart-o"></i></a>
                                                <a href="#"><i class="fa fa-exchange"></i></a>
                                            </div>
                                        </div>
                                </div>
                             </div>
                              <?php  } ?>
                        
                        <!-- single-product end-->
                        
                    </div>
                </div>
	            </div>
         </div>
         <div class="big-ad-banner-area margin-top-60">
            <div class="single-banner">
                <?php $prod_detail= $this->db_model->select_multi('id,prod_name,prod_price,prod_desc,image', 'product', array('id' => $midpage_banner[0]['prod_id'])); if($prod_detail){ ?>
                <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $prod_detail->id;?>"><img src="<?php echo $midpage_banner[0]['image'] ? base_url('uploads/' . $midpage_banner[0]['image']) : base_url('uploads/store_default/1920x525.jpg'); ?>" alt="" /></a>
            <?php } else{?>
                <a href="#"><img src="<?php echo base_url('uploads/store_default/1920x525.jpg'); ?>" alt="" /></a>
            <?php } ?>
            </div>
         </div>
    </div>
    
    <div class="testimonial-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-inner text-center">
                            <!--single-testimonial start-->
                            <div class="single-testimonial">
                                <div class="testimonial-content-avatar">
                                    <img src="<?php echo base_url('axxets/shop/img/testimonial/1.png') ?>" alt="" />
                                </div>
                                <div class="testimonial-posted-by">
                                    <span class="testimonial-author">Arundhathi Nair</span>
                                    <span class="testimonial-date">January 01, 2020</span>
                                </div>
                                <a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...	</a>
                            </div>
                            <!--single-testimonial end-->
                            <!--single-testimonial start-->
                            <div class="single-testimonial">
                                <div class="testimonial-content-avatar">
                                    <img src="<?php echo base_url('axxets/shop/img/testimonial/2.png') ?>" alt="" />
                                </div>
                                <div class="testimonial-posted-by">
                                    <span class="testimonial-author">Jaya Kumar</span>
                                    <span class="testimonial-date">January 26, 2020</span>
                                </div>
                                <a href="#">I have purchased similar products on other online stores and retail stores. However <?php echo config_item('company_name');?> is the best place for purchase. There product quality and customer service is best in the Market. I love to purchase again and again...	</a>
                            </div>
                            <!--single-testimonial end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include 'footer.php'; ?>
    <?php include 'includes_bottom.php'; ?>
</body>
