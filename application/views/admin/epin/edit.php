<?php
if($data->is_upgrade==0){

?>
<?php echo form_open() ?>
<h3>Editing e-PIN: <?php echo $data->epin ?></h3>
<hr/>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>e-PIN Amount*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <input type="text" class="form-control" value="<?php echo set_value('amount', $data->amount) ?>"
                   placeholder="For free e-pin enter 0" name="amount">
        </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $data->id ?>">
    <div class="col-sm-5">
        <label>User ID (Whom to issue)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" value="<?php echo set_value('userid', config_item('ID_EXT') . $data->issue_to) ?>"
                   class="form-control" placeholder="1001" name="userid">
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Status*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <select name="status" class="form-control">
                <option selected><?php echo $data->status ?></option>
                <option>Used</option>
                <option>Un-used</option>
            </select>
        </div>
    </div>
    <div class="col-sm-5">
        <label>User ID (Used By)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" value="<?php echo set_value('used_by', config_item('ID_EXT') . $data->used_by) ?>"
                   class="form-control" placeholder="1001" name="used_by">
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <div>&nbsp;</div>
        <input type="submit" class="btn btn-danger" onclick="this.value='Please Wait..'" value="Update e-PIN">
        <a href="<?php echo site_url('admin/search_epin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
    </div>
    <div class="col-sm-1"></div>
</div>
<?php echo form_close();
}
else{
?>
<?php echo form_open('admin/edit_upgrade_epin') ?>
<h3>Editing e-PIN: <?php echo $data->epin ?></h3>
<input type="hidden" name="id" value="<?=$data->id?>" />
<input type="hidden" name="is_upgrade" value="1" />
<!--<span style="color:blue;">e-PIN for Package Upgrade:</span> <br><br>-->
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Package Upgrade From*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <select class="form-control" id="" name="upgrade_from"  >
                       <?php foreach ($package as $val) {
						   ?>
                            <option value="<?=$val['id']?>" <?=$val['id']==$data->upgrade_from?"selected":""?>><?=$val['plan_name']?> </option>
                            <?php
                        } ?>
                    </select>
        </div>
    </div>
    <div class="col-sm-5">
        <label>Package Upgrade To*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
            <select class="form-control" id="" name="upgrade_to" >
                       <?php foreach ($package as $val) {
						   ?>
                            <option value="<?=$val['id']?>" <?=$val['id']==$data->upgrade_to?"selected":""?>><?=$val['plan_name']?> </option>
                            <?php
                        } ?>
                    </select>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Status*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <select name="status" class="form-control">
                <option selected><?php echo $data->status ?></option>
                <option>Used</option>
                <option>Un-used</option>
            </select>
        </div>
    </div>
    <div class="col-sm-5">
        <label>User ID (Used By)*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" value="<?php echo set_value('used_by', config_item('ID_EXT') . $data->used_by) ?>"
                   class="form-control" placeholder="1001" name="used_by">
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div>&nbsp;</div>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <label>Binary Points*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo $data->binary_points ?>" placeholder="Binary Points"
                   class="form-control" name="binary_points">
        </div>
    </div>
    <div class="col-sm-5">
        <label>Amount*</label>
        <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-arrow-right"></span></span>
            <input type="number" value="<?php echo $data->amount ?>" placeholder="Amount"
                   class="form-control" name="amount">
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
<?php echo form_close();
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("epin").classList.add('active');
        document.querySelector("#epin > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
