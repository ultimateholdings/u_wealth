<?php
/*$user_id = $this->session->user_id;
$name=$this->session->name;
$cat_id=$_GET['cat_id'];
$subcatid=$_GET['subcatid'];
$parent_cat=$_GET['par_cat'];
$vendor_id=$_GET['vid'];
$this->db->order_by('id', 'RANDOM');
$this->db->limit(2);
$query = $this->db->get('product');
$random_product=$query->result_array();
$this->db->order_by('prod_name', 'RANDOM');
$this->db->limit(1);
$query = $this->db->get('product');
$footer_product=$query->result_array();

if($vendor_id!=""){
    $this->db->select('id,prod_name,prod_price,product_cost,image,image2,image3,image4,image5,category,sub_category,brand,prod_desc,gst,qty,discount,vendor_id')->order_by('id', 'ASC')->where(array('vendor_id' => $vendor_id));
    $vendor_product=$this->db->get('product')->result_array();
    
    $this->db->select('prod_name')->where('vendor_id',$vendor_id);
    $vp=$this->db->get('product')->result_array();
    //print_r($vp);die();
}

$this->db->select('id, banner_name, prod_id, banner_desc, image, flag')->where('flag', 'shoplist_banner');
$shoplist_banner=$this->db->get('store_images')->result_array();

$this->db->select('id, banner_name, prod_id, banner_desc, image, flag')->where('flag', 'shoplist_bannerleft');
$shoplist_bannerleft=$this->db->get('store_images')->result_array();

if($cat_id && $subcatid && $parent_cat){
    $this->db->select('id,prod_name,prod_price,product_cost,image,category,sub_category,brand,prod_desc,gst,discount,vendor_id')->order_by('id', 'ASC')->where(array('category' => $cat_id,
                                   'sub_category' =>$subcatid));
    $data=$this->db->get('product')->result_array();
}
else if($cat_id){
  $this->db->select('id, prod_name,prod_price,product_cost,image,category,brand,prod_desc,gst,discount,vendor_id')->order_by('id', 'ASC')->where('category',$cat_id);
  $data=$this->db->get('product')->result_array();
}
else if($subcatid){
  $this->db->select('id, prod_name,prod_price,product_cost,image,category,brand,prod_desc,gst,discount,vendor_id')->order_by('id', 'ASC')->where('sub_category',$subcatid);
  $data=$this->db->get('product')->result_array();
}/*else{
$this->db->select('id, prod_name,prod_price,image,category,brand,prod_desc,gst')->order_by('id', 'ASC');
$data=$this->db->get('product')->result_array();
}
$this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
$category=$this->db->get('product_categories')->result_array();

$this->db->select('sub_cat_id, sub_cat_name')->order_by('sub_cat_name', 'ASC');
$subcategory=$this->db->get('product_sub_category')->result_array();

$this->db->select('brand_id, brand_name')->order_by('brand_name', 'ASC');
$brand=$this->db->get('brands')->result_array();
*/
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
        'item_price'    =>  $_POST["hidden_price"],
        'item_tax'      =>  $_POST["hidden_tax"],
        'item_discount' =>  $_POST["hidden_discount"],
        'item_image'        =>  $_POST["hidden_image"],
        'item_quantity'     =>  $_POST["qty"],
        'item_vendor_id'=>  $_POST["hidden_vendor_id"],
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
        
        echo '<script>window.location="shop-list"</script>';
        
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
        'item_tax'      =>  $_POST["hidden_tax"],
        'item_discount' =>  $_POST["hidden_discount"],
        'item_image'        =>  $_POST["hidden_image"],
        'item_quantity'     =>  $_POST["qty"],
        'item_vendor_id'=>  $_POST["hidden_vendor_id"],
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
                echo '<script>window.location="shop-list"</script>';
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
    <body>
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
								<li><a href="#">Products</a></li>
								
							</ul>
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
					<div class="col-lg-3 col-md-3">
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
             <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
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
           <li><a href="#"><?php echo $b['brand_name'];?></a></li>
          <?php } ?>
           <p class="adress">
            <i class="fa fa-map-marker"></i>
            <?php echo config_item('company_address'); ?><br>
           </p>
           <p class="phone">
            <i class="fa fa-phone"></i>
            <span class="mobile">Telephone:
            <br/><?php echo config_item('phone'); ?></span>
           </p>
           <p class="email">
            <i class="fa fa-envelope-o"></i> Email:
            <br/><?php echo config_item('email'); ?>
           </p>
          </ul>
         </div>
         <!-- single-sidebar-end -->
        <div class="left-sidebar-title" style="display:none;">
         <h3>Compare Products</h3>
        </div>
        <div class="single-sidebar" style="display:none;">
         <p>You have no items to compare.</p>
        </div>
        <div class="left-sidebar-title">
         <h3>Popular Tags</h3>
        </div>
        <!-- single-sidebar-start -->
							 <div class="single-sidebar">
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
					 <div class="col-lg-9 col-md-9">
					  <div class="shop-banner">
					   <img src="<?php echo $shoplist_banner[0]['image'] ? base_url('uploads/' . $shoplist_banner[0]['image']) : base_url('uploads/store_default/870x287.jpg'); ?>" alt="" />
					  </div>
						 <div class="category-products">
							 <div class="row">
								 <div class="toolbar">
									 <div class="col-lg-4 col-md-2 col-sm-3 col-xs-5">
								   <!-- Nav tabs -->
								   <div class="view-mode" style="display:none;">
									   <ul role="tablist">
										  <li>
											  <a href="#shop-square" data-toggle="tab"><i class="fa fa-th"></i></a>
										  </li>
										  <li class="active">
											  <a href="#shop-list" data-toggle="tab"><i class="fa fa-th-list"></i></a>
										  </li>
									   </ul>
								   </div>
									 </div>
									 <div class="col-lg-4 col-md-5 col-sm-5 col-xs-7">
										 <div class="limiter" style="display:none;">
											 <label>Show</label>
											  <select>
												<option selected="selected">9</option>
												<option>12</option>
												<option>24</option>
												<option>36</option>
											  </select>
											 <label>per page</label>
										 </div>
									 </div>
									<div class="col-lg-4 col-md-5 col-sm-4 hidden-xs">
										<div class="sorter" style="display:none;">
											<div class="sort-by floatright">
												<label>Sort By</label>
												<select>
													<option selected="selected">Position</option>
													<option>Name</option>
													<option>Price</option>
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
									<div role="tabpanel" class="tab-pane" id="shop-square">
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
													<!--<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-3.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
													<!--<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-1.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
													<!--<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/wine-2.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
												<!--	<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-2.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
													<!--<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/wine-2.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
													<!--<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/wine-1.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
													<!--<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-3.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
												<!--	<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-2.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-4">
											<div class="single-product">
												<!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
												<div class="product-thumb">
													<!--<span class="label-pro-sale">-9%</span>
													<span class="new">new</span>-->
													<a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-1.jpg') ?>" alt="" /></a>
												</div>
												<div class="product-desc">
													<h2 class="product-name"><a class="product-name" href="#">Fusce aliquam</a></h2>
													<div class="price-box floatleft">
														<p class="old-price">$170.00</p>
														<p class="normal-price">$155.00</p>
													</div>
													<div class="product-action floatright">
														<a href="#"><i class="fa fa-shopping-cart"></i></a>
														<a href="#"><i class="fa fa-heart-o"></i></a>
														<a href="#"><i class="fa fa-exchange"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane active" id="shop-list">
										<div class="row">
           <?php if($vendor_product){
            foreach($vendor_product as $p){  ?>
										  <div class="li-item">
             <div class="col-md-4 col-sm-4 col-xs-12 col-shop">
              <div class="single-product shop6">
               <div class="product-img">
                <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $p['id'];?>">
                 <img class="primary-image" alt="" src="<?php echo $p['image']? base_url('uploads/' . $p['image']) : base_url('uploads/default.jpg'); ?>">
                </a>
               </div>
               <div class="actions-btn">
                <!--<a data-toggle="modal" title="Quick View" href="#productModal" class="view-single-product"><i class="fa fa-expand"></i></a>-->
               </div>
              </div>
             </div>
             <div class="col-md-8 col-sm-8 col-xs-12 col-shop">
              <div class="f-fix">
               <div class="content-box pro2">
                <h2 class="product-name feil">
                 <a href="<?php echo site_url('emart/single-product')?>?id=<?php echo $p['id']?>"><?php echo $p['prod_name']?></a>
                </h2>
                <!--<div class="shop-next">
                 <a href="#">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-half-o" aria-hidden="true"></i>
                 </a>
                </div>-->
               </div>
               <div class="p-box">
                <span class="special-price"><?php echo config_item('currency'). " ";?><?php echo $p['prod_price']-($p['prod_price']*($p['discount']/100)); ?></span>
                <p>Inclusive of all taxes</p>
                <p class="availability in-stock">Availability: <span><?php if($p['qty']== "-1" || $p['qty']>0){?>In stock</span><?php } else{?><span>Out of stock </span>     <?php } ?></p>
               </div>
               <p class="desc"><?php echo $p['prod_desc'];?></p>
               <div class="sin-product-add-cart">
                <form method="post" action=" shop-list?action=add&id=<?php echo $p['id']; ?>">
                 <input type="hidden" name="hidden_name" value="<?php echo $p['prod_name']; ?>" />
                 <input type="hidden" name="hidden_price" value="<?php echo $p['prod_price']; ?>" />
                 <input type="hidden" name="hidden_vendor_id" value="<?php echo $p['vendor_id']; ?>" />
                 <input type="hidden" name="hidden_tax" value="<?php echo $p['gst']; ?>" />
                 <input type="hidden" name="hidden_discount" value="<?php echo $p['discount']; ?>" />

                 <input type="hidden" name="hidden_image" value="<?php echo $p['image']? base_url('uploads/' . $p['image']) : base_url('uploads/default.jpg'); ?>" />
                 <?php if($p['qty'] !=0){?>     
                <!-- <button name="add_to_cart" type="submit">
                  <i class="fa fa-shopping-cart"></i>
                <span>add to cart</span>-->
                  <?php } ?>
                 </button>
                </form>           
               </div>
              </div>
             </div>
            </div>
           <?php }}else{?>
            <div><p style="padding-left: 50px;color:red;font-size:20px;">No Results Found!!</p></div>
           <?php } ?>
										</div>
									</div>
									<!--<div class="pages">
         <ul>
          <li class="current"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"><i class="fa fa-arrow-right"></i></a></li>
         </ul>
         </div>-->
								</div>
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
		<!-- quickview product -->
        <div id="quickview-wrapper">
            <!-- Modal -->
            <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-product">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-5 col-sm-12 col-xs-12">
                                            <div class="zoom-all">
                                                <div class="pro-img-tab-content tab-content">
                                                <div class="tab-pane active" id="image-1">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="img/products/spcial-wine-1.jpg') ?>" href="img/products/spcial-wine-1.jpg') ?>">
                                                            <img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-1.jpg') ?>" alt="" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="image-2">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="img/products/spcial-wine-2.jpg') ?>" href="img/products/spcial-wine-2.jpg') ?>">
                                                            <img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-2.jpg') ?>" alt="" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="image-3">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="img/products/spcial-wine-3.jpg') ?>" href="img/products/spcial-wine-3.jpg') ?>">
                                                            <img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-3.jpg') ?>" alt="" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="image-4">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="img/products/wine-1.jpg') ?>" href="img/products/wine-1.jpg') ?>">
                                                            <img src="<?php echo base_url('axxets/shop/img/products/wine-1.jpg') ?>" alt="" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="image-5">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="img/products/wine-2.jpg') ?>" href="img/products/wine-2.jpg') ?>">
                                                            <img src="<?php echo base_url('axxets/shop/img/products/wine-2.jpg') ?>" alt="" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="image-6">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image" data-lightbox="roadtrip" data-lens-image="img/products/spcial-wine-1.jpg') ?>" href="img/products/spcial-wine-1.jpg') ?>">
                                                            <img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-1.jpg') ?>" alt="" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pro-img-tab-slider indicator-style2">
                                                <div class="item"><a href="#image-1" data-toggle="tab"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-1.jpg') ?>" alt="" /></a></div>
                                                <div class="item"><a href="#image-2" data-toggle="tab"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-2.jpg') ?>" alt="" /></a></div>
                                                <div class="item"><a href="#image-3" data-toggle="tab"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-3.jpg') ?>" alt="" /></a></div>
                                                <div class="item"><a href="#image-4" data-toggle="tab"><img src="<?php echo base_url('axxets/shop/img/products/wine-1.jpg') ?>" alt="" /></a></div>
                                                <div class="item"><a href="#image-5" data-toggle="tab"><img src="<?php echo base_url('axxets/shop/img/products/wine-2.jpg') ?>" alt="" /></a></div>
                                                <div class="item"><a href="#image-6" data-toggle="tab"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-1.jpg') ?>" alt="" /></a></div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-sm-12 col-xs-12">
                                            <div class="page-single-product-desc">
                                                <div class="product-name">
                                                    <h2>Fusce aliquam</h2>
                                                </div>
                                                <p class="availability in-stock">Availability: <span>In stock</span></p>
                                                <div class="product-rating">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="price-box single-product-price">
                                                    <p class="normal-price">$250</p>
                                                </div>
                                                <div class="sin-product-shot-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul...</p>
                                                </div>
                                              <div class="sin-product-add-cart">
                                                <form method="post" action="shop-list?action=add&id=<?php echo $product_id; ?>">
                                                 <input type="hidden" name="hidden_name" value="<?php echo $data[0]['prod_name']; ?>" />
                                                 <input type="hidden" name="hidden_price" value="<?php echo $data[0]['prod_price']; ?>" />
                                                 <input type="hidden" name="hidden_image" value="<?php echo $data[0]['image']? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>" />
                            
                                                    <label>Qty</label>
                                                    <input type="number" name="qty" id="qty" min="1" />
                                                 <!--   <button name="add_to_cart" type="submit" style="display:none;">
                                                       <i class="fa fa-shopping-cart"></i>
                                                      <span>add to cart</span>
                                                    </button>-->
                                                </div>
                                                <div class="product-action">
                                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                                    <a href="#"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#"><i class="fa fa-exchange"></i></a>
                                                </div>
                                                <img src="<?php echo base_url('axxets/shop/img/buttons/social-buttons-1.jpg') ?>" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div>
            <!-- END Modal -->
        </div>
        <!-- END quickview product -->
		    <!-- all js here -->
        <?php include 'includes_bottom.php'; ?>
    </body>
</html>
