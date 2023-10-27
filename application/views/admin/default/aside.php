<div class="sidebar-container">
   <div id='sidebarmenu' class="sidemenu-container navbar-collapse collapse fixed-menu" >
      <div id="remove-scroll">
         <ul class="sidemenu  page-header-fixed"
            data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <?php if (config_item('google_translator') == "Yes") { ?>
            <div id="google_translate_element"></div>
                  <script type="text/javascript">
                     function googleTranslateElementInit() {
                       new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                     }
                     </script>
                  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            <?php } ?>  
            <li class="sidebar-toggler-wrapper hide">
               <div class="sidebar-toggler">
                  <span></span>
               </div>
            </li>
            <li class="sidebar-user-panel">
               <div class="user-panel">
                  <div class="pull-left info">
                     <p> Hi, <?php echo $this->session->name ?></p>
                  </div>
               </div>
            </li>
            <li id = 'dashboard' class="nav-item active">
               <a href="<?php echo site_url('admin') ?>" class="nav-link ">
               <i class="fa fa-tachometer"></i><span class="title">Dashboard</span>
               </a>
            </li>
            <?php if (!isset($this->session->designation)) { ?>
            <li id= 'plans' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-list"></i>
               <span class="title">Manage Plans</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <?php if (!isset($this->session->designation)) { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('plan/add_plan') ?>" class="nav-link ">
                     <span class="title">Create Plans</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('plan/manage_plans') ?>" class="nav-link ">
                     <span class="title">View / Edit Plans</span>
                     </a>
                  </li>
                  <?php if (config_item('level_income') == "Yes") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/set_level_wise') ?>"class="nav-link ">
                     <span class="title" id='level'><?php if(config_item('enable_board')=='Yes'){echo 'Configure Board';} elseif(config_item('width') == "1"){?>Single Leg Income <?php } else { ?> Level Completion Income <?php } ?>
                     </span>
                     </a>
                  </li>
                  <?php } ?>
                  <?php if ((!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1") && config_item('target_income')=='Yes') { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('plan/add_repurchase') ?>"class="nav-link ">
                     <span class="title" id='target'>Set Target Income</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('plan/manage_repurchase') ?>"class="nav-link ">
                     <span class="title" id='edit_target'>View / Edit Target Income</span>
                     </a>
                  </li>
                  <?php } ?>
                  <?php if ((!isset($this->session->designation) && config_item('enable_crowdfund') == "Yes")) { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/crowdfund_settings') ?>"class="nav-link ">
                     <span class="title">Configure Crowdfund Income</span>
                     </a>
                  </li>
                  <?php } } ?>
               </ul>
            </li>
            <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1") && config_item('enable_product') == "Yes") { ?>
            <li id= 'prodservices' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-shopping-cart"></i>
               <span class="title">Products & Services</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <?php if ((!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1" || $this->session->designation['view_orders'] == "1") && (config_item('enable_repurchase')=='Yes'))
                     { ?>
                        <?php if (config_item('ecomm_theme')!='gmart'){ ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/manage_cat') ?>"class="nav-link ">
                     <span class="title">Manage Categories</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/add_product') ?>"class="nav-link ">
                     <span class="title">Add Products</span>
                     </a>
                  </li>
                  <?php if(config_item('enable_variation')=='Yes'){ ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/add_variation') ?>"class="nav-link ">
                     <span class="title">Add Variation</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/manage_variation') ?>"class="nav-link ">
                     <span class="title">Manage Variation</span>
                     </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/manage_products') ?>"class="nav-link ">
                     <span class="title">Manage Products</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/search-product') ?>"class="nav-link ">
                     <span class="title">Search Product/Services</span>
                     </a>
                  </li>
                  <?php  } ?>
                  <?php  } ?>
                  <?php if (!isset($this->session->designation) || $this->session->designation['view_orders'] == "1") { ?>
                     <?php if (config_item('ecomm_theme')!='gmart'){ ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/pending-orders') ?>" class="nav-link ">
                     <span class="title">Pending Orders</span>
                     </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/delivered') ?>"class="nav-link ">
                     <span class="title">Delivered Orders</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/completed-orders') ?>"class="nav-link ">
                     <span class="title">Completed Orders</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/all-orders') ?>"class="nav-link ">
                     <span class="title">All Orders</span>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['manage_poducts'] == "1") && config_item('enable_ecom') == "Yes") { ?>
            <li id= 'ecomm' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-shopping-cart"></i>
               <span class="title">Ecommerce Store</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/add_brand') ?>"class="nav-link ">
                     <span class="title">Add Brands</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/add_image_banner') ?>"class="nav-link ">
                     <span class="title">Add Store Images and Banners</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('product/manage_banners') ?>"
                        class="nav-link ">
                     <span class="title">Manage Banners and Front page Images</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['user_manage'] == "1") { ?>
            <li id='members' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-users"></i>
               <span class="title">Manage Members</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/view-members') ?>"class="nav-link ">
                     <span class="title">View/Manage Members</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/search_user') ?>"
                        class="nav-link ">
                     <span class="title">Search Members</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/blocked-members') ?>"
                        class="nav-link ">
                     <span class="title">Blocked Members</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/latest-members') ?>"
                        class="nav-link ">
                     <span class="title">Latest Members</span>
                     </a>
                  </li>
                  <?php if(config_item('free_registration') == "Yes") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/activate_members') ?>" class="nav-link ">
                     <span class="title">Activate ID</span>
                     </a>
                  </li>
                  <?php } ?>
                  <?php if(config_item('Holding_tank')=='Yes') { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/Holding_members') ?>" class="nav-link ">
                     <span class="title">Holding Tank</span>
                     </a>
                  </li>
                  <?php } ?>
                  <!--<li class="nav-item">
                     <a href="<?php echo site_url('users/achievers') ?>"
                                                  class="nav-link ">
                      <span class="title">Achievers</span>
                     </a>
                     </li>-->
                  <!--   <?php if (config_item('enable_help_plan') !== "Yes") { ?>
                     <?php if (config_item('enable_topup') == "Yes") { ?>
                      <li class="nav-item">
                       <a href="<?php echo site_url('users/topup-member') ?>"
                         class="nav-link ">
                        <span class="title">TopUp Member</span>
                       </a>
                      </li>
                     <?php }
                        } ?>
                     <li class="nav-item">
                     <a target="_blank"
                       href="<?php echo site_url('site/register/A/' . $this->session->user_id) ?>" class="nav-link">
                      <span class="title">Register User</span>
                     </a>
                     </li>-->
               </ul>
            </li>
            <?php } ?>
         <?php if(config_item('enable_crm') == "Yes") { ?>
            <li id= 'crmpay' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-bank"></i>
               <span class="title">CRM</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/manage_crm') ?>" class="nav-link">
                     <span class="title">Manage</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/approved_crm') ?>" class="nav-link">
                     <span class="title">Approved List</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/rejected_crm') ?>" class="nav-link">
                     <span class="title">Rejected List</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if(config_item('enable_motor_insurance') == "Yes") { ?>
            <li id= 'deposit' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-bank"></i>
               <span class="title">Insurance</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('insurance_admin/insurance_4W') ?>"class="nav-link ">
                     <span class="title"> Motor Insurance</span>
                     </a>
                  </li>
                  <li style="display:none;" class="nav-item">
                     <a href="<?php echo site_url('insurance_admin/insurance_2W') ?>"class="nav-link ">
                     <span class="title">2W Motor Insurance</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('insurance_admin/insurance_health') ?>"class="nav-link ">
                     <span class="title">Health Insurance</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>

            
            <?php if(config_item('enable_vendor_management')=="Yes"){?>
            <li id='vendors' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-users"></i>
               <span class="title">Manage Vendors</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('Manage_vendor/view-vendors') ?>"class="nav-link ">
                     <span class="title">View/Manage Vendors</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('manage_vendor/search_vendor') ?>"
                        class="nav-link ">
                     <span class="title">Search Vendors</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('Manage_vendor/latest-vendors') ?>"
                        class="nav-link ">
                     <span class="title">Latest Vendors</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('Manage_vendor/pending_kyc') ?>"
                        class="nav-link ">
                     <span class="title">Pending KYC</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('Manage_vendor/approved_kyc') ?>"
                        class="nav-link ">
                     <span class="title">Approved KYC</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['tree_view'] == "1") { ?>
            <li id= 'utree' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-sitemap"></i>
               <span class="title">Network</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <?php if(config_item('diable_tree') != 'Yes') { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('tree/user-tree') ?>"
                        class="nav-link ">
                     <span class="title">User Tree</span>
                     </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('tree/referred-list') ?>"
                        class="nav-link ">
                     <span class="title">Referred Members</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a target="_blank" href="<?php echo site_url('site/register') ?>"
                        class="nav-link ">
                     <span class="title">Add New Member</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['epin'] == "1") && config_item('enable_epin') == "Yes") { ?>
            <li id='epin' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-xing-square"></i>
               <span class="title">Manage e-PIN</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/generate_epin') ?>"
                        class="nav-link ">
                     <span class="title">Generate e-PIN</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/unused_epin') ?>"
                        class="nav-link ">
                     <span class="title">Un-Used e-PINs</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/used_epin') ?>"
                        class="nav-link ">
                     <span class="title">Used e-PINs</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/search_epin') ?>"
                        class="nav-link ">
                     <span class="title">Search e-PIN</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/transfer_epin') ?>"
                        class="nav-link ">
                     <span class="title">Transfer e-PINs</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if (config_item('enable_help_plan') !== "Yes") { ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['earning_manage'] == "1") { ?>
            <li id = 'earningpay' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-money"></i>
               <span class="title">Earnings & Payout</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/view-earning') ?>"
                        class="nav-link ">
                     <span class="title">View Earnings</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/search-earning') ?>"
                        class="nav-link ">
                     <span class="title">Search Earnings</span>
                     </a>
                  </li>
                  <?php if(config_item('crowdfund_type') != "Manual_Peer_to_Peer"){ ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/make-payment') ?>"
                        class="nav-link ">
                     <span class="title">Fund Withdrawal Request</span>
                     </a>
                  </li>
                  <!--<li class="nav-item">
                     <a href="<?php echo site_url('income/search-payout') ?>"
                        class="nav-link ">
                         <span class="title">Search Payout</span>
                     </a>
                     </li>-->
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/hold-payments') ?>"
                        class="nav-link ">
                     <span class="title">Hold Payments</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('wallet/generate-payout') ?>"
                        class="nav-link ">
                     <span class="title">Generate Payout</span>
                     </a>
                  </li>
                  <?php } ?>
                  <?php if(config_item('enable_pv')=='Yes') { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/view_pv') ?>"
                        class="nav-link ">
                     <span class="title">View PV</span>
                     </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/view_deductions') ?>"
                        class="nav-link ">
                     <span class="title">View Deductions</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } } ?>
            <?php if((config_item('enable_help_plan') !== "Yes") && (config_item('crowdfund_type') != "Manual_Peer_to_Peer")) { ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['wallet'] == "1") { ?>
            <li id = 'ewallet' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-cc-visa"></i>
               <span class="title">Member E-Wallet</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/view_wallet') ?>"
                        class="nav-link ">
                     <span class="title">View Wallet Summary</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('wallet/manage-wallet-fund') ?>"
                        class="nav-link ">
                     <span class="title">Top up Wallet</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('wallet/transfer-fund') ?>"
                        class="nav-link ">
                     <span class="title">Transfer Fund </span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('wallet/wallet-transactions') ?>"
                        class="nav-link ">
                     <span class="title">Wallet Transactions</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('wallet/withdraw-fund') ?>"
                        class="nav-link ">
                     <span class="title">Withdraw Wallet Fund</span>
                     </a>
                  </li>
                  <?php if(config_item('repurchase')=='Yes'){ ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('wallet/withdraw-repurchase-fund') ?>"
                        class="nav-link ">
                     <span class="title">Withdraw Repurchase Fund</span>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php }} ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['manage_reports'] == "1") { ?>
            <li id= 'deposit' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-bank"></i>
               <span class="title">Deposit</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/bank_payment') ?>"class="nav-link ">
                     <span class="title">Pending Bank Deposits</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/completed_payments') ?>"class="nav-link ">
                     <span class="title">Bank Deposits</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/all_transactions') ?>"
                        class="nav-link ">
                     <span class="title payment">All Transactions</span>
                     </a>
                  </li>
                  <?php if (config_item('enable_cashback') == "Yes") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/pending_receipt') ?>"
                        class="nav-link ">
                     <span class="title payment">Pending Receipts</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/all_receipt') ?>"
                        class="nav-link ">
                     <span class="title payment">All Receipts</span>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>

            <?php 
               if (!isset($this->session->designation) && (config_item('enable_course_overview') == "Yes")) { ?> 
            <li id='course_overview' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-graduation-cap"></i>
               <span class="title">Course Overview</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/list_courses') ?>"
                        class="nav-link ">
                     <span class="title">List of Courses</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/course_enrolled_members') ?>"
                        class="nav-link ">
                     <span class="title">Course Overview by Member</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>

            <?php 
               if (config_item('enable_live_meeting') == "Yes") { ?> 
            <li id='meetings' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-video-camera"></i>
               <span class="title">Zoom Meetings</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/manage_meetings') ?>"
                        class="nav-link ">
                     <span class="title">My Meetings</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/all_meetings') ?>"
                        class="nav-link ">
                     <span class="title">Manage Member Meetings</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/upcomming_meetings') ?>"
                        class="nav-link ">
                     <span class="title">Upcoming Meetings</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/meeting-setting') ?>"
                        class="nav-link ">
                     <span class="title">Live Meeting Settings</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>

            <?php if (config_item('enable_news') == "Yes") {
               if (!isset($this->session->designation) || $this->session->designation['manage_news'] == "1") { ?> 
            <li id='news' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-xing-square"></i>
               <span class="title">News</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/add_news') ?>"
                        class="nav-link ">
                     <span class="title">Add News</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/manage_news') ?>"
                        class="nav-link ">
                     <span class="title">Manage News</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php }} ?>

            
            <?php if((!isset($this->session->designation) || $this->session->designation['manage_reports'] == "1") && (config_item('crowdfund_type') != "Manual_Peer_to_Peer")) { ?>
            <li id='reports' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-file"></i>
               <span class="title">Reports</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('wallet/withdrawl-report') ?>"
                        class="nav-link ">
                     <span class="title">Payout Report</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/tax-report') ?>"
                        class="nav-link ">
                     <span class="title">TDS / Tax Report</span>
                     </a>
                  </li>
                  <?php if (config_item('enable_product') == "Yes") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/producttax-report') ?>"
                        class="nav-link ">
                     <span class="title">Product Sale Tax Report</span>
                     </a>
                  </li>
                  <?php } ?>
                  <?php if(config_item('enable_vendor_management')=="Yes") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/vendor_sale_report') ?>"
                        class="nav-link ">
                     <span class="title">Vendor Sale Report</span>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['b_setting'] == "1") { ?>
            <li id = 'bsettings' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-briefcase"></i>
               <span class="title">Business Settings</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/common-setting') ?>"
                        class="nav-link ">
                     <span class="title">Common Settings</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/front-end-setting') ?>"
                        class="nav-link ">
                     <span class="title">Front End Settings</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/advance-setting') ?>"
                        class="nav-link ">
                     <span class="title">Advance Settings</span>
                     </a>
                  </li>
                  <?php if(config_item('crowdfund_type') != "Manual_Peer_to_Peer") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/payout-setting') ?>"
                        class="nav-link ">
                     <span class="title">Payout Setting</span>
                     </a>
                  </li>
                  <?php } ?>
                  <!--
                     <?php if (config_item('enable_help_plan') !== "Yes") { ?>
                     <li class="nav-item">
                     <a href="<?php echo site_url('income/flexible-income') ?>"
                        class="nav-link ">
                         <span class="title">Flexible Income Setting</span>
                     </a>
                     </li>
                     <li class="nav-item">
                     <a href="<?php echo site_url('income/set-level-wise') ?>"
                        class="nav-link ">
                         <span class="title">Level Wise Income Setting</span>
                     </a>
                     </li> -->
                  <?php } ?>
                  <?php if (config_item('enable_help_plan') !== "Yes") { ?>
                  <?php if (config_item('fix_income') == 'Yes') { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/income-setting') ?>"
                        class="nav-link ">
                     <span class="title">Fix Income Setting</span>
                     </a>
                  </li>
                  <?php }
                     if (config_item('enable_gap_commission') == "Yes") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/gap-commission-setting') ?>"
                        class="nav-link ">
                     <span class="title repurchase">Repurchase Gap Commission Setting</span>
                     </a>
                  </li>
                  <?php }
                     } ?>
                  <?php if (config_item('enable_pg') == "Yes") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/payment-gateway') ?>"
                        class="nav-link ">
                     <span class="title payment">Payment Gateways</span>
                     </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/welcome-letter') ?>"
                        class="nav-link ">
                     <span class="title wletter">Design Welcome Letter</span>
                     </a>
                  </li>
                  <!--
                     <li class="nav-item">
                         <a target="_blank"
                            onclick="return confirm('Username is : master and Password is: admin@## . Please change it soon. Ignore if changed.')"
                            href="<?php echo site_url('setting/cms') ?>"
                            class="nav-link ">
                             <span class="title designsite">CMS - Design Your Site</span>
                         </a>
                     </li> -->
                  <?php if(config_item('server_type') != 'Production') { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/clear-database') ?>"
                        class="nav-link ">
                     <span class="title cleardb">Clear/Reset Database</span>
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </li>
            <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['manage_kyc'] == "1") && config_item('enable_kyc') == "Yes") { ?>
            <li id='kyc' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-users"></i>
               <span class="title">KYC Compliance</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/pending_kyc') ?>"class="nav-link ">
                     <span class="title">Pending KYC</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/approved_kyc') ?>"
                        class="nav-link ">
                     <span class="title">Approved KYC</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('users/rejected_kyc') ?>"
                        class="nav-link ">
                     <span class="title">Rejected KYC</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if (config_item('enable_reward') == "Yes") { ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['manage_rewards'] == "1") { ?>
            <li id = 'rewards' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-gift"></i>
               <span class="title">Rewards</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('income/pay-rewards') ?>"
                        class="nav-link ">
                     <span class="title">Rewards Acheivers</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/reward-setting') ?>"
                        class="nav-link ">
                     <span class="title">Reward Setting</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('setting/rank-setting') ?>"
                        class="nav-link ">
                     <span class="title">Rank Setting</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } }?>
            <?php if (config_item('enable_investment') == "Yes") { ?>
            <li id = 'investments' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-bitcoin"></i>
               <span class="title">Investments</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('investments/create_pack') ?>"
                        class="nav-link ">
                     <span class="title">Create a New Pack</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('investments/manage_packs') ?>"
                        class="nav-link ">
                     <span class="title">Manage Packages</span>
                     </a>
                  </li>
                  <?php if (config_item('investment_mode') == "MANUAL") { ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('investments/approve_investments') ?>"
                        class="nav-link ">
                     <span class="title">Approve Investments</span>
                     </a>
                  </li>
                  <?php } ?>
                  <li class="nav-item">
                     <a href="<?php echo site_url('investments/manage_investments') ?>"
                        class="nav-link ">
                     <span class="title">Recent Investments</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('investments/search_investments') ?>"
                        class="nav-link ">
                     <span class="title">Search Investments</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if (config_item('enable_help_plan') == "Yes") { ?>
            <li id = 'managedonations' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-gift"></i>
               <span class="title">Manage Donations</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('donation/create_pack') ?>"
                        class="nav-link ">
                     <span class="title">Create a New Pack</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('donation/manage_packs') ?>"
                        class="nav-link ">
                     <span class="title">Manage Packages</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('donation/manage_donations') ?>"
                        class="nav-link ">
                     <span class="title">Manage Donations</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('donation/upgrade_level') ?>"
                        class="nav-link ">
                     <span class="title">Upgrade Levels</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('donation/search_donations') ?>"
                        class="nav-link ">
                     <span class="title">Search Donations</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['coupon'] == "1") && config_item('enable_coupon') == "Yes") { ?>
            <li id = 'coupons' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-tag"></i>
               <span class="title">Coupon Management</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('coupon/manage-cat') ?>"
                        class="nav-link ">
                     <span class="title">Manage Categories</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('coupon/create-coupon') ?>"
                        class="nav-link ">
                     <span class="title">Generate Coupons</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('coupon/manage-coupons') ?>"
                        class="nav-link ">
                     <span class="title">Manage Coupons</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('coupon/use-requests') ?>"
                        class="nav-link ">
                     <span class="title">Coupon Use Requests</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['staff'] == "1") && (config_item('enable_roles') == "Yes")) { ?>
            <li id = 'managestaff' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-user-secret"></i>
               <span class="title">User Management</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('staff/designations') ?>"
                        class="nav-link ">
                     <span class="title">Roles</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('staff/new-staff') ?>"
                        class="nav-link ">
                     <span class="title">Users</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('staff/list-staffs') ?>"
                        class="nav-link ">
                     <span class="title">Manage Staffs</span>
                     </a>
                  </li>
                  <!--<li class="nav-item">
                     <a href="<?php echo site_url('staff/pay-salary') ?>"
                        class="nav-link ">
                         <span class="title">Pay Salary</span>
                     </a>
                     </li>
                     <li class="nav-item">
                     <a href="<?php echo site_url('staff/salary-report') ?>"
                        class="nav-link ">
                         <span class="title">Salary Report</span>
                     </a>
                     </li>-->
               </ul>
            </li>
            <?php } ?>
            <?php if (config_item('enable_franchisee') == "Yes") { ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['franchisee'] == "1") { ?>
            <li id = 'franchisee' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-wpbeginner"></i>
               <span class="title">Manage Franchisee</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('adm-franchisee/add-fran') ?>"
                        class="nav-link ">
                     <span class="title">New Franchisee</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('adm-franchisee/stock-management') ?>"
                        class="nav-link ">
                     <span class="title">Franchisee Stock Management</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('adm-franchisee/manage-fran') ?>"
                        class="nav-link ">
                     <span class="title">Manage Franchisee</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php }
               } ?>
            <?php if (!isset($this->session->designation) && config_item('enable_ad_incm') == "Yes") { ?>
            <li id = 'advtincome' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-bullhorn"></i>
               <span class="title">Advt Income</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('ads/manage_ads') ?>"
                        class="nav-link ">
                     <span class="title">Manage Ads</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('ads/achievers') ?>"
                        class="nav-link ">
                     <span class="title">Ad Browsers</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if (!isset($this->session->designation) && config_item('enable_survey') == "Yes") { ?>
            <li id = 'survey' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-list"></i>
               <span class="title">Survey Master</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('survey/manage_survey') ?>"
                        class="nav-link ">
                     <span class="title">Manage Surveys</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('survey/survey_report') ?>"
                        class="nav-link ">
                     <span class="title">Survey Reports</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if ((!isset($this->session->designation) || $this->session->designation['recharge_portal'] == "1") && config_item('enable_recharge') == "Yes"){ ?>
            <li id = 'recharge' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-mobile-phone"></i>
               <span class="title">Recharge Portal</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('recharge/records') ?>"
                        class="nav-link ">
                     <span class="title">Recharge Records</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if((config_item('enable_help_plan') == "No") && (config_item('enable_invoice') == "Yes")) { ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['invoice'] == "1") { ?>
            <li id= 'accounting' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-print"></i>
               <span class="title">Accounting & Invoice</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('accounting/invoices') ?>"
                        class="nav-link ">
                     <span class="title">Invoices</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('accounting/accounting') ?>"
                        class="nav-link ">
                     <span class="title">Summary Analysis</span>
                     </a>
                  </li>
                  <li class="nav-item" style="display: none;">
                     <a href="<?php echo site_url('accounting/purchase') ?>"
                        class="nav-link ">
                     <span class="title">Purchases</span>
                     </a>
                  </li>
                  <li class="nav-item" style="display: none;">
                     <a href="<?php echo site_url('accounting/transactionlogs') ?>"
                        class="nav-link ">
                     <span class="title">Transaction Logs</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php }
               } ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['expense'] == "1") { ?>
            <li id='expenses' class="nav-item" style="display: none;">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-usd"></i>
               <span class="title">Manage Expenses</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/expense') ?>"
                        class="nav-link ">
                     <span class="title">Manage Expenses</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <?php if (!isset($this->session->designation) || $this->session->designation['support'] == "1") { ?>
            <li id = 'support' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-envelope"></i>
               <span class="title">Support Tickets</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('ticket/admin_ticket') ?>"
                        class="nav-link ">
                     <span class="title">Raise Tickets</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('ticket/unsolved') ?>"
                        class="nav-link ">
                     <span class="title">Unsolved Tickets</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('ticket/resolved') ?>"
                        class="nav-link ">
                     <span class="title">Resolved Tickets</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <li id='documents' class="nav-item" style="display: none;">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-envelope"></i>
               <span class="title">Documents</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a target='_blank' href="<?php echo base_url();?>uploads/legal/placeholder.png"
                        class="nav-link">
                     <span class="title">Sample</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php if (!isset($this->session->designation)) {?>
            <li id = 'proilesetting' class="nav-item">
               <a href="#" class="nav-link nav-toggle">
               <i class="fa fa-cog"></i>
               <span class="title">My Profile & Setting</span>
               <span class="arrow"></span>
               </a>
               <ul class="sub-menu">
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/profile') ?>"
                        class="nav-link ">
                     <span class="title">My Profile</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?php echo site_url('admin/settings') ?>"
                        class="nav-link ">
                     <span class="title">Setting & Password</span>
                     </a>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <li class="heading">
               <h3 class="uppercase">Important Tools</h3>
            </li>
            <?php if (!isset($this->session->designation)) { ?>
            <!--
               <li class="nav-item document">
                   <a target="_blank" href="<?php echo site_url('site/documentation') ?>"
                      class="nav-link ">
                       <i class="fa fa-book"></i>
                       <span class="title">Documentations</span>
                   </a>
               </li -->
            <li id = 'exportimport' class="nav-item" style="display: none;">
               <a href="<?php echo site_url('setting/export') ?>"
                  class="nav-link ">
               <i class="fa fa-database"></i>
               <span class="title">Export & Import</span>
               </a>
            </li>
            <li id = 'marketingtools' class="nav-item" style="display: none;">
               <a href="<?php echo site_url('setting/marketing') ?>"
                  class="nav-link ">
               <i class="fa fa-life-ring"></i>
               <span class="title">Marketing Tools</span>
               </a>
            </li>
            <?php } ?>
            <li class="nav-item">
               <a href="<?php echo site_url('admin/logout') ?>"
                  class="nav-link ">
               <i class="fa fa-power-off"></i>
               <span class="title">Logout</span>
               </a>
            </li>
         </ul>
      </div>
   </div>
</div>