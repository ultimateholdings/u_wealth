<?php

$top_id = $this->session->user_id;
$this->db->select('*')->from('transfer_balance_records')
         ->where('transfer_to', htmlentities($top_id))->or_where('transfer_from', htmlentities($top_id));
$data = $this->db->get()->result();
?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-info table-bordered" style="border-bottom: 2px solid white;">
            <td style="border: 1px solid #80808042;">S.N.</td>
            <td style="border: 1px solid #80808042;">Transferred From</td>
            <td style="border: 1px solid #80808042;">Transferred To </td>
            <td style="border: 1px solid #80808042;">Amount</td>
            <td style="border: 1px solid #80808042;">Date</td>
            <td style="border: 1px solid #80808042;">Remarks</td>
        </tr>
        <tbody>
        <?php
        $sn = 1;
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->transfer_from ?></td>
                <td><?php echo config_item('ID_EXT'). $e->transfer_to ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)); ?></td>
                <td><?php echo $e->remarks ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("reports").classList.add('active');
        document.querySelector("#reports > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
