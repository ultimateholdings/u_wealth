<aside id="aside" class="ui-aside">
  <ul class="nav" ui-nav> 
        <?php if (config_item('google_translator') == "Yes") { ?>
       <div id="google_translate_element"></div>
                  <script type="text/javascript">
                     function googleTranslateElementInit() {
                       new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                     }
                     </script>
                  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
        <?php } ?>            
       <div class="navbar-header text-center">
         <img src="<?php echo $member_data['member']->photo ? base_url('uploads/profile/' . $member_data['member']->photo) : site_url('uploads/site_img/person.jpeg'); ?>"
                 
          class="img-thumbnail img-fluid inline" width="50px"height="50px"style="max-height: 50px;max-width: 50px"><h4 class="inline">&nbsp;
          Hi, <div class="wavy1">
                <span style="--i:1;">
                  <?php echo $this->session->name ?>
                  </span>
                </div>
          </h4>
        </div>
      <li class="active" >
          <a href="<?php echo site_url('member') ?>"><i class="fa fa-home"></i><span class="title">Dashboard </span>
            </a>
      </li>
      <li id='wletter'>
          <a href="<?php echo site_url('member/welcome-letter') ?>"><i
                      class="fa fa-file-text-o"></i><span> Welcome Letter</span></a>
      </li>
      <?php if((config_item('enable_help_plan')!=="Yes") && (config_item('enable_invoice') == "Yes")) { ?>
          <li id='invoice'>
              <a href="<?php echo site_url('member/my-invoices') ?>"><i
                          class="fa fa-print"></i><span> My Invoices</span></a>
          </li>
      <?php } ?>
      
    
      <?php if (config_item('enable_epin')=="Yes") { ?>
          <!-- <li id='epins'>
            <a href="#"><i class="fa fa-xing-square"></i><span>My e-PINs</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
                <li><a href="<?php echo site_url('member/unused-epin') ?>"><span>Un-Used e-PINs</span></a></li>
                <li><a href="<?php echo site_url('member/used-epin') ?>"><span>Used e-PINs</span></a></li>
                <li><a href="<?php echo site_url('member/transfer-epin') ?>"><span>Transfer e-PIN</span></a></li>
                <?php if($member_data['payout']->user_epin == 'Yes') { ?>
                <li><a href="<?php echo site_url('member/generate-epin') ?>"><span>Generate e-PIN</span></a></li>
                <?php } ?>
            </ul>
          </li> -->
      <?php } ?>
      <?php if (config_item('enable_email')=="Yes") { ?>
                   <li id='email' class="nav-item">
                       <a href="#"><i class="fa fa-gift"></i><span>EMAIL</span></i></a>
                       <ul class="nav nav-sub">
                           <li><a href="<?php echo site_url('email') ?>"><span>Sent Email</span></a>
                           </li>
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
          <li id='earnings'>
              <a href=""><i class="fa fa-money"></i><span>My Earnings   <div class="wavy">
                                <span style="--i:1;">G</span>
                                <span style="--i:2;">o</span>
                                <span style="--i:3;">t</span>
                                <span style="--i:4;"></span>
                                <span style="--i:5;">P</span>
                                <span style="--i:6;">o</span>
                                <span style="--i:7;">i</span>
                                <span style="--i:8;">n</span>
                                <span style="--i:9;">t</span>
                                <span style="--i:10;">s</span>
                                </div></span><i
                          class="fa fa-angle-right pull-right"></i></a>
              <ul class="nav nav-sub">
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

      

      <?php if (config_item('enable_voucher')=="Yes") { ?>
          <li id='voucher'>
            <a href="#"><i class="fa fa-xing-square"></i><span>My Voucher</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
                
                <li><a href="<?php echo site_url('member/transfer-voucher') ?>"><span>Transfer Voucher</span></a></li>
                <li><a href="<?php echo site_url('member/received-voucher') ?>"><span>Received Voucher</span></a></li>
                
            </ul>
          </li>
      <?php } ?>

      <?php if (config_item('enable_voucher')=="Yes") { ?>
          <li id='claim_voucher'>
            <a href="#"><i class="fa fa-xing-square"></i><span>My Rewards</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
                
                <li><a href="<?php echo site_url('member/voucher_rewards') ?>"><span>My Voucher Rewards</span></a></li>
                <li><a href="<?php echo site_url('member/claimed_voucher_rewards') ?>"><span>Claimed Rewards</span></a></li>
                
            </ul>
          </li>
      <?php } ?>

      <?php if (config_item('enable_voucher')=="Yes") { ?>
          <li id='my_ecommerce1'>
            <a href="#"><i class="fa fa-xing-square"></i><span>My E-Commerce</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
                
                <li><a href="<?php echo site_url('member/wallet_transactions') ?>"><span>My Wallet Transactions</span></a></li>
                <li><a href="<?php echo site_url('member/all_transactions') ?>"><span>My All Transations</span></a></li>
                
            </ul>
          </li>
      <?php } ?>
        <?php if (config_item('enable_crm')=="Yes") { ?>

            <?php if($this->session->user_id !=1001) { ?>  
         <li id='crmstatus'>
            <a href="#"><i class="fa fa-xing-square"></i><span>CRM Status</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
              <li><a href="<?php echo site_url('member/crm_status') ?>"><span>CRM Status</span></a></li>
                
                
            </ul>
          </li>
          <?php } ?>
          <li id='crm'>
            <a href="#"><i class="fa fa-xing-square"></i><span>CRM</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
              <li><a href="<?php echo site_url('member/manage_crm') ?>"><span>Manage</span></a></li>
                <li><a href="<?php echo site_url('member/approved_crm') ?>"><span>Approved List</span></a></li>
                <li><a href="<?php echo site_url('member/rejected_crm') ?>"><span>Rejected List</span></a></li>
                
            </ul>
          </li>
      <?php } ?>
      <!-- <li id='deposit'>
              <a href=""><i class="fa fa-university"></i><span>Deposit</span><i
                          class="fa fa-angle-right pull-right"></i></a>
              <ul class="nav nav-sub">
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
 -->
      <?php 
         if (config_item('enable_live_meeting') == "Yes") { ?> 
      <li id='meetings' class="nav-item">
         <a href=""><i class="fa fa-video-camera"></i><span>Zoom Meetings</span><i
                          class="fa fa-angle-right pull-right"></i></a>
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
       <li id='withdraw'>
              <a href=""><i class="fa fa-money"></i><span>Withdraw</span><i class="fa fa-angle-right pull-right"></i></a>
              <ul class="nav nav-sub">
                <?php if($member_data['payout']->user_withdraw=="Yes") { ?>
                  <li>
                      <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"><span>Withdraw Payouts</span></a>
                  </li>
                <?php } if($member_data['payout']->fund_transfer=="Yes"){ ?>
                  <li><a href="<?php echo site_url('wallet/transfer-balance') ?>"><span>Transfer Fund</span></a>
                  </li>
                <?php } ?>
                <li>
                  <a href="<?php echo site_url('wallet/wallet-transfer') ?>"><span>Wallet Transfer</span></a>
                </li>
              </ul>
      </li>
    <?php } ?>
      <?php if(config_item('crowdfund_type') != "Manual_Peer_to_Peer") { ?>
      <li id='reports'>
          <a href=""><i class="fa fa-sticky-note"></i><span>Reports   <div class="wavy">
                                <span style="--i:1;">N</span>
                                <span style="--i:2;">e</span>
                                <span style="--i:3;">w</span>
                          
                                </div></span><i
                      class="fa fa-angle-right pull-right"></i></a>
          <ul class="nav nav-sub">
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
      <li id="tree">
          <a href=""><i class="fa fa-sitemap"></i><span>Tree & Downline</span>
            <i class="fa fa-angle-right pull-right"></i></a>
          <ul class="nav nav-sub">
              <!--<li><a href="<?php echo site_url('tree/genealogy') ?>"><span>My Genealogy</span></a></li>-->
              <?php if(config_item('diable_tree') != 'Yes') { ?>
              <li><a href="<?php echo site_url('tree/my-tree') ?>"><span>My Downline Tree</span></a></li>
              <?php } ?>
              <li><a href="<?php echo site_url('tree/my-unilevel-tree') ?>"><span>My Unilevel Tree</span></a></li>
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
          <li id='donations'>
              <a href=""><i class="fa fa-gift"></i><span>My Donations</span><i class="fa fa-angle-right pull-right"></i></a>
              <ul class="nav nav-sub">
                  <li><a href="<?php echo site_url('donation/sent-donation') ?>"><span>Sent History</span></a>
                  </li>
                  <li><a href="<?php echo site_url('donation/received-donation') ?>"><span>Received History</span></a>
                  </li>
              </ul>
          </li>   
      <?php } ?>
      <?php if (config_item('enable_repurchase')=="Yes" || (config_item('enable_ecom')=="Yes")) { /*?>
          <li id='cart'>
              <a href=""><i
                          class="fa fa-shopping-cart"></i><span>My Purchases</span><i
                          class="fa fa-angle-right pull-right"></i></a>
              <ul class="nav nav-sub">
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
                  <?php */} ?>
      <?php if (config_item('enable_recharge')=="Yes") { ?>
          <li id='recharge'>
              <a href=""><i
                          class="fa fa-mobile-phone"></i><span>Recharge Zone</span><i
                          class="fa fa-angle-right pull-right"></i></a>
              <ul class="nav nav-sub">
                  <li><a href="<?php echo site_url('site/recharge') ?>"><span>New Recharge</span></a></li>
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
      <li id='my-accounts'>
          <a href=""><i class="fa fa-users"></i><span>My Accounts</span><i
                      class="fa fa-angle-right pull-right"></i></a>
          <ul class="nav nav-sub">
              <li><a href="<?php echo site_url('member/create_member') ?>"><span>Create New</span></a></li>
              <li><a href="<?php echo site_url('member/account_list') ?>"><span>All Accounts</span></a></li>
          </ul>
      </li>
      <li id='support'>
          <a href=""><i class="fa fa-question"></i><span>My Support</span><i
                      class="fa fa-angle-right pull-right"></i></a>
          <ul class="nav nav-sub">
              <li><a href="<?php echo site_url('ticket/new-ticket') ?>"><span>New Support Request</span></a></li>
              <li><a href="<?php echo site_url('ticket/old-Supports') ?>"><span>List Tickets</span></a></li>
          </ul>
      </li>
      <li id='documents' style="display: none;">
          <a href=""><i class="fa fa-question"></i><span>Documents</span>
              <i class="fa fa-angle-right pull-right"></i></a>
          <ul class="nav nav-sub">
              <li><a target='_blank' href="<?php echo base_url();?>uploads/legal/placeholder.png"><span>Sample</span></a></li>
          </ul>
      </li>
      <li id='proilesetting'>
          <a href=""><i class=" fa fa-cog" aria-hidden="true"></i><span>My Profile & Setting</span><i
                      class="fa fa-angle-right pull-right"></i></a>
          <ul class="nav nav-sub">
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
</aside>
