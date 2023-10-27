<div class="bg-light lter b-b wrapper-md Dashboard" style=" margin-left: -20px; margin-right: -25px;">
    <div class="row" style="margin-left:25px; padding-top: 15px; padding-bottom: 15px">
        <div class="col-lg-4 col-md-4 col-sm-12" style="padding-top: 5px;">
            <h1 class="m-n h3">Dashboard</h1>
        </div>
    </div>
</div>
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
->order_by('id', 'desc')->limit(1);
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
    <div class="panel-body">
        <div class="dashbord-profile">
            <div class="profile-avatar">
                <img src="<?php echo $member_data['member']->photo ? base_url('uploads/profile/' . $member_data['member']->photo) : site_url('axxets/nophoto.jpg'); ?>"
                 class="img-thumbnail img-responsive" style="max-height: 100px">
                <div class="clearfix"></div>
                <a href="<?php echo site_url('member/profile'); ?>" target ='__blank' class="profile-edit" style="color: #337ab7">View Profile</a>
            </div>
             <div class="profile-content" >
                <h4 class="profile-name" style="color: #006400; font-size:30px;"><?php echo $this->session->name ?></h4>
                <h4 class="profile-name" style="color: blue;"><span style="color: black;">ID : </span><?php echo config_item('ID_EXT') . $this->session->user_id ?> </h4>
                <?php if($this->session->user_id != config_item('top_id')){ ?>
                <h4 style="color: blue; font-size:16px;"><span style="color: black;">Plan : </span><?php echo $member_data['pd']->plan_name ?> </h4>
                <?php } ?>
                <h4 style="color: blue; font-size:16px;"><span style="color: black;">Rank : </span><?php echo $member_data['member']->rank; ?></h4>
                <?php if($member_data['member']->status == 'Active') { ?>
                <?php if($member_data['member']->new_id >0) { ?>
                    <h4 style="color: blue; font-size:16px;"><span style="color: black;">Status:&nbsp;</span><span style="color: green;">Upgraded</span></h4>
                <?php } else { ?>
                <h4 style="color: blue; font-size:16px;"><span style="color: black;">Status:&nbsp;</span>Active</h4>
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
        <div class="clearfix"></div>
        <div class="row">
           <div class="col-md-6 col-md-offset-1">
              <div class="form-group label-floating is-empty" style=" margin-bottom: 7px; width: 100%; float: left; font-weight: bold;">
                <a href = "<?php echo base_url();?>site/register/A/<?php echo $member_data['member']->id;?>" target = "_blank">
                 <input readonly="" id="inputLeft" type="text" class="form-control" value="<?php echo base_url();?>site/register/A/<?php echo $member_data['member']->id;?>">
                </a>
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