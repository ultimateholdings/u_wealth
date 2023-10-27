<?php

?>

<?php echo form_open() ?>
<span style="color:blue;">e-PIN by Plan:</span> <br><br>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>e-PIN Amount*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <select class="form-control multiselect" id="amount" name="amount[]" multiple >
                       <?php foreach ($products as $val) {
                            echo '<option value="' . $val['joining_fee'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
                        } ?>
                    </select>
        </div>
    </div>
    <div class="col-sm-5">
        <label>User ID / Franchisee ID (Whom to issue)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="number" value="<?php echo set_value('userid') ?>" class="form-control" placeholder="1001" name="userid" onchange="get_user_name('#userid', '#to_res')" id="userid">
        </div>
        <span id="to_res" style="color: red; font-weight: bold"></span>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Number of e-PINs*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo set_value('number') ?>" placeholder="Maximum 999 epin at a time"
                   class="form-control" name="number">
        </div>
    </div>
    <div class="col-sm-5">
        <label>e-PIN Type*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-adjust"></span></span>
            <select class="form-control" name="type">
                <option>Single Use</option>
                <option style="display:none;">Multi Use</option>
            </select>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-2"><label>Free Epin*</label></div>
    <div class="col-sm-5">
        <div class="input-group">
            <input type="checkbox" class="form-control" name="is_free"style="height: 25px;width: 25px;">
        </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">
      <div>&nbsp;</div>
      <input type="submit" class="btn btn-danger" onclick="this.value='Please Wait..'" value="Generate e-PINs">
  </div>
</div>
<?php echo form_close() ?>

<?php echo form_open('admin/generate_upgrade_epin') ?>
<input type="hidden" name="is_upgrade" value="1" />
<span style="color:blue;">e-PIN for Package Upgrade:</span> <br><br>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Package Upgrade From*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <select class="form-control" id="" name="upgrade_from"  >
                       <?php foreach ($package as $val) {
                            echo '<option value="' . $val['id'] . '">' . $val['plan_name'] .' </option>';
                        } ?>
                    </select>
        </div>
    </div>
    <div class="col-sm-5">
        <label>Package Upgrade To*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <select class="form-control" id="" name="upgrade_to" >
                       <?php foreach ($package as $val) {
                            echo '<option value="' . $val['id'] . '">' . $val['plan_name'] .' </option>';
                        } ?>
                    </select>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>User ID / Franchisee ID (Whom to issue)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="number" value="<?php echo 1001;//set_value('userid') ?>" class="form-control" placeholder="1001" name="userid" onchange="get_user_name('#userid', '#to_res')" id="userid" disabled="disabled">
        </div>
        <span id="to_res" style="color: red; font-weight: bold"></span>
    </div>
    <div class="col-sm-5">
        <label>Number of e-PINs*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo set_value('number') ?>" placeholder="Maximum 999 epin at a time"
                   class="form-control" name="number">
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Binary Points*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo set_value('binary_points') ?>" placeholder="Binary Points"
                   class="form-control" name="binary_points">
        </div>
    </div>
    <div class="col-sm-5">
        <label>Amount*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo set_value('amount') ?>" placeholder="Amount"
                   class="form-control" name="amount">
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">
      <div>&nbsp;</div>
      <input type="submit" class="btn btn-danger" onclick="this.value='Please Wait..'" value="Generate e-PINs">
  </div>
</div>
<?php echo form_close() ?>

<?php echo form_open() ?>
<br>
<span style="color:blue;">e-PIN by Amount:</span> <br><br>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>e-PIN Amount*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <input type="text" value="<?php echo set_value('amount') ?>" class="form-control" placeholder="xxxx"
                   name="amount">
        </div>
    </div>
    <div class="col-sm-5">
        <label>User ID / Franchisee ID (Whom to issue)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="number" value="<?php echo set_value('userid') ?>" class="form-control" placeholder="1001"
                   name="userid" id="userid1" onchange="get_user_name('#userid1', '#to_res1')">
        </div>
        <span id="to_res1" style="color: red; font-weight: bold"></span>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Number of e-PINs*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo set_value('number') ?>" placeholder="Maximum 999 epin at a time"
                   class="form-control" name="number">
        </div>
    </div>
    <div class="col-sm-5">
        <label>e-PIN Type*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-adjust"></span></span>
            <select class="form-control" name="type">
                <option>Single Use</option>
                <option style="display:none;">Multi Use</option>
            </select>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-5">
    <div>&nbsp;</div>
    <input type="submit" class="btn btn-danger" onclick="this.value='Please Wait..'" value="Generate e-PINs">
</div>
</div>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("epin").classList.add('active');
        document.querySelector("#epin > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
<link href="<?=site_url()?>axxets/admin/multiselect/select2.min.css" rel="stylesheet" />
<script src="<?=site_url()?>axxets/admin/multiselect/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.multiselect').select2();
});
</script>