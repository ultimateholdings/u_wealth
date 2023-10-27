<!DOCTYPE html>
<html>
<head>
<title>CAR</title>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <script src='<?php echo base_url();?>axxets/templates/insurance/js/kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/car.css">
 <style> 
  #ui-id-2 {
            	width: 500px !important;
            	overflow-y: scroll;
            	height: 300px;
            }
  #ui-id-1{
            	width: 500px !important;
            	overflow-y: scroll;
            	height: 300px;
            }
            #ui-id-3 {
            	width: 500px !important;
            	overflow-y: scroll;
            	height: 300px;
            }
             #ui-id-4 {
            	width: 500px !important;
            	overflow-y: scroll;
            	height: 300px;
            }


        </style>

  
</head>
<body>
<?php include 'header.php'; ?>
<section class="main">
	 <div class="col-lg-8 mx-auto">
	 	<div class="card card-body m">
		<div class="row">	
			<ul class="header_options">
				<li style="font-size:30px;color: #126185;display: inline-block;"><b>Car Insurance</b></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;
 		color: #126185;
 		font-size: large;
 		font-weight: bold;"><div class="custom-control custom-radio">
  			 		<input name="collapseGroup" type="radio" id="customRadio1" name="customRadio" class="custom-control-input" data-target="#collapse1" data-toggle="collapse" aria-expanded="true" checked>
  					<label class="custom-control-label" for="customRadio1"> New</label>
					</div>
				</li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li style="display: inline-block;
 		color: #126185;
 		font-size: large;
 		font-weight: bold;"><div class="custom-control custom-radio">
  					<input name="collapseGroup" type="radio" id="customRadio2" name="customRadio" class="custom-control-input collapse" data-target="#collapse2" data-toggle="collapse" aria-expanded="false">
  					<label class="custom-control-label" for="customRadio2"> RENEWAL/ROLLOVER</label>
					</div>
				</li>
			</ul>	
		</div>

		<div id="accordion">
		<div class="collapse show" id="collapse1" data-parent="#accordion">
		  <div class="card card-body">
			    <div class="card-body px-lg-5 pt-0">
			        <form class="text-center" style="padding-top: 30px;" action="<?php echo site_url();?>insurance/ComparemotorQuotes"  method="post">
			            <div class="form-row">
			                <div class="col-lg-6 col-sm-6">
			                    <div class="md-form in">
			                        <input type="text"  class="form-control" placeholder="RTO CODE" required="" id="rto" name="rto">
			                    </div>
			                </div>
			                <div class="col-lg-6 col-sm-12">
			                    <div class="md-form in">
			                        <input type="" class="form-control" placeholder="Registration Number" name="regno" id="regno" required="">
			                        
			                    </div>
			                </div>
			            </div>
			            <div class="form-row">
			                <div class="col-lg-6 col-sm-12">
			                    <div class="md-form in">
			                        <input type="text"  class="form-control" placeholder=" Make/Model" id="model" required="" name="model">
			                        <!--<select class="form-control" name="model" required>
			                        	<option>Select Make/Model </option>
                                      <?php foreach ($model as $val) {
                                      
                                       echo '<option value="' . $val['id'] . '">' . $val . '</option>';
                                      } ?>
                                    </select>-->
			                      
			                    </div>
			                </div>
			                <div class="col-lg-6 col-sm-12">
			                    <div class="md-form in">
			                        <input type="date" class="form-control" name="regdate" id="regdate" required="" placeholder="Date of Registration/Date of 1st Purchase">
			                         <label>Date of Registration/Date of 1st Purchase</label>
			                    </div>
			                </div>
			            </div>
			            <div class="form-row">
			                <div class="col-sm-12 col-lg-6">
			                    <div class="md-form in">
			                        <input type="number" class="form-control" placeholder="Mobile Number" required="" name="mobile" id="mobile">
			                       
			                    </div>
			                </div>
			            </div>
			           	<div class="text-center"> 
			           		<button class="btn btn-md btn-warning bt"><b>Get Quotes</b></button>
			           	</div>
			        </form>
			    </div>
			
		  </div>
		</div>
		<div class="collapse" id="collapse2" data-parent="#accordion">
		  <div class="card card-body ">
		   	<div class="card-body px-lg-5 pt-0">
			        <form class="text-center" style="padding-top: 30px;" action="<?php echo site_url();?>insurance/ComparemotorQuotes" method="post">
			            <div class="form-row">
			                <div class="col-lg-6 col-sm-12 " >
			                    <div class="md-form in">
			                         <input type="text"  class="form-control" placeholder="RTO CODE" required="" id="rto1" name="rto1">
			             
			                    </div>
			                </div>
			                <div class="col-lg-6 col-sm-12 ">
			                    <div class="md-form in">
			                        <input type="text" class="form-control"  placeholder="Registration Number" required="" name="regno" id="regno">
			                        
			                    </div>
			                </div>
			            </div>
			            <div class="form-row">
			                <div class="col-lg-6 col-sm-12">
			                    <div class="md-form in">
			                         <input type="text"  class="form-control" placeholder=" Make/Model" id="model1" required="" name="model1">
			                    	
			                      
			                    </div>
			                </div>
			                <div class="col-lg-6 col-sm-12">

			                    <div class="md-form in">
			                    	
			                        <input type="text" onfocus="(this.type='date')"  class="form-control" placeholder="Date of Registration/Date of 1st Purchase" required="" name="regdate" id="regdate">
			                    </div>
			                </div>
			            </div>
			            <div class="form-row">
			                <div class="col-lg-6 col-sm-12">
			                    <div class="md-form in">
			                        <input type="text" onfocus="(this.type='date')"  class="form-control" placeholder="Previous Policy Expiry" id="previous_policy_expiry" name='previous_policy_expiry' required>
			                       
			                    </div>
			                </div>
			                <div class="col-lg-6 col-sm-12">
			                	
			                    <div class="md-form in">
                                     
								    <select class="form-control md-form" id="claimmade" name="claimmade">
								      <option value="yes">Yes</option>
								      <option value="no" selected>No</option>
								    </select>
  								</div>
  								<label for="Claim">Claim Made Last Year?</label>
			                </div>
			            </div>
			            <div class="form-row">
			                <div class="col-lg-6 col-sm-12" id="claimbonus">
			                    <div class="md-form in">
			                    	
			                       <select class="form-control md-form form-control-md" id="ncb" name="ncb">
								      <option>--Select--</option>
								      <option>0%</option>
								      <option>20%</option>
								      <option>25%</option>
								      <option>35%</option>
								      <option>45%</option>
								      <option>50%</option>
								      
								    </select>
								    <label >No Claim Bonus % </label>
			                    </div>
			                </div>
			                <div class="col-lg-6 col-sm-12">
			                    <div class="md-form in">
			                        <select class="form-control md-form" id="previous_insurer" name="previous_insurer">
			                        	<option value="Select">Select</option>
										<option value="Bajaj Allianz">Bajaj Allianz</option>
										<option value="BhartiAxa">BhartiAxa</option>
										<option value="Cholamandlam">Cholamandlam</option>
										<option value="Future Generalli">Future Generalli</option>
										<option value="GoDigit">GoDigit</option>
										<option value="HDFC ERGO">HDFC ERGO</option>
										<option value="ICICI Lombard">ICICI Lombard</option>
										<option value="Iffco Tokio">Iffco Tokio</option>
										<option value="Kotak">Kotak</option>
										<option value="L&amp;T Insurance">L&amp;T Insurance</option>
										<option value="Liberty Videocon">Liberty Videocon</option>
										<option value="National Insurance">National Insurance</option>
										<option value="New India">New India</option>
										<option value="Oriental Insurance">Oriental Insurance</option>
										<option value="Reliance General">Reliance General</option>
										<option value="Royal Sundaram">Royal Sundaram</option>
										<option value="SBI General ">SBI General </option>
										<option value="Shriram">Shriram</option>
										<option value="TATA AIG">TATA AIG</option>
										<option value="United India">United India</option>
										<option value="Universal Sompo">Universal Sompo</option>

			                        </select>
			                         <label>Previous Insurer</label>
			                    </div>
			                </div>
			            </div>
			            <div class="form-row">
			                <div class="col-sm-12 col-lg-6">
			                    <div class="md-form in">
			                        <input type="Number"  class="form-control" placeholder="Mobile Number" required="" name="mobile" id="mobile">
			                        
			                    </div>
			                </div>
			  
			            </div>
			           	<div class="text-center">
			           		<button class="btn btn-md btn-warning bt"><b>Get Quotes</b></button>
			           	</div>
			        </form>
			    </div>	
		  </div>
		</div>
		</div>
	</div>
	</div>
	<div class='modal fade' id='myModal'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <!-- Modal Header -->
      <div class='modal-header'>
        <button type='button' data-dismiss='modal'>&times;</button>
        <h1 class='modal-title' style='align-items: center;'><b>Online Recharge</b></h1>
      </div>
      <!-- Modal body -->
      <div class='modal-body'>
        <p>
          <?php echo form_open('site/login') ?>
          <div class='form-group'>
            <label for='user' class='control-label'>ID</label>
            <input type='text' required class='form-control' id='user' name='username' >
            <label for='password' class='control-label'>Password*</label>
            <input type='password' required class='form-control' id='password' name='password'>
          </div>
          <div class='form-group'>
            <button class='btn btn-success'>Login</button> OR
            <button class='btn btn-success' style='background:blue;'><a href='<?php echo site_url('site/register') ?>' style='color:white;'>Register</a></button><br/>
            <br></br>
              <a href='#' data-toggle='modal' data-target='#resetpassword' style='color: blue;'>Forgot Password ?</a>
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
</section>
<?php include 'footer.php' ?> 
  
<script>
  $(function() {
    $( "#model" ).autocomplete({
      source: '<?php echo site_url('insurance/makeModelVariant_4W') ?>'
    });
  });
</script>
<script>
  $(function() {
    $( "#rto" ).autocomplete({
      source: '<?php echo site_url('insurance/GetRto') ?>'
      //source: '<?php echo site_url('cron/get_products') ?>'
    });
  });
</script>
<script>
  $(function() {
    $( "#rto1" ).autocomplete({
      source: '<?php echo site_url('insurance/GetRto') ?>'
    });
  });
</script>
<script>
  $(function() {
    $( "#model1" ).autocomplete({
      source: '<?php echo site_url('insurance/makeModelVariant_4W') ?>'
    });
  });
</script>


</body>
</html>