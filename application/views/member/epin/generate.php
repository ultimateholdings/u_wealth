<?php
$member=$this->db_model->select_multi('*', 'member', array('id' => $this->session->user_id));
$payout=$this->db_model->select_multi('*', 'payout', array('plan_id' => $member->signup_package));
?>
<?php echo form_open() ?>
<span style="color:blue;">e-PIN by Plan:</span> <br><br>

<?php if($payout->user_epin_charge >0) { ?>
    <div class="alert alert-info">Admin charge of <?php echo $payout->user_epin_charge ?> % will be charged for every Epin</div>
<?php } ?>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>e-PIN Amount*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <select class="form-control" id="plan_id" name="plan_id" >
                       <?php foreach ($plans as $val) {
                            echo '<option value="' . $val['id'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
                        } ?>
                    </select>
        </div>
    </div>
    <div class="col-sm-5">
        <label>User ID / Franchisee ID (Whom to issue)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" value="<?php echo $this->session->user_id ?>" class="form-control" placeholder="1001"
                   name="userid" onchange="get_user_name('#userid', '#to_res')" id="userid">
        </div>
        <span id="to_res" style="color: red; font-weight: bold"></span>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Number of e-PINs*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo set_value('number') ?>" placeholder="Maximum 999 epin at a time"
                   class="form-control" name="number" min="1" max="999">
        </div>
    </div>
    <div class="col-sm-5">
        <label>e-PIN Type*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-adjust"></span></span>
            <select class="form-control" name="type">
                <option>Single Use</option>
                <option style="display:none;">Multi Use</option>
            </select>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-5">
      <div>&nbsp;</div>
      <?php if($member->status != 'Active') { ?>
    <p class="card-category" style="color:red;font-size: 14px;" > Please activate your acount to Generate Epins<br><?php if($member_data['wallet_balance'] >= $member_data['pd']->joining_fee) { ?>
    <a href="<?php echo site_url('member/Activate') ?>" style="color: blue;">&nbsp;<u>Click Here to Activate Your Account</u></a>
    <?php } else if($member_data['alert_message'] == ''){?>
        <a href="<?php echo site_url('member/topup-wallet/'.($member_data['pd']->joining_fee-$member_data['wallet_balance']))?>" style="color: blue;">&nbsp;<u>Click here to Pay <?php echo config_item('currency').($member_data['pd']->joining_fee-$member_data['wallet_balance']) ?> to Activate Your Account</u></a>
    <?php } ?></p>
    <?php } else { ?>
      <input type="submit" class="btn btn-danger" onclick="this.value='Please Wait..'" value="Generate e-PINs">
    <?php } ?>
  </div>
</div>
<?php echo form_close() ?>

<?php echo form_open() ?>
<br>
<div style="display: none;">
<span style="color:blue;">e-PIN by Amount:</span> <br><br>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>e-PIN Amount*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <input type="text" value="<?php echo set_value('amount') ?>" class="form-control" placeholder="xxxx"
                   name="amount">
        </div>
    </div>
    <div class="col-sm-5">
        <label>User ID / Franchisee ID (Whom to issue)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" value="<?php echo set_value('userid') ?>" class="form-control" placeholder="1001"
                   name="userid" id="userid1" onchange="get_user_name('#userid1', '#to_res1')">
        </div>
        <span id="to_res1" style="color: red; font-weight: bold"></span>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Number of e-PINs*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo set_value('number') ?>" placeholder="Maximum 999 epin at a time"
                   class="form-control" name="number" min="1" max="999">
        </div>
    </div>
    <div class="col-sm-5">
        <label>e-PIN Type*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-adjust"></span></span>
            <select class="form-control" name="type">
                <option>Single Use</option>
                <option style="display:none;">Multi Use</option>
            </select>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-5">
    <div>&nbsp;</div>
    <input type="submit" class="btn btn-danger" onclick="this.value='Please Wait..'" value="Generate e-PINs">
</div>
</div>
</div>
<?php echo form_close() ?>
<div>&nbsp;</div>
<span style="color:blue;">Generated Epins:</span> <br><br>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="bg btn-light">
        <tr>
            <th>SN</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Generate Time</th>
            <th>Used By</th>
            <th>Used Date</th>
        </tr>
        </thead>
        <?php
        $sn = 1;
        foreach ($epin as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['epin']; ?></td>
                <td><?php echo $e['amount']; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['generate_time'])); ?></td>
                <td><?php 
                if($e['used_by'] >0){
                  $used_by = $e['used_by'] == $this->session->user_id ? config_item('ID_EXT').$e['used_by'] : config_item('ID_EXT').substr(strval($e['used_by']),0,3).'*****';
                  echo $used_by;
                }else{
                    echo '--';
                }
                ?></td>
                <td><?php 
                if($e['used_by'] >0){ 
                    echo date("Y-m-d h:i A",strtotime($e['used_time']));}
                else{
                    echo '--';
                } ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("epins").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var id = $("#from").val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $('#from_res').html(data);
        });
    })

    function get_user_name(id, result) {
        var id = $(id).val();
        //alert(id);
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $(result).html(data);
        });
    }

</script>