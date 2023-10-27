<style>
<?php $member_data['style']['element']='in'?>
.panel-body{
    padding:15px;
}

@media only screen and (min-width: 992px) {
    #home {
        width: 50%;
    }
    #profile {
        width: 50%;
    }
    #reset_secure {
      width: 50%;
    }
    #blockchain{
      width: 50%;
    }
}

</style>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <?php if(config_item('enable_kyc')=='Yes'||config_item('enable_kyc')=='No'){ ?>
  <li class="nav-item active">
    <a class="nav-link active <?php echo $member_data['style']['element'] ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "Bank Details"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo "Nominee Details"; ?></a>
  </li>
<?php } else{ ?>
  <li class="nav-item active">
    <a class="nav-link active <?php echo $member_data['style']['element'] ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><?php echo "Nominee Details"; ?></a>
  </li>
<?php } ?>
<?php if(config_item('enable_upi')=='Yes'){ ?>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#reset_secure" role="tab" aria-controls="reset_secure" aria-selected="false"><?php echo "UPI Details"; ?></a>
  </li>
<?php } ?>
  <?php if(config_item('enable_crypto')=='Yes'){ ?>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#blockchain" role="tab" aria-controls="blockchain" aria-selected="false"><?php echo "Bitcoin Details"; ?></a>
  </li>
<?php } ?>
</ul>
<br>
<div class="tab-content" id="myTabContent">
  <?php if(config_item('enable_kyc')=='Yes'|| config_item('enable_kyc')=='No'){ ?>
    <div class="tab-pane fade active <?php echo $member_data['style']['element'] ?>" id="home" role="tabpanel" aria-labelledby="home-tab" >
        <?php echo form_open('Member/bankdetails') ?>
        <?php $name=$this->db_model->select('name', 'member', array('id' => $this->session->user_id)) ?>
            <label>Beneficiary Name</label>
              <input type="text" class="form-control" name="beneficiary_name"
               value="<?php echo $name; ?>" disabled><br/>
            <label>Bank Name</label>
              <input type="text" class="form-control" name="bank_name"
               value="<?php if($data->bank_name){ echo set_value('bank_name', $data->bank_name); } else{ echo " "; } ?>" required><br/>
            <label>Bank A/C No</label>
             <input type="number" class="form-control" name="bank_ac_no" id="bank_ac_no"
               value="<?php echo set_value('bank_ac_no', $data->bank_ac_no);  ?>" required><br/>
            <label>Retype Bank A/C No</label>
             <input type="number" class="form-control" name="confirm_bank_ac_no" id="confirm_bank_ac_no"
               value="<?php if($data->bank_ac_no){ echo $data->bank_ac_no; } else{ echo "" ; } ?>" required oninput="validate_bank(this)"><span id="bank_res" class="text-danger"></span><br/>
            <?php if(strtolower(config_item('company_country'))=='india') {?>
            <label>Bank IFSC Code</label>
              <input type="text" class="form-control" name="bank_ifsc" pattern="[A-Z0-9]+" title="Only capital letters and numbers are allowed"
               value="<?php if($data->bank_ifsc){ echo set_value('bank_ifsc', $data->bank_ifsc);} else{echo ""; } ?>" required><br/>
            <?php } ?>
            <label>Bank Branch Name</label>
             <input type="text" class="form-control" name="bank_branch"
               value="<?php if($data->bank_branch){ echo set_value('bank_branch', $data->bank_branch); } else{echo " "; } ?>" required><br/>
            <label>Bank Branch Code</label>
             <input type="text" class="form-control" name="bank_branch_code"
               value="<?php if($data->bank_branch){ echo set_value('bank_branch_code', $data->bank_branch_code); } else{echo " "; } ?>" required><br/>

               <label>Account type</label>
                <select class="form-control" id="account_type" name="account_type" >
                  <option value="<?php echo $data->account_type ?>"><?php echo $data->account_type ?></option>
                  <option value="Savings">Savings</option>
                  <option value="Current">Current</option>
                </select><br/>
                <label>Secure Password</label>
                <input type="password" class="form-control" name="oldpass"><br/>
            <button class="btn btn-success" name="submit" value="add">Update</button>
            <a href="<?php echo site_url('member');?>" required id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <?php echo form_close() ?>
        <br/>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('Member/nominee_details') ?>
            <label>Nominee Name</label>
            <input type="text" class="form-control" name="nominee_name"
                   value="<?php if($data->nominee_name){ echo set_value('nominee_name', $data->nominee_name); } else{echo " " ; } ?>"><br/>
            <label>Nominee Address</label>
            <input type="text" class="form-control" name="nominee_add"
                   value="<?php if($data->nominee_add){ echo set_value('nominee_add', $data->nominee_add);} else{echo " " ;} ?>"><br/>
            <label>Nominee Relation</label>
            <input type="text" class="form-control" name="nominee_relation"
                   value="<?php if($data->nominee_relation){ echo set_value('nominee_relation', $data->nominee_relation); } else{echo " "; }?>"><br/>
            <label>Nominee Phone Number</label>
              <input type="number" class="form-control" name="nominee_phone" pattern="[A-Z0-9]+" title="Ten digit phone number"
               value="<?php if($data->nominee_phone){ echo set_value('nominee_phone', $data->nominee_phone);} else{echo " "; } ?>"><br/>
                   <label>Secure Password</label>
            <input type="password" class="form-control" name="oldpass"><br/>
            <button class="btn btn-success" name="submit" value="add">Update</button>
            <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <?php echo form_close() ?>
    </div>
  <?php } else { ?> 
    <div class="tab-pane fade active <?php echo $member_data['style']['element'] ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('Member/nominee_details') ?>
            <label>Nominee Name</label>
            <input type="text" class="form-control" name="nominee_name"
                   value="<?php if($data->nominee_name){ echo set_value('nominee_name', $data->nominee_name); } else{echo " " ; } ?>"><br/>
            <label>Nominee Address</label>
            <input type="text" class="form-control" name="nominee_add"
                   value="<?php if($data->nominee_add){ echo set_value('nominee_add', $data->nominee_add);} else{echo " " ;} ?>"><br/>
            <label>Nominee Relation</label>
            <input type="text" class="form-control" name="nominee_relation"
                   value="<?php if($data->nominee_relation){ echo set_value('nominee_relation', $data->nominee_relation); } else{echo " "; }?>"><br/>
            <label>Nominee Phone Number</label>
              <input type="number" class="form-control" name="nominee_phone" pattern="[A-Z0-9]+" title="Ten digit phone number"
               value="<?php if($data->nominee_phone){ echo set_value('nominee_phone', $data->nominee_phone);} else{echo " "; } ?>"><br/>
                   <label>Secure Password</label>
            <input type="password" class="form-control" name="oldpass"><br/>
            <button class="btn btn-success" name="submit" value="add">Update</button>
            <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <?php echo form_close() ?>
    </div>
  <?php } ?>
    <div class="tab-pane fade" id="reset_secure" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('Member/upi') ?>
            <label>UPI *</label>
            <input type="text" class="form-control" name="upi"
                   value="<?php if($data->upi_id){ echo set_value('upi', $data->upi_id); } else{ echo " " ; } ?>" required><br/>
            <label>Google Pay Phone No.</label>
              <input type="text" class="form-control" name="googlepay_no" pattern="[7-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed"
               value="<?php if($data->googlepay_no){ echo set_value('googlepay_no', $data->googlepay_no); } else{ echo "" ; } ?>"><br/>
            <label>PhonePe Phone No.</label>
            <input type="text" class="form-control" name="phonepay_no" pattern="[7-9]{1}[0-9]{9}"
                   value="<?php if($data->phonepay_no){ echo set_value('phonepay_no', $data->phonepay_no); } else{ echo "" ; } ?>"><br/>
            <label>Secure Password</label>
            <input type="password" class="form-control" name="oldpass"><br/>
            <button class="btn btn-success" name="submit" value="add">Submit</button>
            <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <?php echo form_close() ?>
    </div>
    <div class="tab-pane fade" id="blockchain" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('Member/blockchain') ?>
            <label >BitCoin Address</label>
            <input type="text" class="form-control" name="btc_address"
                   value="<?php if($data->btc_address){ echo set_value('btc_address', ''); } else{ echo " " ; } ?>"><br/>
            <label>Secure Password</label>
            <input type="password" class="form-control" name="oldpass"><br/>
            <button class="btn btn-success" name="submit" value="add">Submit</button>
            <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <?php echo form_close() ?>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#bankdetails").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script language='javascript' type='text/javascript'>
    function validate_bank(input) {
        if (input.value != document.getElementById('bank_ac_no').value) {
            $('#bank_res').html('Bank Account Must be Matching.<br>');
        } else {
            $('#bank_res').html('');
        }
    }
</script>