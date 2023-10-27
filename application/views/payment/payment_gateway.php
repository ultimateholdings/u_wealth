<style>
body {
	padding-top: 50px;
	padding-bottom: 50px;
}

.payment-header-text {
	font-size: 23px;

}

.close-btn-light {
	padding-left: 10px;
	padding-right: 10px;
	height: 35px;
	line-height: 35px;
	text-align: center;
	font-size: 25px;
	background-color: #F1EAE9;
	color: #a45e72;
	border-radius: 5px;
}

.close-btn-light:hover {
	padding-left: 10px;
	padding-right: 10px;
	height: 35px;
	line-height: 35px;
	text-align: center;
	font-size: 25px;
	background-color: #a45e72;
	color: #FFFFFF;
	border-radius: 5px;
}

.payment-header {
	font-size: 18px;
}

.item {
	width: 100%;
	height: 50px;
	display: block;
}

.count-item {
	padding-left: 13px;
	padding-right: 13px;
	padding-top: 5px;
	padding-bottom: 5px;

	margin-bottom: 100%;
	margin-right: 18px;
	margin-top: 8px;

	color: #00B491;
	background-color: #DEF6F3;
	border-radius: 5px;
	float: left;
}

.item-title {
	font-weight: bold;
	font-size: 13.5px;
	display: block;
	margin-top: 6px;
}

.item-price {
	float: right;
	color: #00B491;
}

.by-owner {
	font-size: 11px;
	color: #76767E;
	display: block;
	margin-top: -3px;
}

.total {
	border-radius: 8px 0px 0px 8px;
	background-color: #DBF3F0;
	padding: 10px;
	padding-left: 30px;
	padding-right: 30px;
	font-size: 18px;
}

.total-price {
	border-radius: 0px 8px 8px 0px;
	background-color: #CCD4DD;
	padding: 10px;
	padding-left: 25px;
	padding-right: 25px;
	font-size: 18px;
}

.indicated-price {
	padding-bottom: 20px;
	margin-bottom: 0px;
}

.payment-button {
	background-color: #1DBDA0;
	border-radius: 8px;
	padding: 10px;
	padding-left: 30px;
	padding-right: 30px;
	color: #fff;
	border: none;
	font-size: 18px;
}

.payment-gateway {
	border: 2px solid #D3DCDD;
	border-radius: 5px;
	padding-top: 15px;
	padding-bottom: 15px;
	margin-bottom: 15px;
	cursor: pointer;
}

.payment-gateway:hover {
	border: 2px solid #00D04F;
	border-radius: 5px;
	padding-top: 15px;
	padding-bottom: 15px;
	margin-bottom: 15px;
	cursor: pointer;
}

.payment-gateway-icon {
	width: 80%;
	float: right;
}

.tick-icon {
	margin: 0px;
	padding: 0px;
	width: 15%;
	float: left;
	display: none;
}

.paypal-form,
.stripe-form {
	display: none;
}

@media only screen and (max-width: 600px) {

	.paypal,
	.stripe {
		margin-left: 5px;
		width: 70%;
	}
}
</style>

<div class="container">
	<div class="row justify-content-center mb-5">


		<?php if ($this->session->flashdata('error_message')) { ?>
		<div class="alert alert-danger col-md-8">                
			<?php echo $this->session->flashdata('error_message'); ?>
		</div>
		<?php }  ?>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-3">
					<p class="pb-2 payment-header"><?php echo 'Payment'; ?> <?php echo 'Gateway'; ?></p>
				<form style="" name="Formdata" id="Formdata" method="POST" action="https://easypay.axisbank.co.in/index.php/api/payment" >
				    <textarea name="i" id="i" style="display: none;"><?php echo $axis_checksum; ?></textarea>
				    <input class="btn btn-primary" type="submit" value="AXIS BANK" >       
				</form>
				<!--AXIS BANK -->
				
			</div>

			<div class="col-md-1"></div>

			</div>
		</div>
	</div>
</div>

