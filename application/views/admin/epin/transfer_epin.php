<?php echo form_open('admin/transfer_epin') ?>
<div class="row">
    <div class="col-sm-6">
        <label>From User ID *</label>
        <input placeholder="From where to deduct epin" value="<?php echo set_value('from') ?>"
            class="form-control" name="from" onchange="get_user_name('#from', '#from_res')" id="from">
        <span id="from_res" style="color: red; font-weight: bold"></span>
    </div>
    <div class="col-sm-6">
        <label>To User ID *</label>
        <input placeholder="Where to transfer epins" value="<?php echo set_value('to') ?>" class="form-control" name="to" onchange="get_user_name('#to', '#to_res')" id="to">
        <span id="to_res" style="color: red; font-weight: bold"></span>
    </div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-6">
        <label>Amount of each Epin*</label>
        <select class="form-control" id="amount" name="amount" >
        <?php foreach ($products as $val) {
            echo '<option value="' . $val['joining_fee'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
            } ?>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Number of Pins *</label>
        <input placeholder="How many epin to transfer" value="<?php echo set_value('qty') ?>"
            class="form-control" name="qty">
    </div>
    <div class="col-sm-6">
        <br/>
        <input type="submit" class="btn btn-primary" value="Transfer" onclick="this.value='Transferring..'">
        <a href="<?php echo site_url('admin') ?>" class="btn btn-light">&larr; Go Back</a>
    </div>
</div>
<?php echo form_close() ?>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("epin").classList.add('active');
        document.querySelector("#epin > ul > li:nth-child(5) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>