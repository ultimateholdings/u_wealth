<style>body{background: blue;}</style>
<div class="row align-items-center">
      <div class="col-md-6">
          <h3 class="mb-0 mt-0 font-weight-bold " id="dashboard_fullname">Hello Admin</h3>
      </div>
      <div class="col-md-6">
         <div class="time text-right">
             <div id="datetime1" align="right"><?php echo date("m/d/Y h:i:sa"); ?><p id="dt" class="mb-0 font-weight-bold"></p>
             </div>
          </div>
      </div>
</div>
<?php if(config_item('enable_live_meeting')=='Yes') { ?>

<?php
    $date=date('Y-m-d');
    $this->db->select('id,meet_name,description,date,time')->where('date',$date)
    ->order_by('id', 'ASC')->limit(1);
    
    $live_meeting = $this->db->get('live_meeting')->row_array();
    if(count($live_meeting)>0) { ?>
<div class="alert alert-light" style="background-color: white;">
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
            <a href="<?php echo site_url('admin/live_meeting_admin/'.$live_meeting['id']);?>" class="btn btn-xs btn-success" target="_blank">
                <i class="fa fa-video"></i>&nbsp;
                <?php echo 'Join live video meeting'; ?>
            </a>
            <br>
            <a href="<?php echo site_url('admin/upcomming_meetings');?>" class="btn btn-xs btn-primary" style="margin-top: 5px;">
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
<?php if(config_item('crowdfund_type') == "Manual_Peer_to_Peer"){ ?>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash6.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                         <div class="col-lg-7">
                         
                                <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Total Team</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">   <?php echo $this->db_model->count_all('member')-1; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
     </div>
     <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                         <div class="col-lg-7">
                         
                                <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Admin Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">  <?php echo config_item('currency') . round($earnings,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash1.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Joining Amount</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">   <?php echo config_item('currency') . round($reg_income,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash1.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">                <?php echo config_item('currency') . round($member_income,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
            </div>
      </div>
   <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Wallet</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                    <?php echo config_item('currency') . round($wallet_balance,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
         
    </div>   
<?php } else { ?>
    <?php if(config_item('leg')=='2') { ?>
     <div class="row">
          <?php if(config_item('enable_pv')=='Yes') { ?>
         <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Left UP</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php  echo $this->db_model->select('total_a_pv', 'member', array('id' => config_item('top_id'))); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Right UP</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php  echo $this->db_model->select('total_b_pv', 'member', array('id' => config_item('top_id'))); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
                   
       
          <?php } else { ?>
        <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">

                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                         <div class="col-lg-7">
                              
                                <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Left Count</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"><?php  $detail = $this->db_model->select('total_a', 'member', array('id' => config_item('top_id'))); echo $detail; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
      
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                <div class="row align-items-center">
                     <div class="col-lg-5">
                             <div class="layer-thumb text-center">
                                    <img src="<?php echo site_url('uploads/site_img/dash1.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                            <div class="layer-content">
                                <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Right Count</span>
                                </h4>
                                <h1 class="total-gmlm Single">
                                 <span class="total-gmlm Single first" data-count="31"><?php  $detail = $this->db_model->select('total_b', 'member', array('id' => config_item('top_id')));echo $detail; ?>
                                 </span>
                                </h1>
                             </div>
                       </div>
                     </div>
                </div>
              </div>
          <?php } ?>
          
          <div class="col-lg-4 col-md-6 col-sm-6">
            <a href="<?php echo site_url('income/view_earning') ?>" class="">
              <div class="layers-body card-paid-1">
                     <div class="row align-items-center">
                             <div class="col-lg-5">
                                <div class="layer-thumb text-center">
                                   <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                                      </div>
                                    </div>
                               <div class="col-lg-7">
                                    <div class="layer-content">
                                          <h4 class="total-gmlm">
                                             <span class="total-gmlm Single first">Admin Income</span>
                                          </h4>
                                           <h1 class="total-gmlm Single">
                                              <span class="total-gmlm Single first" data-count="31"><?php echo config_item('currency') . round($earnings,0) ?>
                                             </span>
                                           </h1>
                                     </div>

                              </div>

                     </div>
                  </div>
              </a>
          </div>

             <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-2">
                <div class="row align-items-center">
                             <div class="col-lg-5">
                                   <div class="layer-thumb text-center">
                                     <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                                            </div>
                              </div>
                             <div class="col-lg-7">
                                <div class="layer-content">
                                      <h4 class="total-gmlm">
                                         <span class="total-gmlm Single first">Today's Income</span>
                                       </h4>
                                        <h1 class="total-gmlm Single">
                                          <span class="total-gmlm Single first" data-count="31"> <?php echo config_item('currency') . round($earnings_today,0) ?></span>
                                         </h1>
                                  </div>
                                </div>

                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="layers-body card-referel-1">
                     <div class="row align-items-center">
                             <div class="col-lg-5">
                                   <div class="layer-thumb text-center">
                                      <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                                     </div>
                              </div>
                              <div class="col-lg-7">
                                <div class="layer-content">
                                      <h4 class="total-gmlm">
                                         <span class="total-gmlm Single first">Referrals Paid</span>
                                      </h4>

                                      <h1 class="total-gmlm Single">

                                          <span class="total-gmlm Single first" data-count="31">           <?php echo config_item('currency') . round($direct_referral_income,0); ?></span>

                                      </h1>
                                 </div>
                               </div>
                       </div>
                 </div>
              </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-2">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                 <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Member Income</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="countup total-gmlm Single first" data-count="31">           
                                      <?php echo config_item('currency') . round($member_income,0) ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
              </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="layers-body card-paid-2">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="layer-thumb text-center">

                                    <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Paid Payout</span>
                                    </h4>

                                    <h1 class="total-gmlm Single">

                                        <span class="total-gmlm Single first" data-count="31">                         <?php echo config_item('currency') . round($paid_payout,0) ?></span>

                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
             
             <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="layers-body card-paid-1">
                     <div class="row align-items-center">
                          <div class="col-lg-5">
                             <div class="layer-thumb text-center">
                                    <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="col-lg-7">
                                <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Pending Payout</span>
                                    </h4>

                                    <h1 class="total-gmlm Single">

                                        <span class="total-gmlm Single first" data-count="31">                          <?php echo config_item('currency') . round($pending_payout,0) ?></span>

                                    </h1>
                               </div>

                           </div>

                     </div>
                 </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Wallet</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                    <?php echo config_item('currency') . round($wallet_balance,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
         
        </div>
    <?php } else if(config_item('enable_crowdfund')=='Yes'){ ?>
        <div class="row">
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash6.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">TotalTeam</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php echo $this->db_model->count_all('member')-1; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
              
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Joining Amount</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php echo config_item('currency') . round($reg_income,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
          
              
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash1.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Admin Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">      <?php echo config_item('currency') . round($earnings,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
             <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Today's Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">  <?php echo config_item('currency') . round($earnings_today,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Refferals Paid</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">        <?php echo config_item('currency') . round($direct_referral_income,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php echo config_item('currency') . round($member_income,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Wallet</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                    <?php echo config_item('currency') . round($wallet_balance,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
         
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash6.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Paid Payout</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php echo config_item('currency') . round($paid_payout,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Pending Payout</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php echo config_item('currency') . round($pending_payout,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
      </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash1.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Total Team</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"> <?php echo $this->db_model->count_all('member')-1; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Admin Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31"><?php echo config_item('currency') . round($earnings,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
          
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Today's Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">     <?php echo config_item('currency') . round($earnings_today,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Referrals Paid</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                     <?php echo config_item('currency') . round($direct_referral_income,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Level Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                     <?php echo config_item('currency') . round($level_income,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash1.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                   <?php echo config_item('currency') . round($member_income,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Wallet</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                    <?php echo config_item('currency') . round($wallet_balance,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
         
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Paid Payout</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                    <?php echo config_item('currency') . round($paid_payout,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Pending Payout</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                    <?php echo config_item('currency') . round($pending_payout,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
          
        </div>
    <?php } ?>
<?php } ?>
<?php if(config_item('extend_kpi')=='Yes'){ ?>
    <div class="row">
        <?php if(config_item('width')==2){ ?>

           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-1">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash1.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Upgrade Income Paid</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                  <?php echo config_item('currency') . round($upgrade_income,0); ?>  
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Binary Paid</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                     <?php echo config_item('currency') . round($matching_income,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
           
            
        <?php } ?>
         
        <?php if(config_item('enable_roi')=='Yes'){ ?>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">ROI Paid</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                      <?php echo config_item('currency') . round($roi,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
           
        <?php } ?>
        <?php if(1==1){ ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">shopping Walle</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                         <?php echo config_item('currency') . $shop_wallet; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
           
        <?php } ?> 
        <?php if($renewal_amount > 0) { ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash6.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Renewals</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                         <?php echo config_item('currency') . round($renewal_amount,0);?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
        
        <?php } ?>
        <?php if($target_income > 0 ) { ?>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Target Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                     <?php echo config_item('currency') . round($target_income,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>
          
        <?php } ?>
        <?php if (config_item('free_registration')=='Yes'){ ?>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Active Team</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                     <?php echo $total_active; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash6.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">InActive Team</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                     <?php echo $total_inactive; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
    
        <?php } ?>
         <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Last Month Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                      <?php echo config_item('currency') . round($earnings_last_month,0) ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>


         <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Voucher</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                    <?php echo number_format($voucher_balance/35, 2, '.', ''); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>

           <div class="col-lg-4 col-md-6 col-sm-6">
                 <div class="layers-body card-paid-1">
                     <div class="row align-items-center">
                          <div class="col-lg-5">
                             <div class="layer-thumb text-center">
                                    <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                              </div>
                          </div>
                          <div class="col-lg-7">
                                <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Member Purchase</span>
                                    </h4>

                                    <h1 class="total-gmlm Single">

                                        <span class="total-gmlm Single first" data-count="31">                          <?php echo config_item('currency') . round($member_purchase,0) ?></span>

                                    </h1>
                               </div>

                           </div>

                     </div>
                 </div>
              </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="layers-body card-paid-2">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="layer-thumb text-center">

                                <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="layer-content">
                                <h4 class="total-gmlm">
                                   <span class="total-gmlm Single first">Leadership Paid</span>
                                </h4>

                                <h1 class="total-gmlm Single">

                                    <span class="total-gmlm Single first" data-count="31">                         <?php echo config_item('currency') . round($leadership_paid,0) ?></span>

                                </h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                   <div class="row align-items-center">
                          <div class="col-lg-5">
                              <div class="layer-thumb text-center">
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Admin Charge Income</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                     <?php echo config_item('currency') . round($admin_charge_income,0); ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
           </div>





       
    </div>
<?php } ?>