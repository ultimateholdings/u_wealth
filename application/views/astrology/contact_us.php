<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css');?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header');?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">Contact Us</li>
</ol>
<div class="container m-3">
	<div class="container container-fluid">
		<div class="row">
			<div class="col-7 shadow-lg">
				<?php 
				if ($this->session->flashdata('response')) {
					# code...
					if ($this->session->flashdata('response')=='Congragulation Email Send Successfully.') {
						# code...
						echo '
						<div class="alert alert-success">
						'.$this->session->flashdata("response").'
						</div>
						';
					}else{
						echo '
						<div class="alert alert-danger">
						'.$this->session->flashdata("response").'
						</div>
						';
					}
				}
				?>
				<?php echo form_open('astrology/contact_submit',['autocomplete'=>'off']); ?>				
				<div class="row ml-5 mt-5">
					<div class="col-6">
					    <label>Name</label>
					    <!--<input type="text" class="form-control" placeholder="First name">-->
					    <?php echo form_input($data=array('class'=>'form-control','name'=>'Name','placeholder'=>'Enter name','required'=>''));?>
					</div>
				</div>
				<div class="row ml-5 mr-4">
					<div class="col-6 mt-4">
					    <label>Email</label>
					    <!--<input type="text" class="form-control" placeholder="First name">-->
					    <?php echo form_input($data=array('class'=>'form-control','name'=>'Email','placeholder'=>'Enter email','required'=>'', 'type'=>'email','pattern'=>'[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$'));?>
					</div>
					<div class="col-6 mt-4">
					    <label>Phone</label>
					    <!--<input type="text" class="form-control" placeholder="First name">-->
					    <?php echo form_input($data=array('class'=>'form-control','name'=>'phone','placeholder'=>'Enter Phone No','required'=>'', 'type'=>'number', 'pattern'=>'^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$'));?>
					</div>
				</div>
				<div class="row ml-5 mt-3">
					<div class="col-7 mt-2">
						<label>Message</label>
					    <!--<input type="text" class="form-control" placeholder="First name">-->
					    <?php echo form_textarea($data=array('class'=>'form-control','name'=>'message','placeholder'=>'Enter your message','required'=>'','rows'=>'3'));?>
					</div>
				</div>
				<div id="form_button">
				  	<?php echo form_submit($data = array('type' => 'submit','value'=> 'Send Request','class'=> 'submit btn btn-danger btn-lg float-right mb-5 mr-5')); ?>
				</div>
					<!--</form>-->
				<?php echo form_close(); ?>
			</div>
			<div class="col-4 ml-5 mt-4">	
				<ul class="list-group" style="list-style: none;">
					<li class="list-item">
						<div class="boxed boxed--border boxed--md for-mobile bg--site">
							<div class="row">
								<div class="col-md-3 text-center">
									<i class='fas fa-map-marker-alt' style='font-size:40px;color:crimson'>
									</i>
								</div>
								<div class="col-md-9 text-left p-t-10 p-l-8"> 
									<h6 class="type--uppercase">
										Opposite to Matrusri Nilaya,<br>Mutt Road Kaiwara, India -563128
									</h6>
								</div>	
							</div>
							<hr>
							<div class="row ">
								<div class="col-md-3 text-center">
									<i class='fas fa-phone' style='font-size:40px;color:crimson'>
									</i>
								</div>
								<div class="col-md-9 text-left p-t-10 p-l-8"> 
									<h6 class="type--uppercase">
										Phone : +91-9113511765<br>
										Phone: +91-7090054661
									</h6>
								</div>	
							</div>
							<hr>
							<div class="row ">
								<div class="col-md-3 text-center">
									<i class='fas fa-envelope-square' style='font-size:40px;color:crimson'>
									</i>
								</div>
								<div class="col-md-9 text-left p-t-10 p-l-8"> 
									<h6 class="type--uppercase">
										info@mayuraconsultancy.com<br>
										business@mayuraconsultancy.co
									</h6>
								</div>	
							</div>	
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>