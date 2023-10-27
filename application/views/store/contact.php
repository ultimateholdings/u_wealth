<?php
//print_r(config_item('facebook'));die();
if (isset($_POST['submit'])) 
{
        $to = config_item('email');
        $name=$_POST['name'];
        $email=$_POST['email'];
        //$userphone=$_POST['userPhone'];
        $usersub=$_POST['subject'];
        $usermessage=$_POST['message'];
        $from = 'From: My Contact Form';
        $headers = "From:" . $to;
        $body = "From: $name\nE-Mail: $email\n Subject: $usersub\n  Message:\n $usermessage";
        //mail($to,$usermsg,$body,$headers);
        if (mail($to,$usermsg,$body,$headers)) {
                       $success = "Message successfully sent";
           }else {
                  $success = "Message Sending Failed, try again";
           }
}
/*$user_id = $this->session->user_id;
$name=$this->session->name;
$cat_id=$_GET['cat_id'];
$subcatid=$_GET['subcatid'];
$parent_cat=$_GET['par_cat'];
$selected_option=$_POST['option_value'];
if($selected_option){
    
}
if($cat_id && $subcatid && $parent_cat){
    $this->db->select('id,prod_name,prod_price,image,category,sub_category,brand,prod_desc,gst')->order_by('id', 'ASC')->where(array('category' => $cat_id,
                                   'sub_category' =>$subcatid));
    $data=$this->db->get('product')->result_array();
   
    
}
else if($cat_id){
  $this->db->select('id, prod_name,prod_price,image,category,brand,prod_desc,gst')->order_by('id', 'ASC')->where('category',$cat_id);
  $data=$this->db->get('product')->result_array();
}
else if($subcatid){
  $this->db->select('id, prod_name,prod_price,image,category,brand,prod_desc,gst')->order_by('id', 'ASC')->where('sub_category',$subcatid);
  $data=$this->db->get('product')->result_array();
}else{
$this->db->select('id, prod_name,prod_price,image,category,brand,prod_desc,gst')->order_by('id', 'ASC');
$data=$this->db->get('product')->result_array();
}
$this->db->select('cat_id, cat_name')->order_by('cat_name', 'ASC');
$category=$this->db->get('product_categories')->result_array();

$this->db->select('sub_cat_id, sub_cat_name')->order_by('sub_cat_name', 'ASC');
$subcategory=$this->db->get('product_sub_category')->result_array();

$this->db->select('brand_id, brand_name')->order_by('brand_name', 'ASC');
$brand=$this->db->get('brands')->result_array();

$this->db->order_by('id', 'RANDOM');
$this->db->limit(2);
$query = $this->db->get('product');
$random_product=$query->result_array();
$this->db->order_by('prod_name', 'RANDOM');
$this->db->limit(1);
$query = $this->db->get('product');
$footer_product=$query->result_array();

$this->db->select('id, banner_name, prod_id, banner_desc, image, flag')->where('flag', 'shop_banner');
$shop_banner=$this->db->get('store_images')->result_array();

$this->db->select('id, banner_name, prod_id, banner_desc, image, flag')->where('flag', 'shop_bannerleft');
$shop_bannerleft=$this->db->get('store_images')->result_array();
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
        'item_image'    =>  $_POST["hidden_image"],
        'item_quantity' =>  $_POST["qty"]
        );
        $_SESSION["shopping_cart"][$count] = $item_array;
        
        echo '<script>window.location="contact"</script>';
        
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
        'item_price'    =>  $_POST["hidden_price"],
        'item_tax'      =>  $_POST["hidden_tax"],
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
                echo '<script>window.location="contact"</script>';
            }
        }
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include 'includes_top.php'; ?>
    
</head>

<body style="overflow: auto;">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- header start -->
    <?php include 'header.php' ?>
    <!-- header end -->
    <!-- map-area-start-->
    <div class="map-area">
        <div id="googleMap" style="width:100%;height:410px;">
            <iframe src="<?php echo config_item('google_map');?>" width="100%" height='400px' frameborder="0" style="border:0;" allowfullscreen="" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
    <!-- map-area-end-->
    <!-- contact-area-start-->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-desc">
                        <h3 class="contact-title"><i class="fa fa-user"></i>Contact info</h3>
                        <ul>
                            <li><i class="fa fa-map-marker"></i><strong>Company Address</strong><br><div style="padding-left: 25px;"><?php echo config_item('company_address') ?><br><?php echo config_item('company_city') ?><br><?php echo config_item('company_state') ?><br><?php echo config_item('company_country') ?><br><?php echo config_item('company_zipcode') ?><br></div></li>
                            <li><i class="fa fa-phone"></i><strong>Phone</strong><br><div style="padding-left: 25px;"><?php echo config_item('phone');?><br><?php echo config_item('phone_2');?></div></li>
                            <li><i class="fa fa-envelope"></i><strong>Email</strong> <br><div style="padding-left: 25px;"><?php echo config_item('email');?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="contact-form">
                        <h3 class="contact-title"><i class="fa fa-envelope"></i>Leave a Message</h3>
                        <div class="alert-custom" role="alert" style="color:blue;" ><?php if(isset($success)){ echo $success;} ?> </div>
                        <form action="<?php echo site_url('emart/contact')?>" method="POST">
                            <div class="single-form">
                                <input name="name" type="text" placeholder="Name (required)"  required/>
                            </div>
                            <div class="single-form">
                                <input name="email" type="text" placeholder="Email (required)" required/>
                            </div>
                            <div class="single-form">
                                <input name="subject" type="text" placeholder="Subject" required/>
                            </div>
                            <div class="single-form">
                                <textarea name="message" placeholder="Message" required></textarea>
                            </div>
                            <button class="cart-button floatright" type="submit" name="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-area-end-->
    <!--brands-area start-->
    <div class="brands-area">
        <div class="container">
            <div class="brands-inner section-padding">
                <div class="row">
                    <div class="brans-carousel">
                        <!-- single-brand start -->
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="single-brand">
                              <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg') ?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="single-brand">
                                 <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg') ?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="single-brand">
                               <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/3.jpg') ?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg') ?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="single-brand">
                               <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/5.jpg') ?>" alt="" />
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="single-brand">
                                    <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg') ?>" alt="" /></a>
                                </div>
                            </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="single-brand">
                                    <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg') ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
    <?php include 'includes_bottom.php'; ?>
    
</body>

</html>