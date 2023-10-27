<?php

?> 
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-bordered table-info">
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">Product Name</th>
            <th style="border: 1px solid #80808042;">Price</th>
            <th style="border: 1px solid #80808042;">Qty</th>
            <th style="border: 1px solid #80808042;">Total Amount</th>
            <th style="border: 1px solid #80808042;">Order Date</th>
            <th style="border: 1px solid #80808042;">Delivery Date</th>
            <th style="display: none;">Sold By</th>
            <th style="border: 1px solid #80808042;">Status</th>
            <th style="border: 1px solid #80808042;">Details</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                 <td><?php echo $e->product_id > 0 ? $this->db_model->select('prod_name', 'product', array('id' => $e->product_id)) : $e->name ; 'Registration Purchase' ; ?></td>
                <td><?php echo config_item('currency') . $e->cost; ?></td>
                <td><?php echo $e->qty; ?></td>
                <td><?php echo $e->cost*$e->qty; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td><?php echo $e->deliver_date; ?></td>
                <td style="display: none;"><?php echo $e->franchisee_id; ?></td>
                <td><?php echo $e->status; ?></td>
                <td><?php echo $e->tid; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("cart").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
