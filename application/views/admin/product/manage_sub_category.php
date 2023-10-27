<?php

?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Sub Category ID</th>
            <th>Sub Category Name</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($sub_cat as $e) { 
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['sub_cat_id']; ?></td>
                <td><?php echo $e['sub_cat_name']; ?></td>
                <td><?php echo $e['category']; ?></td>
                <td>
                   
                    <a style="display:none;" href="<?php echo site_url('product/edit/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Sub Category ?')"
                       href="<?php echo site_url('admin/delete_sub_category/' . $e['sub_cat_id']); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("prodservices").classList.add('active');
        document.querySelector("#prodservices > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>