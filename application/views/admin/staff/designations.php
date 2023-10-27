<?php

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
    <label>Role Name:*</label>
    <input type="text" class="form-control" value="<?php echo set_value('des_name') ?>" name="des_name" required>
  </div>
  &nbsp;
  <div class="col-sm-6" style="display:none;">
    <label>Payscale (In decimal)</label>
    <input type="text" class="form-control" value="<?php echo set_value('payscale') ?>" name="payscale">
  </div>
  <div class="col-sm-12">
    <h3>Select Permissions</h3>
  </div>
  <div class="col-sm-12">
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> Business Setting(Admin Right)</label>
      <p class="onoff"><input type="checkbox" value="1" name="b_setting" id="b_setting" style="visibility: hidden;"><label for="b_setting"></label></p>
    </div>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="margin-top:40px;width:250px;padding-left: 30px;">User Management (Admin Right)</label>
      <p class="onoff"><input type="checkbox" value="1"  name="user_manage" id="user_manage" style="visibility: hidden;"><label for="user_manage"></label></p>
    </div>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">User View</label>
      <p class="onoff"><input type="checkbox" value="1" name="tree_view" id="tree_view" style="visibility: hidden;"><label for="tree_view"></label></p>
    </div>
    <?php if (config_item('enable_news') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Manage News</label>
      <p class="onoff">&nbsp;&nbsp;<input type="checkbox" value="1" name="manage_news"  id="manage_news" style="visibility: hidden;"><label for="manage_news"></label></p>
    </div>
    <?php } ?>
    <?php if (config_item('enable_epin') == "Yes") { ?>
      <div class="col-md-6 checkbox">
        <label class="control-label" style="width:250px;padding-left: 30px;"> e-PIN Management</label>
        <p class="onoff">&nbsp;&nbsp;<input type="checkbox" value="1"  name="epin" id="manage_epin" style="visibility: hidden;">
        <label for="manage_epin"></label></p>
      </div>
    <?php } ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> e-Wallet Management</label>
      <p class="onoff"><input type="checkbox" value="1" name="wallet" id="wallet" style="visibility: hidden;"><label for="wallet"></label></p>
    </div>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Manage Earning</label>
      <p class="onoff"><input type="checkbox" value="1" name="earning_manage" id="earning_manage" style="visibility: hidden;"><label for="earning_manage"></label></p>
    </div>
    <?php if (config_item('enable_product') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> Manage Products</label>
      <p class="onoff"><input type="checkbox" value="1" name="manage_poducts" id="manage_poducts" style="visibility: hidden;"><label for="manage_poducts"></label></p>
    </div>
    <?php } ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> View Orders</label>
      <p class="onoff"><input type="checkbox" value="1" name="view_orders" id="view_orders" style="visibility: hidden;"><label for="view_orders"></label></p>
    </div>
    <?php if (config_item('enable_coupon') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> Coupon Management</label>
      <p class="onoff"><input type="checkbox" value="1" name="coupon" id="coupon" style="visibility: hidden;"><label for="coupon"></label></p>
    </div>
    <?php } ?>
    <?php if (config_item('enable_reward') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Manage Rewards</label>
      <p class="onoff"><input type="checkbox" value="1" name="manage_rewards" id="manage_rewards" style="visibility: hidden;"><label for="manage_rewards"></label></p>
    </div>
    <?php } ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">User Management</label>
      <p class="onoff"><input type="checkbox" value="1"  name="staff" id="staff" style="visibility: hidden;"><label for="staff"></label></p>
    </div>
    <?php if (config_item('enable_franchisee') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> Manage Franchisee</label>
      <p class="onoff"><input type="checkbox" value="1" name="manage_franchisee" id="manage_franchisee" style="visibility: hidden;"><label for="manage_franchisee"></label></p>
     </div>
    <?php } ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Manage Reports &nbsp;&nbsp;</label>
      <p class="onoff">&nbsp; &nbsp;<input type="checkbox" value="1" name="manage_reports" id="manage_reports" style="visibility: hidden;"><label for="manage_reports"></label></p>
    </div>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Manage Support</label>
      <p class="onoff"><input type="checkbox" value="1" name="support" id="manage_support" style="visibility: hidden;"><label for="manage_support"></label></p>
    </div>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> Manage Expenses</label>
      <p class="onoff"><input type="checkbox" value="1"  name="expense" id="expense" style="visibility: hidden;"><label for="expense"></label></p>
    </div>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;"> Manage Bank Compliance</label>
      <p class="onoff"><input type="checkbox" value="1"  name="bank_compliance" id="bank_compliance" style="visibility: hidden;"><label for="bank_compliance"></label></p>
    </div>
    <?php if (config_item('enable_invoice') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Manage Invoices</label>
      <p class="onoff"><input type="checkbox" value="1" name="invoice" id="invoice" style="visibility: hidden;"><label for="invoice"></label></p>
    </div>
    <?php } ?>
    <?php if (config_item('enable_kyc') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Manage KYC</label>
      <p class="onoff"><input type="checkbox" value="1" name="manage_kyc" id="manage_kyc" style="visibility: hidden;"><label for="manage_kyc"></label></p>
    </div>
    <?php } ?>
    <?php if (config_item('enable_recharge') == "Yes") { ?>
    <div class="col-md-6 checkbox">
      <label class="control-label" style="width:250px;padding-left: 30px;">Recharge Portal</label>
      <p class="onoff"><input type="checkbox" value="1" name="recharge_portal" id="recharge_portal" style="visibility: hidden;"><label for="recharge_portal"></label></p>
    </div>
    <?php } ?>
  </div>
  <div class="col-sm-6"><br/>
    <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
  </div>
<?php echo form_close() ?>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Designation Name</th>
            <!--<th>Payscale</th>-->
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result_staff as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->des_title; ?></td>
               <!-- <td><?php echo config_item('currency') . $e->payscale; ?></td>-->
                <td><a href="<?php echo site_url('staff/edit-des/' . $e->id); ?>" class="btn btn-info btn-xs">Edit</a><a
                            onclick="return confirm('Are you sure you want to delete this Designation ?')"
                            href="<?php echo site_url('staff/remove-des/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("managestaff").classList.add('active');
        document.querySelector("#managestaff > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>