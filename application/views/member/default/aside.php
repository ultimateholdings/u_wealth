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
      <li class="member">
          <a href="<?php echo base_url('member') ?>">Hi, <?php echo $member_data['member']->name ?><br/>(
              My ID
              : <?php echo config_item('ID_EXT') . $member_data['member']->id ?>)
          </a>
      </li>
      <li class="active" >
          <a href="<?php echo site_url('member') ?>"><i class="fa fa-home"></i><span>Dashboard</span></a>
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

      <?php if (config_item('enable_cashback') == "Yes") { ?>
          <li id='Purchase'>
            <a href="#"><i class="fa fa-xing-square"></i><span>My Cashback</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
                <li><a href="<?php echo site_url('member/upload_receipt') ?>"><span>Upload Receipt</span></a></li>
                <li><a href="<?php echo site_url('member/receipt_history') ?>"><span>Receipt History</span></a></li>
            </ul>
          </li>
      <?php } ?> 
      
      <?php if (config_item('enable_epin')=="Yes") { ?>
          <li id='epins'>
            <a href="#"><i class="fa fa-xing-square"></i><span>My e-PINs</span><i class="fa fa-angle-right pull-right"></i></a>
            <ul class="nav nav-sub">
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
          <li id='earnings'>
              <a href=""><i class="fa fa-money"></i><span>My Earnings</span><i
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
      <li id='deposit'>
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

      <?php 
         if (config_item('enable_live_meeting') == "Yes") { ?> 
      <li id='meetings' class="nav-item">
         <a href=""><i class="fa fa-video-camera"></i><span>Zoom Meetings</span><i
                          class="fa fa-angle-right pull-right"></i></a>
         <ul class="nav nav-sub">
           <li>
             <a href="<?php echo site_url('member/manage_meetings') ?>"
                class="nav-link ">
             <span class="title">My meetings</span>
             </a>
          </li>
          <li>
             <a href="<?php echo site_url('member/upcomming_meetings') ?>"
                class="nav-link ">
             <span class="title">Upcoming meetings</span>
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
          <a href=""><i class="fa fa-sticky-note"></i><span>Reports</span><i
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
              <!--<li><a href="<?php echo site_url('tree/alldownline') ?>"><span>All Downline List</span></a>-->
              <li><a href="<?php echo site_url('tree/directlist') ?>"><span>Direct Referrer List</span></a>
              </li>
              <li class="nav-item">
                  <a target="_blank" href="<?php echo site_url('site/register/A/' . $this->session->user_id) ?>" class="nav-link">
                  <span class="title">Add Member</span>
                 </a>
              </li>
              <?php if(config_item('Holding_tank')=='Yes') { ?>
              <li><a href="<?php echo site_url('tree/holdinglist') ?>"><span>Holding List</span></a></li>
              <?php } ?>
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
      <?php if (config_item('enable_repurchase')=="Yes" || (config_item('enable_ecom')=="Yes")) { ?>
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
                  <?php if (config_item('ecomm_theme')=='gmart'){ ?>
                  <li>
                    <a href="<?=config_item('store_url')?>">
                      <span>
                        <form id="login_form" action="<?=config_item('store_url');?>/site/login" method="post">
                          
                          <input type="hidden" name="email" value="<?php echo $this->session->email;  ?>">
                          <input type="hidden" name="password" value="<?php echo $pwd->user_password;  ?>">
                          <button type="submit" class="btn btn-secondary" style="margin-top: 8px; background-color: transparent;border:none;"> 
                            <strong>New Purchase</strong>
                          </button>
                        </form>
                      </span>
                    </a>
                  </li>
                  <?php }else{ ?>
                    <li><a href="<?php echo site_url('cart/new-purchase') ?>"><span>New Purchase</span></a></li>
                  <?php } ?>
                  <?php } ?>
                  <?php if (config_item('ecomm_theme')!='gmart'){ ?>
                  <li><a href="<?php echo site_url('cart/old-purchase') ?>"><span>Old Purchases</span></a></li>
                  <li><a href="<?php echo site_url('member/shipping-address') ?>"><span>Update Shipping Address</span></a></li>
                  <li><a href="<?php echo site_url('member/billing-address') ?>"><span>Update Billing Address</span></a></li>
                  <?php } ?>

                  <!--<li><a href="<?php echo site_url('cart/invoices') ?>" ><span>View Invoices</span></a></li>
                  <li><a href="<?php echo site_url('cart/pre-checkout') ?>"><span>My Cart</span></a></li>-->
              </ul>
          </li>
      <?php } ?>
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