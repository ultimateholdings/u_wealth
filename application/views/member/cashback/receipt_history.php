<?php
$this->db->where(array('userid'=>$this->session->user_id));
$data = $this->db->get('my_purchase')->result();
?>

<hr/>
<div class="table-responsive">
    <table class="table table-bordered" id="DTable" data-page-length='100' data-name="Pending_bank_payment_list" data-export='Yes'>
        <thead>
        <tr style="font-weight: bold; font-size: 14px;">
            <th>S.N.</th>
            <th>User ID</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Invoice</th>
            <th>Note</th>
            <th>Status</th>
            <td class="datefilter">Date</td>
        </tr>
        </thead>
        <tbody style="font-size: 14px;">
        <?php
        $sn = 1;
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->userid ?></td>
                <td><?php echo $e->amount ?></td>
                <td><?php echo $e->description ?></td>
                <td><a href="<?php echo base_url('uploads/ads/') . $e->invoice ?>" target="_blank"><span class="badge bg-warning">Invoice</span></a></td>
                <td><?php echo $e->note ?> </td>
                <td><?php echo $e->status ?></td>
                <td><?php echo $e->date ?></td>               
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("Purchase").classList.add('active');
        document.querySelector("#Purchase > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>