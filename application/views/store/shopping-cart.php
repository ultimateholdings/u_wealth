<?php

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
                echo '<script>window.location="shopping-cart"</script>';
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
         <!-- cart-page-start -->
        <div class="shopping-cart-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-title">
                            <h1>Shopping Cart</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- table start -->
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-remove">Remove</th>
                                            <th class="product-thumbnail">Images</th>
                                            <th class="product-name">Product name</th>
                                            <!--<th class="product-edit">Edit</th>-->
                                            <th class="real-product-price">unit price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                if(!empty($_SESSION["shopping_cart"]))
                                                {
                                                    $total = 0;
                                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                                    {
                                        ?>
                                        <tr>
                                            <td class="product-remove">
                                                <a href="shopping-cart?action=delete&id=<?php echo $values["item_id"]; ?>">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="<?php echo $values["item_image"]; ?>" alt="" style="width:50px;height:50px" /></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#" ><?php echo $values["item_name"]; ?></a>
                                            </td>
                                            <!--<td class="product-edit">
                                                <a href="#">Edit</a>
                                            </td>-->
                                            <td class="real-product-price">
                                                <span class="amounte"><?php echo config_item('currency');?><?php echo $values["item_price"]-($values["item_price"]*($values["item_discount"]/100));?></span>
                                            </td>
                                            <td class="product-quantity">
                                                <!--<input type="number" min="1" name="qty" id="qty" value="<?php echo $values['item_quantity']?>"/>-->
                                                <?php echo $values['item_quantity'];?>

                                            </td>

                                            <td class="product-subtotal" id="product-subtotal"><?php echo config_item('currency');?><?php echo ($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)))*$values["item_quantity"]; ?></td>
                                         <?php
                                          $total=$total+($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)))*$values["item_quantity"];
                                                      }
                                                  }?>
                                        </tr>
                                        <!--<tr>
                                            <td class="product-remove">
                                                <a href="#">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="img/products/wine/cart-product-1.jpg" alt="" />
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">Proin lectus ipsum</a>
                                            </td>
                                            <td class="product-edit">
                                                <a href="#">Edit</a>
                                            </td>
                                            <td class="real-product-price">
                                                <span class="amounte">$699.00</span>
                                            </td>
                                            <td class="product-quantity">
                                                <input value="1"/>
                                            </td>
                                            <td class="product-subtotal">$699.00</td>
                                        </tr>-->
                                    </tbody>
                                </table>
                                <div class="cart-s-btn">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                                            <div class="buttons-cart">
                                                <a href="<?php echo site_url('emart/shop')?>">Continue Shopping</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                                            <div class="buttons-cart button-cart-right">
                                                <!--<span class="shopping-btn floatright">
                                                    <a href="shopping-cart?action=delete&id=<?php echo $values["item_id"];?>">clear shopping cart</a>
                                                    <a href="#">update Shopping cart</a>
                                                </span>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- table end -->
                    </div>
                </div>
                <!-- place selection start -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display:none;">
                        <div class="place-section">
                            <div class="shipping">
                                <h2>Estimate Shipping and Tax</h2>
                                <div class="shipping-form">
                                    <form action="#">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <ul class="form-list">
                                            <li>
                                                <label class="required">
                                                    Country
                                                    <span>*</span>
                                                </label>
                                                <div class="input-box">
                                                    <select>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required">
                                                    State/Province
                                                </label>
                                                <div class="input-box">
                                                    <select>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li>
                                                <label class="required">
                                                    Zip/Postal Code
                                                </label>
                                                <div class="input-box">
                                                    <input type="text" class="input-text"/>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="button-set">
                                            <button class="floatright">Get a Quote</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="display:none;">
                        <div class="place-section">
                            <div class="shipping">
                                <h2>Discount Codes</h2>
                                <div class="shipping-form">
                                    <form action="#">
                                        <p>Enter your coupon code if you have one.</p>
                                        <ul class="form-list">
                                            <li>
                                                <div class="input-box">
                                                    <input type="text" class="input-text"/>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="button-set">
                                            <button class="floatright">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="totals-calculation">
                            <table id="shopping-cart-totals-table">
                                    <tfoot>
                                        <tr>
                                            <td colspan="1" class="a-right">
                                                <strong>Grand Total</strong>
                                            </td>
                                            <td class="a-right" style="">
                                                <strong><span class="price"><?php echo config_item('currency'). " ". number_format($total, 2); ?></span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td colspan="1" class="a-right">
                                            Subtotal    </td>
                                        <td class="a-right" style="">
                                         <span class="price"><?php echo config_item('currency'). " ". number_format($total, 2); ?></span>    </td>
                                    </tr>
                                    </tbody>
                            </table>
                            <ul class="checkout-types">
                                <form action="<?php echo site_url('emart/checkout')?>" method="post">
                                    <input type="hidden" name="subtotal" value="<?php echo number_format($total, 2); ?>">
                                    <input type="hidden" name="grandtotal" value="<?php echo number_format($total, 2); ?>">

                                <li>
                                    <button type="submit" >
                                        <span>Proceed to Checkout</span>
                                    </button>
                                </li>
                                <li>
                                    <a title="Checkout with Multiple Addresses" href="#">Checkout with Multiple Addresses</a>
                                </li>
                            </form>
                            </ul>
                        </div>
                   </div>
                </div>
            </div>
        </div>
         <!-- cart-page-end -->
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
                                    <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg') ?>" alt=""/></a>
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
        <?php include 'includes_bottom.php'; ?>
    </body>
</html>
