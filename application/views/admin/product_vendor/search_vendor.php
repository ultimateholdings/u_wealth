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
<section class="content">
<div class="row">
    <?php echo form_open('Manage_vendor/search') ?>
        <div class="col-md-12">
            <div class="box  box-primary " id="accordion">
                <div class="box-header with-border" style="cursor: pointer;">
                <h3 class="box-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFilter">
                <i class="fa fa-filter" aria-hidden="true"></i>  Filters
                </a>
                </h3>
                </div>
             </div>
<div id="collapseFilter" class="panel-collapse active collapse  in " aria-expanded="true">
    <div class="box-body">
        <div class="col-md-3">
            <div class="form-group">
                <label>Vendor ID</label>
                <input type="text" class="form-control" id="vendor_id" name="vendor_id">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Vendor Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Phone No</label>
               <input type="text" class="form-control" id="phone" name="phone">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Email ID</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>
        
        
        
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">

        <a href="<?php echo site_url('admin') ?>" class="btn btn-danger">&larr; Go Back</a>
    </div>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
           <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            <li class="active">
            <a href="#member_list_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> All Vendors</a>
            </li>
            </ul>
        </div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view table-text-center" id="product_table">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all-row"></th>
                    <th>Vendor ID</th>
                    <th>Vendor Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zipcode</th>
                    <th>Actions</th>
                </tr>
            </thead>
            </table>
        </div>                    
    </div>
</div>
    </div>
</div>
<!-- /.content -->
    </div>
  </div>
</div>  
</section>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("vendors").classList.add('active');
        document.querySelector("#vendors > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
</body>
</html>

