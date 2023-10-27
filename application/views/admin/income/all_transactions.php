<?php

$top_id = $this->uri->segment('3') ? $this->uri->segment('3') : config_item('top_id');
$this->db->select('t1.*, t2.name as to_name, t2.phone as to_phone')->from('transaction as t1')
->join('(select id, name, phone from member) as t2','t1.userid=t2.id');
$this->db->limit(100)->order_by('id','DESC');
$data = $this->db->get()->result();
?>

<div class="row pull-right">
   <div class="col-sm-12">
     <form method="post" action='export_all_transactions' class="pull-right">
        <input type="submit"  name="export_all_transactions" value="Download Customized Report" class="btn btn-primary" />
    </form>
  </div><!-- File upload form -->
  <div>&nbsp;</div>
</div>
<div class="row col-md-offset-2" style="display: none;">
    <div class="col-sm-5">
        <form method="post" action="<?php echo site_url('wallet/wallet_transactions') ?>">
            <label>Enter User Id</label>
            <input type="text" name="top_id" class="form-control">
            <button class="btn btn-xs btn-danger" type="submit">Search</button>
        </form>
    </div>
    <hr/>
</div>
<div class="table-responsive" style="width: 100%;">
    <table class="table table-bordered" id="DTable" data-page-length='100' data-name="All_transaction_list" data-export='No' style="margin-top: 5px;">
        <thead>
        <tr>
            <td>S.N.</td>
            <td>Sender Details</td>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer') { ?>
                <td>Receiver Details</td>
            <?php } ?>
            <td>Amount</td>
            <?php if(config_item('crowdfund_type')!='Manual_Peer_to_Peer') { ?>
                <td>Payment Mode</td>
            <?php } ?>
            <td>Gateway</td>
            <td>Transaction Id</td>
            <?php if((config_item('enable_coinpayments') != 'Yes')&&(config_item('crowdfund_type')!='Manual_Peer_to_Peer')){ ?>
            <td>Payment Request Id</td>
            <?php } else { ?>
            <td>Remarks</td>
            <?php } ?>
            <td class="datefilter">Date</td>
            <td>Status</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $sn = count($data);
        foreach ($data as $e) {?>
        <tr>
            <td><?php echo $sn--; ?></td>
            <td><?php echo $e->name ?><br>
                <i class="fa fa-id-card-o" aria-hidden="true"></i> : <?php echo config_item('ID_EXT') . $e->userid ?><br>
                <i class="fa fa-phone" aria-hidden="true"></i> :<?php echo $e->phone ?>
            </td>
            <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer') { ?>
                <td><?php echo $e->to_name ?><br>
                <i class="fa fa-id-card-o" aria-hidden="true"></i> : <?php echo config_item('ID_EXT') . $e->to_userid ?><br>
                <i class="fa fa-phone" aria-hidden="true"></i> :<?php echo $e->to_phone ?></td>
            <?php } ?>
            <td><?php echo config_item('currency') . $e->amount ?></td>
            <?php if(config_item('crowdfund_type')!='Manual_Peer_to_Peer') { ?>
                <td><?php echo $e->purpose ?></td>
            <?php } ?>
            <td><?php echo $e->gateway ?></td>
            <td><?php echo $e->transaction_id ?></td>
            <?php if((config_item('enable_coinpayments') != 'Yes')&&(config_item('crowdfund_type')!='Manual_Peer_to_Peer')){ ?>
            <td><?php echo $e->payment_request_id ?></td>
            <?php } else { ?>
            <td><?php echo $e->remarks ?></td>
            <?php } ?>
            <td><?php echo date("Y-m-d h:i A",$e->time); ?></td>
            <td><?php echo $e->status ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("deposit").classList.add('active');
        document.querySelector("#deposit > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
