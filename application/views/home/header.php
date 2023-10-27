<div class="header-bottom" style="margin-top: 3px; margin-bottom: 3px;">
	<div class="container">
	<div class="navbar navbar-expand-md navbar-light">
     <a class="navbar-brand mr-auto" href="#">
         <img class="img-fluid" src="<?php echo base_url();?>axxets/client/logo_dark.png" style="width: 200px;">
     </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
         <span  class="navbar-toggler-icon"></span>
      </button>
	   <div class="collapse navbar-collapse" id="collapse_Navbar">
	    <ul class="navbar-nav">
	        <li class="nav-item"><a class="nav-link" href="<?php echo site_url('HomeApp')?>">DASHBOARD&nbsp;</a></li>
	        <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		       WALLET &nbsp;
		      </a>
		      <div class="dropdown-menu">
		      	<?php if(config_item('free_registration')=='Yes') { ?>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/topupassociate')?>">Top-Up</a>
		    	<?php } ?>
		        <?php if(config_item('user_withdraw') == 'Yes') { ?>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/transfer')?>">Transfer</a>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/withdraw_payouts')?>">Withdraw Payouts</a>
		    	<?php } ?>
		    	<a class="dropdown-item" href="<?php echo site_url('HomeApp/wallet/wallet_history')?>">Wallet Transactions</a>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/withdraw_status')?>">Withdrawal Status</a>
		      </div>
	    	</li>
	        <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		       INCOME&nbsp; 
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/income/referral_income')?>">Referral Income</a>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/income/level_income')?>">Level Income</a>
		        <?php if(config_item('roi_income') == 'Yes') { ?>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/income/roi_income')?>">ROI Income</a>
		        <?php } else if(config_item('ideal_plan')=='Yes') { ?> 
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/income/nonworking_income')?>">Nonworking Income</a>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/income/royalty_income')?>">Royalty Income</a>
		    	<?php } ?>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/income/total_income')?>">Total Income</a>
		      </div>
	    	</li>
	     	<li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		       MY TEAM &nbsp;
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/team/active_donors')?>">Active Direct Referrals</a>
		        <?php if(config_item('free_registration')=='Yes') { ?>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/team/pending_donors')?>">Pending Direct Donars</a>
		    	<?php } ?>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/team/genealogy')?>">Team Genealogy</a>
		        <a class="dropdown-item" target="_blank" href="<?php echo site_url('site/register/A/' . $this->session->user_id) ?>" style="font-weight: bold;">Register New Member</a>
		      </div>
	    	</li>
	    	<li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		       MY Info &nbsp;
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/edit_profile')?>">Edit Profile</a>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/change_loginpassword')?>">Change Login Password</a>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/change_trasactionpassword')?>">Change Transaction Password</a>
		      </div>
	    	</li>      
	        <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		       Support &nbsp;
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/send_message')?>">New Message</a>
		        <a class="dropdown-item" href="<?php echo site_url('HomeApp/support/view_message')?>">View Message</a>
		      </div>
	    	</li>
	   		<li class="nav-item"><a class="nav-link" href="<?php echo site_url('HomeApp/logout') ?>">LOGOUT&nbsp;</a></li>    
	    </ul>
	   </div>
	</div>
	</div>
</div>