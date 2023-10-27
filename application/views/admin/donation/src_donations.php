<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Level</th>
            <th>Sender Id</th>
            <th>Receiver Id</th>
            <th>Donation Amount</th>
            <th>Date</th>
            <th>Status</th>
            <th>Trnx Detail</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td>
                    Stage <?php echo $this->db_model->select('donation_level', 'donation_package', array('id' => $e->donation_pack)); ?></td>
                <td><?php echo $e->sender_id; ?></td>
                <td><?php echo $e->receiver_id; ?></td>
                <td><?php echo config_item('currency') . $e->donation_amount; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)); ?></td>
                <td><?php echo $e->status; ?></td>
                <td><?php echo $e->trid; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>