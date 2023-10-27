<?php

?>
<?php echo form_open() ?>

<div class="alert alert-danger" style="display: none;">
    <strong>Warning!</strong> If you click on generate button below, then All the balances of Users will be withdrawn. This is not fully reversible. So if you want to generate payout for one user Then
    <a href="<?php echo site_url('wallet/withdraw-fund') ?>" class="alert-link"> Click
        Here &rarr;</a>
</div>

<?php 

//$this->db->where('type !=','Repurchase')->from("plans")->count_all_results();
//debug_log($this->db->last_query());
//$this->db_model->count_all('payout');
//debug_log($this->db->last_query());

if($this->db->where('type !=','Repurchase')->from("plans")->count_all_results() != $this->db_model->count_all('payout')) { ?>
<div class="alert alert-danger">
    <strong>Warning!</strong> Payout Must be configured to Generate Payouts.<br>
    Payout is NOT configured for all the Plans. Please 
    <a href="<?php echo site_url('setting/payout-setting') ?>" class="alert-link"> Click
        Here &rarr;</a> to Configure the Payouts.
</div>
<?php } else {?>
<div class="alert alert-info alert-dismissable">
    <i class="close fa fa-close" data-dismiss="alert" aria-label="close"></i>
    <strong>Note :</strong> You are Now about to withdraw balances for all users.
</div>
<div class="row">
    <div class="col-sm-6">
        <label>Enter Admin Password</label>
        <input type="password" required class="form-control" id="password" name="password">
    </div>
    <div class="col-sm-6">
        <br/>
        <button type="submit" onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-info">Generate
        </button>
    </div>
</div>
<?php } ?>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("earningpay").classList.add('active');
        document.querySelector("#earningpay > ul > li:nth-child(5) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>