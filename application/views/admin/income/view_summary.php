<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Earnings</th>
            <th>Deductions</th>
            <th>Wallet - Fund Received</th>
            <th>Wallet - Fund Sent</th>
            <th>Wallet - Topup</th>
            <th>Epin Generated</th>
            <th>Payout Received</th>
            <th>Payout Pending</th>
            <th>Wallet Balance</th>
            <th>Net</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($members as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['id']) ?>"
                       target="_blank"><?php echo config_item('ID_EXT') . $e['id']; ?></a></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo config_item('currency') . $e['earning']; ?></td>
                <td><?php echo config_item('currency') . $e['deductions']; ?></td>
                <td><?php echo config_item('currency') . $e['received'] ?></td>
                <td><?php echo config_item('currency') . $e['sent'] ?></td>
                <td><?php echo config_item('currency') . $e['topup'] ?></td>
                <td><?php echo config_item('currency') . $e['epin_amount'] ?></td>
                <td><?php echo config_item('currency') . $e['paid'] ?></td>
                <td><?php echo config_item('currency') . $e['pending'] ?></td>
                <td><?php echo $e['balance']; ?></td>
                <td><?php echo $e['diff']; ?></td>
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
        document.getElementById("earningpay").classList.add('active');
        document.querySelector("#earningpay > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>