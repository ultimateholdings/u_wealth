<style type="text/css">
    div.col-sm-6 {
        margin-top: 10px;
    }

    .row{
        
        margin-top: 5px;
        border-radius: 3px;
        border-radius: 6px;
        padding-left: 20px;
        padding-right: 20px;
    }

</style>
<?php echo form_open_multipart() ?>
<div class="row">
    <div class="col-sm-6">
        <label>My Name</label>
        <input type="text" class="form-control" name="my_name" disabled 
               value="<?php echo set_value('my_name', $this->session->name) ?>">
    </div>
    <div class="col-sm-6">
        <label>My Phone No</label>
        <input type="number" class="form-control" name="my_phone" disabled 
               value="<?php echo set_value('my_phone', $my->phone) ?>" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
    </div>
    <div class="col-sm-6">
        <label>My Email Id</label>
        <input  type="email" class="form-control" name="my_email" placeholder="Enter your Email ID"
               value="<?php if ($my->email) { echo set_value('my_email', $my->email); } else { echo "Enter your Email ID"; } ?>" >
    </div>
    <div class="col-sm-6">
                <label for="activate_time" class="control-label">Date of Activation</label>
                <input type="text" readonly class="form-control datepicker" value="<?php $dt = new DateTime($my->activate_time); $date=$dt->format('Y-m-d'); echo $date;  ?>"
                       id="activate_time" name="activate_time" disabled>
    </div>
    <div class="col-sm-6">
        <label for="date_of_birth" class="control-label">Date of Birth</label>
            <input type="text" class="form-control datepicker" value="<?php $dt = new DateTime($data->date_of_birth); $date=$dt->format('Y-m-d'); echo $date;  ?>"
                   id="date_of_birth" name="date_of_birth" onchange="checkDOB()">
    </div>
    <div class="col-sm-6">
        <label>My Photo(255px X 255px)</label>
        <input type="file" class="form-control" name="photo">
    </div>
</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<h3 style="color: #3c3c3c;padding-left: 20px; ">Communication Details</h3>
<hr>
<div class="row">
    <div class="col-sm-6">
        <label for="address" class="control-label">Address</label>
        <input type="text" class="form-control" value="<?php echo set_value('address', $data->address) ?>"
               id="address" name="address">
    </div>
    <div class="col-sm-6">
        <label for="city" class="control-label">City</label>
        <input type="text" class="form-control" value="<?php echo set_value('city', $data->city) ?>"
               id="city" name="city">
    </div>
    <div class="col-sm-6">
        <label for="state" class="control-label">State</label>
        <input type="text" class="form-control" value="<?php echo set_value('state', $data->state) ?>"
               id="state" name="state">
    </div>
    <div class="col-sm-6">
        <label for="zip" class="control-label">Zip Code</label>
        <input type="number" class="form-control" value="<?php echo set_value('zip', $data->zip) ?>"
               id="zip" name="zip">
    </div>
    <div class="col-sm-6">
        <label>Secure Password</label>
        <input type="password" class="form-control" name="oldpass">
    </div>
    <div class="col-sm-12" style="padding: 20px;">
        <button type="submit" class="btn btn-primary">Update</button>
        <a target="_blank" href="<?php echo site_url('member/print_idcard/' . $my->id); ?>" class="btn btn-primary">Print Id Card</a>
        <a href="<?php echo site_url('member');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
</div>
 <?php echo form_close() ?>
</br>

<script type="text/javascript">
    function checkDOB() {
        var dateString = document.getElementById('date_of_birth').value;
        var myDate = new Date(dateString);
        var today = new Date();
        if ( myDate > today ) { 
            $('#date_of_birth').after("<p style='color:red'>You cannot enter a date in the future!.</p>");
            return false;
        }
        return true;
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("proilesetting").classList.add('active');
        document.querySelector("#proilesetting > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>