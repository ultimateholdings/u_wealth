<?php

?>
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>

<div class="container">
  <?php echo form_open_multipart() ?>
    <div class="form-group">
      <?php if(config_item('enable_repurchase')=='Yes') { ?>
        <div class="row">
          <div class="col-sm-5">
              <label>Plan Type</label>
               <select class="form-control" id="plan_type" name="plan_type" disabled>
               <option value="<?php echo $data->type ?>"><?php echo $data->type ?></option>
               <option value="Registration">Registration</option>
               <option value="Repurchase">Repurchase</option>
               </select>
          </div>      
          <div class="col-sm-5">
          </div>
        </div>
        <div>&nbsp;</div>
      <?php } ?>
        <div class="row">
          <div class="col-sm-5">
              <label>Plan Name</label>
              <input type="text" class="form-control" name="plan_name" value="<?php echo $data->plan_name ?>">
          </div>
          <input type="hidden" name="id" value="<?php echo $data->id ?>">
          <input type="hidden" name="image" value="<?php echo $data->plan_image ?>">
          <div class="col-sm-5" id='joining'>
              <label>Joining Fee (In <?php echo config_item('currency') ?>) - Inclusive of Tax</label>
              <input type="text" class="form-control" id="joining_fee" name="joining_fee" value="<?php echo $data->joining_fee ?>">
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div class="col-sm-5" id='gst_val'>
              <label>VAT/TAX (%)</label>
              <input type="text" class="form-control" name="gst" value="<?php echo $data->gst ?>">
          </div>
          <?php if((config_item('width') >2)&&($data->type != 'Repurchase')) { ?>
          <div class="col-sm-5">
              <label> Width </label>
              <input type="number" class="form-control" name="max_width"
                     value="<?php echo $data->max_width ?>">
          </div>
        <?php } else { ?>
          <input type="hidden" class="form-control" name="max_width" value="<?php echo $data->max_width ?>">
        <?php } ?>
        </div>
        <div>&nbsp;</div>
        <?php if(config_item('width') > '2') { ?>
          <div class="row" id="auto_pool_id">
            <div class="col-sm-5">
                <label>Enable Autopool Registration</label>
                 <select class="form-control" id="auto_pool" name="auto_pool" disabled>
                  <option value="<?php echo $data->auto_pool ?>"><?php echo $data->auto_pool ?></option>
                     <option value="Yes">Yes</option>
                     <option value="No" >No</option>
                 </select>
            </div>        
            <div class="col-sm-5">
            </div>
          </div>
          <div>&nbsp;</div>
        <?php } ?>
        <?php if(config_item('enable_pv')=='Yes') { ?>
        <div class="row">
          <div class="col-sm-5" id='pvbv'>
              <label>Ultimate Points</label>
              <input type="text" class="form-control" name="pv" value="<?php echo $data->pv ?>">
          </div>        
          <div class="col-sm-5">
          </div>
        </div>
        <div>&nbsp;</div>
      <?php } ?>
      <?php if(config_item('width') == '2') { ?>
      <div>&nbsp;</div>
      <div class="row">
          <div class="col-sm-5">
              <span>Configure Commission values as:</span>
              <select class="form-control" name="config_ref_comm" id="config_ref_comm">
                     <option value="<?php echo $data->config_ref_comm ?>" selected><?php if($data->config_ref_comm=='amount'){echo 'Amount';}else if ($data->config_ref_comm=='mrp_percent'){echo 'Percentage (Based on Joining Fee)';}
                        else if ($data->config_ref_comm=="pv_percent") {echo 'Percentage (Based on BV/PV)';}?>
                     </option>
                     <option value="amount">Amount</option>
                     <option value="mrp_percent" >Percentage (Based on Joinig Fee)</option>
              </select>
          </div>
          <div class="col-sm-5" id="ref_plan_id">
            <span>Credit Based on</span>
            <select class="form-control" name="ref_plan" id="ref_plan">
                  <option value="<?php echo $data->ref_plan ?>" selected><?php if($data->ref_plan=='joining'){echo 'Member Joining Fee';}else if ($data->ref_plan=='sponsor'){echo 'Sponsorer Joining Fee';}?>
                  </option>
                  <option value="joining">Member Joining Fee</option>
                  <option value="sponsor">Sponsorer Joining Fee</option>
            </select>
          </div>
          <div class="col-sm-5" id='dincome'>
              <label>Direct Referral Commission</label>
              <input type="text" class="form-control" id="direct_income" name="direct_income"
                     value="<?php echo $data->direct_commission ?>" required>
          </div>
         
             <div class="col-sm-5">
              <label>Leadership Bonus (Matching bonus)</label>
              <input type="text" class="form-control" name="sponsor_match_commission"
                     value="<?php echo $data->sponsor_match_commission ?>" required>
          </div>
      </div>
      <div>&nbsp;</div>
      <div id='binary'>
        <div class="row">
         <div class="col-sm-5">
             <label>First Pair Matching Ratio</label>
             <select class="form-control" name="first_pair_ratio" id="first_pair_ratio" value="<?php echo $data->first_pair_ratio ?>">
              <option value="<?php echo $data->first_pair_ratio ?>"> <?php echo $data->first_pair_ratio ?> </option>
              <option value="1:1">1:1</option>
              <option value="1:2/2:1">1:2/2:1</option>
             </select>
         </div>
         <div class="col-sm-5">
             <label>Second Pair on wards Matching ratio</label>
             <select class="form-control" name="second_pair_ratio" id="second_pair_ratio" value="<?php echo $data->second_pair_ratio ?>">
             <option value="1:1" selected="">1:1</option>
             </select>
         </div>
        </div>
        <div>&nbsp;</div>
        <?php if(config_item('enable_pv')=='Yes') { ?>
          <div class="row">
            <div class="col-sm-5">
              <span>Configure Pair Matching Commission values as:</span>
              <select class="form-control" name="config_ref_comm_pair" id="config_ref_comm_pair">
                     <option value="<?php echo $data->config_comm_pv ?>" selected><?php if($data->config_comm_pv=='amount'){echo 'Amount';}else if ($data->config_comm_pv=='percentage'){echo 'Percentage (Based on BV/PV)';}
                        ?>
                     </option>
                     <option value="amount">Amount</option>
                     <option value="mrp_percent" >Percentage (Based on BV/PV)</option>
              </select>
            </div>
          </div>
        <div>&nbsp;</div>
         <?php } ?>
        <div class="row">
          <div class="col-sm-5">
              <label>First Pair Matching Commission</label>
              <input type="text" class="form-control" name="first_pair_commission"
                     value="<?php echo $data->first_pair_commission ?>"required>
          </div>
          <div class="col-sm-5">
              <label>Second Pair onwards Matching Commission</label>
              <input type="text" class="form-control" name="second_pair_commission"
                     value="<?php echo $data->second_pair_commission ?>" required>
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div class="col-sm-5">
              <label>Payout Frequency: (Weekly Payout - Sunday to Saturday) </label>
              <select class="form-control" name="payout_frequency" id="payout_frequency">
               <option value="<?php echo $data->payout_frequency ?>"> <?php echo $data->payout_frequency ?> </option>
               <option value="daily">Daily</option>
               <option value="weekly" >Weekly</option>
               <option value="monthly" >Monthly</option>
               </select>
          </div>
          <div class="col-sm-5">
            <label>Weak Leg Carry Forward:</label>
            <select class="form-control" name="carry_forward" id="carry_forward" required="">
              <option value="<?php echo $data->carry_forward ?>"> <?php echo $data->carry_forward ?> </option>
              <option value="no" >No</option>
               <option value="yes">Yes</option>
            </select>
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div class="col-sm-5">
              <label>Capping Pairs (0 for No Limit): </label>
              <input type="text"  class="form-control" name="capping" id="capping" value="<?php echo $data->capping ?>" required/>
              <input type="hidden" name="pairs" value="pairs" id="pairs"/>
          </div>
          <div class="col-sm-5">
              <label>Capping Amount In <?php echo config_item('currency') ?> (0 for No Limit): </label>
              <input type="number"  class="form-control" name="cappingamount" id="cappingamount" value="<?php echo $data->cappingamount ?>" />
              <input type="hidden" name="pairs" value="pairs" id="pairs"/>
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <!-- <div class="col-sm-5">
              <label>Sponsor Pair Matching Commission</label>
              <input type="text" class="form-control" name="sponsor_pair_match"
                     value="<?php echo $data->sponsor_pair_match ?>" required>
          </div> -->
        </div>
        <div class="row">
          <div class="col-sm-5" style="align-content: center;">
              <label><strong>Commission Mode:</strong> Weak Leg Pay</label>
          </div>
        </div>
        <div>&nbsp;</div>
      </div>
        <?php } else { ?>
        <div id='direct_comm'>
          <div class="row">
            <div class="col-sm-10">
              <label style="color: blue;">Referral Commission</label>
            </div>
            <div class="col-sm-5">
              <span>Configure Commission values as:</span>
              <select class="form-control" name="config_ref_comm" id="config_ref_comm">
                     <option value="<?php echo $data->config_ref_comm ?>" selected><?php if($data->config_ref_comm=='amount'){echo 'Amount';}else if ($data->config_ref_comm=='mrp_percent'){echo 'Percentage (Based on Joining Fee)';}
                        else if ($data->config_ref_comm=="pv_percent") {echo 'Percentage (Based on BV/PV)';}?>
                      </option>
                     <option value="amount">Amount</option>
                     <option value="mrp_percent" >Percentage (Based on Joinig Fee)</option>
              </select>
            </div>
            <div class="col-sm-5" id="ref_plan_id">
              <span>Credit Based on</span>
              <select class="form-control" name="ref_plan" id="ref_plan">
                    <option value="<?php echo $data->ref_plan ?>" selected><?php if($data->ref_plan=='joining'){echo 'Member Joining Fee';}else if ($data->ref_plan=='sponsor'){echo 'Sponsorer Joining Fee';}?>
                  </option>
                  <option value="joining">Member Joining Fee</option>
                  <option value="sponsor">Sponsorer Joining Fee</option>
              </select>
            </div>
          </div>
          <div>&nbsp;</div>
          <div class="row">
            <div class="col-sm-5">
                <span>Direct Referral Commission</span>
                <input type="text" class="form-control" id="direct_income" name="direct_income"
                       value="<?php echo $data->direct_commission?>" required>
            </div>
             <div class="col-sm-5">
              <label>Sponsor Matching Commission</label>
              <input type="text" class="form-control" name="sponsor_match_commission"
                     value="<?php echo $data->sponsor_match_commission ?>" required>
            </div>
            <!-- <div id='l_ref_comm'> -->
            <div class="col-sm-5">
              <span>If Eligible for Both Direct Referral and Level Referral Comm </span>
              <select class="form-control" name="pay_ref_lev" id="pay_ref_lev">
                      <option value="<?php echo $data->pay_ref_lev ?>"><?php if($data->pay_ref_lev == 'onlyref') {echo 'Pay only Direct Referral Comm';} else {echo 'Pay Both Direct Referral and Level Referral Comm';} ?> </option>
                     <option value="onlyref">Pay only Direct Referral Comm</option>
                     <option value="payboth" >Pay Both Direct Referral and Level Referral Comm</option>
              </select>
            </div>
            <div class="col-sm-5 mt-1">
              <span>Level 1 </span><input type="text" class="form-control" name="r_level1" value="<?php echo $data->ref_level1_comm?>">
            </div>
            <div class="col-sm-5">
              <span>Level 2 </span><input type="text" class="form-control" name="r_level2" value="<?php echo $data->ref_level2_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 3 </span><input type="text" class="form-control" name="r_level3" value="<?php echo $data->ref_level3_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 4 </span><input type="text" class="form-control" name="r_level4" value="<?php echo $data->ref_level4_comm ?>">
            </div>
            <!-- <div> -->
            <div class="col-sm-5">
              <span>Level 5 </span><input type="text" class="form-control" name="r_level5" value="<?php echo $data->ref_level5_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 6 </span><input type="text" class="form-control" name="r_level6" value="<?php echo $data->ref_level6_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 7 </span><input type="text" class="form-control" name="r_level7" value="<?php echo $data->ref_level7_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 8 </span><input type="text" class="form-control" name="r_level8" value="<?php echo $data->ref_level8_comm?>">
            </div>
            <div class="col-sm-5">
              <span>Level 9 </span><input type="text" class="form-control" name="r_level9" value="<?php echo $data->ref_level9_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 10 </span><input type="text" class="form-control" name="r_level10" value="<?php echo $data->ref_level10_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 11 </span><input type="text" class="form-control" name="r_level11" value="<?php echo $data->ref_level11_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 12 </span><input type="text" class="form-control" name="r_level12" value="<?php echo $data->ref_level12_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 13 </span><input type="text" class="form-control" name="r_level13" value="<?php echo $data->ref_level13_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 14 </span><input type="text" class="form-control" name="r_level14" value="<?php echo $data->ref_level14_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 15 </span><input type="text" class="form-control" name="r_level15" value="<?php echo $data->ref_level15_comm ?>">
            </div>
            </div>
          <!--   </div> -->
          </div>
        </div>
        <?php } ?>
        <div>&nbsp;</div>
        <?php if(config_item('roi_income')=='Yes') { ?>
        <div class="row">
          <div class="col-sm-5">
             <label>Enable ROI</label>
                <select id = 'fix_income' class="form-control" name="fix_income">
                  <option value="<?php echo $data->fix_income ?>"> <?php if($data->fix_income==0) {echo "No";} else {echo "Yes";} ?> </option>
                  <option value="0" >No</option>
                    <option value="1">Yes</option>
                </select>
          </div>
          <div id = 'roi_frequency' class="col-sm-5">
              <label>ROI payout frequency</label>
              <select id = 'roi_frequency' class="form-control" name="roi_frequency">
                <option value="<?php echo $data->roi_frequency ?>"> <?php if($data->roi_frequency ==1) {echo "Every Working Day";} else if($data->roi_frequency ==2) {echo "Every Calender Day";} else if($data->roi_frequency ==3) {echo "Weekly";} else if($data->roi_frequency ==4) {echo "Every Friday";} else if($data->roi_frequency ==5) {echo "Every Month - Twice Payout";} ?></option>
              <option value="1" >Every Working Day</option>
              <option value="2" >Every Calender Day</option>
              <!--<option value="3" >Weekly</option>
              <option value="4" >Every Friday</option>
              <option value="5" >Every Month - Twice Payout</option>-->
              </select>
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div id = 'roi' class="col-sm-5">
              <label>ROI Income</label>
               <input type="text" class="form-control" name="roi"
                       value="<?php echo $data->roi ?>">
          </div>
          <div id = 'roi_limit' class="col-sm-5">
              <label>Total ROI Income</label>
              <input type="text" class="form-control" name="roi_limit"
                       value="<?php echo $data->roi_limit ?>">
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div class="col-sm-5">
             <label>Enable Recurring Fee</label>
                <select id = 'enable_recurring_fee' class="form-control" name="enable_recurring_fee">
                  <option value="<?php echo $data->enable_recurring_fee ?>"> <?php if($data->enable_recurring_fee ==1) {echo "Yes";} else {echo "No";} ?></option>
                  <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
          </div>
          <div id = 'recurring_fee' class="col-sm-5">
              <label>Recurring Fee</label>
               <input type="text" class="form-control" name="recurring_fee"
                       value="<?php echo $data->recurring_fee ?>">
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div id = 'recurring_duration' class="col-sm-5">
              <label>Duration in Days</label>
               <input type="text" class="form-control" name="recurring_duration"
                       value="<?php echo $data->recurring_duration ?>">
          </div>
        </div>
        <div>&nbsp;</div>
        <?php } ?>
        <?php if(config_item('enable_product')=='Yes') { ?>
          <!-- <div class="row">
            <div class="col-sm-10">
              <label style="color: blue;">Product Sales Commission</label>
            </div>
            <div class="col-sm-5">
              <span>Configure Commission values as:</span>
              <select class="form-control" name="config_comm" id="config_comm">
                     <option value="<?php echo $data->config_comm ?>" selected><?php if($data->config_comm=='amount'){echo 'Amount';}else if ($data->config_comm=='mrp_percent'){echo 'Percentage (Based on Price)';}
                        else if ($data->config_comm=="pv_percent") {echo 'Percentage (Based on BV/PV)';}?>
                      </option>
                     <option value="amount">Amount</option>
                     <option value="mrp_percent" >Percentage (Based on Price)</option>
                     <?php if(config_item('enable_pv')=='Yes') { ?>
                     <option value="pv_percent" >Percentage (Based on BV/PV)</option>
                     <?php } ?>
              </select>
            </div>
            <div class="col-sm-5">
              <span>Self Product Purchase Commission (% of Order Total)</span>
              <input type="text" class="form-control" name="self_purchase_comm"
                   value="<?php echo $data->self_product_purchase_comm ?>">
            </div>
          </div>
          <div>&nbsp;</div>
          <div class="row">
            <div class="col-sm-10">
              <label style="color: blue;">Product Purchase Commission(% of Order Total)</label><br/>
            </div>
            <div class="col-sm-5">
              <span>Level 1 </span><input type="text" class="form-control" name="p_level1" value="<?php echo $data->product_pur_level1_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 2 </span><input type="text" class="form-control" name="p_level2" value="<?php echo $data->product_pur_level2_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 3 </span><input type="text" class="form-control" name="p_level3" value="<?php echo $data->product_pur_level3_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 4 </span><input type="text" class="form-control" name="p_level4" value="<?php echo $data->product_pur_level4_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 5 </span><input type="text" class="form-control" name="p_level5" value="<?php echo $data->product_pur_level5_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 6 </span><input type="text" class="form-control" name="p_level6" value="<?php echo $data->product_pur_level6_comm ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 7 </span><input type="text" class="form-control" name="p_level7" value="<?php echo $data->product_pur_level7_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 8 </span><input type="text" class="form-control" name="p_level8" value="<?php echo $data->product_pur_level8_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 9 </span><input type="text" class="form-control" name="p_level9" value="<?php echo $data->product_pur_level9_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 10 </span><input type="text" class="form-control" name="p_level10" value="<?php echo $data->product_pur_level10_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 11 </span><input type="text" class="form-control" name="p_level11" value="<?php echo $data->product_pur_level11_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 12</span><input type="text" class="form-control" name="p_level12" value="<?php echo $data->product_pur_level12_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 13</span><input type="text" class="form-control" name="p_level13" value="<?php echo $data->product_pur_level13_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 14</span><input type="text" class="form-control" name="p_level14" value="<?php echo $data->product_pur_level14_comm  ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 15</span><input type="text" class="form-control" name="p_level15" value="<?php echo $data->product_pur_level15_comm  ?>">
            </div>
          </div>
          <div>
            
          </div> -->
        <?php } ?>
        <?php if(config_item('width') == '2') { ?>
        <!-- <div class="row">
          <div class="col-sm-5">
              <label>Level Completion Income</label>
              <input type="text" class="form-control" name="level_income" value="<?php echo $data->level_income ?>">
          </div>        
          <div class="col-sm-5">
          </div>
        </div> -->
        <div>&nbsp;</div>
      <?php } ?>
        <div id='show'>
          <div class="row mt-2">
            <div class="col-sm-5">
              <span>Show Plan on Registration Form ?</span>
              <select class="form-control" name="join_form" id="join_form">
                     <option value="<?php echo $data->show_on_regform ?>"><?php echo $data->show_on_regform ?></option>
                     <option value="Yes">Yes</option>
                     <option value="No" >No</option>
              </select>
            </div>
            <div class="col-sm-5" style="display: flex;align-items: center;">
              <div style="white-space:nowrap">
                <label>Select Image for Plan</label>
                <input type="file" name="img">
              </div>
            </div>
          </div>
          <div>&nbsp;</div>
          <?php if(config_item('enable_invoice') == 'Yes') { ?>
            <div class="row">
              <div class="col-sm-5">
                  <label>Invoice Name</label>
                  <input type="text" class="form-control" name="invoice_name" value="<?php echo $data->invoice_name ?>">
              </div>        
              <div class="col-sm-5">
              </div>
            </div>
            <div>&nbsp;</div>
          <?php } ?>
          <div class="row">
              <div class="col-sm-10">
                  <label>Product/Service Description</label>
                  <textarea class="form-control" id="editor" name="plan_desc"><?php echo $data->plan_desc ?></textarea>
              </div>
          </div>
          <div>&nbsp;</div>
        </div>
        <?php if (config_item('fix_income') == 'Yes') { ?>
                <div class="alert alert-danger">
                    <strong>Warning !</strong> You have enabled "Give Fix Income" option at Advance Setting section of Business
                    Setting. This means, product/service based income setting will not work now. So Income Setting is disabled
                    Here..
                </div>
            <?php } else { ?>
        <?php } ?>
        <div class="row" style="height: 110px;">
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
                <a href="<?php echo site_url('plan/manage_plans');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
            </div>
        </div> <!-- end of 3rd row class -->
    </div> <!-- end of form-group class -->
    <?php echo form_close() ?>
</div> <!-- end of container class -->


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#plans > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script>
    $(document).ready(function(){
        $("#button1").on("click", function(){
               var count = $('#BinaryLevels tr').length;
               //window.alert(count);
               if(count<25){
               var new_count = count+1;
               var row = "<tr><td><input type='text' class='form-control' name='new_level[]' value= " +  new_count + " placeholder='Level' required></input></td><td><input type='number' class='form-control' name='new_commission[]' value='' placeholder='Commission' required></input></td></tr>";
             $("#BinaryLevels").append(row);
             //window.alert(row);
               }
           });

         });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#fix_income').val() =="0"){
        $('#roi').hide()
        $('#roi_frequency').hide()
        $('#roi_limit').hide()
    }
    $('#fix_income').change(function(){
      if(this.value=='1')
      {
        $('#roi').show()
        $('#roi_frequency').show()
        $('#roi_limit').show()
       }
      else{
        $('#roi').hide()
        $('#roi_frequency').hide()
        $('#roi_limit').hide()
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#enable_recurring_fee').val() =="0"){
        $('#recurring_fee').hide()
        $('#recurring_duration').hide()
    }
    $('#enable_recurring_fee').change(function(){
      if(this.value=='1')
      {
        $('#recurring_fee').show()
        $('#recurring_duration').show()
       }
      else{
        $('#recurring_fee').hide()
        $('#recurring_duration').hide()
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#config_ref_comm').val() =="amount"){
        $('#ref_plan_id').hide()
    }
    $('#config_ref_comm').change(function(){
      if(this.value=='amount')
      {
        $('#ref_plan_id').hide()   
       }
      else{
        $('#ref_plan_id').show()
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#plan_type').val() =="Repurchase"){
        $('#joining_fee').val('0');
        $('#direct_income').val('0'); 
        $('#join_form').val('No');
        $('#joining').hide() ;
        $('#gst_val').hide();
        $('#dincome').hide();
        $('#binary').hide();
        $('#show').hide();
        $('#direct_comm').hide();
        $('#pwidth').hide(); 
        $('#pvbv').hide();
        $('#auto_pool_id').hide();
    }
    $('#plan_type').change(function(){
      if(this.value=='Repurchase')
      {
        $('#joining_fee').val('0');
        $('#direct_income').val('0');
        $('#join_form').val('No');
        $('#joining').hide(); 
        $('#gst_val').hide();
        $('#dincome').hide();
        $('#binary').hide();
        $('#show').hide();
        $('#direct_comm').hide();
        $('#pwidth').hide();
        $('#pvbv').hide();
        $('#auto_pool_id').hide();
       }
      else{
        $('#joining_fee').val('');
        $('#direct_income').val(''); 
        $('#join_form').val('Yes');
        $('#joining').show();
        $('#gst_val').show();
        $('#dincome').show();
        $('#binary').show();
        $('#show').show();
        $('#direct_comm').show();
        $('#pwidth').show();
        $('#pvbv').show();
        $('#auto_pool_id').show();
      }
    });
  });
</script>


<?php if((config_item('enable_crowdfund')=='Yes') || (config_item('width')=='1')) { ?>
  <script type="text/javascript">
  $(document).ready(function(){
        $('#l_ref_comm').hide();
    });
  </script>
<?php } ?>