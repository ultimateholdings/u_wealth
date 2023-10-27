<!DOCTYPE html>
<html>
<head>
    <title>Check Balance</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .panel{
            position: absolute;
            top: 2%;
            left: 15% 
        }
        @media only screen and (max-width: 440px) {
            .panel{
                left: 0%
            }
        }
    </style>

</head>
<body>

<?php
include 'includes_top.php' 
?>

<section>
<img src="https://images.unsplash.com/photo-1564032236772-dfc27a12feda?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" style="width: 100%; height: 775px;"> 

<div class="panel" style="width: 400px;">
    <div class="panel-heading">
        <!--<h3 class="panel-title" style="text-align: center; font-size: 22px;font-weight: 500;">Money doesn't buy happiness. Some 
            <h3 class="panel-title" style="text-align: center; font-size: 22px;font-weight: 500;margin-top: -52px;"> people say it's a heck of a payment,</h3> 
            <h3 class="panel-title" style="text-align: center; font-size: 22px;font-weight: 500;margin-top: -52px;">though.</h3>-->
        <!-- Product Info -->
        <?php $type = $this->session->_type_ == 'wallet' ? 'Wallet Topup' : 'Registration Fee';?>
        <p style="margin-left: 7%; font-size: 20px;color:green;"><b>Item Name:</b> <?php echo $type; ?></p>
        <p style="margin-left: 7%; font-size: 20px;color:green; "><b>Price:</b> <?php echo config_item('currency'). $this->session->_price_; ?></p>
    </div>

    <div class="panel-body" style="margin-left: 7%;">
        
        
        <!-- Display errors returned by createToken -->
        <?php if(($this->session->flashdata('msg'))): ?>
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> <?=$this->session->flashdata('msg')?>
                        </div>
                    <?php endif; ?>
                    <?php if(($this->session->flashdata('error'))): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!</strong> <?=$this->session->flashdata('error');?>
                        </div>
                    <?php endif; ?>

           <div>
                        <img style='vertical-align:middle;' src='<?php echo base_url();?>/uploads/axisbank.jpg' height="100">
                        <span style="vertical-align:middle">
                        <!-- form -->
                        <form style="margin-left:55%;margin-top:-20%;" name="Formdata" id="Formdata" method="POST" action="https://easypay.axisbank.co.in/index.php/api/payment" >
                            <textarea name="i" id="i" style="display: none;"><?php echo $axis_checksum; ?></textarea>
                            <input class="btn btn-primary" type="submit" value="Select" style="width:70%;" >       
                        </form>
                        <!-- end form-->
                        </span>
            </div>
        <!-- Payment form -->
       
    </div>
</div>
</section>
<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
<script>
// Create an instance of the Stripe object
// Set your publishable API key
var stripe = Stripe('<?php echo config_item('stripe_publishable_key'); ?>');

// Create an instance of elements
var elements = stripe.elements();

var style = {
    base: {
        fontWeight: 400,
        fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        lineHeight: '1.4',
        color: '#555',
        backgroundColor: '#fff',
        '::placeholder': {
            color: '#888',
        },
    },
    invalid: {
        color: '#eb1c26',
    }
};

var cardElement = elements.create('cardNumber', {
    style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
    'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
    'style': style
});
cvc.mount('#card_cvc');

// Validate input of the card elements
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
    if (event.error) {
        resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
    } else {
        resultContainer.innerHTML = '';
    }
});

// Get payment form element
var form = document.getElementById('paymentFrm');

// Create a token when the form is submitted.
form.addEventListener('submit', function(e) {
    e.preventDefault();
    createToken();
});

// Create single-use token to charge the user
function createToken() {
    stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error
            //alert("error");
            resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
            //alert(result.error.message);
        } else {
            // Send the token to your server
            $token=stripeTokenHandler(result.token);
            //alert($token);
        }
    });
}

// Callback to handle the response from stripe
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    
    // Submit the form
    form.submit();
}
</script>

</body>
</html>
