<?php echo form_open('staff/new_staff', array("class" => "form-horizontal")); ?>
<div class="form-group">
    <label for="password" class="col-md-4 control-label">Designation</label>
    <div class="col-md-8">
        <select name="designation" class="form-control">
            <?php foreach ($data as $e) { ?>
                <option value="<?php echo $e->id ?>"><?php echo $e->des_title ?></option>
            <?php } ?>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="username" class="col-md-4 control-label">
        <span class="text-danger">*</span>Username (#@. Only these special character allowed)</label>
    <div class="col-md-8">
        <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" id="username"/>
        <span class="text-danger"><?php echo form_error('username'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-md-4 control-label">Password</label>
    <div class="col-md-8">
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control"
               id="password"/>
    </div>
</div>
<div class="form-group">
    <label for="name" class="col-md-4 control-label"><span class="text-danger">*</span>Name</label>
    <div class="col-md-8">
        <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" id="name"/>
        <span class="text-danger"><?php echo form_error('name'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-md-4 control-label">Email</label>
    <div class="col-md-8">
        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="email"/>
        <span class="text-danger"><?php echo form_error('email'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="phone" class="col-md-4 control-label"><span class="text-danger">*</span>Phone</label>
    <div class="col-md-8">
        <input type="number" name="phone" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" value="<?php echo set_value('phone'); ?>" class="form-control" id="phone"/>
        <span class="text-danger"><?php echo form_error('phone'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="pan" class="col-md-4 control-label">PAN / Tax No</label>
    <div class="col-md-8">
        <input type="text" name="pan" value="<?php echo set_value('pan'); ?>" class="form-control" id="pan"/>
    </div>
</div>
<div class="form-group">
    <label for="aadhar" class="col-md-4 control-label">Aadhar Card No</label>
    <div class="col-md-8">
        <input type="text" name="aadhar" value="<?php echo set_value('aadhar'); ?>" class="form-control" id="aadhar"/>
    </div>
</div>
<div class="form-group">
    <label for="address" class="col-md-4 control-label"><span class="text-danger">*</span>Address</label>
    <div class="col-md-8">
        <textarea name="address" class="form-control" id="address"><?php echo set_value('address'); ?></textarea>
        <span class="text-danger"><?php echo form_error('address'); ?></span>
    </div>
</div>
<div class="form-group">
    <label for="bank_detail" class="col-md-4 control-label">Bank Detail</label>
    <div class="col-md-8">
        <textarea name="bank_detail" class="form-control" id="bank_detail"><?php echo set_value('bank_detail'); ?></textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>

<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("managestaff").classList.add('active');
        document.querySelector("#managestaff > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">

$(':text').keypress(function (e) {
var regex = new RegExp("^[a-zA-Z0-9#\@.]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
if (regex.test(str)) {
    return true;
}

e.preventDefault();
return false;
});

function keyRestrict(e,validchars) {
    var key='', keychar='';
    key = getKeyCode(e);
    if (key == null) return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    validchars = validchars.toLowerCase();
    if (validchars.indexOf(keychar) != -1)
    return true;
    if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
    return true;
    return false;
}

function getKeyCode(e) {
    if (window.event)
    return window.event.keyCode;
    else if (e)
    return e.which;
    else
    return null;
}

</script>