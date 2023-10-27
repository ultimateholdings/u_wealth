<?php if($uid) { ?>
    <h3 class="hr_divider"><br/>
            <strong><strong style="color: #3a80d7">Available Shopping Wallet Balance:
                    <?php echo $new_fund ?> </strong>
        </h3>
<?php } ?>
<?php echo form_open() ?>
<div class="row">
    <div class="col-sm-6">
        <label>Enter User ID</label>
        <input type="text" class="form-control" id="uid" name="uid">
    </div>
    <div class="col-sm-6">
        <br/>
        <button type="button" onclick="populate()" class="btn btn-info">Populate</button>
    </div>
</div>
<div class="row" id="hidden" style="display: none">
    <div class="col-sm-6">
        <h3 class="hr_divider"><br/><br>
            <strong style="color: #3a80d7">Name:
                    <span id="name"></span></strong><br><br>
            <strong style="color: #3a80d7">Available Shopping Wallet Balance:
                    <span id="qty"></span></strong>
        </h3><br><br></br>
        <p style="margin-top: 50px;" id="add_deduct">
            <label>Add or Deduct Balance:</label>
            <input type="text" name="balance" required class="form-control" value=""><br/>

            <label>Enter Remarks:</label>
            <input type="text" name="remarks" class="form-control" value=""><br/>

            <button class="btn btn-success" name="submit" value="add">Add</button>
            <button class="btn btn-danger" name="submit" value="remove">Remove</button>
        </p>
    </div>
</div>
<script type="text/javascript">
    function populate() {
        var uid = $('#uid').val();
        //alert(uid);
        if (uid == "" || isNaN(uid)) {
            alert('Please enter valid User ID');
        } else {
            $.get("<?php echo site_url('wallet/get_shopping_wallet_balance/') ?>" + uid, function (data) {
                
                $("#hidden").show('slow');
                $("#qty").html(data);
               
            });
            $.get("<?php echo site_url('site/get_user_name/') ?>" + uid, function (data) {
                
                $("#hidden").show('slow');
                $("#name").html(data);
               
            });
        }
    }
</script>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("ewallet").classList.add('active');
        document.querySelector("#ewallet > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>