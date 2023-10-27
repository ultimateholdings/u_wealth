<?php

?>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($cat as $e) { 
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['cat_id']; ?></td>
                <td><?php echo $e['cat_name']; ?></td>
                <td>
                   
                    <a style="display:none;" href="<?php echo site_url('product/edit/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this category ?')"
                       href="<?php echo site_url('vendor/delete_category/' . $e['cat_id']); ?>"
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