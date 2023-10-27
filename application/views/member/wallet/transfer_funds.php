<?php

?>
<?php echo form_open() ?>
<div class="col-sm-7 col-md-offset-2" style="text-align: center">
    <h3>
        <strong style="color: #0cc745">Available Wallet Balance:
            <?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)) ?></strong>
    </h3>
    <input type="hidden" name="from" value="<?php echo $this->session->user_id; ?>"><br/>
    <label>Transfer to User ID:</label>
    <input type="number" name="transferid" required class="form-control" onchange="get_user_name('#transferid', '#to_res')" id="transferid">
            <span id="to_res" style="color: red; font-weight: bold; font-size: 16px;float:left;"></span><br/>
    <label>Enter Amount:</label>
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
</div>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("withdraw").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>