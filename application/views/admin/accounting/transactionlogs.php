<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>User / Fran Id</th>
            <th>Gateway</th>
            <th>Transaction Id</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->userid; ?></td>
                <td><?php echo $e->gateway; ?></td>
                <td><?php echo $e->transaction_id; ?></td>
                <td><?php echo config_item('currency') . $e->amount; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)); ?></td>
                <td>
                    <a onclick="return confirm('Are you sure you want to delete this Record ?')"
                       href="<?php echo site_url('accounting/remove_tlog/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
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
        document.getElementById("accounting").classList.add('active');
        document.querySelector("#accounting > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
