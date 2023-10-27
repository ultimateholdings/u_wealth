<?php
?>

<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>

<div class="container">
    <?php echo form_open() ?>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
            <label>Plan *</label>
            <select class="form-control" name="plan_id">
                <option value="0">Select A Plan</option>
                <?php foreach ($plans as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                } ?>
            </select>
            </div>
            <div class="col-sm-5">
                <label>Reward Name</label>
                <input type="text" class="form-control" value="<?php echo set_value('reward_name') ?>" name="reward_name">
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-5">
              <label>Reward Based On</label>
               <select class="form-control" id="reward_type" name="reward_type">
                <option value="Downline">Downline Target</option>
                <?php if(config_item('enable_pv')=='Yes'){ ?>
                <option value="Self">MY Target</option>
                <?php } ?>
               </select>
            </div> 
            <div class="col-sm-5" id="based_on_id">
                <label>Count Based On</label>
                <select class="form-control" name="based_on" id="based_on">
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
                <input type="text" class="form-control" value="<?php echo set_value('reward_duration', '0') ?>"
                       name="reward_duration"><span style="font-size: 11px">( Within how many days he/she should achieve this  ? 0 for no duration )</span>
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row" id='downline_id'>
            <div class="col-sm-12">
              <label style="color: blue;">Target Value</label><br/>
            </div>
            <?php if(config_item('width')=='2') { ?>
                <?php foreach ($leg as $key => $val) { ?>
                    <div class="col-sm-5">
                        <label>Total People / PV at <?php echo $key ?> Side </label>
                        <input type="text" class="form-control" placeholder="How many people / Total PV at <?php echo $key ?> side ?"
                                name="<?php echo $key ?>" value="<?php echo set_value($key) ?>">
                    </div>
                <?php } ?>
            <?php } else { ?>
            <div class="col-sm-5">
                    <label>Downline Value</label>
                    <input type="text" class="form-control" placeholder="Downline Value" name="total_downline" 
                    value="<?php echo set_value('total_downline') ?>">
            </div>
            <?php } ?>            
            <div class="col-sm-5">
                <label>Direct Referrals</label>
                    <input type="text" class="form-control" placeholder="Direct Referrals" name="direct" 
                    value="<?php echo set_value('direct') ?>">
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row" id='level_id'>
            <div class="col-sm-5">
                <label>Level No</label>
                <select class="form-control" name="level_no" id="level_no_id">
                    <option selected>1</option>
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
              value="<?php echo set_value('mypv') ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Save" onclick="this.value='Saving..'">
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
</div><!------------- MANAGE REWARDS -------------------------------->

<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Reward Name</th>
            <th>Plan ID</th>
            <th>Reward Based On</th>
            <th>Count Based On</th>
            <?php if(config_item('width')=='2') { ?>
            <th>Total People / PV at A Side </th>
            <th> Total People / PV at B Side </th>
            <?php } else { ?>
            <th>Downline Value</th>
            <?php } ?>
            <?php if(config_item('enable_pv')=='Yes') { ?>
            <th>My PV</th>
            <?php } ?>
            <th>Direct Referrals</th>
            <th>Duration</th>
            <th>Achievers</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->reward_name; ?></td>
                <td><?php echo $e->plan_id; ?></td>
                <td><?php if($e->type=='Downline') {echo 'Downline Target';} else {echo 'MY Target';}?></td>
                <td><?php echo $e->based_on; ?></td>
                <?php if($e->type=='Downline') { ?>
                <?php if(config_item('width')=='2') { ?>
                <td><?php echo $e->A; ?></td>
                <td><?php echo $e->B; ?></td>
                <?php if(config_item('enable_pv')=='Yes') { ?>
                <td>--</td>
                <?php } ?>
                <?php } else { ?>
                <td><?php echo $e->total_downline; ?> </td>
                <?php if(config_item('enable_pv')=='Yes') { ?>
                <td>--</td>
                <?php } ?>
                <?php } } else {?>
                <?php if(config_item('width')=='2') { ?>
                <td>--</td>
                <td>--</td>
                <td><?php echo $e->mypv; ?></td>
                <?php } else { ?>
                <td>--</td>
                <td><?php echo $e->mypv; ?></td>
                <?php }}?>
                <td><?php echo $e->direct; ?></td>                
                <td><?php echo $e->reward_duration; ?></td>
                <td><?php 
                $this->db->select('id')->where('reward_id', $e->id);
                $data = $this->db->get('rewards')->result_array();
                echo count($data); ?></td>
                <td>
                    <div style="display: flex;">

                         <a href="<?php echo site_url('income/pay-rewards/' . $e->id); ?>"
                       class="btn btn-info btn-sm glyphicon glyphicon-pencil" style="margin-right: 10px;" >view achievers</a>
                   
                    <a href="<?php echo site_url('setting/edit-reward/' . $e->id); ?>"
                       class="btn btn-info btn-sm glyphicon glyphicon-pencil" style="margin-right: 10px;display: flex;align-items: center;" >edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Setting ?')"
                       href="<?php echo site_url('setting/remove-reward/' . $e->id); ?>"
                       class="btn btn-danger btn-sm glyphicon glyphicon-remove" style="display: flex;align-items: center;">delete</a>
                        </div>
                </td>
            </tr>
        <?php } ?>
    </table>
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
        $('#level_id').hide();
        $("#based_on_id").hide();
        $('#based_on').val('PV');
      }
    });
  });
</script>