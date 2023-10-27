<?php echo form_open() ?>
<?php $name=$this->db_model->select('name', 'member', array('id' => $data->id)) ?>
<h2 align="center">Update Bank Details</h2>
<div class="row">
    <div class="form-group col-sm-6">
        <label for="name" class="control-label">User ID*</label>
        <input type="text" class="form-control" id="name" name="name"
               value="<?php echo set_value('name', $data->id) ?>" disabled>
    </div>
    <div class="form-group col-sm-6">
        <label>Beneficiary Name</label>
        <input type="text" class="form-control" name="beneficiary_name" value="<?php echo $name; ?>" disabled><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Bank Name</label>
        <input type="text" class="form-control" name="bank_name" value="<?php echo $bankdetails->bank_name; ?>" required><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Bank A/C No</label>
        <input type="number" class="form-control" name="bank_ac_no" id="bank_ac_no" value="<?php echo $bankdetails->bank_ac_no; ?>" required><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Retype Bank A/C No</label>
        <input type="number" class="form-control" name="confirm_bank_ac_no" id="confirm_bank_ac_no" value="<?php echo $bankdetails->bank_ac_no; ?>" required oninput="validate_bank(this)"><span id="bank_res" class="text-danger"></span><br/>
    </div>
    
    <div class="form-group col-sm-6">
        <label>Bank Branch Name</label>
        <input type="text" class="form-control" name="bank_branch" value="<?php echo $bankdetails->bank_branch; ?>" required><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Bank Branch Code</label>
        <input type="text" class="form-control" name="bank_branch_code" value="<?php echo $bankdetails->bank_branch_code; ?>" required><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Account type</label>
        <select class="form-control" id="account_type" name="account_type" >
          <option value="<?php echo $bankdetails->account_type ?>"><?php echo $bankdetails->account_type ?></option>
          <option value="Savings">Savings</option>
          <option value="Current">Current</option>
        </select><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Payment Type</label>
        <select class="form-control" name ="payment_type" id="payment_type" onchange="payment_type_select()">
            <option value="1">Bank</option>
            <option value="2">Mobile Payment</option>
        </select>
    </div>
    <div class="form-group col-sm-6">
        <label>Network Carrier</label>
        <input type="text" class="form-control" name="network_carrier" value="<?php echo $bankdetails->network_carrier; ?>"><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Mobile Money No</label>
        <input type="number" class="form-control" name="mobile_no" id="mobile_no" value="<?php echo $bankdetails->mobile_no; ?>" ><br/>
    </div>
    <div class="form-group col-sm-6">
        <label>Mobile Money Name</label>
        <input type="text" class="form-control" name="mobile_name" value="<?php echo $bankdetails->mobile_name; ?>" ><br/>
    </div>
</div>
<div class="row">

    <input type="hidden" name="id" value="<?php echo $bankdetails->id ?>">
    <div class="form-group col-sm-12">
        <button class="btn btn-primary">Update</button>
        <a href="<?php echo site_url('users/pending_bankdetails');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
</div>
<?php echo form_close() ?>


<script language='javascript' type='text/javascript'>
    function validate_bank(input) {
        if (input.value != document.getElementById('bank_ac_no').value) {
            $('#bank_res').html('Bank Account Must be Matching.<br>');
        } else {
            $('#bank_res').html('');
        }
    }
</script>