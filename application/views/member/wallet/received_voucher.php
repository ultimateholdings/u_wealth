<style type="text/css">
    .col-sm-6 {
        margin: 10px 0;
    }
</style>


<div>&nbsp;</div>
<span style="color:blue;">Received Voucher:</span> <br><br>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="bg btn-light">
        <tr>
            <th>SN</th>
            <th>My ID</th>
            <th>Transfered From</th>
            <th>Voucher</th>
            <th>Transfered Time</th>
            
        </tr>
        </thead>
        <?php
        $sn = 1;
        foreach ($voucher as $e) { ?>
            <tr>
                <?php

                    $get_user_info = $this->db_model->select_multi('*', 'member', array('id' => $e['user_id']));

                    //$get_user_info=$this->db->select('*')->from('member')->where('id',$e['to_user_id'])->result_array;
                    debug_log("1111111111");
                    debug_log($e['user_id']);
                    debug_log($get_user_info);
                    
                ?>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['to_user_id']; ?></td>
                <td><?php echo $e['user_id']." (".$get_user_info->name. ")"; ?></td>
                <td><?php echo $e['amount']; ?></td>
                <td><?php echo $e['date']; ?></td>
                
            </tr>
        <?php } ?>
    </table>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("voucher").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

