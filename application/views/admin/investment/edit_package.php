<?php

?>
    <div class="row">
        <?php echo form_open() ?>
        <div class="col-sm-6">
            <label>Package Name</label>
            <input type="text" class="form-control" value="<?php echo set_value('package_name', $result->pack_name) ?>" name="package_name">
        </div>
        <div class="col-sm-6">
            <label>Investment Amount (In <?php echo config_item('currency') ?>)</label>
            <input type="text" class="form-control" value="<?php echo set_value('invst_amount', $result->amount) ?>" placeholder="Leave Blank for variable amount" name="invst_amount">
        </div>
        <div class="form-group">
            <p>
                &nbsp;&nbsp;&nbsp;<span style="color: #90111A">(Please leave unnecessary fields blank)</span>
            </p>
            <div class="col-sm-6">
                <label>Distributaion Based On: </label>
                <select name="based" class="form-control">
                    <option selected><?php echo $result->based ?></option>
                    <option>Percent</option>
                    <option>Fixed</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label>Direct Income </label>
                <input type="text" class="form-control" name="direct_income"
                       value="<?php echo set_value('direct_income', $result->direct_income) ?>">
            </div>
            <div class="col-sm-6">
                <label>Level Income</label>
                <input type="text" class="form-control" placeholder="Comma separate each level income. eg: 12,3,4"
                       name="level_income" value="<?php echo set_value('level_income', $result->level_income) ?>">
            </div>
            <div class="col-sm-6">
                <label>Matching Income</label>
                <input type="text" class="form-control" name="matching_income"
                       value="<?php echo set_value('matching_income', $result->matching_income) ?>">
            </div>
            <div class="col-sm-6">
                <label>Capping Amount (In <?php echo config_item('currency') ?>)</label>
                <input type="text" class="form-control" placeholder="Leave blank for none" name="capping" value="<?php echo set_value('capping', $result->capping) ?>">
            </div>
            <div class="col-sm-6">
                <label>ROI</label>
                <input type="text" class="form-control" placeholder="Return of Investment"
                       value="<?php echo set_value('roi', $result->roi) ?>" name="roi">
            </div>
            <div class="col-sm-6">
                <label>ROI Frequency (In Days)</label>
                <input type="number" class="form-control" placeholder="How frequently you'll pay ROI" name="roi_frequency"
                       value="<?php echo set_value('roi_frequency', $result->roi_frequency) ?>">
            </div>
            <div class="col-sm-6">
                <label>ROI Limit (In Number)</label>
                <input type="number" class="form-control" placeholder="How many time you'll pay ROI ?" name="roi_limit"
                       value="<?php echo set_value('roi_limit', $result->roi_limit) ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $result->id ?>">
            <!--- END ----------------->
        </div>
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
<?php echo form_close() ?>