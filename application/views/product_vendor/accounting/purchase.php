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
            <?php echo form_open('vendor/search_purchase') ?>
            <label>Date Start</label>
            <input class="form-control datepicker" readonly name="sdate" type="text">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>Date End</label>
            <input class="form-control datepicker" readonly name="edate" type="text">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <label>Bill No</label>
            <input class="form-control" name="billno" type="text">
            </div>
        </div>
        <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
        </div>
    </div>
</div>
</div>
</div>
    <?php echo form_close() ?>
    <div class="row">
        <div class="col-md-12">
           <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                    <a href="#member_list_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> All Purchases</a>
                    </li>
                </ul>
<div class="row">
    <a href="javascript:;" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg pull-right"><i class="fa fa-chrome"></i>
        Add Purchase</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th><input type="checkbox" id="select-all-row"></th>
            <th>Supplier Name</th>
            <th>Bill No</th>
            <th>Total Amt</th>
            <th>Paid Amt</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <?php
        $sn = 1;
        foreach ($bills as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->supplier; ?></td>
                <td><?php echo $e->bill_no; ?></td>
                <td><?php echo config_item('currency') . $e->bill_amt; ?></td>
                <td><?php echo config_item('currency') . $e->paid_amt; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td>
                    <a href="<?php echo site_url('vendor/purchase_view/' . $e->id); ?>" class="btn btn-info btn-xs">View</a>
                    <?php if ($e->bill_amt - $e->paid_amt > 0) { ?>
                        <a href="javascript:;" data-toggle="modal" onclick="document.getElementById('id').value='<?php echo $e->id ?>'" data-target="#addFund" class="btn btn-success btn-xs">Pay
                            Balance</a>
                    <?php } ?>
                    <a onclick="return confirm('Are you sure you want to delete this Bill ?')"
                       href="<?php echo site_url('vendor/remove_purchase/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Make New Purchase Entry</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('vendor/add-purchase') ?>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Supplier Bill No *</label>
                        <input required type="text" name="bill_no" class="form-control">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Bill Date *</label>
                        <input type="text" readonly value="<?php echo date('Y-m-d') ?>" name="date" class="form-control datepicker">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Total Amount (in <?php echo config_item('currency') ?>) *</label>
                        <input required type="text" class="form-control" name="bill_amt">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Paid Amount (in <?php echo config_item('currency') ?>) *</label>
                        <input required type="text" class="form-control" name="paid_amt">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Supplier Name *</label>
                        <input required type="text" class="form-control" name="supplier">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Bill Copy (optional)</label>
                        <input type="file" name="copy">
                    </div>
                </div>
                <input type="hidden" id="dup" value="1">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Item Name *</label>
                        <input required type="text" class="form-control" name="item_name[]">
                    </div>
                    <div class="col-sm-4">
                        <label>Item Price (in <?php echo config_item('currency') ?>)*</label>
                        <input required type="text" class="form-control" name="item_price[]">
                    </div>
                    <div class="col-sm-4">
                        <br/>
                        <a href="javascript:;" onclick="add_item()" class="btn btn-xs btn-success">Add
                            Item +</a>
                    </div>
                </div>
                <div id="res"></div>
                <br/>
                <button type="submit" class="btn btn-primary">Add Purchase</button>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addFund" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pay Balance for Bill</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('vendor/bill_add_fund') ?>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <input type="hidden" name="id" id="id" value="">
                        <label>Amount to Pay *</label>
                        <input required type="text" name="paid_amt" class="form-control">
                    </div>
                    <div class="form-group col-sm-6"><br/>
                        <button type="submit" class="btn btn-primary">Pay Balance &rarr;</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section>
    <script type="text/javascript">
        function add_item() {
            var rand = parseInt($('#dup').val()) + 1;
            $('#dup').val(rand);
            var data = '<div id="' + rand + '" class="row">\n' +
                '                        <div class="col-sm-4">\n' +
                '                            <label>Item Name *</label>\n' +
                '                            <input required type="text" class="form-control" name="item_name[]">\n' +
                '                        </div>\n' +
                '                        <div class="col-sm-4">\n' +
                '                            <label>Item Price (in <?php echo config_item('currency') ?>)*</label>\n' + '                            <input required type="text" class="form-control" name="item_price[]">\n' + '                        </div>\n' + '                        <div class="col-sm-4">\n' + '                            <br/>\n' + '                            <a href="javascript:;" onclick="remove_item(\'#' + rand + '\')" class="btn btn-xs btn-danger">Remove\n' + '                                Item</a>\n' + '                        </div>\n' + '                    </div>';
            $('#res').append(data);
        }

        function remove_item(id) {
            $(id).remove();
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("accounting").classList.add('active');
        document.querySelector("#accounting > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>