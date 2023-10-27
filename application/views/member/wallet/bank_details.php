<style type="text/css">
  #deposit td:nth-child(1){
    color: blue;
    font-size: 14px;
    font-weight: 600;
  }
  @media screen and (min-width: 991px) {
  #deposit td:nth-child(2){
    text-align: left;
    padding-left: 70px;
  }
  }
</style>

<?php  if($new_time >0) { ?>
  <div class="row">
    <br>
      <div class="col-sm-12 alert" >
            <h3 class="h">Time Left To Complete Your Payment :-</h3><br>
              <div class="countdownTimer text-center ">
                <div class="countdownTimerCell">
                  <span id="days"></span>
                  <br>
                  <span class="timeDescription">Days</span>
                </div>
                <div class="countdownTimerCell">
                  <span id="hours"></span>
                  <br>
                  <span class="timeDescription">Hrs</span>
                </div>
                <div class="countdownTimerCell">
                  <span  id="minutes"></span>
                  <br>
                  <span class="timeDescription">Mins</span>
                </div>
                <div class="countdownTimerCell">
                  <span id="seconds"></span>
                  <br>
                  <span class="timeDescription">Secs</span>
                </div>
              </div>
      </div>
  </div>
<?php }?>

<?php echo form_open() ?>
<div class="col-md-12 col-sm-12" id='deposit'>
    <div class="panel-body">
      <div class="content mt-4" style="margin-left: 10px;">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="background: #200087;">
                  <h4 class="card-title" style="color:white;">Deposit Through Bank</h4><!-- <span> Amount: <?php echo $to_id; ?></span> -->
                    
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hovered" style="border:1px solid #ddd;">
                      <thead>
                        <?php $user_id= $this->uri->segment('4') ? $this->uri->segment('4') : ''; 
                          $upline=$this->db_model->select_multi('name, phone', 'member', array('id' => $user_id));
                          $bank_details=$this->db_model->select_multi('*', 'member_profile', array('userid' => $user_id));                          
                          if(strlen($user_id)>0){ ?>
                        <tr>
                          <td>IMPS/NEFT/RTGS/UPI:</td>
                          <td style="font-size: 14px;">
                            <strong>BENEFICIARY NAME:&nbsp;&nbsp;</strong><?php echo $upline->name;?><br/>
                              <strong>A/C NUMBER:&nbsp;&nbsp;</strong><?php echo $bank_details->bank_ac_no?> <br/>
                              <strong>BANK NAME:&nbsp;&nbsp;</strong><?php echo $bank_details->bank_name;?><br/>
                              <strong>IFSC CODE:&nbsp;&nbsp;</strong><?php echo $bank_details->bank_ifsc?><br/>
                              <strong>BRANCH:&nbsp;&nbsp;</strong><?php echo $bank_details->bank_branch?><br/> 
                              <strong>A/C TYPE:&nbsp;&nbsp;</strong><?php echo $bank_details->account_type?><br/>
                              <strong>Contact Number:&nbsp;&nbsp;</strong><?php echo $upline->phone?><br/>
                              <?php if(config_item('company_upi')!=""){ ?>
                              <strong>UPI:&nbsp;&nbsp;</strong><?php echo $bank_details->upi_id?><br/>
                            <?php } ?>
                            <?php if(config_item('googlepay_no')!=""){ ?>
                              <strong>Google Pay:&nbsp;&nbsp;</strong><?php echo $bank_details->googlepay_no?><br/>
                            <?php } ?>
                            <?php if(config_item('phonepay_no')!=""){ ?>
                              <strong>Phone Pay:&nbsp;&nbsp;</strong><?php echo $bank_details->phonepay_no?><br/>
                            <?php } ?>
                          </td>  
                        </tr>
                      <?php }else{ ?>
                        <tr>
                          <td>IMPS/NEFT/RTGS/UPI:</td>
                          <td style="font-size: 14px;">
                            <?php if(file_exists(FCPATH .'uploads/upi.png')){ ?>
                              <div class="col-md-5">
                              <img src="<?php echo base_url();?>uploads/upi.png" alt="" style="width:200px; height:auto;">
                              </div>
                              <?php } ?>
                              <div class="col-md-7">
                              <strong>BENEFICIARY NAME:&nbsp;&nbsp;</strong><?php echo config_item('account_name')?><br/>
                              <strong>A/C NUMBER:&nbsp;&nbsp;</strong><?php echo config_item('account_no')?> <br/>
                              <strong>BANK NAME:&nbsp;&nbsp;</strong><?php echo config_item('bank_name')?><br/>
                              <strong>IFSC CODE:&nbsp;&nbsp;</strong><?php echo config_item('ifsc')?><br/>
                              <strong>BRANCH:&nbsp;&nbsp;</strong><?php echo config_item('branch')?><br/> 
                              <strong>A/C TYPE:&nbsp;&nbsp;</strong><?php echo config_item('accounttype')?><br/>
                              <strong>Contact Number:&nbsp;&nbsp;</strong><?php echo config_item('phone')?><br/>
                              <?php if(config_item('company_upi')!=""){ ?>
                              <strong>UPI:&nbsp;&nbsp;</strong><?php echo config_item('company_upi')?><br/>
                            <?php } ?>
                            <?php if(config_item('googlepay_no')!=""){ ?>
                              <strong>Google Pay:&nbsp;&nbsp;</strong><?php echo config_item('googlepay_no')?><br/>
                            <?php } ?>
                            <?php if(config_item('phonepay_no')!=""){ ?>
                              <strong>Phone Pay:&nbsp;&nbsp;</strong><?php echo config_item('phonepay_no')?><br/>
                            <?php } ?>
                            </div>
                          </td>  
                        </tr>
                      <?php } ?>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Deposit Amount(<?php echo config_item('iso_currency')?>):</td>
                          <td><?php echo $amount;?> </td>
                       </tr>
                       <tr>
                           <td>Choose Payment Mode:</td>
                           <td><select name="payment_mode">
                                <?php if(config_item('enable_upi')=='Yes'){?>
                                <option value="company_upi">UPI</option>
                                <option value="googlepay">Google Pay</option>
                                <option value="phonepay">Phone Pay</option>
                                <?php } ?>
                                <option value="Bank Deposit">Bank deposit</option>
                               </select>
                            </td>
                       </tr>
                       <tr>
                          <td>Deposit UTR/Txn No:</td>
                          <td><input type="hidden" name="amount1" id="amount1" class="form-control" value="<?php echo $amount;?>">
                            <input type="text" style="width:250px;" name="txn_no" id="txn_no" class="form-control" required>
                          </td>
                      </tr>
                      <?php if(config_item('crowdfund_type')=='Manual_Peer_to_Peer'){ ?>
                      <input type="text" name="payment_remarks" id="payment_remarks" class="form-control" value="<?php echo $member_data['payment_remarks'];?>">
                      <input type="hidden" name="secret" id="secret" class="form-control" value="<?php echo $member_data['cs_secret'];?>">
                      <?php } ?>
                      <tr>
                       <td></td>
                        <td>
                         <button class="btn btn-success" name="submit" value="add" onclick="before_show()">Proceed</button>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><strong>Payment Instructions:<ul><li>Please transfer the amount to the Bank mentioned above.</li><li>After transferring enter the Transaction No. and click Proceed.</li><li>Please wait some time to receive confirmation.</li>
                        <li>
                        Raise Support Ticket incase of any issues.</ul></strong></td>
                      </tr>
              </tbody>
             </table>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
    </div>
 </div>
<?php echo form_close() ?>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementsByClassName('active')[0].classList.remove('active');
        document.getElementById("deposit").classList.add('active');
        document.querySelector("#deposit > ul > li:nth-child(2) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script>
  function before_show() {
        if(document.getElementById("txn_no").checkValidity())
        {
          show();
        }
    }
    function show() {
        $('#deposit').hide('');
        $('#load').show('');
    }
</script>
