<?php

?>
<a href="<?php echo site_url('plan/add_plan') ?>" class="btn btn-xs btn-success">Create New Plan</a>
<div class="table-responsive" style="margin-top: 10px;">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Plan Name</th>
            <th>Joining Fee</th>
            <th>Direct Comm</th>
            <!--<th>Self Purchase Comm</th>-->
            <th>Show on Registration Form</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($prod as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['plan_name']; ?></td>
                <td><?php echo config_item('currency') . " " . $e['joining_fee']; ?></td>
                <!--<td>
                    <img src="<?php echo $e['image'] ? base_url('uploads/' . $e['image']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px"></td>-->
                <td><?php echo $e['direct_commission']; ?></td>
                <!--<td><?php echo $e['self_product_purchase_comm']; ?></td>-->
                <td><?php echo $e['show_on_regform']; ?></td>
                <td>
                    <a href="<?php echo site_url('plan/view/' . $e['id']); ?>" class="btn btn-danger btn-sm">View</a>
                    <a href="<?php echo site_url('plan/edit/' . $e['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Plan ?')"
                       href="<?php echo site_url('plan/remove/' . $e['id']); ?>"
                       class="btn btn-danger btn-sm">Delete</a>
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
        document.getElementById("plans").classList.add('active');
        document.querySelector("#plans > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>