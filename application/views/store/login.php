<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login || <?php echo config_item('company_name') ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
  <link rel='icon' href="<?php echo base_url('axxets/favicon.ico')?>" type='image/x-icon'/>
    
    <!--google-fonts-->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css' />
    
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
   <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/bootstrap.min.css') ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/animate.css') ?>">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/nivo-slider.css') ?>">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/jquery-ui.min.css') ?>">
    <!-- Image Zoom CSS
        ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/img-zoom/jquery.simpleLens.css') ?>">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/meanmenu.min.css') ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/owl.carousel.css') ?>">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/font-awesome.min.css') ?>">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/style.css') ?>">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/responsive.css') ?>">
    <!-- modernizr js -->
    <script src="<?php echo base_url('axxets/shop/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- header start -->
    <header>
        <!-- header-top start -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <!-- header-top-left start -->
                        <div class="header-top-left res1">
                            <div class="top-menu lang-select floatleft">
                                <ul>
                                    <li><a href="#">English <i class="fa fa-angle-down"></i></a>
                                        <ul class="last-change">
                                            <li><a href="#">Bangla</a></li>
                                            <li><a href="#">Arabi</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="top-menu money-select floatleft">
                                <ul>
                                    <li><a href="#">USD <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            <li><a href="#">TKA</a></li>
                                            <li><a href="#">EUR</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="phone-number floatleft"><i class="fa fa-phone"></i>Phone : 123 456 789</div>
                        </div>
                        <!-- header-top-left end -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <!-- header-top-right start -->
                        <div class="header-top-right">
                            <div class="top-menu floatright">
                                <ul>
                                    <li><a href="#">Account <i class="fa fa-angle-down"></i></a>
                                        <ul>
                                            <li><a href="#">My Account</a></li>
                                            <li><a href="#">My Wishlist</a></li>
                                            <li><a href="#">My Cart</a></li>
                                            <li><a href="#">Checkout</a></li>
                                            <li><a href="#">Testimonial</a></li>
                                            <li><a href="#">Our Blog</a></li>
                                            <li><a href="#">Log In</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- header-top-right end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-top end -->
        <!-- header-bottom start -->
        <div class="header-bottom-area">
            <div class="container">
                <div class="header-bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <!--logo start-->
                            <div class="logo">
                                <a href="index.html"><img src="<?php echo base_url('axxets/shop/img/logo/logo.png')?>" alt="" /></a>
                            </div>
                            <!--logo end-->
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="mobile-menu-area">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mobile-menu">
                                            <nav id="dropdown">
                                                <ul class="menu">
                                                    <li><a class="active" href="index.html">home</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="index.html" class="mega-menu-title">Home Version One</a></li>
                                                            <li><a href="index-2.html">Home Version Two</a></li>
                                                            <li><a href="index-3.html">Home Version Three</a></li>
                                                            <li><a href="index-4.html">Home Version Four</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop.html">wine basics</a>
                                                        <ul class="mega-menu mega-menu-two">
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Dress</a>
                                                                <a href="shop.html">cocktail</a>
                                                                <a href="shop.html">day</a>
                                                                <a href="shop.html">eventing</a>
                                                                <a href="shop.html">sundress</a>
                                                                <a href="shop.html">sweater</a>
                                                                <a href="shop.html">belts</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Accessories</a>
                                                                <a href="shop.html">Hair Accessories</a>
                                                                <a href="shop.html">Lifestyle</a>
                                                                <a href="shop.html">Hats and Gloves</a>
                                                                <a href="shop.html">Bras</a>
                                                                <a href="shop.html">Scarves</a>
                                                                <a href="shop.html">Small Leathers</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Tops</a>
                                                                <a href="shop.html">cocktail</a>
                                                                <a href="shop.html">day</a>
                                                                <a href="shop.html">eventing</a>
                                                                <a href="shop.html">sundress</a>
                                                                <a href="shop.html">sweater</a>
                                                                <a href="shop.html">belts</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Handbags</a>
                                                                <a href="shop.html">Hair Accessories</a>
                                                                <a href="shop.html">Lifestyle</a>
                                                                <a href="shop.html">Hats and Gloves</a>
                                                                <a href="shop.html">Bras</a>
                                                                <a href="shop.html">Scarves</a>
                                                                <a href="shop.html">Small Leathers</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop.html">tasting wine</a>
                                                        <ul class="mega-menu mega-menu-three">
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Dress</a>
                                                                <a href="shop.html">cocktail</a>
                                                                <a href="shop.html">day</a>
                                                                <a href="shop.html">eventing</a>
                                                                <a href="shop.html">sundress</a>
                                                                <a href="shop.html">sweater</a>
                                                                <a href="shop.html">belts</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Accessories</a>
                                                                <a href="shop.html">Hair Accessories</a>
                                                                <a href="shop.html">Lifestyle</a>
                                                                <a href="shop.html">Hats and Gloves</a>
                                                                <a href="shop.html">Bras</a>
                                                                <a href="shop.html">Scarves</a>
                                                                <a href="shop.html">Small Leathers</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Tops</a>
                                                                <a href="shop.html">cocktail</a>
                                                                <a href="shop.html">day</a>
                                                                <a href="shop.html">eventing</a>
                                                                <a href="shop.html">sundress</a>
                                                                <a href="shop.html">sweater</a>
                                                                <a href="shop.html">belts</a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html" class="mega-menu-title">Handbags</a>
                                                                <a href="shop.html">Hair Accessories</a>
                                                                <a href="shop.html">Lifestyle</a>
                                                                <a href="shop.html">Hats and Gloves</a>
                                                                <a href="shop.html">Bras</a>
                                                                <a href="shop.html">Scarves</a>
                                                                <a href="shop.html">Small Leathers</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop.html">districts</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="shop.html" class="mega-menu-title">Jewelry</a></li>
                                                            <li><a href="shop.html">Boots</a></li>
                                                            <li><a href="shop.html">Slippers and Clogs</a></li>
                                                            <li><a href="shop.html">Flats</a></li>
                                                            <li><a href="shop.html">Sneakers</a></li>
                                                            <li><a href="shop.html">Wedges and Heels</a></li>
                                                            <li><a href="shop.html">Sandals and Flip Flops</a></li>
                                                            <li><a href="shop.html">Submenu item</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="shop.html">wine pairing</a></li>
                                                    <li><a href="#">pages</a>
                                                        <ul class="sub-menu">
                                                            <li><a href="blog.html" class="mega-menu-title">Blog</a></li>
                                                            <li><a href="blog-details.html">blog details</a></li>
                                                            <li><a href="checkout.html">checkout</a></li>
                                                            <li><a href="contact.html">contact</a></li>
                                                            <li><a href="login.html">login</a></li>
                                                            <li><a href="my-account.html">my account</a></li>
                                                            <li><a href="shop.html">shop</a></li>
                                                            <li><a href="shop-list.html">shop list</a></li>
                                                            <li><a href="shopping-cart.html">shopping cart</a></li>
                                                            <li><a href="single-product.html">single product</a></li>
                                                            <li><a href="wishlist.html"> wish list</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--mainmenu start-->
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="index.html">home</a>
                                            <ul class="sub-menu">
                                                <li><a href="index.html" class="mega-menu-title">Home Version One</a></li>
                                                <li><a href="index-2.html">Home Version Two</a></li>
                                                <li><a href="index-3.html">Home Version Three</a></li>
                                                <li><a href="index-4.html">Home Version Four</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">wine basics</a>
                                            <ul class="mega-menu mega-menu-two">
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Dress</a>
                                                    <a href="shop.html">cocktail</a>
                                                    <a href="shop.html">day</a>
                                                    <a href="shop.html">eventing</a>
                                                    <a href="shop.html">sundress</a>
                                                    <a href="shop.html">sweater</a>
                                                    <a href="shop.html">belts</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Accessories</a>
                                                    <a href="shop.html">Hair Accessories</a>
                                                    <a href="shop.html">Lifestyle</a>
                                                    <a href="shop.html">Hats and Gloves</a>
                                                    <a href="shop.html">Bras</a>
                                                    <a href="shop.html">Scarves</a>
                                                    <a href="shop.html">Small Leathers</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Tops</a>
                                                    <a href="shop.html">cocktail</a>
                                                    <a href="shop.html">day</a>
                                                    <a href="shop.html">eventing</a>
                                                    <a href="shop.html">sundress</a>
                                                    <a href="shop.html">sweater</a>
                                                    <a href="shop.html">belts</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Handbags</a>
                                                    <a href="shop.html">Hair Accessories</a>
                                                    <a href="shop.html">Lifestyle</a>
                                                    <a href="shop.html">Hats and Gloves</a>
                                                    <a href="shop.html">Bras</a>
                                                    <a href="shop.html">Scarves</a>
                                                    <a href="shop.html">Small Leathers</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">tasting wine</a>
                                            <ul class="mega-menu mega-menu-three">
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Dress</a>
                                                    <a href="shop.html">cocktail</a>
                                                    <a href="shop.html">day</a>
                                                    <a href="shop.html">eventing</a>
                                                    <a href="shop.html">sundress</a>
                                                    <a href="shop.html">sweater</a>
                                                    <a href="shop.html">belts</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Accessories</a>
                                                    <a href="shop.html">Hair Accessories</a>
                                                    <a href="shop.html">Lifestyle</a>
                                                    <a href="shop.html">Hats and Gloves</a>
                                                    <a href="shop.html">Bras</a>
                                                    <a href="shop.html">Scarves</a>
                                                    <a href="shop.html">Small Leathers</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Tops</a>
                                                    <a href="shop.html">cocktail</a>
                                                    <a href="shop.html">day</a>
                                                    <a href="shop.html">eventing</a>
                                                    <a href="shop.html">sundress</a>
                                                    <a href="shop.html">sweater</a>
                                                    <a href="shop.html">belts</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html" class="mega-menu-title">Handbags</a>
                                                    <a href="shop.html">Hair Accessories</a>
                                                    <a href="shop.html">Lifestyle</a>
                                                    <a href="shop.html">Hats and Gloves</a>
                                                    <a href="shop.html">Bras</a>
                                                    <a href="shop.html">Scarves</a>
                                                    <a href="shop.html">Small Leathers</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">districts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html" class="mega-menu-title">Jewelry</a></li>
                                                <li><a href="shop.html">Boots</a></li>
                                                <li><a href="shop.html">Slippers and Clogs</a></li>
                                                <li><a href="shop.html">Flats</a></li>
                                                <li><a href="shop.html">Sneakers</a></li>
                                                <li><a href="shop.html">Wedges and Heels</a></li>
                                                <li><a href="shop.html">Sandals and Flip Flops</a></li>
                                                <li><a href="shop.html">Submenu item</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="shop.html">wine pairing</a></li>
                                        <li><a href="#">pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html" class="mega-menu-title">Blog</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="checkout.html">checkout</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="login.html">login</a> </li>
                                                <li><a href="my-account.html">my account</a></li>
                                                <li><a href="shop.html">shop</a></li>
                                                <li><a href="shop-list.html">shop list</a></li>
                                                <li><a href="shopping-cart.html">shopping cart</a></li>
                                                <li><a href="single-product.html">single product</a></li>
                                                <li><a href="wishlist.html"> wish list</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!--mainmenu end-->
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <div class="cart-and-search floatright">
                                <!--search-box-start-->
                                <div class="search-box floatleft">
                                    <form action="#">
                                        <input type="text" placeholder="Enter keywords to search... " />
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <!--search-box-end-->
                                <!--total-cart-start-->
                                <div class="total-cart floatleft">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>2</span>
                                    </a>
                                    <div class="mini-cart-dropdown">
                                        <div class="single-mini-cart">
                                            <div class="mini-cart-thumb">
                                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/products/wine-3_2.jpg')?>" alt="" /></a>
                                            </div>
                                            <div class="mini-cart-content">
                                                <a href="#" class="product-name">Donec ac tempus</a>
                                                <span class="mini-cart-quantity">1</span>
                                                <span>x</span>
                                                <span class="mini-cart-price">$220</span>
                                            </div>
                                            <div class="cart-item-remove-edit">
                                                <a href="#" class="edit-item"></a>
                                                <a href="#" class="remove-item"></a>
                                            </div>
                                        </div>
                                        <div class="single-mini-cart">
                                            <div class="mini-cart-thumb">
                                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/products/spcial-wine-3.jpg')?>" alt="" /></a>
                                            </div>
                                            <div class="mini-cart-content">
                                                <a href="#" class="product-name">Donec ac tempus</a>
                                                <span class="mini-cart-quantity">1</span>
                                                <span>x</span>
                                                <span class="mini-cart-price">$220</span>
                                            </div>
                                            <div class="cart-item-remove-edit">
                                                <a href="#" class="edit-item"></a>
                                                <a href="#" class="remove-item"></a>
                                            </div>
                                        </div>
                                        <div class="single-mini-cart">
                                            <div class="mini-cart-subtotal">
                                                Subtotal: <span class="price">$1,044.00</span>
                                            </div>
                                        </div>
                                        <div class="mini-cart-action">
                                            <button class="floatleft">view cart <i class="fa fa-angle-right"></i></button>
                                            <button class="floatright">checkout <i class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!--total-cart-end-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="brb-gray mrgb-btm-20"></div>
        </div>
        <!-- header-bottom end -->
    </header>
    <!-- header end -->
    <!-- breadcrumbs-area-area start -->
    <div class="breadcrumbs-area log">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home <span>></span></a></li>
                            <li><a href="#">Wine <span>></span></a></li>
                            <li><a href="#">Basics <span>></span></a></li>
                            <li><a href="#">shoes <span>></span></a></li>
                            <li><span>sandals</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-area end -->
    <!-- login content section start -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="tb-login-form ">
                        <h5 class="tb-title">Login</h5>
                        <p>Hello, Welcome your to account</p>
                        <div class="tb-social-login">
                            <a class="tb-facebook-login" href="#">
                                <i class="fa fa-facebook"></i> Sign In With Facebook
                            </a>
                            <a class="tb-twitter-login res" href="#">
                                <i class="fa fa-twitter"></i> Sign In With Twitter
                            </a>
                        </div>
                        <form action="#">
                            <p class="checkout-coupon top log a-an">
                                <label class="l-contact">
                                    Email Address
                                    <em>*</em>
                                </label>
                                <input type="email">
                            </p>
                            <p class="checkout-coupon top-down log a-an">
                                <label class="l-contact">
                                    Password
                                    <em>*</em>
                                </label>
                                <input type="password">
                            </p>
                            <div class="forgot-password1">
                                <label class="inline2">
                                    <input type="checkbox" name="rememberme7"> Remember me! <em>*</em>
                                </label>
                                <a class="forgot-password" href="#">Forgot Your password?</a>
                            </div>
                            <p class="login-submit5">
                                <input class="button-primary" type="submit" value="login">
                            </p>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="tb-login-form res">
                        <h5 class="tb-title">Create a new account</h5>
                        <p>Hello, Welcome your to account</p>
                        <form action="#">
                            <p class="checkout-coupon top log a-an febo">
                                <label class="l-contact">
                                    Email Address
                                    <em>*</em>
                                </label>
                                <input type="email">
                            </p>
                            <p class="login-submit5 ress">
                                <input value="SignUp" class="button-primary" type="submit">
                            </p>
                        </form>
                        <div class="tb-info-login ">
                            <h5 class="tb-title4">SignUp today and you'll be able to:</h5>
                            <ul>
                                <li>Speed your way through the checkout.</li>
                                <li>Track your orders easily.</li>
                                <li>Keep a record of all your purchases.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login  content section end -->
    <!--brands-area start-->
    <div class="brands-area log">
        <div class="container">
            <div class="brands-inner section-padding">
                <div class="row">
                    <div class="brans-carousel">
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg')?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg')?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/3.jpg')?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg')?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/5.jpg')?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/1.jpg')?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/4.jpg')?>" alt="" /></a>
                            </div>
                        </div>
                        <!-- single-brand end -->
                        <!-- single-brand start -->
                        <div class="col-lg-12">
                            <div class="single-brand">
                                <a href="#"><img src="<?php echo base_url('axxets/shop/img/brands/2.jpg')?>" alt="" /></a>
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
                                <img src="<?php echo base_url('axxets/shop/img/testimonial/1.png')?>" alt="" />
                            </div>
                            <div class="testimonial-posted-by">
                                <span class="testimonial-author">Ms.Maria Carey</span>
                                <span class="testimonial-date">February 22, 2016</span>
                            </div>
                            <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...	</a>
                        </div>
                        <!--single-testimonial end-->
                        <!--single-testimonial start-->
                        <div class="single-testimonial">
                            <div class="testimonial-content-avatar">
                                <img src="<?php echo base_url('axxets/shop/img/testimonial/1.png')?>" alt="" />
                            </div>
                            <div class="testimonial-posted-by">
                                <span class="testimonial-author">Ms.Maria Carey</span>
                                <span class="testimonial-date">February 22, 2016</span>
                            </div>
                            <a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...	</a>
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
  <script src="<?php echo base_url('axxets/shop/js/vendor/jquery-1.12.0.min.js') ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url('axxets/shop/js/bootstrap.min.js') ?>"></script>
    <!-- nivo slider js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.nivo.slider.pack.js') ?>"></script>
    <!-- jquery.countdown js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.countdown.min.js') ?>"></script>
    <!-- owl.carousel js -->
    <script src="<?php echo base_url('axxets/shop/js/owl.carousel.min.js') ?>"></script>
    <!-- Img Zoom js -->
    <script src="<?php echo base_url('axxets/shop/js/img-zoom/jquery.simpleLens.min.js') ?>"></script>
    <!-- meanmenu js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.meanmenu.js') ?>"></script>
    <!-- jquery-ui js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery-ui.min.js') ?>"></script>
    <!-- wow js -->
    <script src="<?php echo base_url('axxets/shop/js/wow.min.js') ?>"></script>
    <!-- plugins js -->
    <script src="<?php echo base_url('axxets/shop/js/plugins.js') ?>"></script>
    <!-- main js -->
    <script src="<?php echo base_url('axxets/shop/js/main.js') ?>"></script>
</body>

</html>