<?php
$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : '';
$sdate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$edate  = $this->uri->segment('6') ? $this->uri->segment('6') : '';
if($top_id > 0)
{
$this->db->where('userid', htmlentities($top_id));
}
if ($sdate !== "") {
    $this->db->where('CAST(date as DATE) >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('CAST(date as DATE) <=', $edate);
}
$this->db->where('payout_id !=', '');
$data = $this->db->get('tax_report')->result();
?>
<div class="table-responsive">
    <table class="table table-bordered table-striped" id="DTable" data-page-length='100' data-name="Tax_Report" data-export='Yes'>
        <thead>
            <tr>
            <th>SN.</th>
            <th>User ID</th>
            <th>Name</th>
            <?php if(config_item('enable_kyc')=='Yes'){ ?>
            <th>PAN/Tax no.</th>
            <?php } ?>
            <th>Payout (After Admin Fee)</th>
            <th>Tax Amount</th>
            <th>Tax (%)</th>
            <th class="datefilter">Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        if($result){
            foreach($result as $t){ ?>
               <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $t['userid']; ?></td>
                <td><?php echo  $this->db_model->select('name', 'member', array('id' => $t['userid']));?></td>
                <?php if(config_item('enable_kyc')=='Yes'){ ?>
                <td><?php echo  $this->db_model->select('tax_no', 'member_profile', array('userid' => $t['userid']));?></td>
                <?php } ?>
                <td><?php echo config_item('currency') . $t['amount']; ?></td>
                <td><?php echo config_item('currency') . $t['tax_amount']; ?></td>
                <td><?php echo $t['tax_percnt'] ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($t['date'])); ?></td>
            </tr>
            <?php }
         }
        else if($data){
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                <td><?php echo  $this->db_model->select('name', 'member', array('id' => $e->userid));?></td>
                <?php if(config_item('enable_kyc')=='Yes'){ ?>
                <td><?php echo  $this->db_model->select('tax_no', 'member_profile', array('userid' => $e->userid));?></td>
                <?php } ?>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo config_item('currency') . $e->tax_amount ?></td>
                <td><?php echo $e->tax_percnt ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
            </tr>
        <?php }
        } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("reports").classList.add('active');
        document.querySelector("#reports > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
