<?php
?>
<!DOCTYPE html>
<html>
<head>
<style>
.nav-tabs-custom {
    margin-bottom: 20px;
    background: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 3px;
}
.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}
.row {
    margin-right: -15px;
    margin-left: -15px;
    width:100%;
    padding-left: 20px;
}
.col-md-12{
    position: relative;
    min-height: 1px;
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}
.box-header {
    color: #444;
    display: block;
    padding: 10px;
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    position: relative;
}
.h3{
    font-family: 'Source Sans Pro',sans-serif;
}
.collapse.in {
    display: block;
}
.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}
.col-md-3{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
.form-group {
    margin-bottom: 15px;
}
.label{
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
.form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de;
}
.@media screen and (max-width: 767px)
table-responsive{
    width: 100%;
    margin-bottom: 5px;
    overflow-y: hidden;
    border: 1px solid #ddd;
}
</style>
</head>
<body>

    <div class="box-body">
        <div class="alert alert-info">Fill any or all fields as per your need.</div>  
        <?php echo form_open('member/income_search') ?>
        <div class="row">
            <div class="col-sm-6">
                <label>Income Type</label>
                <select class="form-control" name="income_name">
                    <option selected>All</option>
                    <?php foreach ($income_name as $key => $val) {
                        echo '<option value="' . $key . '">' . $val . '</option>';
                    } ?>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Start Date</label>
                <input type="text" class="form-control datepicker" readonly id="startdate" name="startdate">
            </div>
            <div class="col-sm-6">
                <label>End Date</label>
                <input type="text" class="form-control datepicker" readonly id="enddate" name="enddate">
            </div>
            <div class="col-sm-12"><br/>
                <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
            </div>
        </div>
        <?php echo form_close() ?>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("earnings").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>