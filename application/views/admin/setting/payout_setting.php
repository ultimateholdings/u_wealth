<style type="text/css">
  .col-sm-6 {
    margin: 5px 0; 
  }
</style>

<?php echo form_open() ?>
<div class="row">
    <div class="col-sm-6">
        <label>Plan Commission *</label>
        <select class="form-control" name="plan_id" required>
            <?php foreach ($plans as $val) {
                echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
            } ?>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Payout TAX /TDS (%)</label>
        <input type="number" min="0" step="any" class="form-control" name="payout_tax">
    </div>
    <?php if(config_item('enable_kyc')=='1'){ ?>
    <div class="col-sm-6">
        <label>Payout TAX /TDS (%) in Case No PAN Card</label>
        <input type="number" min="0" step="any" class="form-control" name="no_pan_payout_tax">
    </div>
    <?php } ?>
    <div class="col-sm-6">
      <label>Admin Service Charge (%)</label>
        <input type="number" min="0" step="any" class="form-control" name="admin_charge">
    </div>
    <div class="col-sm-6">
      <label>Deduct Admin Service Charge</label>
        <select class="form-control" name="admin_charge_type">
                <option value="DDP">Deduct During Payouts</option>
                <option value="DDE">Deduct During Earnings</option>
          </select>
    </div>
    <div class="col-sm-6">
       <label>Allow User to Withdraw Fund</label>
          <select id = 'withdraw' class="form-control" name="user_withdraw">
              <option>Yes</option>
              <option>No</option>
          </select>
    </div>
    <div id = 'min' class="col-sm-6">
        <label>Min amount allowed to Withdraw (in <?php echo config_item('currency') ?> )</label>
        <input type="number" min="0" class="form-control" name="min_withdraw">
    </div>
    <div id = 'cap' class="col-sm-6">
        <label>Daily Capping (in <?php echo config_item('currency') ?> )</label>
         <input type="number" min="0" class="form-control" name="daily_capping">
    </div>
    <div id = 'min_direct' class="col-sm-6">
        <label>Min Direct Sponsor to Withdraw</label>
        <input type="number" min="0" class="form-control" name="min_sponsor">
    </div>
    <?php if(config_item('enable_repurchase')=='Yes'){ ?>
    <div class="col-sm-6">
        <label>% deduction to Repurchase Wallet</label>
        <input type="number" min="0" class="form-control" name="repurchase_deduct">
    </div>
    <?php } ?>
    <div class="col-sm-6">
       <label>Allow Member to Member Fund Transfer</label>
          <select id = 'fund_transfer' class="form-control" name="fund_transfer">
              <option>No</option>
              <option>Yes</option>
          </select>
    </div>
    <div class="col-sm-6">
       <label>Allow User to Generate Epin</label>
          <select id = 'user_epin' class="form-control" name="user_epin">
              <option>Yes</option>
              <option>No</option>
          </select>
    </div>
   <!--  <div id="user_epin_charge_id"> -->
  <!--    <div id="timings" style="width: 100%;">
    <div class="col-sm-6">
        <label>Payout Request Start Time:</label>
            <input type="time" class="form-control" id="payout_start" name="payout_start">
        </select>
    </div>
    <div class="col-sm-6">
        <label>Payout Request End Time:</label>
            <input type="time" class="form-control" id="payout_end" name="payout_end">
        </select>
    </div>
    </div> -->

   
<!-- 
   <div class="col-sm-6"  id="user_epin_charge_id"> -->
        <div class="col-sm-6 user_epin_charge_id">
            <label>Admin Charge for Epin (%)</label>
            <input type="number" min="0" class="form-control" name="user_epin_charge" id="user_epin_charge">
        </div>
        <div class="col-sm-6 user_epin_charge_id">
            <label>Epin - Cashback</label>
            <input type="text" class="form-control" name="user_epin_cashback" id="user_epin_cashback">
        </div>
        <div class="col-sm-6 user_epin_charge_id">
            <label>Epin - Plus Offer</label>
            <input type="text" class="form-control" name="user_epin_plus" id="user_epin_plus">
        </div>
    <!--  </div> -->

<!-- </div> -->   
    <div class="col-sm-6">
        <label>Withdrawal Timings:</label>
            <select id = 'payout_frequency' class="form-control" name="payout_frequency">
            <option value="0" selected>No Restriction</option>
            <option value="1">Every Working Day</option>
            <option value="2">Every Calender Day</option>
        </select>
    </div>
   <!--  <div id="timings" style="width: 100%; display: flex;"> -->
    <div class="col-sm-6 timings">
        <label>Payout Request Start Time:</label>
            <input type="time" class="form-control" id="payout_start" name="payout_start">
        </select>
    </div>
    <div class="col-sm-6 timings">
        <label>Payout Request End Time:</label>
            <input type="time" class="form-control" id="payout_end" name="payout_end">
        </select>
    </div>
   
    <div class="col-sm-12 "><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
        <a href="<?php echo site_url('admin');?>" id="cancel" name="cancel" class="btn btn-light">Cancel</a>
    </div>
    </div> 

<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("bsettings").classList.add('active');
        document.querySelector("#bsettings > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    if($('#withdraw').val() =="No"){
        $('#cap').hide()
        $('#min').hide()
        $('#min_direct').hide()
        $('#cap input').val('0')
        $('#min input').val('0')
        $('#min_direct input').val('0')
    }
    $('#withdraw').change(function(){
      if(this.value=='Yes')
      {
        $('#cap').show()
        $('#min').show()
        $('#min_direct').show()
      }
      else{
        $('#cap').hide()
        $('#min').hide()
        $('#min_direct').hide()
        $('#cap input').val('0')
        $('#min input').val('0')
        $('#min_direct input').val('0')
      }
    });

    if($('#user_epin').val() =="No"){
        $('.user_epin_charge_id').hide()
        $('.user_epin_charge').val('0')
    }
    $('#user_epin').change(function(){
      if(this.value=='Yes')
      {
        $('.user_epin_charge_id').show()
      }
      else{
        $('.user_epin_charge_id').hide()
        $('#user_epin_charge').val('0')
      }
    });

    if($('#payout_frequency').val() =="0"){
        $('.timings').hide()
    }
    $('#payout_frequency').change(function(){
      if(this.value=='0')
      {
        $('.timings').hide()
      }
      else{
        $('.timings').show()
      }
    });

  });
</script>
<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Plan ID</th>
            <th>Payout / TDS Tax (%)</th>
            <?php if(config_item('enable_kyc')=='1'){ ?>
            <th>Payout / TDS Tax - No PAN (%)</th>
            <?php } ?>
            <th>Admin Charge (%)</th>
            <th>Allow User Withdraw</th>
            <th>Withdraw - Min Amount</th>
            <th>Withdraw - Daily Capping</th>
            <th>Withdraw - Min Sponsor</th>
            <?php if(config_item('enable_repurchase')=='Yes'){ ?>
            <th>Withdraw - Deduct to Repurchase (%)</th>
            <?php } ?>
            <th>Allow User to Generate Epin</th>
            <th>Generate Epin - Charge (%)</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($results as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->plan_id; ?></td>
                <td><?php echo $e->payout_tax; ?></td>
                <?php if(config_item('enable_kyc')=='1'){ ?>
                <td><?php echo $e->no_pan_payout_tax; ?></td>
                <?php } ?>
                <td><?php echo $e->admin_charge; ?></td>
                <td><?php echo $e->user_withdraw; ?></td>
                <td><?php echo $e->min_withdraw; ?></td>
                <td><?php echo $e->daily_capping; ?></td>
                <td><?php echo $e->min_sponsor; ?></td>
                <?php if(config_item('enable_repurchase')=='Yes'){ ?>
                <td><?php echo $e->repurchase_deduct; ?></td>
                <?php } ?>
                <td><?php echo $e->user_epin; ?></td>
                <td><?php echo $e->user_epin_charge; ?></td>
                <td>
                    <div style="display: flex;">
                        
                   
                    <a href="<?php echo site_url('setting/edit-payout-setting/' . $e->id); ?>"
                      id="pen_cil"  class="btn btn-info btn-sm glyphicon glyphicon-pencil mr-1" >edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Income ?')"
                       href="<?php echo site_url('setting/remove-payout-setting/' . $e->id); ?>"
                      id="re_move" class="btn btn-danger btn-sm glyphicon glyphicon-remove ">remove</a>
                        </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>