<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url();?>axxets/client/favicon.ico">
    <title><?php echo config_item('company_name') ?></title>

    <!-- Bootstrap 4.1-->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/login/mega/vendor_components/bootstrap.min.css">
	
		<!-- Bootstrap extend-->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/login/mega/bootstrap-extend.css">	
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/login/mega/vendor_components/ionicons.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/login/mega/vendor_components/themify-icons.css"/>
	
	
	<script src="<?php echo base_url();?>axxets/login/mega/jquery-3.3.1.js"></script>
	<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
	
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url();?>axxets/login/mega/master_style.css">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		 .h-p100{
		 	margin-top: 11%;
		 }
	</style>
</head>
<body>
<section class="slides">
	<div id="demo" class="carousel slide" data-ride="carousel">
  	 	<div class="carousel-inner">
			<div class="carousel-item active">
				<img  class="img-fluid i1" src="<?php echo base_url();?>uploads/site_img/auth-bg/<?php echo config_item('login_theme');?>"; alt="first slide" style='height: 100vh;'>
			</div>
			<div class="container h-p100">
				<div class="row align-items-center justify-content-md-center h-p100">	
					<div class="col-12">
						<div class="row justify-content-center no-gutters">
							<div class="col-lg-4 col-md-5 col-12">
								<?php echo validation_errors('<div class="alert alert-light">', '</div>') ?>
					            <?php echo $this->session->flashdata('site_flash') ?>
					            <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1)) {
					                echo '<div class="alert alert-light">'. config_item('announcement') . '</div>';
					            } ?>
								<div class="b-1">
									<div class="content-top-agile p-10 pb-0">
										<h2 class="text-white mb-0">Login Now!</h2>						
									</div>
									<div class="p-30">
										<?php echo form_open() ?>
											<div class="form-group">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
													</div>
													<input type="number" required class="form-control pl-15 bg-transparent text-white plc-white" placeholder="User ID" id="user" name="username" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">	
												</div>
											</div>
											<div class="form-group">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
													</div>
													<input type="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="password"id="password" name="password">
												</div>
											</div>
											  <div class="row">
												<div class="col-6">
												  <div class="checkbox text-white">
													<input type="checkbox" id="basic_checkbox_1" >
													<label for="basic_checkbox_1">Remember Me</label>
												  </div>
												</div>
												<!-- /.col -->
												<div class="col-6">
												 <div class="fog-pwd text-right">
													<a href="#" data-toggle="modal" data-target="#resetpassword" class="text-white hover-warning"><i class="ion ion-locked"></i> Forgot Password?</a><br>
												  </div>
												</div>
												<!-- /.col -->
												<div class="col-12 text-center">
												  <button type="submit" class="btn btn-danger btn-rounded mt-10">SIGN IN</button>
												</div>
												<!-- /.col -->
											  </div>
										<?php echo form_close() ?>													
										<div class="text-center">
											<p class="mt-15 mb-0 text-white" style="font-weight: 14px; color:white;">Don't have an account? <a href="<?php echo site_url('site/register') ?>"><b style="color:orange;">Sign Up</b></a></p>
										</div>
										<div class="text-center">
											<p class="mt-15 mb-0 text-white" style="font-weight: 14px; color:white;"><a href="<?php echo site_url('/') ?>"><b style="color:orange;">Go to Home page</b></a></p>
										</div>
										<div class="text-center">
											<p class="mt-15 mb-0 text-white" style="font-weight: 14px; color:white;"><?php echo footer_note(); ?></p>
										</div>
									</div>						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="modal" id="resetpassword" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reset Your Password</h4>
            </div>
            <?php echo form_open('site/reset_password') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label>Userid</label>
                    <input type="number" class="form-control" name="userid" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                    <br>
                    <?php if(config_item('sms_on_join')=='Yes'){ ?>
                    <label>Phone Number</label>
                    <input type="number" class="form-control" name="phone" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                    <br><span class="ortext" style="text-align: center;margin-left: 50%;">or</span><br>
                	<?php } ?>
                    <label>Email</label>
                    <input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email" name="email" placeholder="Registered Email">
                </div>
            </div>
            <div class="modal-footer" style="display: flex;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Reset Password</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var server = '<?php echo $_SERVER['HTTP_HOST']; ?>';        
        var flag = '<?php echo config_item('login_default'); ?>'; 
        if(server.includes("globalmlmsolution.com") || server.includes("localhost") || (flag=='Yes')){
            $('#user').val('1001');
            $('#password').val('Password@123');
        }
    });
</script>

<script type="text/javascript">

$(':text').keypress(function (e) {
var regex = new RegExp("^[a-zA-Z0-9\@.]+$");
var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
if (regex.test(str)) {
    return true;
}

e.preventDefault();
return false;
});

function keyRestrict(e,validchars) {
    var key='', keychar='';
    key = getKeyCode(e);
    if (key == null) return true;
    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    validchars = validchars.toLowerCase();
    if (validchars.indexOf(keychar) != -1)
    return true;
    if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
    return true;
    return false;
}

function getKeyCode(e) {
    if (window.event)
    return window.event.keyCode;
    else if (e)
    return e.which;
    else
    return null;
}

$(':text').bind('copy paste', function (e) {
        e.preventDefault();
});

</script>
</body>
</html>