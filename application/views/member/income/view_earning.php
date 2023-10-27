<?php

?>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
   <!--  <table class="table"> -->
        <tr class="table-bordered table-info">
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">Amount</th>
            <th style="border: 1px solid #80808042;">Type</th>
            <th style="border: 1px solid #80808042;">Ref ID</th>
            <th style="border: 1px solid #80808042;">Details</th>
            <!--<th>Notes </th>-->
            <th style="border: 1px solid #80808042;">Date</th>
            <!--<th>Pair Match</th>--> 
        </tr>
        <?php
        $sn = count($earning);
        foreach ($earning as $e) { ?>
            <tr>
                <td><?php echo $sn--; ?></td>
                <td><?php echo config_item('currency') . $e['amount']; ?></td>
                <td><?php echo $e['type']; ?></td>
                <td><?php echo $e['ref_id'] ? config_item('ID_EXT') . $e['ref_id'] : ""; ?></td>
                <td><?php echo $e['pair_names']; ?></td>
                <!--
                <?php if(config_item('enable_crowdfund')=='Yes'){ ?>
                <td><?php echo $this->db_model->select('plan_name', 'plans', array('id' => $e['secret'])); ?></td>
                <?php } else { ?>
                <td><?php if($e['secret'] > 0) {echo $this->db_model->select('prod_name', 'product', array('id' => $e['secret'])); } else {echo ''; } ?></td>
                <?php } ?>-->
                <td><?php echo date("Y-m-d h:i A",strtotime($e['date'])); ?></td>
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
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>