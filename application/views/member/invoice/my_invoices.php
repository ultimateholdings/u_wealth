<?php

?>
<div class="table-responsive">
    <table class="table table-info table-striped table-bordered">
        <tr>
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">Invoice Name</th>
            <th style="border: 1px solid #80808042;">Total Amt</th>
            <th style="border: 1px solid #80808042;">Paid Amt</th>
            <th style="border: 1px solid #80808042;">Date</th>
            <th style="border: 1px solid #80808042;">Actions</th>
        </tr>
        <?php
        $sn = count($invoice);
        foreach ($invoice as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo $e->invoice_name; ?></td>
                <td><?php echo config_item('currency') . $e->total_amt; ?></td>
                <td><?php echo config_item('currency') . $e->paid_amt; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td>
                    <a target="_blank" href="<?php echo site_url('member/invoice_view/' . $e->id); ?>" class="btn btn-info btn-xs">Print</a>
                </td>
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
        document.getElementById("invoice").classList.add('active');
    });
</script>