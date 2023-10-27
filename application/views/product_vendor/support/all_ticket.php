<?php

?>
<p><a class="btn btn-success" href="<?php echo site_url('vendor/new-ticket') ?>">Create Ticket +</a></p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>Ticket Subject</th>
            <th>Date</th>
            <th style="background-color: #d6e9c6">Status</th>
            <th>#</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($data as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e->ticket_title; ?></td>
                <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                <td style="background-color: #d6e9c6"><?php echo $e->status; ?></td>
                <td><a href="<?php echo site_url('vendor/view_ticket/' . $e->id) ?>" class="btn btn-xs btn-danger">View</a>
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
        document.getElementById("support").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
