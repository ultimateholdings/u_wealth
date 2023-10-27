
<br>
<?php

if($member_data['member']->new_id > 0) { ?>
<div class="alert alert-light">
    <marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">
        <p style="color:#9c27b0;font-weight:bold;margin-bottom: 0px;">Your New ID is <?php echo $member_data['member']->new_id; ?> and Login Password is Password@123</p>
    </marquee>
</div>
<?php }?>
<br>
<?php if(config_item('enable_news')=='Yes') { ?>
<?php $this->db->select('id, subject, content, date')->where('subject','latest_news')
->order_by('id', 'ASC')->limit(1);
$news = $this->db->get('news')->result();
if(count($news)>0) { ?>
<div class="alert alert-light">
  <div class="row">
    <div class="col-sm-2">
      <button class="btn mr-3 btn-sm btn-secondary ng-star-inserted" style="color: #fff;background-color: #ff4081;border-color: #ff4081;height:50px;">Latest News</button>
    </div>
    <div class="col-sm-10">
     <marquee direction="left" onmouseover="this.stop();" onmouseout="this.start();">
        <?php foreach ($news as $n) { ?>
             <p style="color:#9c27b0;font-weight:bold;margin-bottom: 0px;margin-top:15px;"><?php echo $n->content; ?></p>
             <?php }?>
      </marquee>
    </div>
  </div>
</div>
<?php } }?>


<?php if(config_item('enable_live_meeting')=='Yes') { ?>

<?php
    $date=date('Y-m-d');
    $this->db->select('id,meet_name,description,date,time')->where('date',$date)
    ->order_by('id', 'ASC')->limit(1);    
    $live_meeting = $this->db->get('live_meeting')->row_array();

    if(count($live_meeting)>0) { ?>
    <div class="alert alert-light">
      <div class="row">
        <div class="col-sm-2">
          <button class="btn mr-3 btn-sm btn-secondary ng-star-inserted" style="color: #fff;background-color: #FFCC00;border-color: #ff4081;height:50px;">Today's Meeting</button>
        </div>
        <div class="col-sm-10">
            <marquee direction="left" behavior="alternate" onmouseover="this.stop();" onmouseout="this.start();">
                
                <h4 style="margin-top: 0px;"><?php echo date('h:i A', $live_meeting['time']); ?> : <?php echo $live_meeting['date']; ?></h4>
                <p style="color:#9c27b0;font-weight:bold;margin-bottom: 5px;margin-top:5px;" ><?php echo $live_meeting['description']; ?></p>
                <!-- <p style="color:red; font-size: 15px;">
                    <?php echo $live_meeting['description']; ?>
                </p> -->
                <a href="<?php echo site_url('member/live_meeting_join/'.$live_meeting['id']);?>" class="btn btn-xs btn-success" target="_blank">
                    <i class="fa fa-video"></i>&nbsp;
                    <?php echo 'Join live video meeting'; ?>
                </a>
                <br>
                <a href="<?php echo site_url('member/upcomming_meetings');?>" class="btn btn-xs btn-primary" style="margin-top: 5px;">
                    <i class="fa fa-video"></i>&nbsp;
                    <?php echo 'Click to View All Meetings'; ?>
                </a> 
                   
                 <!-- <p style="color:#9c27b0;font-weight:bold;margin-bottom: 0px;margin-top:15px;"><?php echo $n->content; ?></p>
                  -->
            </marquee>
        </div>
      </div>
    </div>


<?php } }?>


<?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer') {
if($member_data['diff'] != '') { ?>
  <div class="row">
    <br>
      <div class="col-sm-12 alert" >
            <h3 class="h">Time Left To Complete Your Payment :-</h3><br>
              <div class="countdownTimer text-center ">
                <div class="countdownTimerCell">
                  <span id="days"></span>
                  <br>
                  <span class="timeDescription">Days</span>
                </div>
                <div class="countdownTimerCell">
                  <span id="hours"></span>
                  <br>
                  <span class="timeDescription">Hrs</span>
                </div>
                <div class="countdownTimerCell">
                  <span  id="minutes"></span>
                  <br>
                  <span class="timeDescription">Mins</span>
                </div>
                <div class="countdownTimerCell">
                  <span id="seconds"></span>
                  <br>
                  <span class="timeDescription">Secs</span>
                </div>
              </div>
      </div>
      <?php if($member_data['diff']>0) { ?>
      <div class="text-center" >
      <h3 style="color: blue;"><a href="<?php echo site_url($member_data['url']); ?>"><u>Your <?php echo $member_data['payment_remarks'] ?> Payment is Pending!!! Click Here to Make Payment</u></a></h3>
    </div>
  <?php } else { ?>
    <div class="text-center" >
      <h3 style="color: blue;"><u>The Cut Off Time to Make Payment is Over !!!</u></h3>
    </div>
  <?php } ?>
  </div>
<?php }
  if(((!strlen($mp->bank_ac_no)>0)||(!strlen($mp->bank_name)>0)||(!strlen($mp->bank_branch)>0))&&(strlen($member_data['admin_fee_status'])>0)){ ?>
    <div class="alert alert-warning" >
      <?php echo "You have not updated your bank details !!! Please <a href=". site_url('member/bankdetails')." style='color: blue;'> Click Here </a> to update the bank details to receive payments !!!" ?> 
  </div>
  <?php } ?>
<?php } ?>
<?php if($member_data['alert_message'] != '') {?>
  <div class="alert alert-success" >
      <?php echo $member_data['alert_message']; ?> 
  </div>
<?php } ?>
<?php if($member_data['deposit_message'] != '') {?>
  <div class="alert alert-success" >
      <?php echo $member_data['deposit_message']; ?> 
  </div>
<?php } ?>

<?php if($this->db_model->count_all('ticket', array('user_type'=>'User','userid'=>$member_data['member']->id, 'status'=>'Waiting User Reply'))>0){ ?>
  <div class="alert alert-success" >
  You have Received Response to your Support Ticket !!! Please <a href="<?php echo site_url('ticket/old-Supports') ?>" style='color: blue;'> Click Here </a> to View !!!
  </div>
<?php } ?>

<div class="panel item">
    <div class="panel-body my" style="background-image: url('<?php echo base_url(); ?>/axxets/admin/img/new1.png');background-repeat: no-repeat;background-size:cover;">
<?php
$startDate = new DateTime();
$startDate->modify( 'first day of this month 000000' );
$endDate	= new DateTime($startDate->format('Y-m-d 23:59:59'));
$endDate->modify('+14 days'); 
$sql	= "SELECT SUM(total_amt) as total_pur FROM `tbl_order_details` 
WHERE user_id=".$member_data['member']->id." AND (tbl_order_details.order_date BETWEEN '" . strtotime($startDate->format( 'Y-m-d H:i:s' )) . "' AND '" . strtotime($endDate->format( 'Y-m-d H:i:s') ). "')";
$count_pur	= $this->db->query($sql)->row();
$this->db->order_by('id','asc');
if($count_pur->total_pur<50){
?>    
    	<h4 class="text-danger text-center"><marquee>You did not purchase <?=config_item('currency')?>50 in this month</marquee></h4>
<?php 
}
?>
        <div class="dashbord-profile">
            <div class="profile-avatar">
                 <img src="<?php echo $member_data['member']->photo ? base_url('uploads/profile/' . $member_data['member']->photo) : site_url('uploads/site_img/person.jpeg'); ?>"
                 class="img-thumbnail img-responsive" style="max-height: 100px;min-width:100px">
                <div class="clearfix"></div>
                <a href="<?php echo site_url('member/profile'); ?>" target ='__blank' class="profile-edit" style="color: #337ab7">View Profile</a>
            </div>
             <div class="profile-content" >
                <h4 class="profile-name" style="color: #2255a4; font-size:30px;"><?php echo $this->session->name ?></h4>
                <h4 class="profile-name" style="color: blue;"><span style="color: black;">ID : </span><?php echo config_item('ID_EXT') . $this->session->user_id ?> </h4>
                <?php if($this->session->user_id != config_item('top_id')){ ?>
                <h4 style="color: blue; font-size:16px;"><span style="color: black;">Plan : </span><?php echo $member_data['pd']->plan_name ?> </h4>
                <?php } ?>
                <h4 style="color: blue; font-size:16px;"><span style="color: black;">Rank : </span><?php echo $member_data['member']->rank; ?></h4>
                <?php if($member_data['member']->status == 'Active') { ?>
                <?php if($member_data['member']->new_id >0) { ?>
                    <h4 style="color: blue; font-size:16px;"><span style="color: black;">Status:&nbsp;</span><span style="color: green;">Upgraded</span></h4>
                <?php } else { ?>
                <h4 style="color: #fdb71e; font-size:16px;"><span style="color: black;">Status:&nbsp;</span>Active</h4>
                <?php } ?>
                
                <?php } else if($member_data['member']->status == 'Inactive') { ?>
                    <h4 style="color: red; font-size:16px;">Inactive
                    <?php
                    if(config_item('crowdfund_type')!='Manual_Peer_to_Peer'){ 
                      if($member_data['wallet_balance'] >= $member_data['pd']->joining_fee) { ?>
                      <a href="<?php echo site_url('member/Activate') ?>" style="color: blue;">&nbsp;<u>Click Here to Activate Your Account</u></a>
                      <?php } else {?>
                          <a href="<?php echo site_url('member/topup-wallet/'.($member_data['pd']->joining_fee-$member_data['wallet_balance']))?>" style="color: blue;">&nbsp;<u>Please Pay <?php echo config_item('currency').($member_data['pd']->joining_fee-$member_data['wallet_balance']) ?> to Activate Your Account</u></a>
                      <?php } ?>
                    <?php } ?>
                    </h4>
                <?php } else {?>
                    <h4 style="color: red; font-size:16px;">Suspended
                    <?php $renew_amount = $this->db_model->select('recurring_fee', 'plans', array('id' => $member_data['member']->signup_package)) > 0 ? $this->db_model->select('recurring_fee', 'plans', array('id' => $member_data['member']->signup_package)) : $this->db_model->select('recurring_fee', 'level_wise_income', array('plan_id' => $member_data['member']->signup_package, 'level_no'=>$member_data['member']->gift_level));
                    if($renew_amount > 0) { ?>
                    <a href="#" data-toggle="modal" data-target="#renewaccount" style="color: blue;"><br><u>Renew Account</u></a>
                    <?php } ?>
                    </h4>
                <?php } ?>
                <?php if(strtolower($member_data['pd']->plan_name)!='diamond'){
					$this->db->select('*');
					$this->db->where(array('id>' => $member_data['pd']->id));
					$plans = $this->db->get('plans')->result();
				?>
                <h4 style="color: blue; font-size:16px;"><span style="color: black;">Upgrade Plan : </span>
                	<form action="<?= base_url().'member/plan_upgrade';?>" style="display:inline-block" method="post" >
                    	<input type="text" name="epin" value="" />
                    	<?php /*?><select name="new_plan">
                        	<option value="">Select plan</option>
                        <?php
							if($plans){
								foreach($plans as $set_plan){
								?>
                                    <option value="<?=$set_plan->id?>"><?= $set_plan->plan_name.'. Price: '.config_item('currency').($set_plan->joining_fee-$member_data['pd']->joining_fee)?></option>
                                <?php
								}
							}
						?>
                        </select><?php */?>
                        <input type="submit" class="btn btn-primary" value="Upgrade" />
                    </form>
                </h4>
				<?php
				}?>

				<?php if($member_data['member']->pairs_count >= $member_data['pd']->capping) { ?>
                    <h4 style="color: blue; font-size:18px;">
                        <span style="color: red;">You’ve exceeded capping !!! <br>
                        System will flush out accumulate points.</span>
                    </h4>
                <?php } ?>
                <h4 style="color: #000; font-size:16px;">Self Purchase</h4>
                <div class="timeline">
                    <div class="dot active_dot" id="0" style="pointer-events: none;cursor: default;">
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 0</date>
                    </div>
                    
                    <div class="dot <?=$member_data['all_transaction']>=50?'active_dot':'deactive_dot'?>" id="1" <?=$member_data['all_transaction']>=50?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 50</date>
                    </div>
                    
                    <div class="dot <?=$member_data['all_transaction']>=100?'active_dot':'deactive_dot'?>" id="2" <?=$member_data['all_transaction']>=100?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 100</date>
                    </div>
                    
                    <div class="dot <?=$member_data['all_transaction']>=200?'active_dot':'deactive_dot'?>" id="3" <?=$member_data['all_transaction']>=200?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 200</date>
                    </div>
                    
                    <div class="dot <?=$member_data['all_transaction']>=500?'active_dot':'deactive_dot'?>" id="4" <?=$member_data['all_transaction']>=500?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 500</date>
                    </div>
                    <div class="dot <?=$member_data['all_transaction']>=1000?'active_dot':'deactive_dot'?>" id="5" <?=$member_data['all_transaction']>=1000?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 1000+</date>
                    </div>
                   	<?php 
					$width	= 0;
					if($member_data['all_transaction']>=50){
						$width	= 20;
					}
					if($member_data['all_transaction']>=100){
						$width	= 40;
					}
					if($member_data['all_transaction']>=200){
						$width	= 60;
					}
					if($member_data['all_transaction']>=500){
						$width	= 80;
					}
					if($member_data['all_transaction']>=1000){
						$width	= 100;
					}
					?>
                    <div class="inside" style="width: <?=$width?>% !important"></div>
                </div>
                <h4 style="color: #000; font-size:16px; margin-top:15px">Team Purchase</h4>
                <div class="timeline">
                    <div class="dot active_dot" id="0" style="">
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 0</date>
                    </div>
                    
                    <div class="dot <?=$member_data['total_downline_income']>=500?'active_dot':'deactive_dot'?>" id="1" <?=$member_data['total_downline_income']>=500?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 500</date>
                    </div>
                    
                    <div class="dot <?=$member_data['total_downline_income']>=1000?'active_dot':'deactive_dot'?>" id="2" <?=$member_data['total_downline_income']>=1000?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 1000</date>
                    </div>
                    
                    <div class="dot <?=$member_data['total_downline_income']>=2000?'active_dot':'deactive_dot'?>" id="3" <?=$member_data['total_downline_income']>=2000?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 2000</date>
                    </div>
                    
                    <div class="dot <?=$member_data['total_downline_income']>=5000?'active_dot':'deactive_dot'?>" id="4" <?=$member_data['total_downline_income']>=5000?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 5000</date>
                    </div>
                    <div class="dot <?=$member_data['total_downline_income']>=10000?'active_dot':'deactive_dot'?>" id="5" <?=$member_data['total_downline_income']>=10000?'style="pointer-events: none;cursor: default;"':''?>>
                        <span></span>
                        <date style="width: max-content"><?=config_item('currency')?> 10000+</date>
                    </div>
                   	<?php 
					$width	= 0;
					if($member_data['all_transaction']>=500){
						$width	= 20;
					}
					if($member_data['all_transaction']>=1000){
						$width	= 40;
					}
					if($member_data['all_transaction']>=2000){
						$width	= 60;
					}
					if($member_data['all_transaction']>=5000){
						$width	= 80;
					}
					if($member_data['all_transaction']>=10000){
						$width	= 100;
					}
					?>
                    <div class="inside" style="width: <?=$width?>% !important"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
     <div class="card">
        <div class="card-header card-header-icon" data-background-color="rose" style="paint-order: 20px; padding-right: 20px;">
           <h4 class="card-title"></h4>
        </div>
  
        <div class="row">
           <div class="col-md-6 col-md-offset-1">
              <div class="form-group label-floating is-empty" style=" margin-bottom: 7px; width: 100%; float: left; font-weight: bold;">
                <?php $pwd=$this->db->query('select user_password from tbl_users where user_email="'.$this->session->email.'"')->row();?>
                <form id="login_form" action="<?=config_item('store_url');?>/site/auto_login" method="post">
                    <!-- <input type="hidden" name="preview_url" value="<?=config_item('store_url');?>"> -->
                    <input type="hidden" name="email" value="<?php echo $this->session->email; ?>">
                    <input type="hidden" name="password" value="<?php echo $pwd->user_password; ?>">
                    <input type="hidden" name="affiliate_id" value="<?=$this->session->user_id?>">
                    <input type="hidden" name="iss_affiliate" value="1">

                    <a href = "#" target = "_blank">
                        <input readonly="" id="inputLeft" type="submit" class="form-control" value="<?=config_item('store_url');?>/site/auto_login">
                    </a>

                    </button>
                </form>

              </div>
           </div>
           <div class="col-md-5">
              <div class="form-group label-floating is-empty" style=" margin-bottom: 7px; width: 50%;  font-weight: bold;">
                 <input type="submit" value="Copy Link" id="inputLeft_button" class="gen-pin-btn" onclick="copyToclip('inputLeft')">
                 <a target="_blank" name="fb_share" id="fb_share" type="button" href="https://www.facebook.com/sharer.php?u=<?php echo site_url() . 'site/register/Left/' . $this->session->user_id ?>">&nbsp;<img class="img-circle img-responsive" src="<?php echo base_url(); ?>/uploads/site_img/facebook.png" alt="" ></a>
                  <a target="_blank" name="wp_share" id="wp_share" href="https://api.whatsapp.com/send?text=<?php echo site_url() . 'site/register/A/' . $this->session->user_id ?>" data-action="share/whatsapp/share">
                  <img class="img-circle img-responsive" src="<?php echo base_url(); ?>/uploads/site_img/whatsapp.png" alt=""></a>
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
                    <label>Enter PIN for <?php echo config_item('currency') . $renew_amount ?> </label>
                    <input type="text" class="form-control" name="renew_pin" required>
                    <input type="hidden" class="form-control" name="renew_amount" value="<?php echo $renew_amount ?>" >
                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $member_data['member']->id ?>" >
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

<style>
div.timeline {
	background-color: #E6D4D4;
	margin: 50px auto 10px;
	height: 8px;
	width: 100%;
	border-radius: 10px;
	position: relative;
}
div.timeline .inside {
	position: absolute;
	height: 7px;
	background-color: #e74c3c;
	width: 0%;
	left: 0;
	border-radius: 10px;
}
div.timeline .dot {
	z-index: 99;
	transition: 0.3s ease-in-out;
	width: 25px;
    height: 20px;
	border-radius: 50%;
	position: absolute;
	top: -6px;
	text-align: center;
	cursor: pointer;
}
div.timeline .dot:nth-child(1) {
	left: 0%;
}
div.timeline .dot:nth-child(2) {
	left: 20%;
}
div.timeline .dot:nth-child(3) {
	left: 40%;
}
div.timeline .dot:nth-child(4) {
	left: 60%;
}
div.timeline .dot:nth-child(5) {
	left: 80%;
}
div.timeline .dot:nth-child(6) {
	left: 95%;
}
div.timeline .dot:hover {
	-webkit-transform: scale(1.2);
	transform: scale(1.2);
}
.active_dot {
	background-color: #e74c3c;
}
.active_dot date{
	color: #e74c3c;
}
.deactive_dot {
	background-color: #E6D4D4;
}
div.timeline .dot date {
	font-size: 14px;
	display: block;
	position: relative;
	top: -60px;
	right: 10px;
	text-align: center;
	font-weight: 500;
}
div.timeline .dot span {
	display: inline-block;
	margin-top: 0px;
	width: 10px;
	height: 10px;
	background-color: #fff;
	position: relative;
	border-radius: 50%;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}
</style>