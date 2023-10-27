<div class="row">
<?php if((config_item('enable_epin') == "Yes") || (config_item('enable_bank_deposit') == "Yes") || (config_item('enable_pg')=="Yes")) { ?>
 <div class="col-md-2 col-sm-3 col-sm-offset-4" style="margin-bottom: 5px;">
        <p align="center">
            <a href="<?php echo site_url('member/topup_wallet') ?>"
               class="btn btn-lg btn-success"><span class="<?php echo config_item('cur') ?>"></span> Deposit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;</a>
        </p>
 </div>
<?php } ?>
 <?php if ($member_data['payout']->user_withdraw=="Yes") { ?>
 <div class="col-md-2 col-sm-3" style="margin-bottom: 5px;">
        <p align="center">
            <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"
               class="btn btn-lg btn-primary"><span class="<?php echo config_item('cur') ?>"></span> Withdraw&nbsp;&nbsp;&rarr;</a>
        </p>
 </div>
<?php } ?>
</div>
<!--task states end-->

<div class="col-md-12 col-sm-12" id='earning'>
        <div class="panel-body" style="max-height: 480px">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title" style="color:white;">Latest Earnings</h4>
                                    <p class="card-category" style="color:white;font-size: 12px;" > Here is the latest earnings details</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hovered">
                                            <thead>
                                            <tr style="font-weight: 800">
                                                <th>Income Name</th>
                                                <th>Amount</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                            </tr>
                                            </thead>
                                            <?php $inc = $member_data['latest_earnings']?>
                                            <tbody>
                                            <?php foreach ($inc as $e): ?>
                                                <tr>
                                                    <td><?php echo $e->type ?></td>
                                                    <td><?php echo config_item('currency') . $e->amount ?></td>
                                                    <td><?php echo $e->pair_names ?></td>
                                                    <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php
$this->db->select('plan_id')->from('level_wise_income')->where('plan_id',$member_data['member']->signup_package)->order_by('plan_id', 'ASC');
$plans = $this->db->get()->result_array();
?>

<?php if(count($plans)>0) { ?>
 <div class="col-md-12 col-sm-12" id='single'>
    <div class="panel-body" style="max-height: 1000px">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="background: #200087;">
                  <h4 class="card-title" style="color:white;"><?php echo $this->db_model->select('income_name', 'level_wise_income');?></h4>
                  <p class="card-category" style="color:white;font-size: 12px;" > Here is the latest <?php echo $this->db_model->select('income_name', 'level_wise_income');?> report</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hovered">
                      <thead>
                        <tr style="font-weight: 800">
                            <th>Level #</th>
                            <th>Downline</th>
                            <th>Direct Required</th>
                            <th>You Sponsored</th>
                            <th>Income</th>
                            <?php if($member_data['payout']->admin_charge_type=='DDE'){ ?>
                            <th>Net Income<br/>(After Admin Fee)</th>
                            <?php } ?>
                            <th>Upgrade Fee</th>
                            <th>Status</th>
                            <!--<th>Matching Pairs</th>-->
                        </tr>
                      </thead>
                      <?php
                      $this->db->select('*')->from('level_wise_income')->where(array('plan_id' => $member_data['member']->signup_package))->order_by('level_no', 'ASC');
                      $inc = $this->db->get()->result(); ?>
                      <tbody>
                        <?php $si=1; 
                        foreach ($inc as $e):
                          $count = $this->db_model->count_all('earning', array(
                                  'userid' => $member_data['member']->id,'secret' => $e->id,
                                  'type'   => $e->income_name,));
                          if (config_item('width')==1) {
                            $user_level = $this->db_model->select('gift_level', 'member', array('id'=>$member_data['member']->id,'signup_package'=>$member_data['member']->signup_package ));
                          }
                          else{
                            $user_level = $this->db_model->select('gift_level', 'level_details', array('userid'=>$member_data['member']->id,'pid'=>$member_data['member']->signup_package ));  
                          } ?>
                          <tr>
                              <td><?php $si++; echo $e->level_no; ?></td>
                              <?php if($si==2) { ?>
                              <td><?php echo $e->total_member ?></td>
                              <td><?php echo $e->direct ?></td>
                              <td><?php 
                              if($count <1){
                                echo $this->db_model->count_all('member', array('sponsor' => $member_data['member']->id,'status'=>'Active'));
                              } else {
                              echo $this->db_model->count_all('member', array(
                                      'sponsor' => $member_data['member']->id,'status'=>'Active',
                                      'activate_time <=' => date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$e->id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),'status'=>'Active'
                                       ,));
                              //debug_log($this->db->last_query());
                              }?> </td>
                              <?php } else { ?>
                              <td><?php echo '+'.$e->total_member ?></td>
                              <td><?php echo '+'.$e->direct ?></td>
                              <td><?php 
                              if($prev_count ==0){
                                echo '+ 0';
                              }
                              else if($count <1){
                                echo '+'.$this->db_model->count_all('member', array(
                                      'sponsor' => $member_data['member']->id,'status'=>'Active',
                                      'activate_time >' =>  date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$prev_id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),'status'=>'Active'
                                        ));
                              } else {
                              echo '+'.$this->db_model->count_all('member', array(
                                      'sponsor' => $member_data['member']->id,'status'=>'Active',
                                      'activate_time >' =>  date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$prev_id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),
                                      'activate_time <=' =>  date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$e->id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),'status'=>'Active'
                                        ));
                              }
                              //debug_log($this->db->last_query());
                              //debug_log(date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$prev_id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])));
                              ?> </td>
                              <?php } ?>
                              <td>
                              <?php if($e->amount > 0) { 
                                echo $e->amount; }else {
                                echo $this->db_model->sum('amount', 'earning', array('type'=>$e->income_name,'secret'=>$e->id, 'userid'=>$member_data['member']->id));} ?>
                              </td>
                              <?php if($member_data['payout']->admin_charge_type=='DDE'){ ?>
                              <td>
                                    <?php if($e->amount > 0) { 
                                    echo $e->amount*(1-$member_data['payout']->admin_charge/100); }else {
                                    echo $this->db_model->sum('amount', 'earning', array('type'=>$e->income_name,'secret'=>$e->id, 'userid'=>$member_data['member']->id))*(1-$member_data['payout']->admin_charge/100);} ?>
                              </td>
                              <?php } ?>
                              <?php if($e->upgrade > 0) { ?>
                              <td><?php echo $e->upgrade ?></td>
                              <?php } else { ?>
                              <td>--</td>
                              <?php } ?>
                              <?php
                              if($user_level >= $e->level_no) { ?>
                              <td ><label class="label label-success" >Completed</label></td>
                              <?php if(($e->auto_upgrade == 'No') && (!$member_data['member']->new_id>0) && ($member_data['member']->id != config_item('top_id')) && ($e->new_id == 'Yes')){ ?>
                              <td><label class="label label-info" ><a href="<?php echo site_url('member/upgrade_id/'.$e->plan_new_id.'/'.$e->id) ?>"> Upgrade </a></label></td>  
                              <?php } ?>
                              <?php } else { ?>
                              <td><label class="label label-danger">Pending</label></td>
                              <?php } ?>
                          </tr>
                          <?php $prev_id = $e->id;
                                $prev_count = $count; ?>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>
<?php } ?>

<?php if(config_item('enable_reward')=='Yes') { ?>
<div class="col-md-12 col-sm-12">
    <div class="panel-body" style="min-height: 180px;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="height:5px;">
                        <div class="card" >
                            <div class="card-header card-header-primary" style="background: green;">
                                <h4 class="card-title" style="color:white;">Reward Achievers</h4>
                                <p class="card-category" style="color:white; font-size: 12px;"> Latest Reward Achievers</p>
                            </div>
                            <div class="card-body">
                                <?php
                                    $this->db->select('id, reward_name, reward_duration, achievers, A,B')->order_by('reward_name', 'ASC');
                                    //$this->db->limit(1);
                                    $reward = $this->db->get('reward_setting')->result();
                                    ?>
                                <?php foreach ($reward as $r): ?>
                                        <?php  $this->db->select('id, reward_id, userid,secret, date, status, paid_date, tid')->where(array('reward_id' => $r->id ))->order_by('id','DESC');
                                        $this->db->limit(5);
                                        $reward_achievers = $this->db->get('rewards')->result();
                                        //print_r($reward_achievers);
                                        if(count($reward_achievers)>0) { ?>
                                        <fieldset>
                                             <legend><b><?php echo $r->reward_name ?></b></legend>
                                                <?php $sn=1;
                                                foreach ($reward_achievers as $ra):
                                                //print_r($ra->userid);
                                                $user_name = $this->db_model->select('name', 'member', array('id' => $ra->userid,));?>
                                                <div style="color:black;padding-left: 5px;padding-bottom: 15px;font-size: 12px;" ><?php echo $sn++ .". " . $user_name; ?></div>
                                               <?php endforeach; ?>
                                        </fieldset>
                                        <br/><br/>
                                        <?php }?>
                                 <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>


<?php
if(config_item('enable_club_income')=='Yes'){ ?>
  <div class="col-md-12 col-sm-12" id='club_income'>
        <div class="panel-body" style="max-height: 480px">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title" style="color:white;">Club Income</h4>
                                    <p class="card-category" style="color:white;font-size: 12px;" > Here is the Summary of Club Income</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hovered">
                                            <thead>
                                            <tr style="font-weight: 800">
                                                <th>SN.</th>
                                                <th>Income Name</th>
                                                <th>Downline Count</th>
                                                <th>Total Amount</th>
                                                <th>Statement</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>4 Star Club Income</td>
                                                    <td><a href="<?php echo site_url('member/club_members/1') ?>"><?php echo $this->db_model->club_members_count(1); ?></a></td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'4 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/4 star club income') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>16 Star Club Income</td>
                                                    <td><a href="<?php echo site_url('member/club_members/2') ?>"><?php echo $this->db_model->club_members_count(2); ?></a></td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'16 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/16 star club income') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>64 Star Club Income</td>
                                                    <td><a href="<?php echo site_url('member/club_members/3') ?>"><?php echo $this->db_model->club_members_count(3); ?></a></td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'64 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/64 star club income') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>256 Star Club Income</td>
                                                    <td><a href="<?php echo site_url('member/club_members/4') ?>"><?php echo $this->db_model->club_members_count(4); ?></a></td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'256 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/256 star club income') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>1024 Star Club Income</td>
                                                    <td><a href="<?php echo site_url('member/club_members/5') ?>"><?php echo $this->db_model->club_members_count(5); ?></a></td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'1024 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/1024 star club income') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>4096 Star Club Income</td>
                                                    <td><a href="<?php echo site_url('member/club_members/6') ?>"><?php echo $this->db_model->club_members_count(6); ?></a></td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'4096 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/4096 star club income') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>16,384 Star Club Income</td>
                                                    <td><a href="<?php echo site_url('member/club_members/7') ?>"><?php echo $this->db_model->club_members_count(7); ?></a></td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'16384 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/16384 star club income') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
<?php } ?>

<?php
if(config_item('enable_group_income')=='Yes'){ ?>
  <div class="col-md-12 col-sm-12" id='club_income'>
        <div class="panel-body" style="max-height: 480px">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title" style="color:white;">Group Income</h4>
                                    <p class="card-category" style="color:white;font-size: 12px;" > Here is the Summary of Group Income</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hovered">
                                            <thead>
                                            <tr style="font-weight: 800">
                                                <th>SN.</th>
                                                <th>Income Name</th>                                                
                                                <th>Total Amount</th>
                                                <th>Statement</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Education Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'Education Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/Education Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tour Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'Tour Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/Tour Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Royalty Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'Royalty Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/Royalty Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Car Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'Car Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/Car Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Home Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('userid'=>$member_data['member']->id, 'pair_names'=>'Home Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('member/income_search/All/Home Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
<?php } ?>


<div class="col-md-7 col-sm-12" style="padding-right: 0px;">
    <div class="panel-body" style="min-height: 360px;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="height:5px;">
                        <div class="card">
                            <div class="card-header card-header-primary bg-info" style="background: blue;">
                                <h4 class="card-title" style="color:white;">Contact Support</h4>
                                <p class="card-category" style="color:white; font-size: 12px;"> Send your queries to Support Team</p>
                            </div>
                            <div class="card-body">
                              <!-- /.box-header -->          
                              <form action="<?php echo site_url('ticket/new-ticket'); ?>" method="post">
                                <div class="form-group">
                                  <label style="font-size: 13px;">Subject in Brief*</label>
                                  <input type="text" class="form-control" name="ticket_title" value="<?php echo set_value('ticket_title') ?>" required>
                                </div>
                                <div class="form-group">
                                  <label style="font-size: 13px;">Issue in Detail*</label>
                                  <textarea class="form-control" id="editor" name="ticket_data" style="min-height: 100px;"><?php echo set_value('ticket_data') ?></textarea>
                                </div>
                                <div class="box-footer">
                                <button type="submit" class="pull-right btn btn-info" id="contactSupport"> Send <i class="fa fa-paper-plane-o"></i></button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                  </div>
             </div>
        </div>
    </div>
</div>

<div class="col-md-5 col-sm-12" style="padding-left: 0px;" id="live_updates">
    <div class="panel-body" style="min-height: 360px;">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="height:5px;">
                        <div class="card" >
                            <div class="card-header card-header-primary" style="background: blue;">
                                <h4 class="card-title" style="color:white;">Live Updates</h4>
                                <p class="card-category" style="color:white; font-size: 12px;">Here is the Latest Updates</p>
                            </div>
                            <div class="card-body">
                              <marquee scrollamount="5" style="width:97%; min-height:228px; margin-bottom:10px; margin-left:auto; margin-right:auto;" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
                                <p style="font-size:16px; line-height:23px; ">
                                Welcome to <?php echo config_item('company_name'); ?> !!!!<br/>
                                <?php if(config_item('enable_news')=='Yes') { ?>
                                  <?php $this->db->select('id, subject, content, date')->where('subject','live_updates')->order_by('id', 'desc')->limit(1);
                                     $news = $this->db->get('news')->result();
                                     if(count($news)>0) { ?>
                                      <?php foreach ($news as $n) { ?>
                                       <p style="color:#9c27b0;font-weight:bold;margin-bottom: 0px;"><?php echo $n->content; ?></p>
                                 <?php }
                                     }
                                   }?>

                                </p>
                              </marquee>
                            </div>
                          </div>
                        </div>
                  </div>
             </div>
        </div>
    </div>
</div>

