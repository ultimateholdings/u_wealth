<?php
$top_id = $this->session->user_id;
$sdate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$edate  = $this->uri->segment('6') ? $this->uri->segment('6') : '';
if($top_id > 0)
{
$this->db->where('userid', htmlentities($top_id));
}
if ($sdate !== "") {
    $this->db->where('date >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('date <=', $edate);
}
$this->db->limit(100)->order_by('id','DESC');
$data = $this->db->get('tax_report')->result();
//print_r($data);die();
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-bordered table-info">
            <td style="border: 1px solid #80808042;">SN.</td>
            <td style="border: 1px solid #80808042;">User ID</td>
            <td style="border: 1px solid #80808042;">Name</td>
            <td style="border: 1px solid #80808042;">Amount</td>
            <td style="border: 1px solid #80808042;">Tax</td>
            <td style="border: 1px solid #80808042;">Tax (%)</td>
            <td style="border: 1px solid #80808042;">Date</td>
            <td style="border: 1px solid #80808042;">Details</td>
        </tr>
        <tbody>
        <?php
        $sn = count($data);
        if($result){
            foreach($result as $t){ ?>
               <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('ID_EXT') . $t['userid']; ?></td>
                <td><?php echo  $this->db_model->select('name', 'member', array('id' => $t['userid']));?>
                <td><?php echo config_item('currency') . $t['amount']; ?></td>
                <td><?php echo config_item('currency') . $t['tax_amount']; ?></td>
                <td><?php echo $t['tax_percnt'] ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($t['date'])); ?></td>
                <!--<td>

                    <a href="<?php echo site_url('income/tax-remove/' . $t['id']) ?>" class="btn btn-danger btn-xs"
                       onclick="return confirm('Are you sure want to delete this record ?')">Delete</a></td>-->
            </tr>
            <?php }
         }
        else if($data){
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                <td><?php echo  $this->db_model->select('name', 'member', array('id' => $e->userid));?>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo config_item('currency') . $e->tax_amount ?></td>
                <td><?php echo $e->tax_percnt ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td><?php if($e->transaction_id != '') {echo $e->transaction_id; } else {echo $e->payout_id;} ?></td>
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
        document.querySelector("#reports > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>