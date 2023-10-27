<?php 
$user_id = $this->session->user_id;
session_start();
$page = current_url();
$_SESSION['page'] = $page;
$logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo config_item('company_name') ?></title>
	<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
<script src="<?php echo base_url();?>axxets/templates/insurance/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <script src='<?php echo base_url();?>axxets/templates/insurance/js/kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/mainpage.css">
  <style>
  @media (max-width: 1280px)
  {
   .modal-dialog 
   {
    position: relative;
     width: 70%;
     margin: 8em auto 0;
   }
  }
   @media (max-width: 360px), (max-width: 425px){
      .partner{
        padding-bottom: 1000px;
      }
      footer {
        float: left;
      }
    }
     @media (max-width: 1024px){
      .plans_div{
        position: relative;
      }
    }
    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

</style>
  
</head>
<body>
<header>
	<div class="header" >
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="">
				<a class="navbar-brand mr-auto" href="<?php echo site_url();?>">
	      			<img class="img-fluid logo" src="<?php echo $logo;?>">
	     		</a>
	    			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_Navbar">
	     				<span  class="navbar-toggler-icon" style="border: none;"></span>
	     			</button>
	      		<div class="collapse navbar-collapse" id="collapse_Navbar">
	       			<ul class="navbar-nav ml-auto" style="margin-right: 30px;">
	    				<li class="nav-item">
	          				<a class="nav-link " href="<?php echo site_url();?>insurance" style="color: #ffffff !important;">INSURANCE</a>
	    				</li>
	    				<li class="nav-item" >

	    					<a class="nav-link" href="<?php echo site_url();?>bbps_recharge" style="color: #ffffff !important;">RECHARGE</a>
	    				</li>
              <li class="nav-item">

                <a class="nav-link" href="<?php echo site_url();?>astrology/astro_home" style="color: #ffffff !important;">ASTROLOGY</a>
              </li>
              <li class="nav-item" >
                  <a class="nav-link" href="<?php echo site_url();?>school_register" style="color: #ffffff !important;">SCHOOL</a>
              </li>
	    				<li style="display:none;" class="nav-item" >
	    					<a class="nav-link n" href="<?php echo site_url();?>insurance/twowheeler" style="color: #ffffff !important;">TWO WHEELER</a>

	    				</li>
	    				<li style="display:none;" class="nav-item" >
	    					<a class="nav-link n" href="#" style="color: #ffffff !important;">TRAVEL</a>
	    				</li>
	    				<li style="display:none;" class="nav-item" >
	    					<a class="nav-link n" href="#" style="color: #ffffff !important;">TEAM INSURANCE</a>
	    				</li>
              <?php if(!$user_id){ ?>
	    				<li class="nav-item" >
	    					<a data-toggle='modal' data-target='#myModal' class="nav-link btn btn-sm btn-danger n" href="<?php echo site_url('site/login')?>" style="color: #ffffff !important;">Login</a>
	    				</li>&nbsp;&nbsp;

              <li style="display:none;" class="nav-item" >
                <a class="nav-link btn btn-sm btn-danger n" href="<?php echo site_url('site/register')?>" style="color: #ffffff !important;">Register</a>
              </li>
              <?php } else { ?>
                <li class="nav-item" >
                <a class="nav-link btn btn-sm btn-danger n" href="<?php echo site_url('homeapp/logout')?>" style="color: #ffffff !important;">Logout</a>
              </li>&nbsp;&nbsp;
              <li class="nav-item" >
                <a class="nav-link btn btn-sm btn-danger n" href="<?php echo site_url('member')?>" style="color: #ffffff !important;">My Account</a>
              </li>
            <?php } ?>
					</ul>
					 <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
				</div>
			</nav>
		</div>
	</div>
</header>
<section class="slides">
	<div id="demo" class="carousel slide" data-ride="carousel">
 	 	<ul class="carousel-indicators">
		   		<li data-target="#demo" data-slide-to="0" class="active"></li>
		    	<li data-target="#demo" data-slide-to="1"></li>
		    	<li data-target="#demo" data-slide-to="2"></li>
  	</ul>
  	 	<div class="carousel-inner">
  			<div class="carousel-item active">
  				<img  class="img-fluid i1" src="<?php echo base_url();?>axxets/templates/insurance/images/banner1.jpg";alt="first slide">
  			</div>
     	 		<div class="carousel-item">	
       			<img class="img-fluid i1" src="<?php echo base_url();?>axxets/templates/insurance/images/banner2.jpg";alt="second slide">
  			  </div>
      		<div class="carousel-item">
       			<img class="img-fluid i1" src="<?php echo base_url();?>axxets/templates/insurance/images/banner3.jpg"; alt="Third slide">
      		</div>
      		<div class="carousel-item">	
       			<img class="img-fluid i1" src="<?php echo base_url();?>axxets/templates/insurance/images/banner2.jpg";alt="second slide">
  			  </div>
 		  </div>
			<a class="carousel-control-prev arrow" href="#demo" data-slide="prev" >
			    <span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next arrow" href="#demo" data-slide="next" >
			    <span class="carousel-control-next-icon"></span>
			</a>
        <div class="icon-container" style=" display:flex;justify-content:center;align-items:  center;">
			    <div class="main-text hidden-xs">
            <div class="col-md-12 col-md-offset-4">
                <div class="plans_div animated zoomInRight delay-0.2s mx-auto" >
						      <div class="r" >
                    <a style="display:none;" class="plandiv plan3 alldiv one5" href="<?php echo base_url('site/App/insurance/car') ?>">
                        <div class=" oldv">
                            <i class="fa fa-car"></i><br>
                            <span class="smalfnt" >Car</span>
                        </div>
                    </a>

                    <a style="" class="plandiv plan3 alldiv one4" href="<?php echo base_url('/insurance') ?>">
                        <div class=" oldv">
                            <i class="fa fa-medkit"></i><br>
                            <span class="smalfnt">Insurance</span>
                        </div>
                    </a>
                    <a style=""  class="plandiv plan3 alldiv one1" href="<?php echo base_url('/school_register') ?>">
                         <div class="oldv">
                            <i class=" fa fa-university"></i><br>
                            <span class="smalfnt" style="top:-30px !important;font-size: 10px;">School Management</span>
                        </div>
                    </a>
                    <a style="" class="plandiv plan3 alldiv one6" href="<?php echo base_url('bbps_recharge')?>">
                        <div class=" oldv">
                            <i class="fa fa-mobile"></i><br>
                            <span class="smalfnt">Recharge</span>
                        </div>
                    </a>
                    <a style="" class="plandiv plan3 alldiv one2" href="<?php echo base_url('astrology/astro_home') ?>">
                    	<div class=" oldv">
                       		<i class=" fa fa-umbrella"></i><br>
                       		<span class="smalfnt">Astrology</span>
                        </div>
                     </a>
                     
                  </div>
					      </div>
            </div>
          </div>
        </div>
  </div>
</section>
<div class='modal fade' id='myModal'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <!-- Modal Header -->
      <div class='modal-header'>
        <h3 class='modal-title' style="color:#126185;">Login/Register</h3>
        <button type='button' data-dismiss='modal' class="close">&times;</button>
      </div>
      <!-- Modal body -->
      <br>
      <div class='modal-body'>
          <?php echo form_open('site/login') ?>
           
          <div class="row">
            <div class='form-group col-sm-6'>
              <!--<label for='user' class='control-label'>ID</label>-->

              <input type='text' required class='form-control' id='user' name='username' placeholder="ID" >
            </div>
            <div class='form-group col-sm-6'>
              <!--<label for='password' class='control-label'>Password*</label>-->
              <input type="password" required class='form-control' id='password' name='password' placeholder="Password">
             
            </div>
            <!--<div class="col-sm-auto">
              <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label"> Remember me</label>
              </div>
            </div>-->
          </div>
          <br>
          <div class='form-group text-center'>
            <button class='btn btn-success'>Login</button> &nbsp;
            <button class='btn btn-success' style='background:blue;'><a href='<?php echo site_url('site/register') ?>' style='color:white;'>Register</a></button>&nbsp;
            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <a style="display:none;" href='#' data-toggle='modal' data-target='#resetpassword' style='color: blue;'>Forgot Password ?</a>
          </div>
          <?php echo form_close() ?>
      </div>
      <!-- Modal footer -->
    <!--  <div class='modal-footer'>
        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
      </div>-->
    </div>
  </div>
</div>

	<section class="partner">
		<div class="col-sm-12">
			<div class="heading">
				<h1>Partner</h1>
			</div>
			<div>
				<ul class="brand_logos">
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/new_india.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/apolo-health.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/bhartiaxa.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/Max_Bupa.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/oriental_insurance.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/reliance.jpg"></span></li>
					<li><span>	<img src="<?php echo base_url();?>axxets/templates/insurance/images/Religare.jpg"></span></li>
				</ul>
				<ul class="brand_logos">
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/Royal_Sundaram.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/Universal_Sompo.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/Bajaj_Allianz.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/Star_Health.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/tata-aig.jpg"></span></li>
					<li><span><img src="<?php echo base_url();?>axxets/templates/insurance/images/united_india.jpg"></span></li>
					<li><span>	<img src="<?php echo base_url();?>axxets/templates/insurance/images/Universal_Sompo.jpg"></span></li>
				</ul>
			</div>
		</div>
	</section>
<section class="none" style="padding-top: 100px;"></section>

<?php include 'single/insurance/footer.php' ?> 
</body>
</html>