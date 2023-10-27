<?php

?>
<div class="row">
    <table class="table table-striped table-bordered" style="font-size:13px">
        <tr>
            <th>SN</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Join Date</th>
            <th>Status</th>
        </tr>
        <?php
        $sn = count($members);
        
        foreach ($members as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('ID_EXT') . $e['id']; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td><?php echo date('Y-m-d', strtotime($e['activate_time'])); ?></td>
                <td><?php echo $e['status']; ?></td>
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
        document.getElementById("members").classList.add('active');
        document.querySelector("#members > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>