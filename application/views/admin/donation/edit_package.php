<?php

?>
    <div class="row">
        <?php echo form_open() ?>
        <div class="col-sm-6">
            <label>Stage Name</label>
            <input type="text" class="form-control" value="<?php echo set_value('package_name', $result->plan_name) ?>" name="package_name">
        </div>
        <div class="col-sm-6">
            <label>Upgradation / Donation Amount (In <?php echo config_item('currency') ?>)</label>
            <input type="text" class="form-control" value="<?php echo set_value('invst_amount', $result->donation_amount) ?>" placeholder="Leave Blank for variable amount" name="invst_amount">
        </div>
        <div class="form-group">
            <p>
                &nbsp;&nbsp;&nbsp;<span style="color: #90111A">(Please leave unnecessary fields blank)</span>
            </p>
            <div class="col-sm-6">
                <label>Sponsor Income</label>
                <input type="text" class="form-control" name="sponsor_income"
                       value="<?php echo set_value('sponsor_income', $result->sponsor_income) ?>">
            </div>
            <div class="col-sm-6">
                <label>Position Income</label>
                <input type="text" class="form-control" name="position_income"
                       value="<?php echo set_value('position_income', $result->position_income) ?>">
            </div>
            <div class="col-sm-6">
                <label>Donation Level (In Number)</label>
                <input type="number" class="form-control" placeholder="eg: For first level donation enter 1" name="donation_level"
                       value="<?php echo set_value('donation_level', $result->donation_level) ?>">
            </div>
            <div class="col-sm-6">
                <label>Donation Qty</label>(Including Incomes)
                <input type="number" class="form-control" placeholder="How many donation he/she has to send to upgrade to next one" name="donation_qty"
                       value="<?php echo set_value('donation_qty', $result->donation_qty) ?>">
            </div>

            <div class="col-sm-6">
                <label>Expired After</label> (In days)
                <input type="number" class="form-control" placeholder="Expires after how many days" name="expiry_after"
                       value="<?php echo set_value('expiry_after', $result->expiry_duration) ?>">
            </div>
            <!--- END ----------------->
        </div>
    </div>
    <input type="hidden" value="<?php echo $result->id ?>" name="id">
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
    </div>
<?php echo form_close() ?>