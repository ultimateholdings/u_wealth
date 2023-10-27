<div class="container">
  <?php echo form_open_multipart() ?>
    <div class="form-group">
      <?php if(config_item('enable_repurchase')=='Yes') { ?>
        <div class="row">
          <div class="col-sm-5">
              <label>Plan Type</label>
               <select class="form-control" id="plan_type" name="plan_type">
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
              <input type="text" class="form-control" name="plan_name" value="<?php echo set_value('plan_name') ?>">
          </div>
          <div class="col-sm-5" id='joining'>
              <label>Joining Fee (In <?php echo config_item('currency') ?>) - Inclusive of Tax</label>
              <input type="text" class="form-control" id='joining_fee' name="joining_fee" value="<?php echo set_value('joining_fee') ?>" required>
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row" id='pwidth'>
          <div class="col-sm-5" id='gst_val'>
              <label>VAT/TAX (%)</label>
              <input type="text" class="form-control" name="gst" value="<?php echo set_value('gst') ?>">
          </div>
          <?php if(config_item('width') > '2') { ?>
          <div class="col-sm-5">
              <label> Width </label>
              <input type="number" class="form-control" name="max_width"
                     value="<?php echo set_value('max_width') ?>">
          </div>
          <?php } else {?>
            <input type="hidden" class="form-control" name="max_width" value="<?php echo config_item('width') ?>">
          <?php } ?>
        </div>
        <div>&nbsp;</div>
        <?php if(config_item('width') > '2') { ?>
          <div class="row" id = 'auto_pool_id'>
            <div class="col-sm-5">
                <label>Enable Autopool Registration</label>
                 <select class="form-control" id="auto_pool" name="auto_pool">
                     <option value="No" >No</option>
                     <option value="Yes">Yes</option>
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
              <input type="text" class="form-control" name="pv" value="<?php echo set_value('pv') ?>">
          </div>        
          <div class="col-sm-5">
          </div>
        </div>
        <div>&nbsp;</div>
      <?php } ?>
      <?php if(config_item('width') == '2') { ?>
        <div class="row">
            <div class="col-sm-10">
              <label style="color: blue;"> Referral Commission (In <?php echo config_item('currency') ?>)</label><br/>
            </div>
            <div class="col-sm-5">
              <span>Configure Commission values as:</span>
              <select class="form-control" name="config_ref_comm" id="config_ref_comm">
                     <option value="amount" selected>Amount</option>
                     <option value="mrp_percent" >Percentage (Based on Joinig Fee)</option>
              </select>
            </div>
            <div class="col-sm-5" id="ref_plan_id">
              <span>Credit Based on</span>
              <select class="form-control" name="ref_plan" id="ref_plan">
                     <option value="joining" selected> Member Joining Fee</option>
                     <option value="sponsor">Sponsorer Joining Fee</option>
              </select>
            </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div class="col-sm-5" id='dincome'>
              <label>Direct Referral Commission</label>
              <input type="text" class="form-control" id="direct_income" name="direct_income"
                     value="<?php echo set_value('direct_income') ?>" required>
          </div>
          
            <div class="col-sm-5">
            <label>Leadership Bonus (Matching bonus)</label>
                <input type="text" class="form-control" name="sponsor_match_commission" value="<?php echo set_value('sponsor_match_commission') ?>">
          </div>
         
        </div>
        <div>&nbsp;</div>
        <div id='binary'>
          <div class="row">
            <div class="col-sm-5">
                 <label>First Pair Matching Ratio</label>
                 <select class="form-control" name="first_pair_ratio" id="first_pair_ratio">
                 <option value="1:2/2:1" selected>1:2/2:1</option>
                 <option value="1:1">1:1</option>
                 </select>
            </div>
            <div class="col-sm-5">
                 <label>Second Pair on wards Matching ratio</label>
                 <select class="form-control" name="second_pair_ratio" id="second_pair_ratio">
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
                     <option value="amount" selected>Amount</option>
                     <option value="pair_percent" >Percentage (Based on PV)</option>
              </select>
            </div>
          </div>
          <div>&nbsp;</div>
        <?php } ?>
          <div class="row">
            <div class="col-sm-5">
                <label>First Pair Matching Commission (In <?php echo config_item('currency') ?>)</label>
                <input type="text" class="form-control" name="first_pair_commission"
                       value="<?php echo set_value('first_pair_commission') ?>">
            </div>
            <div class="col-sm-5">
                <label>Second Pair onwards Matching Commission (In <?php echo config_item('currency') ?>)</label>
                <input type="text" class="form-control" name="second_pair_commission"
                       value="<?php echo set_value('second_pair_commission') ?>" >
            </div>
          </div>
          <div>&nbsp;</div>
          <div class="row">
            <div class="col-sm-5">
                <label>Capping Period: (Weekly Payout - Sunday to Saturday) </label>
                <select class="form-control" name="payout_frequency" id="payout_frequency">
                 <option value="daily" selected>Daily</option>
                 <option value="weekly" >Weekly</option>
                 <option value="monthly" >Monthly</option>
                 </select>
            </div>
            <div class="col-sm-5">
                <label>Weak Leg Carry Forward:</label>
                <select class="form-control" name="carry_forward" id="carry_forward" required="">
                  <option value="no" selected>No</option>
                   <option value="yes" >Yes</option>
                </select>
           </div>
          </div>
          <div>&nbsp;</div>
          <div class="row">
            <div class="col-sm-5">
                <label>Capping Pairs (0 for No Limit): </label>
                <input type="text"  class="form-control" name="capping" id="capping" value="<?php echo set_value('capping') ?>" />
                <input type="hidden" name="pairs" value="pairs" id="pairs"/>
            </div>
            <div class="col-sm-5">
                <label>Capping Amount In <?php echo config_item('currency') ?> (0 for No Limit): </label>
                <input type="number"  class="form-control" name="cappingamount" id="cappingamount" value="<?php echo set_value('cappingamount') ?>" />
                <input type="hidden" name="amount" value="amount" id="amount"/>
            </div>
          </div>
          <div>&nbsp;</div>
           <!--  <div class="row">
               <div class="col-sm-5">
                  <label>Sponsor Pair Matching Commission (In %)</label>
                  <input type="text" class="form-control" name="sponsor_pair_match" value="<?php echo set_value('sponsor_pair_match') ?>">
              </div>
            </div> -->
           <div>&nbsp;</div>
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
              <label style="color: blue;"> Referral Commission (In <?php echo config_item('currency') ?>)</label><br/>
            </div>
            <div class="col-sm-5">
              <span>Configure Commission values as:</span>
              <select class="form-control" name="config_ref_comm" id="config_ref_comm">
                     <option value="amount" selected>Amount</option>
                     <option value="mrp_percent" >Percentage (Based on Joinig Fee)</option>
              </select>
            </div>
            <div class="col-sm-5" id='ref_plan_id'>
              <span>Credit Based on</span>
              <select class="form-control" name="ref_plan" id="ref_plan">
                     <option value="joining" selected>Member Joining Fee</option>
                     <option value="sponsor">Sponsorer Joining Fee</option>
              </select>
            </div>
          </div>
          <div>&nbsp;</div>
          <div class="row">
            <div class="col-sm-5" id='dincome'>
                <span>Direct Referral Commission</span>
                <input type="text" class="form-control" name="direct_income" id="direct_income"
                       value="<?php echo set_value('direct_income') ?>" required>
            </div>
             <div class="col-sm-5">
                <label>Sponsor Matching Commission (In %)</label>
                <input type="text" class="form-control" name="sponsor_match_commission" value="<?php echo set_value('sponsor_match_commission') ?>">
            </div>
           <!--  <div id='l_ref_comm'> -->
            <div class="col-sm-5">
              <span>If Eligible for Both Direct Referral and Level Referral Comm </span>
              <select class="form-control" name="pay_ref_lev" id="pay_ref_lev">
                     <option value="onlyref" selected>Pay only Direct Referral Comm</option>
                     <option value="payboth" >Pay Both Direct Referral and Level Referral Comm</option>
              </select>
            </div>
            <div class="col-sm-5 mt-1">
              <span>Level 1 </span><input type="text" class="form-control" name="r_level1" value="<?php echo set_value('r_level1') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 2 </span><input type="text" class="form-control" name="r_level2" value="<?php echo set_value('r_level2') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 3 </span><input type="text" class="form-control" name="r_level3" value="<?php echo set_value('r_level3') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 4 </span><input type="text" class="form-control" name="r_level4" value="<?php echo set_value('r_level4') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 5 </span><input type="text" class="form-control" name="r_level5" value="<?php echo set_value('r_level5') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 6 </span><input type="text" class="form-control" name="r_level6" value="<?php echo set_value('r_level6') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 7 </span><input type="text" class="form-control" name="r_level7" value="<?php echo set_value('r_level7') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 8 </span><input type="text" class="form-control" name="r_level8" value="<?php echo set_value('r_level8') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 9 </span><input type="text" class="form-control" name="r_level9" value="<?php echo set_value('r_level9') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 10 </span><input type="text" class="form-control" name="r_level10" value="<?php echo set_value('r_level10') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 11 </span><input type="text" class="form-control" name="r_level11" value="<?php echo set_value('r_level11') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 12 </span><input type="text" class="form-control" name="r_level12" value="<?php echo set_value('r_level12') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 13 </span><input type="text" class="form-control" name="r_level13" value="<?php echo set_value('r_level13') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 14 </span><input type="text" class="form-control" name="r_level14" value="<?php echo set_value('r_level14') ?>">
            </div>
            <div class="col-sm-5">
              <span>Level 15 </span><input type="text" class="form-control" name="r_level15" value="<?php echo set_value('r_level15') ?>">
            </div>
          </div>
        <!--   </div> -->
          <div>&nbsp;</div>
        </div>
      <?php } ?>
      <?php if(config_item('roi_income')=='Yes') { ?>
      <div class="row">
        <div class="col-sm-5">
           <label>Enable ROI</label>
              <select id = 'fix_income' class="form-control" name="fix_income">
                <option value="0" selected>No</option>
                  <option value="1">Yes</option>
              </select>
        </div>
        <div id = 'roi_frequency' class="col-sm-5">
            <label>ROI Payout Frequency:</label>
            <select id = 'roi_frequency' class="form-control" name="roi_frequency">
            <option value="1" selected>Every Working Day</option>
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
                     value="<?php echo set_value('roi') ?>">
        </div>
        <div id = 'roi_limit' class="col-sm-5">
            <label>Total ROI Income</label>
            <input type="text" class="form-control" name="roi_limit"
                     value="<?php echo set_value('roi_limit') ?>">
        </div>
      </div>
      <div>&nbsp;</div>
      <div class="row">
        <div class="col-sm-5">
           <label>Enable Recurring Fee</label>
              <select id = 'enable_recurring_fee' class="form-control" name="enable_recurring_fee">
                <option value="0" selected>No</option>
                  <option value="1">Yes</option>
              </select>
        </div>
        <div id = 'recurring_fee' class="col-sm-5">
            <label>Recurring Fee</label>
             <input type="text" class="form-control" name="recurring_fee"
                     value="<?php echo set_value('recurring_fee') ?>">
        </div>
      </div>
      <div>&nbsp;</div>
      <div class="row">
        <div id = 'recurring_duration' class="col-sm-5">
            <label>Duration in Days</label>
             <input type="text" class="form-control" name="recurring_duration"
                     value="<?php echo set_value('recurring_duration') ?>">
        </div>
      </div>
      <div>&nbsp;</div>
      <?php } ?>
      <?php if(config_item('enable_product')=='Yes') { ?>
        <!-- <div class="row">
          <div class="col-sm-12">
            <label style="color: blue;">Product Sales Commission</label><br/>
          </div>
          <div class="col-sm-5">
            <span>Configure Commission values as:</span>
            <select class="form-control" name="config_comm" id="config_comm">
                   <option value="amount" selected>Amount</option>
                   <option value="mrp_percent" >Percentage (Based on Price)</option>
                   <?php if(config_item('enable_pv')=='Yes') { ?>
                    <option value="pv_percent" >Percentage (Based on BV/PV)</option>
                   <?php } ?>
            </select>
          </div>
          <div class="col-sm-5">
            <span>Self Product Purchase Commission</span>
            <input type="text" class="form-control" name="self_purchase_comm"
            value="<?php echo set_value('self_purchase_comm') ?>">
          </div>
        </div>
        <div>&nbsp;</div>
        <div class="row">
          <div class="col-sm-5">
            <span>Level 1 </span><input type="text" class="form-control" name="p_level1" value="<?php echo set_value('p_level1') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 2 </span><input type="text" class="form-control" name="p_level2" value="<?php echo set_value('p_level2') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 3 </span><input type="text" class="form-control" name="p_level3" value="<?php echo set_value('p_level3') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 4 </span><input type="text" class="form-control" name="p_level4" value="<?php echo set_value('p_level4') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 5 </span><input type="text" class="form-control" name="p_level5" value="<?php echo set_value('p_level5') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 6 </span><input type="text" class="form-control" name="p_level6" value="<?php echo set_value('p_level6') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 7 </span><input type="text" class="form-control" name="p_level7" value="<?php echo set_value('p_level7') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 8 </span><input type="text" class="form-control" name="p_level8" value="<?php echo set_value('p_level8') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 9 </span><input type="text" class="form-control" name="p_level9" value="<?php echo set_value('p_level9') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 10 </span><input type="text" class="form-control" name="p_level10" value="<?php echo set_value('p_level10') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 11 </span><input type="text" class="form-control" name="p_level11" value="<?php echo set_value('p_level11') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 12 </span><input type="text" class="form-control" name="p_level12" value="<?php echo set_value('p_level12') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 13 </span><input type="text" class="form-control" name="p_level13" value="<?php echo set_value('p_level13') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 14 </span><input type="text" class="form-control" name="p_level14" value="<?php echo set_value('p_level14') ?>">
          </div>
          <div class="col-sm-5">
            <span>Level 15 </span><input type="text" class="form-control" name="p_level15" value="<?php echo set_value('p_level15') ?>">
          </div>
        </div> -->
        <div>&nbsp;</div>
      <?php } ?>
      <?php if(config_item('width') == '2') { ?>
        <!-- <div class="row">
          <div class="col-sm-5">
              <label>Level Completion Income</label>
              <input type="text" class="form-control" name="level_income" value="<?php echo set_value('level_income') ?>">
          </div>        
          <div class="col-sm-5">
          </div>
        </div> -->
        <div>&nbsp;</div>
      <?php } ?>
        <div id= 'show'>
          <div class="row">
            <div class="col-sm-5">
              <span>Show Plan on Registration Form ?</span>
              <select class="form-control" name="join_form" id="join_form">
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
                  <input type="text" class="form-control" name="invoice_name" value="<?php echo set_value('invoice_name') ?>">
              </div>        
              <div class="col-sm-5">
              </div>
            </div>
            <div>&nbsp;</div>
          <?php } ?>
          <div class="row">
              <div class="col-sm-10">
                  <label>Plan Description</label>
                  <textarea class="form-control" id="editor" name="plan_desc"><?php echo set_value('prod_desc') ?></textarea>
              </div>
          </div>
        </div>
      <?php if (config_item('fix_income') == 'Yes') { ?>
        <div class="alert alert-danger">
            <strong>Warning !</strong> You have enabled "Give Fix Income" option at Advance Setting section of Business
            Setting. This means, product/service based income setting will not work now. So Income Setting is disabled
            Here..
        </div>
      <?php } ?>
      <div class="row">
          <div class="col-sm-12"><br/>
              <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
              <a href="<?php echo site_url('/admin');?>" id="cancel" name="cancel" class="btn btn-light">Cancel</a>
          </div>
      </div> <!-- end of 3rd row class -->
    </div> <!-- end of form-group class -->
    <?php echo form_close() ?>
</div> <!-- end of container class -->


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#plans > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<?php if((config_item('enable_crowdfund')=='Yes') || (config_item('width')=='1')) { ?>
  <script type="text/javascript">
  $(document).ready(function(){
        $('#l_ref_comm').hide(); 
    });
  </script>
<?php } ?>

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
