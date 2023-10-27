<?php

?>
<?php echo form_open() ?>
<div class="row">
    <div class="col-sm-6">
        <label>Enter User ID</label>(From where to withdraw balance)
        <input type="text" class="form-control" id="uid" name="userid">
    </div>
    <div class="col-sm-6">
        <br/>
        <button type="button" onclick="populate()" class="btn btn-info">Populate</button>
    </div>
</div>
<div class="row" id="hidden" style="display: none">
    <div class="col-sm-6">
        <h3 class="hr_divider"><br/>
            <strong><strong style="color: #0cc745">Available Wallet Balance:
                    <?php echo config_item('currency') ?> <span id="qty"></span></strong>
        </h3>
        <p style="margin-top:100px;">
            <label>Enter Amount to withdraw:</label>
            <input type="text" name="amount" required class="form-control" value="1"><br/>
            <button class="btn btn-success" name="submit" value="add">Withdraw</button>
        </p>
    </div>
</div>
<script type="text/javascript">
    function populate() {
        var uid = $('#uid').val();
        if (uid == "") {
            alert('Please enter User ID');
        } else {
            $.get("<?php echo site_url('cron/get_repurchase_balance/') ?>" + uid, function (data) {
                $("#hidden").show('slow');
                $("#qty").html(data);
            });
        }
    }
</script>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("ewallet").classList.add('active');
        document.querySelector("#ewallet > ul > li:nth-child(6) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>