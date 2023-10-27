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

 <h3 style="color: #3c3c3c;padding-left: 20px; ">My Profile</h3>
 <hr>

<div class="col-sm-6">
    <label>My Name</label>
    <input type="text" class="form-control" name="my_name" disabled 
           value="<?php echo set_value('my_name', $this->session->name) ?>">
</div>
<div class="col-sm-6">
    <label>My Phone No</label>
    <input type="text" class="form-control" name="my_phone" disabled 
           value="<?php echo set_value('my_phone', $my->phone) ?>">
</div>
<br>
<br>
<div class="col-sm-6">
    <label>My Email Id</label>
    <input  type="email" class="form-control" name="my_email" placeholder="Enter your Email ID"
           value="<?php if ($my->email) { echo set_value('my_email', $my->email); } else { echo "Enter your Email ID"; } ?>" >
</div>
<div class="col-sm-6">
    <label>My Address</label>
    <input type="text" class="form-control" name="my_address" placeholder="Enter your Address"
           value="<?php echo set_value('my_address', $my->address) ?>">
</div>
<div class="col-sm-6">
    <label>My Photo(255px X 255px)</label>
    <input type="file" class="form-control" name="photo">
</div><br>
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
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

