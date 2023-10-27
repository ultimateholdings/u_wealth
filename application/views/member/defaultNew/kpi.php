<style>body{background: url('<?php echo base_url();?>/uploads/site_img/back.png');
    background-size: cover;
    background-color: #eee;
    background-attachment: fixed;}</style>

<?php if(config_item('crowdfund_type') == "Manual_Peer_to_Peer"){ ?>
    <div class="row">
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
                                       <span class="total-gmlm Single first">Total Team</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                      <?php echo $member_data['member']->total_downline; ?>
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
                                       <span class="total-gmlm Single first">Direct Team</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                       <?php echo $member_data['direct_team']; ?>
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
                                  <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Current ID Earnings</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                        <?php echo config_item('currency') . $member_data['total_earned']; ?>
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
                                       <span class="total-gmlm Single first">Current Level</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                        <?php echo $member_data['member']->gift_level; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
          </div>
          
<?php } else { ?>
<?php if(config_item('width') == '2' ) { ?>
    <?php if(config_item('enable_pv')=='Yes') { ?>

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
                                       <span class="total-gmlm Single first">Left UP</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                          <?php  echo $member_data['member']->total_a_pv; ?>
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
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">Right UP</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                          <?php  echo $member_data['member']->total_b_pv; ?>
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
                                  <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                               </div>
                          </div>
                          <div class="col-lg-7">
                                 <div class="layer-content">
                                    <h4 class="total-gmlm">
                                       <span class="total-gmlm Single first">My UP</span>
                                    </h4>
                                    <h1 class="total-gmlm Single">
                                   <span class="total-gmlm Single first" data-count="31">    
                                         <?php echo $member_data['member']->mypv; ?>
                                   </span>
                                    </h1>
                                 </div>
                          </div>
                   </div>
              </div>
        </div>
        
    <?php } else { ?>
  
        <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Left Count</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                          <?php echo $member_data['member']->total_a; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
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
                                    <span class="total-gmlm Single first">Right Count</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                          <?php echo $member_data['member']->total_b; ?>
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
                                <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Todays Pairs</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                          <?php echo $member_data['today_pairs']; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
    
    <?php } ?>
        <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-2">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Current ID Earnings</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo config_item('currency') . $member_data['total_earned']; ?>
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
                            <span class="total-gmlm Single first">All Account Earnings</span>
                          </h4>
                          <h1 class="total-gmlm Single">
                            <span class="total-gmlm Single first" data-count="31">           
                               <?php echo config_item('currency') . $member_data['myaccount_total_earned']; ?>
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
                                    <span class="total-gmlm Single first">Referral Income</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo config_item('currency') . $member_data['referral_income']; ?>
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
                                <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Binary Income </span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                     <?php echo config_item('currency').$member_data['binary_income'];?>   
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
                                    <span class="total-gmlm Single first">Upgrade Income</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                         <?php echo $member_data['upgrade_income']; ?>
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
                                <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Wallet Balance</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                     <?php echo config_item('currency').$member_data['wallet_balance'];?>   
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
                                <img src="<?php echo site_url('uploads/site_img/dash5.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Voucher Balance</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                     <?php echo number_format($member_data['voucher_balance']/35, 2, '.', '');?>   
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
                                <?php echo config_item('currency') . $member_data['paid_payout']; ?>
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
                                <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Pending  Payout</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                <?php echo config_item('currency') . $member_data['pending_payout']; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
   
<?php } else { ?>
<?php if(config_item('width') == '1') { ?>
        <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-2">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Total Team</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                 <?php
                                $total_dc = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $member_data['member']->gift_level+1));
                                $prev_total = $this->db_model->sum('total_member', 'level_wise_income', array(' level_no <=' => $member_data['member']->gift_level));
                                   $prev_total = $prev_total > 0 ? $prev_total : 0;
                               if($direct_team >= $total_dc) {
                              echo $member_data['member']->total_downline; } else {
                              echo $prev_total; } ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
       
    <?php } else if($member_data['pd']->auto_pool=='Yes'){ ?>
         <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-2">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Total Downline</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                <?php echo $member_data['level_details']->total_downline; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
       
    <?php } else { ?>
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
                                    <span class="total-gmlm Single first">Total Team</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                          <?php echo $member_data['level_details']->total_downline; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
      
    <?php } ?>
       <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-referel-2">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Direct Team</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                   <?php echo $member_data['direct_team']; ?>
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
                                    <span class="total-gmlm Single first">Current ID Earnings</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo config_item('currency') . $member_data['total_earned']; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
        
      
    <?php if(config_item('enable_pv')=='Yes') { ?>
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
                                    <span class="total-gmlm Single first">My PV</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                         <?php echo $member_data['member']->mypv; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-1">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Downline PV</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php  echo $member_data['member']->downline_pv; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
 
      
    <?php } else { ?>
    <?php if(config_item('enable_crowdfund')=='Yes') { ?>
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
                                    <span class="total-gmlm Single first">Latest Income</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php
                                      $this->db->select('amount, ref_id')->from('earning')->where(array('userid'=> $this->session->user_id,))->order_by('id', 'DESC')->limit(1);
                                      $data = $this->db->get()->result_array();
                                      if ($data[0]['amount'] == "") {
                                          echo config_item('currency') . '0';
                                      } else {
                                          echo config_item('currency') . $data[0]['amount'];
                                      } ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
                   <div class="card-footer">
                      <div class="stats">
                       <i class="material-icons">date_range</i> Ref ID: <?php if($data[0]['ref_id'] > 0) {echo $data[0]['ref_id']; } else { echo 'None'; } ?>
                     </div>
                  </div>
              </div>
        </div>
       
    <?php } else { ?>
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
                                    <span class="total-gmlm Single first">Referral Income</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo config_item('currency') . $member_data['referral_income']; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
       
    <?php } ?>
        <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-count-1">
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
                                       <?php echo config_item('currency') . $member_data['level_income']; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
       
    <?php } ?>
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
                                    <span class="total-gmlm Single first">Wallet Balance</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo config_item('currency') . $member_data['wallet_balance']; ?>
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
                                <img src="<?php echo site_url('uploads/site_img/dash3.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Paid Payout</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo config_item('currency') . $member_data['paid_payout']; ?>
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
                                    <span class="total-gmlm Single first">Pending Payout</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo config_item('currency') . $member_data['pending_payout']; ?>
                                    </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
      
    <?php } ?>
<?php } ?>
<?php if(config_item('extend_kpi')=='Yes'){ ?>
    
        <?php if(config_item('width')==2) { ?>
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
                                    <span class="total-gmlm Single first">Direct Left</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                           <?php echo $member_data['direct_left']; ?> </span>
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
                                    <span class="total-gmlm Single first">Direct Right</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                           <?php echo $member_data['direct_right']; ?> </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
     <!--     <div class="col-lg-4 col-md-6 col-sm-6">
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
                                    <span class="total-gmlm Single first">Matching Income</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                     <?php echo config_item('currency') . $member_data['matching_income']; ?></span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
            </div> -->
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
                                        <span class="total-gmlm Single first">Team Purchase</span>
                                      </h4>
                                      <h1 class="total-gmlm Single">
                                        <span class="total-gmlm Single first" data-count="31">  <?php echo config_item('currency') . $member_data['total_downline_income']; ?></span>
                                     </h1>
                              </div>
                          </div>
                       </div>
                  </div>
            </div>


<!--          <div class="col-lg-4 col-md-6 col-sm-6">
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
                                    <span class="total-gmlm Single first"> Total Wallet transaction</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">  <?php echo config_item('currency') . $member_data['wallet_transaction']; ?></span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
 -->
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
                                    <span class="total-gmlm Single first">Personal Purchase</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                     <?php echo config_item('currency') . $member_data['all_transaction']; ?></span>
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
                                <img src="<?php echo site_url('uploads/site_img/dash2.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Leadership Paid</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                <?php echo config_item('currency') . $member_data['leadership_paid']; ?>
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
              <div class="layers-body card-income-1">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Shopping Wallet</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                      <?php echo config_item('currency') . $this->db_model->select('balance', 'other_wallet', array('userid' => $this->session->user_id, 'type'=>'Repurchase')); ?></span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
        <?php } ?>
        <?php if (config_item('free_registration')=='Yes'){ ?>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-income-1">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Active Referral</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                       <?php echo $member_data['active_team']; ?></span>
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
                                <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">InActive Referral</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                         <?php echo $member_data['direct_team']-$member_data['active_team']; ?>
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
                                <img src="<?php echo site_url('uploads/site_img/dash4.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Potent Income</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                           <?php echo $member_data['potential_earnings']; ?>  </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>
      
        <?php } ?>
        <?php if(config_item('enable_group_income')=='Yes'){ ?>
           <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-1">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash6.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Active Points</span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                      <?php echo floor($member->mypv/6000); ?>  </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>     
          
        <?php } ?>
        <?php if(config_item('same_tree')=='Yes'){ ?>
               <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="layers-body card-paid-1">
                 <div class="row align-items-center">
                      <div class="col-lg-5">
                            <div class="layer-thumb text-center">
                                <img src="<?php echo site_url('uploads/site_img/dash6.png') ?>" alt="" class="img-fluid">
                            </div>
                      </div>
                      <div class="col-lg-7">
                          <div class="layer-content">
                                 <h4 class="total-gmlm">
                                    <span class="total-gmlm Single first">Further Earned </span>
                                  </h4>
                                  <h1 class="total-gmlm Single">
                                    <span class="total-gmlm Single first" data-count="31">           
                                    <?php echo config_item('currency') . $member_data['Further_earned']; ?>  </span>
                                 </h1>
                          </div>
                      </div>
                   </div>
              </div>
        </div>     
          
        <?php } ?>
    </div>
<?php } ?>

