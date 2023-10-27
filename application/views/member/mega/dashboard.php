<!-- Content Header (Page header) -->  
<div class="content-header">
	<div class="container">
		<div class="d-flex align-items-center">
			<div class="mr-auto w-p50">
				<h1 class="page-title br-0">Dashboard</h1>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="right-title">
				<div class="d-flex mt-10 justify-content-end">
					<div class="d-lg-flex mr-20 ml-10 d-none">
						<div class="chart-text mr-10">
							<h6 class="mb-0"><small>TOTAL DOWNLINE</small></h6>
							<h4 class="mt-0 text-primary"><?php echo $member_data['member']->total_downline;?></h4>
						</div>
						<div class="spark-chart">
							<div id="thismonth"><canvas width="60" height="35" style="display: inline-block; width: 60px; height: 35px; vertical-align: top;"></canvas></div>
						</div>
					</div>
					<div class="d-lg-flex mr-20 ml-10 d-none">
						<div class="chart-text mr-10">
							<h6 class="mb-0"><small>TOTAL EARNINGS</small></h6>
							<h4 class="mt-0 text-danger"><?php echo config_item('currency') . $member_data['total_earned'];?></h4>
						</div>
						<div class="spark-chart">
							<div id="lastyear"><canvas width="60" height="35" style="display: inline-block; width: 60px; height: 35px; vertical-align: top;"></canvas></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Main content -->
<section class="content">	
	<div class="container">	
      <?php include 'dashboard_top.php';?>
		<div class="row">
      <?php include 'kpi.php';?>
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-3 offset-sm-4" style="margin-bottom: 50px;">
        <p align="center">
            <a href="<?php echo site_url('member/topup_wallet') ?>"
               class="btn btn-lg btn-success"></span> Deposit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;</a>
        </p>
      </div>
      <?php if ($member_data['payout']->user_withdraw=="Yes") { ?>
      <div class="col-md-2 col-sm-3" style="margin-bottom: 50px;">
            <p align="center">
                <a href="<?php echo site_url('wallet/withdraw-payouts') ?>"
                   class="btn btn-lg btn-primary"></span> Withdraw&nbsp;&nbsp;&rarr;</a>
            </p>
      </div>
      <?php } ?>	
			
			<div class="col-12" id="earning">
				<div class="box">
					<div class="box-header bg-primary with-border">						
						<h3 class="box-title">Latest Earnings</h3>
						<h6 class="box-subtitle">Here is the list of Latest Earnings</h6>
					</div>
					<div class="box-body p-15">						
						<div class="table-responsive">
							<table class="table mt-0 table-hover no-wrap" data-page-size="10">
                <thead class="table table-hovered">
                  <tr style="font-weight: bolder; color: brown;">
                      <th>Income Name</th>
                      <th>Amount</th>
                      <th>Details</th>
                      <th>Date</th>
                      <!--<th>Matching Pairs</th>-->
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
                          <!--<td><?php echo $e->pair_names ?></td>-->
                      </tr>
                  <?php endforeach; ?>
                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

      <?php
      $this->db->select('plan_id')->from('level_wise_income')->where('plan_id',$member_data['member']->signup_package)->order_by('plan_id', 'ASC');
      $plans = $this->db->get()->result_array();
      ?>

      <?php if(count($plans)>0 ) { ?>
      <div class="col-12">
        <div class="box">
          <div class="box-header bg-primary with-border" style="background: linear-gradient(60deg, #ab47bc, #8e24aa);">           
            <h3 class="box-title"><?php echo $this->db_model->select('income_name', 'level_wise_income');?></h3>
            <h6 class="box-subtitle"> Here is the latest <?php echo $this->db_model->select('income_name', 'level_wise_income');?> report</h6>
          </div>
          <div class="box-body p-15">           
            <div class="table-responsive">
              <table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                <thead>
                    <tr style="font-weight: 800">
                        <th>Level #</th>
                        <th>Downline</th>
                        <th>Direct Required</th>
                        <th>You Sponsored</th>
                        <th>Income</th>
                        <th>Upgrade Fee</th>
                        <th>Status</th>
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
                                          }
                              ?>
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
                                  'activate_time <=' => date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$e->id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),'status'=>'Active'));
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
                                  'activate_time >' =>  date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$prev_id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),'status'=>'Active',
                                    ));
                          } else {
                          echo '+'.$this->db_model->count_all('member', array(
                                  'sponsor' => $member_data['member']->id,'status'=>'Active',
                                  'activate_time >' =>  date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$prev_id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),
                                  'activate_time <=' =>  date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$e->id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])),'status'=>'Active'));
                          }
                          //debug_log($this->db->last_query());
                          //debug_log(date('Y-m-d H:i:s',strtotime($this->db->select('date')->from('earning')->where(array('secret'=>$prev_id, 'type' => $e->income_name, 'userid'=>$member_data['member']->id))->order_by('id','ASC')->limit(1)->get()->result_array()[0]['date'])));
                          ?> </td>
                          <?php } ?>
                          <td><?php 
                          if($e->amount > 0) { 
                            echo $e->amount; }else {
                          echo $this->db_model->sum('amount', 'earning', array('type'=>$e->income_name,'secret'=>$e->id, 'userid'=>$member_data['member']->id));} ?></td>
                          <?php if($e->upgrade > 0) { ?>
                          <td><?php echo $e->upgrade ?></td>
                          <?php } else { ?>
                          <td>--</td>
                          <?php } ?>
                          <?php
                          if($user_level >= $e->level_no) {  ?> 
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
    <?php } ?>

    <?php if(config_item('enable_reward')=='Yes') { ?>
   
<div class="col-12">
        <div class="box">
          <div class="box-header bg-primary with-border" style="background: linear-gradient(60deg, #ab47bc, #8e24aa);">           
            <h4 class="card-title" style="color:white;">Reward Achievers</h4>
            <p class="card-category" style="color:white; font-size: 12px;"> Latest Reward Achievers</p>
          </div>
          <div class="box-body p-15">           
            <div class="table-responsive">
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
          
<?php } ?>

			<div class="col-xl-7 col-12">
				<div class="box">
					<div class="box-header bg-info">
					  <h4 class="box-title">Contact Support</h4>
						<ul class="box-controls pull-right">
						  <li><a class="box-btn-close" href="#"></a></li>
						  <li><a class="box-btn-slide" href="#"></a></li>	
						  <li><a class="box-btn-fullscreen" href="#"></a></li>
						</ul>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <form action="<?php echo site_url('ticket/new-ticket'); ?>" method="post">
						<div class="form-group">
              <label>Subject in Brief*</label>
						  <input type="text" class="form-control" name="ticket_title" value="<?php echo set_value('ticket_title') ?>" required>
						</div>
						<div class="form-group">
						  <label>Issue in Detail*</label>
              <textarea class="form-control" id="editor" name="ticket_data" style="min-height: 100px;"><?php echo set_value('ticket_data') ?></textarea>
						</div>
            <div class="box-footer">
            <button type="submit" class="pull-right btn btn-info" id="contactSupport"> Send <i class="fa fa-paper-plane-o"></i></button>
          </div>
					  </form>
					</div>
				</div>
			</div>

      <div class="col-xl-5 col-12">
        <div class="box">
          <div class="box-header bg-info">
            <h4 class="box-title">Live Updates</h4>
            <ul class="box-controls pull-right">
              <li><a class="box-btn-close" href="#"></a></li>
              <li><a class="box-btn-slide" href="#"></a></li> 
              <li><a class="box-btn-fullscreen" href="#"></a></li>
            </ul>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <marquee scrollamount="5" style="width:97%; min-height:275px; margin-bottom:10px; margin-left:auto; margin-right:auto;" direction="up" onmouseover="this.stop()" onmouseout="this.start()">
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
</section>
<!-- /.content -->