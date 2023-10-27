<?php
$this->db->select('*')->order_by('id', 'ASC');
$products = $this->db->get('product')->result_array();
?>
<div class="row" style="display: none;">
  <a href="javascript:;" data-toggle="modal" data-target="#add_invoice" class="btn btn-danger btn-lg pull-right"><i class="fa fa-print"></i>
      Create Invoice</a>
</div>
    <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
        <table class="table table-bordered table-striped mt-1" id="DTable" data-page-length='100' data-name="Invoice_list" data-export='No'>
            <thead>
                <tr>
                    <th>SN.</th>
                    <th>Invoice Name</th>
                    <th>User ID</th>
                    <th>Total Amt</th>
                    <th>Paid Amt</th>
                    <th class="datefilter">Date</th>
                    <th class="noExport">Actions</th>
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
                        <a target="_blank" href="<?php echo site_url('accounting/invoice_view/' . $e->id); ?>" class="btn btn-info btn-sm">Print</a>
                        <?php if ($e->total_amt - $e->paid_amt > 0) { ?>
                            <a href="javascript:;" data-toggle="modal" onclick="document.getElementById('id').value='<?php echo $e->id ?>'" data-target="#addFund" class="btn btn-success btn-xs">Add
                                Balance</a>
                        <?php } ?>
                        <a onclick="return confirm('Are you sure you want to delete this Invoice ?')"
                           href="<?php echo site_url('accounting/remove_invoice/' . $e->id); ?>" class="btn btn-danger btn-sm">Delete</a>
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
    
    <div class="modal fade" id="add_invoice" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create a New Invoice</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open('emart/create_order') ?>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Invoice Date *</label>
                            <input type="text" readonly value="<?php echo date('Y-m-d') ?>" name="invoice_date" class="form-control datepicker">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>User Id</label>
                            <input type="number" name="user_id" class="form-control" onchange="get_user_name('#user_id', '#user_id_res')" id="user_id" required>
                            <span id="user_id_res" style="color: red; font-weight: bold"></span>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Payment Mode</label>
                            <select name="pay_mode" class="form-control" required>
                                <option value="">Select Mode</option>
                                <option value="Ewallet">Deduct from Member Ewallet</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>
                        <?php if(config_item('enable_franchisee')=='Yes'){ ?>
                        <div class="form-group col-sm-6">
                            <label>User Type</label>
                            <select name="user_type" class="form-control">
                                <option selected>Member</option>
                                <option>Franchisee</option>
                            </select>
                        </div>
                        <?php } ?>
                    </div>
                    <div>&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Item Name *</label>
                            <select class="form-control" name="prod_id" id="prod_id" required>
                                <option value="">Select a Product</option>
                                <?php foreach ($products as $pd) {
                                    echo "<option value=".$pd['id'].">".$pd['prod_name']."</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Price Inc. Tax</label>
                            <input type="text" class="form-control" name="item_price" id="item_price" required>
                        </div>
                        <div class="col-sm-2">
                            <label>Qty*</label>
                            <input type="number" min="0" class="form-control" value="1" name="item_qty" id="item_qty" required>
                        </div>
                        <div class="col-sm-3">
                            <label>Total Amount</label>
                            <input type="text" class="form-control" name="total_cost" id="total_cost" disabled>
                        </div>
                        <div class="col-sm-1" style="display: none;">
                            <label></label>
                            <a href="javascript:;" onclick="add_item()" class="btn btn-white bg-white"><i class="fa fa-plus-circle text-primary fa-lg" style="font-size: 28px;"></i>
                            </a>
                        </div>
                        <div>&nbsp;</div>
                        <div class="col-sm-12">
                            <label>Sale Note</label>
                            <textarea class="form-control" name="sale_note" id="sale_note"> </textarea>
                        </div>
                        <div id="res"></div>
                    </div>
                    <div>&nbsp;</div>
                    <div class="modal-footer" style="border-top: 2px solid #efefef;">
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 0px;">Create &rarr;</button>    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close() ?>
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
                    <?php echo form_open('accounting/invoice_add_fund') ?>
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
        $(document).ready(function(){
            $('#prod_id').change(function(){
              if(this.value >= '1')
              {
                $.get("<?php echo site_url('site/get_product_price/') ?>" + this.value, function (data) {
                    $('#item_price').val(data);
                    var qty = $('#item_qty').val();
                    $('#total_cost').val(qty*data);
                });
               }
              else{
                $('#item_price').val('');
                $('#total_cost').val('');
              }
            });

            $('#item_qty').change(function(){
              if(this.value >= '1')
              {
                var price = $('#item_price').val(); 
                var qty = $('#item_qty').val();
                $('#total_cost').val(qty*price);
               }
              else{
                $('#total_cost').val('0');
              }
            });

            $('#item_price').change(function(){
              if(this.value >= '1')
              {
                var price = $('#item_price').val(); 
                var qty = $('#item_qty').val();
                $('#total_cost').val(qty*price);
               }
              else{
                $('#total_cost').val('0');
              }
            });


          });


        function add_item() {
            var rand = parseInt($('#dup').val()) + 1;
            $('#dup').val(rand);
            var data = '<div id="' + rand + '">\n' +
                '                    <div class="col-sm-4">\n' +
                '                        <label>Item Name *</label>\n' +
                '                        <input required type="text" class="form-control" name="item_name[]">\n' +
                '                    </div>\n' +
                '                    <div class="col-sm-3">\n' +
                '                        <label>Price Inc. Tax</label>\n' +
                '                        <input required type="text" class="form-control" name="item_price[]">\n' +
                '                    </div>\n'+
                '                    <div class="col-sm-2">\n' +
                '                        <label>Item Qty*</label>\n' +
                '                        <input required type="text" class="form-control" value="1" name="item_qty[]">\n' +
                '                    </div>\n' +
                '                    <input type="hidden" class="form-control" name="item_tax[]">\n' +
                '                    <div class="col-sm-2">\n' +
                '                        <label>Sub Total</label>\n' +
                '                        <input type="text" class="form-control" name="item_subtotal[]">\n' +
                '                    </div>\n' +
                '<div class="col-sm-1"><label></label><a href="javascript:;" onclick="remove_item(\'#' + rand + '\')" class="btn btn-white bg-white"><i class="fa fa-plus-circle text-danger fa-lg" style="font-size: 28px;"></i> </a>' +
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
