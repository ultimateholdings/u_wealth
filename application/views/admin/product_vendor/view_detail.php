<?php

?>
<div style="margin-left:20px;">
<a href="<?php echo site_url('Manage_vendor/edit_vendor/' . $data->vendor_id) ?>" class="btn btn-xs btn-danger">Edit Vendor</a>
<div class="row view">
    <div class="col-sm-6"><strong>Vendor Name: </strong> <?php echo $data->name ?></div>
    <div class="col-sm-6"><strong>Vendor ID: </strong> <?php echo config_item('ID_EXT') . $data->vendor_id ?>
    </div>
    <div class="col-sm-6"><strong>Email ID: </strong> <?php echo $data->email ?></div>
    <div class="col-sm-6"><strong>Phone No: </strong> <?php echo $data->phone ?></div>
    
</div><p class="hr_divider">&nbsp;</p>
<div class="row view">
    
    <div class="col-sm-6"><strong>Address: </strong> <?php echo $data->address ?></div>
    <div class="col-sm-6"><strong>City: </strong> <?php echo $data->city ?></div>
    <div class="col-sm-6"><strong>State: </strong> <?php echo $data->state ?></div>
    <div class="col-sm-6"><strong>Zipcode: </strong> <?php echo $data->zipcode ?></div>
    <div class="col-sm-6"style="display:none;"><strong>Registration Date: </strong><?php echo date('Y-m-d', strtotime($data->registration_time)); ?></div>
    
    
    
</div>
<p class="hr_divider">&nbsp;</p>
<h3>My Profile</h3>
<?php
$profile_data = $this->db_model->select_multi('*', 'vendor_profile', array('vendor_id' => $data->vendor_id));
?>
<div class="row view">
    <div class="col-sm-6"><strong>Date of Birth: </strong> <?php echo $profile_data->date_of_birth ?></div>
    <div class="col-sm-6"><strong>GSTIN: </strong> <?php echo $profile_data->gstin ?></div>
    <div class="col-sm-6"><strong>PAN/Income Tax Reg. No: </strong> <?php echo $profile_data->tax_no ?></div>
    <div class="col-sm-6"><strong>Aadhar No: </strong> <?php echo $profile_data->aadhar_no ?></div>
    <div class="col-sm-6"><strong>Bank Name: </strong> <?php echo $profile_data->bank_name ?></div>
    <div class="col-sm-6"><strong>Bank A/C No: </strong> <?php echo $profile_data->bank_ac_no ?></div>
    <div class="col-sm-6"><strong>IFSC Code: </strong> <?php echo $profile_data->bank_ifsc ?></div>
    <div class="col-sm-6"><strong>Bank Branch Name: </strong> <?php echo $profile_data->bank_branch ?></div>
    <div class="col-sm-6"><strong>Account Type: </strong> <?php echo $profile_data->account_type ?></div>
    <div class="col-sm-6"><strong>Bitcoin Address: </strong> <?php echo $profile_data->btc_address ?></div>
    <div class="col-sm-6"><strong>Nominee Name: </strong> <?php echo $profile_data->nominee_name ?></div>
    <div class="col-sm-6"><strong>Nominee Relation with Member: </strong> <?php echo $profile_data->nominee_relation ?>
    </div>
</div>
<div>
    <h4>ID Proof</h4>
    <?php echo $profile_data->id_proof ? '<a target="_blank" href="'.base_url('uploads/kyc/' . $profile_data->id_proof).'">Click Here</a>' : 'Not Updated'; ?>
</div>
<div>
    <h4>Address Proof</h4>
    <?php echo $profile_data->add_proof ? '<a target="_blank" href="'.base_url('uploads/kyc/' . $profile_data->add_proof).'">Click Here</a>' : 'Not Updated'; ?>
</div>
<div>
    <h4>Video</h4>
    <video width="120" height="120" controls>
     <source src="<?php echo base_url('uploads/profile/'.$data->video)?>" type="video/mp4">
    </video>
</div>
</div>
