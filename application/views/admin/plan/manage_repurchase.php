<?php
?>
<a href="<?php echo site_url('plan/add_repurchase') ?>" class="btn btn-xs btn-success">Set New Target Income</a>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Income Type</th>
            <th>Income Name</th>
            <th>Based On </th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($repurchase as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php if($e['type']=='Downline') {echo 'Downline Target';} else {echo 'My Target';}?> 
                <td><?php echo $e['income_name']; ?></td>
                <td><?php echo $e['based_on']; ?></td>
                <td>
                    <a href="<?php echo site_url('plan/view_ri/' . $e['id']); ?>" class="btn btn-danger btn-xs">View</a>
                    <a href="<?php echo site_url('plan/edit_ri/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Product ?')"
                       href="<?php echo site_url('plan/remove_ri/' . $e['id']); ?>"
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
        document.getElementById("plans").classList.add('active');
        document.querySelector("#edit_target").setAttribute('style', 'color: darkorange !important;');
    });
</script>
