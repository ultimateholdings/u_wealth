<?php

?>
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>

<div class="container">
  <?php echo form_open() ?>
    <div class="form-group">
        <div class="row">
          <div class="col-sm-5">
              <label>Target Type</label>
               <select class="form-control" id="income_type" name="income_type" disabled>
               <option value="<?php echo $data->type ?>"><?php if($data->type == 'Downline') {echo 'Downline Target';} else {echo 'MY Target';}?></option>
               </select>
          </div> 
          <div class="col-sm-5">
              <label>Target Income Name</label>
              <input type="text" class="form-control" name="income_name" value="<?php echo $data->income_name ; ?>">
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row" id='based_on_id'>
          <div class="col-sm-12">
            <label style="color: blue;">Commission</label><br/>
          </div>
          <div class="col-sm-5">
            <span>Income Based on : </span>
            <select class="form-control" name="based_on" id="based_on">
               <option value="<?php echo $data->based_on ?>"><?php if($data->based_on == 'PV') {echo 'PV / BV';} else {echo 'Member Count';}?></option>
               <option value="PV">PV / BV</option>
               <option value="Member">Member Count</option>
            </select>
          </div>
          <input type="hidden" name="id" value="<?php echo $data->id ?>">
          <input type="hidden" name="income_type" value="<?php echo $data->type ?>">
          
        </div>
        <div>&nbsp;</div>
        <div class="row" id='based_on_id'>
          <div class="col-sm-5">
            <span>Configure Commission values as:</span>
            <select class="form-control" name="config_comm" id="config_comm">
              <option value="<?php echo $data->config_comm ?>" selected> <?php echo $data->config_comm ?> </option>
                   <option value="amount">Amount</option>
                   <option value="percent">Percentage</option>
            </select>
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row" id='downline_id'>
          <div class="col-sm-12">
            <label style="color: blue;">Target Value</label><br/>
          </div>
          <?php if(config_item('width')=='2') { ?>
          <div class="col-sm-5">
            <span>Left Value</span>
            <input type="text" class="form-control" name="left_value"
            value="<?php echo $data->A ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Right Value</span>
            <input type="text" class="form-control" name="right_value"
            value="<?php echo $data->B ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Commission</span>
            <input type="text" class="form-control" name="binary_matching"
            value="<?php echo $data->binary_matching ; ?>">
          </div>
        <?php } else { ?>
          <div class="col-sm-5">
            <span>Downline Value</span>
            <input type="text" class="form-control" name="downline"
            value="<?php echo $data->downline ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Commission</span>
            <input type="text" class="form-control" name="direct_commission"
            value="<?php echo $data->direct_commission ; ?>">
          </div>
        <?php } ?>
        </div>
        <div>&nbsp;</div>
        <div class="row" id='mypv_id'>
        <div class="col-sm-12">
          <label style="color: blue;">Target Value</label><br/>
        </div>
        <div class="col-sm-5">
          <span>MY PV</span>
          <input type="text" class="form-control" name="mypv" id='mypv'
          value="<?php echo $data->mypv; ?>">
        </div>
        <div class="col-sm-5">
          <span>Commission</span>
          <input type="text" class="form-control" name="amount"
          value="<?php echo $data->amount; ?>">
        </div>
      </div>
      <div>&nbsp;</div>
        <div class="row">
          <div class="col-sm-10">
            <label style="color: blue;">Level Commission </label><br/>
          </div>
          <div class="col-sm-5">
            <span>Level 1 </span><input type="text" class="form-control" name="p_level1" value="<?php echo $data->product_pur_level1_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 2 </span><input type="text" class="form-control" name="p_level2" value="<?php echo $data->product_pur_level2_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 3 </span><input type="text" class="form-control" name="p_level3" value="<?php echo $data->product_pur_level3_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 4 </span><input type="text" class="form-control" name="p_level4" value="<?php echo $data->product_pur_level4_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 5 </span><input type="text" class="form-control" name="p_level5" value="<?php echo $data->product_pur_level5_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 6 </span><input type="text" class="form-control" name="p_level6" value="<?php echo $data->product_pur_level6_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 7 </span><input type="text" class="form-control" name="p_level7" value="<?php echo $data->product_pur_level7_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 8 </span><input type="text" class="form-control" name="p_level8" value="<?php echo $data->product_pur_level8_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 9 </span><input type="text" class="form-control" name="p_level9" value="<?php echo $data->product_pur_level9_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 10 </span><input type="text" class="form-control" name="p_level10" value="<?php echo $data->product_pur_level10_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 11 </span><input type="text" class="form-control" name="p_level11" value="<?php echo $data->product_pur_level11_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 12 </span><input type="text" class="form-control" name="p_level12" value="<?php echo $data->product_pur_level12_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 13 </span><input type="text" class="form-control" name="p_level13" value="<?php echo $data->product_pur_level13_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 14 </span><input type="text" class="form-control" name="p_level14" value="<?php echo $data->product_pur_level14_comm ; ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 15 </span><input type="text" class="form-control" name="p_level15" value="<?php echo $data->product_pur_level15_comm ; ?>">
          </div>
        </div>
        <div>&nbsp;</div>
        <?php if (config_item('fix_income') == 'Yes') { ?>
                <div class="alert alert-danger">
                    <strong>Warning !</strong> You have enabled "Give Fix Income" option at Advance Setting section of Business
                    Setting. This means, product/service based income setting will not work now. So Income Setting is disabled
                    Here..
                </div>
            <?php } else { ?>
        <?php } ?>
        <div class="row">
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
                <a href="<?php echo site_url('plan/manage_repurchase');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
            </div>
        </div> <!-- end of 3rd row class -->
    </div> <!-- end of form-group class -->
    <?php echo form_close() ?>
</div> <!-- end of container class -->


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#edit_target").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#income_type').val() =="Downline"){
        $('#mypv').val('0');
        $('#mypv_id').hide();
        $('#downline_id').show();
        $("#based_on_id").show();
    }else{
      $('#mypv_id').show();
      $('#downline_id').hide();
      $("#based_on_id").hide();
    }
    $('#income_type').change(function(){
      if(this.value=='Downline')
      {
        $('#mypv').val('0');
        $('#mypv_id').hide();
        $('#downline_id').show();
        $("#based_on_id").show();
       }
      else{
        $('#mypv_id').show();
        $('#downline_id').hide();
        $("#based_on_id").hide();
      }
    });
  });
</script>