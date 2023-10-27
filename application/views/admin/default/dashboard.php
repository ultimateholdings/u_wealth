<?php 
$this->db->select('*')->where(array('type !=' =>'Repurchase'))->order_by('id', 'ASC');
$plan=$this->db->get('plans')->result_array();
?>

<div class="row">
    <div class="col-md-offset-1 col-md-10" id="expense">
        <div class="card card-topline-aqua">
            <div class="card-head">
                <header style="text-transform: none;">Package Overview</header>
                <div class="tools">
                    <a class="t-close btn-color fa fa-times"
                       href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body no-padding height-9">
                <div class="row">
                    <div class="tab-pane active" id="tab-packageOveview">
                        <div class="m-t">
                            <ul class="list-group list-group-xs m-b-none">
                                <?php foreach($packages as $d) { ?>
                                <li class="list-group-item b b-md m-b-sm clearfix">
                                    <div class="thumb m-r pull-left">
                                        <img class="img-circle" id="my-img" src="<?php echo $d['image'] ? base_url('axxets/' . $d['image']) : base_url('uploads/default.jpg'); ?>" alt="Platinum" title="Platinum">
                                    </div>
                                    <a href="<?php echo site_url('users/search/'.$d['pid']) ?>"><span class="pull-right label text-base font-normal bg-dark text-white inline m-t"><?= $d['active_count'] ?> Members</span></a>
                                    <span></span>
                                    <div class="clear ">
                                        <div class="m-b-xs"><span><?php echo $d['plan_name']?></span><?php if(($d['type'] != 'Repurchase') && (!$this->db_model->select('id','payout',array('plan_id'=>$d['pid']))>0) && (config_item('crowdfund_type') != "Manual_Peer_to_Peer")){ ?>
                                          <span style="color: red;">&nbsp;(Payout not configured for this Plan. <a href="<?php echo site_url('setting/payout-setting') ?>">Click Here </a> To Update)</span>
                                        <?php } ?></div>
                                        <div class="">
                                          <span class="text-muted">
                                            <?php if(config_item('free_registration')=='Yes'){?>
                                              You have <?= $d['active_count']; ?> Active and <?= $d['inactive_count']; ?> Inactive Members in this Plan.
                                            <?php } else { ?>  
                                              You have <?php echo $d['active_count']; ?> Member in this plan.
                                            <?php } ?>
                                          </span>
                                        </div>
                                    </div>
                                </li>
                                <br>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-md-12">
                          <!-- <div class="text-md wrapper-md pull-right">View details</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Latest Joinings</h4>
            <p class="card-category"> Here is the list of members who have joined recently</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead  class=" text-primary">
                  <tr>
                    <th>SN</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Sponsor ID</th>
                    <th>Plan Name</th>
                    <th>Phone</th>
                    <th>Join Date</th>
                    <!--<th>Total Downline</th>-->
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php $sn = count($latest_members);
                    foreach ($latest_members as $e) { ?>
                        <tr>
                            <td><?php echo $sn--; ?></td>
                            <td>
                                <a href="<?php echo site_url('users/user_detail/' . $e['id']) ?>"
                                   target="_blank"><?php echo config_item('ID_EXT') . $e['id']; ?></a>
                            </td>
                            <td><?php echo $e['name']; ?></td>
                            <td>
                                <a href="<?php echo site_url('users/user_detail/' . $e['sponsor']) ?>"
                                   target="_blank"><?php echo $e['sponsor'] ? config_item('ID_EXT') . $e['sponsor'] : ''; ?> </a>
                            </td>                            
                            <td>

                              <?php if (config_item('enable_based_pv')=='Yes') { ?>
                                  <?php
                                    $md=$this->db_model->select_multi('*','member',array('id'=>$e['id']));
                                    $package_details=$this->gmlm_model->get_current_package($md);
                                    echo !empty($package_details->plan_name) ? $package_details->plan_name : $this->db_model->select('plan_name', 'plans', array('id' => $e['signup_package']));
                                  ?>
                                  
                              <?php } else { ?>

                                  <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $e['signup_package'])); ?>
                              
                              <?php }?>  

                                                            
                            </td>
                            
                            <td><?php echo $e['phone']; ?></td>
                            <td><?php echo date('Y-m-d h:i A', strtotime($e['join_time'])); ?></td>
                            <!--<td><?php echo($e['total_downline']); ?></td>-->
                            <td>
                                <?php if($e['id'] == config_item('top_id')) { ?>
                                <a href="<?php echo site_url('users/user_detail/' . $e['id']); ?>"
                                   class="btn btn-warning btn-xs">View</a>
                                <?php } else { ?>
                                  <a href="<?php echo site_url('users/user_detail/' . $e['id']); ?>"
                                     class="btn btn-warning btn-xs">View</a>
                                  <?php if(($e['status']=='Inactive') && (config_item('crowdfund_type') != 'Manual_Peer_to_Peer')){ ?>
                                    <a href="<?php echo site_url('users/activate/' . $e['id']); ?>"
                                          class="btn btn-success btn-xs">Activate</a>
                                  <?php } else { ?>
                                  <a href="<?php echo site_url('users/edit_user/' . $e['id']); ?>"
                                          class="btn btn-info btn-xs">Edit</a>
                                  <?php } ?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$this->db->select('plan_id')->from('level_wise_income')->group_by('plan_id')->order_by('plan_id', 'ASC');
$plans = $this->db->get()->result_array();
?>

<?php if(count($plans)>0) { ?>
  <div class="content" id="level">
      <div class="container-fluid">
          <div class="row">
             <div class="col-md-12">
                  <div class="card">
                      <div class="card-header card-header-primary" style="background: #200087;">
                          <h4 class="card-title" style="color:white;"><?php echo $this->db_model->select('income_name', 'level_wise_income');?></h4>
                          <p class="card-category" style="color:white;font-size: 12px;" > Here is the latest <?php echo $this->db_model->select('income_name', 'level_wise_income'); ?> report</p>
                      </div>

                      <?php foreach ($plans as $plan):
                        $this->db->select('*')->from('level_wise_income')->where(array('plan_id' => $plan['plan_id']))->order_by('level_no', 'ASC');
                        $inc = $this->db->get()->result();
                        $plan_name = $this->db_model->select('plan_name', 'plans', array('id' => $plan['plan_id']));
                      ?>

                      <h3 style="text-align: center;">Plan Name : <?php echo $plan_name;?></h3>

                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-hovered">
                                  <thead>
                                  <tr style="font-weight: 800">
                                      <th>Level #</th>
                                      <th>Downline Required</th>
                                      <th>Direct Required</th>
                                      <th>Total Upgrade</th>
                                      <th>Member Income</th>
                                      <th>Admin Upgrade Income</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                      <?php $si=1; foreach ($inc as $e): ?>
                                      <tr>
                                          <td><?php $si++; echo $e->level_no; ?></td>
                                          <?php if($si==2) { ?>
                                              <td><?php echo $e->total_member ?></td>
                                              <td><?php echo $e->direct ?></td>
                                          <?php } else { ?>
                                          <td><?php echo '+'.$e->total_member ?></td>
                                          <td><?php echo '+'.$e->direct ?></td>
                                          <?php } ?>
                                          <td>
                                          <?php echo $this->db->query("
                                           SELECT count(distinct userid) as count FROM earning 
                                           WHERE type = '".$e->income_name."'
                                           AND secret= ".$e->id)->result_array()[0]['count'];?></td>
                                          <td><a = href="<?php echo site_url('income/view_level_achievers/0/'.$e->id); ?>"><?php echo $this->db_model->sum('amount', 'earning', array('type'=>$e->income_name,'secret'=>$e->id)); ?></a></td>
                                          <td><a = href="<?php echo site_url('income/view_level_achievers/1/'.$e->id); ?>"><?php echo $this->db_model->sum('amount', 'earning', array('userid'=>'admin','type'=>'Level Upgrade Fee','secret'=>$e->id)); ?></a></td>
                                      </tr>
                                  <?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <?php endforeach; ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
<?php } ?>

<?php
if(config_item('enable_club_income')=='Yes'){ ?>
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
                                                <th>Total Amount</th>
                                                <th>Total Achievers</th>
                                                <th>Statement</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>4 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'4 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '4 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/4 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>16 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'16 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '16 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/16 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>64 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'64 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '64 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/64 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>256 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'256 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '256 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/256 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>1024 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'1024 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '1024 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/1024 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>4096 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'4096 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '4096 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/4096 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>16,384 Star Club Income</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'16384 Star Club Income')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <?php if($amount>0) { ?>
                                                    <td>
                                                      <?php echo $this->db->query("
                                                       SELECT count(distinct userid) as count FROM earning
                                                       WHERE pair_names = '16384 Star Club Income'")->result_array()[0]['count']; ?>
                                                    </td>
                                                    <td>
                                                      <a href="<?php echo site_url('income/search/All/16384 star club income') ?>" class="btn btn-success">View</a>
                                                    </td>
                                                    <?php } else { ?>
                                                    <td>0</td>
                                                    <td><a href="#" class="btn btn-danger">No Earnings</a></td>
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
                                                    <?php $amount = $this->db_model->sum('amount','earning', array('pair_names'=>'Education Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Education Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Tour Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Tour Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Tour Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Royalty Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Royalty Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Royalty Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Car Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Car Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Car Fund') ?>" class="btn btn-success">View</a>
                                                      <?php } else { ?>
                                                      <a href="#" class="btn btn-danger">No Earnings</a>
                                                      <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Home Fund</td>
                                                    <?php $amount = $this->db_model->sum('amount','earning', array( 'pair_names'=>'Home Fund')); ?>
                                                    <td><?php echo config_item('currency') .$amount ?></td>
                                                    <td>
                                                      <?php if($amount>0) { ?>
                                                      <a href="<?php echo site_url('income/search/All/Home Fund') ?>" class="btn btn-success">View</a>
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

<div class="row" style="display: none;">
    <div class="col-md-4 col-lg-offset-1">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          <div class="ct-chart" id="dailySalesChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Daily Enrollment</h4>
          <!--
          <p class="card-category">
            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
        -->
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> updated 4 minutes ago
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-lg-offset-1">
      <div class="card card-chart">
        <div class="card-header card-header-warning">
          <div class="ct-chart" id="websiteViewsChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Email Subscriptions</h4>
          <!--
          <p class="card-category">Last Campaign Performance</p> -->
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4" style="display: none;">
      <div class="card card-chart">
        <div class="card-header card-header-danger">
          <div class="ct-chart" id="completedTasksChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Completed Tasks</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="material-icons">access_time</i> campaign sent 2 days ago
          </div>
        </div>
      </div>
    </div>
</div>