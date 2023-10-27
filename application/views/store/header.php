<?php $user_id = $this->session->user_id;
$name=$this->session->name; ?>
<header>
<?php if(config_item('enable_multi_lingual')=='Yes'){ ?>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php } ?>                    
    <!-- Header for main-view-->
    <div class='main-menu'>
        <!-- header-top start -->
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <!-- header-top-left start -->
                        <div class="header-top-left res1" >
                            <div class="phone-number floatleft">
                                <i class="fa fa-phone"></i>Phone : <?php echo config_item('phone'); ?>
                            </div>
                            
                        </div>
                        <div id="google_translate_element"></div>
                        <!-- header-top-left end -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <!-- header-top-right start -->
                        <div class="header-top-right">
                            <div class="top-menu floatright">
                                <ul>
                                    <div class="phone-number floatleft"><i class="fa fa-envelope-o"></i>Email: <?php echo config_item('email'); ?></div>
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
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <!--logo start-->
                            <div class="logo r1">
                                <a href="<?php echo site_url('/')?>"><img src="<?php echo base_url();?>axxets/client/logo.png" alt="logo" />
                                </a>
                            </div>
                            <!--logo end-->
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <!--mainmenu start-->
                            <div class="mainmenu">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="<?php echo base_url('emart');?>"><i class="fa fa-home">&nbsp;Home</i></a></li>
                                        <li><a  href="<?php echo site_url('emart/shop')?>"><i class="fa fa-shopping-basket">&nbsp;Shop</i></a></li>
                                        <li><a  href="<?php echo site_url('emart/contact')?>"><i class="fa fa-envelope-o">&nbsp;Contact</i></a>
                                        </li>
                                        <?php if(config_item('enable_recharge')=='Yes') { ?>
                                        <li><a href="<?php echo site_url('site/recharge')?>"><i class="fa fa-mobile">&nbsp;Recharge</i></a></li>
                                        <?php } ?>
                                        <?php if($user_id){ ?>
                                        <li><a href="<?php echo site_url('member/logout')?>"><i class="fa fa-power-off">&nbsp;Logout</i></a></li>
                                        <li><a href="<?php echo site_url('member')?>"><i class="fa fa-tachometer">&nbsp;My Account</i></a></li>
                                        <?php }else{ $page = current_url();
                                        $_SESSION['page'] = $page; ?>
                                        <li><a href="<?php echo site_url('site/login')?>"><i class="fa fa-user">&nbsp;Login</i></a></li>
                                        <li><a href="<?php echo site_url('site/register')?>"><i class="fa fa-registered">&nbsp;Register</i></a></li>
                                        <?php } ?>
                                        <?php if(config_item('enable_franchisee')=='Yes') { ?>
                                        <li><a href="<?php echo site_url('site/franchisee') ?>"><i class="fa fa-user">&nbsp;Franchisee</i></a></li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                            <!--mainmenu end-->
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <div class="cart-and-search floatright">
                                <!--search-box-start-->
                                <div class="search-box floatleft">
                                    <?php echo form_open_multipart('emart/search_keyword') ?>
                                        <input type="text" name="keyword" id="keyword" placeholder="Enter keywords to search... " />
                                        <button><i class="fa fa-search"></i></button>
                                    <?php echo form_close(); ?>
                                </div>
                                <!--search-box-end-->
                                <!--total-cart-start-->
                                <div class="total-cart floatleft">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                        <?php if(!empty($_SESSION["shopping_cart"])){ ?>
                                        <span><?php echo count($_SESSION["shopping_cart"]);} ?></span>
                                    </a>
                                    <?php if(!empty($_SESSION["shopping_cart"])){?>
                                        <form action="<?php echo site_url('emart/shopping-cart')?>" method="get">
                                            <div class="mini-cart-dropdown">
                                                <?php $total = 0; foreach($_SESSION["shopping_cart"] as $keys => $values) { ?>
                                                <div class="single-mini-cart">
                                                 <div class="mini-cart-thumb">
                                                    <a href="#"><img src="<?php echo $values["item_image"]; ?>" alt="" /></a>
                                                 </div>
                                                  <div class="mini-cart-content">
                                                    <a href="#" class="product-name"><?php echo $values["item_name"]; ?></a>
                                                    <span class="mini-cart-quantity"><?php echo $values["item_quantity"]; ?></span>
                                                    <span>x</span>
                                                    <span class="mini-cart-price"><?php echo $values["item_price"]-($values["item_price"]*($values["item_discount"]/100));?></span>
                                                  </div>
                                                  <div class="cart-item-remove-edit" >
                                                    <a href="#" class="edit-item" style="display:none;"></a>
                                                    <a href='store?action=delete&id=<?php echo $values["item_id"]; ?>' class="remove-item"></a>
                                                  </div>
                                                </div> 
                                                <?php } ?>
                                                <div class="single-mini-cart">
                                                    <?php foreach($_SESSION["shopping_cart"] as $keys => $values) { $total = $total+($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)))*$values["item_quantity"]; }?>
                                                    <div class="mini-cart-subtotal">
                                                        Subtotal: <span class="price"><?php echo config_item('currency'). " ". number_format($total, 2); ?></span>
                                                    </div>
                                                </div>
                                                <div class="mini-cart-action">
                                                    <button class="floatleft">view cart <i class="fa fa-angle-right"></i></button>
                                                    <button type="submit" formaction="<?php echo site_url('emart/checkout')?>" class="floatright">checkout <i class="fa fa-angle-right"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                                <!--total-cart-end-->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Header for mobile view -->
    <div class="mobile-view">
        <nav class="navbar navbar-inverse" style="margin-bottom: 0px;background-color: #2874f0;border: none;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" 
                    style="float: left;border:none; ">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#" style="padding-left: 5px; color: white;">Emart</a>
                    <div class="total-cart" style="margin-top: 8px; width: 50%; float: right; ">
                        <a href="#" style="color: white;float: right;">
                            <i class="fa fa-shopping-cart" ></i>
                            <?php if(!empty($_SESSION["shopping_cart"])){ ?>
                            <span style="margin-right: 20px;"><?php echo count($_SESSION["shopping_cart"]);} ?></span>
                        </a>
                          <?php if(!empty($_SESSION["shopping_cart"])){?>
                        <form action="emart/shopping-cart" method="get">
                            <div class="mini-cart-dropdown" style="margin-right: 100px;">
                                <?php $total = 0;
                                  foreach($_SESSION["shopping_cart"] as $keys => $values)
                                  { ?>
                                   <div class="single-mini-cart">
                                     <div class="mini-cart-thumb">
                                        <a href="#"><img src="<?php echo $values["item_image"]; ?>" alt="" /></a>
                                     </div>
                                     <div class="mini-cart-content">
                                        <a href="#" class="product-name"><?php echo $values["item_name"]; ?></a>
                                        <span class="mini-cart-quantity"><?php echo $values["item_quantity"]; ?></span>
                                        <span>x</span>
                                        <span class="mini-cart-price"><?php echo config_item('currency');?><?php echo $values["item_price"]-($values["item_price"]*($values["item_discount"]/100));?></span>
                                     </div>
                                     <div class="cart-item-remove-edit">
                                        <!--<a href="#" class="edit-item"></a>-->
                                        <a href='store?action=delete&id=<?php echo $values["item_id"]; ?>' class="remove-item"></a>
                                     </div>
                                   </div>
                                 <?php } ?>
                                
                                <div class="single-mini-cart">
                                    <?php foreach($_SESSION["shopping_cart"] as $keys => $values) { $total = $total+($values["item_price"]-($values["item_price"]*($values["item_discount"]/100)))*$values["item_quantity"]; }?>
                                    <div class="mini-cart-subtotal">
                                        Subtotal: <span class="price"><?php echo config_item('currency'). " ". number_format($total, 2); ?></span>
                                    </div>
                                </div>
                                
                                <div class="mini-cart-action">
                                    <button class="floatleft"><a href="<?php echo site_url('emart/shopping-cart')?>" style="color: white;">view cart</a> <i class="fa fa-angle-right"></i></button>
                                    <button type="submit" formaction="<?php echo site_url('emart/checkout')?>" class="floatright">checkout <i class="fa fa-angle-right"></i></button>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
                <div class="top-search-box" style="margin-right: -15;
                           margin-top: 5px;
                           margin-bottom: 20px;
                           margin-right: 0px;
                           right: -15;
                           width:100%;">
                           <?php echo form_open_multipart('emart/search_keyword') ?>
                           <input type="text" name="keyword" id="keyword" placeholder="Search..." style="border-radius:0px;">
                           <button type="button" style="right: -20;right: 0px;">
                           <i class="fa fa-search"></i>
                           </button>
                           <?php echo form_close(); ?>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar" style="background:white;">
                <ul class="nav navbar-nav" style="color: black;">
                    <li><a class="active" href="<?php echo site_url('/')?>" style="background-color: white; color: black;"><i class="fa fa-home">&nbsp;Home</i></a></li>
                    <li><a  href="<?php echo site_url('emart/shop')?>"><i class="fa fa-shopping-basket">&nbsp;Shop</i></a></li>
                    <li><a  href="<?php echo site_url('emart/contact')?>"><i class="fa fa-envelope-o">&nbsp;Contact</i></a>
                    </li>
                    <?php if(config_item('enable_recharge')=='Yes') { ?>
                    <li><a href="<?php echo site_url('site/recharge')?>"><i class="fa fa-mobile">&nbsp;Recharge</i></a></li>
                    <?php } ?>
                    <?php if($user_id){ ?>
                    <li><a href="<?php echo site_url('member/logout')?>"><i class="fa fa-power-off">&nbsp;Logout</i></a></li>
                    <li><a href="<?php echo site_url('member')?>"><i class="fa fa-tachometer">&nbsp;My Account</i></a></li>
                    <?php }else{ $page = current_url();
                    $_SESSION['page'] = $page; ?>
                    <li><a href="<?php echo site_url('site/login')?>"><i class="fa fa-user">&nbsp;Login</i></a></li>
                    <li><a href="<?php echo site_url('site/register')?>"><i class="fa fa-registered">&nbsp;Register</i></a></li>
                    <?php } ?>
                    <?php if(config_item('enable_franchisee')=='Yes') { ?>
                    <li><a href="<?php echo site_url('site/franchisee') ?>"><i class="fa fa-user">&nbsp;Franchisee</i></a></li>
                    <?php } ?>                                    
                </ul>
            </div>

        </nav>
    </div>
</header>