<?php
$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : '';
$status1 = $this->uri->segment('4') ? $this->uri->segment('4') : '';
$sdate  = $this->uri->segment('5') ? $this->uri->segment('5') : '';
$edate  = $this->uri->segment('6') ? $this->uri->segment('6') : '';
$this->db->select('*');

if($top_id > 0)
{
    $this->db->where('userid', htmlentities($top_id));
}
if (($status1 !== "") && ($status1 != "All")) {
    $this->db->where('status', $status1);
}
if ($sdate !== "") {
    $this->db->where('CAST(date as DATE) >=', $sdate);
}
if ($edate !== "") {
    $this->db->where('CAST(date as DATE) <=', $edate);
}
$data = $this->db->get('withdraw_request')->result();
//debug_log($this->db->last_query());
?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Withdrawal Report" data-export='Yes'>
        <thead>
            <tr style="font-weight: bold; font-size: 14px;">
            <th>SN.</th>
            <th>User ID</th>
            <th>User Name</th>
            <?php if(config_item('enable_kyc')=='Yes'){ ?>
            <th>PAN/Tax. NO</th>
            <?php } ?>
            <th>Amount</th>
            <th>Admin Fee </th>
            <th>Tax </th>
            <th>Net Amount</th>
            <th class="datefilter">Date</th>
            <th>Mode</th>
            <th>Account Detail</th>
            <th>Status</th>
            <th>Transaction Detail</th>
            <?php if(config_item('coinpayment_payout')=="Yes"){?>
                <th>Address</th>
            <?php } ?>
            <?php if(config_item('cashfree_enable_payout')=="Yes"){?>
                <th>Reference ID</th>
            <?php } ?>
            </tr>
        </thead>
        <?php
        $sn = 1;
        if($data){
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
                <?php if(config_item('coinpayment_payout')=="Yes"){?>
                    <td><?php echo $e->address; ?></td>
                <?php } ?>
                <?php if(config_item('cashfree_enable_payout')=="Yes"){?>
                    <td><?php echo $e->cashfree_referenceId; ?></td>
                <?php } ?>
            </tr>
        <?php } 
        }
        ?>
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
