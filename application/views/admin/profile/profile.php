<?php

?>
<?php echo form_open_multipart() ?>
<div class="row">
<div class="col-sm-6">
    <label>My Name</label>
    <input type="text" class="form-control" name="my_name" 
           value="<?php echo set_value('my_name', $this->session->name) ?>">
</div>
<div class="col-sm-6">
    <label>My Phone No</label>
    <input type="text" class="form-control" name="my_phone" 
           value="<?php echo set_value('my_phone', $my->phone) ?>">
</div>
</div>
<div>&nbsp;</div>
<div class="row">
<div class="col-sm-6">
    <label>My Email Id</label>
    <input type="text" class="form-control" name="my_email"
           value="<?php echo set_value('my_email', $my->email) ?>">
</div>
<div class="col-sm-6">
    <label>Secure Password</label>
    <input type="password" class="form-control" name="securepass">
</div>

<div class="col-sm-6" style="padding-bottom: 20px;">
    <br/>
    <button type="submit" class="btn btn-primary">Update</button>
</div>
</div>
 <?php echo form_close() ?>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#proilesetting > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

