<?php

?>
<div class="container">
    <?php echo form_open() ?>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
                <label>Plan</label>
                <select class="form-control" name="plan_id" disabled>
                    <option value="<?php echo $result->plan_id ?>" selected> <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $result->plan_id)); ?> </option>
                    <?php foreach ($plans as $val) {
                        echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                    } ?>
                </select>
            </div>
            <div class="col-sm-5">
                <label>Reward Name</label>
                <input type="text" class="form-control" value="<?php echo set_value('reward_name', $result->reward_name) ?>" name="reward_name" >
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-5">
                <label>Reward Based On</label>
                <select class="form-control" id="reward_type" name="reward_type" disabled>
                    <option value="<?php echo $result->type; ?>" selected><?php if($result->type=='Downline') {echo 'Downline Target';} else {echo 'MY Target';}?></option>
                    <option value="Downline">Downline Target</option>
                    <?php if(config_item('enable_pv')=='Yes'){ ?>
                    <option value="Self">MY Target</option>
                    <?php } ?>
                </select>
            </div> 
            <div class="col-sm-5" id="based_on_id">
                <label>Counting Based On</label>
                <select class="form-control" name="based_on" id="based_on">
                    <option value="<?php echo $result->based_on; ?>" selected><?php if($result->based_on=='Member') {echo 'Member Count';} else {echo 'PV Value';}?></option>
                    <option value="Member">Member Count</option>
                    <?php if(config_item('enable_pv')=='Yes'){ ?>
                    <option value="PV">PV Value</option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-5">
                <label>Reward Duration <br/> </label>
                <input type="text" class="form-control"
                       value="<?php echo set_value('reward_duration', $result->reward_duration) ?>" name="reward_duration"><span
                        style="font-size: 11px">( Within how many days he/she should achieve this  ? 0 for no duration )</span>
            </div>
        </div>
        <div>&nbsp;</div>
        <input type="hidden" name="id" value="<?php echo $result->id ?>">
        <input type="hidden" name="reward_type" value="<?php echo $result->type ?>">
        <div class="row" id='downline_id'>
            <div class="col-sm-12">
              <label style="color: blue;">Target Value</label><br/>
            </div>
            <?php if(config_item('width')=='2') { ?>
                <?php foreach ($leg as $key => $val) { ?>
                    <div class="col-sm-5">
                        <label><?php echo $key ?></label>
                        <input type="text" class="form-control" placeholder="How many people at <?php echo $key ?> side ?"
                                name="<?php echo $key ?>" value="<?php echo set_value($key, $result->$key) ?>">
                    </div>
                <?php } ?>
            <?php } else { ?>
            <div class="col-sm-5">
                    <label>Downline Value</label>
                    <input type="text" class="form-control" placeholder="Downline Value" name="total_downline" 
                    value="<?php echo set_value('total_downline', $result->total_downline) ?>">
            </div>
            <?php } ?>
            <div class="col-sm-5">
                <label>Direct Referrals</label>
                <input type="text" class="form-control" placeholder="Direct Referrals" name="direct" 
                    value="<?php echo set_value('direct', $result->direct) ?>">
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row" id='level_id'>
            <div class="col-sm-5">
                <label>Level No</label>
                <select class="form-control" name="level_no" id="level_no_id">
                    <option selected value="<?php echo $result->level_no ?>"><?php if($result->level_no == "0") {echo 'All';} else {echo $result->level_no;} ?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <!--<option value="0">All</option>-->
                </select>
            </div>
            <div class="col-sm-5">
                <label>Total Member on Level</label>
                <input type="text" class="form-control" value="<?php echo set_value('total_member_level', $result->total_member_level) ?>" name="total_member_level">
            </div>
        </div>
        <div class="row" id='mypv_id'>
            <div class="col-sm-12">
              <label style="color: blue;">Target Value</label><br/>
            </div>
            <div class="col-sm-5">
              <span>MY PV</span>
              <input type="text" class="form-control" name="mypv" id='mypv'
              value="<?php echo set_value('mypv', $result->mypv) ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
                <a href="<?php echo site_url('setting/reward-setting');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("rewards").classList.add('active');
        document.querySelector("#rewards > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#reward_type').val() =="Downline"){
        $('#mypv').val('0');
        $('#mypv_id').hide();
        $('#downline_id').show();
        $("#based_on_id").show();
        $('#level_id').show();
    }else{
        $('#mypv_id').show();
        $('#downline_id').hide();
        $("#based_on_id").hide();
        $('#level_id').hide();
    }
    $('#reward_type').change(function(){
      if(this.value=='Downline')
      {
        $('#mypv').val('0');
        $('#mypv_id').hide();
        $('#downline_id').show();
        $("#based_on_id").show();
        $('#level_id').show();
       }
      else{
        $('#mypv_id').show();
        $('#downline_id').hide();
        $("#based_on_id").hide();
        $('#based_on').val('PV');
        $('#level_id').hide();
      }
    });
  });
</script>