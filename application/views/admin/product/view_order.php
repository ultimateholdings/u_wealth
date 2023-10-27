<?php

?>
<div class="table-responsive">
    <table class="table table-stripe">
        <tr style="font-weight: bold">
            <td>Product Name</td>
            <td>Qty</td>
            <td>Order Date</td>
            <td>Status</td>
            <td>Total Cost (<?php echo config_item('currency'); ?>)</td>
        </tr>
        <tr>
            <td><?php echo $orders->name; ?></td>
            <td><?php echo $orders->qty ?></td>
            <td><?php echo $orders->date ?></td>
            <td><?php echo $orders->status ?></td>
            <td><?php echo $orders->cost*$orders->qty ?></td>
        </tr>
    </table>
</div>
<a href="javascript:history.back()" class="btn btn-xs btn-danger">Go Back</a>