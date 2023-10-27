<div class="app-content content">

    <div class="content-overlay"></div>

    <div class="content-wrapper">
 <?php if($this->db_model->count_all('transaction', array('to_userid'=>'admin', 'status'=>'Processing'))>0){ ?>
              <div class="alert alert-success" align="center">
              You have Received Bank Deposits from Members !!! Please <a href="<?php echo site_url('income/bank_payment') ?>" style='color: blue;'> Click Here </a> to Approve the payment !!!
              </div>
              <?php } ?>

        <div class="content-header row">

        </div>

        <div class="content-body">

<?php if(config_item('crowdfund_type') == "Manual_Peer_to_Peer"){ ?>
   
 <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-4">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
               <div class="card-icon">
                 <i class="material-icons">people</i>
               </div>
              <p class="card-category">Total Team</p>
               <h3 class="card-title">
                 <?php echo $this->db_model->count_all('member')-1; ?>
               </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">update</i> Just Updated
                </div>
            </div>
           
 </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class ='<?php echo config_item('cur'); ?>'></i>
            </div>
            <p class="card-category">Joining Amount</p>
            <h3 class="card-title">
              <?php echo config_item('currency') . round($reg_income,0) ?>
              </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> Till Date
            </div>
          </div>
        </div>
     </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class ='<?php echo config_item('cur'); ?>'></i>
            </div>
            <p class="card-category">Admin Income</p>
            <h3 class="card-title">
              <?php echo config_item('currency') . round($earnings,0) ?>
              </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">update</i> Just Updated
            </div>
          </div>
        </div>
    </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class ='<?php echo config_item('cur'); ?>'></i>
            </div>
            <p class="card-category">Member Income</p>
            <h3 class="card-title">
              <?php echo config_item('currency') . round($member_income,0) ?>
              </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">date_range</i> Till Date
            </div>
          </div>
        </div>
    </div>
</div>
<?php } else { ?>
   <?php if(config_item('leg')=='2') { ?>
        <div class="row">
          <?php if(config_item('enable_pv')=='Yes') { ?>
              <div class="col-lg-3 col-md-6 col-sm-4">
                  <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">people</i>
                    </div>
              <p class="card-category">Left PV</p>
                    <h3 class="card-title" style="color:blue;">
                      <?php  echo $this->db_model->select('total_a_pv', 'member', array('id' => config_item('top_id'))); ?>
                    </h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-4">
                  <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">people</i>
                    </div>
                  <p class="card-category">Right PV</p>
                    <h3 style="color:blue;" class="card-title">
                      <?php  echo $this->db_model->select('total_b_pv', 'member', array('id' => config_item('top_id'))); ?>
                    </h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                    </div>
                  </div>
              </div>
          <?php } else { ?>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">people</i>
                    </div>
                    <p class="card-category">Left Count</p>
                    <h3 class="card-title" ><?php  $detail = $this->db_model->select('total_a', 'member', array('id' => config_item('top_id')));
                      echo $detail; ?>
                    </h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                     </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">people</i>
                    </div>
                    <p class="card-category">Right Count</p>
                    <h3 class="card-title" ><?php  $detail = $this->db_model->select('total_b', 'member', array('id' => config_item('top_id')));
                      echo $detail; ?>
                    </h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
              </div>
                </div>
              </div>
          <?php } ?>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Admin Income</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($earnings,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Today's Income</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($earnings_today,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Referrals Paid</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($direct_referral_income,0); ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Member Income</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($member_income,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Paid Payout</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($paid_payout,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Pending Payout</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($pending_payout,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
          </div>
        </div>
    <?php } else if(config_item('enable_crowdfund')=='Yes'){ ?>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">people</i>
                </div>
                <p class="card-category">Total Team</p>
                <h3 class="card-title"><?php echo $this->db_model->count_all('member')-1; ?>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">update</i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class ='<?php echo config_item('cur'); ?>'></i>
                </div>
                <p class="card-category">Joining Amount</p>
                <h3 class="card-title">
                  <?php echo config_item('currency') . round($reg_income,0) ?>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Till Date
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class ='<?php echo config_item('cur'); ?>'></i>
                </div>
                <p class="card-category">Admin Income</p>
                <h3 class="card-title">
                  <?php echo config_item('currency') . round($earnings,0) ?>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">update</i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Today's Income</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($earnings_today,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class ='<?php echo config_item('cur'); ?>'></i>
                </div>
                <p class="card-category">Referrals Paid</p>
                <h3 class="card-title">
                  <?php echo config_item('currency') . round($direct_referral_income,0); ?>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Till Date
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class ='<?php echo config_item('cur'); ?>'></i>
                </div>
                <p class="card-category">Member Income</p>
                <h3 class="card-title">
                  <?php echo config_item('currency') . round($member_income,0) ?>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Till Date
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class ='<?php echo config_item('cur'); ?>'></i>
                </div>
                <p class="card-category">Paid Payout</p>
                <h3 class="card-title">
                  <?php echo config_item('currency') . round($paid_payout,0) ?>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Till Date
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class ='<?php echo config_item('cur'); ?>'></i>
                </div>
                <p class="card-category">Pending Payout</p>
                <h3 class="card-title" >
                  <?php echo config_item('currency') . round($pending_payout,0) ?>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Till Date
                </div>
              </div>
            </div>
          </div>
        </div>
    
    <?php } else { ?>
   <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">people</i>
                  </div>
                  <p class="card-category">Total Team</p>
                  <h3 class="card-title"><?php echo $this->db_model->count_all('member')-1; ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Admin Income</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($earnings,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Today's Income</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($earnings_today,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Referrals Paid</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($direct_referral_income,0); ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Level Income</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($level_income,0); ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Member Income</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($member_income,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Paid Payout</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . round($paid_payout,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Pending Payout</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($pending_payout,0) ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
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
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">First Pair Paid</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($first_pair_income,0); ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Matching Paid</p>
                  <h3 class="card-title" >
                    <?php echo config_item('currency') . round($matching_income,0); ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
              </div>
            </div>
       
               <?php } ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class ='<?php echo config_item('cur'); ?>'></i>
                </div>
                <p class="card-category">Member Wallet</p>
                <h3 class="card-title" >
                  <?php echo config_item('currency') . round($wallet_balance,0); ?>
                  </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">date_range</i> Till Date
                </div>
              </div>
            </div>
        </div>
         <?php if(config_item('enable_roi')=='Yes'){ ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class ='<?php echo config_item('cur'); ?>'></i>
                    </div>
                    <p class="card-category">ROI Paid</p>
                    <h3 class="card-title" >
                      <?php echo config_item('currency') . round($roi,0); ?>
                      </h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Till Date
                    </div>
                  </div>
                </div>

            </div>
       <?php } ?>
        <?php if($repurchase_deduct>0){ ?>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                     <div class="card-icon">
                       <i class ='<?php echo config_item('cur'); ?>'></i>
                     </div>
                     <p class="card-category">shopping Wallet</p>
                     <h3 class="card-title">
                       <?php echo config_item('currency') . $shop_wallet; ?>
                     </h3>
                  </div>
                  <div class="card-footer">
                     <div class="stats">
                       <i class="material-icons">date_range</i> Till Date
                     </div>
                  </div>
                 </div>
            </div>
        <?php } ?>
        <?php if($renewal_amount > 0) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                      <div class="card-icon">
                        <i class ='<?php echo config_item('cur'); ?>'></i>
                      </div>
                      <p class="card-category">Renewals</p>
                      <h3 class="card-title" >
                        <?php echo config_item('currency') . round($renewal_amount,0);?>
                        </h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">date_range</i> Till Date
                      </div>
                    </div>
                </div>

            </div>
               <?php } ?>
        <?php if($target_income > 0 ) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                      <div class="card-icon">
                        <i class ='<?php echo config_item('cur'); ?>'></i>
                      </div>
                      <p class="card-category">Target Income</p>
                      <h3 class="card-title" >
                        <?php echo config_item('currency') . round($target_income,0); ?>
                        </h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">date_range</i> Till Date
                      </div>
                    </div>
                </div>
              
            </div>
       <?php } ?>
        <?php if (config_item('free_registration')=='Yes'){ ?>
            <div class="col-lg-3 col-md-6 col-sm-4">
              <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                     <div class="card-icon">
                       <i class="material-icons">people</i>
                     </div>
                     <p class="card-category">Active Team</p>
                     <h3 class="card-title">
                       <?php echo $total_active; ?>
                     </h3>
                  </div>
                  <div class="card-footer">
                      <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4">
              <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                     <div class="card-icon">
                       <i class="material-icons">people</i>
                     </div>
                     <p class="card-category">Inactive Team</p>
                     <h3 class="card-title">
                       <?php echo $total_inactive; ?>
                     </h3>
                  </div>
                  <div class="card-footer">
                      <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                      </div>
                  </div>
              </div>
            </div>
   
        <?php } ?>
<div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                   <div class="card-icon">
                     <i class ='<?php echo config_item('cur'); ?>'></i>
                   </div>
                   <p class="card-category">Last Month Income</p>
                   <h3 class="card-title">
                     <?php echo config_item('currency') . round($earnings_last_month,0) ?>
                   </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
          </div>
    </div>
<?php } ?>
</div>
</div>
</div>