<?php
$profile_data = $this->db_model->select_multi('*', 'member_profile', array('userid' => $data->id));
?>
<div style="margin-left:20px;">
<a href="<?php echo site_url('users/edit_user/' . $data->id) ?>" class="btn btn-xs btn-danger">Edit Member</a>
<div class="row view" style="line-height: 30px;"> 
    <div class="col-sm-6"><strong>Member Name: </strong> <?php echo $data->name ?></div>
    <div class="col-sm-6"><strong>Member ID: </strong> <?php echo config_item('ID_EXT') . $data->id ?>
    </div>
    <div class="col-sm-6"><strong>Email ID: </strong> <?php echo $data->email ?></div>
    <div class="col-sm-6"><strong>Phone No: </strong> <?php echo $data->phone ?></div>
    <div class="col-sm-6"><strong>Sponsor ID: </strong> <?php echo config_item('ID_EXT') . $data->sponsor ?></div>
    <div class="col-sm-6"><strong>Position ID: </strong> <?php echo config_item('ID_EXT') . $data->position ?></div>
</div><p class="hr_divider">&nbsp;</p>
<div class="row view" style="line-height: 30px;">
    <div class="col-sm-6"><strong>Purchased
            Package: </strong> <?php echo $this->db_model->select('plan_name', 'plans', array('id' => $data->signup_package)) ?>
    </div>
    <div class="col-sm-6"><strong>Registration Date: </strong><?php echo date('Y-m-d', strtotime($data->activate_time)); ?></div>
    <div class="col-sm-6"><strong>Rank: </strong> <?php echo $data->rank ?></div>
    <div class="col-sm-6"><strong>Registration IP: </strong> <?php echo $data->registration_ip ?></div>
    <div class="col-sm-6"><strong>Last Login IP: </strong> <?php echo $data->last_login_ip ?> </div>
    <div class="col-sm-6"><strong>Last Login Time: </strong> <?php echo date('d/m/Y', $data->last_login) ?></div>
</div>
<p class="hr_divider">&nbsp;</p>
<h3>My Profile</h3>
<div class="row view" style="line-height: 30px;">
    <div class="col-sm-6"><strong>Address : </strong> <?php echo $profile_data->address ?></div>
    <div class="col-sm-6"><strong>City : </strong> <?php echo $profile_data->city ?></div>
    <div class="col-sm-6"><strong>State : </strong> <?php echo $profile_data->state ?></div>
    <div class="col-sm-6"><strong>Zip Code : </strong> <?php echo $profile_data->zip ?></div>
    <div class="col-sm-6"><strong>Date of Birth: </strong> <?php echo $profile_data->date_of_birth ?></div>
    <!-- <div class="col-sm-6"><strong>PAN/Income Tax Reg. No: </strong> <?php echo $profile_data->tax_no ?></div>
    <div class="col-sm-6"><strong>Aadhar No: </strong> <?php echo $profile_data->aadhar_no ?></div> -->
    <div class="col-sm-6"><strong>GSTIN: </strong> <?php echo $profile_data->gstin ?></div>
</div><p class="hr_divider">&nbsp;</p>
<h3>Finance Details</h3>
<div class="row view" style="bank_branch_code-height: 30px;">
    <div class="col-sm-6"><strong>Bank Name: </strong> <?php echo $profile_data->bank_name ?></div>
    <div class="col-sm-6"><strong>Bank A/C No: </strong> <?php echo $profile_data->bank_ac_no ?></div>
    <!-- <div class="col-sm-6"><strong>IFSC Code: </strong> <?php echo $profile_data->bank_ifsc ?></div> -->
    <div class="col-sm-6"><strong>Bank Branch Name: </strong> <?php echo $profile_data->bank_branch ?></div>
    <div class="col-sm-6"><strong>Bank Branch Code: </strong><?php echo $profile_data->bank_branch_code ?></div>
    <div class="col-sm-6"><strong>Account Type: </strong> <?php echo $profile_data->account_type ?></div>
    <!-- <div class="col-sm-6"><strong>Bitcoin Address: </strong> <?php echo $profile_data->btc_address ?></div>
    <div class="col-sm-6"><strong>Nominee Name: </strong> <?php echo $profile_data->nominee_name ?></div>
    <div class="col-sm-6"><strong>Nominee Relation with Member: </strong> <?php echo $profile_data->nominee_relation ?>
    </div> -->
</div><p class="hr_divider">&nbsp;</p>
<!-- <h3>KYC Details</h3>
<div class="row view" style="line-height: 30px; margin: auto;">
<div class="col-sm-6">
    <h4>ID Proof</h4>
    <?php echo $profile_data->id_proof ? '<a target="_blank" href="'.base_url('uploads/kyc/' . $profile_data->id_proof).'">Click Here</a>' : 'Not Updated'; ?>
</div> -->
<!-- <div class="col-sm-6">
    
</div>




<div class="col-sm-6 mt-1" >
    <h4>Address Proof</h4>
    <?php echo $profile_data->add_proof ? '<a target="_blank" href="'.base_url('uploads/kyc/' . $profile_data->add_proof).'">Click Here</a>' : 'Not Updated'; ?>
</div>
<div style="display: none;">
    <h4>Video</h4>
    <video width="120" height="120" controls>
     <source src="<?php echo base_url('uploads/profile/'.$data->video)?>" type="video/mp4">
    </video>
</div> -->
</div>
&nbsp;
<a href="<?php echo site_url('users/view-members') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>