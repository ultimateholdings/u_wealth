<?php

?>
<div class="row">
    <?php echo form_open_multipart() ?>
    <h4 align="center">Create New Brand</h4>
    <hr/>
    <div class="form-group">
        <div class="col-sm-6">
            <label>Brand Name*</label>
            <input type="text" class="form-control" name="brand_name">
        </div>
        <div class="col-sm-6">
            <label>Image</label>
            <input type="file" name="img">
            <br>
        </div>
        
        <div class="col-sm-12"><br/>
            <input type="submit" class="btn btn-success" value="Create" onclick="this.value='Creating..'">
        </div>
    </div>
  
    <?php echo form_close() ?>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Brand Name</th>
            <th>Image</th>
            <!--<th>Actions</th>-->
        </tr>
        <?php
          $si = 1;
        //print_r($brand); die();
        if($brand) {
            foreach ($brand as $e) { ?>
            <tr>
                <td><?php echo $si++; ?></td>
                <td><?php echo $e['brand_name']; ?></td>
                
                <td><img src="<?php echo $e['brand_image'] ? base_url('uploads/' . $e['brand_image']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></td>

                
                <td style="display: none;">
                    <a href="<?php echo site_url('admin/brand/edit/' . $e['brand_id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this brand ?')"
                       href="<?php echo site_url('admin/brand/remove/' . $e['brand_id']); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } 
        } ?>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul:nth-child(2) > li:nth-child(1) > a:nth-child(1) > span:nth-child(1)").setAttribute('style', 'color: darkorange !important;');
    });
</script>