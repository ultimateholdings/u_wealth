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

 <h3 style="color: #3c3c3c;padding-left: 20px; ">Update Billing Address</h3>
 <hr>

<div class="col-sm-6">
    <label>Name</label>
    <input type="text" class="form-control" name="my_name"  
           value="<?php echo set_value('my_name', $my->b_name) ?>">
</div>
<div class="col-sm-6">
    <label>Phone No</label>
    <input type="text" class="form-control" name="my_phone" 
           value="<?php echo set_value('my_phone', $my->b_phone) ?>">
</div>
<br>
<br>
<div class="col-sm-6">
    <label>My Email Id</label>
    <input  type="email" class="form-control" name="my_email" placeholder="Enter your Email ID"
           value="<?php if ($my->b_email) { echo set_value('my_email', $my->b_email); } else { echo "Enter your Email ID"; } ?>" >
</div>
<div class="col-sm-6">
    <label>Street Address</label>
    <input type="text" class="form-control" name="my_address" placeholder="Enter your Address"
           value="<?php echo set_value('my_address', $my->b_address) ?>">
</div>
<div class="col-sm-6">
    <label>My City</label>
    <input  type="text" class="form-control" name="my_city" placeholder="Enter your City"
           value="<?php if ($my->b_city) { echo set_value('my_city', $my->b_city); } else { echo "Enter your City"; } ?>" >
</div>
<div class="col-sm-6">
    <label>My State</label>
    <input  type="text" class="form-control" name="my_state" placeholder="Enter your State"
           value="<?php if ($my->b_state) { echo set_value('my_state', $my->b_state); } else { echo "Enter your State"; } ?>" >
</div>
<div class="col-sm-6">
    <label>My zipcode</label>
    <input  type="text" class="form-control" name="my_zipcode" placeholder="Enter your Zipcode"
           value="<?php if ($my->b_zipcode) { echo set_value('my_zipcode', $my->b_zipcode); } else { echo "Enter your Zipcode"; } ?>" >
</div>
<div class="col-sm-6">
    <label>Secure Password</label>
    <input type="password" class="form-control" name="oldpass">
</div>
<br>
<br>
<div class="col-sm-6" style="padding-bottom: 20px;">
    <br/>
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</div>
 <?php echo form_close() ?>
<br/>
<p>&nbsp;</p>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("cart").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

