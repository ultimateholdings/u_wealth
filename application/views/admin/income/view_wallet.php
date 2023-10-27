<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="member_wallet_summary_list" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Wallet Balance</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = 1;
        foreach ($wallet as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['userid']; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo config_item('currency') . $e['amount']; ?></td>
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
        document.getElementById("ewallet").classList.add('active');
        document.querySelector("#ewallet > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>