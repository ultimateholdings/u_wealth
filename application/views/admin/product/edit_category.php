<?php

?>
<div class="row">
    <?php echo form_open() ?>
    <h4 align="center">Edit Category</h4>
    <hr/>
    <div class="form-group">
        <div class="col-sm-6">
            <label>Category Name*</label>
            <input type="text" class="form-control" value="<?php echo set_value('cat_name', $data->cat_name) ?>"
                   name="cat_name">
        </div>
        <input type="hidden" name="id" value="<?php echo $data->id ?>">
        <div class="col-sm-6">
            <label>Parent Category</label>
            <select class="form-control" name="parent_cat">
                <option value="<?php echo $data->parent_cat ?>"
                        selected><?php echo $this->db_model->select('parent_cat', 'product_categories', array('id' => $data->id)) ?></option>
                <?php foreach ($parents as $val) {
                    echo '<option value="' . $val['id'] . '">' . $val['parent_cat'] . '</option>';
                } ?>
            </select>
        </div>
        <div>&nbsp;</div>
        <div class="col-sm-12">
            <label>Category Description</label>
            <textarea class="form-control" id="editor"
                      name="description"><?php echo set_value('description', $data->description) ?></textarea>
        </div>
        <div class="col-sm-12"><br/>
            <input type="submit" class="btn btn-success" value="Update" onclick="this.value='Updating..'">
        </div>

    </div>
    <?php echo form_close() ?>
</div>