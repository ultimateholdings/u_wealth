<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" style="font-size:13px" id="DTable" data-name="Inactive_member_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Sponsor ID</th>
            <th>Phone</th>
            <th>Plan Name</th>
            <th class="datefilter">Join Date</th>
            <th class="noExport">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($members);
        foreach ($members as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['id']) ?>"
                       target="_blank"><?php echo config_item('ID_EXT') . $e['id']; ?></a></td>
                <td><?php echo $e['name']; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['sponsor']) ?>"
                       target="_blank"><?php echo $e['sponsor'] ? config_item('ID_EXT') . $e['sponsor'] : ''; ?></td>
                <td><?php echo $e['phone']; ?></td>
                <td><?php echo $this->db_model->select('plan_name', 'plans', array('id'=>$e['signup_package'])); ?></td>
                <td><?php echo date('Y-m-d', strtotime($e['join_time'])); ?></td>
                <td>
                    <a href="<?php echo site_url('users/user_detail/' . $e['id']); ?>" class="btn btn-warning btn-xs">View</a>
                    <a href="<?php echo site_url('users/login_member/' . $e['id']); ?>" target="_blank"
                       class="btn btn-danger btn-xs">Login</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>

<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("members").classList.add('active');
        document.querySelector("#members > ul > li:nth-child(8) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>