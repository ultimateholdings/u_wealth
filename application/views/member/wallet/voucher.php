<style type="text/css">
    .col-sm-6 {
        margin: 10px 0;
    }
</style>


<div style=" background-color: #ffffff;margin-top: 20px;border-radius: 3px;border-radius: 6px;padding-left: 10px;padding-right: 10px;">
   <hr>

        <?php 
            $id=$this->session->user_id;
            $get_user_balance = $this->db_model->select('balance', 'voucher', array('userid' => $id));
        ?>
        <div class="row"> 
            <h3 class="col-sm-6"style="color: orange;padding-left: 20px; ">Available Voucher : <?php echo number_format($get_user_balance/35, 2, '.', ''); ?></h3>
        </div>
         
   <br>

</div>

<br/>
<p>&nbsp;</p>
<?php echo form_open() ?>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5">
            <label>To User ID *</label>
            <input type="number" placeholder="Where to transfer voucher" value="<?php echo set_value('to') ?>" class="form-control" name="to_user"  id="to_user">
            <span id="to_res" style="color: red; font-weight: bold"></span>
        </div>
        <div class="col-sm-5">
            <label>Amount *</label>
            <input type="text" placeholder="Enter voucher to transfer" value="" class="form-control" name="amount" id="amount">
            <span id="to_res" style="color: red; font-weight: bold"></span>
            
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div>&nbsp;</div>
    
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <br/>
            <input type="submit" class="btn btn-primary" value="Transfer" onclick="this.value='Transferring..'">
        </div>
</div>
    <p>&nbsp;</p>
<?php echo form_close() ?>
<div>&nbsp;</div>
<span style="color:blue;">Transfered Voucher:</span> <br><br>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="bg btn-light">
        <tr>
            <th>SN</th>
            <th>My ID</th>
            <th>Transfered To</th>
            <th>Voucher</th>
            <th>Transfered Time</th>
            
        </tr>
        </thead>
        <?php
        $sn = 1;
        foreach ($voucher as $e) { ?>
            <tr>
                <?php

                    $get_user_info = $this->db_model->select_multi('*', 'member', array('id' => $e['to_user_id']));

                    //$get_user_info=$this->db->select('*')->from('member')->where('id',$e['to_user_id'])->result_array;
                    debug_log("1111111111");
                    debug_log($e['to_user_id']);
                    debug_log($get_user_info);
                    
                ?>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['user_id']; ?></td>
                <td><?php echo $e['to_user_id']." (".$get_user_info->name. ")"; ?></td>
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
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

