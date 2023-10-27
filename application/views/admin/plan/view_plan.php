<?php
?>
<?php if($data->type=='Registration') { ?>
<div style="margin-left: 20px;">
<div class="row view" style="line-height: 30px;">
    <div class="col-sm-6"><strong>Plan Name: </strong> <?php echo $data->plan_name ?></div>
    <div class="col-sm-6"><strong>Joining Fee: </strong> <?php echo config_item('currency') . $data->joining_fee ?>
    </div>
    <div class="col-sm-6"><strong>GST/ Tax (%): </strong> <?php echo $data->gst ?></div>
    <div class="col-sm-6"><strong>Type / Width : </strong>
    <?php if($data->max_width == 0) { echo 'Unilevel';} 
          else if($data->max_width == 1) { echo 'Single Leg';} 
          else if($data->max_width == 2) { echo 'Binary';} 
          else { echo $data->max_width;} 
    ?>
    </div>
    <div class="col-sm-6"><strong>Show on Registration Form:</strong> <?php echo $data->show_on_regform; ?></div>
    <div class="col-sm-6"><strong>Total Members Joined: </strong> <?php echo $data->sold_qty ?></div>
    <div class="col-sm-6"><strong>Selling Status: </strong> <?php echo $data->status ?></div>
    <div class="col-sm-6"><strong>BV/PV: </strong> <?php echo $data->pv ?></div>
    <?php if($data->max_width >1) { ?>
    <div class="col-sm-6"><strong>Auto Pool Registration:</strong> <?php echo $data->auto_pool; ?></div>
    <?php } ?>
</div>
<p class="hr_divider">&nbsp;</p>
<?php if(config_item('width') == '2') { ?>
    <div class="row view" style="line-height: 30px;">
        <div class="col-sm-12"><strong>Plan Detail: </strong> <?php echo $data->plan_description ?></div>
    </div>
    <p class="hr_divider">&nbsp;</p>
    <div class="row view" style="line-height: 30px;">
        <div class="col-sm-6"><strong>Configure Referral Commission values as: </strong><?php if($data->config_ref_comm=='amount'){echo 'Amount';}else if ($data->config_ref_comm=='mrp_percent'){echo 'Percentage (Based on Joining Fee)';} ?></div>
        <div class="col-sm-6"><strong>Credit Referral Income Based On: </strong> <?php if($data->ref_plan=='joining'){echo 'Member Joining Fee';}else if ($data->ref_plan=='sponsor'){echo 'Sponsorer Joining Fee';}?></div>
        <div class="col-sm-6"><strong>Direct Referral Income: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->direct_commission ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
        <div class="col-sm-6"><strong>Sponsor Matching Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->sponsor_match_commission ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
        <div class="col-sm-6"><strong>First Pair Ratio: </strong> <?php echo $data->first_pair_ratio ?></div>
        <div class="col-sm-6"><strong>First Pair Commission: </strong> <?php echo config_item('currency') . $data->first_pair_commission ?></div>
        <div class="col-sm-6"><strong>Second Pair Ratio: </strong> <?php echo  $data->second_pair_ratio ?></div>
        

        <div class="col-sm-6"><strong>Matching Incomes: </strong> <?php echo config_item('currency') . $data->second_pair_commission ?></div>
        <div class="col-sm-6"><strong>Sponsor Pair Matching Commission(%): </strong> <?php echo $data->sponsor_pair_match ?></div>
        <div class="col-sm-6"><strong>Capping Pairs: </strong> <?php if($data->capping >0) {echo $data->capping;} else {echo 'No Limit';}?></div>
        <div class="col-sm-6"><strong>Capping Amount: </strong> <?php if($data->cappingamount >0) {echo config_item('currency') . $data->cappingamount;} else {echo 'No Limit';} ?></div>
        <div class="col-sm-12"><strong>Weak Leg Carry Forward: </strong> <?php echo $data->carry_forward; ?></div>
    </div>
<?php } else { ?>    
<div class="row view" style="line-height: 30px;">
    <div class="col-sm-12"><strong>Referral Commission: </strong> </div>
</div>
<p class="hr_divider">&nbsp;</p>            
<div class="row view" id="direct_comm" style="line-height: 40px;"> 
    <div class="col-sm-6"><strong>Configure Commission values as: </strong><?php if($data->config_ref_comm=='amount'){echo 'Amount';}else if ($data->config_ref_comm=='mrp_percent'){echo 'Percentage (Based on Joining Fee)';} ?></div>
    <div class="col-sm-6"><strong>Credit Referral Income Based On: </strong> <?php if($data->ref_plan=='joining'){echo 'Member Joining Fee';}else if ($data->ref_plan=='sponsor'){echo 'Sponsorer Joining Fee';}?></div>
    <div class="col-sm-6"><strong>Direct Referral Income: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->direct_commission ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Sponsor Matching Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->sponsor_match_commission ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>   
</div>
    <div  class="row"  id='l_ref_comm' style="line-height: 40px;">
    <div class="col-sm-12"><strong>If Eligible for Both Direct Referral and Level Referral Comm: <br></strong> <?php if($data->pay_ref_lev == 'onlyref') {echo 'Pay only Direct Referral Comm';} else {echo 'Pay Both Direct Referral and Level Referral Comm';} ?></div>
    <div class="col-sm-6"><strong>Level1 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level1_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level2 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level2_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level3 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level3_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level4 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level4_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level5 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level5_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level6 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level6_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level7 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level7_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level8 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level8_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level9 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level9_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level10 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level10_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level11 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level11_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level12 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level12_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level13 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level13_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level14 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level14_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level15 Referral Commission: </strong><?php if($data->config_ref_comm=='amount'){echo config_item('currency');} ?><?php echo $data->ref_level15_comm ?><?php if($data->config_ref_comm=='mrp_percent'){echo '%';} ?></div>
    </div>
</div><p class="hr_divider">&nbsp;</p>
<?php } ?>
<?php if($data->fix_income == '1') { ?>
<div class="row view" style="line-height: 30px;">
<div class="col-sm-12"><strong>Enable ROI: </strong> <?php if($data->fix_income == '1') {echo "Yes";} else {echo "No";} ?></div>
<div class="col-sm-6"><strong>ROI Income: </strong> <?php echo config_item('currency') . $data->roi ?></div>
<div class="col-sm-6"><strong>ROI Payout Frequency: </strong> Every <?php if($data->roi_frequency==1) {echo "Working Day";} else if ($data->roi_frequency==2) {echo "Calender Day";} else if ($data->roi_frequency==3) {echo "Week";} else if ($data->roi_frequency==4) {echo "Friday";} else {echo "Month - Twice Payout";} ?></div>
<div class="col-sm-6"><strong>Total ROI Income: </strong> <?php echo config_item('currency') . $data->roi_limit ?> </div>
</div>
<p class="hr_divider">&nbsp;</p>
<?php } ?>
<?php if($data->enable_recurring_fee == '1') { ?>
<div class="row view" style="line-height: 30px;">
<div class="col-sm-12"><strong>Enable Recurring Fee: </strong> <?php if($data->enable_recurring_fee == '1') {echo "Yes";} else {echo "No";} ?></div>
<div class="col-sm-6"><strong>Recurring Fee: </strong> <?php echo $data->recurring_fee ?></div>
<div class="col-sm-6"><strong>Payment Duration: </strong> Every <?php echo $data->recurring_duration ?> Days</div>
</div>
<p class="hr_divider">&nbsp;</p>
<?php } ?>
<?php if(config_item('enable_product')=='Yes') { ?>
<div class="row view" style="line-height: 30px;">
    <div class="col-sm-12"><strong>Product Sales Commission: </strong> </div>
</div><p class="hr_divider">&nbsp;</p>
<div class="row view" style="line-height: 30px;">
    <div class="col-sm-6"><strong>Configure Commission values as: </strong> <?php if($data->config_comm=='amount'){echo 'Amount';}elseif ($data->config_comm=='mrp_percent'){echo 'Percentage (Based on Price)';}
                        elseif ($data->config_comm=='pv_percent') {echo 'Percentage (Based on BV/PV)';} ?>
    </div>
    <div class="col-sm-6"><strong>Self Product Purchase Commission </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->self_product_purchase_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
</div>
<div class="row view" style="line-height: 40px;">    
    <div class="col-sm-6"><strong>Level1 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level1_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level2 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level2_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level3 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level3_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level4 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level4_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level5 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level5_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level6 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level6_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level7 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level7_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level8 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level8_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level9 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');}?><?php echo $data->product_pur_level9_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level10 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level10_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level11 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level11_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level12 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level12_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level13 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level13_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level14 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level14_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6"><strong>Level15 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level15_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
</div>
<?php } ?>
<div class="row view" style="display: none;">
    <div class="col-sm-6"><strong>Guest Product Purchase Level 1 Commission: </strong> <?php  $data->guest_pcommission_level1 ?></div>
    <div class="col-sm-6"><strong>Guest Product Purchase Level 2 Commission: </strong> <?php $data->guest_pcommission_level2 ?></div>
    <div class="col-sm-6"><strong>Guest Product Purchase Level 3 Commission: </strong> <?php $data->guest_pcommission_level3 ?></div>
    <div class="col-sm-6"><strong>Guest Product Purchase Level 4 Commission: </strong> <?php  $data->guest_pcommission_level4 ?></div>
    <div class="col-sm-6"><strong>Guest Product Purchase Level 5 Commission: </strong> <?php  $data->guest_pcommission_level5 ?></div>
</div>
<br>
<div class="row view" style="margin-left: 5px;" style="line-height: 30px;">
    <div class="col-sm-6"><strong>Plan Description: </strong> <?php echo $data->plan_description ?></div>
</div>
<br>
<div align="left">
    <img src="<?php echo $data->plan_image ? base_url('uploads/' . $data->plan_image) : base_url('uploads/default.jpg'); ?>"
         class="img-responsive img-rounded" style="width: 100px; height: 100px;">
</div>
<br>
<a href="<?php echo site_url('plan/manage_plans') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>
</div>



<?php } else { ?>
<div style="margin-left: 20px;">
<div class="row view">
    <div class="col-sm-6"><strong>Plan Name: </strong> <?php echo $data->plan_name ?></div>
</div>
<p class="hr_divider">&nbsp;</p>
<div class="row view">
    <div class="col-sm-12"><strong>Product Sales Commission: </strong> </div>
</div>
<p class="hr_divider">&nbsp;</p>
<div class="row view" style="margin-left: 5px;" style="line-height: 30px;">
    <div class="col-sm-6"><strong>Configure Commission values as: </strong> <?php if($data->config_comm=='amount'){echo 'Amount';}elseif ($data->config_comm=='mrp_percent'){echo 'Percentage (Based on Price)';}
                        elseif ($data->config_comm=='pv_percent') {echo 'Percentage (Based on BV/PV)';} ?>
    </div>
    <div class="col-sm-6 mb-1"><strong>Self Product Purchase Commission </strong> <?php echo $data->self_product_purchase_comm ?></div>
</div>
<div class="row view" style="margin-left: 5px;" style="line-height: 30px;">
    <div class="col-sm-6 mb-1"><strong>Level Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level1_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level2 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level2_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level3 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level3_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level4 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level4_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level5 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level5_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level6 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level6_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level7 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level7_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level8 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level8_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level9 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');}?><?php echo $data->product_pur_level9_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level10 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level10_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level11 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level11_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level12 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level12_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level13 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level13_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level14 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level14_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>
    <div class="col-sm-6 mb-1"><strong>Level15 Product Purchase Commission: </strong><?php if($data->config_comm=='amount'){echo config_item('currency');} ?><?php echo $data->product_pur_level15_comm ?><?php if($data->config_comm=='mrp_percent'){echo '%';} ?></div>    
</div>
</div>
<?php } ?>
&nbsp;


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#plans > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<?php if((config_item('enable_crowdfund')=='Yes') || (config_item('width')=='1')) { ?>
  <script type="text/javascript">
  $(document).ready(function(){
        $('#l_ref_comm').hide();
    });
  </script>
<?php } ?>