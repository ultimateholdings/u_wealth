<?php
   
?>
<?php echo form_open() ?>
<div class="row">
    <div class="col-sm-6">
        <label>Enter User ID</label>(From where to transfer balance)
        <input type="text" class="form-control" id="userid" name="userid">
    </div>
    <div class="col-sm-6">
        <br/>
        <button type="button" onclick="populate()" class="btn btn-info">Populate</button>
    </div>
</div>
<div class="row" id="hidden" style="display: none">
    <div class="col-sm-6">
        <h3 class="hr_divider"><br/>
            <strong style="color: #3a80d7">Name:
                    <span id="name"></span></strong><br><br>
            <strong><strong style="color: #0cc745">Available Wallet Balance:
                    <?php echo config_item('currency') ?><span id="qty"></span></strong>
        </h3><br></br>
        <p style="margin-top:50px;" id="paragraph">
            <label>Transfer to User ID:</label>
            <input type="number" id="transferid" name="transferid" required class="form-control" onchange="get_user_name('#transferid', '#to_res')">
            <span id="to_res" style="color: red; font-weight: bold"></span><br/>
            <label>Enter Amount:</label>
            <input type="number" min="0" name="amount" required class="form-control" value="1"><br/>
            <label>Enter Remarks:</label>
            <input type="text" name="remarks" class="form-control" ><br/>
            <button class="btn btn-success" name="submit" value="add">Transfer</button>
        </p>
    </div>
</div>
<script type="text/javascript">
    function populate() {
        var userid = $('#userid').val();
        if (userid == "") {
            alert('Please enter User ID');
        } else {
            $.get("<?php echo site_url('cron/get_wallet_balance/') ?>" + userid, function (data) {
                $("#hidden").show('slow');
                $("#qty").html(data);
            });
            $.get("<?php echo site_url('site/get_user_name/') ?>" + userid, function (data) {
                $("#hidden").show('slow');
                $("#name").html(data);
               
            });
        }
    }
</script>

<?php if((config_item('admin_theme')=='admin/default/base')) { ?>
    <script type="text/javascript">
        $("#paragraph").css("margin-top", "100px"); 
    </script>
<?php } ?>

<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("ewallet").classList.add('active');
        document.querySelector("#ewallet > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

