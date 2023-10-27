<h3 align="center" style="color: #0d638f;">Please Select your Preferred Gateway to pay online !</h3>
<div class="container" style="min-height: 75vh;">
    <?php echo $this->session->flashdata('site_flash') ?>
    <div class="row">
        Dear <?php echo $this->session->_user_name_ ?>,<br/>
        Please follow the below steps &rarr;
        <hr/>
        <div align="center"><i class="fa fa-expeditedssl" style="font-size: 100px"></i></div>
        <div class="panel-group" id="accordion">
            <?php
            if (config_item('enable_paypal') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Pay With Paypal &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse in">
                        <div class="panel-body">The Easiest and safest way to pay online<br/>
                         <form action="<?php echo site_url('gateway/buy/') ?>" method="post">
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="business" value="<?php echo config_item('paypal_email') ?>">
                                <input type="hidden" name="item_name"
                                       value="<?php echo $this->db_model->select('prod_name', 'product', array('id' => $this->session->_product_)); ?>">
                                <input type="hidden" name="item_number" value="<?php echo $this->session->_product_ ?>">
                                <input type="hidden" name="invoice" value="<?php echo $this->session->_inv_id_ ?>">
                                <input type="hidden" name="amount" value="<?php echo $this->session->_price_ ?>">
                                <input type="hidden" name="first_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="hidden" name="address1" value="<?php echo $this->session->_address_ ?>">
                                <input type="hidden" name="night_phone_a" value="<?php echo $this->session->_phone_ ?>">
                                <?php $type = $this->session->_type_ == 'wallet' ? 'Wallet Topup' : 'Registration Fee'; ?>
                                <input type="hidden" name="type" value="<?php echo $type;?>">
                                <input type="hidden" name="notify_url"
                                       value="<?php echo site_url('gateway/ipn_paypal/' . $this->session->_type_) ?>">
                                <input type="hidden" name="cancel_return"
                                       value="<?php echo site_url('gateway/cancel') ?>">
                                <input type="hidden" name="return"
                                       value="<?php echo site_url('gateway/success') ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency_code"
                                       value="<?php echo config_item('paypal_currency') ?>">
                                <input type="hidden" name="email" value="<?php echo $this->session->_email_ ?>">
                                <button class="btn btn-primary" type="submit">Pay with Paypal &rarr;</button>
                         </form>
                        </div>
                    </div>
                </div>
            <?php
            endif; ?>
            <?php
            if (config_item('enable_stripe') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Pay With Stripe &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse in">
                        <div class="panel-body">The Easiest and safest way to pay online<br/>
                         <form action="<?php echo site_url('gateway/stripe_checkout/') ?>" method="post">
                            <?php $type = $this->session->_type_ == 'wallet' ? 'Wallet Topup' : 'Registration Fee'; ?>
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="email" value="<?php echo $this->session->_email_ ?>">
                                <input type="hidden" name="item_name"
                                       value="<?php echo $type; ?>">
                                <input type="hidden" name="item_number" value="<?php echo $this->session->_product_ ?>">
                                <input type="hidden" name="invoice" value="<?php echo $this->session->_inv_id_ ?>">
                                <input type="hidden" name="amount" value="<?php echo $this->session->_price_ ?>">
                                <input type="hidden" name="first_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="hidden" name="address1" value="<?php echo $this->session->_address_ ?>">
                                <input type="hidden" name="night_phone_a" value="<?php echo $this->session->_phone_ ?>">
                                <input type="hidden" name="notify_url"
                                       value="<?php echo site_url('gateway/paypal_ipn/' . $this->session->_type_) ?>">
                                <input type="hidden" name="cancel_return"
                                       value="<?php echo site_url('gateway/status/paypal') ?>">
                                <input type="hidden" name="return"
                                       value="<?php echo site_url('gateway/status/paypal') ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency_code"
                                       value="<?php echo config_item('paypal_currency') ?>">
                                <input type="hidden" name="email" value="<?php echo $this->session->_email_ ?>">
                                <button class="btn btn-primary" type="submit">Pay with Stripe &rarr;</button>
                         </form>
                        </div>
                    </div>
                </div>
            <?php
            endif; ?>
            <?php
            if (config_item('enable_instamojo') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Debit Card/ Net Banking / Credit Card / Wallet - Instamojo &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse">
                        <div class="panel-body">
                            <a href="<?php echo site_url('gateway/instamojo_start') ?>" class="btn btn-danger">Pay Now
                                &rarr;</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (config_item('axis_mode') == "on"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Pay With Axis &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse in">
                        <div class="panel-body">The Easiest and safest way to pay online<br/>
                         <form action="<?php echo site_url('gateway/payment_view/') ?>" method="post">
                            <?php $type = $this->session->_type_ == 'wallet' ? 'Wallet Topup' : 'Registration Fee'; ?>
                                <input type="hidden" name="cmd" value="_xclick">
                                <input type="hidden" name="email" value="<?php echo $this->session->_email_ ?>">
                                <input type="hidden" name="item_name"
                                       value="<?php echo $type; ?>">
                                <input type="hidden" name="item_number" value="<?php echo $this->session->_product_ ?>">
                                <input type="hidden" name="invoice" value="<?php echo $this->session->_inv_id_ ?>">
                                <input type="hidden" name="amount" value="<?php echo $this->session->_price_ ?>">
                                <input type="hidden" name="first_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="hidden" name="address1" value="<?php echo $this->session->_address_ ?>">
                                <input type="hidden" name="phone" value="<?php echo $this->session->_phone_ ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency_code"
                                       value="<?php echo config_item('axis_currency') ?>">
                                <input type="hidden" name="email" value="<?php echo $this->session->_email_ ?>">
                                <button class="btn btn-primary" type="submit">Pay with Axis &rarr;</button>
                         </form>
                        </div>
                    </div>
                </div>
            <?php
            endif; ?>

            <?php
            if (config_item('enable_cashfree') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Pay With Cashfree &rarr;</a>
                        </h4>
                    </div>
                    
                    <div id="collapse1" class="panel-collapse in">
                      <div class="panel-body">The Easiest and safest way to pay online<br/>
                         <form action="<?php echo site_url('gateway/checkout') ?>" method="post">
                           <input type="hidden" name="userId" value="<?php echo $this->session->_user_id_?>" />
                           <input type="hidden" name="amount" value="<?php echo $this->session->_price_?>" />
                           <?php $time = time();?>
                           <input type="hidden" name="orderId" id="orderId" value="<?php $this->session->_user_id_.$time?>" />
                            <button type="submit" class="btn btn-danger">
                                 Checkout with Cashfree
                            </button>
                         </form>
                      </div>
                    </div>
                </div>
            <?php
            endif; ?>

            <?php 
            if (config_item('enable_bankonnect') == "Yes"):
            ?>
            <?php
              $td = $this->db_model->select_multi("*", 'transaction', array(
            'userid' => $this->session->_user_id_,'amount'=>$this->session->_price_, 'id' => $this->session->_Payment_Transaction_ID_));
              $this->session->unset_userdata('_openbak_status_');
            ?>
            <script id="context" type="text/javascript" 
              src="<?php echo config_item('layer_url'); ?>"></script>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            Debit Card/ Net Banking / Credit Card / Wallet </a>
                    </h4>
                </div>
                <div><p style="color:#e06234;font-size:1.3em;margin:10px;">Note:&nbsp;Please donot close the window while the payment is being processed!!</p></div>
                <div id="collapse2" class="panel-collapse">
                  <div class="panel-body">
                    <div class="row">
                       <div class="col-lg-12 text-left">
                        <!--<a href="<?php print site_url();?>" name="reset_add_emp" id="re-submit-emp" class="btn btn-warning"><i class="fa fa-mail-reply"></i> Back</a>-->
                        <input  id="submit-pay" type="submit" onclick="OpenbankSubmit(this);" value="Pay Now &rarr;" class="btn btn-primary" />
                        </div>
                    </div>
                    <script>
                 
                      function OpenbankSubmit(el){
                        Layer.checkout({
                            token: "<?php echo $td->payment_request_id ?>",
                            accesskey: "<?php echo config_item('openbank_access_key'); ?>",
                        },
                        function(response) {
                            if (response.status == "captured") {
                               <?php 
                               $this->session->set_userdata('_openbak_status_', 'captured') ?>;
                               location.href = "<?php echo site_url('gateway/status/openbank') ?>";             
                               // response.payment_token_id
                               // response.payment_id

                            } else if (response.status == "created") {


                            } else if (response.status == "pending") {
                               window.location.replace("<?php echo site_url('gateway/status/failed') ?>");

                            } else if (response.status == "failed") {
                               window.location.replace("<?php echo site_url('gateway/status/failed') ?>");

                            } else if (response.status == "cancelled") {

                            }
                          },
                            function(err) {
                                //integration errors
                            }
                          );
                        }
                    </script>
                </div>
            </div>
            <?php endif; ?>

            <?php 
            if (config_item('enable_razorpay') == "Yes"):
            ?>
            <?php
                    
                    $txnid = time();
                    $key_id = config_item('razorpaykey_id');
                    $currency_code = config_item('razorpay_currency');         
                    $total = $this->session->_price_* 100; 
                    $amount = $this->session->_price_;
                    $merchant_order_id = 'order_'.$this->session->_user_id_;
                    $card_holder_name = $this->session->_user_name_;
                    $email = $this->session->_email_;
                    $phone = $this->session->_phone_;
                    $name = $this->session->_user_name_;
                    $type = $this->session->_type_ == 'wallet' ? 'Wallet Topup' : 'Registration Fee';
            ?>
            
            <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Debit Card/ Net Banking / Credit Card / Wallet - Razorpay &rarr;</a>
                        </h4>
                    </div>
                    <div><p style="color:#e06234;font-size:1.5em;margin:10px;">Note:Please donot close the window while the payment is being processed!!</p></div>

                   <div id="collapse2" class="panel-collapse">
                       <div class="panel-body">
                        <form name="razorpay-form" id="razorpay-form" action="<?php echo site_url('gateway/status/razorpay') ?>" method="POST">
                           <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                           <input type="hidden" name="razorpay_signature" id="razorpay_signature" >
                           <input type="hidden" name="amount" id="amount" value="<?php echo $total; ?>" >
                            <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id?>"/>
                            <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                            <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                            <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                            <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                            <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                            <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                            <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
                        </form>

                        <div class="row">
                           <div class="col-lg-12 text-left">
                            <!--<a href="<?php print site_url();?>" name="reset_add_emp" id="re-submit-emp" class="btn btn-warning"><i class="fa fa-mail-reply"></i> Back</a>-->
                            <input  id="submit-pay" type="submit" onclick="razorpaySubmit(this);" value="Pay Now &rarr;" class="btn btn-primary" />
                            </div>
                        </div>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        <script>
                      var razorpay_options = 
                      {
                            key: "<?php echo config_item('razorpaykey_id'); ?>",
                            amount: "<?php echo $total; ?>",
                            name: "<?php echo $name; ?>",
                            description: "<?php echo $type; ?>",
                            netbanking: true,
                            currency: "<?php echo $currency_code; ?>",
                            prefill: {
                              name:"<?php echo $card_holder_name; ?>",
                              email: "<?php echo $email; ?>",
                              contact: "<?php echo $phone; ?>"
                            },
                            notes: {
                              soolegal_order_id: "<?php echo $merchant_order_id; ?>",
                            },
                            handler: function (transaction) {
                                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                                document.getElementById('razorpay_signature').value = transaction.razorpay_signature;
                                document.getElementById('razorpay-form').submit();
                            },
                            "modal": {
                                "ondismiss": function(){
                                    location.reload()
                                }
                            }
                      };
                      var razorpay_submit_btn, razorpay_instance;
                     
                      function razorpaySubmit(el){
                        if(typeof Razorpay == 'undefined'){
                          setTimeout(razorpaySubmit, 200);
                          if(!razorpay_submit_btn && el){
                            razorpay_submit_btn = el;
                            el.disabled = true;
                            el.value = 'Please wait...';  
                          }
                        } else {
                          if(!razorpay_instance){
                            razorpay_instance = new Razorpay(razorpay_options);
                            if(razorpay_submit_btn){
                              razorpay_submit_btn.disabled = false;
                              razorpay_submit_btn.value = "Pay Now";
                            }
                          }
                          razorpay_instance.open();
                        }
                      }  
                        </script>
                            
                        </div>
                    </div>
            <?php endif; ?>

            <?php
            if (config_item('enable_block_io') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Bitcoin / Dogecoin / Litecoin - Block.io &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <a href="<?php echo site_url('gateway/block_io_start') ?>" class="btn btn-danger">Pay Now
                                &rarr;</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (config_item('enable_coinpayments') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                Cryptocurrency - coinpayments.io &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse">
                        <div class="panel-body">
                           <!-- <form action="https://www.coinpayments.net/index.php" method="post">
                                <input type="hidden" name="cmd" value="_pay">
                                <input type="hidden" name="reset" value="1">
                                <input type="hidden" name="merchant" value="<?php echo config_item('mrcnt_id') ?>">
                                <input type="hidden" name="item_name" value="Wallet Deposit">
                                <input type="hidden" name="first_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="hidden" name="last_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                                <input type="hidden" name="email" id="email"
                                       value="<?php echo $this->session->_email_; ?>"/>
                                <input type="hidden" name="currency" value="<?php echo config_item('coinpayment_currency') ?>">
                                <input type="hidden" name="amountf" value="<?php echo $this->session->_price_ ?>">
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="allow_quantity" value="0">
                                <input type="hidden" name="want_shipping" value="0">
                                <input type="hidden" name="success_url"
                                       value="<?php echo site_url('gateway/coinpayment_success') ?>">
                                <input type="hidden" name="cancel_url"
                                       value="<?php echo site_url('gateway/coinpayment_fail') ?>">
                                <input type="hidden" name="ipn_url"
                                       value="<?php echo site_url('gateway/coinpayment_ipn') ?>">
                                <input type="hidden" name="allow_extra" value="0">
                                <input type="image" src="https://www.coinpayments.net/images/pub/buynow-wide-blue.png"
                                       alt="Buy Now with CoinPayments.net">
                            </form>-->
                              
                             <form action="https://www.coinpayments.net/index.php" method="post">
                             <input type="hidden" name="cmd" value="_pay">
                             <input type="hidden" name="reset" value="1">
                             <input type="hidden" name="merchant" value="<?php echo config_item('coinpaymentmerchant_id');?>">
                             <input type="hidden" name="item_name" value="registration fee">
                             <input type="hidden" name="first_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                             <input type="hidden" name="user_id_coinpayment" id="user_id_coinpayment"
                                       value="<?php echo $this->session->_user_id_ ?>">
                             <input type="hidden" name="last_name"
                                       value="<?php echo $this->session->_user_name_ ?>">
                             <input type="hidden" name="email" id="email"
                                       value="<?php echo $this->session->_email_; ?>"/>
                             <input type="hidden" name="currency" value="<?php echo config_item('coinpayment_currency') ?>">
                             <input type="hidden" name="amountf" value="<?php echo $this->session->_price_ ?>">
                             <input type="hidden" name="quantity" value="1">
                             <input type="hidden" name="allow_quantity" value="0">
                             <input type="hidden" name="want_shipping" value="0">
                             <input type="hidden" name="success_url"
                                       value="<?php echo site_url('gateway/coinpayment_success') ?>">
                             <input type="hidden" name="status_url"
                                       value="<?php echo site_url('gateway/coinpayment_status') ?>">
                             <input type="hidden" name="cancel_url"
                                       value="<?php echo site_url('gateway/coinpayment_fail') ?>">
                             <input type="hidden" name="ipn_url"
                                       value="<?php echo site_url('gateway/coinpayment_ipn') ?>">
                             <input type="hidden" name="allow_extra" value="0">
                             <input type="image" src="https://www.coinpayments.net/images/pub/buynow-wide-blue.png" alt="Buy Now with CoinPayments.net">
                            </form>
                         </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (config_item('enable_payumoney') == "Yes"):
                ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                Debit Card/ Net Banking / Credit Card - PayuMoney &rarr;</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse">
                        <div class="panel-body">
                            <form action="https://secure.payu.in/_payment" method="post">
                                <input type="hidden" name="key" value="<?php echo config_item('payumoney_key') ?>"/>
                                <input type="hidden" name="hash" value="<?php echo config_item('sdsds') ?>"/>
                                <input type="hidden" name="txnid" value="<?php echo $this->session->_user_id_ ?>"/>
                                 <input name="amount" type="hidden" value="<?php echo $this->session->_price_; ?>"/>
                                <input type="hidden" name="firstname" id="firstname"
                                       value="<?php echo $this->session->_user_name_; ?>"/>
                                <input type="hidden" name="email" id="email"
                                       value="<?php echo $this->session->_email_; ?>"/>
                                <input type="hidden" name="phone" value="<?php echo $this->session->_phone_; ?>"/>
                                <input name="productinfo" type="hidden"
                                       value="<?php echo $this->db_model->select('prod_name', 'product', array('id' => $this->session->_product_)); ?>">
                                <input type="hidden" name="surl"
                                       value="<?php echo site_url('gateway/status/payumoney') ?>"/>
                                <input type="hidden" name="furl"
                                       value="<?php echo site_url('gateway/status/payumoney') ?>"/>
                                <input type="hidden" name="service_provider" value="payu_paisa"/>
                                <input type="hidden" name="lastname" id="lastname" value=""/>
                                <button class="btn btn-primary" type="submit">Pay with PayuMoney &rarr;</button>

                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    function populate() {
        var uid = $('#user_id_coinpayment').val();
        //alert(uid);
        if (uid == "" || isNaN(uid)) {
            alert('Please enter valid User ID');
        } else {
            //alert("<?php echo site_url('wallet/insert_into_transaction/') ?>" + uid);
            $.get("<?php echo site_url('wallet/insert_into_transaction/') ?>" + uid, function (data) {

            });
            
        }
    }
</script>