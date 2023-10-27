<style type="text/css">
    .col-sm-6 {
        margin: 10px 0;
    }
</style>

<?php echo form_open() ?>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
            <label>To User ID *</label>
            <input placeholder="Where to transfer epins" value="<?php echo set_value('to') ?>" class="form-control" name="to" onchange="get_user_name('#to', '#to_res')" id="to">
            <span id="to_res" style="color: red; font-weight: bold"></span>
        </div>
        <div class="col-sm-5">
            <label>Amount *</label>
            <select class="form-control" id="amount" name="amount" >
                   <?php foreach ($plans as $val) {
                        echo '<option value="' . $val['joining_fee'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
                    } ?>
                </select>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div>&nbsp;</div>
    <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <label>Number of Pins *</label>
                <input placeholder="How many epin to transfer" value="<?php echo set_value('qty') ?>"
                       class="form-control" name="qty">
            </div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <br/>
            <input type="submit" class="btn btn-primary" value="Transfer" onclick="this.value='Transferring..'">
        </div>
</div>
    <p>&nbsp;</p>
<?php echo form_close() ?>
<div>&nbsp;</div>
<span style="color:blue;">Transfered Epins:</span> <br><br>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="bg btn-light">
        <tr>
            <th>SN</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Generate Time</th>
            <th>Issued To</th>
        </tr>
        </thead>
        <?php
        $sn = 1;
        foreach ($epin as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo substr(strval($e['epin']),0,3).'*****'; ?></td>
                <td><?php echo $e['amount']; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['generate_time'])); ?></td>
                <td><?php echo config_item('ID_EXT').substr(strval($e['issue_to']),0,3).'*****'; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("epins").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

