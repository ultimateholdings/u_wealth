<div class="table-responsive">
    <table class="table table-striped table-bordered" style="font-size:13px" id="DTable" data-page-length='100' data-name="member_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Sponsor ID</th>
            <th>Income</th>
            <th>Phone</th>
            <?php if (config_item('enable_investment') == "Yes") {
                echo '<th>My Investment</th>';
            }
            ?>
            <th class="datefilter">Join Date</th>
            <th>Total Downline</th>
            <th class="noExport">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sn = 1;
        foreach ($members as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['id']; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo $e['sponsor'] ? config_item('ID_EXT') . $e['sponsor'] : ''; ?></td>
                <td><?php $data=$this->db_model->sum('amount', 'earning', array('userid' => $e['id']));
                $data = $data > 0 ? $data : 0;
                echo config_item('currency') . $data; ?>
                </td>
                <td><?php echo $e['phone']; ?></td>
                <?php if (config_item('enable_investment') == "Yes") {
                    echo '<td>$ ' . $e['topup'] . '</td>';
                }
                ?>
                <td><?php echo date('Y-m-d', strtotime($e['activate_time'])); ?></td>
                <td><?php echo $e['total_downline']; ?></td>
                <td>
                    <?php if (config_item('enable_topup') == "Yes" && $e['topup'] <= 0) { ?>
                        <a href="<?php echo site_url('users/topup_member/' . $e['id']); ?>"
                           class="btn btn-warning btn-xs">Top Up</a>
                    <?php } ?>
                    <a href="<?php echo site_url('users/user_detail/' . $e['id']); ?>" class="btn btn-warning btn-xs">View</a>
                    <a href="<?php echo site_url('users/edit_user/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
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
<br><br>
<a href="<?php echo site_url('admin') ?>" class="btn btn-xs btn-danger">&larr; Go Back</a>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("members").classList.add('active');
        document.querySelector("#members > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>