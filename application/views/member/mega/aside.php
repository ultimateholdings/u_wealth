<!-- sidebar-->
<section class="sidebar">
  
  <!-- sidebar menu-->
  <ul class="sidebar-menu" data-widget="tree" id="NavMenu">
    <li class="header nav-large-cap" style="color: #fff;font-size: 14px;">
        <br/><br/>Hi, <?php echo $member_data['member']->name ?><br/>(
              User ID
              : <?php echo config_item('ID_EXT') . $member_data['member']->id ?>)
          <br/><br/>
    </li>

    <li class="active">
      <a href="<?php echo site_url('member'); ?>">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li>
      <a href="<?php echo site_url('member/welcome-letter'); ?>">
        <i class="fa fa-file-text-o"></i>
        <span>Welcome Letter</span>
      </a>
    </li>
    <?php if((config_item('enable_help_plan')!=="Yes") && (config_item('enable_invoice') == "Yes")) { ?>
      <li>
      <a href="<?php echo site_url('member/my-invoices'); ?>">
        <i class="fa fa-print"></i>
        <span>My Invoices</span>
      </a>
    </li>
    <?php } ?>
    <?php if(config_item('enable_epin') == "Yes") { ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-xing-square"></i>
        <span>My Epins</span>
        <span class="pull-right-container">
          <i class="fa fa-caret-down pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu"> 
        <li><a href="<?php echo site_url('member/unused-epin'); ?>"><i class="fa fa-check"></i>Un-Used Epins</a></li>
        <li><a href="<?php echo site_url('member/used-epin'); ?>"><i class="fa fa-diamond"></i>Used Epins</a></li>
        <li><a href="<?php echo site_url('member/transfer-epin'); ?>"><i class="fa fa-exchange"></i>Transfer Epins</a></li>
        <?php if($member_data['payout']->user_epin == 'Yes') { ?>
          <li><a href="<?php echo site_url('member/generate-epin'); ?>"><i class="fa fa-plus"></i>Generate Epins</a></li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-money"></i>
        <span>My Earnings</span>
        <span class="pull-right-container">
          <i class="fa fa-caret-down pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu"> 
        <li><a href="<?php echo site_url('member/view-earning'); ?>"><i class="fa fa-money"></i>View Earnings</a></li>
        <li><a href="<?php echo site_url('member/view-deductions'); ?>"><i class="<?php echo config_item('cur'); ?>"></i>View Deductions</a></li>
        <li><a href="<?php echo site_url('member/search-earning'); ?>"><i class="fa fa-diamond"></i>Search Earnings</a></li>
        <?php if (config_item('enable_reward')=="Yes") { ?>
        <li><a href="<?php echo site_url('member/my-rewards'); ?>"><i class="fa fa-trophy"></i><span>My Rewards<span></a></li>
        <?php } ?>
        <?php if(config_item('enable_pv')=='Yes') { ?>
            <li><a href="<?php echo site_url('member/view-pv') ?>"><i class="fa fa-circle-thin"></i><span>My PV</span></a></li>
        <?php } ?>
      </ul>
    </li>
    <?php if(config_item('enable_crm') == "Yes") { ?>
      <?php if($this->session->user_id !=1001) { ?>  
       <li id="crmstatus" class="treeview">
            <a href="#">
            <i class="fa fa-briefcase"></i>
            <span class="title">CRM Status</span>
            <span class="pull-right-container">
          <i class="fa fa-caret-down pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
               <li>
                  <a href="<?php echo site_url('member/crm_status') ?>"> 
                    <i class="fa fa-sticky-note"></i>
                  <span class="title">CRM Status</span>
                  </a>
               </li>
               
            </ul>
         </li>
         <?php } ?>
            <li id="crm" class="treeview">
            <a href="#">
            <i class="fa fa-briefcase"></i>
            <span class="title">CRM</span>
            <span class="pull-right-container">
          <i class="fa fa-caret-down pull-right"></i>
        </span>
            </a>
            <ul class="treeview-menu">
               <li>
                  <a href="<?php echo site_url('member/manage_crm') ?>"> 
                    <i class="fa fa-sticky-note"></i>
                  <span class="title">Manage</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo site_url('member/approved_crm') ?>">
                    <i class="fa fa-sticky-note"></i>
                  <span class="title">Approved List</span>
                  </a>
               </li>
                <li>
                  <a href="<?php echo site_url('member/rejected_crm') ?>">
                    <i class="fa fa-sticky-note"></i>
                  <span class="title">Rejected List</span>
                  </a>
               </li>
            </ul>
         </li>
          <?php } ?>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-university"></i>
        <span>Deposits</span>
        <span class="pull-right-container">
          <i class="fa fa-caret-down pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <?php if(config_item('enable_epin') == "Yes") { ?>
        <li><a href="<?php echo site_url('member/epin_deposit') ?>"><i class="fa fa-money"></i><span>Epin Deposit</span></a>
        </li>
        <?php } ?>
        <?php if(config_item('enable_bank_deposit') == "Yes") { ?>
        <li><a href="<?php echo site_url('member/bank_deposit') ?>"><i class="<?php echo config_item('cur'); ?>"></i><span>Bank Deposit</span></a>
        </li>
        <?php } ?>
        <?php if(config_item('enable_pg')=="Yes"){?>
        <li><a href="<?php echo site_url('member/online_deposit') ?>"><i class="fa fa-btc"></i><span>Online Deposit</span></a>
        </li>
       <?php } ?>
        <li id='online_transactions'>
        <a href="<?php echo site_url('member/online_transactions') ?>"><i class="fa fa-cc-amex"></i><span>Deposit History</span></a>
        </li>
        <?php if(config_item('crowdfund_type')=="Manual_Peer_to_Peer"){?>
            <li id='approve_deposit'><a href="<?php echo site_url('member/approve_deposit') ?>"><i class="<?php echo config_item('cur'); ?>"></i><span>Approve Deposit</span></a>
            </li>
            <li id='confirmed_deposit'><a href="<?php echo site_url('member/confirmed_deposit') ?>"><i class="<?php echo config_item('cur'); ?>"></i><span>Confirmed Deposits</span></a>
            </li>
        <?php } ?> 
      </ul>
    </li>

    <?php 
         if (config_item('enable_live_meeting') == "Yes") { ?> 

      <li class="treeview">
        <a href="#">
          <i class="fa fa-video-camera"></i>
          <span>Zoom Meetings</span>
          <span class="pull-right-container">
            <i class="fa fa-caret-down pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          
              <li><a href="<?php echo site_url('member/manage_meetings') ?>"><i class="fa fa-diamond"></i><span>My Meetings</span></a>
              </li>
          
              <li><a href="<?php echo site_url('member/upcomming_meetings') ?>"><i class="<?php echo config_item('cur'); ?>"></i><span>Upcoming Meetings</span></a>
              </li>

              <li><a href="<?php echo site_url('member/meetingdeatils') ?>"><i class="<?php echo config_item('cur'); ?>"></i><span>Live Meeting Settings</span></a>
              </li>

          
        </ul>
      </li>
      <?php } ?>
    
    <?php if(($member_data['payout']->user_withdraw=="Yes")||($member_data['payout']->fund_transfer=="Yes")) { ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-money"></i>
          <span>Withdraw</span>
          <span class="pull-right-container">
            <i class="fa fa-caret-down pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if($member_data['payout']->user_withdraw=="Yes") { ?>
              <li><a href="<?php echo site_url('wallet/withdraw-payouts') ?>"><i class="fa fa-diamond"></i><span>Withdraw Payouts</span></a>
            </li>
          <?php } if($member_data['payout']->fund_transfer=="Yes"){ ?>
              <li><a href="<?php echo site_url('wallet/transfer-balance') ?>"><i class="<?php echo config_item('cur'); ?>"></i><span>Transfer Fund</span></a>
              </li>
          <?php } ?>
        </ul>
      </li>
    <?php } ?>
    <?php if(config_item('crowdfund_type') != "Manual_Peer_to_Peer") { ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-sticky-note"></i>
          <span>Reports</span>
          <span class="pull-right-container">
            <i class="fa fa-caret-down pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo site_url('wallet/balance-transfer-list') ?>"><i class="fa fa-cc-amex"></i><span>Wallet Transaction</span></a></li>
          <li><a href="<?php echo site_url('wallet/withdrawal-list') ?>"><i class="fa fa-diamond"></i><span>Payout Report</span></a></li>
          <li><a href="<?php echo site_url('member/tax_report') ?>"><i class="fa fa-calculator"></i><span>Tax Report</span></a></li>
          </li>
        </ul>
    </li>
  <?php } ?>
    <li class="treeview">
        <a href="#">
          <i class="fa fa-sitemap"></i>
          <span>Tree & Downline</span>
          <span class="pull-right-container">
            <i class="fa fa-caret-down pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if(config_item('diable_tree') != 'Yes') { ?>
              <li><a href="<?php echo site_url('tree/my-tree') ?>"><i class="fa fa-tree"></i><span>My Downline Tree</span></a></li>
              <?php } ?>
          <li><a href="<?php echo site_url('tree/directlist') ?>"><i class="fa fa-diamond"></i><span>Direct Referrer List</span></a>
              </li>
          <li><a target="_blank" href="<?php echo site_url('site/register/A/' . $this->session->user_id) ?>"><i class="fa fa-user-plus"></i><span>Add Member</span></a></li>
        </ul>
    </li>

    <?php if (config_item('enable_repurchase')=="Yes" || (config_item('enable_ecom')=="Yes")) { ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-cart"></i>
          <span>My Purchases</span>
          <span class="pull-right-container">
            <i class="fa fa-caret-down pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if (config_item('enable_ecom')=="Yes") { ?>
          <li><a target="_blank" href="<?php echo base_url('emart/shop');?>"><i class="fa fa-shopping-basket"></i><span>New Purchase</span></a></li>
          <?php } else { ?>
          <li><a href="<?php echo site_url('cart/new-purchase') ?>"><i class="fa fa-shopping-basket"></i><span>New Purchase</span></a></li>
          <?php } ?>
          <li><a href="<?php echo site_url('cart/old-purchase') ?>"><i class="fa fa-history"></i><span>Old Purchases</span></a></li>
          <li><a href="<?php echo site_url('member/shipping-address') ?>"><i class="fa fa-address-book-o"></i><span>Update Shipping Address</span></a></li>
          <li><a href="<?php echo site_url('member/billing-address') ?>"><i class="fa fa-address-book-o"></i><span>Update Billing Address</span></a></li>
        </ul>
    </li>
    <?php } ?>

    <?php if (config_item('enable_recharge')=="Yes") { ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-mobile-phone"></i>
          <span>Recharge Zone</span>
          <span class="pull-right-container">
            <i class="fa fa-caret-down pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo site_url('recharge/new-recharge') ?>"><i class="fa fa-credit-card"></i><span>New Recharge</span></a></li>
            <li><a href="<?php echo site_url('recharge/old-recharges') ?>"><i class="fa fa-history"></i><span>Old Recharges</span></a>
            </li>
        </ul>
      </li>
    <?php } ?>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-question"></i><span>My Support</span>
        <span class="pull-right-container">
          <i class="fa fa-caret-down pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo site_url('ticket/new-ticket') ?>"><i class="fa fa-support"></i><span>New Support Request</span></a></li>
        <li><a href="<?php echo site_url('ticket/old-Supports') ?>"><i class="fa fa-history"></i><span>List Tickets</span></a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class=" fa fa-cog"></i><span>My Profile & Setting</span></span>
        <span class="pull-right-container">
          <i class="fa fa-caret-down pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo site_url('member/profile') ?>"><i class="fa fa-user"></i><span>My Profile</span></a></li>
        <?php if(config_item('enable_kyc')=='Yes'){ ?>
        <li><a href="<?php echo site_url('member/kyc') ?>"><i class="fa fa-address-card-o"></i><span>KYC</span></a></li>
        <?php } ?>
        <li><a href="<?php echo site_url('member/bankdetails') ?>"><i class="fa fa-bank"></i><span>Financial details</span></a></li>
        <li><a href="<?php echo site_url('member/settings') ?>"><i class="fa fa-cog fa-fw"></i><span>Setting & Password</span></a></li>
      </ul>
    </li>

    <li>
      <a href="<?php echo site_url('member/logout') ?>">
        <i class="fa fa-sign-out"></i> 
        <span>Log Out</span>
        </a>
    </li>
      
  </ul>
  
</section>