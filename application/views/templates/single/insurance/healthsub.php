<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
<script src="<?php echo base_url();?>axxets/templates/insurance/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <script src='<?php echo base_url();?>axxets/templates/insurance/js/kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/healthsub.css">
</head>
<body>
<!--<header>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#126185;font-size:medium;">
			<a class="navbar-brand mr-auto" href="#">
	  			<img class="img-fluid" style="height:50px;width: 200px;" src="<?php echo base_url();?>axxets/templates/insurance/images/brokerassist.png">
	 		</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
	 				<span  class="navbar-toggler-icon" style="border: none;"></span>
	 			</button>
	  		<div class="collapse navbar-collapse" id="collapse_Navbar">
	   			<ul class="navbar-nav ml-auto" style="margin-right: 30px;">
					<li class="nav-item">
	      				<a class="nav-link " href="#" style="color: #ffffff !important;"><span class="fa fa-home"></span>Home</a>&nbsp;
					</li>
					<li class="nav-item" >
						<a class="nav-link" href="#" style="color: #ffffff !important;"><span class="fa fa-bell"></span>Notifications</a>
					</li>
					<li class="nav-item" >
						<a class="nav-link n" href="#" style="color: #ffffff !important;"><span class="fa fa-envelope"></span>Reminder</a>
					</li>
					<li class="nav-item" >
						<a class="nav-link n" href="#" style="color: #ffffff !important;"><span class="fa fa-rupee"></span>Incentive</a>
					</li>
					<li class="nav-item" >
						<a class="nav-link n" href="#" style="color: #ffffff !important;"><span class="fa fa-sign-in"></span>Login</a>
					</li>
					
				</ul>
				 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
			</div>
		</nav>
	</div>
</header>-->
<?php include 'header.php' ?>
<section class="main">
	<div class="content">
		<div class="row">
			<div class="col-lg-3 col-sm-12">
				<div class="container">
				    <div id="accordion" class="accordion">
				        <div class="card mb-0">
				            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
				                <a class="card-title">
				              		Details
				                </a>
				            </div>
				            <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
				            	<p><h5>Health Plans Hand Picked For You</h5></p>
				                <p class="search text-center">
				                	Modify Search &nbsp;<i class="fa fa-search" aria-hidden="true"></i>
				                </p>
				                <ul>
				                	<li><i class="fa fa-map" aria-hidden="true"></i>&nbsp;<span class="o"> Zone</span>&nbsp; -----&nbsp; CHINTAMANI </li>
				                	<li><i class="fa fa-umbrella" aria-hidden="true"></i>&nbsp;<span class="o">	Sum Insured </span> -----&nbsp; 200000</li>
				                	<li><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;<span class="o"> Self</span>&nbsp;-----&nbsp; Age &nbsp; Date of birth</li>
				                </ul>
				            </div>
				            <br>
				            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				                <a class="card-title">
				                  Supplier
				                </a>
				            </div>
				            <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
				            	<br>
				                <p>
				                	&nbsp;&nbsp;<input type="checkbox" name="Aditya Birla">&nbsp;<span class="acin">Aditya Birla
				                	(2)</span>
				                </p>
				                <p>&nbsp;&nbsp;<input type="checkbox" name="HDFC ERGO" class="acin">&nbsp;<span class="acin">HDFC ERGO (1)</span></p>
				            </div>
				            
				        </div>
				    </div>
				</div>
			</div>
			<div class="col-lg-9 col-sm-12">
				<table class="table table-bordered">
				    <thead>
				      <tr>

				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td style="width: 140px;"><div><img src="<?php echo base_url();?>axxets/templates/insurance/images/hdfc.jpg"></div></br><p>Health Medisure Classic</br></br><input type="checkbox" name="">&nbsp;Click to Compare</p></td>
				        <td style="width: 250px;"><ul class="text-center">
				        	<li>Sum Insured<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>200000</span></li>
				        	<li>Basic Premium<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>2516</span></li>
				        	<li>GST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>453</span></li>
				        </ul>
				    	</td>
				        <td><div class="row">
					      		<div class="col-sm-4 offset-0">
					      			Medical Requirement
					      		</div>
					      		<div class="col-sm-8">
					      			After the age of 45 Years
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		No Claim Bonus
					      		</div>
					      		<div class="col-sm-8">
					      			0.05
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Room Limit
					      		</div>
					      		<div class="col-sm-8">
					      		NO
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Waiting period to cover Pre-Existing ailments
					      		</div>
					      		<div class="col-sm-8">
					      			30 days
					      		</div>
				      		</div> </td>
				        <td style="width: 100px;"><div class="bn">
				        	<button class="btn btn-md btn-primary"><a href=""></a><i class="fa fa-rupee" aria-hidden="true"></i>200000<br><label>Buy Now</label></button>
				        </div></td>
				      </tr>
				      <tr>
				        <td><div><img src="<?php echo base_url();?>axxets/templates/insurance/images/Aditya.png"></div></br><p>Platinum - Enhanced</br></br><input type="checkbox" name="">&nbsp;Click to Compare</p></td>
				        <td><ul>
				        	<li>Sum Insured<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>200000</span></li>
				        	<li>Basic Premium<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>2516</span></li>
				        	<li>GST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>453</span></li>
				        </ul></td>
				        <td><div class="row">
					      		<div class="col-sm-4 offset-0">
					      			Medical Requirement
					      		</div>
					      		<div class="col-sm-6">
					      			NA
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		No Claim Bonus
					      		</div>
					      		<div class="col-sm-6">
					      			Applicable on Sum Insured: 20% increase, Max up to 100% (up to maximum of 50 Lacs ) No reduction on claim, unless utilized
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Room Limit
					      		</div>
					      		<div class="col-sm-6">
					      	Covered up to a) Any room (Available for Sum Insured > 7 Lacs) b) Single Private Room c) Shared Room (available for Sum Insured < 5 Lacs)
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Waiting period to cover Pre-Existing ailments
					      		</div>
					      		<div class="col-sm-8">
					      			NA
					      		</div>
				      		</div></td>
				        <td>
				        	<div class="bn"><button class="btn btn-md btn-primary"><a href=""></a><i class="fa fa-rupee" aria-hidden="true"></i>200000<br><label>Buy Now</label></button></div></td>
				      </tr>
				      <tr>
				        <td><div><img src="<?php echo base_url();?>axxets/templates/insurance/images/hdfc.jpg"></div></br><p>Health Medisure Classic (2 Yrs)</br></br><input type="checkbox" name="">&nbsp;Click to Compare</p></td>
				        <td><ul>
				        	<li>Sum Insured<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>200000</span></li>
				        	<li>Basic Premium<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>2516</span></li>
				        	<li>GST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="con"><i class="fa fa-rupee" aria-hidden="true"></i>453</span></li>
				        </ul></td>
				        <td>
				        	<div class="row">
					      		<div class="col-sm-4 offset-0">
					      			Medical Requirement
					      		</div>
					      		<div class="col-sm-8">
					      			After the age of 45 Years
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		No Claim Bonus
					      		</div>
					      		<div class="col-sm-8">
					      			0.05
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Room Limit
					      		</div>
					      		<div class="col-sm-8">
					      		NO
					      		</div>
				      		</div>
				      		<div class="row">
					      		<div class="col-sm-4 offset-0">
					      		Waiting period to cover Pre-Existing ailments
					      		</div>
					      		<div class="col-sm-8">
					      			30 days
					      		</div>
				      		</div>
				        </td>
				        <td><div class="bn"><button class="btn btn-md btn-primary"><a href=""></a><i class="fa fa-rupee" aria-hidden="true"></i>200000<br><label>Buy Now</label></button></div></td>
				      </tr>

				    </tbody>
  				</table>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>