<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Service Type</th>
            <th>Recharge No</th>
            <th>Amount</th>
            <th>Operator</th>
            <th>TID</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($rcg as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->service_type; ?></td>
                <td><?php echo $e->recharge_no; ?></td>
                <td><?php echo $e->amount; ?></td>
                <td><?php echo $e->operator; ?></td>
                <td><?php echo $e->trnid; ?></td>
                <td><?php echo $e->status; ?></td>
                <td><?php echo date("Y-m-d h:i A",$e->time); ?></td>
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
        document.getElementById("recharge").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>