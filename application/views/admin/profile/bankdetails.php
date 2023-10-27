<?php

?>
<?php echo form_open_multipart() ?>
<div class="row" style=" background-color: #ffffff;
    margin-top: 20px;
    border-radius: 3px;
    border-radius: 6px;
    padding-left: 10px;
    padding-right: 10px;
    ">

 <h3 style="color: #3c3c3c;padding-left: 20px; ">My Bank details</h3>
 <hr>
<div class="col-sm-6">
    <label>Bank Name</label>
    <input type="text" class="form-control" name="bank_name"
           value="<?php echo set_value('bank_name', $data->bank_name) ?>">
</div>
<div class="col-sm-6">
    <label>Bank A/C No</label>
    <input type="text" class="form-control" name="bank_ac_no"
           value="<?php echo set_value('bank_ac_no', $data->bank_ac_no) ?>">
</div>
<div class="col-sm-6">
    <label>Bank IFSC Code</label>
    <input type="text" class="form-control" name="bank_ifsc"
           value="<?php echo set_value('bank_ifsc', $data->bank_ifsc) ?>">
</div>
<div class="col-sm-6">
    <label>Bank Branch Name</label>
    <input type="text" class="form-control" name="bank_branch"
           value="<?php echo set_value('bank_branch', $data->bank_branch) ?>">
</div>
<!--<div class="col-sm-6">
    <label>Bitcoin Address</label>
    <input type="text" class="form-control" name="btc_address"
           value="<?php echo set_value('btc_address', $data->btc_address) ?>">
</div>-->
<div class="col-sm-6">
    <label>Nominee Name</label>
    <input type="text" class="form-control" name="nominee_name"
           value="<?php echo set_value('nominee_name', $data->nominee_name) ?>">
</div>
<div class="col-sm-6">
    <label>Nominee Address</label>
    <input type="text" class="form-control" name="nominee_add"
           value="<?php echo set_value('nominee_add', $data->nominee_add) ?>">
</div>
<div class="col-sm-6">
    <label>Nominee Relation</label>
    <input type="text" class="form-control" name="nominee_relation"
           value="<?php echo set_value('nominee_relation', $data->nominee_relation) ?>">
</div>
<!--<div class="col-sm-6">
    <label>Date of Birth</label>
    <input type="text" class="form-control datepicker" name="date_of_birth"
           value="<?php echo set_value('date_of_birth', $data->date_of_birth) ?>">
</div>-->
<div class="col-sm-6">
    <label>Current Password</label>
    <input type="password" class="form-control" name="oldpass">
</div>
<div class="col-sm-6" style="padding-bottom: 20px;">
    <br/>
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</div>
</div>
<?php echo form_close() ?>
<br/>
<p>&nbsp;</p>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>