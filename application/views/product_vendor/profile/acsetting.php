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
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php echo "Login password"; ?></a>
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
    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab" >
        <?php echo form_open('vendor/settings') ?>
            <label>Enter Current Password:</label>
            <input type="password" name="oldpass" required class="form-control"><br/>
            <label>Enter New Password:</label>
            <input type="password" name="newpass" required class="form-control"><br/>
            <label>Retype New Password:</label>
            <input type="password" name="repass" required class="form-control"><br/>
            <button class="btn btn-success" name="submit" value="add">Update</button>
        <?php echo form_close() ?>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('vendor/settings_secure') ?>
            <label>Enter Current Secure Password:</label>
            <input type="password" name="oldsecure" required class="form-control"><br/>
            <label>Enter New Secure Password:</label>
            <input type="password" name="newsecure" required class="form-control"><br/>
            <label>Retype New Secure Password:</label>
            <input type="password" name="repasssecure" required class="form-control"><br/>
            <button class="btn btn-success" name="submit" value="add">Update</button>
        <?php echo form_close() ?>
    </div>
    <div class="tab-pane fade" id="reset_secure" role="tabpanel" aria-labelledby="profile-tab">
        <?php echo form_open_multipart('vendor/reset_secure') ?>
            <label>Enter User ID:</label>
            <input type="text" name="vendor_id" required class="form-control"><br/>
            <label>Enter Login Password:</label>
            <input type="password" name="password" required class="form-control"><br/>
            <label>Enter Phone Number:</label>
            <input type="text" name="phone" required class="form-control"><br/>
            <button class="btn btn-success" name="submit" value="add">Submit</button>
        <?php echo form_close() ?>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#proilesetting > ul:nth-child(2) > li:nth-child(4) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>

