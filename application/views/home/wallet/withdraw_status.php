<?php
$this->db->where('userid', $this->session->user_id);
$data = $this->db->get('withdraw_request')->result();
?>
<div class="container frame">
	<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr style="font-weight: bold; font-size: 14px;">
            <td><input type="checkbox" id="select-all-row"></td>
            <td>User ID</td>
            <td>Amount</td>
            <td>Admin Fee (%) </td>
            <td>Tax (%)</td>
            <td>Net Amount</td>
            <td>Date</td>
            <td>Account Detail</td>
            <td>Status</td>
            <td>Transaction Detail</td>
        </tr>
        </thead>
        <tbody>
           <?php 
           $sn = 1;
           foreach ($data as $e) {?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->admin_charge ?> %</td>
                <td><?php echo $e->tax ?> %</td>
                <td><?php echo config_item('currency') . $e->net_paid ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->time)); ?></td>
                <td style="font-size:12px;">
                    <?php
                    $data = $this->db_model->select_multi('bank_ac_no, bank_name, bank_ifsc, bank_branch, btc_address, tcc_address, googlepay_no, phonepay_no, upi_id,status', 'member_profile', array('userid' => $e->userid));
                    echo '<strong>Name:&nbsp;</strong> ' . $this->db_model->select('name', 'member', array('id' => $e->userid)) . "<br/>";
                    echo $data->status == 'completed' ? '<strong>KYC:&nbsp;</strong><span style="color:green">Compliance</span><br/>' : '<strong>KYC:&nbsp;</strong><span style="color:red">Non Compliance</span><br/>';
                    echo '<strong>PAN:&nbsp;</strong> ' . $this->db_model->select('tax_no', 'member_profile', array('userid' => $e->userid)) . "<br/>";
                    echo $data->bank_name ? '<strong>Bank Name:</strong> ' . $data->bank_name . '<br/>' : '';
                    echo $data->bank_ac_no ? '<strong>A/C No:</strong> ' . $data->bank_ac_no . '<br/>' : '';
                    echo $data->bank_ifsc ? '<strong>IFSC:</strong> ' . $data->bank_ifsc . '<br/>' : '';
                    echo $data->bank_branch ? '<strong>Bank Branch:</strong> ' . $data->bank_branch . '<br/>' : '';
                    echo $data->upi_id ? '<strong>UPI ID:</strong> ' . $data->upi_id . '<br/>' : '';
                    echo $data->googlepay_no ? '<strong>GooglePay:</strong> ' . $data->googlepay_no . '<br/>' : '';
                    echo $data->phonepay_no ? '<strong>PhonePe:</strong> ' . $data->phonepay_no . '<br/>' : '';
                    echo trim($data->btc_address) != '' ? '<strong>BTC Add:</strong> ' . $data->btc_address . '<br/>' : '';
                    echo trim($data->tcc_address) != '' ? '<strong>TCC Add:</strong> ' . $data->tcc_address . '<br/>' : '';
                    ?>
                </td>
                <td><?php echo $e->status ?></td>
                <td><?php echo $e->tid; ?></td>

            </tr>
        <?php } ?>

		</table>
	</div>				    										
</div>