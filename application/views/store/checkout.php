<?php
/*$user_id = $this->session->user_id;
$name=$this->session->name;
$member_data = $this->db_model->select_multi('name, email, phone, address', 'member', array('id' => $user_id));
$billing_address=$this->db_model->select_multi('b_name, b_email, b_phone, b_address,b_state,b_city,b_zipcode', 'shipping_address', array('userid' => $user_id));
$shipping_address=$this->db_model->select_multi('s_name, s_email, s_phone, s_address,s_state,s_city,s_zipcode', 'shipping_address', array('userid' => $user_id));
$this->db->order_by('id', 'RANDOM');
$this->db->limit(2);
$query = $this->db->get('product');
$random_product=$query->result_array();

$this->db->order_by('prod_name', 'RANDOM');
$this->db->limit(1);
$query = $this->db->get('product');
$footer_product=$query->result_array();

$this->db->select('id, banner_name, prod_id, banner_desc, image, flag')->where('flag', 'shop_bannerleft');
$shop_bannerleft=$this->db->get('store_images')->result_array();

$ewallet_amount= $this->db_model->select('balance', 'wallet', array('userid' => $user_id));
$repurchase_amount=$this->db_model->select('balance', 'other_wallet', array('userid' => $user_id,'type'=>"Repurchase"));
//print_r($repurchase_amount);die();
$cat_id=$_GET['cat_id'];
$subcatid=$_GET['subcatid'];
$parent_cat=$_GET['par_cat'];
if($cat_id && $subcatid && $parent_cat){
    $this->db->select('id,prod_name,prod_price,image,category,sub_category,brand,prod_desc,gst,discount')->order_by('id', 'ASC')->where(array('category' => $cat_id,
                                   'sub_category' =>$subcatid));
    $data=$this->db->get('product')->result_array();
}
else if($cat_id){
  $this->db->select('id, prod_name,prod_price,image,category,brand,prod_desc,discount')->order_by('id', 'ASC')->where('category',$cat_id);
  $data=$this->db->get('product')->result_array();
}else{
$this->db->select('id, prod_name,prod_price,image,category,brand,prod_desc,discount')->order_by('id', 'ASC');
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
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        $count = count($_SESSION["shopping_cart"]);
        $item_array = array(
        'item_id'       =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'        =>  $_POST["hidden_price"],
        'item_tax'      =>  $_POST["hidden_tax"],
        'item_image'        =>  $_POST["hidden_image"],
        'item_discount' =>  $_POST["hidden_discount"],
        'item_quantity'     =>  $_POST["qty"],
        'item_vendor_id'=>  $_POST["hidden_vendor_id"],
        'item_variant_name'=> $_POST["variant"], 
        'item_variant_value'=> $_POST["variant_value"],
         );
         //debug_log($item_array);
        $_SESSION["shopping_cart"][$count] = $item_array;
        
        echo '<script>window.location="shop"</script>';
        
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
        'item_image'        =>  $_POST["hidden_image"],
        'item_quantity'     =>  $_POST["qty"],
        'item_discount' =>  $_POST["hidden_discount"],
        'item_vendor_id'=>  $_POST["hidden_vendor_id"],
        'item_variant_name'=> $_POST["variant"], 
        'item_variant_value'=> $_POST["variant_value"],

        );
        //debug_log("checkout else". $item_array);
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

 <body style="overflow: auto;">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- header start -->
    <?php include 'header.php' ?>
    <!-- header end -->
    <!-- checkout-area-start-->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12" id="shoppingoptions">
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
                                       <li><a href="<?php echo site_url("emart/shop?action=add&subcatid=".$s['sub_cat_id'])?>"><?php echo $s['sub_cat_name'];?></a></li>
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
               <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- Payment Method -->
                <div class="payment-method">
                 <!-- Panel Gropup -->
                 <div class="panel-group" id="accordion">
                  <!-- Panel Default -->
                  <div class="panel panel-default">
                   <div class="panel-heading">
                    <h4 class="check-title">
                     <a data-toggle="collapse" class="active" data-parent="#accordion" href="#checkut1">
                      <span class="number">1</span>Checkout Method</a>
                    </h4>
                   </div>
                   <?php if(!$user_id){?>
                   <div id="checkut1" class="panel-collapse collapse in">
                    <div class="panel-body">
                     <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       <form class="checkout-form product-form">
                        <div class="user-bottom fix">
                         <button class="common-btn rjc" 
                         style="background-color: blue; width: 110px;margin-right: 10px;" type="button" onclick="window.location = '<?php echo site_url('site/login')?>';">Login </button>
                         <button class="common-btn rjc" type="button" id="continue1" onclick="window.location = '<?php echo site_url('site/register')?>';">Register</button>
                        </div>
                       </form>
                      </div>
                     </div>
                    </div>
                   </div>
                  <?php }else if($user_id){ ?>
                  <div id="checkut1" class="panel-collapse collapse in">
                   <div class="panel-body">
                    <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <h4 style="color:blue;">Signed in as <span style="color:green;"> <?php echo $name;?></span>(Not You<a href="<?php echo site_url('member/logout')?>" style="color:red;  "> Logout</a>)</h4>
                     </div>
                    </div>
                   </div>
                  </div>
                  <?php } ?>
                 </div>
                 <!-- End Panel Default -->
                 <!-- Panel Default -->
                <form method="post" action="<?php echo site_url('emart/place_order')?>" >
                 <div class="panel panel-default" id="billing_info">
                  <div class="panel-heading">
                   <h4 class="check-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#checkut2">
                    <span class="number">2</span>Billing Information</a>
                   </h4>
                  </div>
                  <div id="checkut2" class="panel-collapse collapse">
                   <div class="row">
                    <div class="col-sm-6">
	                    <div class="panel-body">
	                     <div class="user-billing-info">
                       <div class="row">
                        <div class="form">
                         <h2> <b>Billing Address&nbsp; </b><a href="<?php echo site_url('member/billing-address')?>" style="color:blue;"> Click here to update</a></h2><br>
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="user-info-single">
                           <label>Name</label>
                           <input type="text" value="<?php echo $billing_address->b_name ?>" name="fname" id="fname" disabled />
                          </div>
                         </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="user-info-single">
                          <label>Email<span class="required">*</span></label>
                           <input type="text" name="email" disabled id="email" value="<?php echo $billing_address->b_email ?>"/>
                         </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                         <div class="user-info-single">
                          <label>Phone<span class="required">*</span></label>
                          <input type="text" value="<?php echo $billing_address->b_phone ?>" name="phone" id="phone" disabled  />
                         </div>
                        </div>
                       </div>
                      </div>
                      <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="user-info-single">
                         <label>Address<span class="required">*</span></label>
                          <input type="text" value="<?php echo $billing_address->b_address ?>" name="address" id="address" disabled/>
                        </div>
                       </div>
                      </div>
                      <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="user-info-single">
                         <label>City</label>
                          <input type="text" name="city" disabled id="city" value="<?php echo $billing_address->b_city ?>" />
                        </div>
                       </div>
                      </div>
                      <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="user-info-single">
                         <label>State</label>
                          <input type="text" name="state" id="state" disabled value="<?php echo $billing_address->b_state ?>" />
                        </div>
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="user-info-single">
                         <label>Zip/Postal Code<span class="required">*</span></label>
                          <input type="text" name="zip" id="zip" disabled value="<?php echo $billing_address->b_zipcode ?>"/>
                        </div>
                       </div>
                      </div>
                     </div>
	                   </div>
	                   <div class="col-sm-6">
	                    <div class="panel-body">
	                     <div class="user-billing-info">
                       <div class="row">
	                       <div class="form">
		                       <h2> <b>Shipping Address&nbsp; </b> <a href="<?php echo site_url('member/shipping-address')?>"style="color:blue;"> Click here to update</a></h2><br>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                         <div class="user-info-single">
	                          <label>Name </label>
	                           <input type="text" value="<?php echo $shipping_address->s_name ?>" name="fname_new" id="fname_new" disabled />
	                         </div>
	                        </div>
	                       </div>
                       </div>
                       <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="user-info-single">
                          <label>Email<span class="required">*</span></label>
                           <input type="text" name="email" id="email_new" value="<?php echo $shipping_address->s_email ?>" disabled/>
                         </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                         <div class="user-info-single">
                          <label>Phone<span class="required">*</span></label>
                           <input type="text" value="<?php echo $shipping_address->s_phone ?>" name="phone" id="phone_new" disabled />
                         </div>
                        </div>
                      </div>
                      <div class="row">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="user-info-single">
                         <label>Address<span class="required">*</span></label>
                          <input type="text" value="<?php echo $shipping_address->s_address ?>" name="address" id="address_new" disabled />

                        </div>
                       </div>
                     </div>
                     <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <div class="user-info-single">
                        <label>City</label>
                        <input type="text" name="city" value="<?php echo $shipping_address->s_city ?>" id="city_new" disabled />
                       </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="user-info-single">
                       <label>State</label>
                        <input type="text" name="state" value="<?php echo $shipping_address->s_state ?>" id="state_new" disabled />
                      </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="user-info-single">
                       <label>Zip/Postal Code<span class="required">*</span></label>
                        <input type="text" name="zip" value="<?php echo $shipping_address->s_zipcode ?>" id="zip_new" disabled/>
                      </div>
                     </div>
                    </div> 	
	                  </div>
                  </div>
	                </div>
                </div>   
               </div><!--checkout2-->
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default"  style="display:none;" >
               <div class="panel-heading">
                <h4 class="check-title">
                 <a data-toggle="collapse" data-parent="#accordion" href="#checkut4" id="shipping_method">
                  <span class="number">3</span>Shipping Method</a>
                </h4>
               </div>
               <div id="checkut4" class="panel-collapse collapse">
                <div class="panel-body">
                 <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="usr-shipping-method">
                    <p>Flat Rate</p>
                    <p>Fixed<span> <?php echo config_item('currency'). " ". 0.00?></span>
                    </p>
                    <a href="#" class="pdt-32">
                     <i class="fa fa-long-arrow-up"></i> Back
                    </a>
                   </div>
                   <button data-toggle="collapse" class="common-btn floatright" href="#checkut5" id="Shipping_button" style="display:none;">Continue</button>
                  </div>
                 </div>
                </div>
               </div>
              </div>
              <!-- End Panel Default -->
              <!-- Panel Default -->
              <div class="panel panel-default">
               <div class="panel-heading">
                <h4 class="check-title">
                 <a data-toggle="collapse" data-parent="#accordion" href="#checkut5">
                  <span class="number">3</span>Payment Information</a>
                </h4>
               </div>
               <div id="checkut5" class="panel-collapse collapse">
                <!--<form method="post" action="">-->
                <div class="panel-body">
                 <div class="row">
                  <div class="col-lg-12 col-md-12 col-xs-12" id="payment">
                   <div class="user-info-single user-payment-info" style="display:none;">
                    <input type="radio" name="payment_mode" id="payment_mode" value="COD" checked="checked" />
                     <label>Cash on Delivery</label>
                   </div>
                   <?php if($user_id){
                   	if($repurchase_amount>=$total){?>
                     <div class="user-info-single user-payment-info">
                      <input type="radio" name="payment_mode" id="payment_mode" value="repurchase" checked="checked" />
                       <label>Repurchase-Wallet </label><br>
                       <label>Your Repurchase-Wallet balance is:&nbsp;&nbsp;<b><?php echo $repurchase_amount ;?></b></label>
                       <input type="hidden" name="transactionid" value="">
                     </div>

                   <?php } 
                    else if($ewallet_amount>=$total){?>
                     <div class="user-info-single user-payment-info">
                      <input type="radio" name="payment_mode" id="payment_mode" value="Ewallet" checked="checked" />
                       <label>E-Wallet </label><br>
                       <label>Your E-Wallet balance is:&nbsp;&nbsp;<b><?php echo $ewallet_amount ;?></b></label>
                       <input type="hidden" name="transactionid" value="">
                     </div>
                    <?php } else { ?>
                    <div style="display:none;"class="user-info-single user-payment-info">
                     <input type="radio" name="payment" id="payment" value="bank" required/>
                     <label>Topup</label>
                    </div>
                    <div class="col-md-12 col-sm-12" style="margin-bottom: 10px;">
                     <p align="center">
                      <a href="<?php echo site_url('member/topup-wallet') ?>"class="btn btn-lg btn-primary"><span class="fa fa-usd"></span> Top Up Wallet &rarr;</a>
                     </p>
                    </div>
                   <?php } ?>
                   <!-- <div id="bankdetail" style="display:none;">
                   <span><b>Please Transfer Amount to below account and Enter the transaction ID:</b></span><br/><br/>
                   <span>BHIM UPI:&nbsp;&nbsp;<?php echo config_item('company_upi')?></span><br/>
                   <span>Google Pay Number:&nbsp;&nbsp;<?php echo config_item('googlepay_no')?></span><br/>
                   <span>PhonePe Number:&nbsp;&nbsp;<?php echo config_item('phonepay_no')?></span><br/><br/>
                   <span>Bank Name:&nbsp;&nbsp;<?php echo config_item('bank_name')?></span><br/>
                   <span>Account Number:&nbsp;&nbsp;<?php echo config_item('account_no')?></span><br/>
                   <span>IFSC Code:&nbsp;&nbsp;<?php echo config_item('ifsc')?></span><br/>
                   <span>Bank Branch:&nbsp;&nbsp;<?php echo config_item('branch')?></span><br/>
                   <span>Account Type:&nbsp;&nbsp;<?php echo config_item('accounttype')?></span><br/><br/>
                   <label>Select Payment Mode:</label>
                   <select class="form-control" id="payment_mode" name="payment_mode" >
                    <option value="Bank">Bank</option>
                    <option value="BHIM">BHIM</option>
                    <option value="Google_Pay">Google_Pay</option>
                    <option value="PhonePe">PhonePe</option>
                   </select>
                   <label>Please enter the Transaction ID:</label>
                    <input type="text" name="transactionid" required id="transactionid" style="border-color:#837D7B;"/>
                  </div>-->
                 <?php }  else { ?>
                 <div style="display:none;" class="user-info-single user-payment-info">
                  <input type="radio" name="payment" id="payment" value="bank" />
                   <label>Bank Payment</label>
                 </div>
                 <div id="bankdetail">
                  <span><b>Please Transfer Amount to below account and Enter the transaction ID:</b></span><br/><br/>
                  <span>BHIM UPI:&nbsp;&nbsp;<?php echo config_item('company_upi')?></span><br/>
                  <span>Google Pay Number:&nbsp;&nbsp;<?php echo config_item('googlepay_no')?></span><br/>
                  <span>PhonePe Number:&nbsp;&nbsp;<?php echo config_item('phonepay_no')?></span><br/><br/>
                  <span>Bank Name:&nbsp;&nbsp;<?php echo config_item('bank_name')?></span><br/>
                  <span>Account Number:&nbsp;&nbsp;<?php echo config_item('account_no')?></span><br/>
                  <span>IFSC Code:&nbsp;&nbsp;<?php echo config_item('ifsc')?></span><br/>
                  <span>Bank Branch:&nbsp;&nbsp;<?php echo config_item('branch')?></span><br/>
                  <span>Account Type:&nbsp;&nbsp;<?php echo config_item('accounttype')?></span><br/><br/>
                  <label>Select Payment Mode:</label>
                  <select class="form-control" id="payment_mode" name="payment_mode" >
                   <option value="Bank">Bank</option>
                   <option value="BHIM">BHIM</option>
                   <option value="Google_Pay">Google_Pay</option>
                   <option value="PhonePe">PhonePe</option>
                  </select>
                  <label>Please enter the Transaction ID:</label>
                   <input type="text" name="transactionid" required id="transactionid" style="border-color:#837D7B;"/>
                 </div>
                 <?php } ?>
                </div>
                <div class="row">
                 <div class="col-lg-6 col-md-6 col-xs-12" style="display:none;">
                  <a href="#" class="pdt-32">
                   <i class="fa fa-long-arrow-up"></i> Back
                  </a>
                 </div>
                 <div class="col-lg-6 col-md-6 col-xs-12">
                  <button data-toggle="collapse" class="common-btn floatright" href="#checkut6" id="payment_button" style="display:none;">continue</button>
                 </div>
                </div>
               </div>
               <!--</form>-->
              </div>
             </div>
             <!-- End Panel Default -->
             <!-- Panel Default -->
             <div class="panel panel-default">
              <div class="panel-heading">
               <h4 class="check-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#checkut6">
                 <span class="number">4</span>Order Review</a>
               </h4>
              </div>
              <div id="checkut6" class="panel-collapse collapse">
               <div class="panel-body">
                <div class="row">
                 <div class="col-lg-12 col-md-12 col-xs-12">
                  <div class="user-order-review table-responsive">
                   <table>
                    <thead>
                     <tr>
                      <td>Product Name</td>
                      <td>Unit Price per piece</td>
                      <td>Discount</td>
                      <td>Price after discount</td>
                      <td>Tax per piece</td>
                      <td>Price Per piece</td>
                      <td>Qty</td>
                      <td>Subtotal</td>
                     </tr>
                    </thead>
                    <tbody>
                    <?php
                     if(!empty($_SESSION["shopping_cart"]))
                     {
                       $total = 0;
                       foreach($_SESSION["shopping_cart"] as $keys => $values)
                       {?>
                       <tr>
                        <td class="first-column">
                         <h3 style="line-height: normal;">
                          <?php $prod_name =  $values["item_name"]; 
                         if(config_item('enable_variation')=="Yes" && $values['item_variant_name'])
                         {
                            foreach ($values['item_variant_name'] as $vkey=>$value)
                            {
                             $prod_name = $prod_name.'<br>'.$value.'-'.$values['item_variant_value'][$vkey];
                            }
                            echo $prod_name;
                         }
                         else{
                          echo $prod_name;
                         }
                         ?></h4>
                        </td>
                        <?php
                        $pricepp=($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)));
                        $pricebeforetax=$pricepp/(1+$values["item_tax"]/100);
                        $tax_amount=$pricepp-$pricebeforetax;
                        $priceafterdiscount=$pricepp-$tax_amount;
                        $discount=$values["item_price"]*($values["item_discount"]/100);
                        $unitprice=$priceafterdiscount+$discount;
                        $subtotal=$pricepp*$values["item_quantity"];
                        $subtotalbefore_tax=$subtotalbefore_tax+($priceafterdiscount)*$values["item_quantity"];
                        $totaltax=$totaltax+($tax_amount*$values["item_quantity"]);
                        ?>
                        <!--<td class="p-price"><?php echo config_item('currency'). " ".round($values["item_price"]/(1+ ($values["item_tax"]/100)),2); ?></td>-->
                        <td class="p-price"><?php echo config_item('currency'). " ".round($unitprice,2); ?></td>
                        <td class="p-price"><?php echo config_item('currency')?><?php echo $discount ;?></td>
                        <td class="p-price"><?php echo config_item('currency')?><?php echo round($priceafterdiscount,2); ?></td>
                        <td class="p-price"><?php echo config_item('currency')?><?php  echo round($tax_amount,2); ?></td>
                        <td><?php echo config_item('currency')?><?php  echo $pricepp; ?></td>
                        <!--<td><?php echo $values["item_tax"]?></td>-->
                        <?php
                        //$item["item_price"] - ($item["item_price"]/(1+$item["item_tax"]/100))
                         //debug_log($values["item_tax"]);
                         
                         $netsubtotal=($subtotal);
                         $total = $total + $netsubtotal;
                        ?>
                        <td class="p-price"><?php echo $values["item_quantity"];?></td>
                        <!--<td><?php echo $subtotal;?></td>-->
                        <td class="p-price"><?php echo config_item('currency'). " ".number_format($netsubtotal, 2);
                        }} ?></td>
                       </tr>
                      </tbody>
                      <tfoot>
                       <tr>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                       </tr>
                       <tr>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right">Subtotal before tax</td>
                        <td class="p-price"><?php echo config_item('currency'). " ". round($subtotalbefore_tax, 2); ?></td>
                       </tr>
                       <tr>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right">Total Tax</td>
                        <td class="p-price"><?php echo config_item('currency'). round($totaltax,2);?></td>
                       </tr>
                       <tr style="display:none;">
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right">Shipping & Handling (Flat Rate - Fixed)</td>
                        <td class="text-right p-price"><?php echo config_item('currency'). " ". 0.00?></td>
                       </tr>
                       <tr>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right">Grand Total</td>
                        <?php
                         session_start();
                         $grandtotal = $total;
                         $_SESSION["grand_total"]=$grandtotal;?>
                         <td class=" p-price"><?php echo config_item('currency'). " ". number_format($grandtotal, 2); ?></td>
                       </tr>
                      </tfoot>
                     </table>
                    </div>
                   </div>
                  </div>
                  <?php if($ewallet_amount < $grandtotal)
                  { 
                   if($user_id)
                   {
                  ?>
                  <div class="row" style="display: none;">
                   <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="user-order-plce">
                     <label class="text-right" style="color:red">Note:You don't have sufficient E-Wallet balance to complete this order. You are eligible to pay by cash on delivery</label>
                    </div>
                   </div>
                  </div>
                  <?php }
                  else{ ?>
                   <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                     <div class="user-order-plce">
                      <label class="text-right" style="color:red">You have not Signed in<a href="<?php echo site_url('site/register')?>" style="color:blue;"> Sign Up</a> to continue </label>
                     </div>
                    </div>
                   </div>
                  <?php }
                 } ?>
                  <div class="row">
                   <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="user-order-plce">
                     <a href="#"><span class="p-price">Forgot an Item?</span> <span>Edit Your Cart</span></a>
                      <?php if($ewallet_amount > $grandtotal){ 
                       if (isset($_POST['submit'])) 
                       {
                         if(isset($_POST['radio']))
                         {
                          echo "You have selected :".$_POST['radio'];  //  Displaying Selected Value
                         }
                       }?>
                      <?php }?>
                     </div>
                    </div>
                   </div>
                  </div>
                 </div>
                </div>
                <?php 
                if($user_id)
                {
                 if($repurchase_amount>=$total || $ewallet_amount>=$total)
                 {?> 
                	  <button class="common-btn floatright" >Place order</button>
                	 <?php 
                	}
                }
                	else
                	{?>
                  <a href="<?php echo site_url('site/login')?>" style="color:blue;">Login to place the order</a>
                  <?php 
                 } ?>
               </form>
               <!-- End Panel Default -->
              </div>
               <!-- End Panel Gropup -->
             </div>
               <!-- End Payment Method -->
            </form>
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
                                </a>
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
                                <a href="#"><img src="img/brands/2.jpg" alt="" /></a><a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg') ?>" alt="" /></a>
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
    <?php include 'includes_bottom.php'; ?>
    
</body>

</html>