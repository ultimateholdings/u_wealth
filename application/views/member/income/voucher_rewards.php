<?php

?>
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
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-info table-bordered">
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">Reward Name</th>
            <th style="border: 1px solid #80808042;">Reward Image</th>
            <th style="border: 1px solid #80808042;">Plan ID</th>
            <th style="border: 1px solid #80808042;">Reward Type</th>
            <th style="border: 1px solid #80808042;">Voucher Numbers</th>
            <th>#</th>
            
        </tr>
        <?php
        $sn = 1;
        foreach ($rewards as $e) { ?>
            <tr>

                <?php 
                    $get_user_voucher = $this->db_model->select('balance', 'voucher', array('userid' => $this->session->user_id));

                    $get_user_voucher_new=$get_user_voucher/35;
                ?>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['name']; ?></td>
                <td>
                    <img src="<?php echo $e['image'] ? base_url('uploads/' . $e['image']) : base_url('uploads/default.jpg'); ?>"
                         class="img-thumbnail img-responsive" style="max-height: 100px">
                </td>
                <td><?php echo $e['plan_id']; ?></td>       
                <td><?php echo $e['type']; ?></td>
                <td><?php echo $e['number_vouchers']; ?></td>
                <td>
                    <?php if ($get_user_voucher_new >= $e['number_vouchers']) { ?>
                        <a data-toggle="modal" data-target="#myModal"
                           onclick="document.getElementById('claimid').value='<?php echo $e['id'] ?>'"
                           class="btn btn-primary btn-sm"   style="color: white;">Claim For Reward</a>
                        <!-- <a href="<?php echo site_url('income/reward_remove/' . $e->id) ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Are you sure want to delete this reward ?')">Delete</a> -->
                    <?php } ?>
                </td>
                         
            </tr>
        <?php } ?>
    </table>
</div>
<div class="pull-right">
    <?php echo $this->pagination->create_links(); ?>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title">Delivery Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
            </div>
            <div class="modal-body">
                <?php echo form_open('member/claim_voucher_reward') ?>
                <label>Enter Delivery/Courier Detail</label>
                <input type="hidden" name="claimid" value="" id="claimid">
                <textarea class="form-control" name="tdetail" required></textarea> 
                
            </div>
            <div class="modal-footer">
                <div class="pull-left" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success">Claim Reward Now</button>

                </div>
                <div class="pull-right" style="margin-top: 10px;">
                     <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    
                </div>
                <?php echo form_close() ?>
            </div>
           
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("claim_voucher").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
