<?php

?>
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
        <label>Upgrade Levels (After Joining User will be on Level 1)</label>
        <select class="form-control" name="upgrade_type">
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
    <div class="col-sm-6 mt-2">
        <label>Admin Fee</label>
        <input type="text" class="form-control" value="<?php echo set_value('admin_charge') ?>" name="admin_charge">
    </div>
    <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
        <div class="col-sm-6 mt-2">
        <label>Time to Pay Admin Fee (in Hr)</label>
        <input type="number" class="form-control" value="<?php echo set_value('admin_charge_time') ?>" name="admin_charge_time" min="1">
    </div>

    <?php } ?>

    <div class="col-sm-6 mt-2">
        <label>Paid to Sponsor (if Applicable)</label>
        <input type="text" class="form-control" value="<?php echo set_value('sponsor_fee') ?>"
               name="sponsor_fee">
    </div>
    <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
        <div class="col-sm-6 mt-2">
        <label>Time to Pay Sponsor Fee (in Hr)</label>
        <input type="number" class="form-control" value="<?php echo set_value('sponsor_fee_time') ?>" name="sponsor_fee_time" min="1">
    </div>

    <?php } ?>
    <div class="col-sm-6 mt-2">
        <label>Paid to Member </label>
        <input type="text" class="form-control" value="<?php echo set_value('upgrade_amount') ?>"
               name="upgrade_amount">
    </div>
    <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
        <div class="col-sm-6 mt-2">
        <label>Time to Pay Member Amount (in Hr)</label>
        <input type="number" class="form-control" value="<?php echo set_value('upgrade_amount_time') ?>" name="upgrade_amount_time" min="1">
    </div>

    <?php } ?>
    <div class="col-sm-6 mt-2">
        <label>Plan Upgrade</label>
        <select id = 'plan_upgrade' class="form-control" name="plan_upgrade">
            <option value="No" selected>No</option>
            <option value="Yes">Yes</option>
          </select>
    </div>
    <div class="col-sm-6 mt-2" id='id_plan_new_id'>
       <label>Plan for New ID *</label>
        <select class="form-control" name="plan_new_id">
            <?php foreach ($new_plans as $val) {
                echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
            } ?>
        </select>
    </div>
    <div class="col-sm-10 mt-2"><br/>
        <input type="submit" class="btn btn-success" value="Save" onclick="this.value='Saving..'">
    </div>
    <?php echo form_close() ?>
</div><!------------- MANAGE REWARDS -------------------------------->



<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Plan ID </th>
            <th>Upgrade Levels</th>
            <th>Admin Fee</th>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
            <th>Time to Pay Admin Fee</th>
            <?php } ?>
            <th>Paid to Member</th>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
            <th>Time to Pay Member</th>
            <?php } ?>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->plan_id; ?></td>
                <td>
                <?php if($e->upgrade_type == '1') {echo 'Level 1 Joining Amount';};
                if($e->upgrade_type == '2') {echo 'Level 1 to Level 2 Upgrade';};
                if($e->upgrade_type == '3') {echo 'Level 2 to Level 3 Upgrade';};
                if($e->upgrade_type == '4') {echo 'Level 3 to Level 4 Upgrade';};
                if($e->upgrade_type == '5') {echo 'Level 4 to Level 5 Upgrade';};
                if($e->upgrade_type == '6') {echo 'Level 5 to Level 6 Upgrade';};
                if($e->upgrade_type == '7') {echo 'Level 6 to Level 7 Upgrade';};
                if($e->upgrade_type == '8') {echo 'Level 7 to Level 8 Upgrade';};
                if($e->upgrade_type == '9') {echo 'Level 8 to Level 9 Upgrade';};
                if($e->upgrade_type == '10') {echo 'Level 9 to Level 10 Upgrade';}; ?>
                </td>
                <td><?php echo $e->admin_charge; ?></td>
                <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
                <td><?php echo $e->admin_charge_time; ?></td>
                <?php } ?>
                <td><?php echo $e->upgrade_amount; ?> </td>
                <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
                <td><?php echo $e->upgrade_amount_time; ?></td>
                <?php } ?>
                <td>
                    <a href="<?php echo site_url('income/edit_crowdfund_settings/' . $e->id); ?>"
                       class="btn btn-info btn-sm glyphicon glyphicon-pencil">edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Entry ?')"
                       href="<?php echo site_url('income/remove-level-upgrade/' . $e->id); ?>"
                       class="btn btn-danger btn-sm glyphicon glyphicon-remove">delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
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