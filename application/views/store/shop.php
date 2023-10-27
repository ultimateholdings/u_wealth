<?php
session_start();
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
    else if(isset($_SESSION["shopping_cart"]))
    { 
        debug_log("shop page from isset if");
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        $count = count($_SESSION["shopping_cart"]);
        
        $item_array = array(
                           'item_id'       =>  $_GET["id"],
                           'item_name'     =>  $_POST["hidden_name"],
                           'item_price'    =>  $_POST["hidden_price"],
                           'item_tax'      =>  $_POST["hidden_tax"],
                           'item_discount' =>  $_POST["hidden_discount"],
                           'item_image'    =>  $_POST["hidden_image"],
                           'item_quantity' =>  $_POST["qty"],
                           'item_vendor_id'=>  $_POST["hidden_vendor_id"],
                           );
          $_SESSION["shopping_cart"][$count] = $item_array;
            echo '<script>window.location="shop"</script>';
    }
    else
    {
        debug_log("shop page from isset else");
        $item_array = array(
        'item_id'       =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_tax'      =>  $_POST["hidden_tax"],
        'item_discount' =>  $_POST["hidden_discount"],
        'item_image'    =>  $_POST["hidden_image"],
        'item_quantity' =>  $_POST["qty"],
        'item_vendor_id'=>  $_POST["hidden_vendor_id"],

        );
        $_SESSION["shopping_cart"][0] = $item_array;
        echo '<script>window.location="shop"</script>';
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
                echo '<script>window.location="shop"</script>';
            }
        }
    }
}
?>
<!doctype html>
<html class="no-js" lang="en">
 <head>
  <?php include 'includes_top.php' ?>
 </head>
    <body class="modal-open" style="overflow: auto;">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header start -->
      <?php include 'header.php' ?>
       <!-- header end -->
       <!-- breadcrumbs-area-area start -->
     <div class="breadcrumbs-area">
       <div class="container">
        <div class="row">
         <div class="col-lg-12">
          <div class="breadcrumbs-menu">
            <ul>
             <li><a href="<?php echo site_url('emart/store')?>">Home <span>></span></a></li>
             <li><a href="#">Shop<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
             <li style="color:red;font-weight: bold;"><?php echo $message; ?></li>
            </ul>
           </div>
         </div>
        </div>
       </div>
     </div>
     </div>
         <!-- breadcrumbs-area-area end -->
         <!-- shop-page-start -->
     <div class="shop-product-area">
       <div class="container">
         <div class="row">
          <div class="col-md-3 col-lg-3" id="shoppingoptions">
           <div class="left-sidebar">
            <div class="left-sidebar-title">
             <h3>Shopping Options</h3>
            </div>
            <!-- single-sidebar-start -->
            <div class="single-sidebar" style="display:none;">
             <h3 class="single-sidebar-title">Price</h3>
               <div class="sidebar-content">
                 <div class="price_filter">
                  <div id="slider-range"></div>
                   <div class="price_slider_amount">
                     <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                       <a href="#" class="cart-button">show</a>  
                    </div>
                  </div>
               </div>
            </div>
            <!-- single-sidebar-end -->
            <!-- single-sidebar-start -->
            <div class="single-sidebar">
            <h3 class="single-sidebar-title">Category</h3>
             <ul>
               <?php foreach ($category as $c) { ?>
               <li><a href="<?php echo site_url("emart/shop?action=add&cat_id=".$c['cat_id'])?>"><?php echo $c['cat_name'];?></a></li>
               <?php } ?>
             </ul>
            </div>
            <!-- single-sidebar-end -->
            <!-- single-sidebar-start -->
            <div class="single-sidebar">
             <h3 class="single-sidebar-title">Sub Category</h3>
              <ul>
               <?php foreach ($subcategory as $s) { ?>
                <li><a href="<?php echo site_url("emart/shop?action=add&subcatid=".$s['sub_cat_id'])?>"><?php echo $s['sub_cat_name'];?></a>
                </li>
               <?php } ?>
              </ul>
            </div>
            <div class="single-sidebar">
              <h3 class="single-sidebar-title">Brand</h3>
               <ul>
                <?php foreach ($brand as $b) { ?>
                  <li><a href="<?php echo site_url("emart/shop?action=add&brand=".$b['brand_id'])?>"><?php echo $b['brand_name'];?></a></li>
                   <?php } ?>
               </ul>
            </div>
            <!-- single-sidebar-end -->
            <div class="left-sidebar-title" style="display:none;">
               <h3>Compare Products</h3>
            </div>
            <div class="single-sidebar" style="display:none;">
              <p>You have no items to compare.</p>
            </div>
            <div class="left-sidebar-title" style="display:none;">
              <h3>Popular Tags</h3>
            </div>
            <!-- single-sidebar-start -->
            <div class="single-sidebar" style="display:none;">
              <ul class="tags-list">
               <?php foreach ($category as $c) { ?>
                <li><a href="#"><?php echo $c['cat_name'];?></a></li>
               <?php } ?>
              </ul>
              <div class="actions">
               <ul class="tags-list">
                <li><a href="#">ViewAll Tags</a></li>
               </ul>
              </div>
            </div>
          <!--  <?php if($vendor_detail){
               if(config_item('enable_vendor_management')){
              ?>
            <div class="single-sidebar">
              <h3 style="color: #8ba462;"><b>Best Sellers</b></h3>
              <ul>
                <?php foreach($vendor_detail as $v){?>
                <li><input type="checkbox" id="vendor" name="vendor" value="coding"><label for="vendor"><a href="<?php echo site_url('emart/shop-list')?>?vid=<?php echo $v['vendor_id']?>"><?php echo $v['name'] ?></a></label></li>
                <?php }} ?>
              </ul>
            </div> 
            <?php } ?> -->
             <!-- single-sidebar-end -->
             <!-- single-sidebar-start -->
            <div class="single-sidebar den">
              <div class="single-banner">
               <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $shop_bannerleft[0]['prod_id']?>"><img src="<?php echo $shop_bannerleft[0]['image'] ? base_url('uploads/' . $shop_bannerleft[0]['image']) : base_url('uploads/store_default/270x408.jpg'); ?>" alt="" /></a>
              </div>
            </div>
             <!-- single-sidebar-end -->
           </div>
         </div>
         <div class="col-lg-9 col-md-9 col-sm-12">
          <div class="laptopview-banner">
           <div class="shop-banner">
             <img src="<?php echo $shop_banner[0]['image'] ? base_url('uploads/' . $shop_banner[0]['image']) : base_url('uploads/store_default/870x287.jpg'); ?>" alt="" />
           </div>
          </div>
          <div class="category-products">
           <div class="row"> 
            <div class="toolbar">
             <div class="col-lg-4 col-md-2 col-sm-3 col-xs-5">
              <!-- Nav tabs -->
		            <div class="view-mode">
		             <ul role="tablist" style="display:none;">
		              <li class="active">
		               <a href="#shop-square" data-toggle="tab"><i class="fa fa-th"></i></a>
		              </li>
		              <li>
		                <a href="#shop-list" data-toggle="tab"><i class="fa fa-th-list"></i></a>
		              </li>
		             </ul>
		            </div>
             </div>
             <div class="mobile-filter"> 
		            <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
		              <div class="limiter" >
		               <label>Shop By Category:</label>
		                <select style="width:150px" id="cat_select">
		                 <option>Select</option>
		                  <?php foreach ($category as $c)
		                  { ?>
                      <option value="<?php echo site_url("emart/shop?action=add&cat_id=".$c['cat_id'])?>"><?php echo $c['cat_name'];?>
                      </option>
		                   <?php 
                    } ?>
		                </select>
		              </div>
		            </div>
	            </div>

              <div class="mobile-filter"> 
                <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
                 <?php if(config_item('enable_vendor_management')=="Yes"){?>
                  <div class="limiter" >
                   <label>Shop Best Sellers:</label>
                    <select style="width:150px" id="vendor_select">
                     <option>Select</option> 
                      <?php foreach($vendor_detail as $v)
                      { ?>
                        
                      <option value="<?php echo site_url("emart/shop-list?vid=".$v['vendor_id'])?>"><?php echo $v['name'];?>
                      </option>
                       <?php 
                    } ?>
                    </select>
                  </div>
                 <?php } ?>

                </div>
              </div>


             <div class="col-lg-4 col-md-5 col-sm-4 hidden-xs">
              <div class="sorter">
               <div class="sort-by floatright" style="display:none;">
                <label>Sort By</label>
                <select name="sort" id="sort" onchange='load_new_content()'>
                 <!--<option selected="selected">Position</option>-->
                 <option value="name">Name</option>
                 <option value="price">Price</option>
                </select>
                <a href="#"><i class="fa fa-long-arrow-up"></i></a>
               </div>
              </div>
             </div>
            </div>
           </div>
           <div class="row">
            <!-- Tab panes -->
            <div class="tab-content">
             <div role="tabpanel" class="tab-pane active" id="shop-square">
              <?php if($data){ 
               foreach ($data as $p) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                 <div class="single-product">
                  <!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
                  <div class="product-thumb" style="width:260px,height:100px">
                  <!-- <span class="label-pro-sale">-9%</span>
                   <span class="new">new</span>-->
                    <!--<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-3.jpg') ?>" alt="" /></a>-->
                    <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $p['id'];?>"><img src="<?php echo $p['image'] ? base_url('uploads/' . $p['image']) : base_url('uploads/default.jpg'); ?>" alt="" />
                    </a>
                  </div>
                  <div class="product-desc">
                   <form method="post" action="shop?action=add&id=<?php echo $p['id']; ?>">
                    <h2 class="product-name" style="height:auto;"><a class="product-name" href="#"><?php echo $p['prod_name']; ?></a></h2>
                    <div class="price-box floatleft">
                     <p class="old-price"><?php echo config_item('currency'). " ". $p['prod_price']; ?></p>
                     <p class="normal-price"><?php echo config_item('currency'). " ";?><?php echo $p['prod_price']-($p['prod_price']*($p['discount']/100)); ?></p>
                     <p style="color:black;font-weight: normal"><?php echo "Inclusive of all taxes"; ?></p>
                     <?php if($p['pv'] >0){ ?>
                     <p class="product-pv">PV=<?php echo $p['pv'];?></p>
                     <?php } ?>
                     <p class="availability in-stock">Availability: <span><?php if($p['qty'] !=0){?>In stock</span><?php } else{?><span>Out of stock </span>     <?php } ?></p>
                    </div>
                    <div class="product-action floatright">
                     <input type="hidden" name="hidden_name" value="<?php echo $p['prod_name']; ?>" />
                     <input type="hidden" name="hidden_vendor_id" value="<?php echo $p['vendor_id']; ?>" />
                     <input type="hidden" name="hidden_price" value="<?php echo $p['prod_price']; ?>" />
                     <input type="hidden" name="hidden_tax" value="<?php echo $p['gst']; ?>" />
                     <input type="hidden" name="hidden_discount" value="<?php echo $p['discount']; ?>" />
                     <input type="hidden" name="hidden_image" value="<?php echo $p['image'] ? base_url('uploads/' . $p['image']) : base_url('uploads/default.jpg'); ?>" />
                        <!--<a href="#"><i class="fa fa-shopping-cart"></i></a>-->
                      <?php if($p['qty'] !=0){
                        if(config_item('enable_variation')=="123"){
                        ?>
                       <label>Qty:</label>
								                <input type="number" min="1" name="qty" id="qty" style="width:50px;height:25px;text-align:center" required />
                        <input type="submit" name="add_to_cart" class="fa fa-shopping-cart" value="&#xf07a;" 
                         style="border: 1px solid #ebebeb;
                                border-radius: 4px;
                                color: #000;
                                display: inline-block;
                                height: 35px;
                                line-height: 33px;
                                margin-right: 3px;
                                text-align: center;
                                width: 35px;">
                         <a href="#"><i class="fa fa-heart-o"></i></a>
                         <a href="#"><i class="fa fa-exchange"></i></a>
                      <?php }
                           }
                      ?>
                    </div>
                   </form>
                  </div><!--product description-->
                 </div>
                </div>
                <?php } }else{?>
                 <p>No Records Found</p>
                <?php  } ?>
             </div><!--end-->
           </div>
          </div>
        </div>
          </div>
         </div>
        </div>
        <!-- shop-page-end -->
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
              <a href="#"><?php echo config_item('company_name');?> is the best place for online purchase. The product quality and customer service are best in the industry. Purchase reward and Affiliate marketing stategy increases customer repurchase potential... 
              </a>
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
        <?php include 'includes_bottom.php'; ?>
   </body>
</html>
