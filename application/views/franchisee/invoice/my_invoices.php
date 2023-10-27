<?php
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Invoice Name</th>
            <th>Total Amt</th>
            <th>Paid Amt</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($invoice as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->invoice_name; ?></td>
                <td><?php echo config_item('currency') . $e->total_amt; ?></td>
                <td><?php echo config_item('currency') . $e->paid_amt; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td>
                    <a target="_blank" href="<?php echo site_url('franchisee/invoice_view/' . $e->id); ?>" class="btn btn-info btn-xs">Print</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
