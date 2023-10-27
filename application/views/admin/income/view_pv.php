<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>PV</th>
            <th>Type</th>
            <th>Ref ID</th>
            <th>Details</th>
            <th>Date</th>
        </tr>
        <?php
        $sn = count($pv);
        foreach ($pv as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><a href="<?php echo site_url('users/user_detail/' . $e['userid']) ?>"
                       target="_blank"><?php echo config_item('ID_EXT') . $e['userid']; ?></a></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo $e['pv']; ?></td>
                <td><?php echo $e['type']; ?></td>
                <td><?php echo $e['ref_id'] ? config_item('ID_EXT') . $e['ref_id'] : ""; ?></td>
                <td><?php echo $e['notes']; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
                <!--<td><?php echo $e['pair_names']; ?></td>-->
                <!--<td>
                    <a href="<?php echo site_url('income/edit_earning/' . $e['id']); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Record ?')"
                       href="<?php echo site_url('income/remove_earning/' . $e['id']); ?>"
                       class="btn btn-danger btn-xs">Delete</a>
                </td>-->
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("earningpay").classList.add('active');
        document.querySelector("#earningpay > ul > li:nth-child(6) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>