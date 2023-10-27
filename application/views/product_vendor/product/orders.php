<?php

?>
<style>
.btn.btn-xs {
    font-size: 11px;
    padding: 3px 8px;
}
.table .btn {
    margin-left: 0;
    margin-right: 5px;
}
.btn {
    outline: 0 !important;
transition: box-shadow .28s cubic-bezier(.4,0,.2,1);
border-radius: 2px;
overflow: hidden;
position: relative;
margin: 0 5px 10px 0;
display: inline-block;
text-align: center;
white-space: nowrap;
vertical-align: middle;
touch-action: manipulation;
cursor: pointer;
user-select: none;
background-image: none;
}
.btn-primary {
    background-color: #4489e4;
    border-color: #4489e4;
    color: #fff;
}
.btn-success {
    background-color: #32c861 !important;
    border: 1px solid #32c861 !important;
}
.badge, .btn {
    font-weight: 600;
    text-transform: uppercase;
}
.alert, .badge, .btn, .btn-group > .btn, .btn.btn-link:hover, .icon-btn, .label, .note, .overview-panel, .panel {
    box-shadow: 0 1px 3px rgba(0,0,0,.1),0 1px 2px rgba(0,0,0,.18);
}
.pull-right {
    float: right !important;
}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
.modal-footer::before{
    display: table;
content: " ";
}

</style>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Product</th>
            <th>Price per product <?php echo config_item('currency'); ?></th>
            <th>Qty</th>
            <th>Total <?php echo config_item('currency'); ?></th>
            <th>Date</th>
            <th>Payment Method</th>
            <th>Shipping Address</th>
            <th>Billing Address</th>
            <th>Tracking details</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($orders as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid; ?></td>
                <td><?php echo $e->product_id > 0 ? $this->db_model->select('prod_name', 'product', array('id' => $e->product_id)) : $e->name ; ?></td>
                <td><?php echo  config_item('currency') . $e->cost; ?></td>
                <td><?php echo  $e->qty; ?></td>
                <td><?php echo  config_item('currency') . ($e->cost)*($e->qty);?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td><?php echo $e->payment; 
                if(($e->payment != "Ewallet") && ($e->payment !='Registration Purchase')){
                    echo "<br/><br/>Transaction ID:<br/>". $e->bank_trans_id;
                } ?></td>
                <td><?php $member_data = $this->db_model->select_multi('s_name, s_email, s_phone,s_city,s_state,s_zipcode, s_address', 'shipping_address', array('userid' => $e->userid));
                
                 echo "Name:". $member_data->s_name  . "<br/>";   
                 echo "Email:".$member_data->s_email . "<br/>";
                 echo "Phone:".$member_data->s_phone . "<br/>";
                 echo "Address:".$member_data->s_address . "<br/>";
                 echo "City:".$member_data->s_city . "<br/>";
                 echo "State:".$member_data->s_state . "<br/>";
                 echo "Zipcode:".$member_data->s_zipcode . "<br/>";
                  ?>
                </td>
                <td><?php $member_data = $this->db_model->select_multi('b_name, b_email, b_phone,b_city,b_state,b_zipcode, b_address', 'shipping_address', array('userid' => $e->userid));
                 echo "Name:". $member_data->b_name . "<br/>";   
                 echo "Email:".$member_data->b_email . "<br/>";
                 echo "Phone:".$member_data->b_phone . "<br/>";
                 echo "Address:".$member_data->b_address . "<br/>";
                 echo "City:".$member_data->b_city . "<br/>";
                 echo "State:".$member_data->b_state . "<br/>";
                 echo "Zipcode:".$member_data->b_zipcode . "<br/>"; ?>
                </td>
                 <td><?php echo $e->tid;?></td>
                 <!--   <?php if ($e->status !== "Completed") { 
                        if($e->status == 'Delivered') { ?>
                        <a data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a data-toggle="modal" data-target=""
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" disabled >MarK Delivered</a>
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                        <?php } else { ?>
                        <a data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Update Tracking</a> <br>
                        <a data-toggle="modal" data-target="#delivered_modal"
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Mark Delivered</a>
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a> <br>
                    <?php }} ?>-->
                <!--    <a href="<?php echo site_url('product/view_order/' . $e->id); ?>"
                       class="btn btn-success btn-xs">View</a>
                    <?php if($e->product_id > 0) { ?>
                    <a onclick="return confirm('Are you sure you want to delete this Order ?')"
                       href="<?php echo site_url('product/remove_order/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>-->
                <td>
                    <a data-toggle="modal" data-target="#shipped_modal"
                           onclick="document.getElementById('shippedid').value='<?php echo $e->id ?>'"

                           class="btn btn-primary btn-xs" >Update Consignment Number
                    </a> <br>
                           <a data-toggle="modal" data-target="#delivered_modal"
                           onclick="document.getElementById('mark_deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs" >Mark Delivered</a>

                    <a href="<?php echo site_url('vendor/view_order/' . $e->id); ?>" class="btn btn-success btn-xs">View</a>
                    <a style="display:none;" onclick="return confirm('Are you sure you want to delete this order ?')"
                       href="<?php echo site_url('vendor/remove_order/' . $e->id); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<div class="modal fade" id="shipped_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Shipping Details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('vendor/shipped') ?>
                <label>Enter Shipping Detail (eg: Tracking No/ Consignment No.)</label>
                <input type="hidden" name="shippedid" id="shippedid">
                <textarea class="form-control" name="sdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success" style="background-color: #32c861 !important;
border: 1px solid #32c861 !important;">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delivered_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delivery Details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('vendor/mark_delivered') ?>
                <label>Enter Delivery Details (eg: Tracking No)</label>
                <input type="hidden" name="mark_deliverid" id="mark_deliverid">
                <textarea class="form-control" name="sdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('product/deliver') ?>
                <label>Enter Notes : </label>
                <input type="hidden" name="deliverid" value="" id="deliverid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Mark Complete</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>-->
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(6) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>