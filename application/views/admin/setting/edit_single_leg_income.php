<?php

?>
<div class="row">
    <?php echo form_open() ?>
    <input name="id" value="<?php echo $result->id ?>" type="hidden">
    <div class="col-sm-6">
        <label>Earning Type</label>
        <select class="form-control" name="income_name">
            <option selected><?php echo $result->income_name ?></option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Level No</label>
        <select class="form-control" name="level_no">
            <option selected><?php echo $result->level_no ?></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
        </select>
    </div>
    <div>&nbsp;</div>
    <div class="col-sm-6">
        <label>Total Downline</label>
        <input type="text" class="form-control" value="<?php echo set_value('total_member', $result->total_member) ?>" name="total_member">
    </div>
    <div class="col-sm-6">
        <label>Minimum Direct Sponsors</label>
        <input type="text" class="form-control" value="<?php echo set_value('direct', $result->direct) ?>" name="direct">
    </div>
    <div>&nbsp;</div>
    <div class="col-sm-6">
        <label>Earning Amount</label>
        <input type="text" class="form-control" value="<?php echo set_value('amount', $result->amount) ?>"
               name="amount">
    </div>
    <div class="col-sm-6">
        <label>Upgrade Amount</label>
        <input type="text" class="form-control" value="<?php echo set_value('upgrade',$result->upgrade) ?>" name="upgrade">
    </div>
    <div>&nbsp;</div>
    <div class="col-sm-6">
        <label>Achieve Duration <br/> </label>
        <input type="text" class="form-control"
               value="<?php echo set_value('income_duration', $result->income_duration) ?>"
               name="income_duration"><span style="font-size: 11px">( Within how many days he/she should achieve this  ? 0 for no duration )</span>
    </div>
    <div class="col-sm-10"><br/>
        <input type="submit" class="btn btn-success" value="Save" onclick="this.value='Saving..'">
        <a href="<?php echo site_url('income/set_single_leg_income');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
    <?php echo form_close() ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#single").setAttribute('style', 'color: darkorange !important;');
    });
</script>