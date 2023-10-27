<?php
$member=$this->db_model->select_multi('*', 'member', array('id' => $this->session->user_id));
$payout      = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
$paid_payout = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Paid', 'userid' => $this->session->user_id));
if ($paid_payout == "") {
    $paid_payout = 0;
}
$pending_payout = $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Un-Paid', 'userid' => $this->session->user_id)) + $this->db_model->sum('amount', 'withdraw_request', array('status' => 'Hold', 'userid' => $this->session->user_id));
if ($pending_payout == "") {
    $pending_payout = 0;
}
$direct_team = $this->db_model->count_all('member', array('sponsor' => $this->session->user_id));
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title></title>
  <!-- all the meta tags -->
  <?php include 'metas.php'; ?>
  <!-- all the css files -->
  <?php include 'includes_top.php';?>

</head>
<body>  
      <!-- Topbar Start -->
  <?php include 'header.php'; ?>
  <?php
  echo validation_errors('<div class="alert alert-danger" align="center">', '</div>');
  echo $this->session->flashdata('common_flash'); ?>
	<div class="container frame">		
		<div class="col-xl-12 col-lg-12 home_1">
			<div class="row ">
				<div class="col-md-12 card-box22 inr">
	            <p>Welcome to <b><?php echo config_item('company_name'); ?></b><br>
	  				<b><span style="color:#FF0066;"><?php echo $member->name ?></span></b> your Donor ID is <b><?php echo config_item('IT_EXT') . $this->session->user_id ?></b></p>
            <?php if((config_item('ideal_plan') =='Yes') && ($this->db_model->select('rank', 'member', array('id' => $this->session->user_id)) != 'Diamond')) { ?>
            <?php $emerald_count = $this->db_model->count_all('member', array('sponsor' => $this->session->user_id, 'rank'=>'Emerald')); if($emerald_count >=2) { ?>
            <p> Congrats !! You are eligible for Diamond !! <a href="<?php echo site_url('HomeApp/upgrade_diamond'); ?>">Click here to Upgrade </a> <?php } else { ?>
            <p style="">Currently you are not eligible for Diamond Plan Upgrade.Congrats !! You are eligible for Diamond !! <a href="<?php echo site_url('HomeApp/upgrade_diamond'); ?>">Click here to Upgrade </a></p>
            <?php }} ?>      
	         </div>
	         <div class="col-md-4 col-xs-4">
	           	<p align="center">Status : <br>
	            	<strong><span style="color:#009900;"><?php echo $member->status; ?></span></strong>
	         	</p>
	         </div>	  
            <div class="col-md-4 col-xs-4">
               <p align="center"> Designation : <br>
						<strong><span style="color:#009933;"><?php echo $member->rank; ?></span></strong></p>
            </div>
            <div class="col-md-4 col-xs-4">
               <p align="center">Active Date : <br>
                  <strong><?php echo date('Y-m-d', strtotime($member->join_time)); ?></strong></p>
            </div>                           
    		</div>
      </div>
	<div class="row home_main_count">
      <div class="col-md-4 col-xs-6">
        	<div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Total Income</p>
               <h3 style="color:blue;" class="card-title">
                  <?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id));
                     if ($data == "") {
                         echo config_item('currency') . '0';
                     } else {
                         echo config_item('currency') . $data;
                     } ?>
                </h3>
            </div>
        	</div>
      </div>
    	<div class="col-md-4 col-xs-6">
        <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Current Balance</p>
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
         </div>
      </div>
    	<div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Referral Income</p>
               <h3 style="color:blue;" class="card-title">
              		<?php $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Referral Income')) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Direct Referral Commission'));
                     if ($data == "") {
                        echo config_item('currency') . '0';
                     } else {
                        echo config_item('currency') . $data;
                     } ?>
               </h3>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Level Income</p>
               <h3 class="card-title">
              <?php $admin = $this->db_model->select('id', 'member', array('secret' => '1'));
              $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Joining Purchase Commission')) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Level Completion Income')) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Self Purchase Commission')) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Repurchase Commission'))+ $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Level Referral Income')) + $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Single Leg Income'));
                    if ($data == "") {
                        echo config_item('currency') . '0';
                    } else {
                        echo config_item('currency') . $data;
                    } ?>
              </h3>
            </div>
         </div>
      </div>
      <?php if(config_item('roi_income')=='Yes') { ?>
      <div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">ROI Income</p>
               <h3 class="card-title">
              <?php 
              $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'ROI'));
                    if ($data == "") {
                        echo config_item('currency') . '0';
                    } else {
                        echo config_item('currency') . $data;
                    } ?>
              </h3>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Paid Payout</p>
               <h3 class="card-title">
                  <?php 
                    if ($paid_payout == "") {
                        echo config_item('currency') . '0';
                    } else {
                        echo config_item('currency') . $paid_payout;
                  } ?>
              </h3>
            </div>
         </div>
      </div>
    <?php } else if(config_item('ideal_plan') =='Yes') { ?>
      <div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Nonworking Income</p>
               <h3 class="card-title">
              <?php 
              $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Non Working Income'));
                    if ($data == "") {
                        echo config_item('currency') . '0';
                    } else {
                        echo config_item('currency') . $data;
                    } ?>
              </h3>
            </div>
         </div>
      </div>
    	<div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Royalty Income</p>
               <h3 class="card-title">
              <?php 
              $data = $this->db_model->sum('amount', 'earning', array('userid' => $this->session->user_id, 'type' => 'Royalty Income'));
                    if ($data == "") {
                        echo config_item('currency') . '0';
                    } else {
                        echo config_item('currency') . $data;
                    } ?>
              </h3>
            </div>
         </div>
      </div> 
      <?php } else { ?>
      <div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Paid Payout</p>
               <h3 class="card-title">
                  <?php 
                    if ($paid_payout == "") {
                        echo config_item('currency') . '0';
                    } else {
                        echo config_item('currency') . $paid_payout;
                  } ?>
              </h3>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-xs-6">
         <div class="card-box widget-box-two widget-two-custom">
            <i class="<?php echo config_item('cur'); ?> widget-two-icon" aria-hidden="true"></i>
            <div class="wigdet-two-content">
               <p class="m-0 font-bold font-secondary text-overflow" title="Statistics">Pending Payout</p>
               <h3 class="card-title">
              <?php 
                    if ($pending_payout == "") {
                        echo config_item('currency') . '0';
                    } else {
                        echo config_item('currency') . $pending_payout;
                  } ?>
              </h3>
            </div>
         </div>
      </div>
    <?php } ?>
   </div>
	<div class="col-xl-12 col-lg-12 home_1 share-your-link">
      <div class="card-box22">
         <div class="row">
            <div class="col-sm-12 col-md-6 share-your-left">
               <h3 class="currency-label">Share Your Link</h3>
               <p><i class="fa fa-bullhorn"></i> Show the Income to the World.</p>
            </div><br>
            <div class="col-sm-12 col-md-3">
              <div class="fb_share">
                  <div class="addthis_inline_share_toolbox" style="clear: both;" data-url="https://www.idealmoney.in/member" data-title="Dashboard :: Ideal Money">
                    <div id="atstbx" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show">
                      <div class="at-share-btn-elements">
                        <a target='_blank' href="https://www.facebook.com/sharer.php?u=<?php echo site_url() . 'site/register/Left/' . $this->session->user_id ?>" class="whatsapp_share_btn twitter_share_link" style="background-color:rgb(59, 89, 152);"><i class="fa fa-facebook" style="font-size: 17px;"></i>&nbsp;|&nbsp;Share on Facebook</a>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-3">
              <div class="fb_share">
                  <div class="addthis_inline_share_toolbox" style="clear: both;" data-url="https://www.idealmoney.in/member" data-title="Dashboard :: Ideal Money">
                    <div id="atstbx1" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show">
                      <div class="at-share-btn-elements">
                        <a target='_blank' href="https://api.whatsapp.com/send?text=<?php echo site_url() . 'site/register/A/' . $this->session->user_id ?>" class="whatsapp_share_btn twitter_share_link"><i class="fa fa-whatsapp" style="font-size: 17px;"></i>&nbsp;|&nbsp;Share on WhatsApp</a>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
           </div>
	     </div>
	</div>
  <?php if(config_item('ideal_plan')=='Yes') { ?>
	<div class="row">
      <div class="col-xl-12 col-lg-12 currency-converter-box">
         <div class="card-box">
            <div class="row">  
               <li>
                  <span class="float-left currency-label">Top-Up ID</span>
                  <span class="float-right text-center"><a href="<?php echo site_url('HomeApp/topupassociate')?>" class="dash_btn">Click Here</a></span>   
               </li>
               <li>
                  <span class="float-left currency-label">Currency Converter</span>
                  <span class="float-right text-center"><a href="https://www.xe.com/" target="_blank" class="dash_btn">Click Here</a></span>
               </li>
            </div>
         </div>
      </div>
    </div>
    <?php } ?>

</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>axxets/home/js/addthis_widget.js"></script>
 <style id="service-icons-0"></style>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="Team Crowdfunding ">
	<!-- footer -->
	<div class="footer-copy">
		<div class="container">
		<p><?php if(config_item('footer_name') != '') { ?>
        &copy; <?php echo date('Y') ?> All Rights Reserved by 
<?php echo config_item('footer_name') ?>
<?php } else { ?>
&copy; <?php echo date('Y') ?> All Rights Reserved | Powered by <?php echo config_item('footer') ?>
<?php } ?>
    </p> 
		</div>
	</div>
</body>
</html>