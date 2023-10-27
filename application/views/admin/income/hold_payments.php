<?php
$this->db->where('status', 'Hold');
$data = $this->db->get('withdraw_request')->result();
?>
<hr/>
<?php if (empty($data)) { ?>
    <h2> There is no payout requests which are on hold </h2>
<?php } else { ?>
<div class="table-responsive">
    <table class="table table-bordered" id="DTable" data-page-length='100' data-name="Hold_Withdrawal_list" data-export='Yes'>
        <thead>
        <tr style="font-weight: bold; font-size: 14px;">
            <td>S.N.</td>
            <td>User ID</td>
            <td>Amount</td>
            <td>Admin Charge (%) </td>
            <td>Tax (%)</td>
            <td>Net Payable</td>
            <td class="datefilter">Date</td>
            <td>Mode</td>
            <td class="noExport">Account Detail</td>
            <td class="noExport">#</td>
        </tr>
        </thead>
        <tbody style="font-size: 14px;">
        <?php
        $sn = 1;
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->admin_charge ?> %</td>
                <td><?php echo $e->tax ?> %</td>
                <td><?php echo config_item('currency') . $e->net_paid ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td><?php echo $e->mode ?></td>
                <td style="font-size:12px;">
                    <?php
                    $data = $this->db_model->select_multi('bank_ac_no, bank_name, bank_ifsc, bank_branch, btc_address, tcc_address, googlepay_no, phonepay_no, upi_id,status', 'member_profile', array('userid' => $e->userid));
                    if($e->mode=="bank")
                    {
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
                    }
                    elseif($e->mode=="bitcoin"){
                     echo trim($data->btc_address) != '' ? '<strong>BTC Add:</strong> ' . $data->btc_address . '<br/>' : '';
                    }
                     
                    ?>
                </td>
                <td>
                    <div style="display: flex;">
                        
                    <a data-toggle="modal" data-target="#myModal"
                       onclick="document.getElementById('payid').value='<?php echo $e->id ?>'"
                       class="btn btn-primary btn-sm mr-1" style="color: white;" >Pay</a>
                    <a href="<?php echo site_url('income/unhold/' . $e->id) ?>"
                       class="btn btn-success btn-sm mr-1" style="width: 83px;" >Un-Hold</a>
                    <a href="<?php echo site_url('income/remove/' . $e->id) ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure want to delete this payout ?')">Delete</a></td>
                   </div>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Payout Detail</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('income/pay') ?>
                <label>Enter Transaction Detail</label>
                <input type="hidden" name="payid" value="" id="payid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("earningpay").classList.add('active');
        document.querySelector("#earningpay > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
