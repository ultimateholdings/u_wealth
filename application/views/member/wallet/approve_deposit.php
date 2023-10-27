<?php
$this->db->where(array('status'=>'Processing','to_userid'=>$this->session->user_id));
$data = $this->db->get('transaction')->result();
//ebug_log($this->db->last_query());
//print_r($data);exit();
?>

<hr/>
     
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr style="font-weight: bold; font-size: 14px;">
            <th>S.N.</th>
            <th>Sender ID</th>
            <th>Sender Name</th>
            <th>Sender Phone</th>
            <th>Sender Email</th>
            <th>Amount</th>
            <th>Transaction Id</th>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
            <th>Remarks</th>
            <?php } ?>
            <th>Date</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody style="font-size: 14px;">
        <?php
        $sn = 1;
        foreach ($data as $e) {
            $sd = $this->db_model->select_multi('*','member',array('id'=>$e->userid));
            $phone = $sd->phone;
            $email = $sd->email;
            ?>
            <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo config_item('ID_EXT') . $e->userid ?></td>
                <td><?php echo $e->name ?></td>
                <td><?php echo $phone ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->transaction_id ?> </td>
                <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
                <td><?php echo $e->remarks; ?></td>
                <?php } ?>
                <td><?php echo date("Y-m-d h:i A",$e->time); ?></td>
                <!--<td><?php echo $e->address ?></td>-->
                <td><a href="<?php echo site_url('member/approve/' . $e->id) ?>" class="btn btn-success btn-xs">Approve</a>
                    <a href="<?php echo site_url('member/reject/' . $e->id) ?>" class="btn btn-danger btn-xs">Reject</a>
               </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

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
        document.querySelector("#approve_deposit > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>