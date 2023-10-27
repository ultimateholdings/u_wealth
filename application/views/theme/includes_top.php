    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?> | <?php echo config_item('company_name') ?></title>
    <meta name="description" content="Global Ecommerce Solution : One stop Destination for all your Ecommerce Business">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel='icon' href="<?php echo base_url('axxets/favicon.ico')?>" type='image/x-icon'/>
    <link rel="canonical" href="<?php echo $newURL;?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:locale:alternate" content="es_ES">
    <meta property="og:locale:alternate" content="fr_FR">
    <meta property="og:locale:alternate" content="de_DE">
    <meta property="og:locale:alternate" content="it_IT">
    <meta property="og:locale:alternate" content="zh_CN">
    <meta property="og:type" content="website">
    <?php if($title != 'View Product'){ ?>
    <meta property="og:title" content="<?php echo config_item('') ?>">
    <meta property="og:description" content="<?php echo $data[0]['prod_desc']; ?>">
    <meta property="og:url" content="<?php echo $newURL;?>">
    <meta property="og:image" content="<?php echo $data[0]['image'] ? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>"/>
    <meta property="og:image:secure_url" content="<?php echo $data[0]['image'] ? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>" />
    <meta property="og:site_name" content="Product Share">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Description">
    <meta name="twitter:title" content="title">
    <?php } else { ?>
    <meta property="og:title" content="<?php echo config_item('company_name'); ?>">
    <meta property="og:description" content="Online Premium Store">
    <meta property="og:image" content="<?php echo $data[0]['image'] ? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>"/>
    <meta property="og:image:secure_url" content="<?php echo $data[0]['image'] ? base_url('uploads/' . $data[0]['image']) : base_url('uploads/default.jpg'); ?>" />
    <meta property="og:site_name" content="<?php echo config_item('company_name'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Description">
    <meta name="twitter:title" content="<?php echo config_item('company_name'); ?>">
    <?php } ?>
    
    <!--google-fonts-->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css' />

    <!-- master CSS
    ============================================ -->            
    <link rel="stylesheet" href="<?php echo base_url();?>axxets/shop/css/master.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo base_url('axxets/shop/css/style.css') ?>">
    <!-- modernizr js -->
    <script src="<?php echo base_url('axxets/shop/js/vendor/modernizr-2.8.3.min.js') ?>"></script>

    
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
    <script src="<?php echo base_url('axxets/shop/js/popper.min.js'); ?>"></script>
    <style type="text/css">
     .pro-details .nav-item
      {
        display: block;
        width: 100px;
        height: 100px;
        padding: 5px;
        border: 1px solid blue;    
        background-color:transparent; 
      }
     .nav
     {
      display: flex;
      flex-wrap: wrap;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none;
     }
     ul
     {
       margin-block-start: 1em;
       margin-block-end: 1em;
       margin-inline-start: 0px;
       margin-inline-end: 0px;
       padding-inline-start: 40px;
     }
     .mb-2, .my-2 
     {
      margin-bottom: .5rem!important;
     }
     .col-lg-12
     {
       position: relative;   
     }
     *, ::after, ::before 
     {
      box-sizing: border-box;
     }
     li 
     {
      text-align: -webkit-match-parent;
     }
     element.style 
     {
      font-size: 60px;
     }
    .h-100 
    {
      height: 100%!important;
    }
    .img-fluid
     {
       max-width: 100%;
     }
     img {
      vertical-align: middle;
      border-style: none;
     }
    .banner7-readmore a {
        background: #57b652 none repeat scroll 0 0;
        border: medium none;
        border-radius: 25px;
        color: #fff;
        font-size: 15px;
        font-weight: 700;
        line-height: 35px;
        padding: 10px 35px;
        position: relative;
        text-transform: uppercase;
    }
    @media only screen and (max-width: 767px) {
    body > header > div.main-menu {
        display: none;
    }
    div.laptopview-banner {
        display: none;
    }

    body > div > div.container > div > div.col-lg-3.col-md-3.col-sm-12 {
        display: none;
    }

    }

    @media only screen and (max-width: 991px) {
            #shoppingoptions {
                display: none;
            }
        }
    @media only screen and (min-width: 767px) {
    body > header > div.mobile-view{
        display: none !important;
    }
    }
    @media only screen and (min-width: 767px) {
        body > div > header > div.mobile-view{
            display: none !important;
        }

        .bannerslideshow h2.title2 {
            margin-bottom: 10%;
        }

        .banner7-readmore {
            margin-top: 30%;
        }
        div.mobile-filter{
         display: none !important;
        }

    }
    @media (max-width: 767px) {
        .bannerslideshow h2.title2 {
            margin-bottom: 16%;
        }

        .banner7-readmore a {
            padding: 5px 20px;
            font-size: 12px;
        }

        .nivo-controlNav {
            display: none;
        }

        .banner7-readmore {
            margin-top: 28%;
        }

    }
    #myNavbar:hover
       {
         background-color: #90133b;
       }
       .navbar-nav > li > a:hover{
        color:blue;
       }
       .navbar-nav a:hover
       {
        color:blue;
       }
       .choices {
      list-style-type: none;
      padding: 0;
    }

    .choices li {
      margin-bottom: 5px;
    }

    .choices label {
      display: flex;
      align-items: center;
    }

    .choices label,
    input[type="radio"] {
      cursor: pointer;
    }

    input[type="radio"] {
      margin-right: 8px;
    }

    @media only screen and (max-width: 768px) 
    {
       #image-1 > div
       {
        margin-left:60px;
        margin-top:30px;
       }
       #home
       {
         margin-left:60px;
         margin-top:50px; 
       }
       #product > div
       {
        margin-left:60px;
        margin-top:50px; 
       }
       #productTwo
       {
         margin-left:60px;
         margin-top:50px;   
       }
       #productThree
       {
         margin-left:60px;
         margin-top:50px;   
       }
       body > div.single-product-page-area > div.container > div > div:nth-child(11)
       {
         margin-top: 50px;
       }
    }

    </style>
    <script>    
        function load_new_content(){
         var selected_option_value=$("#sort option:selected").val(); //get the value of the current selected option.
         //alert(selected_option_value);
         $.post("http://localhost/unilevel/site/shop", {option_value: selected_option_value},
         function(data){ //this will be executed once the `script_that_receives_value.php` ends its execution, `data` contains everything said script echoed.
              $("#place_where_you_want_the_new_html").html(data);
              //alert(data); //just to see what it returns
         }
     );
    } 
    </script>