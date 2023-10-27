<?php
?>
<style>
.fileinput .thumbnail[data-trigger="fileinput"]{
    cursor:pointer;
}
.fileinput .thumbnail {
  overflow: hidden;
  display: inline-block;
  margin-bottom: 5px;
  vertical-align: middle;
  text-align: center;
}
.fileinput .thumbnail > img {
  max-height: 100%;
  display: block;
}
.fileinput .btn {
  vertical-align: middle;
}
.fileinput-inline .fileinput-controls {
  display: inline;
}
.fileinput .uneditable-input {
  white-space: normal;
}
.fileinput-new .input-group .btn-file {
  border-radius: 0 3px 3px 0;
}
.fileinput-new .input-group .btn-file.btn-xs,
.fileinput-new .input-group .btn-file.btn-sm {
  border-radius: 0 2px 2px 0;
}
.fileinput-new .input-group .btn-file.btn-lg {
  border-radius: 0 3px 3px 0;
}
.fileinput-exists .fileinput-new,
.fileinput-new .fileinput-exists {
  display: none;
}
.btn-file > input {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  opacity: 0;
  filter: alpha(opacity=0);
  transform: translate(-300px, 0) scale(4);
  font-size: 23px;
  direction: ltr;
  cursor: pointer;
}
.fileinput {
  margin-bottom: 9px;
  display: inline-block;
}
.fileinput .uneditable-input {
  display: inline-block;
  margin-bottom: 0px;
  vertical-align: middle;
  cursor: text;
}
.fileinput i + .fileinput-filename,
.fileinput .btn + .fileinput-filename {
  padding-left: 5px;
}
.btn-white{
    color:#303641;
    background-color: #ffffff;
}
.btn-white {
  color: #303641;
  background-color: #ffffff;
  border-color: #ffffff;
  border-color: #ebebeb;
}
.btn-white:hover,
.btn-white:focus,
.btn-white:active,
.btn-white.active,
.open .dropdown-toggle.btn-white {
  color: #303641;
  background-color: #ebebeb;
  border-color: #e0e0e0;
}
.btn-white:active,
.btn-white.active,
.open .dropdown-toggle.btn-white {
  background-image: none;
}
</style>
<?php echo form_open_multipart() ?>
<div class="row" style=" background-color: #ffffff;margin-top: 20px;border-radius: 3px;border-radius: 6px;padding-left: 10px;padding-right: 10px;">
   <br>
   <?php $kyc_enable = 1; ?>
   <?php if($kyc_enable == 1) 
   {
       if($data->status=="completed")
        {?>
          <h3 style="color: blue;padding-left: 20px; ">Your KYC Verification is Completed. You need not upload the document again</h5>
         <?php 
        }
       else if($data->status=="incompleted")
        {?>
           <h3 style="color: red;padding-left: 20px; ">Your KYC Verification is Rejected. You need to upload the document again!!</h5>
          <?php 
        }
        else if($data->status=="Pending") 
        { ?>
            <h3 style="color: orange;padding-left: 20px; ">You have successfully submitted KYC documents.</h5>
         <?php 
        } 
        else 
        {?>
            <h3 style="color: #FF0000;padding-left: 20px; ">Your KYC Verification is Pending!!!. Please upload documents to receive payouts.</h5>
          <?php 
        } 
   } ?>

    <h3 style="color: #3c3c3c;padding-left: 20px; ">KYC</h3>
    <hr>
    <div class="col-sm-6">
       <label>PAN / Tax No</label>
       <input type="text" class="form-control" name="tax_no" id="tax_no" pattern="[A-Z0-9]+" title="Only Capital letters and numbers are allowed" value="<?php if($data->tax_no){ echo set_value('tax_no', $data->tax_no); } else{ echo "Enter your PAN/Tax No." ;} ?>" required>
    </div>
    <div class="form-group col-sm-6">
       <label for="aadhar_no" class="control-label">Aadhar Card No</label>
       <input type="number" class="form-control" name="aadhar_no" id="aadhar_no" pattern="[1-9][1][0-9][11]" title="Only twelve digit number is allowed"
           value="<?php if($data->aadhar_no){ echo set_value('aadhar_no', $data->aadhar_no); } else{ echo "Enter your AAdhar No." ;} ?>" required>
    </div>
    <!--<div class="col-sm-6">
      <label>GSTIN</label>
      <input type="text" class="form-control" name="gstin" value="<?php echo set_value('gstin', $data->gstin) ?>">  
    div>-->
    <!--<div class="col-sm-6">
      <label>Address Proof</label>
      <input type="file" class="form-control" name="add_proof">
    </div>
    <div class="col-sm-6">
       <label>ID Proof</label>
       <input type="file" class="form-control" name="id_proof">
    </div>-->
    <!--<div class="col-sm-6">
      <label>PAN Card</label>
      <input type="file" class="form-control" name="pancard" required>
    </div>-->
    <div> &nbsp; </div>
    <div class="col-sm-4">
        <div class="panel panel-primary" data-collapsed="0">
           <div class="panel-heading">
              <div class="panel-title">
                 Update PAN Card
              </div>
           </div>
           <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-12 text-center" >
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 150px; height: 150px; background-color: #E0E0E0;" data-trigger="fileinput">
                              <a href="<?php echo base_url('uploads/kyc/'.$data->id_proof) ?>">    <img src="<?php echo base_url('uploads/kyc/'.$data->id_proof) ?>" alt="..."></a>
                          </div>
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
    <div class="col-sm-4">
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
                          <div class="fileinput-new thumbnail" style="width: 150px; height: 150px; background-color: #E0E0E0;" data-trigger="fileinput">
                                <a href="<?php echo base_url('uploads/kyc/'.$data->add_proof) ?>">  <img src="<?php echo base_url('uploads/kyc/'.$data->add_proof) ?>" alt="..."></a>
                          </div>
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
    <div class="col-sm-4">
        <div class="panel panel-primary" data-collapsed="0">
           <div class="panel-heading">
              <div class="panel-title">
                 Upload Cancelled Cheaque Leaf
              </div>
           </div>
           <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-12 text-center" >
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 150px; height: 150px; background-color: #E0E0E0;" data-trigger="fileinput">
                                <a href="<?php echo base_url('uploads/kyc/'.$data->cheque) ?>">  <img src="<?php echo base_url('uploads/kyc/'.$data->cheque) ?>" alt="..."></a>
                          </div>
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
    <div class="col-sm-4 col-sm-offset-2" style="display:none;">
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
    <div class="col-sm-6" style="padding-top:20px;padding-bottom: 20px;">
      <label>Secure Password</label>
      <input type="password" class="form-control" name="oldpass">
    </div>
    
    <div class="col-sm-6" style="padding-top:20px;padding-bottom: 20px;">
      <br/>
      <?php if($data->status != "completed") {?>
      <button type="submit" class="btn btn-primary">Update</button>
      <?php } ?>
      <br/>
    </div>
    <br>
</div>
<?php echo form_close() ?>
<br/>
<p>&nbsp;</p>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#proilesetting > ul:nth-child(2) > li:nth-child(2) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>