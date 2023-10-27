<?php

$perms = unserialize($data->des_permission);
?>
<style>
.onoff {
  margin-left: -27px;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  *vertical-align: auto;
  zoom: 1;
  *display: inline;
  position: relative;
  cursor: pointer;
  width: 50px;
  height: 30px;
  line-height: 30px;
  font-size: 14px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.onoff label {
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  cursor: pointer;
  background: #cd3c3c;
  border-radius: 5px;
  font-weight: bold;
  color: #FFF;
  transition: background 0.3s, text-indent 0.3s;
  text-indent: 27px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4) inset;
  margin-left:30px; 
}
.onoff label:after {
  content: 'NO';
  display: block;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  font-size: 12px;
  color: #591717;
  text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.35);
  z-index: 1;
  padding-right: 10px;
}
.onoff label:before {
  content: '';
  width: 10px;
  height: 24px;
  border-radius: 3px;
  background: #FFF;
  position: absolute;
  z-index: 2;
  top: 3px;
  left: 3px;
  display: block;
  -webkit-transition: left 0.3s;
  -moz-transition: left 0.3s;
  -o-transition: left 0.3s;
  transition: left 0.3s;
  -webkit-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
  -moz-box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.4);
}
.onoff input:checked + label {
  background: #378b2c;
  text-indent: 8px;
}
.onoff input:checked + label:after {
  content: 'YES';
  color: #091707;
}
.onoff input:checked + label:before {
  left: 37px;
}
</style>
<div class="row">
    <?php echo form_open() ?>
    <div class="col-sm-6">
        <label>Designation Name</label>
        <input type="text" class="form-control" value="<?php echo set_value('des_name', $data->des_title) ?>"
        name="des_name">
    </div>
    <div class="col-sm-6" style="display:none;">
        <label>Payscale (In decimal)</label>
        <input type="text" class="form-control" value="<?php echo set_value('payscale', $data->payscale) ?>"
               name="payscale">
    </div>
    <div class="col-sm-12">
        <h3>Select Permissions</h3>
    </div>
    <div class="col-sm-12">
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;"> Business Setting(Admin Right)</label>
            <p class="onoff"><input type="checkbox" value="1" id="b_setting"<?php if ($perms['b_setting'] == "1") {
                echo 'checked';
            } ?> name="b_setting" style="visibility: hidden;"><label for="b_setting"></label></p>
        </div>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;margin-top:40px;">User Management (Admin Right)</label>
            <p class="onoff"><input type="checkbox" value="1" id="user_manage" <?php if ($perms['user_manage'] == "1") {
                echo 'checked';
            } ?> name="user_manage" style="visibility: hidden;"><label for="user_manage" "></label></p>
        </div>
         <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">User View</label>
            <p class="onoff"><input type="checkbox" value="1" id="tree_view" <?php if ($perms['tree_view'] == "1") {
                echo 'checked';
            } ?> name="tree_view" style="visibility: hidden;"><label for="tree_view"></label></p>
        </div>
        <?php if (config_item('enable_news') == "Yes") { ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">Manage News</label>
            <p class="onoff"><input type="checkbox" value="1" id="manage_news" <?php if ($perms['manage_news'] == "1") {
                echo 'checked';
            } ?> name="manage_news" style="visibility: hidden;" ><label for="manage_news"></label></p>
        </div>
        <?php } ?>
        <?php if (config_item('enable_epin') == "Yes") { ?>
        <div class="col-md-6 checkbox">
          <label class="control-label" style="width:250px;padding-left: 30px;"> e-PIN Management</label>
          <p class="onoff">&nbsp;&nbsp;<input type="checkbox" value="1" id="manage_epin" <?php if ($perms['epin'] == "1") {
            echo 'checked';
          } ?> name="epin" style="visibility: hidden;" ><label for="manage_epin"></label></p>
        </div>
        <?php } ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;"> e-Wallet Management</label>
            <p class="onoff"><input type="checkbox" value="1" id="wallet" <?php if ($perms['wallet'] == "1") {
            echo 'checked';
            } ?> name="epin" style="visibility: hidden;"><label for="wallet"></label></p>
        </div>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">Manage Earning</label>
            <p class="onoff"><input type="checkbox" value="1" id="earning_manage" <?php if ($perms['earning_manage'] == "1") {
            echo 'checked';
            } ?> name="earning_manage"  style="visibility: hidden;"><label for="earning_manage"></label></p>
        </div>
        <?php if (config_item('enable_product') == "Yes") { ?>
        <div class="col-md-6 checkbox">
             <label class="control-label" style="width:250px;padding-left: 30px;">Manage Products</label>
             <p class="onoff"><input type="checkbox" value="1" id="manage_poducts"  <?php if ($perms['manage_poducts'] == "1") {
            echo 'checked';
           } ?> name="manage_poducts" style="visibility: hidden;"><label for="manage_poducts"></label></p>
        </div>
        <?php } ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;"> View Orders</label>
            <p class="onoff"><input type="checkbox" value="1" id="view_orders" <?php if ($perms['view_orders'] == "1") {
                echo 'checked';
            } ?> name="view_orders" style="visibility: hidden;"><label for="view_orders"></label></p>
        </div>
        <?php if (config_item('enable_coupon') == "Yes") : ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;"> Coupon Management</label>
            <p class="onoff"><input type="checkbox" value="1" id="coupon" <?php if ($perms['coupon'] == "1") {
                    echo 'checked';
            } ?> name="coupon" style="visibility: hidden;"><label for="coupon"></label></p>
        </div>
        <?php endif; ?>
        <?php if (config_item('enable_reward') == "Yes") { ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">Manage Rewards</label>
           <p class="onoff"><input type="checkbox" value="1" id="manage_rewards" <?php if ($perms['manage_rewards'] == "1") {
                echo 'checked';
            } ?> name="manage_rewards" style="visibility: hidden;"><label for="manage_rewards"></label></p>
        </div>
        <?php } ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">User Management</label>
            <p class="onoff"><input type="checkbox" value="1" id="staff" <?php if ($perms['staff'] == "1") {
                echo 'checked';
            } ?> name="staff" style="visibility: hidden;"><label for="staff"></label></p>
        </div>
        <?php if (config_item('enable_franchisee') == "Yes") { ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;"> Manage Franchisee</label>
            <p class="onoff"><p class="onoff"><input type="checkbox" value="1" id="manage_franchisee" <?php if ($perms['franchisee'] == "1") {
                echo 'checked';
            } ?> name="manage_franchisee" style="visibility: hidden;"><label for="manage_franchisee"></label></p>
        </div>
        <?php } ?>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">Manage Reports &nbsp;&nbsp;</label>
            <p class="onoff"><input type="checkbox" value="1" id="manage_reports" <?php if ($perms['manage_reports'] == "1") {
            echo 'checked';
            } ?> name="manage_reports" style="visibility: hidden;"><label for="manage_reports"></label></p>
        </div>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">Manage Support</label>       
            <p class="onoff"><input type="checkbox" value="1" id="manage_support" <?php if ($perms['support'] == "1") {
                echo 'checked';
            } ?> name="support" style="visibility: hidden;" ><label for="manage_support"></label></p>
        </div>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;"> Manage Expenses</label>
            <p class="onoff"><input type="checkbox" value="1" id="expense"  <?php if ($perms['expense'] == "1") {
                echo 'checked';
            } ?> name="expense" style="visibility: hidden;"><label for="expense"></label></p>
        </div>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;"> Manage Bank Compliance</label>
            <p class="onoff"><input type="checkbox" value="1" id="bank_compliance"  <?php if ($perms['bank_compliance'] == "1") {
                echo 'checked';
            } ?> name="bank_compliance" style="visibility: hidden;"><label for="bank_compliance"></label></p>
        </div>
        <div class="col-md-6 checkbox">
            <label class="control-label" style="width:250px;padding-left: 30px;">Manage Invoices</label>
            <p class="onoff"><input type="checkbox" value="1" id="invoice" <?php if ($perms['invoice'] == "1") {
                echo 'checked';
            } ?> name="invoice" style="visibility: hidden;"><label for="invoice"></label></p>
        </div>
        <?php if (config_item('enable_recharge') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Recharge Portal</label>
     <p class="onoff"><input type="checkbox" value="1" id="recharge_portal"<?php if ($perms['recharge_portal'] == "1") {
                echo 'checked';
        } ?> name="recharge_portal" style="visibility: hidden;"><label for="recharge_portal"></label>
      </p>
    </div>
    <?php } ?>
    </div>
    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Update"
               onclick="this.value='Updating..'">
    </div>
    <?php echo form_close() ?>
</div>