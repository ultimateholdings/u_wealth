<?php

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Products | <?php echo config_item('company_name') ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/slick.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/seogo/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="<?php echo base_url('/') ?>">
                                    <img src="<?php echo base_url();?>axxets/seogo/img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="<?php echo base_url('/') ?>">home</a></li>
                                        <li><a href="<?php echo site_url('site/about')?>">about</a></li>
                                        <li><a href="<?php echo site_url('site/products')?>">Products</a></li>
                                        <li><a href="<?php echo site_url('site/contact_home') ?>">Contact</a></li>
                                        <?php if(config_item('enable_franchisee')=='Yes') { ?>
                                            <li><a href="<?php echo site_url('site/franchisee') ?>">Franchisee</a></li>
                                        <?php } ?>
                                        <li><a target="_blank" href="<?php echo site_url('site/login')?>">Login</a></li>
                                        <li><a target="_blank" href="<?php echo site_url('site/register')?>">Register</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a  href="#"> <i class="fa fa-phone"></i> +10 673 567 367</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area">
            <div class="bradcam_shap">
                <img src="<?php echo base_url();?>axxets/seogo/img/ilstrator/bradcam_ils.png" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Products</h3>
                            <nav class="brad_cam_lists">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                                  </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /bradcam_area  -->

    <!-- case_study_area  -->
    <div class="case_study_area white_case_study">
        <div class="patrn_1 d-none d-lg-block">
            <img src="<?php echo base_url();?>axxets/seogo/img/pattern/patrn_1.png" alt="">
        </div>
        <div class="patrn_2 d-none d-lg-block">
            <img src="<?php echo base_url();?>axxets/seogo/img/pattern/patrn.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_study text-center white_single_study">
                        <div class="thumb">
                            <a href="#">
                                <img src="<?php echo base_url();?>axxets/seogo/img/products/1.png" alt="">
                            </a>
                        </div>
                        <div class="subheading white_subheading">
                            <h4><a href="#">Bluetooth Earbud</a></h4>
                            <p>Lifestyle</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_study text-center white_single_study">
                        <div class="thumb">
                            <a href="#">
                                <img src="<?php echo base_url();?>axxets/seogo/img/products/2.png" alt="">
                            </a>
                        </div>
                        <div class="subheading white_subheading">
                            <h4><a href="#">Bluetooth Earpods</a></h4>
                            <p>Lifestyle</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_study text-center white_single_study">
                        <div class="thumb">
                            <a href="#">
                                <img src="<?php echo base_url();?>axxets/seogo/img/products/3.png" alt="">
                            </a>
                        </div>
                        <div class="subheading white_subheading">
                            <h4><a href="#">Bluetooth Headset</a></h4>
                            <p>Lifestyle</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_study text-center white_single_study">
                        <div class="thumb">
                            <a href="#">
                                <img src="<?php echo base_url();?>axxets/seogo/img/products/4.png" alt="">
                            </a>
                        </div>
                        <div class="subheading white_subheading">
                            <h4><a href="#">Wired Earphones - Regular</a></h4>
                            <p>Lifestyle</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_study text-center white_single_study">
                        <div class="thumb">
                            <a href="#">
                                <img src="<?php echo base_url();?>axxets/seogo/img/products/5.png" alt="">
                            </a>
                        </div>
                        <div class="subheading white_subheading">
                            <h4><a href="#">Wired Earphones - Smiplex</a></h4>
                            <p>Lifestyle</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_study text-center white_single_study">
                        <div class="thumb">
                            <a href="#">
                                <img src="<?php echo base_url();?>axxets/seogo/img/products/6.png" alt="">
                            </a>
                        </div>
                        <div class="subheading white_subheading">
                            <h4><a href="#">Bluetooth Earbud</a></h4>
                            <p>Lifestyle</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                        <div class="load_more text-center">
                            <a class="load_more_btn" href="#">Load More</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ case_study_area  -->

    <footer class="footer">
            <div class=" container">
                <div class="pro_border">
                        <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="lets_projects">
                                        <h3>Join us to build your Future, <a href="#">Mail Us</a> </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="phone_number">
                                        <h3><?php echo config_item('phone') ?></h3>
                                        <a href="#"><?php echo config_item('email') ?></a>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <div class="footer_logo">
                                    <a href="#">
                                        <img src="<?php echo base_url();?>axxets/seogo/img/footer_logo.png" alt="">
                                    </a>
                                </div>
                                <p>
                                       "We provide best service to our & your customers"
                                </p>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="ti-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ti-twitter-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
    
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Details
                                </h3>
                                <ul>
                                    <li><a href="<?php echo base_url('/') ?>">Home</a></li>
                                    <li><a href="<?php echo site_url('site/about')?>"> About</a></li>
                                    <li><a href="<?php echo site_url('site/products')?>">Products</a></li>
                                    <li><a href="<?php echo site_url('site/contact_home') ?>">Contact</a></li>
                                    <?php if(config_item('enable_franchisee')=='Yes') { ?>
                                        <li><a href="<?php echo site_url('site/franchisee') ?>">Franchisee</a></li>
                                    <?php } ?>
                                    <li><a target="_blank" href="<?php echo site_url('site/login')?>">Login</a></li>
                                    <li><a target="_blank" href="<?php echo site_url('site/register')?>">Register</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-lg-2">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Useful Links
                                </h3>
                                <ul>
                                    <li><a href="#">Business Plan</a></li>
                                    <li><a href="#">Achievers List</a></li>
                                    <li><a href="#">Recent Payouts</a></li>
                                    <li><a href="#">Top Performers of Day</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-1 col-md-6 col-lg-4">
                                <div class="footer_widget">
                                        <h3 class="footer_title">
                                                Subscribe
                                        </h3>
                                        <form action="#" class="newsletter_form">
                                            <input type="text" placeholder="Enter your mail">
                                            <button type="submit">Subscribe</button>
                                        </form>
                                        <p class="newsletter_text"></p>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                               Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <?php echo config_item('company_name') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    <!-- JS here -->
    <script src="<?php echo base_url();?>axxets/seogo/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/ajax-form.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/scrollIt.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/wow.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/nice-select.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/plugins.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="<?php echo base_url();?>axxets/seogo/js/contact.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>axxets/seogo/js/mail-script.js"></script>

    <script src="<?php echo base_url();?>axxets/seogo/js/main.js"></script>
</body>

</html>