<!-- BEGIN: Main Menu--> 
<!-- main menu-->
<?php if(config_item('stack_theme_id')=='1'){ ?> 
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
<?php } elseif(config_item('stack_theme_id')=='2'){ ?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
<?php } elseif(config_item('stack_theme_id')=='3'){ ?>
<div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
<?php } elseif(config_item('stack_theme_id')=='4'){ ?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
<?php } elseif(config_item('stack_theme_id')=='5'){ ?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
<?php } else { ?>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow menu-border">
<?php } ?>
   <!-- main menu header-->
   <!-- include includes/menu-header-->
   <!-- / main menu header-->
   <!-- main menu content--> 
   <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <br/>
               <li class="navigation navigation-header badge"><span>Hi, <?php echo $this->session->name ?>&nbsp;<div class="avatar avatar-online"><img src="<?php echo base_url();?>axxets/stack/images/portrait/small/avatar-s-1.png" alt="avatar"></div></span><br/>
                  My ID
                  : <?php echo config_item('ID_EXT') . $this->session->user_id ?>
                  <i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i> 
                  </li>
               <br/>
               <li class="nav-item active"><a href="<?php echo base_url('member'); ?>"><i class="fa fa-tachometer"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
               </li>
               <li class="nav-item" id='wletter'>
                   <a href="<?php echo site_url('member/welcome-letter') ?>"><i
                               class="fa fa-file-text-o"></i><span> Welcome Letter</span></a>
               </li>
               <?php if((config_item('enable_help_plan')!=="Yes") && (config_item('enable_invoice') == "Yes")) { ?>
                   <li class="nav-item" id='invoice'>
                       <a href="<?php echo site_url('member/my-invoices') ?>"><i
                                   class="fa fa-print"></i><span> My Invoices</span></a>
                   </li>
               <?php } ?>
               <?php if (config_item('enable_epin')=="Yes") { ?>
                   <li class="nav-item" id='epins'>
                     <a href="#"><i class="fa fa-xing-square"></i><span>My e-PINs</span></a>
                     <ul class="submenu">
                         <li><a href="<?php echo site_url('member/unused-epin') ?>"><span>Un-Used e-PINs</span></a></li>
                         <li><a href="<?php echo site_url('member/used-epin') ?>"><span>Used e-PINs</span></a></li>
                         <li><a href="<?php echo site_url('member/transfer-epin') ?>"><span>Transfer e-PIN</span></a></li>
                         <?php if($member_data['payout']->user_epin == 'Yes') { ?>
                         <li><a href="<?php echo site_url('member/generate-epin') ?>"><span>Generate e-PIN</span></a></li>
                         <?php } ?>
                     </ul>
                   </li>
               <?php } ?>
               <?php if (config_item('enable_news')=="Yes") { ?>
                   <li id='news' style="display: none;">
                       <a href="<?php echo site_url('member/news') ?>"><i
                                   class="fa fa-xing-square"></i><span>News Announcements</span><i
                                   class="fa fa-angle-right pull-right"></i></a>
                   </li>
               <?php } ?>
               <?php if (config_item('enable_help_plan')!=="Yes") { ?>
                   <li id='earnings' class="nav-item">
                       <a href="#"><i class="fa fa-money"></i><span>My Earnings</span></a>
                       <ul class=" submenu">
                           <li><a href="<?php echo site_url('member/view-earning') ?>"><span>My Earnings</span></a>
                           </li>
                           <li><a href="<?php echo site_url('member/view-deductions') ?>"><span>My Deductions</span></a>
                           </li>
                           <li><a href="<?php echo site_url('member/search-earning') ?>"><span>Search Earnings</span></a>
                           </li>
                           <?php if (config_item('enable_reward')=="Yes") { ?>
                               <li><a href="<?php echo site_url('member/my-rewards') ?>"><span>My Rewards</span></a></li>
                           <?php } ?>
                           <?php if(config_item('enable_pv')=='Yes') { ?>
                               <li><a href="<?php echo site_url('member/view-pv') ?>"><span>My PV</span></a></li>
                           <?php } ?>
                       </ul>
                   </li>
               <?php } ?>
               <li id='deposit' class="nav-item">
                       <a href="#"><i class="fa fa-university"></i><span>Deposit</span></i></a>
                       <ul class="submenu">
                           <?php if(config_item('enable_epin') == "Yes") { ?>
                           <li id='epin_deposit'><a href="<?php echo site_url('member/epin_deposit') ?>"><span>Epin Deposit</span></a>
                           </li>
                           <?php } ?>
                           <?php if(config_item('enable_bank_deposit') == "Yes") { ?>
                           <li id='bank_deposit'><a href="<?php echo site_url('member/bank_deposit') ?>"><span>Bank Deposit</span></a>
                           </li>
                           <?php } ?>
                           <?php if(config_item('enable_pg')=="Yes"){?>
                           <li id='online_deposit'><a href="<?php echo site_url('member/online_deposit') ?>"><span>Online Deposit</span></a>
                           </li>
                           <?php } ?>
                           <li id='online_transactions'>
                           <a href="<?php echo site_url('member/online_transactions') ?>"><span>Deposit History</span></a>
                           </li>
                           <?php if(config_item('crowdfund_type')=="Manual_Peer_to_Peer"){?>
                           <li id='approve_deposit'><a href="<?php echo site_url('member/approve_deposit') ?>"><span>Approve Deposit</span></a>
                           </li>
                           <li id='confirmed_deposit'><a href="<?php echo site_url('member/confirmed_deposit') ?>"><span>Confirmed Deposits</span></a>
                           </li>
                           <?php } ?>
                       </ul>
               </li>

               <?php 
                 if (config_item('enable_live_meeting') == "Yes") { ?> 
                  <li id='meetings' class="nav-item">
                     <a href=""><i class="fa fa-video-camera"></i><span>Zoom Meetings</span></a>
                     <ul class="nav nav-sub">
                       <li>
                         <a href="<?php echo site_url('member/manage_meetings') ?>"
                            class="nav-link ">
                         <span class="title">My Meetings</span>
                         </a>
                      </li>
                      <li>
                         <a href="<?php echo site_url('member/upcomming_meetings') ?>"
                            class="nav-link ">
                         <span class="title">Upcoming Meetings</span>
                         </a>
                      </li>
                      <li>
                         <a href="<?php echo site_url('member/meetingdeatils') ?>"
                            class="nav-link ">
                         <span class="title">Live Meeting Settings</span>
                         </a>
                      </li>
                   
                     </ul>
                  </li>
              <?php } ?>
              
               <?php if(($member_data['payout']->user_withdraw=="Yes")||($member_data['payout']->fund_transfer=="Yes")) { ?>
                <li id='withdraw' class="nav-item">
                       <a href="#"><i class="fa fa-money"></i><span>Withdraw</span></a>
                       <ul class="submenu">
                         <?php if($member_data['payout']->user_withdraw=="Yes") { ?>
                           <li>
                               <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"><span>Withdraw Payouts</span></a>
                           </li>
                         <?php } if($member_data['payout']->fund_transfer=="Yes"){ ?>
                           <li><a href="<?php echo site_url('wallet/transfer-balance') ?>"><span>Transfer Fund</span></a>
                           </li>
                         <?php } ?>
                       </ul>
               </li>
             <?php } ?>
               <?php if(config_item('crowdfund_type') != "Manual_Peer_to_Peer") { ?>
               <li id='reports' class="nav-item">
                   <a href="#"><i class="fa fa-sticky-note"></i><span>Reports</span></i></a>
                   <ul class="submenu">
                       <li>
                           <a href="<?php echo site_url('wallet/balance-transfer-list') ?>"><span>Wallet Transaction</span></a>
                       </li>
                       <li>
                           <a href="<?php echo site_url('wallet/withdrawal-list') ?>"><span>Payout Report</span></a>
                       </li>
                       <li>
                           <a href="<?php echo site_url('member/tax_report') ?>"><span>Tax Report</span></a>
                       </li>
                   </ul>
               </li>
               <?php } ?>
               <li id="tree" class="nav-item">
                   <a href="#"><i class="fa fa-sitemap"></i><span>Tree & Downline</span>
                     </a>
                   <ul class="submenu">
                       <!--<li><a href="<?php echo site_url('tree/genealogy') ?>"><span>My Genealogy</span></a></li>-->
                       <?php if(config_item('diable_tree') != 'Yes') { ?>
                       <li><a href="<?php echo site_url('tree/my-tree') ?>"><span>My Downline Tree</span></a></li>
                       <?php } ?>
                       <!--<li><a href="<?php echo site_url('tree/alldownline') ?>"><span>All Downline List</span></a>-->
                       <li><a href="<?php echo site_url('tree/directlist') ?>"><span>Direct Referrer List</span></a>
                       </li>
                       <li class="nav-item">
                           <a target="_blank" href="<?php echo site_url('site/register/A/' . $this->session->user_id) ?>" class="nav-link">
                           <span class="title">Add Member</span>
                          </a>
                       </li>
                   </ul>
               </li>
               <?php if (config_item('enable_help_plan')=="Yes") { ?>
                   <li id='donations' class="nav-item">
                       <a href="#"><i class="fa fa-gift"></i><span>My Donations</span></i></a>
                       <ul class="submenu">
                           <li><a href="<?php echo site_url('donation/sent-donation') ?>"><span>Sent History</span></a>
                           </li>
                           <li><a href="<?php echo site_url('donation/received-donation') ?>"><span>Received History</span></a>
                           </li>
                       </ul>
                   </li>   
               <?php } ?>
               <?php if (config_item('enable_repurchase')=="Yes" || (config_item('enable_ecom')=="Yes")) { ?>
                   <li id='cart' class="nav-item">
                       <a href="#"><i
                                   class="fa fa-shopping-cart"></i><span>My Purchases</span></i></a>
                       <ul class="submenu">
                           <?php if (config_item('enable_ecom')=="Yes") { ?>
                           <li><a target="_blank" href="<?php echo base_url('emart');?>"><span>New Purchase</span></a></li>
                           <?php } else if(config_item('enable_insurance')=="Yes") { ?>
                           <li><a href="<?php echo site_url('/') ?>"><span>New Purchase</span></a></li>
                           <?php }
                           else { ?>
                           <li><a href="<?php echo site_url('cart/new-purchase') ?>"><span>New Purchase</span></a></li>
                           <?php } ?>
                           <li><a href="<?php echo site_url('cart/old-purchase') ?>"><span>Old Purchases</span></a></li>
                           <li><a href="<?php echo site_url('member/shipping-address') ?>"><span>Update Shipping Address</span></a></li>
                           <li><a href="<?php echo site_url('member/billing-address') ?>"><span>Update Billing Address</span></a></li>

                           <!--<li><a href="<?php echo site_url('cart/invoices') ?>" ><span>View Invoices</span></a></li>
                           <li><a href="<?php echo site_url('cart/pre-checkout') ?>"><span>My Cart</span></a></li>-->
                       </ul>
                   </li>
               <?php } ?>
               <?php if (config_item('enable_recharge')=="Yes") { ?>
                   <li id='recharge' class="nav-item">
                       <a href="#"><i
                                   class="fa fa-mobile-phone"></i><span>Recharge Zone</span></a>
                       <ul class="submenu" >
                           <li><a href="<?php echo site_url('site/recharge') ?>"><span>New Recharge</span></a></li>
                           <li><a href="<?php echo site_url('recharge/old-recharges') ?>"><span>Old Recharges</span></a>
                           </li>
                       </ul>
                   </li>
               <?php } ?>

               <?php if (config_item('enable_coupon')=="Yes") { ?>
                   <li id='coupons' class="nav-item">
                       <a href="#"><i
                                   class="fa fa-code"></i><span>My Coupons</span></a>
                       <ul class="nav nav-sub submenu">
                           <li><a href="<?php echo site_url('coupon/unused') ?>"><span>Un Used Coupons</span></a></li>
                           <li><a href="<?php echo site_url('coupon/used') ?>"><span>Used Coupons</span></a></li>
                       </ul>
                   </li>
               <?php } ?>
               <?php if (config_item('enable_ad_incm')=="Yes") { ?>
                   <li id='advertisements' class="nav-item">
                       <a href="#"><i
                                   class="fa fa-bullhorn"></i><span>Advertisements</span></a>
                       <ul class="submenu">
                           <li><a href="<?php echo site_url('ads/myads') ?>"><span>My Ads</span></a></li>
                       </ul>
                   </li>
               <?php } ?>
               <?php if (config_item('enable_investment')=="Yes") { ?>
                   <li id='investments' class="nav-item">
                       <a href="#"><i
                                   class="fa fa-bitcoin"></i><span>My Investments</span></a>
                       <ul class="submenu">
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
               <li id='support' class="nav-item">
                   <a href="#"><i class="fa fa-question"></i><span>My Support</span></a>
                   <ul class="submenu">
                       <li><a href="<?php echo site_url('ticket/new-ticket') ?>"><span>New Support Request</span></a></li>
                       <li><a href="<?php echo site_url('ticket/old-Supports') ?>"><span>List Tickets</span></a></li>
                   </ul>
               </li>
               <li id='documents' style="display: none;">
                   <a href="#"><i class="fa fa-question"></i><span>Documents</span>
                       <i class="fa fa-angle-right pull-right"></i></a>
                   <ul class="nav nav-sub">
                       <li><a target='_blank' href="<?php echo base_url();?>uploads/legal/placeholder.png"><span>Sample</span></a></li>
                   </ul>
               </li>
               <li id='proilesetting' class="nav-item">
                   <a href="#"><i class=" fa fa-cog" aria-hidden="true"></i><span>My Profile & Setting</span></a>
                   <ul class="submenu">
                       <li><a href="<?php echo site_url('member/profile') ?>"><span>My Profile</span></a></li>
                       <?php if(config_item('enable_kyc')=='Yes'){ ?>
                       <li><a href="<?php echo site_url('member/kyc') ?>"><span>KYC</span></a></li>
                       <?php } ?>
                       <li id='bankdetails'><a href="<?php echo site_url('member/bankdetails') ?>"><span>Financial details</span></a></li>
                       <li id='settings'><a href="<?php echo site_url('member/settings') ?>"><span>Setting & Password</span></a></li>
                   </ul>
               </li>
               <li><a href="<?php echo site_url('member/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
               </li>
      </ul>
   </div>
   <!-- /main menu content-->
   <!-- main menu footer-->
   <!-- include includes/menu-footer-->
   <!-- main menu footer-->
</div>
<!-- / main menu-->
<!-- END: Main Menu--> 