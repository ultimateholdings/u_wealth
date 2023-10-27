<?php

?>
<div class="row">
    <?php echo form_open('investments/search') ?>
    <div class="alert alert-info">Fill any or all fields as per your need.</div>
    <div class="col-sm-6">
        <label>Investment Package</label>
        <select class="form-control" name="pack_name">
            <option selected>All</option>
            <?php
            foreach ($result as $e) {
                echo '<option value="' . $e->id . '">' . $e->pack_name . '</option>';
            }
            ?>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Status</label>
        <select class="form-control" name="status">
            <option selected>All</option>
            <option>Active</option>
            <option>Expired</option>
            <option>Pending</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>User ID</label>
        <input type="text" class="form-control" id="userid" name="userid">
    </div>
    <div class="col-sm-6">
        <label>Start Date</label>
        <input type="text" class="form-control datepicker" readonly id="startdate" name="startdate">
    </div>
    <div class="col-sm-6">
        <label>End Date</label>
        <input type="text" class="form-control datepicker" readonly id="enddate" name="enddate">
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
    </div>
    <?php echo form_close() ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("investments").classList.add('active');
        document.querySelector("#investments > ul > li:nth-child(5) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>