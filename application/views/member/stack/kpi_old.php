

<?php if(config_item('crowdfund_type') == "Manual_Peer_to_Peer"){ ?>
    
        <div class="col-lg-3 col-md-6 col-sm-4 ">
            <div class="card card-stats ">
                <div class="card-header card-header-warning card-header-icon">
                   <div class="card-icon">
                     <i class="material-icons">people</i>
                   </div>
                   <p class="card-category">Total Team</p>
                   <h3 class="card-title">
                     <?php echo $member_data['member']->total_downline; ?>
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
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Direct Team</p>
                  <h3 class="card-title">
                    <?php echo $member_data['direct_team']; ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats card-header-info">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='<?php echo config_item('cur'); ?>'></i>
                  </div>
                  <p class="card-category">Total Earned</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . $member_data['total_earned']; ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">arrow_upward</i>
                  </div>
                  <p class="card-category">Current Level</p>
                  <h3 class="card-title">
                    <?php echo $member_data['member']->gift_level; ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
            </div>
        </div>   
<?php } else { ?>
<?php if(config_item('width') == '2' ) { ?>
    <?php if(config_item('enable_pv')=='Yes') { ?>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people</i>
              </div>
              <p class="card-category">Left PV</p>
              <h3 class="card-title" style="color:blue;">
                <?php  echo $member_data['member']->total_a_pv; ?>
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
                <?php  echo $member_data['member']->total_b_pv; ?>
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
                <!--<i class="material-icons">store</i>-->
              </div>
              <p class="card-category">My PV</p>
              <h3 class="card-title" style="color:blue;">
                <?php echo $member_data['member']->mypv; ?>
                </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Till Date
              </div>
            </div>
          </div>
        </div>
    <?php } else { ?>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people</i>
              </div>
              <p class="card-category">Left Count</p>
              <h3 class="card-title" style="color:blue;">
                <?php echo $member_data['member']->total_a; ?>
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
              <p class="card-category">Right Count</p>
              <h3 style="color:blue;" class="card-title">
                <?php echo $member_data['member']->total_b; ?>
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
              <p class="card-category">Today's Pairs</p>
              <h3 class="card-title" style="color:blue;">
                <?php echo $member_data['today_pairs']; ?>
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
                <div class="card-header card-header-warning card-header-icon">
                   <div class="card-icon">
                      <i class ='<?php echo config_item('cur'); ?>'></i>
                    </div>
                    <p class="card-category">Total Earned</p>
                    <h3 style="color:blue;" class="card-title">
                       <?php echo config_item('currency') . $member_data['total_earned']; ?>
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
              <p class="card-category">Referral Income</p>
              <h3 style="color:blue;" class="card-title">
                <?php echo config_item('currency') . $member_data['referral_income']; ?>
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
                   <p class="card-category">Wallet Balance</p>
                   <h3 v class="card-title" style="color:blue;">
                     <?php echo config_item('currency').$member_data['wallet_balance'];?>
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
                    <p class="card-category">Paid Payout</p>
                    <h3 style="color:blue;" class="card-title">
                    <?php echo config_item('currency') . $member_data['paid_payout']; ?>
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
                       <p class="card-category">Pending Payout</p>
                       <h3 style="color:blue;" class="card-title">
                         <?php echo config_item('currency') . $member_data['pending_payout']; ?>
                        </h3>
                 </div>
                 <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">date_range</i> Till Date
                      </div>
                 </div>
              </div>
        </div>
<?php } else { ?>
<?php if(config_item('width') == '1') { ?>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                   <div class="card-icon">
                     <i class="material-icons">people</i>
                   </div>
                   <p class="card-category">Total Team</p>
                   <h3 class="card-title">
                     <?php
                     $total_dc = $this->db_model->sum('direct', 'level_wise_income', array('level_no <=' => $member_data['member']->gift_level+1));
                     $prev_total = $this->db_model->sum('total_member', 'level_wise_income', array('level_no <=' => $member_data['member']->gift_level));
                     $prev_total = $prev_total > 0 ? $prev_total : 0;
                     if($direct_team >= $total_dc) {
                     echo $member_data['member']->total_downline; } else {
                        echo $prev_total;
                     } ?>
                   </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                    </div>
                </div>
            </div>
        </div>
    <?php } else if($member_data['pd']->auto_pool=='Yes'){ ?>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                   <div class="card-icon">
                     <i class="material-icons">people</i>
                   </div>
                   <p class="card-category">Total Downline</p>
                   <h3 class="card-title">
                     <?php echo $member_data['level_details']->total_downline; ?>
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
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                   <div class="card-icon">
                     <i class="material-icons">people</i>
                   </div>
                   <p class="card-category">Total Team</p>
                   <h3 class="card-title">
                     <?php echo $member_data['level_details']->total_downline; ?>
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
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
         <i class="material-icons">how_to_reg</i>
                  </div>
                  <p class="card-category">Direct Team</p>
                  <h3 class="card-title">
                    <?php echo $member_data['direct_team']; ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats bg-warning">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class ='material-icons'>attach_money</i>
                  </div>
                  <p class="card-category">Total Earned</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . $member_data['total_earned']; ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
            </div>
        </div>
    <?php if(config_item('enable_pv')=='Yes') { ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class ='<?php echo config_item('cur'); ?>'></i>
              </div>
              <p class="card-category">My PV</p>
              <h3 class="card-title" style="color:blue;">
                <?php echo $member_data['member']->mypv; ?>
                </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Till Date
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class ='<?php echo config_item('cur'); ?>'></i>
              </div>
              <p class="card-category">Downline PV</p>
              <h3 class="card-title" style="color:blue;">
                <?php  echo $member_data['member']->downline_pv; ?>
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
    <?php if(config_item('enable_crowdfund')=='Yes') { ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats" style="color: orange;">
            <div class="layer"></div>
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                      <i class ='material-icons'>
account_balance_wallet
</i>
              </div>
              <p class="card-category">Latest Income</p>
              <h3 style="color:blue;" class="card-title">

                <?php
                $this->db->select('amount, ref_id')->from('earning')->where(array('userid'=> $this->session->user_id,))->order_by('id', 'DESC')->limit(1);
                $data = $this->db->get()->result_array();
                if ($data[0]['amount'] == "") {
                    echo config_item('currency') . '0';
                } else {
                    echo config_item('currency') . $data[0]['amount'];
                } ?>
                </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Ref ID: <?php if($data[0]['ref_id'] > 0) {echo $data[0]['ref_id']; } else { echo 'None'; } ?>
              </div>
            </div>
          </div>
        </div>
    <?php } else { ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class ='<?php echo config_item('cur'); ?>'></i>
              </div>
              <p class="card-category">Referral Income</p>
              <h3 style="color:blue;" class="card-title">
                <?php echo config_item('currency') . $member_data['referral_income']; ?>
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
                  <p class="card-category">Level Income</p>
                    <h3 class="card-title">
                      <?php echo config_item('currency') . $member_data['level_income']; ?>
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
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats  bg-primary">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon ">
                    <i class ='material-icons'>account_balance</i>
                  </div>
                  <p class="card-category">Wallet Balance</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency').$member_data['wallet_balance'];?>
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
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon" >
                    <i class ='material-icons'>money</i>
                  </div>
                  <p class="card-category">Paid Payout</p>
                  <h3 class="card-title">
                    <?php echo config_item('currency') . $member_data['paid_payout']; ?>
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Till Date
                  </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-4">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                   <div class="card-icon">
                     <i class ='<?php echo config_item('cur'); ?>'></i>
                   </div>
                   <p class="card-category">Pending Payout</p>
                   <h3 class="card-title">
                     <?php echo config_item('currency') . $member_data['pending_payout']; ?>
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
<?php } ?>
</div>
<?php if(config_item('extend_kpi')=='Yes'){ ?>
    <div class="row">
        <?php if(config_item('width')==2) { ?>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class ='<?php echo config_item('cur'); ?>'></i>
                    </div>
                    <p class="card-category">Direct Left</p>
                    <h3 class="card-title">
                      <?php echo $member_data['direct_left']; ?>
                      </h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Till Date
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class ='<?php echo config_item('cur'); ?>'></i>
                    </div>
                    <p class="card-category">Direct Right</p>
                    <h3 class="card-title">
                      <?php echo $member_data['direct_right']; ?>
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
                       <p class="card-category">Matching</p>
                       <h3 style="color:blue;" class="card-title">
                          <?php echo config_item('currency') . $member_data['matching_income']; ?>
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
        <?php if($member_data['payout']->repurchase_deduct>0){ ?>
            <div class="col-lg-3 col-md-6 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                       <div class="card-icon">
                         <i class ='<?php echo config_item('cur'); ?>'></i>
                       </div>
                       <p class="card-category">Shopping Wallet</p>
                       <h3 class="card-title">
                         <?php echo config_item('currency') . $this->db_model->select('balance', 'other_wallet', array('userid' => $this->session->user_id, 'type'=>'Repurchase'));; ?>
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
                  <div class="card-header card-header-success card-header-icon">
                     <div class="card-icon">
                       <i class="material-icons">people</i>
                     </div>
                     <p class="card-category">Active Referral</p>
                     <h3 class="card-title">
                       <?php echo $member_data['active_team']; ?>
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
                     <p class="card-category">Inactive Referral</p>
                     <h3 class="card-title">
                       <?php echo $member_data['direct_team']-$member_data['active_team']; ?>
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
                     <p class="card-category">Potent Income</p>
                     <h3 class="card-title">
                       <?php echo $member_data['potential_earnings']; ?>
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
        <?php if(config_item('enable_group_income')=='Yes'){ ?>
          <div class="col-lg-3 col-md-6 col-sm-4">
              <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                     <div class="card-icon">
                       <i class="material-icons">people</i>
                     </div>
                     <p class="card-category">Active Point</p>
                     <h3 class="card-title">
                       <?php echo floor($member->mypv/6000); ?>
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
        <?php if(config_item('same_tree')=='Yes'){ ?>
          <div class="col-lg-3 col-md-6 col-sm-4">
              <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class ='<?php echo config_item('cur'); ?>'></i>
                    </div>
                    <p class="card-category">Further Earned</p>
                    <h3 class="card-title">
                      <?php echo config_item('currency') . $member_data['Further_earned']; ?>
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
    </div>
<?php } ?>


