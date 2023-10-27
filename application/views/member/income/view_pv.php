<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>SN</th>
            <th>PV</th>
            <th>Type</th>
            <th>Ref ID</th>
            <th>Details</th>
            <th>Notes </th>
            <th>Date</th>
            <!--<th>Pair Match</th>-->
        </tr>
        <?php
        $sn = count($pv);
        foreach ($pv as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo $e['pv']; ?></td>
                <td><?php echo $e['type']; ?></td>
                <td><?php echo $e['ref_id'] ? config_item('ID_EXT') . $e['ref_id'] : ""; ?></td>
                <td><?php echo $e['notes']; ?></td>
                <?php if(config_item('enable_crowdfund')=='Yes'){ ?>
                <td><?php echo $this->db_model->select('plan_name', 'plans', array('id' => $e['secret'])); ?></td>
                <?php } else { ?>
                <td><?php if($e['secret'] > 0) {echo $this->db_model->select('prod_name', 'product', array('id' => $e['secret'])); } else {echo ''; } ?></td>
                <?php } ?>
                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
                <!--<td><?php echo $e['pair_match']; ?></td>-->
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
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(5) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>