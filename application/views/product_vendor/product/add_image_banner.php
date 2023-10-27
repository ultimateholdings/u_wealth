<?php

?>

<div class="row">
    <?php echo form_open_multipart() ?>
    <div class="form-group">
        <div class="col-sm-6">
            <label>Banner Name</label>
            <input type="text" class="form-control" name="banner_name" value="<?php echo set_value('banner_name') ?>">
        </div>
        
        <div class="col-sm-6">
            <label>Product</label>
            <select class="form-control" name="prod_id" required>
                <?php foreach ($products as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['prod_name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Product Flag</label>
            <select class="form-control" name="flag">
                <?php foreach ($flags as $f) {
                    echo '<option value="' . $f['flag_name'] . '">' . $f['flag_name'] .' ('.$f['flag_dimension'] .')'. '</option>';
                } ?>
            </select>
        </div>
        <div>&nbsp;</div>
        <div class="col-sm-6">
            <label>Upload Image Banner</label>
            <input type="file" name="img">
        </div>
        <div class="col-sm-10">
            <label>Banner Description</label>
            <textarea class="form-control" id="editor" name="banner_desc"><?php echo set_value('banner_desc') ?></textarea>
        </div>
	    <div class="col-sm-10"><br/>
	        <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
	        <a href="<?php echo site_url('site/admin');?>" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
	    </div>
    </div>
  <?php echo form_close() ?>
</div>




<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("ecomm").classList.add('active');
        document.querySelector("#ecomm > ul:nth-child(2) > li:nth-child(2) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<!--<div class="col-sm-6">
            <label>Product Category *</label>
            <select class="form-control" name="category">
                <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['cat_id'] . '">' . $val['cat_name'] . "-" .$val['parent_cat'] . '</option>';
                } ?>
            </select>
        </div>
         <div class="col-sm-6">
            <label>Sub-Category*</label>
            <select class="form-control" name="sub_category">
                <?php foreach ($subcat as $val) {
                    echo '<option value="' . $val['sub_cat_id'] . '">' . $val['sub_cat_name'] . '</option>';
                } ?>
            </select>
        </div>
        <div class="col-sm-6">
            <label>Product Brand</label>
            <select class="form-control" name="brand">

                <?php foreach ($brands as $val) {
                    echo '<option value="' . $val['brand_id'] . '">' . $val['brand_name'] . '</option>';
                } ?>
            </select>
        </div>-->