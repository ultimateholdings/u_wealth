<div class="container">
    <?php echo form_open() ?>
    <!-- <form action="<?=site_url('setting/rank_setting')?>" method="post"> -->
    <div class="form-group">
        <div class="row">
            <div class="col-sm-5">
            <label>Plan</label>
            <select class="form-control" name="plan_id">
                <option value="0">Select A Plan</option>
                <?php foreach ($plans as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
                } ?>
            </select>
            </div>
            <div class="col-sm-5">
                <label>Rank Name</label>
                <input type="text" class="form-control" value="<?php echo set_value('rank_name') ?>" name="rank_name">
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-5">
              <label>Rank Based on</label>
               <select class="form-control" id="rank_type" name="rank_type">
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
                <label>Achieve Duration <br/> </label>
                <input type="text" class="form-control" value="<?php echo set_value('rank_duration', '0') ?>"
                       name="rank_duration"><span style="font-size: 11px">( Within how many days he/she should achieve this  ? 0 for no duration )</span>
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
                    <label>Total People/PV at <?php echo $key ?> Side</label>
                    <input required type="text" class="form-control" placeholder="How many people or PV at <?php echo $key ?> side ?" name="<?php echo $key ?>" value="<?php echo set_value($key) ?>" id="side_pv<?php echo $key ?>">
                </div>
                <script type="text/javascript">
                    $('#rank_type').change(function(){
                        if(this.value!=='Downline'){
                            $('#side_pv<?php echo $key ?>').removeAttr('required');
                        }else{
                            $('#side_pv<?php echo $key ?>').attr('required','true');
                        }
                    })
                </script>
            <?php } ?>
            <?php } else { ?>
            <div class="col-sm-5">
                <label>Downline Value</label>
                    <input type="text" class="form-control" placeholder="Downline Value" name="total_downline" value="<?php echo set_value('total_downline') ?>">
            </div>
            <?php } ?>
            <div class="col-sm-5">
                <label>Direct Referrals</label>
                    <input type="text" class="form-control" placeholder="Direct Referrals" name="direct" 
                    value="<?php echo set_value('direct') ?>">
            </div>
            <div class="col-sm-5">
                <label>Downline Rank Count <br/> </label>
                <input type="text" class="form-control" value="<?php echo set_value('downline_rank') ?>"
                       name="downline_rank">
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
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
    <?php echo form_close() ?>
<!-- </form> -->
</div><!------------- MANAGE REWARDS -------------------------------->

<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Rank Name</th>
            <th>Plan ID</th>
            <th>Rank Based On</th>
            <th>Count Based On</th>
            <?php if(config_item('width')=='2') { ?>
            <th>Total People / PV at A Side </th>
            <th> Total People / PV at B Side </th>
            <?php } else { ?>
            <th> Downline Value</th>
            <?php } ?>
            <th>My PV</th>
            <th> Direct Referrals</th>            
            <th>Achievers</th>
            <th class="noExport">#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->rank_name; ?></td>
                <td><?php echo $e->plan_id; ?></td>
                <td><?php if($e->type=='Downline') {echo 'Downline Target';} else {echo 'MY Target';}?></td>
                <td><?php echo $e->based_on; ?></td>
                <?php if($e->type=='Downline') { ?>
                <?php if(config_item('width')=='2') { ?>
                <td><?php echo $e->A; ?></td>
                <td><?php echo $e->B; ?></td>
                <td>--</td>
                <?php } else { ?>
                <td><?php echo $e->total_downline; ?> </td>
                <td>--</td>
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
                <td>                
                <?php echo $this->db_model->count_all('member', array('rank' => $e->rank_name)) ?>
                </td>
                <td>
                    <div style="display: flex;">
                        <a href="<?php echo site_url('users/view_rank_achievers/'.$e->rank_name) ?>" class="btn btn-info btn-sm glyphicon glyphicon-pencil" style="margin-right: 10px;">View</a>
                        <a href="<?php echo site_url('setting/edit-rank/' . $e->id); ?>"
                            class="btn btn-info btn-sm glyphicon glyphicon-pencil" style="margin-right: 10px;display: flex;align-items: center;"> Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this Income ?')"
                           href="<?php echo site_url('setting/remove-rank/' . $e->id); ?>"
                           class="btn btn-danger btn-sm glyphicon glyphicon-remove" style="display: flex;align-items: center;">Delete</a>
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
        document.querySelector("#rewards > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    if($('#rank_type').val() =="Downline"){
        $('#mypv').val('0');
        $('#mypv_id').hide();
        $('#downline_id').show();
        $("#based_on_id").show();
        $('#level_id').show();
    }
    $('#rank_type').change(function(){
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