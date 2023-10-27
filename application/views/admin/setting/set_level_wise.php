<div class="container">
   <div class="form-group">
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
            <label>Earning Name</label>
            <select class="form-control" name="income_name">
               <?php if(config_item('enable_board')=='Yes') { ?>
               <option>Board Completion Income</option>
               <?php } elseif(config_item('width')=='1') { ?>
               <option>Single Leg Income</option>
               <?php } else { ?>
               <option>Level Completion Income</option>
               <?php } ?>
            </select>
         </div>
         <div class="col-sm-6">
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
         <div class="col-sm-6">
            <label>Total Member *</label>
            <input type="text" class="form-control" value="<?php echo set_value('total_member', $result->total_member) ?>"
               name="total_member">
         </div>
         <div class="col-sm-6" id="direct_id">
            <label>Total Direct Sponsors</label>
            <input type="text" class="form-control" value="<?php echo set_value('direct') ?>" name="direct">
         </div>
         <div class="col-sm-6">
            <label>Earning Amount</label>
            <input type="text" class="form-control" value="<?php echo set_value('amount') ?>" name="amount">
         </div>
         <div class="col-sm-6">
            <label>Upgrade Amount</label>
            <input type="text" class="form-control" value="<?php echo set_value('upgrade_amount') ?>" name="upgrade_amount">
         </div>
         <div class="col-sm-6">
            <label>Achieve Duration <br/> </label>
            <input type="text" class="form-control" value="<?php echo set_value('income_duration', '0') ?>"
               name="income_duration"><span style="font-size: 11px">( Within how many days he/she should achieve this  ? 0 for no duration )</span>
         </div>
         <div class="col-sm-6">
            <label>Create New ID</label>
            <select id = 'new_id' class="form-control" name="new_id">
               <option value="No" selected>No</option>
               <option value="Yes">Yes</option>
            </select>
         </div>
         <div class="col-sm-6" id='id_plan_new_id'>
            <label>Plan for New ID *</label>
            <select class="form-control" name="plan_new_id">
            <?php foreach ($new_plans as $val) {
               echo '<option value="' . $val['id'] . '">' . $val['plan_name'] . '</option>';
               } ?>
            </select>
         </div>
         <div class="col-sm-6" id = 'auto_upgrade_id'>
            <label>Auto Upgrade</label>
            <select class="form-control" name="auto_upgrade">
               <option value="Yes" selected>Yes</option>
               <option value="No">No</option>
            </select>
         </div>
      </div>
      <?php if(config_item('roi_income')=='Yes') { ?>
      <br>
      <div class="row">
         <div id = 'roi' class="col-sm-6">
            <label>ROI Income</label>
            <input type="text" class="form-control" name="roi" value="<?php echo set_value('roi') ?>">
         </div>
         <div id = 'roi_frequency' class="col-sm-6">
            <label>ROI Payout Frequency:</label>
            <select id = 'roi_frequency' class="form-control" name="roi_frequency">
               <option value="2" selected>Every Calender Day</option>
               <option value="1">Every Working Day</option>
               <option value="3">Every Month</option>
               <!--<option value="3" >Weekly</option>
                  <option value="4" >Every Friday</option>
                  <option value="5" >Every Month - Twice Payout</option>-->
            </select>
         </div>
         <div id = 'roi_limit' class="col-sm-6">
            <label>Total ROI Income</label>
            <input type="text" class="form-control" name="roi_limit"
               value="<?php echo set_value('roi_limit') ?>">
         </div>
         <div id = 'recurring_fee' class="col-sm-6">
            <label>Recurring Fee</label>
            <input type="text" class="form-control" name="recurring_fee"
               value="<?php echo set_value('recurring_fee') ?>">
         </div>
      </div>
      <?php } ?>
      <div class="row">
          <div class="col-sm-12"><br/>
             <input type="submit" class="btn btn-success" value="Save" onclick="this.value='Saving..'">
             <a href="<?php echo site_url('/admin');?>" id="cancel" name="cancel" class="btn btn-info">Cancel</a>
          </div>
      </div>
      <?php echo form_close() ?>
   </div>
</div>
<!------------- MANAGE REWARDS -------------------------------->
<p>&nbsp;</p>
<div class="table-responsive">
   <table class="table table-striped table-bordered">
      <tr>
         <th>SN</th>
         <th>Plan ID</th>
         <th>Income Name</th>
         <th>Level No</th>
         <th>Total Members </th>
         <th>Minimum Directs </th>
         <th>Amount</th>
         <th>Upgrade Fee</th>
         <th>#</th>
      </tr>
      <?php
         $sn = 1;
         foreach ($result as $e) { ?>
      <tr>
         <td><?php echo $sn++; ?></td>
         <td><?php echo $e->plan_id; ?></td>
         <td><?php echo $e->income_name; ?></td>
         <td><?php if($e->level_no==0){echo 'All';}else{echo $e->level_no;} ?></td>
         <td><?php echo $e->total_member; ?></td>
         <td><?php if($e->direct == 0){echo 'NA';} else {echo $e->direct;} ?></td>
         <td><?php echo config_item('currency') . $e->amount; ?></td>
         <td><?php echo config_item('currency') . $e->upgrade; ?></td>
         <td>
            <a href="<?php echo site_url('income/edit-level-wise-income/' . $e->id); ?>"
               class="btn btn-info btn-sm glyphicon glyphicon-pencil">edit</a>
            <a onclick="return confirm('Are you sure you want to delete this Income ?')"
               href="<?php echo site_url('income/remove-level-wise-income/' . $e->id); ?>"
               class="btn btn-danger btn-sm glyphicon glyphicon-remove">remove</a>
         </td>
      </tr>
      <?php } ?>
   </table>
</div>
<script type="text/javascript">
   $(document).ready(function () {
       document.getElementsByClassName('active')[0].classList.remove('active');
       document.getElementById("plans").classList.add('active');
       document.querySelector("#level").setAttribute('style', 'color: darkorange !important;');
   });
</script>
<script type="text/javascript">
   $(document).ready(function(){
     if($('#new_id').val() =="No"){
         $('#id_plan_new_id').hide()
         $('#auto_upgrade_id').hide()
     }
     $('#new_id').change(function(){
       if(this.value=='Yes')
       {
         $('#id_plan_new_id').show()
         $('#auto_upgrade_id').show()
        }
       else{
         $('#id_plan_new_id').hide()
         $('#auto_upgrade_id').hide()
       }
     });
   });
</script>