<?php
$member=$this->db_model->select_multi('*', 'vendor', array('vendor_id' => $this->session->vendor_id));

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Welcome <?php echo $this->session->name ?> | <?php echo config_item('company_name') ?></title>
 <link href="<?php echo base_url('axxets/base/css/fonts-material-icon.css') ?>" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/font-awesome_v4.7.0.min.css') ?>"> 
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
 <link href="<?php echo base_url('axxets/member/css/theme.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>
 <link href="<?php echo base_url('axxets/member/css/member_style.css') ?>" rel="stylesheet" id="rt_style_components" type="text/css"/>          
 <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/jquery-ui_v1.12.1.css') ?>">
    <!-- favicon -->
 <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
 <script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
            <!--whatsapp integration -->
 <script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d52b99e4cd0540012f2016f&product='inline-share-buttons'" async='async'>
 </script>
 <!--
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          type="text/css"/>         
 <link rel="stylesheet"
          href="//code.jquery.com/ui/1.12.1/themes/eggplant/jquery-ui.css">
    
 <link rel='icon' href="<?php echo base_url();?>axxets/client/favicon.ico" type='image/x-icon'/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
            type="text/javascript"></script>
    <script type='text/javascript' src="https://platform-api.sharethis.com/js/sharethis.js#property=5d52b99e4cd0540012f2016f&product='inline-share-buttons'" async='async'>
    </script>
-->
 <style>
  .gen-pin-btn {
    width: 100%;
    padding: 7px;
    color: #fff;
    background-color: #200087;
    border: 1px solid #20007d;
    border-radius: 20px;
    transition: .5s ease-in-out;
   }
   #inputLeft {
    border: 0;
    background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#D2D2D2, #D2D2D2);
    background-size: 0 2px, 100% 1px;
    background-repeat: no-repeat;
    background-position: center bottom, center calc(100% - 1px);
    background-color: transparent;
    transition: background 0s ease-out;
    float: none;
    box-shadow: none;
    border-radius: 0;
    font-weight: 400;
   }

   @media (max-width: 991px) {
    div.row:nth-child(3) {
        padding-left: 15px;
        padding-right: 15px;    
       }
     }

    #single > div > div > div > div > div > div > div.card-body > div > table > tbody > tr > td {
    font-size: 14px;
   }
    .profile-avatar {
    text-align: center;
    }
    .profile-avatar img {
    max-width: 120px;
    border-radius: 100%;
    }
    .profile-name {
    margin-bottom: 8px;
    margin-top: 0px;
    font-size: 20px;
    text-transform: uppercase;
   }
   .dashbord-profile {
    display: grid;
    grid-template-columns: 120px auto;
    align-items: center;
    grid-gap: 20px;
   }
   .content {
    box-sizing: border-box;
   }
   .card [class*="card-header-"]:not(.card-header-icon):not(.card-header-text):not(.card-header-image) {
    border-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    margin-top: -20px;
    padding: 15px;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
   }
   .card-member{
    order-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    margin-top: -20px;
    padding: 15px;
    padding-top: 15px;
    padding-right: 15px;
    padding-bottom: 10px;
    padding-left: 15px;
   }
   .card-body {
    padding: 10px 24px 24px;
    padding-top: 10px;
    padding-right: 24px;
    padding-bottom: 24px;
    padding-left: 24px;
   }
  .card .card-header-primary .card-icon, 
  .card .card-header-primary .card-text, 
  .card .card-header-primary:not(.card-header-icon):not(.card-header-text),
  .card.bg-primary,
  .card.card-rotate.bg-primary .front, 
  .card.card-rotate.bg-primary .back {
    background: linear-gradient(60deg, #ab47bc, #8e24aa);
   }
   .card .card-header-primary .card-icon, 
   .card .card-header-primary:not(.card-header-icon):not(.card-header-text), 
   .card .card-header-primary .card-text {
    box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);
   }
   .h4{
    margin-top: 10px;
    line-height: 1.1;
   }
   .p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
   }
   .div {
    display: block;
}
.col-md-12{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.table-responsive{
    min-height: .01%;
    overflow-x: auto;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
}
.text-primary {
    color: #337ab7;
}
.tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
}
.tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
}
.card .dataTable td, .card .dataTable th, .card .table td, .card .table th, .table td, .table th {
    vertical-align: middle; 
    padding-top: 15px;
    padding-right: 8px;
    padding-bottom: 15px;
    padding-left: 8px;

}
.table thead tr th{
    font-size: 14px;
    font-weight: 600;
    padding-left: 15px;
    color: #337ab7;
}
.table td{
    text-shadow: none;
    color: black;
    text-decoration: none;
    background-color: transparent;
    font-size: 12px;
    padding-left: 50px;
}

.#inline {
    width :50%;
    padding : 0;
    margin : 0;
    display : inline;

}

fieldset {
    display: block;
    margin-inline-start: 2px;
    margin-inline-end: 2px;
    padding-block-start: 0.40em;
    padding-inline-start: 0.95em;
    padding-inline-end: 0.75em;
    padding-block-end: 0.625em;
    min-inline-size: min-content;
    border-width: 2px;
    border-style: groove;
    border-color: threedface;
    border-image: initial;
}

legend {
    display: block;
    padding-inline-start: 2px;
    padding-inline-end: 2px;
    border-width: initial;
    border-style: none;
    border-color: initial;
    border-image: initial;
    width: auto;
    margin-bottom: 5px;
    font-size: 25px;
    color: blue;
    padding-left: 10px;
    padding-right: 10px;
}

#single .label{
    border-radius: 12px;
    padding: 5px 12px;
    text-transform: uppercase;
    font-size: 10px;
}

#single .label.label-success {
    background-color: #4caf50;
}

#single .label.label-danger {
    background-color: #f44336;
}

.page-boxed .page-footer, .page-footer {
    padding-left: 10px;
    padding-right: 10px;
}

.page-footer {
    padding: 20px 5px;
    font-size: 13px;
    background-color: #263238;
}
.page-footer::after, .page-footer::before {
    content: " ";
    display: table;
}
.page-footer {
    font-size: 13px;
}
.page-footer .page-footer-inner {
    color: #98a6ba;
    float: left;
    width: 100%;
    text-align: center;
}
element {
    display: none;
}
.scroll-to-top {
    bottom: 10px;
    right: 10px;
}
.scroll-to-top {
    padding: 11px;
    border-radius: 4px;
    background: #1c262f;
    text-align: center;
    position: fixed;
    z-index: 10001;
}
.sidemenu-closed.sidemenu-container-fixed .sidemenu-container:hover .sidemenu .sub-menu li, .sidemenu-container .sidemenu .sub-menu li {

    background: 0 0;
    margin: 0;
    padding: 0;
    list-style: none;

}
 .sidemenu-container .sidemenu .sub-menu {
    list-style: none;
    padding: 0 0 15px;
margin: 0;
}

</style>
</head>
<body>

<div id="ui" class="ui">

    <!--header start-->
    <header id="header" class="ui-header">

        <div class="navbar-header">
            <!--logo start-->
            <a href="<?php echo site_url('vendor') ?>" class="navbar-brand"  style="padding-top: 0px;">
                <span class="logo"><img src="<?php echo base_url();?>axxets/client/logo_dark.png" width="160" height="50" alt="logo" class="logo-default"/></span>
            </a>
            <!--logo end-->
        </div>

        <div class="navbar-collapse nav-responsive-disabled">

            <!--toggle buttons start-->
            <ul class="nav navbar-nav">
                <li>
                    <a class="toggle-btn" data-toggle="ui-nav" href="">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>

            </ul>
            <!-- toggle buttons end -->
            <!--notification start-->
            <ul class="nav navbar-nav navbar-right hidden-xs">
                <!--
                <li class="dropdown language-switch">
                    <div id="google_translate_element"></div>
                    <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({
                                pageLanguage: 'en',
                                includedLanguages: 'ar,bn,en,gu,hi,kn,mr,ms,pa,ta,te',
                                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                autoDisplay: false
                            }, 'google_translate_element');
                        }
                    </script>
                    <script type="text/javascript"
                            src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </li> -->
                <?php if (config_item('enable_repurchase')=="Yes") { ?>
                    <a href="<?php echo site_url('cart/pre_checkout') ?>"
                       class="btn btn-danger hidden-xs glyphicon glyphicon-shopping-cart"
                       style="margin: 10px;display:none;">
                        Cart: <?php echo count($this->cart->contents()) ?> </a>
                <?php } ?>
                <li class="dropdown dropdown-usermenu">
                    <a href="#" class=" dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="true">
                        <span class="hidden-sm hidden-xs"
                              style="font-weight: bold">
                            <?php echo $this->session->name ?></span>
                        <span class="caret hidden-sm hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                        <li><a href="<?php echo site_url('vendor/settings') ?>"><i
                                        class="fa fa-cogs"></i> Settings</a>
                        </li>
                        <li><a href="<?php echo site_url('vendor/profile') ?>"><i
                                        class="fa fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('vendor/logout') ?>"><i
                                        class="fa fa-sign-out"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--notification end-->

        </div>

    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside id="aside" class="ui-aside">
        <ul class="nav" ui-nav>
            <li class="member">
                <a href="<?php echo base_url('vendor') ?>">Hi, <?php echo $this->session->name ?><br/>(
                    My ID
                    : <?php echo config_item('ID_EXT') . $this->session->vendor_id ?>)
                </a>
            </li>
            <li class="active" >
                <a
                        href="<?php echo site_url('vendor') ?>"><i
                            class="fa fa-home"></i><span>Dashboard</span></a>
            </li>
            <li id='wletter' style="display:none;">
                <a href="<?php echo site_url('vendor/welcome-letter') ?>"><i
                            class="fa fa-file-text-o"></i><span> Welcome Letter</span></a>
            </li>
            
            
            <?php if (config_item('enable_news')=="Yes") { ?>
                <li id='news' style="display: none;">
                    <a href="<?php echo site_url('vendor/news') ?>"><i
                                class="fa fa-xing-square"></i><span>News Announcements</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                </li>
            <?php } ?>
        <!--    <?php if (config_item('enable_help_plan')!=="Yes") { ?>
                <li id='earnings'>
                    <a href=""><i class="fa fa-money"></i><span>My Earnings</span><i class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                      <li><a href="<?php echo site_url('vendor/view-earning') ?>"><span>My Earnings</span></a>
                        </li>s
                        <li><a href="<?php echo site_url('vendor/view-deductions') ?>"><span>My Deductions</span></a>
                        </li>
                        <li><a href="<?php echo site_url('vendor/search-earning') ?>"><span>Search Earnings</span></a>
                        </li>
                        
                        <li><a href="<?php echo site_url('wallet/transfer-balance') ?>"><span>Transfer Fund</span></a>
                        </li>
                        <?php if (config_item('user_withdraw')=="Yes") { ?>
                            <li>
                                <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"><span>Withdraw Payouts</span></a>
                            </li>
                        <?php } ?>
                        
                    </ul>
                </li>
            <?php } ?>-->
        <!--    <li id='reports' style="display:none;">
                <a href=""><i class="fa fa-money"></i><span>Reports</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                <ul class="nav nav-sub">
                    <li>
                        <a href="<?php echo site_url('wallet/balance-transfer-list') ?>"><span>Wallet Transaction</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('wallet/withdrawal-list') ?>"><span>Payout Report</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('vendor/tax_report') ?>"><span>Tax Report</span></a>
                    </li>
                    <?php if (config_item('enable_pg') == "Yes") { ?>
                    <li>
                        <a href="<?php echo site_url('vendor/online_transactions') ?>"><span>Online Transaction</span></a>
                    </li>
                    <?php } ?>
                </ul>
            </li>-->
            <?php if (!isset($this->session->designation) || $this->session->designation['manage_reports'] == "1") { ?>
                          <li id='reports'>
                            <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-file"></i>
                                    <span class="title">Reports</span>
                                    <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            <ul class="nav nav-sub" style="list-style:none;">
                            
                                <?php if ((!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1") && config_item('enable_product') == "Yes") { ?>
                                <li class="nav-item">
                                    <a href="<?php echo site_url('vendor/producttax-report') ?>"
                                       class="nav-link ">
                                        <span class="title">Product Sale Tax Report</span>
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if (config_item('enable_pg') == "Yes") { ?>
                                    <li style="display:none;" class="nav-item">
                                        <a href="<?php echo site_url('vendor/online_transactions') ?>"
                                           class="nav-link ">
                                            <span class="title payment">Online Transactions</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                          </li>
                        <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1") && config_item('enable_product') == "Yes") { ?>
              <li id='prodservices'>
                    <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="title">Products & Services</span>
                                    <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="nav nav-sub">
                                    <?php if (!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1" || $this->session->designation['view_orders'] == "1") { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/add_brand') ?>"
                                               class="nav-link ">
                                                <span class="title">Add Brands</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/manage_cat') ?>"
                                               class="nav-link ">
                                                <span class="title">Manage Categories</span>
                                            </a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/add_product') ?>"
                                               class="nav-link ">
                                                <span class="title">Add Products</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/manage_products') ?>"
                                               class="nav-link ">
                                                <span class="title">Manage Products</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/search-product') ?>"
                                               class="nav-link ">
                                                <span class="title">Search Product/Services</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <?php if (!isset($this->session->designation) || $this->session->designation['view_orders'] == "1") { ?>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/pending-orders') ?>"
                                               class="nav-link ">
                                                <span class="title">Pending Orders</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/delivered') ?>"
                                               class="nav-link ">
                                                <span class="title">Delivered Orders</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/completed-orders') ?>"
                                               class="nav-link ">
                                                <span class="title">Completed Orders</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo site_url('vendor/all-orders') ?>"
                                               class="nav-link ">
                                                <span class="title">All Orders</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
              </li>
            <?php } ?>
            <?php if (config_item('enable_recharge')=="Yes") { ?>
                <li id='recharge'>
                    <a href=""><i
                                class="fa fa-mobile-phone"></i><span>Recharge Zone</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                        <li><a href="<?php echo site_url('recharge/new-recharge') ?>"><span>New Recharge</span></a></li>
                        <li><a href="<?php echo site_url('recharge/old-recharges') ?>"><span>Old Recharges</span></a>
                        </li>
                    </ul>
                </li>
            <?php } ?>

            <?php if (config_item('enable_coupon')=="Yes") { ?>
                <li id='coupons'>
                    <a href=""><i
                                class="fa fa-code"></i><span>My Coupons</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                        <li><a href="<?php echo site_url('coupon/unused') ?>"><span>Un Used Coupons</span></a></li>
                        <li><a href="<?php echo site_url('coupon/used') ?>"><span>Used Coupons</span></a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (config_item('enable_ad_incm')=="Yes") { ?>
                <li id='advertisements'>
                    <a href=""><i
                                class="fa fa-bullhorn"></i><span>Advertisements</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                        <li><a href="<?php echo site_url('ads/myads') ?>"><span>My Ads</span></a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (config_item('enable_investment')=="Yes") { ?>
                <li id='investments'>
                    <a href=""><i
                                class="fa fa-bitcoin"></i><span>My Investments</span><i
                                class="fa fa-angle-right pull-right"></i></a>
                    <ul class="nav nav-sub">
                        <li><a href="<?php echo site_url('investments/new_invest') ?>"><span>New Investments</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('investments/recent_investment') ?>"><span>Recent Investments</span></a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('investments/expired_investment') ?>"><span>Expired Investments</span></a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <?php if (config_item('enable_survey')=="Yes") { ?>

                <li id='survey' ><a href="<?php echo site_url('survey/mysurveys') ?>"><i class="fa fa-list"></i>
                        <span>My Surveys</span></a>
                </li>

            <?php } ?>
            <li id='support'>
                <a href=""><i class="fa fa-question"></i><span>My Support</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                <ul class="nav nav-sub">
                    <li><a href="<?php echo site_url('vendor/new-ticket') ?>"><span>New Support Request</span></a></li>
                    <li><a href="<?php echo site_url('vendor/old-Supports') ?>"><span>List Tickets</span></a></li>
                </ul>
            </li>
            <li id='documents' style="display: none;">
                <a href=""><i class="fa fa-question"></i><span>Documents</span>
                    <i class="fa fa-angle-right pull-right"></i></a>
                <ul class="nav nav-sub">
                    <li><a target='_blank' href="<?php echo base_url();?>uploads/legal/placeholder.png"><span>Sample</span></a></li>
                </ul>
            </li>
            <?php if (config_item('enable_help_plan') == "No") { ?>
                <?php if (!isset($this->session->designation) || $this->session->designation['invoice'] == "1") { ?>
                    <li id= 'accounting'>
                        <a href="#" class="nav-link nav-toggle">
                            <i class="fa fa-print"></i>
                            <span class="title">Invoice</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                        <ul class="nav nav-sub" style="list-style:none;">
                            <li class="nav-item">
                                <a href="<?php echo site_url('vendor/invoices') ?>"
                                   class="nav-link ">
                                    <span class="title" style="padding-top:10px;">Invoices</span>
                                </a>
                            </li>
                            <li class="nav-item" style="display: none;">
                                <a href="<?php echo site_url('vendor/purchase') ?>"
                                   class="nav-link ">
                                    <span class="title">Purchases</span>
                                </a>
                            </li>
                            <li class="nav-item" style="display: none;">
                                <a href="<?php echo site_url('vendor/accounting') ?>"
                                   class="nav-link ">
                                    <span class="title">P/L Sheet</span>
                                </a>
                            </li>
                            <li class="nav-item" style="display: none;">
                                <a href="<?php echo site_url('vendor/transactionlogs') ?>"
                                   class="nav-link ">
                                    <span class="title">Transaction Logs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php }
            } ?>
            <li id='proilesetting'>
                <a href=""><i class=" fa fa-cog" aria-hidden="true"></i><span>My Profile & Setting</span><i
                            class="fa fa-angle-right pull-right"></i></a>
                <ul class="nav nav-sub">
                    <li><a href="<?php echo site_url('vendor/profile') ?>"><span>My Profile</span></a></li>
                    <li><a href="<?php echo site_url('vendor/kyc') ?>"><span>KYC</span></a></li>
                    <li><a href="<?php echo site_url('vendor/bankdetails') ?>"><span>Bank details</span></a></li>
                    <li><a href="<?php echo site_url('vendor/settings') ?>"><span>Setting & Password</span></a></li>
                </ul>
            </li>
            <li><a href="<?php echo site_url('vendor/logout') ?>"><i
                            class="fa fa-sign-out"></i> Log Out</a></li>
            </li>
        </ul>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <div id="content" class="ui-content ui-content-aside-overlay">
        <div class="ui-content-body">

            <div class="ui-container">
                <div class="row">
                    <?php
                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                    echo $this->session->flashdata('common_flash');
                    if (trim($layout)!=="") {
                        echo "<h3 style='color: #3c3c3c'>" . $title . "</h3><hr/>";
                        include_once $layout;
                    } else {

                    if (config_item('enable_help_plan')=="Yes"){
                        ?>
                        <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1))  {
                            echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
                        } ?>
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div class="panel-heading">
                                        <div class="panel-title">Total Help Sent:
                                        </div>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-item">
                                                <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                        'status'    => 'Accepted',
                                                        'sender_id' => $this->session->user_id,
                                                    )) ?></strong>
                                            </div><!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div class="panel-heading">
                                        <div class="panel-title">Total Help Received:
                                        </div>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-item">
                                                <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                        'status'      => 'Accepted',
                                                        'receiver_id' => $this->session->user_id,
                                                    )) ?></strong>
                                            </div><!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div class="panel-heading">
                                        <div class="panel-title">Total Pending Receivable
                                        </div>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12 col-item">
                                                <strong><?php echo config_item('currency') ?><?php echo $this->db_model->sum('donation_amount', 'donations', array(
                                                        'status'      => 'Sent',
                                                        'receiver_id' => $this->session->user_id,
                                                    )) ?></strong>
                                            </div><!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="panel panel-default-light panel-card border-default rounded">
                                    <div>
                                        <br/>
                                    </div><!-- /.panel-heading -->

                                    <div class="panel-body">
                                        <div class="row">
                                            <a href="<?php echo site_url('ticket/old-Supports') ?>">
                                                <div class="col-xs-12 col-item blink"
                                                     style="text-align: center; color:red">
                                                    <strong>Click Here</strong><br/>
                                                    <span>for Support</span>
                                                </div>
                                            </a>
                                            <!-- /.col-xs-6 -->
                                        </div><!-- /.row -->
                                    </div><!-- /.panel-body -->
                                </div><!-- /.panel -->
                            </div><!-- /.col-sm-6 -->
                        </div><!-- /.row -->

                        <div class="row">
                            <div class="col-sm-6 table-responsive">
                                <h3>Please Send Donations to:</h3>
                                <table class="table table-bordered table-striped alert-info">
                                    <tr style="font-weight: 900; background-color: #0d638f; color:#fff">
                                        <td>Receiver</td>
                                        <td>Bank Detail</td>
                                        <td>Phone No</td>
                                        <td>Amount</td>
                                        <td>#</td>
                                    </tr>
                                    <?php
                                    $this->db->select('id,receiver_id, donation_amount')->from('donations')
                                             ->where(array(
                                                         'status'         => 'Sent',
                                                         'sender_id'      => $this->session->user_id,
                                                         'expiry_date >=' => date('Y-m-d'),
                                                     ))
                                             ->order_by('id', 'DESC')->limit(10);
                                    $no   = 1;
                                    $data = $this->db->get()->result();
                                    foreach ($data as $res) {
                                        $detail = $this->db_model->select_multi('vendor_id, name,phone', 'vendor', array('vendor_id' => $res->receiver_id));
                                        $bank   = $this->db_model->select_multi('bank_ac_no,bank_name,bank_ifsc', 'vendor_profile', array('userid' => $res->receiver_id));
                                        echo '<tr>
                                            <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                                            <td>Bank:' . $bank->bank_name . '<br/>A/C No:' . $bank->bank_ac_no . '<br/>IFSC: ' . $bank->bank_ifsc . '</td>
                                            <td>' . $this->db_model->select('phone', 'vendor', array('vendor_id' => $res->receiver_id)) . '</td>
                                            <td>' . config_item('currency') . $res->donation_amount . '</td>
                                            <td><a href="javascript:;" onclick="document.getElementById(\'id\').value=\'' . $res->id . '\'" 
                                            data-toggle="modal" 
                                            data-target="#myModal" 
                                            class="btn btn-xs btn-primary">Send</a></td>
                                        </tr>';
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-sm-6 table-responsive">
                                <h3>Confirm Donations:</h3>
                                <table class="table table-bordered table-striped alert-warning">
                                    <tr style="font-weight: 900; background-color: #ff4848; color:#fff">
                                        <td>Sender</td>
                                        <td>Phone No</td>
                                        <td>Amount</td>
                                        <td>Transaction Detail</td>
                                        <td>#</td>
                                    </tr>
                                    <?php
                                    $this->db->select('id,sender_id, donation_amount, trid, file,status')->from('donations')
                                             ->where(array(
                                                         'status !='   => 'Accepted',
                                                         'receiver_id' => $this->session->user_id,
                                                     ))
                                             ->order_by('id', 'DESC')->limit(10);
                                    $no   = 1;
                                    $data = $this->db->get()->result();
                                    foreach ($data

                                             as $res) {

                                        $detail = $this->db_model->select_multi('name,phone', 'vendor', array('vendor_id' => $res->sender_id));
                                        if ($res->file!=="") {
                                            $file_line = '<br/><a target="_blank" class="btn btn-xs btn-primary" href="' . base_url('uploads/' . $res->file) . '">See Receipt</a>';
                                        }
                                        echo '<tr>
                                            <td><strong style="text-decoration: underline;">' . $detail->id . '</strong></br/>' . $detail->name . '<br/>' . $detail->phone . '</td>
                                            <td>' . $this->db_model->select('phone', 'vendor', array('id' => $res->sender_id)) . '</td>
                                            <td>' . config_item('currency') . $res->donation_amount . '</td>
                                            <td>';
                                        if ($res->status!=='Waiting') {
                                            echo '<td colspan="2">Waiting to Send Payment</td>';
                                        } else {
                                            echo ' ' . $res->trid . '
                                            ' . $file_line . '</td>
                                            <td><a href="donation/approve-donation/' . $res->id . '" onclick="return confirm(\'Are you sure, you have received this payment and want to confirm ?\')" 
                                            class="btn btn-xs btn-success">Accept
                                            </a></td>';
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div><!-- /.row -->

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Send Donation</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            <?php echo form_open_multipart('donation/send-donation') ?>
                                            <input type="hidden" name="id" id="id" value="">
                                            <label>Enter Transaction Detail (Optional)</label><br/>
                                            <textarea name="tdetail" class="form-control"></textarea><br/>
                                            <input name="files" type="file"> Upload Receipt<br/>
                                            <button class="btn btn-primary">Submit</button>
                                            <?php echo form_close() ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else{ ?>
                    <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
                        echo "<div class='alert alert-danger' style='text-align:center;'>". config_item('announcement') . '</div>';
                    } ?>
                    <!--task states start-->
                    <!--start of Dashboard-->
                    <div class="bg-light lter b-b wrapper-md" style="margin-top: -10px; margin-left: -20px; margin-right: -25px;">
                        <div class="row" style="margin-left:25px; padding-top: 15px; padding-bottom: 15px">
                            <div class="col-lg-4 col-md-4 col-sm-12" style="padding-top: 5px;">
                                <h1 class="m-n h3">Vendor Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php if(config_item('enable_news')=='Yes') { ?>
                    <?php $this->db->select('id, subject, content, date')->order_by('id', 'desc')->limit(1);
                    $news = $this->db->get('news')->result();
                    if(count($news)>0) { ?>
                    <div class="alert alert-light">
                        <marquee direction="left">
                            <?php foreach ($news as $n) { ?>
                                 <p style="color:#9c27b0;font-weight:bold;margin-bottom: 0px;"><?php echo $n->content; ?></p>
                                 <?php }?>
                        </marquee>
                      </div>
                    <?php } }?>
                    <div class="panel item">
                        <div class="panel-body">
                            <div class="dashbord-profile">
                                <div class="profile-avatar">
                                    <?php $photo=$this->db_model->select('photo', 'vendor', array('vendor_id' => $this->session->vendor_id));?>
                                    <img src="<?php echo $photo ? base_url('uploads/profile/' . $photo) : site_url('axxets/nophoto.jpg'); ?>"
                                     class="img-thumbnail img-responsive" style="max-height: 100px">
                                    <div class="clearfix"></div>
                                    <a href=<?php echo site_url('vendor/profile'); ?> target ='__blank' class="profile-edit" style="color: #337ab7">View Profile</a>
                                </div>
                                 <div class="profile-content" >
                                    <h4 class="profile-name" style="color: #006400; font-size:30px;"><?php echo $this->session->name ?></h4>
                                    <h4 class="profile-name" style="color: blue;"><span style="color: black;">ID : </span><?php echo config_item('ID_EXT') . $this->session->vendor_id ?> </h4>
                                    <!--<h4 style="color: blue; font-size:16px;"><span style="color: black;">Rank : </span><?php echo $this->db_model->select('rank', 'member', array('id' => $this->session->user_id)); ?></h4>-->
                                    <?php $status = $this->db_model->select('status', 'vendor', array('vendor_id' => $this->session->vendor_id)); ?>
                                    <?php if($status == 'Active') { ?>
                                    <h4 style="color: blue; font-size:16px;"><span style="color: black;">Status : </span>Active</h4>
                                    <span style="margin-top:5px;display:none; "><strong style="font-size:16px;"> Referral Link : </strong>
                                    <a target="_blank" name="fb_share" type="button" href="https://www.facebook.com/sharer.php?u=<?php echo site_url() . 'site/register/Left/' . $this->session->user_id ?>">&nbsp;<i class="fa fa-facebook" style="font-size:20px;color: #3b5998;"></i></a> &nbsp;
                                    <a target="_blank" href="https://api.whatsapp.com/send?text=<?php echo site_url() . 'site/register/A/' . $this->session->user_id ?>" data-action="share/whatsapp/share">&nbsp;<i class="fa fa-whatsapp" style="font-size:20px;color: #4FCE5D;"></i></a>
                                    </span>
                                    <?php } else { ?>
                                        <h4 style="color: red; font-size:16px;">Suspended
                                        <a href="#" data-toggle="modal" data-target="#renewaccount" style="color: blue;"><br><u>Renew Account</u></a>
                                        </h4>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>                     

                    <div class="row">
                      <div class="col-md-12" style="display:none;">
                         <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose" style="paint-order: 20px; padding-right: 20px;">
                               <h4 class="card-title"></h4>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row" >
                               <div class="col-md-7 col-md-offset-1">
                                  <div class="form-group label-floating is-empty" style=" margin-bottom: 7px; width: 100%; float: left; font-weight: bold;">
                                     <input readonly="" id="inputLeft" type="text" class="form-control" value="<?php echo base_url();?>site/register/A/<?php echo $vendor->id;?>">
                                  </div>
                               </div>
                               <div class="col-md-3" >
                                  <div class="form-group label-floating is-empty" style=" margin-bottom: 7px; width: 100%; float: left; font-weight: bold;"> 
                                     <input type="submit" value="Copy Link" class="gen-pin-btn" onclick="copyToclip('inputLeft')" style="font-size: 12px;">
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>

                    <div class="modal fade" id="renewaccount" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Renew Your Account</h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                    <?php echo form_open('member/renew_account') ?>
                                    <div class="form-group">
                                        <?php $renew_amount = $this->db_model->select('recurring_fee', 'plans', array('id' => $member->signup_package)); ?>
                                        <label>Enter PIN for <?php echo config_item('currency') . $renew_amount ?> </label>
                                        <input type="text" class="form-control" name="renew_pin" required>
                                        <input type="hidden" class="form-control" name="renew_amount" value="<?php echo $renew_amount ?>" >
                                        <input type="hidden" class="form-control" name="user_id" value="<?php echo $member->id ?>" >
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Revew Account</button>
                                    </div>
                                    <?php echo form_close() ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($status_message) { ?>
                      <div class="alert alert-success" style="text-align:center;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span style="">
                          <b> Success - </b> <?php echo $status_message; ?></span>
                      </div>
                    <?php } ?>

                <?php if(config_item('leg') == '2' ) { ?>
                    <?php if($member->mypv > 0 || $member->downline_pv > 0) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-4">
                            <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">people</i>
                              </div>
                              <p class="card-category">Left PV</p>
                              <h3 class="card-title" style="color:blue;">
                                <?php  echo $member->total_a_pv; ?>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-4">
                            <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">people</i>
                              </div>
                              <p class="card-category">Right PV</p>
                              <h3 style="color:blue;" class="card-title">
                                <?php  echo $member->total_b_pv; ?>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">people</i>
                                <!--<i class="material-icons">store</i>-->
                              </div>
                              <p class="card-category">My PV</p>
                              <h3 class="card-title" style="color:blue;">
                                <?php echo $member->mypv; ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">date_range</i> Till Date
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } else { ?>
                        <div class="col-lg-3 col-md-6 col-sm-4">
                            <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">people</i>
                              </div>
                              <p class="card-category">Left Count</p>
                              <h3 class="card-title" style="color:blue;">
                                <?php  $detail = $this->db_model->select('total_a', 'member', array('id' => $this->session->user_id));
                                echo $detail; ?>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-4">
                            <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">people</i>
                              </div>
                              <p class="card-category">Right Count</p>
                              <h3 style="color:blue;" class="card-title">
                                <?php  $detail = $this->db_model->select('total_b', 'member', array('id' => $this->session->user_id));
                                echo $detail; ?>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                              <div class="card-icon">
                                <i class="material-icons">people</i>
                              </div>
                              <p class="card-category">Today's Pairs</p>
                              <h3 class="card-title" style="color:blue;">
                                <?php echo $this->db_model->count_all('earning',array('type' => 'First Pair Matching Comm','userid'=>$this->session->user_id,
                                'date >=' =>  date('Y-m-d'))) + $this->db_model->count_all('earning',
                                array('type' => 'Binary Commission','userid'=>$this->session->user_id,
                                'date >=' =>  date('Y-m-d')));
                                            ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">date_range</i> Till Date
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                   <div class="card-icon">
                                      <i class ='<?php echo config_item('cur'); ?>'></i>
                                    </div>
                                    <p class="card-category">Total Earned</p>
                                    <h3 style="color:blue;" class="card-title">
                                       <?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
                                                if ($data == "") {
                                                    echo config_item('currency') . '0';
                                                } else {
                                                    echo config_item('currency') . $data;
                                                } ?>
                                     </h3>
                                </div>
                                <div class="card-footer">
                                  <div class="stats">
                                    <i class="material-icons">date_range</i> Till Date
                                  </div>
                                </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6" style="display:none;">
                          <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                                <i class ='<?php echo config_item('cur'); ?>'></i>
                              </div>
                              <p class="card-category">Referral Income</p>
                              <h3 style="color:blue;" class="card-title">
                                <?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Referral Income')) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Direct Referral Commission'));
                                            if ($data == "") {
                                                echo config_item('currency') . '0';
                                            } else {
                                                echo config_item('currency') . $data;
                                            } ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                          </div>
                        </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                               <div class="card-icon">
                                 <i class ='<?php echo config_item('cur'); ?>'></i>
                               </div>
                               <p class="card-category">Matching</p>
                               <h3 style="color:blue;" class="card-title">
                                  <?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Binary Commission')) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'First Pair Matching Comm'));
                                            if ($data == "") {
                                                echo config_item('currency') . '0';
                                            } else {
                                                echo config_item('currency') . $data;
                                            } ?>
                                 </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                         </div>
                    </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                   <div class="card-icon">
                                      <i class ='<?php echo config_item('cur'); ?>'></i>
                                    </div>
                                   <p class="card-category" >Wallet Balance</p>
                                   <h3 v class="card-title" style="color:blue;">
                                     <?php $data = $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id));

                                     if($data=="") {
                                        echo config_item('currency') . '0';
                                      } 
                                      else {
                                        echo config_item('currency') . $data;
                                        }
                                      ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                  <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                    <i class ='<?php echo config_item('cur'); ?>'></i>
                                    </div>
                                    <p class="card-category">Paid Payout</p>
                                    <h3 style="color:blue;" class="card-title">
                                    <?php echo config_item('currency') . $paid_payout ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                   <div class="stats">
                                     <i class="material-icons">date_range</i> Till Date
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                              <div class="card card-stats">
                                 <div class="card-header card-header-success card-header-icon">
                                       <div class="card-icon">
                                         <i class ='<?php echo config_item('cur'); ?>'></i>
                                       </div>
                                       <p class="card-category">Pending Payout</p>
                                       <h3 style="color:blue;" class="card-title">
                                         <?php echo config_item('currency') . $pending_payout; ?>
                                        </h3>
                                 </div>
                                 <div class="card-footer">
                                      <div class="stats">
                                        <i class="material-icons">date_range</i> Till Date
                                      </div>
                                 </div>
                              </div>
                        </div>
                    </div>
                <?php } else { ?>
                <?php if(config_item('width') == '1') { ?>
                    <div class="col-lg-3 col-md-6 col-sm-4">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                               <div class="card-icon">
                                 <i class="material-icons">people</i>
                               </div>
                               <p class="card-category">Total Team</p>
                               <h3 class="card-title">
                                 <?php 
                                 $total_dc = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $member->gift_level+1));
                                 $prev_total = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $member->gift_level));
                                 $prev_total = $prev_total > 0 ? $prev_total : 0;
                                 if($direct_team >= $total_dc) {
                                 echo $member->total_downline; } else {
                                    echo $prev_total; 
                                 } ?>
                               </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="col-lg-3 col-md-6 col-sm-4" style="display:none;">
                            <div class="card card-stats" >
                                <div class="card-header card-header-warning card-header-icon">
                                   <div class="card-icon">
                                     <i class ='<?php echo config_item('cur'); ?>'></i>
                                   </div>
                                   <p class="card-category">Current Balance</p>
                                   <h3 class="card-title">
                                     <?php echo $member->total_downline; ?>
                                   </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                    <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-6 col-sm-4">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                              <div class="card-icon">
                                <i class ='fa fa-check-square fa-5x'></i>
                              </div>
                              <p class="card-category">Total Item sold!</p>
                              <h3 class="card-title">
                                <?php $total_sold=$this->db_model->sum('sold_qty', 'product', array('vendor_id' => $this->session->vendor_id));
                                echo $total_sold; ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">date_range</i> Till Date
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-4" style="display:none;">
                        <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                                <i class ='<?php echo config_item('cur'); ?>'></i>
                              </div>
                              <p class="card-category">Total Earnings!</p>
                              <h3 class="card-title">
                                <?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
                                            if ($data <= "0") {
                                                echo config_item('currency') . '0';
                                            } else {
                                                echo config_item('currency') . $data;
                                            } ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">date_range</i> Till Date
                              </div>
                            </div>
                        </div>
                    </div>
                    <?php if($member->mypv > 0 || $member->downline_pv > 0) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                              <div class="card-icon">
                                <i class ='<?php echo config_item('cur'); ?>'></i>
                                <!--<i class="material-icons">store</i>-->
                              </div>
                              <p class="card-category">My PV</p>
                              <h3 class="card-title" style="color:blue;">
                                <?php echo $member->mypv; ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">date_range</i> Till Date
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-4">
                            <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                                <i class ='<?php echo config_item('cur'); ?>'></i>
                              </div>
                              <p class="card-category">Downline PV</p>
                              <h3 class="card-title" style="color:blue;">
                                <?php  echo $member->downline_pv; ?>
                              </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                            </div>
                        </div>
                    <?php } else { ?>
                    <?php if(config_item('enable_crowdfund')=='Yes') { ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                          <div class="card-icon">
                            <i class ='<?php echo config_item('cur'); ?>'></i>
                          </div>
                          <p class="card-category">Latest Income</p>
                          <h3 style="color:blue;" class="card-title">
                            
                            <?php 
                            $this->db->select('amount, ref_id')->from('earning')->where(array('userid'=> $this->session->user_id,))->order_by('id', 'DESC')->limit(1);
                            $data = $this->db->get()->result_array();
                            if ($data[0]['amount'] == "") {
                                echo config_item('currency') . '0';
                            } else {
                                echo config_item('currency') . $data[0]['amount'];
                            } ?>
                            </h3>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">date_range</i> Ref ID: <?php if($data[0]['ref_id'] > 0) {echo $data[0]['ref_id']; } else { echo 'None'; } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                      <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                          <div class="card-icon">
                            <i class ='fa fa-shopping-cart fa-5x'></i>
                          </div>
                          <p class="card-category">Total Products!</p>
                          <h3 style="color:blue;" class="card-title">
                            <?php $data = $this->db_model->sum('qty', 'product', array('vendor_id' => $this->session->vendor_id));
                                        echo $data; ?>
                            </h3>
                        </div>
                        <div class="card-footer">
                          <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                              <div class="card-icon">
                                <i class ='fa fa-money fa-5x'></i>
                              </div>
                              <p class="card-category">Orders Processing!</p>
                              <h3 class="card-title">
                                <?php $total_processed = $this->db_model->count_all('product_sale',
                                array('status' => 'Processing','vendor_id'=>$this->session->vendor_id));
                                 echo $total_processed;
                                 ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">date_range</i> Till Date
                              </div>
                            </div>
                          </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-3 col-md-6 col-sm-4">
                       <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                              <div class="card-icon">
                                <i class ='fa fa-truck fa-5x'></i>
                              </div>
                              <p class="card-category">Orders Delivered!</p>
                              <h3 class="card-title">
                                <?php $total_delivered = $this->db_model->count_all('product_sale',
                                array('status' => 'Delivered','vendor_id'=>$this->session->vendor_id));
                                 echo $total_delivered;
                                 ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-4">
                        <div class="card card-stats">
                            <div class="card-header card-header-success card-header-icon">
                              <div class="card-icon">
                                <i class ='fa fa-check-circle fa-5x'></i>
                              </div>
                              <p class="card-category">Orders Completed!</p>
                              <h3 class="card-title">
                                <?php $total_completed = $this->db_model->count_all('product_sale',
                                array('status' => 'Completed','vendor_id'=>$this->session->vendor_id));
                                 echo $total_completed;
                                 ?>
                                </h3>
                            </div>
                            <div class="card-footer">
                              <div class="stats">
                                <i class="material-icons">date_range</i> Till Date
                              </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-6 col-sm-4" style="display:none;">
                          <div class="card card-stats">
                            <div class="card-header card-header-info card-header-icon">
                               <div class="card-icon">
                                 <i class ='<?php echo config_item('cur'); ?>'></i>
                               </div>
                               <p class="card-category">Pending Payout</p>
                               <h3 class="card-title">
                                 <?php echo config_item('currency') . $pending_payout; ?>
                               </h3>
                            </div>
                            <div class="card-footer">
                               <div class="stats">
                                 <i class="material-icons">date_range</i> Till Date
                               </div>
                            </div>
                     </div>
                    </div>

                <?php } ?>

                   <div class="col-md-12 col-sm-12" style="margin-bottom: 10px;display:none;">
                            <p align="center">
                                <a href="<?php echo site_url('member/topup-wallet') ?>"
                                   class="btn btn-lg btn-primary"><span class="fa fa-usd"></span> Top
                                    Up Wallet &rarr;</a>
                            </p>
                    </div>
                    <!--task states end-->

                    <!--charts start-->
                     <div class="col-md-12 col-sm-12" style="display:none;">
                       <div class="panel-body" style="max-height: 480px">
                          <div class="content">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="card">
                                    <div class="card-header card-header-primary">
                                      <h4 class="card-title" style="color:white;">Latest Earnings</h4>
                                        <p class="card-category" style="color:white;font-size: 12px;" > Here is the latest earnings details</p>
                                     </div>
                                     <div class="card-body">
                                       <div class="table-responsive">
                                         <table class="table table-hovered">
                                           <thead>
                                             <tr style="font-weight: 800">
                                               <th>Income Name</th>
                                               <th>Amount</th>
                                               <th>Date</th>
                                               <!--<th>Matching Pairs</th>-->
                                              </tr>
                                           </thead>
                                           <?php
                                            $this->db->select('type, amount, date, pair_names')->where('userid', $this->session->user_id)->order_by('id', 'DESC');
                                            $this->db->limit(5);
                                            $inc = $this->db->get('earning')->result();
                                           ?>
                                           <tbody>
                                            <?php foreach ($inc as $e): ?>
                                             <tr>
                                              <td><?php echo $e->type ?></td>
                                              <td><?php echo config_item('currency') . $e->amount ?></td>
                                              <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                                              <!--<td><?php echo $e->pair_names ?></td>-->
                                             </tr>
                                            <?php endforeach; ?>
                                           </tbody>
                                         </table>
                                       </div>
                                     </div>
                                   </div>
                                </div>
                               </div>
                          </div>
                       </div>
                     </div>
                   </div>

                    <?php if(config_item('width')==1) { ?>
                     <div class="col-md-12 col-sm-12" id='single'>
                            <div class="panel-body" style="max-height: 480px">
                                <div class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                           <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header card-header-primary" style="background: #200087;">
                                                        <h4 class="card-title" style="color:white;">Single Leg Report</h4>
                                                        <p class="card-category" style="color:white;font-size: 12px;" > Here is the latest single leg report</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-hovered">
                                                                <thead>
                                                                <tr style="font-weight: 800">
                                                                    <th>#</th>
                                                                    <th>Downline</th>
                                                                    <th>Direct</th>
                                                                    <th>Income</th>
                                                                    <th>Upgrade</th>
                                                                    <th>Status</th>
                                                                    <!--<th>Matching Pairs</th>-->
                                                                </tr>
                                                                </thead>
                                                                <?php
                                                                $this->db->select('*')->order_by('level_no', 'ASC');
                                                                         
                                                                $inc = $this->db->get('level_wise_income')->result();

                                                                ?>
                                                                <tbody>
                                                                    <?php $si=1; foreach ($inc as $e): ?>
                                                                    <tr>
                                                                        <td><?php $si++; echo $e->level_no; ?></td>
                                                                        <?php if($si==2) { ?>
                                                                            <td><?php echo $e->total_member ?></td>
                                                                        <?php } else { ?>
                                                                        <td><?php echo '+'.$e->total_member ?></td>
                                                                        <?php } ?>
                                                                        <td><?php echo '+'.$e->direct ?></td>
                                                                        <td><?php echo $e->amount ?></td>
                                                                        <?php if($e->upgrade > 0) { ?>
                                                                        <td><?php echo $e->upgrade ?></td>
                                                                    <?php } else { ?>
                                                                        <td>--</td>
                                                                        <?php } ?>
                                                                        <?php 
                                                                        $count = $this->db_model->count_all('earning', array(
                                                                            'userid' => $member->id,
                                                                            'secret' => $e->id,
                                                                            'type'   => $e->income_name,
                                                                        ));
                                                                        if($count > 0) { ?>
                                                                        <td><label class="label label-success" >Completed</label></td>
                                                                    <?php } else { ?>
                                                                        <td><label class="label label-danger">Pending</label></td>
                                                                    <?php } ?>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </div>
                    <?php } ?>

                    <div class="col-md-12 col-sm-12">
                        <div class="panel-body" style="height: 480px">
                            <div class="content">
                                <div class="container-fluid" style="display:none;">
                                    <div class="row">
                                        <div class="col-md-12" style="height:5px;">
                                            <div class="card" >
                                                <div class="card-header card-header-primary" style="background: green;">
                                                    <h4 class="card-title" style="color:white;">Reward Achievers</h4>
                                                    <p class="card-category" style="color:white; font-size: 12px;"> Latest Reward Achievers</p>
                                                </div>
                                                <div class="card-body">
                                                    <?php
                                                        $this->db->select('id, reward_name, reward_duration, achievers, A,B')->order_by('reward_name', 'ASC');
                                                        //$this->db->limit(1);
                                                        $reward = $this->db->get('reward_setting')->result();
                                                        ?>
                                                    <?php foreach ($reward as $r): ?>
                                                            <?php  $this->db->select('id, reward_id, userid,secret, date, status, paid_date, tid')->where(array('reward_id' => $r->id ));
                                                            $this->db->limit(5);
                                                            $reward_achievers = $this->db->get('rewards')->result();
                                                            //print_r($reward_achievers);
                                                            if(count($reward_achievers)>0) { ?>
                                                            <fieldset>
                                                                 <legend><b><?php echo $r->reward_name ?></b></legend>
                                                                    <?php $sn=1; 
                                                                    foreach ($reward_achievers as $ra): 
                                                                    //print_r($ra->userid);
                                                                    $user_name = $this->db_model->select('name', 'member', array('id' => $ra->userid,));?>
                                                                    <div style="color:black;padding-left: 5px;padding-bottom: 15px;font-size: 12px;" ><?php echo $sn++ .". " . $user_name; ?></div> 
                                                                   <?php endforeach; ?> 
                                                            </fieldset>
                                                            <br/><br/>
                                                            <?php }?>
                                                     <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->
<div class="page-footer">
    <div class="page-footer-inner"> 
        <?php if(config_item('footer_name') != '') { ?>
                &copy; <?php echo date('Y') ?> All Rights Reserved by 
        <?php echo config_item('footer_name') ?>
        <?php } else { ?>
        &copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?> <?php } ?>
    </div>
    <div class="scroll-to-top" style="float:right;">
        <i class="fa fa-arrow-up"></i>
    </div>
</div>


<!--footer end-->

<!-- inject:js -->
<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script> 
<script src="<?php echo base_url('axxets/base/js/jquery.nicescroll_v3.7.6.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/autosize_v4.0.0.min.js') ?>" type="text/javascript"></script>  
<script src="<?php echo base_url('axxets/base/js/modernizr.min.js') ?>" type="text/javascript"></script>
<!-- endinject -->
<script src="<?php echo base_url('axxets/member/js/theme.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/jquery_v1.12.1-ui.js') ?>" type="text/javascript"></script>


<!--
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.0/autosize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
-->

<!--<script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>-->
<!--<script>
    CKEDITOR.replace('editor');
</script>-->
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({html: true, placement: "top"});
    });
</script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: "-70:+70",
            changeMonth: true,
            changeYear: true,
            defaultDate: 0,
            showOptions: {direction: "down"},
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var height = document.getElementById('ui').offsetHeight;
        //alert(height);
        document.getElementById("aside").setAttribute('style', 'height:' + height + 'px' + '!important');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var element= document.querySelector('li.active .nav-sub');
        if(element) {
            element.setAttribute('style', 'display: block !important');
        }
    });
</script>
<script type="text/javascript">
      function copyToclip(inputID) {
      
      var copyText = document.getElementById(inputID);
      
      copyText.select();
      
      document.execCommand("copy");
      
      $.toaster('Link Copied');
      
      }
      
   </script>
</body>
</html>
