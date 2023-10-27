<style type="text/css">
  #withdraw td:nth-child(1){
    font-size: 14px;
    font-weight: 600;
  }
  #withdraw td:nth-child(2){
    text-align: left;
    padding-left: 40px;
    font-size: 14px;
  }
</style>

<?php

$payout=$this->db_model->select_multi('*', 'payout', array('plan_id' => $member->signup_package));

$member_profile=$this->db_model->select_multi('*', 'member_profile', array('userid' => $this->session->user_id));

debug_log("member_profile");
debug_log($member_profile);


$exclude_ids = array();

$min_sponsor = in_array($this->session->user_id, $exclude_ids,true) ? 0 : $payout->min_sponsor;

if($payout->daily_capping>0){
    $withdrawn_amount = $this->db_model->sum('amount','withdraw_request', array('userid'=>$this->session->user_id, 'date >='=>date('Y-m-d')));
    $capping_text = 'Daily Capping Alert!!!<br> The Daily Capping for Withdrawal is '.config_item('currency').$payout->daily_capping.'. You are eligible to Withdraw '.config_item('currency').($payout->daily_capping-$withdrawn_amount).' for Today !!!';
}

if($payout->payout_frequency==0){
  $start = '00:00:00';
  $end = '24:00:00';
} else if($payout->payout_frequency == 1)
{
  $text = 'Attention Members!!!<br>Withdrawal Request Timing is Monday to Friday '.date("h:i A",strtotime($payout->payout_start)).' to '.date("h:i A",strtotime($payout->payout_end));
  if(in_array(date("l"), array("Saturday", "Sunday"))){
    $start = '25:00:00';
    $end = '00:00:00';  
  } else{
    $start = $payout->payout_start;
    $end = $payout->payout_end;  
  }
}else if($payout->payout_frequency == 2) {
  $start = $payout->payout_start;
  $end = $payout->payout_end;
  $text = 'Attention Members!!!<br>Withdrawal Request Timing is '.date("h:i A",strtotime($payout->payout_start)).' to '.date("h:i A",strtotime($payout->payout_end));
}

$style = config_item('member')=='member/mega/index' ? 'light' : 'info';

?>
<?php echo form_open() ?>

 <div class="col-lg-12 col-sm-12" id='withdraw'>
    <div class="panel-body" style="max-width: 800px;">
      <div class="content" id="margin3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary" style="background: #200087;">
                  <h4 class="card-title" style="color:white;">Withdraw Wallet Funds</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php if($payout->payout_frequency > 0){ ?>
                    <div class="alert alert-<?php echo $style; ?>">
                      <p class="card-category" style="color:green;font-size: 14px;" ><?php echo $text ?></p>
                    </div>
                    <?php } ?>
                    <?php if($payout->daily_capping > 0){ ?>
                    <div class="alert alert-<?php echo $style; ?>">
                      <p class="card-category" style="color:green;font-size: 14px;" ><?php echo $capping_text ?></p>
                    </div>
                    <?php } ?>
                    <table class="table table-hovered" style="border:1px solid #ddd;">
                      <tbody>
                        <tr>
                          <td>Available Wallet Balance:</td>
                          <td><?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)) ?></td>  
                        </tr>
                       <tr>
                        <td>Daily Capping:</td>
                        <td><?php if($payout->daily_capping > 0 ) {echo config_item('currency') . $payout->daily_capping; } else {echo 'No Limit';} ?></td>
                       </tr>
                       <tr>
                        <?php $min_withdraw=$payout->min_withdraw; ?>
                        <td>Minimum Amount:</td>
                        <td><?php echo config_item('currency') . $min_withdraw ?></td>
                       </tr>
                       <tr>
                        <td>Withdrawal Mode</td>
                        <td>
                          <select name="mode" id="mode" onchange="payment_type_select1()" required>
                              <option value="0">Select</option>
                              <?php if($member_profile->payment_type== 1){ ?>
                              <option value="1">Bank</option>
                              <?php } elseif($member_profile->payment_type== 2) { ?>
                              <option value="2">Mobile Money</option>
                              <?php } ?>
                              <?php if(config_item('enable_crypto')=='Yes'){ ?>
                              <option value="bitcoin">Bitcoin</option></select>
                              <?php } ?>
                        </td>
                       </tr>
                       <tr id="bank_details1" style="display:none">
                        <?php if(config_item('coinpayment_payout') != 'Yes') 
                         { ?>
                        <td>Bank Details<br/><a style="color:blue;" href="<?php if(($data->bank_status!="completed") ) {echo site_url('member/bankdetails');} else{echo site_url('member/bankdetails'); }?>">Click here to update</a></td>
                        <td>
                         <?php
                         echo '<strong>Beneficiary Name:&nbsp;</strong> ' . $member->name . "<br/>";
                         
                         echo $member_profile->bank_name ? '<strong>Bank Name:</strong> ' . $member_profile->bank_name . '<br/>' : '';
                         echo $member_profile->bank_ac_no ? '<strong>A/C No:</strong> ' . $member_profile->bank_ac_no . '<br/>' : '';
                         echo $member_profile->bank_ifsc ? '<strong>IFSC:</strong> ' . $member_profile->bank_ifsc . '<br/>' : '';
                         echo $member_profile->bank_branch ? '<strong>Bank Branch:</strong> ' . $member_profile->bank_branch . '<br/>' : '';
                         
                         
                         }
                         ?>
                        </td>
                       </tr>
                       <tr id="mobile_details1" style="display:none">
                        <?php if(config_item('coinpayment_payout') != 'Yes') 
                         { ?>
                        <td>Mobile Details<br/><a style="color:blue;" href="<?php if(($data->bank_status!="completed") ) {echo site_url('member/bankdetails');} else{echo site_url('member/bankdetails'); }?>">Click here to update</a></td>
                        <td>
                         <?php
                         echo '<strong>Beneficiary Name:&nbsp;</strong> ' . $member->name . "<br/>";
                         
                         echo $member_profile->network_carrier ? '<strong>Network Carrier:</strong> ' . $member_profile->network_carrier . '<br/>' : '';
                         echo $member_profile->mobile_no ? '<strong>Mobile Money No:</strong> ' . $member_profile->mobile_no . '<br/>' : '';
                         echo $member_profile->mobile_name ? '<strong>Mobile Money Name:</strong> ' . $member_profile->mobile_name . '<br/>' : '';
                                      
                         }
                         ?>
                        </td>
                       </tr>
                       <!-- <tr id="bitcoin_details">
                        <td>Bitcoin Address<br/><a style="color:blue;" href="<?php echo site_url('member/bankdetails')?>">Click here to update</a></td>
                        <td><?php 
                         echo trim($mp->btc_address) != '' ? '' . $mp->btc_address . '<br/>' : '';
                       ?></td>
                       <input type="hidden" name="address" id="address" value="<?= $mp->btc_address ?>">
                       </tr>
                       <tr> -->
                        <td>Withdrawal Amount (<?php echo config_item('currency')?>):</td>
                        <td><input type="number" name="amount" required class="form-control" value="" style="width:150px;"></td>
                       </tr>
                       <?php if(config_item('coinpayment_payout')=="Yes"){?>
                       <tr>
                        <td>Select Currency:</td>
                        <td>
                         <select style="width:150px;" name="currency" id="currency" class="form-control" required>
                          <option value="BTC">Bitcoin</option>
                          <option value="LTC">Litecoin</option>
                          <option value="BTC.LN">Bitcoin (Lightning Network)</option>
                          <option value="VLX">Velas</option>
                          <option value=" AGX"> AGX</option>
                          <option value="APL"> Apollo</option>
                          <option value="AYA">Aryacoin</option>
                          <option value="BAD">Badcoin</option>
                          <option value="BCD">Bitcoin Diamond</option>
                          <option value="BCH">Bitcoin Cash</option>
                          <option value="BCN">Bytecoin</option>
                          <option value="BEAM">Beam</option>
                          <option value="BITB">Bean Cash</option>
                          <option value="BLK">BlackCoin</option>
                          <option value="BNB"> BNB Coin (Mainnet)</option>
                          <option value="BSV">Bitcoin SV</option>
                          <option value="BTAD"> Bitcoin Adult</option>
                          <option value="BTG"> Bitcoin Gold</option>
                          <option value="BTT"> BitTorrent</option>
                          <option value="CLOAK">CloakCoin</option>
                          <option value="CRW">Crown</option>
                          <option value="CRYP">CrypticCoin</option>
                          <option value="CRYT">CryTrExCoin</option>
                          <option value="CURE">CureCoin</option>
                          <option value="DASH"> Dash</option>
                          <option value="DCR">  Decred</option>
                          <option value="DEV">  DeviantCoin</option>
                          <option value="DGB">DigiByte</option>
                          <option value="DIVI"> Divi</option>
                          <option value="DOGE"> Dogecoin</option>
                          <option value="EBST"> eBoost</option>
                          <option value="EOS"> EOS</option>
                          <option value="ERK"> EurekaCoin</option>
                          <option value="ETC"> Ether Classic</option>
                          <option value="ETH"> Ether</option>
                          <option value="ETN"> Electroneum</option>
                          <option value="EUNO">  EUNO</option>
                          <option value="EXP">  Expanse</option>
                          <option value="FLASH"> FLASH</option>
                          <option value="GAME"> GameCredits</option>
                          <option value="GLC"> Goldcoin</option>
                          <option value="GRS"> Groestlcoin</option>
                          <option value="KMD"> Komodo</option>
                          <option value="LOKI"> Loki</option>
                          <option value="Lisk"> LSK</option>
                          <option value="Latinio"> LTN</option>
                          <option value="MAID"> MaidSafeCoin</option>
                          <option value="MUE"> MonetaryUnit</option>
                          <option value="NAV"> NAV Coin</option>
                          <option value="NEO">  NEO</option>
                          <option value="Namecoin"> NMC</option>
                          <option value="NVST"> NVO Token</option>
                          <option value="NXT">  NXT</option>
                          <option value="OMNI"> Omni</option>
                          <option value="PINK"> PinkCoin</option>
                          <option value="PIVX">  PIVX</option>
                          <option value="PLC">  Platincoin</option>
                          <option value="POT">  PotCoin</option>
                          <option value="PPC"> Peercoin</option>
                          <option value="PROC"> ProCurrency</option>
                          <option value="PURA"> Pura</option>
                          <option value="QTUM"> Qtum</option>
                          <option value="RES"> Resistance</option>
                          <option value="RVN"> Ravencoin</option>
                          <option value="RVR"> RevolutionVR</option>
                          <option value="SBD"> Steem Dollars</option>
                          <option value="SMART"> SmartCash</option>
                          <option value="SOXAX"> SOXAX</option>
                          <option value="STEEM"> STEEM</option>
                          <option value="STRAT"> Stratis</option>
                          <option value="SYS"> Syscoin</option>
                          <option value="TPAY"> TokenPay</option>
                          <option value="TRIGGERS">Triggers</option>
                          <option value="TRX">TRON</option>
                          <option value="UBQ">Ubiq</option>
                          <option value="UCA">Ucacoin</option>
                          <option value="UNIT">UniversalCurrency</option>
                          <option value="USDT">Tether USD (Omni Layer)</option>
                          <option value="VTC">Vertcoin</option>
                          <option value="WAVES">Waves</option>
                          <option value="WCC">WincashCoin</option>
                          <option value="XCP">Counterparty</option>
                          <option value="XEM">NEM</option>
                          <option value="XMR">Monero</option>
                          <option value="XSN"> Stakenet</option>
                          <option value="XSR">SucreCoin</option>
                          <option value="XVG"> VERGE</option>
                          <option value="XZC">ZCoin</option>
                          <option value="ZEC">ZCash</option>
                          <option value="ZEN"> Horizen</option>
                          <option value="LTCT">Litecoin Testnet</option>
                         </select><br/></td>
                       </tr>
                       <?php } ?>
                       <tr>
                        <td></td>
                        <td><?php if($member_data['direct_team']>=$min_sponsor) 
                        {
                         if($member->status != 'Active') { ?>
                            <p class="card-category" style="color:red;font-size: 14px;" > Please activate your acount to withdraw Payouts<br><?php if($member_data['wallet_balance'] >= $member_data['pd']->joining_fee) { ?>
                    <a href="<?php echo site_url('member/Activate') ?>" style="color: blue;">&nbsp;<u>Click Here to Activate Your Account</u></a>
                    <?php } else if($member_data['alert_message'] == ''){?>
                        <a href="<?php echo site_url('member/topup-wallet/'.($member_data['pd']->joining_fee-$member_data['wallet_balance']))?>" style="color: blue;">&nbsp;<u>Click here to Pay <?php echo config_item('currency').($member_data['pd']->joining_fee-$member_data['wallet_balance']) ?> to Activate Your Account</u></a>
                    <?php } ?></p>  
                        <?php } else if(config_item('enable_bank_compliance')=="Yes")
                        {
                          if($mp->bank_status=='completed') { ?>
                            <?php if((date('H:i:s') >= $start) && (date('H:i:s') <= $end)) { ?>
                              <button class="btn btn-success" name="submit" value="add">Withdraw</button>
                            <?php } ?>
                          <?php } else{ ?>
                              <p class="card-category" style="color:red;font-size: 14px;" >Please Enter Your Bank Details to withdraw Payouts <br><a style="color:blue;" href="<?php echo site_url('member/bankdetails')?>">Click here to Complete</a></p>
                          <?php }
                        } else { ?>
                            <?php if((date('H:i:s') >= $start) && (date('H:i:s') <= $end)) { ?>
                           <button class="btn btn-success" name="submit" value="add">Withdraw</button>
                            <?php } ?>
                          <?php }
                          } else { ?>
                          <p class="card-category" style="color:red;font-size: 14px;" > You need to Sponsor Minimum <?php echo $payout->min_sponsor ?> Persons to withdraw Payouts<br><a target = "_blank" style="color:blue;" href="<?php echo base_url();?>site/register/A/<?php echo $member->id;?>">Click here to Sponsor</a></p> 
                        <?php } ?> 
                        </td>
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
        document.getElementById("withdraw").classList.add('active');
        document.querySelector("#aside > ul > li.active > ul > li:nth-child(1) > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    if($('#mode').val() =="bank"){
        $('#bitcoin_details').hide() ;
      }
    $('#mode').change(function(){
     //alert(this.value);
      if(this.value=='bitcoin')
      { 
        $('#bank_details').hide(); 
        $('#bitcoin_details').show() ;
        
       }
      else{
        $('#bank_details').show();
        $('#bitcoin_details').hide() ;
      }
    });
  });

  function payment_type_select1()
  {

      var payment_type = document.getElementById('mode').value;
      
      if(payment_type == 1){
         $('#bank_details1').show();
         $('#mobile_details1').hide();
      }
      if(payment_type == 2){
          $('#mobile_details1').show();
          $('#bank_details1').hide();
         
      }
      if(payment_type == 0){
          $('#mobile_details1').hide();
          $('#bank_details1').hide();
         
      }
  }
</script>





