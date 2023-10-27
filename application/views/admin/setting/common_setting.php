<?php
$this->load->config('email');
?>

<?php echo form_open_multipart() ?>
<div class="row">
    <div class="col-sm-6">
        <label>SMTP Host</label>
        <input type="text" class="form-control" value="<?php echo set_value('smtp_host', config_item('smtp_host')) ?>"
               name="smtp_host">
    </div>
    <div class="col-sm-6">
        <label>SMTP User</label>
        <input type="text" class="form-control" value="<?php echo set_value('smtp_user', config_item('smtp_user')) ?>"
               name="smtp_user">
    </div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-6">
        <label>SMTP Pass</label>
        <input class="form-control" type="password" value="<?php echo set_value('smtp_pass', config_item('smtp_pass')) ?>"
               name="smtp_pass">
    </div>
    <div class="col-sm-6">
        <label>SMTP Port (SSL Only)</label>
        <input type="text" class="form-control" value="<?php echo set_value('smtp_port', config_item('smtp_port')) ?>"
               name="smtp_port">
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
</div>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        //document.getElementsByClassName('start')[0].classList.remove('start');
        //document.getElementsByClassName('open')[0].classList.remove('open');
        document.getElementById("bsettings").classList.add('active');
        document.querySelector("#bsettings > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
