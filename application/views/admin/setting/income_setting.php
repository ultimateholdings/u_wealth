<?php

?>
<div class="row">
    <?php echo form_open() ?>
    <div class="alert alert-danger">
        <strong>Warning !</strong> You have enabled "Give Fix Income" option at Advance Setting section of Business Setting. This means, product/service based income setting will not work now. You have to set income here.
    </div>
    <div class="col-sm-6">
        <label>Direct Income (% of registration fee)</label>
        <input type="text" class="form-control" value="<?php echo set_value('direct_income', $result->direct_income) ?>" name="direct_income">
    </div>
    <input type="hidden" name="id" value="1">
    <div class="col-sm-6">
        <label>Level Income (Comma Separated and in % of registration fee)</label>
        <input type="text" class="form-control" value="<?php echo set_value('level_income', $result->level_income) ?>" name="level_income">
    </div>
    <div class="col-sm-6">
        <label>Matching Income (in % of registration fee.)</label>
        <input type="text" class="form-control" value="<?php echo set_value('binary_income', $result->binary_income) ?>" name="binary_income">
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
    <?php echo form_close() ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("bsettings").classList.add('active');
        document.querySelector("#bsettings > ul > li:nth-child(8) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>