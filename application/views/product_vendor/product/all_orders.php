<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Product</th>
            <th>Cost</th>
            <th>Date</th>
            <th>#</th>
        </tr>
        <?php
        $sn = count($orders);
        foreach ($orders as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid; ?></td>
                <td><?php echo $e->product_id > 0 ? $this->db_model->select('prod_name', 'product', array('id' => $e->product_id)) : $e->name ; ?></td>
                <td><?php echo config_item('currency') . $e->cost*$e->qty; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td>
                <!--    <?php if ($e->status !== "Completed") { ?>
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('deliverid').value='<?php echo $e->id ?>'"
                           class="btn btn-primary btn-xs">Mark Completed</a><br>
                    <?php } ?>-->
                    <a href="<?php echo site_url('vendor/view_order/' . $e->id); ?>"
                       class="btn btn-success btn-xs">View</a>
                    <!--<a onclick="return confirm('Are you sure you want to delete this Order ?')"
                       href="<?php echo site_url('vendor/remove_order/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>-->
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<!--<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delivery Detail</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('vendor/deliver') ?>
                <label>Enter Delivery Detail (eg: Tracking No)</label>
                <input type="hidden" name="deliverid" value="" id="deliverid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Deliver Now</button>
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
        document.querySelector("#prodservices > ul > li:nth-child(9) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>