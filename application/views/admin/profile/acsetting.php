
<style>
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
}

</style>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link active <?php echo $member_data['style']['element'] ?>" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "Login Password"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php echo "Secure Password"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#reset_secure" role="tab" aria-controls="reset_secure" aria-selected="false"><?php echo "Reset Secure Password"; ?></a>
  </li>
</ul>
<br>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active <?php echo $member_data['style']['element'] ?>" id="home" role="tabpanel" aria-labelledby="home-tab" >
        <?php echo form_open('Admin/settings') ?>
            <label>Enter Current Password:</label>
            <input type="password" name="oldpass" required class="form-control"><br/>
            <label>Enter New Password:</label>
            <input type="password" name="newpass" required class="form-control"><br/>
            <label>Retype New Password:</label>
            <input type="password" name="repass" required class="form-control"><br/>
            <label>Enter Secure Password:</label>
            <input type="password" name="securepass" required class="form-control"><br/>
            <button class="btn btn-success" name="submit" value="add">Update</button>
            <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>

        <?php echo form_close() ?>
    </div>
     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('Admin/settings_secure') ?>
            <label>Enter Current Secure Password:</label>
            <input type="password" name="oldsecure" required class="form-control"><br/>
            <label>Enter New Secure Password:</label>
            <input type="password" name="newsecure" required class="form-control"><br/>
            <label>Retype New Secure Password:</label>
            <input type="password" name="repasssecure" required class="form-control"><br/>
            <button class="btn btn-success" name="submit" value="add">Update</button>
            <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <?php echo form_close() ?>
    </div>
    <div class="tab-pane fade" id="reset_secure" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('Admin/reset_secure_password') ?>
            <label>Enter Login Username:</label>
            <input type="text" name="username" required class="form-control" placeholder="Admin Login Username"><br/>
            <label>Enter Login Password:</label>
            <input type="password" name="password" required class="form-control" placeholder="Admin Login Password"><br/>
            <label>Email</label>
            <input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email" name="email" placeholder="Registered Email"><br/>
            <button class="btn btn-success" name="submit" value="add">Submit</button>
            <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        <?php echo form_close() ?>
    </div>
</div>
<!-- <?php echo form_open() ?>
<div class="row">
<div class="col-sm-7 col-md-offset-2">
    <label>Enter Current Password:</label>
    <input type="password" name="oldpass" required class="form-control"><br/>
    <label>Enter New Password:</label>
    <input type="password" name="newpass" required class="form-control"><br/>
    <label>Retype New Password:</label>
    <input type="password" name="repass" required class="form-control"><br/>
    <label>Enter Secure Password:</label>
    <input type="password" name="securepass" required class="form-control"><br/>
    <button class="btn btn-success" name="submit" value="add">Update</button>
</div>
</div> -->
<?php echo form_close() ?>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#proilesetting > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

