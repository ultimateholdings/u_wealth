<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Level</th>
            <th>Amount</th>
            <th>Receiver Id</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) {
            $detail = $this->db_model->select_multi('name,phone', 'member', array('id' => $e->receiver_id));
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td>
                    Stage <?php echo $this->db_model->select('donation_level', 'donation_package', array('id' => $e->donation_pack)); ?></td>
                <td><?php echo config_item('currency') . $e->donation_amount; ?></td>
                <td><?php echo $detail->name . '<br/>' . $detail->phone ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)); ?></td>
                <td style="font-weight: bold; color: #0d638f"><?php echo $e->status; ?></td>
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
        document.getElementById("donations").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>