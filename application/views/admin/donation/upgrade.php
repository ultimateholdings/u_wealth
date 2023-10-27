<?php

?>
<div class="row">
    <?php echo form_open('donation/upgrade_user') ?>
    <div class="col-sm-6">
        <label>User ID</label>
        <input type="text" class="form-control" id="userid" name="userid">
    </div>
    <div class="col-sm-6">
        <label>Upgrade to:</label>
        <select name="upgrade_to" class="form-control">
            <?php
            foreach ($result as $e) {
                echo '<option value="' . $e->id . '">' . $e->plan_name . ' (Stage ' . $e->donation_level . ')</option>';
            }
            ?>
        </select>
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
    </div>
    <?php echo form_close() ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("managedonations").classList.add('active');
        document.querySelector("#managedonations > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>