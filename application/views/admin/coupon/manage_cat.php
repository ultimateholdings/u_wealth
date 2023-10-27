<?php

?>
<div class="row">
    <?php echo form_open() ?>
    <div class="col-sm-12">
        <label>Category Name</label>
        <input type="text" class="form-control" value="<?php echo set_value('cat_name') ?>" name="cat_name">
    </div>
    <div class="col-sm-12">
        <label>Category Description</label>
        <textarea id="editor" class="form-control" name="cat_desc"><?php echo set_value('cat_desc') ?></textarea>
    </div>
    <div class="col-sm-6"><br/>
        <input type="submit" class="btn btn-success" value="Add" onclick="this.value='Creating..'">
    </div>
    <?php echo form_close() ?>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Category Name</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->cat_name; ?></td>
                <td><a href="<?php echo site_url('coupon/edit-cat/' . $e->id); ?>"
                       class="btn btn-info btn-xs glyphicon glyphicon-pencil"></a><a
                            onclick="return confirm('Are you sure you want to delete this category ?')"
                            href="<?php echo site_url('coupon/remove-cat/' . $e->id); ?>"
                            class="btn btn-danger btn-xs glyphicon glyphicon-remove"></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("coupons").classList.add('active');
        document.querySelector("#coupons > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>