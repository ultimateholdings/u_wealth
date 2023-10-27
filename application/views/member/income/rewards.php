<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-info table-bordered">
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">Reward Name</th>
            <th style="border: 1px solid #80808042;">Achieve Date</th>
            <th style="border: 1px solid #80808042;">Paid Date</th>
            <th style="border: 1px solid #80808042;">Delivery Detail</th>
        </tr>
        <?php
        $sn = 1;
        foreach ($rewards as $e) { ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $this->db_model->select('reward_name', 'reward_setting', array('id' => $e['reward_id'])); ?></td>
                <td><?php echo date("Y-m-d",strtotime($e['date'])); ?></td>
                <?php if($e['paid_date'] != ''){ ?>
                <td><?php echo date('Y-m-d', strtotime($e['paid_date'])); ?></td>
                <?php } else { ?>
                <td>--</td>
                <?php } ?> 
                <td><?php echo $e['tid']; ?></td>
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
        document.getElementById("earnings").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(4) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
