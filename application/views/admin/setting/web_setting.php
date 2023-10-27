<?php

?>
<style>
.panel-body{
    padding:15px;
}

@media only screen and (min-width: 992px) {
    #profile {
        width: 50%;
    }
    #upi {
        width: 50%;
    }
    #bank {
        width: 50%;   
    }
}

.tab-content 
{
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    -webkit-border-radius: 0;
    border-radius: 0;
    padding: 15px;
}

</style>

<?php echo form_open_multipart() ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "About Us"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo "Contact Us"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false"><?php echo "FAQ"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false"><?php echo "Terms of Use"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="upi-tab" data-toggle="tab" href="#upi" role="tab" aria-controls="upi" aria-selected="false"><?php echo "Privacy"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="complete-tab" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="false"><?php echo "Refund & Return Policy"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="complete-tab" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="false"><?php echo "Cancellation"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="complete-tab" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="false"><?php echo "Payments"; ?></a>
  </li>
</ul>
<br>
<?php echo form_open('setting/front_end_setting') ?>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab" >
       <form action="<?=site_url('admin/pages/save_setting')?>" method="post" class="form form-horizontal" enctype="multipart/form-data">
        <input type="hidden" name="action_for" value="about_content">
                <label>Account Name:</label>
        <input type="text" class="form-control" placeholder="Account Name" value="<?php echo set_value('account_name', config_item('account_name')) ?>" name="account_name"><br/>
        <label>Bank A/C No:</label><br/>
        <input type="text" class="form-control" placeholder="Bank A/C No." value="<?php echo set_value('account_no', config_item('account_no')) ?>" name="account_no"><br/>
        <label>Bank Name:</label>
        <input type="text" class="form-control" placeholder="Bank Name" value="<?php echo set_value('bank_name', config_item('bank_name')) ?>" name="bank_name"><br/>
        <label>Bank IFSC Code:</label>
        <input type="text" class="form-control" placeholder="Bank IFSC Code" value="<?php echo set_value('ifsc', config_item('ifsc')) ?>" name="ifsc"><br/>
        <label>Bank Branch Name</label>
        <input type="text" class="form-control" placeholder="Branch Name"
           value="<?php echo set_value('branch', config_item('branch')) ?>" name="branch"><br/>
        <label>Account Type</label>
        <select class="form-control" id="accounttype" name="accounttype" >
            <option value="<?php echo config_item('accounttype') ?>"><?php echo config_item('accounttype') ?></option>
           <option value="Savings">Savings</option>
           <option value="Current">Current</option>
        </select>
                </form>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div class="row">
            <div class="col-sm-offset-1  col-sm-5">
                Logo with Dark Text (160*50)
                <br/>
                <span class="btn btn-default btn-file" style="margin-top: 10px;"><span></span><input name="logo_dark" type="file"/></span>
            </div>
            <div class="col-sm-5">
                Choose Favicon.ico
                <br/>
                <span class="btn btn-default btn-file" style="margin-top: 10px;"><span></span><input name="favicon" type="file"/></span>
            </div>
        </div>
        <div>&nbsp;</div>
        <?php if(config_item('homepage')=='home/index') { ?>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
                <label style="font-style: bold; font-size: 16px; color: blue;">Home Page Sliders - JPG Format (1400*500)</label>
                <br><br>
            </div>
            <div class="col-sm-offset-1 col-sm-5">
                <label>Image 1</label>
                <br>
                <span class="btn btn-default btn-file" style="margin-top: 10px;"><input name="image1" type="file"/></span>
            </div>
            <div class="col-sm-5">
                <label>Image 2</label>
                <br/>
                <span class="btn btn-default btn-file" style="margin-top: 10px;"><span></span><input name="image2" type="file"/></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-5">
                <label>Image 3</label>
                <br/>
                <span class="btn btn-default btn-file" style="margin-top: 10px;"><span></span><input name="image3" type="file"/></span>
            </div>
            <div class="col-sm-5">
                <label>Image 4</label>
                <br/>
                <span class="btn btn-default btn-file" style="margin-top: 10px;"><span></span><input name="image4" type="file"/></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-5">
                <label>Image 5</label>
                <br/>
                <span class="btn btn-default btn-file" style="margin-top: 10px;"><span></span><input name="image5" type="file"/></span>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <label>Company Name:</label>
        <input type="text" class="form-control" placeholder="Company Name" value="<?php echo set_value('company_name', config_item('company_name')) ?>" name="company_name"><br/>
        <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email', config_item('email')) ?>"><br/>
        <label>Phone Number 1: </label>
        <input type="phone" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo set_value('phone', config_item('phone')) ?>"><br/>
        <label>Phone Number 2: </label>
        <input type="phone" name="phone_2" class="form-control" placeholder="Phone Number 2" value="<?php echo set_value('phone_2', config_item('phone_2')) ?>"><br/>
        <label>Company Address : Street Address</label><br/>
        <input type="text" class="form-control" placeholder="Street Address" value="<?php echo set_value('company_address', config_item('company_address')) ?>"
              name="company_address"><br/>
        <label>Company Address : City</label><br/>
        <input type="text" class="form-control" placeholder="City" value="<?php echo set_value('company_city', config_item('company_city')) ?>"
              name="company_city"><br/>
        <label>Company Address : State</label><br/>
        <input type="text" class="form-control" placeholder="State" value="<?php echo set_value('company_state', config_item('company_state')) ?>"
              name="company_state"><br/>
        <label>Company Address : Country</label><br/>
        <input type="text" class="form-control" placeholder="Country" value="<?php echo set_value('company_country', config_item('company_country')) ?>"
              name="company_country"><br/>
        <label>Company Address : Zipcode</label><br/>
        <input type="text" class="form-control" placeholder="Zipcode" value="<?php echo set_value('company_zipcode', config_item('company_zipcode')) ?>"
              name="company_zipcode"><br/>
        <label>Currency Sign:</label>
        <input type="text" class="form-control" value="<?php echo set_value('currency', config_item('currency')) ?>" name="currency"><br/>
        <label>Currency ISO Code (3 Character)</label>
        <input type="text" class="form-control"
           value="<?php echo set_value('iso_currency', config_item('iso_currency')) ?>"
           name="iso_currency"><br/>
        <label>PAN / TAX Number</label>
        <input type="text" class="form-control"
           value="<?php echo set_value('company_pan', config_item('company_pan')) ?>"
           name="company_pan"><br/>
        <label>GSTIN No.</label>
        <input type="text" class="form-control"
           value="<?php echo set_value('company_gst', config_item('company_gst')) ?>"
           name="company_gst"><br/>

    </div>
    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
        <label>About Company: </label><br/>
        <textarea id="about_us" rows="2" cols="116" name = 'about_us' value="<?php echo set_value('about_us', config_item('about_us')) ?>"><?php echo config_item('about_us') ?></textarea><br/>
        <label>Facebook URL: </label>
        <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com/xyz/" value="<?php echo set_value('facebook', config_item('facebook')) ?>"><br/>
        <label>Twitter URL: </label>
        <input type="text" name="twitter" class="form-control" placeholder="https://www.twitter.com/xyz/" value="<?php echo set_value('twitter', config_item('twitter')) ?>"><br/>
        <label>Linkedin URL: </label>
        <input type="text" name="linkedin" class="form-control" placeholder="https://www.linkedin.com/xyz/" value="<?php echo set_value('linkedin', config_item('linkedin')) ?>"><br/>
        <label>Google Map URL: </label>
        <input type="text" name="google_map" class="form-control" placeholder="https://www.google.com/maps/embed?pb=xyz" value="<?php echo set_value('google_map', config_item('google_map')) ?>"><br/>
    </div>
    <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
        <label>Account Name:</label>
        <input type="text" class="form-control" placeholder="Account Name" value="<?php echo set_value('account_name', config_item('account_name')) ?>" name="account_name"><br/>
        <label>Bank A/C No:</label><br/>
        <input type="text" class="form-control" placeholder="Bank A/C No." value="<?php echo set_value('account_no', config_item('account_no')) ?>" name="account_no"><br/>
        <label>Bank Name:</label>
        <input type="text" class="form-control" placeholder="Bank Name" value="<?php echo set_value('bank_name', config_item('bank_name')) ?>" name="bank_name"><br/>
        <label>Bank IFSC Code:</label>
        <input type="text" class="form-control" placeholder="Bank IFSC Code" value="<?php echo set_value('ifsc', config_item('ifsc')) ?>" name="ifsc"><br/>
        <label>Bank Branch Name</label>
        <input type="text" class="form-control" placeholder="Branch Name"
           value="<?php echo set_value('branch', config_item('branch')) ?>" name="branch"><br/>
        <label>Account Type</label>
        <select class="form-control" id="accounttype" name="accounttype" >
            <option value="<?php echo config_item('accounttype') ?>"><?php echo config_item('accounttype') ?></option>
           <option value="Savings">Savings</option>
           <option value="Current">Current</option>
        </select>
    </div>
    <div class="tab-pane fade" id="upi" role="tabpanel" aria-labelledby="upi-tab">
            <label>BHIM UPI</label>
            <input type="text" class="form-control" placeholder="UPI ID" value="<?php echo set_value('company_upi', config_item('company_upi')) ?>" name="company_upi"><br/>
            <label>Google Pay Phone No.</label><br/>
            <input type="text" class="form-control" name="googlepay_no" title="Only ten digit phone number is allowed" placeholder="Only ten digit phone number is allowed"
               value="<?php echo set_value('googlepay_no', config_item('googlepay_no')) ?>"><br/>
            <label>PhonePe Phone No.</label>
            <input type="text" class="form-control" name="phonepay_no" 
                   placeholder="Only ten digit phone number is allowed" value="<?php echo set_value('phonepay_no', config_item('phonepay_no')) ?>">
    </div>
    <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <div class="col-sm-12">
            <div class="text-center">
              <h2 class="mt-0">
                <i class="entypo-check"></i>
              </h2>
              <h3 class="mt-0">Thank You !</h3>
              <p class="w-75 mb-2 mx-auto">You Are Almost There. Please Check If You Have Provided All The Necessary Things.</p>
              <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
              </div>
            </div>
        </div>
    </div>
</div>
<?php echo form_close() ?>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("bsettings").classList.add('active');
        document.querySelector("#bsettings > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
