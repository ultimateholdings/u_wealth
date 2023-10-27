<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Stage Name</th>
            <th>Donation Amount</th>
            <th>Donation Qty</th>
            <th>Donation Level</th>
            <th>Actions</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($result

                 as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->plan_name; ?></td>
                <td><?php echo config_item('currency') . $e->donation_amount; ?> </td>
                <td><?php echo $e->donation_qty; ?></td>
                <td>Stage <?php echo $e->donation_level; ?></td>
                <td>
                    <a href="<?php echo site_url('donation/edit_pack/' . $e->id); ?>" class="btn btn-info btn-xs">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Package ?')"
                       href="<?php echo site_url('donation/remove_don_pack/' . $e->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                </td>
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
        document.getElementById("managedonations").classList.add('active');
        document.querySelector("#managedonations > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>