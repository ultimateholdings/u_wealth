<?php

?>
<div class="row">
    <?php echo form_open() ?>
    <div class="col-sm-6">
        <label>Earning Type</label>
        <select class="form-control" name="income_name">
            <option>Single Leg Income</option>
        </select>
    </div>
    <div class="col-sm-6">
        <label>Level No</label>
        <select class="form-control" name="level_no">
            <option selected>1</option>
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
        <input type="text" class="form-control" value="<?php echo set_value('total_member') ?>" name="total_member">
    </div>
    <div class="col-sm-6">
        <label>Minimum Direct Sponsors</label>
        <input type="text" class="form-control" value="<?php echo set_value('direct') ?>" name="direct">
    </div>
    <div>&nbsp;</div>
    <div class="col-sm-6">
        <label>Earning Amount</label>
        <input type="text" class="form-control" value="<?php echo set_value('amount') ?>" name="amount">
    </div>
    
    <div class="col-sm-6">
        <label>Upgrade Amount</label>
        <input type="text" class="form-control" value="<?php echo set_value('upgrade') ?>" name="upgrade">
    </div>
    <div>&nbsp;</div>
    <div class="col-sm-6">
        <label>Achieve Duration <br/> </label>
        <input type="text" class="form-control" value="<?php echo set_value('income_duration', '0') ?>"
        name="income_duration"><span style="font-size: 11px">( Within how many days he/she should achieve this  ? 0 for no duration )</span>
    </div>
    
    <div class="col-sm-12"><br/>
        <input type="submit" class="btn btn-success" value="Save" onclick="this.value='Saving..'">
    </div>
    <?php echo form_close() ?>
</div><!------------- MANAGE REWARDS -------------------------------->

<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>Level</th>
            <th>Downline </th>
            <th>Direct</th>
            <th>Income</th>
            <th>Upgrade</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $e->level_no; ?></td>
                <td><?php echo $e->total_member; ?></td>
                <td><?php echo $e->direct; ?></td>
                <td><?php echo config_item('currency') . $e->amount; ?></td>
                <td><?php echo config_item('currency') . $e->upgrade; ?></td>
                <td>
                    <a href="<?php echo site_url('income/edit-single-leg-income/' . $e->id); ?>"
                       class="btn btn-info btn-xs glyphicon glyphicon-pencil"></a>
                    <a onclick="return confirm('Are you sure you want to delete this Income ?')"
                       href="<?php echo site_url('income/remove-level-wise-income/' . $e->id); ?>"
                       class="btn btn-danger btn-xs glyphicon glyphicon-remove"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("plans").classList.add('active');
        document.querySelector("#single").setAttribute('style', 'color: darkorange !important;');
    });
</script>