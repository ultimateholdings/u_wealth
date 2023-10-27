<?php echo form_open() ?>
<h2 align="center">Update Profile</h2>
<div class="row">
    <div class="form-group col-sm-6">
        <label for="name" class="control-label">Name*</label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?php echo set_value('name', $data->name) ?>"
               placeholder="Mr Xyz">
    </div>
    <div class="form-group col-sm-6">
        <label for="email" class="control-label">Email</label>
        <input type="email" class="form-control" value="<?php echo set_value('email', $data->email) ?>" id="email" name="email" placeholder="name@domain.com">
    </div>
    <div class="form-group col-sm-6">
        <label for="phone" class="control-label">Phone No*</label>
        <input type="text" class="form-control" value="<?php echo set_value('phone', $data->phone) ?>" id="phone" name="phone" placeholder="9xxxxxxxxx">
    </div>
    <?php if($this->db_model->select('description', 'settings', array('type' => 'reg'))==1){ ?>
    <div class="form-group col-sm-6">
        <label for="activate_time" class="control-label">Date of Activation</label>
        <input type="text" readonly class="form-control datepicker" value="<?php $dt = new DateTime($data->activate_time); $date=$dt->format('Y-m-d'); echo $date;  ?>"
               id="activate_time" name="activate_time">
    </div>
    <?php } else { ?>
    <div class="form-group col-sm-6">
            <label for="activate_time" class="control-label">Date of Activation</label>
            <input type="text" readonly class="form-control datepicker" value="<?php $dt = new DateTime($data->activate_time); $date=$dt->format('Y-m-d'); echo $date;  ?>"
                   id="activate_time" name="activate_time" disabled>
    </div>
    <input type="hidden" name="activate_time" value="<?php echo $data->activate_time ?>">
    <?php } ?>
    <div class="form-group col-sm-6">
        <label for="password" class="control-label">New Password</label>
        <input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password"
               name="password">
    </div>
    <div class="form-group col-sm-6">
        <label for="secure_password" class="control-label">Secure Password</label>
        <input type="password" class="form-control" value="<?php echo set_value('secure_password') ?>" id="password"
               name="secure_password">
    </div>
    <div class="form-group col-sm-6">
        <label for="status" class="control-label">Status</label>
        <select class="form-control" id="status"
                name="status">
            <option><?php echo $data->status ?></option>
            <?php if(config_item('crowdfund_type')!='Manual_Peer_to_Peer'){ ?>
            <option>Active</option>
            <?php } ?>
            <option>Block</option>
            <option style="display: none;">Suspend</option>
        </select>
    </div>
</div>
<h3>Profile Detail<hr/></h3>
<div class="row">
    <div class="form-group col-sm-6">
        <label for="address" class="control-label">Address</label>
        <input type="text" class="form-control" value="<?php echo set_value('address', $profile->address) ?>"
               id="address" name="address">
    </div>
    <div class="form-group col-sm-6">
        <label for="city" class="control-label">City</label>
        <input type="text" class="form-control" value="<?php echo set_value('city', $profile->city) ?>"
               id="city" name="city">
    </div>
    <div class="form-group col-sm-6">
        <label for="state" class="control-label">State</label>
        <input type="text" class="form-control" value="<?php echo set_value('state', $profile->state) ?>"
               id="state" name="state">
    </div>
    <div class="form-group col-sm-6">
        <label for="zip" class="control-label">Zip Code</label>
        <input type="number" class="form-control" value="<?php echo set_value('zip', $profile->zip) ?>"
               id="zip" name="zip">
    </div>
    <div class="form-group col-sm-6">
        <label for="date_of_birth" class="control-label">Date of Birth</label>
        <input type="text" readonly class="form-control datepicker"
               value="<?php echo set_value('date_of_birth', $profile->date_of_birth) ?>"
               id="date_of_birth" name="date_of_birth" onchange="checkDOB()">
    </div>
    <!-- <div class="form-group col-sm-6">
        <label for="tax_no" class="control-label">PAN / Tax Reg No.</label>
        <input type="text" class="form-control" value="<?php echo set_value('tax_no', $profile->tax_no) ?>"
               id="tax_no" name="tax_no">
    </div>
    <div class="form-group col-sm-6">
        <label for="aadhar_no" class="control-label">Aadhar No.</label>
        <input type="text" class="form-control" value="<?php echo set_value('aadhar_no', $profile->aadhar_no) ?>" id="aadhar_no" name="aadhar_no">
    </div> -->
    <div class="form-group col-sm-6">
        <label for="gstin" class="control-label">GST No.</label>
        <input type="text" class="form-control" value="<?php echo set_value('gstin', $profile->gstin) ?>"
               id="gstin" name="gstin">
    </div>
</div>
<h3>Finance Details<hr/></h3>
<div class="row">
  <!-- <div class="form-group col-sm-6">
        <label for="googlepay_no" class="control-label">Google Pay Number</label>
        <input type="text" class="form-control" value="<?php echo set_value('googlepay_no', $profile->googlepay_no) ?>" id="googlepay_no" name="googlepay_no">
    </div>
    <div class="form-group col-sm-6">
        <label for="phonepay_no" class="control-label">PhonePe Number</label>
        <input type="text" class="form-control" value="<?php echo set_value('phonepay_no', $profile->phonepay_no) ?>" id="phonepay_no" name="phonepay_no">
    </div>
    <div class="form-group col-sm-6">
        <label for="upi_id" class="control-label">UPI Address</label>
        <input type="text" class="form-control" value="<?php echo set_value('upi_id', $profile->upi_id) ?>" id="upi_id" name="upi_id">
    </div> -->
    <div class="form-group col-sm-6">
        <label for="bank_name" class="control-label">Bank Name.</label>
        <input type="text" class="form-control" value="<?php echo set_value('bank_name', $profile->bank_name) ?>" id="bank_name" name="bank_name">
    </div>
    <div class="form-group col-sm-6">
        <label for="bank_ac_no" class="control-label">Bank A/C No.</label>
        <input type="text" class="form-control" value="<?php echo set_value('bank_ac_no', $profile->bank_ac_no) ?>"
               id="bank_ac_no" name="bank_ac_no">
    </div>
    <!-- <div class="form-group col-sm-6">
        <label for="bank_ifsc" class="control-label">Bank IFSC.</label>
        <input type="text" class="form-control" value="<?php echo set_value('bank_ifsc', $profile->bank_ifsc) ?>"
               id="bank_ac_no" name="bank_ifsc">
    </div> -->
    <div class="form-group col-sm-6">
        <label for="bank_branch" class="control-label">Bank Branch Name.</label>
        <input type="text" class="form-control" value="<?php echo set_value('bank_branch', $profile->bank_branch) ?>"
               id="bank_branch" name="bank_branch">
    </div>
    <div class="form-group col-sm-6">
        <label for="bank_branch_code" class="control-label">Bank Branch Code.</label>
        <input type="text" class="form-control" value="<?php echo set_value('bank_branch_code', $profile->bank_branch_code) ?>"
               id="bank_branch_code" name="bank_branch_code">
    </div>
    <div class="form-group col-sm-6">
        <label for="bank_branch_code" class="control-label">Account Type.</label>
        <select class="form-control" id="account_type" name="account_type" >
          <option value="<?php echo $profile->account_type ?>"><?php echo $profile->account_type ?></option>
          <option value="Savings">Savings</option>
          <option value="Current">Current</option>
        </select><br/>
    </div>
    <!-- <div class="form-group col-sm-6">
        <label for="btc_address" class="control-label">BTC Address.</label>
        <input type="text" class="form-control" value="<?php echo set_value('btc_address', $profile->btc_address) ?>"
               id="btc_address" name="btc_address">
    </div> -->
    <!-- <div class="form-group col-sm-6">
        <label for="nominee_name" class="control-label">Nominee Name.</label>
        <input type="text" class="form-control" value="<?php echo set_value('nominee_name', $profile->btc_address) ?>"
               id="nominee_name" name="nominee_name">
    </div>
    <div class="form-group col-sm-6">
        <label for="nominee_add" class="control-label">Nominee Address.</label>
        <input type="text" class="form-control" value="<?php echo set_value('nominee_add', $profile->nominee_add) ?>"
               id="nominee_add" name="nominee_add">
    </div>
    <div class="form-group col-sm-6">
        <label for="nominee_relation" class="control-label">Nominee Relationship.</label>
        <input type="text" class="form-control"
               value="<?php echo set_value('nominee_relation', $profile->nominee_relation) ?>"
               id="nominee_relation" name="nominee_relation">
    </div> -->
    <br/>
    <input type="hidden" name="id" value="<?php echo $data->id ?>">
    <div class="form-group col-sm-12">
        <button class="btn btn-primary">Update</button>
        <a href="<?php echo site_url('users/view-members');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
</div>
<?php echo form_close() ?>

<script type="text/javascript">
    function checkDOB() {
        var dateString = document.getElementById('date_of_birth').value;
        var myDate = new Date(dateString);
        var today = new Date();
        if ( myDate > today ) { 
            $('#date_of_birth').after("<p style='color:red'>You cannot enter a date in the future!.</p>");
        }
    }
</script>