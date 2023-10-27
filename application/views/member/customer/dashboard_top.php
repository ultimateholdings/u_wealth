<div class="bg-light lter b-b wrapper-md" style="margin-top: -10px; margin-left: -20px; margin-right: -25px;">
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
<?php $this->db->select('id, subject, content, date')->order_by('id', 'desc')->limit(1);
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
<?php if($status_message) { ?>
  <div class="alert alert-success" style="text-align:center;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <i class="material-icons">close</i>
    </button>
    <span style="">
      <b> Success - </b> <?php echo $status_message; ?></span>
  </div>
<?php } ?>