<?php
$this->db->where(array('status'=>'Completed'))->like('gateway', 'bank', 'BOTH')->order_by('id','DESC');
$data = $this->db->get('transaction')->result();
//print_r($data);exit();
?>

<hr/>
<?php if (empty($data)) { ?>
    <h2> There are no Bank Payments </h2>
<?php } else { ?>
     
<div class="table-responsive">
    <table class="table table-striped table-bordered" id="DTable" data-page-length='100' data-name="Completed_bank_payment_list" data-export='Yes'>
        <thead>
        <tr style="font-weight: bold; font-size: 14px;">
            <td>S.N.</td>
            <td>Sender ID</td>
            <td>Sender Name</td>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
            <td>Recipient ID</td>
            <td>Recipient Name</td>
            <?php } ?>
            <td>Amount</td>
            <td>Transaction Id</td>
            <td class="datefilter">Date</td>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
            <th>Remarks</th>
            <?php } ?>
            <td>Status</td>
            <!--<td>Address</td>-->
           <!-- <td>#</td>-->
        </tr>
        </thead>
        <tbody style="font-size: 14px;">
        <?php
        $sn = 1;
        foreach ($data as $e) {
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                <td><?php echo $e->name ?></td>
                <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ 
                    if(strtolower($e->to_userid) == 'admin'){
                    $name = 'Admin';
                    }else{
                        $td = $this->db_model->select_multi('*','member',array('id'=>$e->to_userid));
                        $name = $td->name;
                    }
                ?>
                <td><?php echo $e->to_userid ?></td>
                <td><?php echo $name ?></td>
                <?php } ?>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->transaction_id ?> </td>
                <td><?php echo date("Y-m-d h:i A",$e->time); ?></td>
                <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
                <td><?php echo $e->remarks; ?></td>
                <?php } ?>
                <td><?php echo $e->status; ?></td>
                <!--<td><?php echo $e->address ?></td>-->
               <!-- <td><a href="<?php echo site_url('income/approve/' . $e->id) ?>" class="btn btn-success btn-xs">Approve</a>
                    <a href="<?php echo site_url('income/approve/' . $e->id) ?>" class="btn btn-warning btn-xs">Reject</a>
               </td>
            </tr>-->
        <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Payout Detail</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('income/pay') ?>
                <label>Enter Transaction Detail</label>
                <input type="hidden" name="payid" value="" id="payid">
                <textarea class="form-control" name="tdetail"></textarea>
                <div class="pull-right">
                    <button type="submit" class="btn btn-success">Pay Now</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("deposit").classList.add('active');
        document.querySelector("#deposit > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>