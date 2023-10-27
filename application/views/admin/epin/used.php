<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Used_epin_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Amount Type</th>
            <th>Used By (ID)</th>
            <th>Used By (Name)</th>
            <th class="datefilter">Used Date</th>
            <th>Type</th>
            <th style="display: none;" class="noExport">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($epin as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['epin']; ?></td>
                <td><?php echo $e['amount']; ?></td>
                <td><?= $e['is_free']==0?'Paid':'Free'; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['used_by']; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo $e['used_time']; ?></td>
                <td><?php echo $e['type']; ?></td>
                <td style="display: none;">
                    <a href="<?php echo site_url('admin/epin/edit/' . $e['id']); ?>"
                       class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this epin ?')"
                       href="<?php echo site_url('admin/epin/remove/' . $e['id']); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
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
        document.getElementById("epin").classList.add('active');
        document.querySelector("#epin > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>