<?php

?>
<script type="text/javascript">
    function check_user() {
        var data = $("#username").val();
        $.ajax({
            url: "<?php echo site_url('cron/check_user') ?>",
            method: "POST",
            data: {
                user: data,
            },
            success: function (response) {
                document.getElementById("result").innerHTML = response;
            },
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url('axxets/countries.js') ?>"></script>
<?php echo form_open() ?>
<div class="row">
    <div class="col-sm-6">
        <label>Franchisee Name*</label>
        <input type="text" class="form-control" required name="name">
    </div>
    <div class="col-sm-6">
        <label>Franchisee Username* (#@. only these special characters allowed)</label>
        <input type="text" class="form-control" required name="username" id="username"><span id="result"></span>
        <a href="javascript:;" onclick="check_user()" style="font-size: 10px; color: #f00">Check Availability &rarr;</a>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label>Store / Business Name</label>
        <input type="text" class="form-control" name="business_name" required>
    </div>
    <div class="col-sm-6">
        <label>Email ID</label>
        <input type="text" class="form-control" name="email">
    </div>
  <!--  <div class="col-sm-6">
        <label>Phone*</label>
        <input type="text" class="form-control" name="phone" pattern="[1-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" required>
    </div>-->
    
    <?php if(config_item('company_country')=='India') { ?>
    <div class="col-sm-6">
        <label for="phone">Phone No* (10 Digit Number)</label>
        <input type="text" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" pattern="[1-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
    </div>
    <?php } else { ?>
    <div class="col-sm-6">
        <label for="phone">Phone No* (10 Digit Number)</label>
        <input type="text" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
    </div>
    <?php } ?>
    <div class="col-sm-6">
        <label>Country*</label>
        <select id="country" name="country" class="form-control" required></select>
    </div>
    <div class="col-sm-6">
        <label>State*</label>
        <select name="state" id="state" class="form-control" required></select>
    </div>
    <div class="col-sm-6">
        <label>Address*</label>
        <input type="text" class="form-control" name="address" required>
    </div>

    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
    </div>
    <?php echo form_close() ?>
</div>
<script language="javascript">
    populateCountries("country", "state");
</script>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("franchisee").classList.add('active');
        document.querySelector("#franchisee > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
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