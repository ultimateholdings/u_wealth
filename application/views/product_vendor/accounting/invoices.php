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
.col-sm-6{
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
button, html input[type="button"], input[type="reset"], input[type="submit"] {
    -webkit-appearance: button;
    cursor: pointer;
}
.btn {
    outline: 0 !important;
    font-size: 12px;
    transition: box-shadow .28s cubic-bezier(.4,0,.2,1);
    border-radius: 2px;
    overflow: hidden;
    position: relative;
    padding: 8px 14px 7px;
    margin: 0 5px 10px 0;
}
.btn-success {
    background-color: #32c861 !important;
    border: 1px solid #32c861 !important;
    color: #fff;
}
.badge, .btn {
    font-weight: 600;
    text-transform: uppercase;
}
.btn {
    display: inline-block;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    touch-action: manipulation;
    user-select: none;
    background-image: none;
}
.nav-pills, .nav-tabs {
    margin-bottom: 10px;
}
.nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav {
    padding-left: 0;
    list-style: none;
}
ol, ul {
    margin-top: 0;
    }
.row::after, .row::before {
    display: table;
    content: " ";
}
.nav-tabs > li {
    float: left;
    margin-bottom: -1px;
}
.nav > li {
    position: relative;
    display: block;
}
.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
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
  <?php echo form_open('vendor/search_invoice') ?>
  <div id="collapseFilter" class="panel-collapse active collapse  in " aria-expanded="true">
    <div class="box-body">
      <div class="form-gro0up">
        <div class="col-md-3">
            <label>Date Start</label>
            <input type="text" class="form-control datepicker" readonly id="date-start" name="sdate">
        </div>
        <div class="col-md-3">
            <label>Date End</label>
            <input class="form-control datepicker" readonly name="edate" type="text">
        </div>
        <div class="col-md-3">
            <label>User ID</label>
            <input class="form-control" name="userid" type="text">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-6"><br/>
          <input type="submit" class="btn btn-success" value="Search" onclick="this.value='Searching..'">
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close() ?>
  </div>
  <div class="row">
    <div class="col-md-12">
       <!-- Custom Tabs -->
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active">
              <a href="#member_list_tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-cubes" aria-hidden="true"></i> All Invoices</a>
          </li>
        </ul>
      </div>     
      <div class="row" style="display: none;">
        <a href="javascript:;" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-lg pull-right"><i class="fa fa-print"></i>
          Create Invoice</a>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered table-striped ajax_view table-text-center" id="product_table">
              <thead>
                <tr>
                  <th><input type="checkbox" id="select-all-row"></th>
                  <th>Invoice Name</th>
                  <th>User ID</th>
                  <th>Total Amt</th>
                  <th>Paid Amt</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <?php
              $sn = 1;
              foreach ($invoice as $e) { ?>
                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $e->invoice_name; ?></td>
                  <td><?php echo config_item('ID_EXT') . $e->userid; ?></td>
                  <td><?php echo config_item('currency') . $e->total_amt; ?></td>
                  <td><?php echo config_item('currency') . $e->paid_amt; ?></td>
                  <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                  <td>
                    <a target="_blank" href="<?php echo site_url('vendor/invoice_view/' . $e->id); ?>" class="btn btn-info btn-xs">Print</a>
                      <?php if ($e->total_amt - $e->paid_amt > 0) { ?>
                        <a href="javascript:;" data-toggle="modal" onclick="document.getElementById('id').value='<?php echo $e->id ?>'" data-target="#addFund" class="btn btn-success btn-xs">Add
                        Balance</a>
                      <?php } ?>
                      <a onclick="return confirm('Are you sure you want to delete this Invoice ?')"
                        href="<?php echo site_url('accounting/remove_invoice/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                  </td>
                </tr>
              <?php } ?>
            </table>
          </div>                    
        </div>
      </div>
    </div>
  </div>
  </div>
          
  <div class="pull-right">
      <?php echo $this->pagination->create_links(); ?>
  </div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create a New Invoice</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('Vendor/add-invoice') ?>
          <div class="row">
              <div class="form-group col-sm-6">
                  <label>Invoice Name *</label>
                  <input required type="text" name="invoice_name" class="form-control">
              </div>
              <div class="form-group col-sm-6">
                  <label>User Id/Franchisee Id (Optional)</label>
                  <input type="text" name="user_id" class="form-control">
              </div>
              <div class="form-group col-sm-6">
                  <label>Invoice Date *</label>
                  <input type="text" readonly value="<?php echo date('Y-m-d') ?>" name="invoice_date" class="form-control datepicker">
              </div>
              <div class="form-group col-sm-6">
                  <label>User Type</label>
                  <select name="user_type" class="form-control">
                      <option>Franchisee</option>
                      <option>Member</option>
                      <option selected>Other</option>
                  </select>
              </div>
              <div class="form-group col-sm-6">
                  <label>Company Address *</label>
                  <textarea class="form-control" name="company_add">
                  <?php echo config_item('company_address') ?>
                  </textarea>
              </div>
              <div class="form-group col-sm-6">
                  <label>Billing Address *</label>
                  <textarea class="form-control" name="bill_add">
                      Name:
                      Address:
                      Phone:</textarea>
              </div>
              <div class="form-group col-sm-6">
                  <label>Total Amount (in <?php echo config_item('currency') ?>) *</label>
                  <input required type="text" class="form-control" name="total_amt">
              </div>
              <div class="form-group col-sm-6">
                  <label>Paid Amount (in <?php echo config_item('currency') ?>) *</label>
                  <input required type="text" class="form-control" name="paid_amt">
              </div>
          </div>
          <input type="hidden" id="dup" value="1">
          <div class="row">
              <div class="col-sm-4">
                  <label>Item Name *</label>
                  <input required type="text" class="form-control" name="item_name[]">
              </div>
              <div class="col-sm-3">
                  <label>Price (in <?php echo config_item('currency') ?>)*</label>
                  <input required type="text" class="form-control" name="item_price[]">
              </div>
              <div class="col-sm-2">
                  <label>Qty*</label>
                  <input required type="text" class="form-control" value="1" name="item_qty[]">
              </div>
              <div class="col-sm-3">
                  <label>Tax (eg: GST)(in <?php echo config_item('currency') ?>)</label>
                  <input type="text" class="form-control" name="item_tax[]">
              </div>
          </div>
          <div id="res"></div>
            <div><a href="javascript:;" onclick="add_item()" class="btn btn-xs btn-success">Add Item +</a>
            </div>
            <button type="submit" class="btn btn-primary">Create &rarr;</button>
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
          <h4 class="modal-title">Add Balance to Invoice</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('vendor/invoice_add_fund') ?>
          <div class="row">
            <div class="form-group col-sm-6">
              <input type="hidden" name="id" id="id" value="">
              <label>Amount to Add *</label>
              <input required type="text" name="paid_amt" class="form-control">
            </div>
            <div class="form-group col-sm-6"><br/>
              <button type="submit" class="btn btn-primary">Add Fund &rarr;</button>
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
</section>
<script type="text/javascript">
    function add_item() {
        var rand = parseInt($('#dup').val()) + 1;
        $('#dup').val(rand);
        var data = '<div class="row" id="' + rand + '">\n' +
            '                    <div class="col-sm-4">\n' +
            '                        <label>Item Name *</label>\n' +
            '                        <input required type="text" class="form-control" name="item_name[]">\n' +
            '                    </div>\n' +
            '                    <div class="col-sm-3">\n' +
            '                        <label>Item Price*</label>\n' +
            '                        <input required type="text" class="form-control" name="item_price[]">\n' +
            '                    </div>\n'+
            '                    <div class="col-sm-2">\n' +
            '                        <label>Item Qty*</label>\n' +
            '                        <input required type="text" class="form-control" value="1" name="item_qty[]">\n' +
            '                    </div>\n' +
            '                    <div class="col-sm-3">\n' +
            '                        <label>Tax (eg: GST)(in <?php echo config_item('currency') ?>)</label>\n' +
            '                        <input type="text" class="form-control" name="item_tax[]">\n' +
            '                    </div>\n' +
            '<div>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="remove_item(\'#' + rand + '\')" class="btn btn-xs btn-danger">Remove </a>' +
            '</div>' +
            '                </div>';
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
    document.querySelector("#accounting > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
});
</script>
</body>
</html>