<?php
$this->db->where(array('status'=>'Processing','to_userid'=>'Admin'));
$data = $this->db->get('transaction')->result();
?>

<hr/>
<div class="table-responsive">
    <table class="table table-bordered" id="DTable" data-page-length='100' data-name="Pending_bank_payment_list" data-export='Yes'>
        <thead>
        <tr style="font-weight: bold; font-size: 14px;">
            <th>S.N.</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Amount</th>
            <th>Transaction Id</th>
            <th>gateway</th>
            <th class="datefilter" style="border-bottom: 1px solid  #F5F5F5;">Date</th>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
            <th>Remarks</th>
            <?php } ?>
            <th class="noExport">#</th>
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
                <td><?php echo $e->phone ?></td>
                <td><?php echo config_item('currency') . $e->amount ?></td>
                <td><?php echo $e->transaction_id ?> </td>
                <td><?php echo $e->gateway ?></td>
                <td><?php echo date("Y-m-d h:i A",$e->time); ?></td>                
                <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
                <td><?php echo $e->remarks; ?></td>
                <?php } ?>

                <!--<td><?php echo $e->address ?></td>-->
                <td>
                    <div style="display: flex;">
                        

                    <a href="<?php echo site_url('income/approve/' . $e->id) ?>" class="btn btn-success btn-sm mr-1">Approve</a>
                    <a href="<?php echo site_url('income/reject/' . $e->id) ?>" class="btn btn-danger btn-sm">Reject</a>
                                        </div>
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
        document.querySelector("#deposit > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>