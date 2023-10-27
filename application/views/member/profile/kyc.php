<?php echo form_open_multipart('member/kyc_update') ?>
<div style=" background-color: #ffffff;margin-top: 20px;border-radius: 3px;border-radius: 6px;padding-left: 10px;padding-right: 10px;">
   <hr>
   <?php $kyc_enable = 1; ?>
   <?php if($kyc_enable == 1) 
   {
       if($data->status!="completed"){
       if($data->comment_admin!="")
       { ?>

        <h4 style="color:orange;padding-left: 10px; ">Comments from Admin</h4>
        <h3 style="color:blue;padding-left: 20px; "><?php echo $data->comment_admin;?></h3>
      <?php } 
      }

       if($data->status=="completed")
        {?>
          <h3 style="color: blue;padding-left: 20px; ">Your KYC Verification is Completed. You need not upload the document again</h3>
         <?php 
        }
       else if($data->status=="incompleted")
        {?>
           <h3 style="color: red;padding-left: 20px; ">Your KYC Verification is Rejected. You need to upload the document again!!</h3>
          <?php 
        }
        else if($data->status=="Pending") 
        { ?>
          <div class="row"> <h3 class="col-sm-6"style="color: orange;padding-left: 20px; ">You have successfully submitted KYC documents.</h3>
             </div>
         <?php 
        } 
        else 
        {?>
            <h3 style="color: #FF0000;padding-left: 20px; ">Your KYC Verification is Pending!!!. Please upload documents to receive payouts.</h3>
          <?php 
        } 
   } ?>
   <br>
<!--<div class="row">
    <div class="form-group col-sm-6">
       <label for="beneficiary_name" class="control-label">Beneficiary Name</label>
       <input type="text" class="form-control" name="beneficiary_name" id="beneficiary_name" title="Beneficiary Name" value="<?php echo $member->name; ?>" disabled>
    </div>
</div>-->
<!-- <div class="row">
    <div class="col-sm-6">
       <label>PAN / Tax No</label>
       <input type="text" class="form-control" name="tax_no" id="tax_no" pattern="[A-Z0-9]+" title="Only Capital letters and numbers are allowed" value="<?php if($data->tax_no){ echo set_value('tax_no', $data->tax_no); } else{ echo "Enter your PAN/Tax No." ;} ?>" required>
    </div>
 
  
    <div class="form-group col-sm-6">
       <label for="aadhar_no" class="control-label">Aadhar Card No</label>
       <input type="text" class="form-control" name="aadhar_no" id="aadhar_no" title="Aadhar Number be Twelve Digits" value="<?php if($data->aadhar_no){ echo set_value('aadhar_no', $data->aadhar_no); } else{ echo "" ;} ?>" placeholder="123444432224" required>
       <span id="aadhar" style="color: red; font-weight: bold"></span>
    </div></div> -->
   <!-- <div class="form-group col-sm-6">
      <label>GSTIN</label>
      <input type="text" class="form-control" name="gstin" value="<?php echo set_value('gstin', $data->gstin) ?>">
    </div>
    </div>-->
    <div> &nbsp; </div>
    <div class="row">
      <div class="col-sm-4">
          <div class="panel panel-primary shadow" data-collapsed="0" style="height: 100%;">
             <div class="panel-heading" style="background-color: #62549a;">
                <div class="panel-title" style="color: white;">
                   Upload Your Photo
                </div>
             </div>
             <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-12 ml-2 mt-2" >
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <?php if(strlen($data->id_proof)>2){ ?>
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px; background-color: #E0E0E0;" data-trigger="fileinput">
                                <a href="<?php echo base_url('uploads/kyc/'.$data->id_proof) ?>">    <img src="<?php echo base_url('uploads/kyc/'.$data->id_proof) ?>" alt="ID Proof" style="width: 150px; height: 150px;"></a>
                            </div>
                            <?php } ?>
                            <div>
                                <br>
                                <input type="file" name="pancard" accept="image/*">
                            </div>
                        </div>
                    </div>
                  </div>
             </div>
          </div>
      </div>
      <div class="col-sm-4 <?php echo $member_data['style']['offset']; ?>">
          <div class="panel panel-primary shadow" data-collapsed="0" style="height: 100%;">
             <div class="panel-heading" style="background-color: #62549a;">
                <div class="panel-title" style="color: white;">
                   Upload ID Card / Driver License / Passport
                </div>
             </div>
             <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-12 ml-2 mt-2" >
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <?php if(strlen($data->cheque)>2){ ?>
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px; background-color: #E0E0E0;" data-trigger="fileinput">
                                  <a href="<?php echo base_url('uploads/kyc/'.$data->cheque) ?>"><img src="<?php echo base_url('uploads/kyc/'.$data->cheque) ?>" alt="Cancelled Cheque" style="width: 150px; height: 150px;"></a>
                            </div>
                            <?php } ?>
                            <div>
                                <br>
                                <input type="file" name="cheque" accept="image/*">
                            </div>
                        </div>
                    </div>
                  </div>
             </div>
          </div>
      </div>
      <div class="col-sm-4" style="display: none;">
          <div class="panel panel-primary" data-collapsed="0">
             <div class="panel-heading">
                <div class="panel-title">
                   Update AADHAR Card
                </div>
             </div>
             <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-12 text-center" >
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <?php if(strlen($data->add_proof)>2){ ?>
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px; background-color: #E0E0E0;" data-trigger="fileinput">
                                  <a href="<?php echo base_url('uploads/kyc/'.$data->add_proof) ?>">  <img src="<?php echo base_url('uploads/kyc/'.$data->add_proof) ?>" alt=".." style="width: 150px; height: 150px;"></a>
                            </div>
                            <?php } ?>
                            <div>
                            <br>
                            <input type="file" name="aadharcard" accept="image/*">
                            </div>
                        </div>
                    </div>
                  </div>
             </div>
          </div>
      </div>
      <div class="col-sm-4 col-sm-offset-2" style="display: none;">
          <div> &nbsp; </div>
          <div class="panel panel-primary" data-collapsed="0">
             <div class="panel-heading">
                <div class="panel-title">
                   Upload Consent Video (mp4 format) 
                </div>
             </div>
             <div class="panel-body">
                  <div class="form-group">
                    <div class="col-md-12 text-center" >
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 150px; background-color: #E0E0E0;" data-trigger="fileinput">
                                <video  controls>
                                 <source src="<?php echo base_url('uploads/profile/'.$vdata->video)?>" type="video/mp4">
                                </video>
                            </div>
                            <div>
                                <br>
                                <input type="file" name="vupload" accept="video/*">
                            </div>
                        </div>
                    </div>
                  </div>
             </div>
          </div>
      </div>
          <?php if($data->status != "completed") {?>
      <div class="col-sm-6" style="padding-top:20px;padding-bottom: 30px;">
        <label>Secure Password</label>
        <input type="password" class="form-control" name="oldpass">
      </div>
      <div class="col-sm-6" style="padding-top:20px;padding-bottom: 20px;">
        <br/>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <br/>
      </div>
      <br>
    <?php } ?>
    </div>
    <div> &nbsp; </div>

</div>
<?php echo form_close() ?>
<br/>
<p>&nbsp;</p>
<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('bank_ac_no').value) {
            $('#bank_res').html('Bank Account Must be Matching.<br>');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
<script type="text/javascript">
  $('#aadhar_no').change(function(){
    var myInput = document.getElementById("aadhar_no");
    if(myInput.value.length != 12) {
      $('#aadhar').html('Aadhar Must be Tweleve Digit Length');
    }else{
      $('#aadhar').html('');
    }
  });

  $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#proilesetting > ul:nth-child(2) > li:nth-child(2) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
  });

</script>