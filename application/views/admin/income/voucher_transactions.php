<div>&nbsp;&nbsp;</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Member_Deductions" data-export='Yes'>
        <thead>
        <tr>
            <th>SN</th>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            <th class="datefilter">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($voucher);
        foreach ($voucher as $e) { ?>
            <tr>

                <?php

                    $get_user_info = $this->db_model->select_multi('*', 'member', array('id' => $e['user_id']));

                    $get_user_info1 = $this->db_model->select_multi('*', 'member', array('id' => $e['to_user_id']));

                
                    
                ?>

                <td><?php echo $sn--; ?></td>
                <td><?php echo $e['user_id']." (".$get_user_info->name. ")"; ?></td>
                <td><?php echo $e['to_user_id']." (".$get_user_info1->name. ")"; ?></td>
                <td><?php echo config_item('currency') . $e['amount']; ?></td>
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
        document.querySelector("#earningpay > ul > li:nth-child(8) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>