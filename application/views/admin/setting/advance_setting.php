<?php echo form_open() ?>
<div class="row">
    <br>
    <div class="col-sm-12">
        <h2 align="center">Advanced Modules</h2>
        
    </div>
    <div class="col-sm-12">
         <h3 align="center" style="color: blue;">Please contact support to Enable / Disable Module</h3>
    </div>
   
    <div class="col-sm-6">
        <label>Enable Rewards ?</label>
        <select class="form-control" name="enable_reward" disabled>
            <option selected value="<?php echo set_value('enable_reward', config_item('enable_reward')) ?>"><?php echo set_value('enable_reward', config_item('enable_reward')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable Coupon ?</label>
        <select class="form-control" name="enable_coupon" disabled>
            <option selected value="<?php echo set_value('enable_coupon', config_item('enable_coupon')) ?>"><?php echo set_value('enable_coupon', config_item('enable_coupon')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable Product & Services ?</label>
        <select class="form-control" name="enable_product" disabled>
            <option selected value="<?php echo set_value('enable_product', config_item('enable_product')) ?>"><?php echo set_value('enable_product', config_item('enable_product')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable Ecommerce Store ?</label>
        <select class="form-control" name="enable_ecom" disabled>
            <option selected value="<?php echo set_value('enable_ecom', config_item('enable_ecom')) ?>"><?php echo set_value('enable_ecom', config_item('enable_ecom')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable franchisee ?</label>
        <select class="form-control" name="enable_franchisee" disabled>
            <option selected value="<?php echo set_value('enable_franchisee', config_item('enable_franchisee')) ?>"><?php echo set_value('enable_franchisee', config_item('enable_franchisee')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable Repurchase System ?</label>
        <select class="form-control" name="enable_repurchase" id='enable_repurchase' disabled>
            <option value="<?php echo set_value('enable_repurchase', config_item('enable_repurchase')) ?>" selected><?php echo set_value('enable_repurchase', config_item('enable_repurchase')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable Payment Gateway ?</label>
        <select class="form-control" name="enable_pg" disabled>
            <option selected value="<?php echo set_value('enable_pg', config_item('enable_pg')) ?>">
                <?php echo set_value('enable_pg', config_item('enable_pg')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable SMS Notification ?</label>
        <select class="form-control" name="sms_on_join" id='sms' disabled>
            <option selected value="<?php echo set_value('sms_on_join', config_item('sms_on_join')) ?>"><?php echo set_value('sms_on_join', config_item('sms_on_join')) ?></option>
            <option>Yes</option>
            <option >No</option>
        </select>
    </div>
    <div class="col-sm-6" id='sms_api' style="display: none;">
        <label>SMS API
            <span style="font-size: 12px">(Format: https://apiurl.com?no={{phone}}&msg={{msg}}&other_parameters.)</span>
        </label>
        <input type="password" class="form-control" value="<?php echo set_value('sms_api', config_item('sms_api')) ?>"
               name="sms_api" disabled>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Developer Password</label> (This is not admin password)
        <input type="password" class="form-control" name="dev_pass">
    </div>
</div>
<hr/>
<div class="row" style="display: none;">
    <div class="col-sm-6">
        <label>ID Prefix</label>
        <input type="text" class="form-control"
               value="<?php echo set_value('', config_item('ID_EXT')) ?>"
               name="id_ext">
    </div>
    <div class="col-sm-6" style="display: none">
        <label>Want to show Joining Products at Registration form ?</label>
        <select class="form-control" name="show_join_product">
            <option selected><?php echo set_value('Yes', config_item('show_join_product')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Is registration is free ?</label>
        <select class="form-control" name="free_registration">
            <option selected><?php echo set_value('No', config_item('free_registration')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Want to enable Top-Up Options ?</label>
        <select class="form-control" name="enable_topup">
            <option selected><?php echo set_value('No', config_item('enable_topup')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Want to Give Income when Top-Up ?</label>
        <select class="form-control" name="give_income_on_topup">
            <option selected><?php echo set_value('No', config_item('give_income_on_topup')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Give Fix Income (Not Product/Service Based Income)</label>
        <select class="form-control" name="fix_income">
            <option selected
                    value="<?php echo set_value('No', config_item('fix_income')) ?>"><?php echo set_value('fix_income', config_item('fix_income')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Enable Advertisement Income ?</label>
        <select class="form-control" name="enable_ad_incm">
            <option selected
                    value="<?php echo set_value('No', config_item('enable_ad_incm')) ?>"><?php echo set_value('enable_ad_incm', config_item('enable_ad_incm')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Enable Survey ?</label>
        <select class="form-control" name="enable_survey">
            <option selected
                    value="<?php echo set_value('No', config_item('enable_survey')) ?>"><?php echo set_value('enable_survey', config_item('enable_survey')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Enable Recharge Module ?</label>
        <select class="form-control" name="enable_recharge">
            <option selected
                    value="<?php echo set_value('No', config_item('enable_recharge')) ?>"><?php echo set_value('enable_recharge', config_item('enable_recharge')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Enable Help Plan ?</label>
        <select class="form-control" name="enable_help_plan">
            <option selected
                    value="<?php echo set_value('No', config_item('enable_help_plan')) ?>"><?php echo set_value('enable_help_plan', config_item('enable_help_plan')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6" style="display: none;">
        <label>Enable Investment Plan ?</label>
        <select class="form-control" name="enable_investment">
            <option selected
                    value="<?php echo set_value('No', config_item('enable_investment')) ?>"><?php echo set_value('enable_investment', config_item('enable_investment')) ?></option>
            <option>Yes</option>
            <option>No</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Investment Type ?</label>
        <select class="form-control" name="investment_mode">
            <option selected
            value="<?php echo set_value('AUTO', config_item('investment_mode')) ?>"></option>
            <option>AUTO</option>
            <option>EPIN</option>
            <option>MANUAL</option>
        </select>
    </div>
</div>
<div class="row" style="display: none;">
    <div class="col-sm-12">
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
        <a href="<?php echo site_url('admin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
</div>
<?php echo form_close() ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("bsettings").classList.add('active');
        document.querySelector("#bsettings > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    if($('#sms').val() =="No"){
        $('#sms_api').hide()
    }
    $('#sms').change(function(){
      if(this.value=='Yes')
      {
        $('#sms_api').show()
       }
      else{
        $('#sms_api').hide()
      }
    });
  });
</script>

