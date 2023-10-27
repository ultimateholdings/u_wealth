<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register || <?php echo config_item('company_name') ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge;" />
		<meta http-equiv="X-UA-Compatible" content="IE=11;" />
		<link rel="icon" type="image/png" href="<?php site_url();?>axxets/client/favicon.ico" />
		<link rel="stylesheet" href="<?php echo site_url();?>axxets/base/css/bootstrap_v3.3.7.min.css">
		<script type="text/javascript" src="<?php echo site_url();?>axxets/base/js/jquery_v3.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url();?>axxets/base/js/bootstrap_v3.3.7.min.js"></script>
		<style>
body, html {
    height: 100%;
    width: 100%;
    font-family: 'Roboto-Regular', sans-serif !important;
}
body {
    font-size: 14px;
    color: #333;
}	
.img-thumbnail, body, pre {
    line-height: 1.42857143;
}
.img-thumbnail, body {
    background-color: #fff;
}
body, figure {
    margin: 0;
}
*, :after, :before {
    box-sizing: border-box;
}
.main {
    height: 100%;
    width: 100%;
    display: flex;
    flex-direction: row;
}
#img-Container {
    height: 100%;
    width: 44%;
    position: relative;
    background-color: black;
}
#logo-container {
    height: 35%;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 1;
    position: absolute;
    width: 100%;
}
#logo {
    width: 200px;
    height: 50%;
    padding-top: 10vh;
}
.responsive {
    width: 100%;
    height: 100%;
}
hr, img {
    border: 0;
}
.btn, img {
    vertical-align: middle;
}
#copyright-container {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 38%;
    color: white;
    font-family: 'Roboto-Regular', sans-serif;
    font-size: 16px;
    text-align: center;
}
#termsOfUse a {
    color: #f2f2f2 !important;
    font-size: 11px;
}
a {
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all .2s ease-in-out;
    background-color: transparent;
}
#copyrightMsg {
    padding-bottom: 20px;
    font-size: 11px;
    color: #f2f2f2;
    opacity: 0.7;
}
#terms-content {
    max-width: 600px;
}

p {
    margin-top: 0;
    margin-bottom: 0;
    text-align: left;
    padding: 0 32px;
    padding-top: 0px;
    padding-right: 32px;
    padding-bottom: 0px;
    padding-left: 32px;
}	
#login-Container {
    width: 74%;
    height: 100%;
}
#logo1 {
    height: 40%;
    text-align: center;
    /* line-height: 206pt; */
    padding-top: 12vh;
}
a {
    font-weight: 600;
    color: #234e9b !important;
    cursor: pointer;
    text-decoration: none;
    transition: all .2s ease-in-out;
    transition-property: all;
    transition-duration: 0.2s;
    transition-timing-function: ease-in-out;
    transition-delay: 0s;
    background-color: transparent;
}
#image1{
    width: 20.5%;
    background-repeat: no-repeat;
}
.btn, img {
    vertical-align: middle;
}
#username-static {
    text-align: center;
    padding-top:2px;
    padding-bottom: 7vh;
    font-size: 13px;
    color: #858585;
}

@media only screen and (max-width: 1024px)
#login-buttton-container-inner {
    width: 80vw;
}
form1.style{
	text-align: center;
}
#staticInput {
    outline: none;
    box-shadow: none;
    border: 0px white solid;
    max-width: 98px !important;
    font-size: 20px;
    cursor: pointer;
    margin-left: 34px;
    color: black;
}
input {
    text-align: center;
    width: 62%;
}
button, input, select, textarea {
    font-family: inherit;
    line-height: inherit;
}
button, input, optgroup, select, textarea {
    font: inherit;
    margin: 0;
}
input {
    -webkit-writing-mode: horizontal-tb !important;
    text-rendering: auto;
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    -webkit-appearance: textfield;
    background-color: -internal-light-dark-color(white, black);
    -webkit-rtl-ordering: logical;
}
.btn, img {
    vertical-align: middle;
}

#username-input-outer {
    padding-top: 26vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

#login-buttton-container-inner {
    display: flex;
    flex-direction: row;
    justify-content: center;
}

#username-input {
    margin-left: 0px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    border-bottom: 1px solid #ced4da;
    width: 220px;
}

#otp-input {
    margin-left: 0px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    border-bottom: 1px solid #ced4da;
    width: 220px;
}

#otp-buttton-container-inner {
    display: flex;
    flex-direction: row;
    justify-content: center;
}

.md-form {
    position: relative;
    text-align: center;
}

#input-label {
    right: 0;
    font-family: 'Roboto-Medium', sans-serif;
    font-size: 16px;
    z-index: -1;
    text-align: center;
}
.md-form label {
    position: absolute;
    top: .7rem;
    left: 0;
    transition: .2s ease-out;
    cursor: text;
    color: #757575;
}
label {
    /* max-width: 100%; */
    margin-bottom: 5px;
}
.img-thumbnail, label {
    display: inline-block;
}
#img1 {
    padding-top: 5px;
    /* border-bottom: 1px solid #ced4da; */
}
#img2 {
    padding-bottom: 7px;
}
#personalized_username {
    width: 40px;
    transform: translateY(15%);
    border-radius: 150px;
    border-top-left-radius: 150px;
    border-top-right-radius: 150px;
    border-bottom-right-radius: 150px;
    border-bottom-left-radius: 150px;
    background-color: #f6f6f6;
    margin-left: 10px;
}
#field_blank {
    text-align: center;
    font-size: 13px;
    color: #cc0000;
    height: 3vh;
    padding-top: 5px;
    /* margin-left: 32px; */
}
.md-form input[type=text]{
	outline: 0;
    outline-color: initial;
    outline-style: initial;
    outline-width: 0px;
    box-shadow: none;
    border: none;
    border-radius: 0;
    box-sizing: content-box;
    background-color: transparent;
}
.md-form .form-control {
    background-image: none;
    height: auto;
}
.form-control {
    width: 100%;
  }
.form-control, output {
    line-height: 1.42857143;
    display: block;
}
input {
    text-align: center;
}
#select-login-method {
    color: #234e9b;
    text-align: center;
    font-size: .95em;
    padding-bottom: 0.8vh;
    font-weight: bold;
}
.btn {
	cursor: pointer;
    white-space: normal;
    word-wrap: break-word;
 }
 .waves-effect {
    position: relative;
    overflow: hidden;
    overflow-x: hidden;
    overflow-y: hidden;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-top-style: solid;
    border-top-width: 1px;
    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-left-style: solid;
    border-left-width: 1px;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
}
.btn, .label {
    text-align: center;
}
.btn, .btn-link {
    font-weight: 400;
}
button, input, select, textarea {
    font-family: inherit;
}
button, html input[type=button], input[type=reset], input[type=submit] {
    -webkit-appearance: button;
 }
 button, select {
    text-transform: none;
}
button, input, optgroup, select, textarea {
    font: inherit;
    margin: 0;
}
#static-button-container {
    text-align: center;
    padding-top: 13vh;
}
#submit-button-container {
    text-align: center;
    padding-top: 7vh;
}
@media screen and (max-height: 700px)
#proceed-button {
    width: 190px;
    height: 38px;
}
#proceed-button {
    /* margin-top: 40px; */
   width: 190px;
    height: 38px;
    font-family: 'Roboto-Medium', sans-serif;
    font-size: 16px;
    background-color: #234e9b !important;
    padding: 7px;
    padding-top: 7px;
    padding-right: 7px;
    padding-bottom: 7px;
    padding-left: 7px;
}

#submit-button {
    /* margin-top: 40px; */
   width: 190px;
    height: 38px;
    font-family: 'Roboto-Medium', sans-serif;
    font-size: 16px;
    background-color: #234e9b !important;
    padding: 7px;
    padding-top: 7px;
    padding-right: 7px;
    padding-bottom: 7px;
    padding-left: 7px;
}

.btn-primary.active, .btn-primary:active, .open>.dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #234e9b;
    background-image: none;
    border-color: #234e9b;
}
.btn-primary {
    color: #fff!important;
}
.btn-primary, .btn-primary.focus, .btn-primary:focus {
    color: #fff;
    background-color: #234e9b;
}
.btn {
    display: inline-block;
    margin-bottom: 0;
    touch-action: manipulation;
    background-image: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    line-height: 1.42857143;
    border-radius: 4px;
  }
a {
    font-size: 11px;
    font-weight: 600;
    color: #234e9b !important;
}

.change_number {
    font-family: 'Roboto-Medium', sans-serif;
    font-size: 1.4rem !important;
    color: #234e9b !important;
    padding-top: 20px;
    display: flex;
    justify-content: center;
    font-weight: 600;
}

@media (max-width: 1499px) and (min-width: 1366px)
#ph_copyright {
    display: none;
}

#ph_copyright {
    font-family: 'Roboto-Regular', sans-serif;
    text-align: center;
    margin-top: 11%;
    color: #313131;
    font-size: .85em;
}

.alert {
    margin: 15px 40px;
    text-align: center;
}

@media (max-width: 992px) {
	#img-Container {
		display: none;
	}

	#login-Container {
		width: 100%;
	}

	#username-input {
		margin-left: 0px;
	}
 </style>										
</head>
<body>	
	<div class="main">
		<div class="column" id="img-Container">
			<div id="logo-container">
				<img src="<?php echo base_url();?>axxets/client/logo.png" id="logo">
			</div>
			<img src="<?php echo base_url();?>axxets/base/img/web_illustration.png" class="responsive">
			<div id="copyright-container">
				<div id="termsOfUse" style="display: none;">
					<a data-toggle='modal' data-target="#termsofUseModal" tabindex="-1">Terms of Use |</a>
					<a data-toggle='modal' data-target="#browCompatibility" tabindex="-1">Browser and Display Compatibility</a>
				</div>
				<div id="copyrightMsg">Copyright &copy;
							2020 <?php echo config_item('company_name'); ?>
							<br> Entry to this site is restricted to customers.
				</div>
			</div>	
		</div>
    		<div class="column" id="login-Container">
    			<div id="inside-log-con">
    				<div id="logo1">
    					<a href="<?php echo base_url("/")?>" tabindex="-1" >
    						<img id="image1" src="<?php echo base_url();?>axxets/client/logo_dark.png">
    					</a>
    				</div>
                    
                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>

                    <?php if($this->session->userdata('_phone_') > 0 ) { ?>

                        <?php echo form_open('site/validate_otp') ?>
    						<!-- Username Input -->
        				<div id="username-input-outer">
        					<div id="login-buttton-container-inner">
        						<div class="md-form" id="username-input" onclick="changeColor()" onfocusout="defaultColor()">
        							<input type="text" id="phone" class="form-control" name="phone" onkeyup="capLock(event)" onclick="hideErroMsg()" tabindex="0" pattern="[7-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" placeholder="Enter Phone Number" required value="<?php echo set_value('phone', $this->session->userdata('_phone_')) ?>" disabled>
        						</div>	
        					</div>
        				</div>
                        <input type="hidden" name='phone' value="<?php echo set_value('phone', $this->session->userdata('_phone_')) ?>">
                        <div id="field_blank"></div>
                        
                        <div id="otp-input-outer">
                            <div id="otp-buttton-container-inner">
                                <div class="md-form" id="otp-input">
                                    <input type="text" id="otp" class="form-control" name="otp" tabindex="0"
                                    placeholder="Enter OTP" required value="<?php echo set_value('otp') ?>">
                                </div>  
                            </div>
                        </div>
                        <?php echo $this->session->flashdata('site_flash') ?>		
        					<!-- Proceed button -->
        				<div id="submit-button-container">
        						<button type="submit" class="btn btn-primary" id="proceed-button" tabindex="0" >Proceed
        						</button>
        				</div>
                        <div class="change_number">
                        <a href="<?php echo site_url('site/verify/reset') ?>" tabindex="0" style="font-size: 12px;font-weight: 600;color: #234e9b !important;">Change Phone Number ?</a> &nbsp; &nbsp;<a href="<?php echo site_url('site/send_otp') ?>" tabindex="0" style="font-size: 12px;font-weight: 600;color: #234e9b !important;">Resend OTP ?</a>
                        </div>
                        <?php echo form_close() ?>

                        <?php } else { ?>

                        <?php echo form_open('site/send_otp') ?>

                        <div id="username-input-outer">
                            <div id="login-buttton-container-inner">
                                <div class="md-form" id="username-input" onclick="changeColor()" onfocusout="defaultColor()">
                                    <input type="text" id="phone" class="form-control" name="phone" onkeyup="capLock(event)" onclick="hideErroMsg()" tabindex="0" pattern="[7-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" placeholder="Enter Phone Number" required value="<?php echo set_value('phone') ?>">
                                </div>  
                            </div>
                        </div>
                        <div id="field_blank"></div>
                        <?php echo $this->session->flashdata('site_flash') ?>

                        <div id="static-button-container">
                                <button type="submit" class="btn btn-primary" id="submit-button" tabindex="0" >Proceed 
                                </button>
                        </div>

                        <?php echo form_close() ?>

                        <?php } ?>

    				<div id="ph_copyright">
    					<a data-toggle="modal" data-target="#termsofUseModalMobile" style="display: none;">Terms and Conditions</a><br>Copyright &copy; 2020 <?php echo config_item('company_name'); ?>
    				</div>		
                </div>
    		</div>
        
	</div>
</body>
</html>

