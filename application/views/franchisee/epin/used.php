<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Used By</th>
            <th>Used Date</th>
            <th>Type</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($epin as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['epin']; ?></td>
                <td><?php echo $e['amount']; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['used_by']; ?></td>
                <td><?php echo $e['used_time']; ?></td>
                <td><?php echo $e['type']; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
