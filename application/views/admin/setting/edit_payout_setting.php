<style type="text/css">
  .col-sm-6 {
    margin: 5px 0; 
  }
</style>
<?php echo form_open() ?>
<div class="row"> 
    
    <div class="col-sm-6">
        <label>Plan Commission *</label>
        <select class="form-control" name="plan_id" disabled>
            <option value="<?php echo $result->plan_id ?>" selected> <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $result->plan_id)); ?> </option>
            <?php foreach ($plans as $val) {
                echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
            } ?>
        </select>
        </select>
    </div>
    <input name="id" value="<?php echo $result->id ?>" type="hidden">
    <div class="col-sm-6">
        <label>Payout TAX /TDS (%)</label>
        <input type="number" min="0" step="any" class="form-control" name="payout_tax" value="<?php echo $result->payout_tax ?>">
    </div>
    <?php if(config_item('enable_kyc')=='1'){ ?>
    <div class="col-sm-6">
        <label>Payout TAX /TDS (%) in Case No PAN Card</label>
        <input type="number" min="0" step="any" class="form-control" name="no_pan_payout_tax" value="<?php echo $result->no_pan_payout_tax ?>">
    </div>
    <?php } ?>
    <div class="col-sm-6">
      <label>Admin Service Charge (%)</label>
        <input type="number" min="0" step="any" class="form-control" name="admin_charge" value="<?php echo $result->admin_charge ?>">
    </div>
    <div class="col-sm-6">
      <label>Deduct Admin Service Charge</label>
        <select class="form-control" name="admin_charge_type">
                <option value="<?php echo $result->admin_charge_type ?>"selected><?php if($result->admin_charge_type=='DDE') {echo 'Deduct During Earnings';} elseif ($result->admin_charge_type=='DDP'){echo 'Deduct During Payouts';}?></option>
                <option value="DDP">Deduct During Payouts</option>
                <option value="DDE">Deduct During Earnings</option>
          </select>
    </div>
    <div class="col-sm-6">
       <label>Allow User to Withdraw Fund</label>
          <select id = 'withdraw' class="form-control" name="user_withdraw">
            <option selected><?php echo $result->user_withdraw ?></option>
              <option>Yes</option>
              <option>No</option>
          </select>
    </div>
    <div id = 'min' class="col-sm-6">
        <label>Min amount allowed to Withdraw (in <?php echo config_item('currency') ?> )</label>
        <input type="number" min="0" class="form-control" name="min_withdraw" value="<?php echo $result->min_withdraw ?>">
    </div>
    <div id = 'cap' class="col-sm-6">
        <label>Daily Capping (in <?php echo config_item('currency') ?> )</label>
         <input type="number" min="0" class="form-control" name="daily_capping" value="<?php echo $result->daily_capping ?>">
    </div>
    <div id = 'min_direct' class="col-sm-6">
        <label>Min Direct Sponsor to Withdraw</label>
        <input type="number" min="0" class="form-control" name="min_sponsor" value="<?php echo $result->min_sponsor ?>">
    </div>
    <?php if(config_item('enable_repurchase')=='Yes'){ ?>
    <div class="col-sm-6">
        <label>% deduction to Repurchase Wallet</label>
        <input type="number" min="0" class="form-control" name="repurchase_deduct" value="<?php echo $result->repurchase_deduct ?>">
    </div>
    <?php } ?>
    <div class="col-sm-6">
       <label>Allow Member to Member Fund Transfer</label>
          <select id = 'fund_transfer' class="form-control" name="fund_transfer">
              <option selected><?php echo $result->fund_transfer ?></option>
              <option>Yes</option>
              <option>No</option>
          </select>
    </div>
    <div class="col-sm-6">
       <label>Allow User to Generate Epin</label>
          <select id = 'user_epin' class="form-control" name="user_epin">
            <option selected><?php echo $result->user_epin ?></option>
              <option>Yes</option>
              <option>No</option>
          </select>
    </div>
   <!--  <div id="user_epin_charge_id"> -->
      <div class="col-sm-6 user_epin_charge_id">
          <label>Admin Charge for Epin</label>
          <input type="number" min="0" class="form-control" name="user_epin_charge" id="user_epin_charge" value="<?php echo $result->user_epin_charge ?>">
      </div>
      <div class="col-sm-6 user_epin_charge_id">
            <label>Epin - Cashback</label>
            <input type="text" class="form-control" name="user_epin_cashback" id="user_epin_cashback"  value="<?php echo $result->user_epin_cashback ?>">
        </div>
        <div class="col-sm-6 user_epin_charge_id">
            <label>Epin - Plus Offer</label>
            <input type="text" class="form-control" name="user_epin_plus" id="user_epin_plus"  value="<?php echo $result->user_epin_plus ?>">
        </div>
   <!--  </div> -->
    <div class="col-sm-6">
        <label>Withdrawal Timings</label>
            <select id = 'payout_frequency' class="form-control" name="payout_frequency">
            <option value="<?php echo $result->payout_frequency ?>" selected> <?php if($result->payout_frequency ==0){ echo 'No Restriction'; } elseif ($result->payout_frequency ==1){ echo 'Every Working Days'; } elseif ($result->payout_frequency ==2){ echo 'Every Calender Days'; } 
            ?> </option>
            <option value="0">No Restriction</option>
            <option value="1">Every Working Day</option>
            <option value="2">Every Calender Day</option>
        </select>
    </div>
    <!-- <div id="timings"> -->
    <div class="col-sm-6 timings">
        <label>Payout Request Start Time:</label>
            <input type="time" class="form-control" id="payout_start" name="payout_start" value="<?php echo $result->payout_start ?>">
        </select>
    </div>
    <div class="col-sm-6 timings">
        <label>Payout Request End Time:</label>
            <input type="time" class="form-control" id="payout_end" name="payout_end" value="<?php echo $result->payout_end ?>">
        </select>
    </div>
    <!-- </div> -->
    <div class="col-sm-12"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
        <a href="<?php echo site_url('setting/payout-setting');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
    
    <?php echo form_close() ?>
</div>
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
        $('#user_epin_charge').val('0')
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