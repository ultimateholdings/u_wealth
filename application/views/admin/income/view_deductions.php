<div>&nbsp;&nbsp;</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Member_Deductions" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Type</th>
            <th class="datefilter">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($earning);
        foreach ($earning as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['user_id']; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo config_item('currency') . $e['amount']; ?></td>
                <td><?php echo $e['text']; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
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
        document.querySelector("#earningpay > ul > li:nth-child(6) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>