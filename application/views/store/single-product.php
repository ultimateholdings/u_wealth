<?php
if(isset($_POST["add_to_cart"]))
{

    $avl_qty = $this->db->query("SELECT CASE WHEN qty = -1 THEN 10000 ELSE qty END as available_qty 
                     from product where id = ".$_GET['id'])->result_array()[0]['available_qty'];

    if(!($avl_qty >= $_POST['qty']))
    {
      if($avl_qty==0){
        $message="Sorry! Currently the product is Out of Stock !!!";
      }else{
        $message="Sorry!!! Available quantity is:    ". " ". $avl_qty;
      }
    }
    elseif(isset($_SESSION["shopping_cart"]))
    {
        debug_log("shop page from isset if");
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        
        $count = count($_SESSION["shopping_cart"]);
        
        debug_log($_POST["variant"]);
         $item_array = array(
          'item_id'       =>  $_GET["id"],
          'item_name'     =>  $_POST["hidden_name"],
          'item_quantity' =>  $_POST["qty"],
          'item_price'    =>  $_POST["hidden_price"],
          'item_tax'      =>  $_POST["hidden_tax"],
          'item_discount' =>  $_POST["hidden_discount"],
          'item_image'    =>  $_POST["hidden_image"],
          'item_quantity' =>  $_POST["qty"],
          'item_vendor_id'=>  $_POST["hidden_vendor_id"],
          'item_variant_name'=> $_POST["variant"], 
          'item_variant_value'=> $_POST["variant_value"],
          );
          debug_log($item_array);
          $_SESSION["shopping_cart"][$count] = $item_array;
          echo '<script>window.location="single-product?id=$_GET["id"]</script>';
    }
    else
    {
       debug_log("shop page from isset else");
         $item_array = array(
          'item_id'       =>  $_GET["id"],
          'item_name'     =>  $_POST["hidden_name"],
          'item_quantity' =>  $_POST["qty"],
          'item_price'    =>  $_POST["hidden_price"],
          'item_tax'      =>  $_POST["hidden_tax"],
          'item_discount' =>  $_POST["hidden_discount"],
          'item_image'    =>  $_POST["hidden_image"],
          'item_vendor_id'=>  $_POST["hidden_vendor_id"],
          'item_variant_name'=> $_POST["variant"], 
          'item_variant_value'=> $_POST["variant_value"],
         );
         $_SESSION["shopping_cart"][0] = $item_array;
         debug_log($item_array);
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
      echo '<script>window.location="single-product?id=$_GET["id"]"</script>';
   }
  }
 }
}
//print_r($data);
//echo $data[0]['prod_name'];
?>

<!doctype html>
<html lang="en">
 <head>
  <?php include 'includes_top.php' ?>
 </head>
<body>
<div id="fb-root"></div>
 <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0"></script>
 <script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d52b99e4cd0540012f2016f&product='inline-share-buttons'" async='async'>
  </script>
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  <!-- header start -->
  <?php include 'header.php' ?>
    <!-- header end -->
     <!-- breadcrumbs-area-area start -->
    <div class="breadcrumbs-area log">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumbs-menu">
              <ul>
        <li><a href="<?php echo site_url('emart/store')?>">Home <span>></span></a></li>
        <li><a href="#">Single product</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
             <li style="color:red;font-weight: bold;"><?php echo $message; ?></li></li>
       </ul>
            </div>
          </div>
        </div>  
      </div>
    </div>
    <!-- cart-page-start -->
    <div class="single-product-page-area">
      <div class="container">
        <div class="row">
     <div id="altImages" class="a-fixed-left-grid-col a-col-left" style="width:40px;float:left;margin-top:30px;">
      <ul class="nav nav-tabs row text-center pro-details" style="float:left;">
       <li class="nav-item col-lg-12 mb-2">
        <img class="img-fluid active h-100" src="<?php echo $data[0]['image2'] ? base_url('uploads/' . $data[0]['image2']) : base_url('uploads/default.jpg'); ?>"  id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"/>
       </li>
       <li class="nav-item col-lg-12 mb-2">
        <img class="img-fluid h-100" src="<?php echo $data[0]['image3'] ? base_url('uploads/' . $data[0]['image3']) : base_url('uploads/default.jpg'); ?>" id="product-tab"  data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false"/>
       </li>
       <li class="nav-item col-lg-12 mb-2">
        <img class="img-fluid h-100" src="<?php echo $data[0]['image4'] ? base_url('uploads/' . $data[0]['image4']) : base_url('uploads/default.jpg'); ?>" id="productTwo-tab" data-toggle="tab" href="#productTwo" role="tab" aria-controls="productTwo" aria-selected="false"/>
       </li>
       <li class="nav-item col-lg-12 mb-2">
        <img class="img-fluid h-100" src="<?php echo $data[0]['image5'] ? base_url('uploads/' . $data[0]['image5']) : base_url('uploads/default.jpg'); ?>" id="productThree-tab" data-toggle="tab" href="#productThree" role="tab" aria-controls="productThree" aria-selected="false"/>
       </li>
      </ul>
     </div> 
          <div class="col-lg-5 col-md-6 col-sm-6" style="margin-left:50px;margin-top:30px;padding-left: 10px;">
            <div class="zoom-all">

       <div class="pro-img-tab-content tab-content">
        <div class="tab-pane active" id="image-1">
         <div class="simpleLens-big-image-container">
             <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="<?php echo $data[0]['image'] ? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>" href="<?php echo $data[0]['image'] ? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>">
                <img src="<?php echo $data[0]['image'] ? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>" alt=""  class="simpleLens-big-image">
             </a>
         </div>
        </div>
        <div class="tab-pane fade col-lg-12" id="home" role="tabpanel" aria-labelledby="home-tab">
         <div class="simpleLens-big-image-container">
          <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="<?php echo $data[0]['image2'] ? base_url('uploads/' . $data[0]['image2']) : base_url('uploads/default.jpg'); ?>" href="<?php echo $data[0]['image2'] ? base_url('uploads/' . $data[0]['image2']) : base_url('uploads/default.jpg'); ?>">
          <img src="<?php echo $data[0]['image2'] ? base_url('uploads/' . $data[0]['image2']) : base_url('uploads/default.jpg'); ?>" alt=""  class="simpleLens-big-image" />
          </a>
         </div>
        </div>
        <div class="tab-pane fade col-lg-12" id="product" role="tabpanel" aria-labelledby="product-tab">
         <div class="simpleLens-big-image-container">
          <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="<?php echo $data[0]['image3'] ? base_url('uploads/' . $data[0]['image3']) : base_url('uploads/default.jpg'); ?>" href="<?php echo $data[0]['image3'] ? base_url('uploads/' . $data[0]['image3']) : base_url('uploads/default.jpg'); ?>">
           <img src="<?php echo $data[0]['image3'] ? base_url('uploads/' . $data[0]['image3']) : base_url('uploads/default.jpg'); ?>"  alt=""  class="simpleLens-big-image"/>
          </a>
         </div>
        </div>
        <div class="tab-pane fade col-lg-12" id="productTwo" role="tabpanel" aria-labelledby="productTwo-tab">
         <div class="simpleLens-big-image-container">
          <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="<?php echo $data[0]['image4'] ? base_url('uploads/' . $data[0]['image4']) : base_url('uploads/default.jpg'); ?>" href="<?php echo $data[0]['image4'] ? base_url('uploads/' . $data[0]['image4']) : base_url('uploads/default.jpg'); ?>">
           <img src="<?php echo $data[0]['image4'] ? base_url('uploads/' . $data[0]['image4']) : base_url('uploads/default.jpg'); ?>" alt=""  class="simpleLens-big-image" />
          </a>
         </div>
        </div>
        <div class="tab-pane fade col-lg-12" id="productThree" role="tabpanel" aria-labelledby="productThree-tab">
         <div class="simpleLens-big-image-container">
          <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="<?php echo $data[0]['image5'] ? base_url('uploads/' . $data[0]['image5']) : base_url('uploads/default.jpg'); ?>" href="<?php echo $data[0]['image5'] ? base_url('uploads/' . $data[0]['image5']) : base_url('uploads/default.jpg'); ?>">
           <img src="<?php echo $data[0]['image5'] ? base_url('uploads/' . $data[0]['image5']) : base_url('uploads/default.jpg'); ?>" alt=""  class="simpleLens-big-image"/>
          </a>
         </div>
        </div>
       </div>
           </div>
         </div>
        <div class="col-lg-5 col-md-6 col-sm-6" style="padding-left:20px;padding-right:20px;">
          <div class="page-single-product-desc">
            <div class="product-name">
        <h2><?php echo $data[0]['prod_name']; ?></h2>
        <?php if ($data[0]['vendor_id']!=0){
          $vendor_name=$this->db_model->select('name', 'vendor', array('vendor_id' => $data[0]['vendor_id']));?>
          <!--<p style="color:blue;">By <a href="<?php echo site_url('emart/shop-list')?>?vid=<?php echo $data[0]['vendor_id']?>" style="color:blue;"><?php echo $vendor_name?></a></p>-->
        <?php } ?>
            </div>
            <p class="availability in-stock">Availability: <span><?php if($data[0]['qty'] !=0){?>In stock</span><?php } else{?><span>Out of stock </span>     <?php } ?></p>
            <div class="product-rating">
              <!--<ul>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>-->
          </div>
            <div class="price-box single-product-price">
              <p class="old-price"><?php echo config_item('currency'). " ". $data[0]['prod_price']; ?></p>
              <p class="normal-price"><?php echo config_item('currency'). " ";?><?php echo $data[0]['prod_price']-($data[0]['prod_price']*($data[0]['discount']/100));?></p>
              <?php if($data[0]['pv']>0) { ?>
              <p class="prodcut-pv">PV = <?php echo $data[0]['pv'];?></p>
              <?php } ?>
            </div>
       <p class="availability in-stock" ><?php echo "Inclusive of all taxes";?></p>
            <div class="sin-product-add-cart">
        <form method="post" action="single-product?action=add&id=<?php echo $product_id; ?>">
         <input type="hidden" name="hidden_name" value="<?php echo $data[0]['prod_name']; ?>" />
         <input type="hidden" name="hidden_price" value="<?php echo $data[0]['prod_price']; ?>" />
         <input type="hidden" name="hidden_vendor_id" value="<?php echo $data[0]['vendor_id']; ?>" />
         <input type="hidden" name="hidden_tax" value="<?php echo $data[0]['gst']; ?>" />
         <input type="hidden" name="hidden_discount" value="<?php echo $data[0]['discount']; ?>" />
         <input type="hidden" name="hidden_image" value="<?php echo $data[0]['image']? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>" />
         <?php if($data[0]['qty'] > 0){?>
                <label>Qty</label>
                <input type="number" name="qty" id="qty" min="1" max="10" required/>
          <br></br>

          <?php if(config_item('enable_variation')=="Yes")
          {
              $variant=$this->db_model->select('variant_name', 'product', array('id' => $product_id));
              $product_type=$this->db_model->select('product_type', 'product', array('id' => $product_id));
              if($product_type=="variable")
              {
               $variant_names=explode(",",$variant); 
               //print_r($variant_names);
               foreach($variant_names as $v) 
               { 

                  $variants=$this->db_model->select('variant_value', 'product_variant', array('variant_name' => trim($v)));
                  $variant_value=explode(",",$variants);
                  //print_r($variant_value);
                  ?>  
                  <p><label><?php echo $v ?></label>&nbsp;
                  <input type="hidden" name="variant[]" value="<?php echo $v; ?>" />
                  <select class="form-control" name="variant_value[]" style="width: 110px;display:inline-block;">
                  <?php foreach ($variant_value as $val) 
                  {
                     echo '<option value="' . $val . '">' . $val . '</option>';
                  } ?>
                  </select></p>
                  <?php 
               }
              }
          } ?>
          
          <button name="add_to_cart" type="submit">
                  <i class="fa fa-shopping-cart"></i>
                  <span>add to cart</span>
          </button>
         <?php } ?>
        </form>
            </div>
            <div class="product-action">  
              <?php  if($user_id){?>
              <div class="fb-share-button" data-href="<?php echo config_item('base_url')?>/emart/single-product?uid=<?php echo $this->session->user_id ;?>&id=<?php echo $product_id;?>" data-layout="button_count" data-size="large">
          <a target="_blank" alt="Thumbnail Image" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F<?php echo config_item('base_url')?> %2Fsite%2Fsingle-product?uid=<?php echo $this->session->user_id ;?>&id=<?php echo $product_id;?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a> &nbsp;
         </div>
         <?php $text = urlencode(config_item('base_url') . "/emart/single-product?id=".$product_id."&uid=".$this->session->user_id); ?>
         <a target="_blank" alt="Thumbnail Image" href="https://api.whatsapp.com/send?text=<?php echo $text; ?>" data-action="share/whatsapp/share">&nbsp;<i class="fa fa-whatsapp" style="font-size:30px;color: #4FCE5D;border:none;"></i></a>
       </div> 
       <?php } ?>
      </div>
      </div>
       </div>
     </div>
   </div>

     <!-- cart-page-end -->
    <!-- Single Description Tab -->
    <div class="single-product-description">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="product-description-tab custom-tab">
              <!-- tab bar -->
              <ul class="sin-pro-tab" role="tablist">
                <li class="active"><a href="#product-des" data-toggle="tab">Product Description</a></li>
              </ul>
              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane active" id="product-des">
                  <p><?php echo $data[0]['prod_desc'];?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Single Description Tab -->
    <!--brands-area start-->
    <div class="brands-area">
      <div class="container">
        <div class="brands-inner section-padding">
          <div class="row">
            <div class="brans-carousel">
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                  <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                  <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                  <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/3.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                 <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                  <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/5.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                    <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                 <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
              <!-- single-brand start -->
              <div class="col-lg-12">
                <div class="single-brand">
                  <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg') ?>" alt="" /></a>
                </div>
              </div>
              <!-- single-brand end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--brands-area end-->
    <!--testimonial-area start-->
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
        <a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential...  </a>
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
        <a href="#">I have purchased similar products on other online stores and retail stores. However <?php echo config_item('company_name');?> is the best place for purchase. There product quality and customer service is best in the Market. I love to purchase again and again...   </a>
       </div>
       <!--single-testimonial end-->
      </div>
     </div>
    </div>
   </div>
  </div>
    <!--testimonial-area end-->
    <!--footer start-->
    <?php include 'footer.php'; ?>
    <!--footer end-->
    <!-- all js here -->
    <!-- jquery latest version -->
    <?php include 'includes_bottom.php' ; ?>

  
  
  
 </body>
</html>
