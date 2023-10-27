<?php
$top_id = $this->session->user_id;
$status = $this->uri->segment('3') ? $this->uri->segment('3') : '';
$sdate  = $this->uri->segment('4') ? $this->uri->segment('4') : '';
$edate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$this->db->where('userid', htmlentities($top_id));
if ($status !== "") {
    $this->db->where('status', $status);
}
if ($sdate !== "") {
    $this->db->where('date >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('date <=', $edate);
}

$data = $this->db->get('withdraw_request')->result();
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-bordered table-info">
            <td style="border: 1px solid #80808042;">SN.</td>
            <td style="border: 1px solid #80808042;">User ID</td>
            <td style="border: 1px solid #80808042;">Amount</td>
            <td style="border: 1px solid #80808042;">Admin Fee </td>
            <td style="border: 1px solid #80808042;">Tax</td>
            <td style="border: 1px solid #80808042;">Net Amount</td>
            <td style="border: 1px solid #80808042;">Date</td>
            <td style="border: 1px solid #80808042;">Mode</td>
            <td style="border: 1px solid #80808042;">Detail</td>
            <td style="border: 1px solid #80808042;">Status</td>
            <td style="border: 1px solid #80808042;">Transaction Detail</td>
        </tr>
        <?php $sn = 1;
        if($data){
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT'). $e->userid ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <?php 
                    $admin_charge=$e->amount*($e->admin_charge/100);
                ?>
                <td><?php echo $admin_charge ?></td>
                <?php 
                    $tax=$e->amount*($e->tax/100);
                ?>
                <td><?php echo $tax ?></td>
                <td><?php echo config_item('currency') . $e->net_paid ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td><?php echo $e->mode; ?></td>
                <td style="font-size:12px;">
                    <?php
                    $data = $this->db_model->select_multi('bank_ac_no, bank_name, bank_ifsc, bank_branch, btc_address, tcc_address, googlepay_no, phonepay_no, upi_id,status', 'member_profile', array('userid' => $e->userid));
                    if($e->mode=="bank")
                    {
                     echo '<strong>Name:&nbsp;</strong> ' . $this->db_model->select('name', 'member', array('id' => $e->userid)) . "<br/>";
                     if(config_item('enable_kyc')=='Yes'){
                     echo $data->status == 'completed' ? '<strong>KYC:&nbsp;</strong><span style="color:green">Compliance</span><br/>' : '<strong>KYC:&nbsp;</strong><span style="color:red">Non Compliance</span><br/>';
                     echo '<strong>PAN:&nbsp;</strong> ' . $this->db_model->select('tax_no', 'member_profile', array('userid' => $e->userid)) . "<br/>";
                    }
                     echo $data->bank_name ? '<strong>Bank Name:</strong> ' . $data->bank_name . '<br/>' : '';
                     echo $data->bank_ac_no ? '<strong>A/C No:</strong> ' . $data->bank_ac_no . '<br/>' : '';
                     echo $data->bank_ifsc ? '<strong>IFSC:</strong> ' . $data->bank_ifsc . '<br/>' : '';
                     echo $data->bank_branch ? '<strong>Bank Branch:</strong> ' . $data->bank_branch . '<br/>' : '';
                     echo $data->upi_id ? '<strong>UPI ID:</strong> ' . $data->upi_id . '<br/>' : '';
                     echo $data->googlepay_no ? '<strong>GooglePay:</strong> ' . $data->googlepay_no . '<br/>' : '';
                     echo $data->phonepay_no ? '<strong>PhonePe:</strong> ' . $data->phonepay_no . '<br/>' : '';
                    }
                    elseif($e->mode=="bitcoin"){
                     echo trim($data->btc_address) != '' ? '<strong>BTC Add:</strong> ' . $data->btc_address . '<br/>' : '';
                    }
                    ?>
                </td>
                <td><?php echo $e->status ?></td>
                <td><?php echo $e->tid ?></td>
            </tr>
        <?php } 
        }
        else{
         if($withdraw){
            foreach($withdraw as $w){ ?>
            <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $w['userid']; ?></td>
            <td><?php echo config_item('currency') . $w['amount']; ?></td>
            <td><?php echo $w['admin_charge']; ?></td>
            <td><?php echo $w['tax']; ?></td>
            <td><?php echo config_item('currency') . floor($w['net_paid']); ?></td>
            <td><?php echo date('Y-m-d', strtotime($w['date'])); ?></td>
            <td style="font-size:12px;">
                <?php
                echo '<strong>Name:</strong> ' . $this->db_model->select('name', 'member', array('id' => $w['userid'])) . "<br/>";
                $data = $this->db_model->select_multi('bank_ac_no, bank_name, bank_ifsc, bank_branch, btc_address, tcc_address', 'member_profile', array('userid' => $w['userid']));
                echo $data->bank_name ? '<strong>Bank Name:</strong> ' . $data->bank_name . '<br/>' : '';
                echo $data->bank_ac_no ? '<strong>A/C No:</strong> ' . $data->bank_ac_no . '<br/>' : '';
                echo $data->bank_ifsc ? '<strong>IFSC:</strong> ' . $data->bank_ifsc . '<br/>' : '';
                echo $data->bank_branch ? '<strong>Bank Branch:</strong> ' . $data->bank_branch . '<br/>' : '';
                echo $data->btc_address ? '<strong>BTC Add:</strong> ' . $data->btc_address . '<br/>' : '';
                echo $data->tcc_address ? '<strong>TCC Add:</strong> ' . $data->tcc_address . '<br/>' : '';
                ?>
            </td>
            <td><?php echo $w['status']; ?></td>
            <td><?php echo $w['tid']; ?></td>
            </tr>
        <?php }
        }
    }
?>
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

