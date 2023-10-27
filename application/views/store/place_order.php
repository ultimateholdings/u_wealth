<!--<?php
session_start();
//form elements - billing details
$fname=$_POST['fname'];

$address=$_POST['address'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
$trans_id=$_POST['transactionid'];
$address_book=$fname . " ".$lname . "<br/>" . $company . "<br/>". $address . "<br/>".$city. "<br/>" .$state. "<br/>".$country ."<br/>".$zip;

$fname_new=$_POST['fname_new'];
$address_new=$_POST['address_new'];
$city_new=$_POST['city_new'];
$state_new=$_POST['state_new'];
$zip_new=$_POST['zip_new'];
$payment=$_POST['payment_mode'];
$trans_id=$_POST['transactionid'];
$email_new=$_POST['email_new'];
$phone_new=$_POST['phone_new'];

//print_r($address_new);die();
$address_book_new=$fname_new . " ".$lname_new . "<br/>" . $company_new . "<br/>". $address_new . "<br/>".$city_new. "<br/>" .$state_new. "<br/>".$country_new ."<br/>".$zip_new. "<br/>".$email_new."<br/>".$phone_new;
$address_book=strip_tags($address_book_new);
$grandtotal=$_SESSION["grand_total"];
$user_id = $this->session->user_id;
//print_r($user_id);die();
$name=$this->session->name;

$this->db->order_by('id', 'RANDOM');
$this->db->limit(2);
$query = $this->db->get('product');
$random_product=$query->result_array();

$this->db->order_by('prod_name', 'RANDOM');
$this->db->limit(1);
$query = $this->db->get('product');
$footer_product=$query->result_array();

$this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
$category=$this->db->get('product_categories')->result_array();

$this->db->select('sub_cat_id, sub_cat_name')->order_by('sub_cat_name', 'ASC');
$subcategory=$this->db->get('product_sub_category')->result_array();
$ewallet_amount= $this->db_model->select('balance', 'wallet', array('userid' => $user_id));
$repurchase_amount=$this->db_model->select('balance', 'other_wallet', array('userid' => $user_id,'type'=>"Repurchase"));

if($payment=="repurchase"){
    $new_repurchase_amount=$repurchase_amount-$grandtotal;
    //print_r($new_repurchase_amount);die();
    $data = array('balance'=> $new_repurchase_amount,);
    $this->db->where(array('userid'=>$user_id, 'type'=>"Repurchase"));
    $this->db->update('other_wallet', $data);
}
elseif($payment=="Ewallet"){
     $new_ewallet_balance=$ewallet_amount-$grandtotal;
     $data = array('balance'=> $new_ewallet_balance,);
     $this->db->where('userid', $user_id);
     $this->db->update('wallet', $data);
}
else{
    $new_ewallet_balance=$ewallet_amount;
    $data = array('balance'=> $new_ewallet_balance,);
    $this->db->where('userid', $user_id);
    $this->db->update('wallet', $data);
}



if(!empty($_SESSION["shopping_cart"]))
{
    foreach ($_SESSION["shopping_cart"] as $item):
        $netprice=($item['item_price']-($item['item_price']*($item['item_discount']/100)));
        $cost=($item['item_price']-($item['item_price']*($item['item_discount']/100)));
        $tax=$netprice - ($netprice/(1+$item["item_tax"]/100));
        $total_cost=($item['item_price']-($item['item_price']*($item['item_discount']/100)))*$item["item_quantity"];
              $array = array(
                    'product_id'=> $item['item_id'],
                    'userid'    => $this->session->user_id,
                    'qty'       => $item['item_quantity'],  //($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)))*$values["item_quantity"]
                    'cost'      => round($cost,2),
                    'tax'       => round($tax,2),
                    'total_cost'=> round($total_cost,2),
                    'date'      => date('Y-m-d H:i:s'),
                    'vendor_id' => $item["item_vendor_id"],
                    'address'   =>$address_book_new,
                    'payment'   =>$payment,
                    'bank_trans_id'=>$trans_id,
                );
                $this->db->insert('product_sale', $array);
              endforeach;
}
session_unset(); 
$newdata=array('user_id' => $user_id,
               'name' => $name);

$this->session->set_userdata($newdata);
?>-->

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
    <!-- checkout-area-start-->
    <div class="checkout-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="left-sidebar">
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
                        <div class="left-sidebar-title">
                            <h3>Popular Tags</h3>
                        </div>
                        <!-- single-sidebar-start -->
                        <div class="single-sidebar">
                            <ul class="tags-list">
                                <li>
                                    <a href="#">Clothing</a>
                                    <a href="#">accessories</a>
                                    <a href="#">fashion</a>
                                    <a href="#">footwear</a>
                                    <a href="#">good</a>
                                    <a href="#">kid</a>
                                    <a href="#">men</a>
                                    <a href="#">men</a>
                                </li>
                            </ul>
                            <div class="actions">
                                <ul class="tags-list">
                                    <li><a href="#">ViewAll Tags</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- single-sidebar-end -->
                        <!-- single-sidebar-start -->
                        <div class="single-sidebar che-none">
                            <div class="single-banner">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/banners/banner-left.jpg')?>" alt="" /></a>
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
                            
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" style="color:blue;" >
                                        Order Placed Successfully!!</a>
                                    </h4>

                                </div>
                                
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" style="color:green;" >
                                        Current E-Wallet Balance:<?php echo $new_ewallet_balance;?></a>
                                    </h4>

                                </div>
                                
                            </div>
                            <?php if($new_repurchase_amount>0){?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a data-toggle="collapse" data-parent="#accordion" style="color:green;" >
                                        Current Repurchase-Wallet Balance:<?php echo $new_repurchase_amount;?></a>
                                    </h4>
                                 </div>
                             </div>
                            <?php } ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="check-title">
                                        <a  href="<?php echo site_url('emart/shop')?>" data-parent="#accordion" style="color:#FF7D33;" >
                                        Continue Shopping</a>
                                    </h4>

                                </div>
                                
                            </div>
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            
                            <!-- End Panel Default -->
                            <!-- Panel Default -->
                            
                            <!-- End Panel Default -->
                        </div>
                        <!-- End Panel Gropup -->
                    </div>
                    <!-- End Payment Method -->
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
    <!-- jquery latest version -->
   
    <!-- bootstrap js -->
    <?php include 'includes_bottom.php'; ?>
</body>

</html>