<?php
$top_id = $this->session->user_id;
$this->db->select('*')->from('transaction')->where('userid', htmlentities($top_id));
$this->db->limit(100)->order_by('id','DESC');
$data = $this->db->get()->result();

?>
<a class="btn btn-pink btn-xs"  value="<?php echo config_item('currency').$member_data['wallet_balance'];?>" id="co_lor" style="margin-top:2px;color: white;"><i class="fa fa-money"></i>   Wallet Balance: <?php echo config_item('currency').$member_data['wallet_balance'];?></a><div>&nbsp;</div>

 <div class="card-header card-header-primary" style="padding: 10px;">
                                    <h4 class="card-title" style="font-size: 20px;font-weight: 900;" >Latest Earnings</h4>
                                    <p class="card-category" style="font-size: 12px;margin-bottom: 0px;" > Here is the latest earnings details</p>
                                </div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th>S.N.</th>
            <th>Recipient ID</th>
            <th>Recipient Name</th>
            <?php if(config_item('crowdfund_type') =='Manual_Peer_to_Peer') { ?>
            <th>Recipient Phone</th>
            <th>Recipient Email</th>
            <?php } ?> 
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Gateway</th>
            <th>Transaction Id</th>
            <?php if(config_item('crowdfund_type') !='Manual_Peer_to_Peer') { ?>
            <?php if(config_item('enable_coinpayments') != 'Yes'){ ?>
            <th>Payment Request Id</th>
            <?php } else { ?>
            <th>Remarks</th>
            <?php } ?>
            <?php } else { ?>
            <th>Remarks</th>
            <?php } ?>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        $sn = count($data);
        foreach ($data as $e) {

        if(strtolower($e->to_userid) == 'admin'){
            $name = 'Admin';
            $phone = config_item('phone');
            $email = config_item('email');
        }else{
            $td = $this->db_model->select_multi('*','member',array('id'=>$e->to_userid));
            $name = $td->name;
            $phone = $td->phone;
            $email = $td->email;
        }
        ?>
        <tr>
            <td><?php echo $sn--; ?></td>
            <td><?php echo config_item('ID_EXT'). $e->to_userid ?></td>
            <td><?php echo $name ?></td>
            <?php if(config_item('crowdfund_type') =='Manual_Peer_to_Peer') { ?>
            <td><?php echo $phone ?></td>
            <td><?php echo $email ?></td>
            <?php } ?>
            <td><?php echo config_item('currency') . $e->amount ?></td>
            <td><?php echo $e->purpose ?></td>
            <td><?php echo $e->gateway ?></td>
            <td><?php echo $e->transaction_id ?></td>
            <?php if(config_item('crowdfund_type') !='Manual_Peer_to_Peer') { ?>
            <?php if(config_item('enable_coinpayments') != 'Yes'){ ?>
            <td><?php echo $e->payment_request_id ?></td>
            <?php } else { ?>
            <td><?php echo $e->remarks ?></td>
            <?php } ?>
            <?php } else { ?>
            <td><?php echo $e->remarks ?></td>
            <?php } ?>
            <td><?php echo date("Y-m-d h:i A",$e->time); ?></td>
            <td><?php echo $e->status ?></td>
        </tr>
        <?php } ?>
    </table>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("deposit").classList.add('active');
        document.querySelector("#online_transactions > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
  <script>
   <?php if((config_item('member')=='member/default/base') ) { ?>
     $(document).ready(function () {
      document.getElementById("co_lor").style.color = "black"; 
     });
            
      <?php } ?> 
      </script>
