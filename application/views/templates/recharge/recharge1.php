<?php 
$user_id = $this->session->user_id;
$page = current_url();
$_SESSION['page'] = $page;
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo config_item('company_name')?></title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  <style type="text/css">
   body{
  overflow-x: hidden;
}
</style>
</head>
<body>
<div class="">
<form id="test-recharge-form" action="" method="POST">
  <div class="row">
      <div class="col s4">
          <div class="padded">
           <label for="amount">Phone number</label>
           <input type="" name="phone" value="" min="" class="input input--full-width">
          </div>
      </div>
      <div class="col s4">
        <div class="padded-left padded-right">
            <label for="">Network</label>
            <input type="" name=""> name="network_id" type="" class="input input--full-width">
        </div>
      </div>
      <div class="col s4">
          <div class="padded-left padded-right">
            <label for="amount">Amount</label>
            <input name="amount" type="number" class="input input--full-width">
          </div>
      </div>
      <div class="col s4">
          <div class="padded-left padded-right">
            <label for="">Wallet pin</label>
            <input name="pin" type="number" class="input input--full-width">
          </div>
      </div>
      <div class="col s4 align-right">
          <div class="padded">
            <button type="submit" class="button button--primary" onsubmit="callAtrecharge()"> Make A Payment</button>
          </div>
      </div>
    </div>
 </form>
 
 <script>
    let form = document.getElementById('test-recharge-form')
    form.onsubmit = function callAtrecharge(e) {
        e.preventDefault()
         
         console.log(form.phone.value);
         console.log(form.network_id.value);

        AtgPayment.pay({
            phone: form.phone.value,
            
            network_id: form.network_id.value,

            amount: form.amount.value,
            pin: form.pin.value,
           // key: "0ffb408a221d61575f5ac1616bb8336274b5fac268c0a128",//live key
            //key: "5741763d971ae4d2a8de4e05bb44e908fec1169aaadc31de257c9769977d83a3",//private key
            //key : "45679a513ef65a371c275b82534b2b46b3190431297ebecf", //public key
            description: 'An aimtoget test payment',
            key: "0ffb408a221d61575f5ac1616bb8336274b5fac268c0a128",
            onerror: function (data) {
                utils.modal_alert('error', 'Your payment failed')

            },

            onsuccess: function (data) {
                utils.modal_alert('success', 'You have successfully made a payment')
            },

            onclose: function (data) {
                utils.modal_alert('warning', 'You closed the payment modal')
            }
        })
        console.log();
        e.preventDefault();
    }
</script>
  </div>
</body>
</html>