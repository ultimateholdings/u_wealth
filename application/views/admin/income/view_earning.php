<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="View_earning_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Ref ID</th>
            <th>Details</th>
            <th class="datefilter">Date</th>
            <!--<th>Actions</th>-->
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($earning);
        foreach ($earning as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['userid']; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo config_item('currency') . $e['amount']; ?></td>
                <td><?php echo $e['type']; ?></td>
                <td><?php echo $e['ref_id'] ? config_item('ID_EXT') . $e['ref_id'] : ""; ?></td>
                <td><?php echo $e['pair_names']; ?></td>
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
        </tbody>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("earningpay").classList.add('active');
        document.querySelector("#earningpay > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>