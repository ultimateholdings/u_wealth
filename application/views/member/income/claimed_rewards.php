<?php

?>
<p>&nbsp;</p>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr class="table-info table-bordered">
            <th style="border: 1px solid #80808042;">SN</th>
            <th style="border: 1px solid #80808042;">User ID</th>
            <th style="border: 1px solid #80808042;">Reward Name</th>
            <th style="border: 1px solid #80808042;">Plan ID</th>
            <th style="border: 1px solid #80808042;">Reward Type</th>
            <th style="border: 1px solid #80808042;">Voucher Numbers</th>
            <th style="border: 1px solid #80808042;">Delivery Details</th>
            <th style="border: 1px solid #80808042;">Status</th>
            <!-- <th>Feedback</th> -->
            
        </tr>
        <?php
        $sn = 1;
        foreach ($rewards as $e) { ?>
            <tr>

                <?php 

                    $this->db->select('*')->from('voucher_rewards_setting')->where('id',$e['voucher_id']);

                    $get_voucher_details = $this->db->get()->row_array();
                    /*$get_voucher_details = $this->db_model->select_multi('*', '', array('userid' => $this->session->user_id));

                    $get_user_voucher_new=$get_user_voucher/35;*/
                ?>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $e['user_id']; ?></td>
                <td><?php echo $get_voucher_details['name']; ?></td>
                <td><?php echo $get_voucher_details['plan_id']; ?></td>  
                <td><?php echo $get_voucher_details['type']; ?></td>  
                <td><?php echo $get_voucher_details['number_vouchers']; ?></td>     
                <td><?php echo $e['tdetail']; ?></td>
                <td>
                    <?php 

                        if($e['status']=="Pending")
                        { ?>
                            <a class="btn btn-warning btn-sm" style="color: white;">Pending</a>
                        <?php } 
                        elseif($e['status']!="Pending")
                        { ?>
                            <a class="btn btn-success btn-sm" style="color: white;">Completed</a>
                    <?php    }

                    ?>
                        
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
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
