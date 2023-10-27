<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Recharge_Report" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User Id</th>
            <th>Service Type</th>
            <th>Recharge No</th>
            <th>Amount</th>
            <th>Operator</th>
            <th class="datefilter">Date</th>
            <th>TID</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($rcg as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid; ?></td>
                <td><?php echo $e->service_type; ?></td>
                <td><?php echo $e->recharge_no; ?></td>
                <td><?php echo $e->amount; ?></td>
                <td><?php echo $e->operator; ?></td>
                <td><?php echo date("Y-m-d h:i A",$e->time); ?></td>
                <td><?php echo $e->trnid; ?></td>
                <td><?php echo $e->status; ?></td>
                <!--<td>
                    <a class="btn btn-xs btn-danger" href="<?php echo site_url('recharge/remove-record/' . $e->id) ?>">Remove</a>
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
        document.getElementById("recharge").classList.add('active');
        document.querySelector("#recharge > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>