<?php
$this->db->where('status', 'Un-Paid')->order_by('id', 'ASC');
$data = $this->db->get('withdraw_request')->result();
?>
<hr/>
<?php if (empty($data)) { ?>
    <h2> There is no pending withdrawal request </h2>
<?php } else { 
     if(config_item('coinpayment_payout')=="Yes")
     { ?>
       <p style="color:blue;">Note:Check your Email in case you want to confirm withdrawal process</p>
       <?php 
     } ?>

<div class="row" style="display: none;">
  <div class="pull-right">
     <form method="post" action='export_withdrawl_request'>
        <input type="submit" class="btn btn-success" name="export_withdrawl_request" value="Download Customized Report" class="btn btn-primary" />
    </form>
  </div><!-- File upload form -->
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link active" id="complete-tab" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="true"><?php echo "Complete Details"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="bank-tab" data-toggle="tab" href="#bank" role="tab" aria-controls="bank" aria-selected="false"><?php echo "Bank Upload"; ?></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pay_all" data-toggle="tab" href="#pay" role="tab" aria-controls="pay" aria-selected="false"><?php echo "Pay All"; ?></a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane  active" id="complete" role="tabpanel" aria-labelledby="complete-tab" >
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead class="bg bg-success">
              <tr style="font-weight: bold; font-size: 14px;">
                  <td>S.N.</td>
                  <td>User ID</td>
                  <td>Amount</td>
                  <td>Admin Charge (%) </td>
                  <td>Tax (%)</td>
                  <td>Net Payable</td>
                  <td>Request Date</td>
                  <td>Mode</td>
                  <td>Account Detail</td>
                  <!--<td>Address</td>-->
                  <td class="noExport">#</td>
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
                      <td><?php echo config_item('currency') . $e->amount ?></td>
                      <td><?php echo $e->amount ?> </td>
                      <td><?php echo $e->tax ?> %</td>
                      <td><?php echo config_item('currency') . $e->net_paid ?></td>
                      <td><?php echo date("Y-m-d h:i A",strtotime($e->date)); ?></td>
                      <td><?php echo $e->mode ?></td>
                      <td style="font-size:12px;">
                          <?php
                          $data = $this->db_model->select_multi('bank_ac_no, bank_name, bank_ifsc, bank_branch, btc_address, tcc_address, googlepay_no, phonepay_no, upi_id,status,mobile_no,mobile_name', 'member_profile', array('userid' => $e->userid));
                          if($e->mode=="bank")
                          {
                           echo '<strong>Name:&nbsp;</strong> ' . $this->db_model->select('name', 'member', array('id' => $e->userid)) . "<br/>";
                           if(config_item('enable_kyc')=='Yes'){
                              echo $data->status == 'completed' ? '<strong>KYC:&nbsp;</strong><span style="color:green">Compliance</span><br/>' : '<strong>KYC:&nbsp;</strong><span style="color:red">Non Compliance</span><br/>';
                              echo '<strong>PAN:&nbsp;</strong> ' . $this->db_model->select('tax_no', 'member_profile', array('userid' => $e->userid)) . "<br/>";
                           }
                           echo $data->bank_name ? '<strong>Bank Name:</strong> ' . $data->bank_name . '<br/>' :'<strong>Mobile Money No: </strong>'.$data->mobile_no;
                           echo $data->bank_ac_no ? '<strong>A/C No:</strong> ' . $data->bank_ac_no . '<br/>' : '<strong>Mobile Money Name:</strong> '.$data->mobile_name;
                           echo $data->bank_ifsc ? '<strong>IFSC:</strong> ' . $data->bank_ifsc . '<br/>' : '';
                           echo $data->bank_branch ? '<strong>Bank Branch:</strong> ' . $data->bank_branch . '<br/>' : '';
                           echo $data->upi_id ? '<strong>UPI ID:</strong> ' . $data->upi_id . '<br/>' : '';
                           echo $data->googlepay_no ? '<strong>GooglePay:</strong> ' . $data->googlepay_no . '<br/>' : '';
                           echo $data->phonepay_no ? '<strong>PhonePe:</strong> ' . $data->phonepay_no . '<br/>' : '';
                          }
                          elseif($e->mode=="Mobile Money"){
                            echo '<strong>Name:&nbsp;</strong> ' . $this->db_model->select('name', 'member', array('id' => $e->userid)) . "<br/>";
                            echo $data->mobile_no ? '<strong>Mobile Money No: </strong>'.$data->mobile_no . '<br/>' :'';
                            echo $data->mobile_name ? '<strong>Mobile Money Name:</strong> '.$data->mobile_name . '<br/>' : '';
                            }
                           elseif($e->mode=="bitcoin"){
                            echo trim($data->btc_address) != '' ? '<strong>BTC Add:</strong> ' . $data->btc_address . '<br/>' : '';
                           }
                             
                          ?>
                      </td>
                      <!--<td><?php echo $e->address ?></td>-->
                      <td>
                        <div style="display: flex;">
                          
                        <a data-toggle="modal" data-target="#myModal"
                             onclick="document.getElementById('payid').value='<?php echo $e->id ?>'"
                             class="btn btn-primary btn-sm mr-1" style="color: white;">Pay</a>
                          <a href="<?php echo site_url('income/hold/' . $e->id) ?>" class="btn btn-warning btn-sm mr-1">Hold</a>
                          <a href="<?php echo site_url('income/remove/' . $e->id) ?>" class="btn btn-danger btn-sm mr-1"
                             onclick="return confirm('Are you sure want to delete this payout ?')">Delete</a></td>
                             </div>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
      </div>
    </div>
    <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="bank-tab">
      <div class="table-responsive">
         <table class="table table-bordered" id="DTable" data-page-length='100' data-name="Withdrawal_list" data-export='Yes'>
              <thead class="bg bg-info">
              <tr>
                  
                  <th>Beneficiary Name (Mandatory)<br><br>Full name of the customer - eg: Bruce Wayne</th>
                  <th>Beneficiary Account number (Mandatory)<br><br>Beneficiary Account number to which the money should be transferred</th>
                  <th>IFSC code (Mandatory)<br><br>IFSC code of beneficary's bank. eg:KKBK0000958</th>
                  <th>Payment id</th>
                  <th>Amount (Mandatory)<br><br>Amount that needs to be transfered. Eg: 100.00</th>
                  <th>Description / Purpose (Optional)<br><br>For Internal Reference eg: For salary</th>
                  <th>Transaction ID</th>
              </tr>
              </thead>
              <tbody>

              <?php foreach ($bank as $e) {?>
                  <tr>

                      <td><?php echo $e->name ?></td>
                      <td><?php echo $e->bank_ac_no ?></td>
                      <td><?php echo $e->bank_ifsc ?></td>
                      <td><?php echo $e->id ?></td>
                      <td><?php echo $e->net_paid ?></td>
                      <td><?php echo $e->remarks ?></td>
                      <td></td>
                  </tr>
              <?php } ?>
              </tbody>
          </table>
        </div>
    </div>

    <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="">
      <div class="table-responsive">
        <!--<form method="post" id="import_withdraw">-->
               <?php echo form_open_multipart('income/pay_all') ?>
               <br>
                <label for="pay_all" class="control-label">Upload all payment list</label>
                <input type="file" name="pay_all" accept=".xls, .xlsx">
                <br>
                <input type="submit" name="submit" value="Pay Now" class="btn btn-info"> 

                <?php echo form_close() ?>

        <!--</form>-->
      </div>
    </div>
</div>

<?php } ?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="mo_dal">
            <div class="modal-header">
               <h4 class="modal-title">Payout Detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('income/pay') ?>

                <label>Enter Transaction Detail</label>
                <input type="hidden" name="payid" value="" id="payid">
                <textarea class="form-control" name="tdetail"></textarea>
                         
                <div class="pull-left" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success">Pay Now</button>

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
        document.getElementById("earningpay").classList.add('active');
        document.querySelector("#earningpay > ul > li:nth-child(3) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>
  <script>
   <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
     $(document).ready(function () {
      document.getElementById("mo_dal").style.height = "220px"; 
     });
            
      <?php } ?> 
      </script>
