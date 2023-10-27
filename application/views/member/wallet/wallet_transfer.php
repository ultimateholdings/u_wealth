<?php $wallet_balance = $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id));
$shopping_wallet_balance = $this->db_model->select('balance', 'other_wallet', array('userid' => $this->session->user_id)); ?>
<form method="post" action="<?php echo base_url(); ?>wallet/wallet_transfer_submit">
<div class="col-sm-7 col-md-offset-2" style="text-align: center">
    <h3>
        <strong style="color: #0cc745">Available Wallet Balance:
            <?php echo config_item('currency') . $wallet_balance ?></strong>
    </h3> 
    <h3>
        <strong style="color: #0cc745">Available Shopping Wallet Balance:
            <?php echo config_item('currency') . $shopping_wallet_balance ?></strong>
    </h3> 

<?php if($wallet_balance > 0) { ?>
    <input type="hidden" name="userid" value="<?php echo $this->session->user_id; ?>"><br/>
    <label>Enter Amount to be transferred to your Shopping Wallet:</label>
    <input type="number" name="amount" required class="form-control" value="1"><br/>

    <label>Enter Remarks:</label>
    <input type="text" name="remarks" class="form-control" value=""><br/>

    <?php if($member->status != 'Active') { ?>
        <p class="card-category" style="color:red;font-size: 14px;" > Please activate your acount to Transfer Funds<br><?php if($member_data['wallet_balance'] >= $member_data['pd']->joining_fee) { ?>
        <a href="<?php echo site_url('member/Activate') ?>" style="color: blue;">&nbsp;<u>Click Here to Activate Your Account</u></a>
    <?php } else if($member_data['alert_message'] == ''){?>
        <a href="<?php echo site_url('member/topup-wallet/'.($member_data['pd']->joining_fee-$member_data['wallet_balance']))?>" style="color: blue;">&nbsp;<u>Click here to Pay <?php echo config_item('currency').($member_data['pd']->joining_fee-$member_data['wallet_balance']) ?> to Activate Your Account</u></a>
    <?php } ?></p>
    <?php } else {?>
        <button class="btn btn-success" name="submit" value="add">Transfer</button>
    <?php } ?>
<?php } else { ?>
    <br>
    <h4>
        <strong style="color: darkorange">No Wallet Balance to transfer to Shopping Wallet</strong>
    </h4> 
<?php } ?>
</div>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("withdraw").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>