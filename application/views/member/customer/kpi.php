<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-4">
      <div class="card card-stats">
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
</div>