<?php

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');
$this->db->select('id, transfer_from, transfer_to, amount, time, remarks')->from('transfer_balance_records');
        // ->where('transfer_to', htmlentities($top_id))->or_where('transfer_from', htmlentities($top_id));
$this->db->order_by('id','DESC');
$data = $this->db->get()->result();
?>
<div class="table-responsive">
    <table class="table table-bordered" id="DTable" data-page-length='100' data-name="wallet_transaction_list" data-export='Yes'>
        <thead>
        <tr>
            <td>S.N.</td>
            <td>Transferred From</td>
            <td>Transferred To</td>
            <td>Amount</td>
            <td>Remarks</td>
            <td class="datefilter">Date</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->transfer_from ?></td>
                <td><?php echo config_item('ID_EXT') . $e->transfer_to ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->remarks ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)) ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("ewallet").classList.add('active');
        document.querySelector("#ewallet > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>