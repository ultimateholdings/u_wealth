<?php

?>
<?php echo form_open() ?>
<div class="col-md-12 col-sm-12 mt-5" id='epin_deposit'>
    <div class="panel-body">
      <div class="content" id="margin" >
        <div class="container-fluid">
          <div class="row" style="width: 100%;">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary" style="background: #200087;">
                  <h4 class="card-title" style="color:white;">Fund My Wallet</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hovered" style="border:1px solid #ddd;">
                      <thead>

                        <tr style="font-size: 14px;">
                          <td>Available Wallet Balance:</td>
                          <td><?php echo config_item('currency') . $this->db_model->select('balance', 'wallet', array('userid' => $this->session->user_id)) ?></td>  
                        </tr>
                        
                      </thead>
                      <tbody>
                      	<?php if (config_item('enable_epin') == "Yes") { ?>
                      	<tr>
                      		<td>Enter e-PIN to redeem:</td>
                      		<td><input type="text" style="width:150px;" name="epin" class="form-control"></td>
                       </tr>
                      <?php } ?>
                      <?php if (config_item('enable_pg') == "Yes") { ?>
                       <tr style="display:none;">
                      		<td></td>
                      		<td>oR</td>
                       </tr>
                     	
                       <tr style="display:none;">
                      		<td>Enter Amount to fund using <span style="color: blue;">Payment Gateway:</td>
                      		<td><input type="text" style="width:150px;" name="amount" class="form-control"><br/></td>
                       </tr>
                        <?php
                          $this->load->config('pg');
                          if (config_item('enable_coinpayments') == "Yes") 
                          {
                          ?>
                           <!--<label>Select Coin</label>
                               <select class="form-control" name="coin_wallet">
                               <option value="BTC">Bitcoin</option>
                               <option value="XRP">Ripple</option>
                               <option value="ETH">Ethereum</option>
                               <option value="BCH">Bitcoin Cash</option>
                               <option value="LTCT">Litecoin</option>
                               </select>-->
                         <?php
                          }?>
                 <?php } ?><br/>
                 <?php $date1=strtotime('now');
                  $date2=strtotime('now') - 1800;//1800 for half hr
                  //$type = $this->session->_type_ == 'wallet' ? 'Wallet Topup' : 'Registration Fee';
                   $count=$this->db_model->count_all('transaction',
              array('userid'=>$this->session->_user_id_,'email_id'=>$this->session->_email_,'Status'=>"Started",'time <='=>$date1,'time >=' =>$date2));
               debug_log($this->db->last_query());
               debug_log("transactiontable".$count);?>
                 <tr>
                       <td></td>
                        <td>
                         <button class="btn btn-success" name="submit" value="add">Proceed</button>
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
        document.getElementById("deposit").classList.add('active');
        document.querySelector("#epin_deposit > a > span").setAttribute('style', 'color: darkorange !important;');
    });
</script>