<?php

?>
<script type="text/javascript" src="<?php echo base_url('axxets/countries.js') ?>"></script>
<?php echo form_open() ?>
<div class="row">
    <div class="col-sm-6">
        <label>Franchisee Name*</label>
        <input type="text" class="form-control" value="<?php echo $data->name ?>" required name="name">
    </div>

    <div class="col-sm-6">
        <label>Store / Business Name</label>
        <input type="text" class="form-control" value="<?php echo $data->business_name ?>" name="business_name">
    </div>
    <input type="hidden" name="id" value="<?php echo $data->id ?>">
    <div class="col-sm-6">
        <label>Email ID</label>
        <input type="text" class="form-control" value="<?php echo $data->email ?>" name="email">
    </div>
    <div class="col-sm-6">
        <label>Phone*</label>
        <input type="text" class="form-control" value="<?php echo $data->phone ?>" name="phone">
    </div>
    <div class="col-sm-6">
        <label>Country*</label> <strong>(<?php echo $data->country ?>)</strong>
        <select id="country" name="country" class="form-control"></select>
    </div>
    <div class="col-sm-6">
        <label>State*</label> <strong>(<?php echo $data->state ?>)</strong>
        <select name="state" id="state" class="form-control"></select>
    </div>
    <div class="col-sm-6">
        <label>Address</label>
        <input type="text" class="form-control" value="<?php echo $data->address ?>" name="address">
    </div>
    <div class="col-sm-6">
        <label>Password</label>
        <input type="password" class="form-control" value="<?php echo $data->password ?>" name="password">
    </div>
    <div class="col-sm-6">
        <label>Status</label>
        <select class="form-control" name="status">
            <option selected> <?php echo $data->status ?></option>
            <option>Active</option>
            <option>Inactive</option>
            <option>Terminated</option>
        </select>
    </div>

    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
    <?php echo form_close() ?>
</div>
<script language="javascript">
    populateCountries("country", "state");
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
