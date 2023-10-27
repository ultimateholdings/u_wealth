<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Username</th>
            <th>Store Name</th>
            <th>Country</th>
            <th>State</th>
            <th>eMail</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Status</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($fran as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo $e['username']; ?></td>
                <td><?php echo $e['business_name']; ?></td>
                <td><?php echo $e['country']; ?></td>
                <td><?php echo $e['state']; ?></td>
                <td><?php echo $e['email']; ?></td>
                <td><?php echo $e['phone']; ?></td>
                <td><?php echo $e['address']; ?></td>
                <td><?php echo $e['status']; ?></td>
                <td>
                    <div style="display: flex;" >

                    <a href="<?php echo site_url('adm-franchisee/edit-fran/' . $e['id']); ?>"
                       class="btn btn-info btn-xs fa fa-pencil"style="margin-right: 10px;"></a>
                    <a onclick="return confirm('Are you sure you want to delete this epin ?')"
                       href="<?php echo site_url('adm-franchisee/remove-fran/' . $e['id']); ?>"
                       class="btn btn-danger btn-xs fa fa-remove"></a>
                   </div>
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
        document.getElementById("franchisee").classList.add('active');
        document.querySelector("#franchisee > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>