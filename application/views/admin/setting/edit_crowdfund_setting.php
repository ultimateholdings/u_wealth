<?php

?>
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
    </div>
    <div class="col-sm-6">
        <label>Upgrade Levels (After Joining User will be on Level 1)</label>
        <select class="form-control" name="upgrade_type" disabled>
            <option selected value="<?php echo $result->upgrade_type ?>">
                <?php if($result->upgrade_type == '1') {echo 'Level 1 Joining Amount';};
                if($result->upgrade_type == '2') {echo 'Level 1 to Level 2 Upgrade';};
                if($result->upgrade_type == '3') {echo 'Level 2 to Level 3 Upgrade';};
                if($result->upgrade_type == '4') {echo 'Level 3 to Level 4 Upgrade';};
                if($result->upgrade_type == '5') {echo 'Level 4 to Level 5 Upgrade';};
                if($result->upgrade_type == '6') {echo 'Level 5 to Level 6 Upgrade';};
                if($result->upgrade_type == '7') {echo 'Level 6 to Level 7 Upgrade';};
                if($result->upgrade_type == '8') {echo 'Level 7 to Level 8 Upgrade';};
                if($result->upgrade_type == '9') {echo 'Level 8 to Level 9 Upgrade';};
                if($result->upgrade_type == '10') {echo 'Level 9 to Level 10 Upgrade';}; ?>
            </option>
            <option value='1'> Level 1 Joining Amount </option>
            <option value='2'> Level 1 to Level 2 Upgrade </option>
            <option value='3'> Level 2 to Level 3 Upgrade </option>
            <option value='4'> Level 3 to Level 4 Upgrade </option>
            <option value='5'> Level 4 to Level 5 Upgrade </option>
            <option value='6'> Level 5 to Level 6 Upgrade </option>
            <option value='7'> Level 6 to Level 7 Upgrade </option>
            <option value='8'> Level 7 to Level 8 Upgrade </option>
            <option value='9'> Level 8 to Level 9 Upgrade </option>
            <option value='10'> Level 9 to Level 10 Upgrade </option>
        </select>
    </div>
    
    <div class="col-sm-6">
        <label>Admin Fee</label>
        <input type="text" class="form-control" value="<?php echo set_value('admin_charge', $result->admin_charge) ?>" name="admin_charge">
    </div>
    <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
        <div class="col-sm-6">
        <label>Time to Pay Admin Fee (in Hr)</label>
        <input type="number" class="form-control" value="<?php echo set_value('admin_charge_time', $result->admin_charge_time) ?>" name="admin_charge_time" min="1">
    </div>
    <div>&nbsp;</div>
    <?php } ?>
    <div class="col-sm-6">
        <label>Paid to Sponsor</label>
        <input type="text" class="form-control" value="<?php echo set_value('sponsor_fee', $result->sponsor_fee) ?>"
               name="sponsor_fee">
    </div>
    <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
        <div class="col-sm-6">
        <label>Time to Pay Sponsor Fee (in Hr)</label>
        <input type="number" class="form-control" value="<?php echo set_value('sponsor_fee_time', $result->sponsor_fee_time) ?>" name="sponsor_fee_time" min="1">
    </div>
    <div>&nbsp;</div>
    <?php } ?>
    <div class="col-sm-6">
        <label>Paid to Member </label>
        <input type="text" class="form-control" value="<?php echo set_value('upgrade_amount', $result->upgrade_amount) ?>"
               name="upgrade_amount">
    </div>
    <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
        <div class="col-sm-6">
        <label>Time to Pay Member Amount (in Hr)</label>
        <input type="number" class="form-control" value="<?php echo set_value('upgrade_amount_time', $result->upgrade_amount_time) ?>" name="upgrade_amount_time" min="1">
    </div>
    <div>&nbsp;</div>
    <?php } ?>
    <div class="col-sm-6">
        <label>Plan Upgrade</label>
        <select id = 'plan_upgrade' class="form-control" name="plan_upgrade">
            <option value="<?php echo $result->plan_upgrade ?>" selected> <?php echo $result->plan_upgrade; ?> </option>
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
    </div>
    <div class="col-sm-6" id='id_plan_new_id'>
       <label>Plan for New ID *</label>
        <select class="form-control" name="plan_new_id">
            <option value="<?php echo $result->plan_new_id ?>" selected> <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $result->plan_new_id)); ?> </option>
            <?php foreach ($new_plans as $val) {
                echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
            } ?>
        </select>
    </div>
    <div class="col-sm-10"><br/>
        <input type="submit" class="btn btn-success" value="Save" onclick="this.value='Saving..'">
        <a href="<?php echo site_url('income/crowdfund_settings');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
    <?php echo form_close() ?>
</div><!------------- MANAGE REWARDS -------------------------------->

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#plans > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#plan_upgrade').val() =="No"){
        $('#id_plan_new_id').hide()
    }
    $('#plan_upgrade').change(function(){
      if(this.value=='Yes')
      {
        $('#id_plan_new_id').show()
       }
      else{
        $('#id_plan_new_id').hide()
      }
    });
  });
</script>