<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Unused_epin_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>Epin</th>
            <th>Amount</th>
            <th>Current Plan</th>
            <th>TO Upgrade</th>
            <th>Amount Type</th>
            <th class="datefilter">Issued Date</th>
            <th>Type</th>
            <th>Issue To</th>
            <th class="noExport">Actions</th>
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
                <td><?php echo $e['upgrade_from']==0?'Joining Plan':$this->db_model->select('plan_name', 'plans',array('id' =>$e['upgrade_from'])); ?></td>
                <td><?php echo $e['upgrade_to']==0?'Joining Plan':$this->db_model->select('plan_name', 'plans',array('id' =>$e['upgrade_to'])); ?></td>
                <td><?= $e['is_free']==0?'Paid':'Free'; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['issue_to']; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['generate_time'])); ?></td>
                <td><?php echo $e['type']; ?></td>
                <td>
                    <a target="_blank" href="<?php echo site_url('site/register/A/'.config_item('top_id').'/epin/' . $e['epin']); ?>"
                       class="btn btn-primary btn-sm">Add Member</a>
                    <a href="<?php echo site_url('admin/epin/edit/' . $e['id']); ?>"
                       class="btn btn-info btn-sm">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this epin ?')"
                       href="<?php echo site_url('admin/epin/remove/' . $e['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
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
        document.querySelector("#epin > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
