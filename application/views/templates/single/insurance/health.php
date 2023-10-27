<!DOCTYPE html>
<html>
<head>
	<style>
     .fa{
     	color:#ffff;
     }
   </style>
	
	<title>
		
	</title>
	<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
<link rel="stylesheet" href="<?php echo base_url();?>axxets/templates/insurance/css/bootstrap.min.css">
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>axxets/templates/insurance/js/bootstrap.min.js"></script>
  <script src='<?php echo base_url();?>axxets/templates/insurance/css/kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/templates/insurance/css/health.css">

 <script>
 window.onload=function(){
	 var today = new Date();
	 var dd = today.getDate();
     var mm = today.getMonth()+1; //January is 0!
     var yyyy = today.getFullYear()-18;
     if(dd<10){
        dd='0'+dd
     } 
     if(mm<10){
        mm='0'+mm
     } 
     today = yyyy+'-'+mm+'-'+dd;
     document.getElementById("db0").setAttribute("max", today);
 }
var clicked;
var notSelected=true;
function validate()
{
    for(i=0;i<6;i++)
    {
	    var checked=document.getElementById("checkbox"+i).checked;
	    if(checked)
	   { 
           notSelected=false;
		   var db=document.getElementById("db"+i).value;
		   if(db.trim().length==0)
		   {
		   alert("Data of Birth is mandatory for selected checkbox");
		   return false;
		   }
	    }	
    }
	if(notSelected)
	{
		alert("Atleast one member should be selected");
		return false;
	}
return true;
}
</script>
</head>
<body>
<?php include 'header.php' ?>
<section class="heading"><h2 class="text-center">Health Insurance</h2></section>
<section class="main text-center col-lg-12 col-md-8 col-sm-6 mx-auto">
	<div class="row">
		<div class="col-lg-5 col-md-12 col-sm-6">
			<div class="img-container">
				<img class="img-fluid im" src="<?php echo base_url();?>axxets/templates/insurance/images/health_ins.jpg">
			</div>
		</div>
		<div class="col-lg-7 col-md-12 col-sm-6">
		<form class="text-center" style="padding-top: 30px;" action="<?php echo base_url();?>healthInsurance/getPremium"  method="post" onsubmit="return validate();">
		
			<div class="card card-body">
				<div class="select">
					<div class="row">
					
						<div class="col-lg-6 col-sm-12">
							
		                    <div class="md-form in">
							
		                     <label class="h">Select Sum Insured </label>
		                       <select class="form-control md-form form-control-md" id="Claim" name="sumInsure" required>
							    <option value="">--Select--</option>
                                <option value="100000">Rs. 1,00,000</option>
                                <option value="150000">Rs. 1,50,000</option>
                                <option value="200000">Rs. 2,00,000</option>
                                <option value="250000">Rs. 2,50,000</option>
                                <option value="300000">Rs. 3,00,000</option>
                                <option value="350000">Rs. 3,50,000</option>
                                <option value="400000">Rs. 4,00,000</option>
                                <option value="450000">Rs. 4,50,000</option>
                                <option value="500000">Rs. 5,00,000</option>
                                <option value="550000" >Rs. 5,50,000</option>
                                <option value="600000">Rs. 6,00,000</option>
                                <option value="700000">Rs. 7,00,000</option>
                                <option value="750000">Rs. 7,50,000</option>
                                <option value="800000">Rs. 8,00,000</option>
                                <option value="900000">Rs. 9,00,000</option>
                                <option value="1000000">Rs. 10,00,000</option>
                                <option value="1200000">Rs. 12,00,000</option>
                                <option value="1500000">Rs. 15,00,000</option>
                                <option value="1800000">Rs. 18,00,000</option>
                                <option value="2000000">Rs. 20,00,000</option>
                                <option value="2500000" >Rs. 25,00,000</option>
                                <option value="3000000">Rs. 30,00,000</option>
                                <option value="4000000">Rs. 40,00,000</option>
                                <option value="5000000" >Rs. 50,00,000</option>
                                <option value="6000000">Rs. 60,00,000</option>
                                <option value="7000000" >Rs. 70,00,000</option>
                                <option value="7500000" >Rs. 75,00,000</option>
                                <option value="10000000">Rs. 100,00,000</option>
                                <option value="15000000">Rs. 150,00,000</option>
                                <option value="20000000">Rs. 200,00,000</option>
							    </select>
		                    </div>
				        </div>
		                <div class="col-lg-6 col-sm-12">
		                    <div class="md-form in">
		                    	<label class="h">Provide Pincode</label>
		                        <input type="number"  class="form-control" placeholder="" name="pincode" required>
		                    </div>
		                </div>
						 <div class="col-lg-6 col-sm-12">
		                    <div class="md-form in">
		                    	<label class="h">Provide City</label>
		                        <input type="text"  class="form-control" placeholder="" name="city" required>
		                    </div>
		                </div>
						 <div class="col-lg-6 col-sm-12">
		                    <div class="md-form in">
		                    	<label class="h">Provide State</label>
		                        <input type="text"  class="form-control" placeholder="" name="state" required>
		                    </div>
		                </div>
				    </div>
				</div>
				<div style="padding-top: 30px;"></div>
				<div class="mainc">
					<div class="card card-header">
						<h4 class="text-center">Select Members</h4>
					</div>
					<div class="card card-body">
						<div class="content">
						<div class="row">
							<div class="form col-lg-6 col-sm-12 in">
								<div style="padding-bottom: 10px; ">
									<input type="checkbox" name="checkbox0" id="checkbox0"  checked="true"></input>
									<select name="member0">
										<option>Self</option>
										<option>Son</option>
										<option>Daughter</option>
										<option>Mother</option>
										<option>Father</option>
										<option>Spouse</option>
									</select>&nbsp;&nbsp;&nbsp;
								</div>
								<input type="date" name="db0" id="db0" ><label class="db" for="db">Date of Birth</label>
							</div>
							<br>
							<div class="form col-lg-6 col-sm-12 in">
								<div style="padding-bottom: 10px; ">
									<input type="checkbox" name="checkbox1" id="checkbox1"></input>
									<select name="member1">
										<option>Spouse</option>
										<option>Son</option>
										<option>Self</option>
										<option>Daughter</option>
										<option>Mother</option>
										<option>Father</option>
										
									</select>&nbsp;&nbsp;&nbsp;
								</div>
								<input type="date" name="db1" id="db1" ><label class="db" for="db">Date of Birth</label>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="form col-lg-6 col-sm-12 in">
								<div style="padding-bottom: 10px; ">
									<input type="checkbox" name="checkbox2" id="checkbox2"></input>
									<select name="member2">
										<option>Son</option>
										<option>Daughter</option>
										<option>Self</option>										
										<option>Mother</option>
										<option>Father</option>
										<option>Spouse</option>
									</select>&nbsp;&nbsp;&nbsp;
								</div>
								<input type="date" name="db2" id="db2" ><label class="db" for="db">Date of Birth</label>
							</div>
							<br>
							<div class="form col-lg-6 col-sm-12 in">
								<div style="padding-bottom: 10px; ">
									<input type="checkbox" name="checkbox3" id="checkbox3"></input>
									<select name="member3">
										<option>Daughter</option>
										<option>Son</option>
										<option>Mother</option>
										<option>Self</option>										
										<option>Father</option>
										<option>Spouse</option>
									</select>&nbsp;&nbsp;&nbsp;
								</div>
								<input type="date" name="db3" id="db3" ><label class="db" for="db">Date of Birth</label>
							</div>
							
						</div>
						<br>
						<div class="row">
							<div class="form col-lg-6 col-sm-12 in">
								<div style="padding-bottom: 10px; ">
								    <input type="checkbox" name="checkbox4" id="checkbox4"></input>
									<select name="member4" >
										<option>Father</option>
										<option>Self</option>
										<option>Son</option>
										<option>Daughter</option>
										<option>Mother</option>
										<option>Spouse</option>
									</select>&nbsp;&nbsp;&nbsp;
								</div>
								<input type="date" name="db4" id="db4"><label class="db" for="db">Date of Birth</label>
							</div>
							<br>
							<div class="form col-lg-6 col-sm-12 in">
								<div style="padding-bottom: 10px; ">
									<input type="checkbox" name="checkbox5" id="checkbox5"></input>
									<select name="member5">
										<option>Mother</option>
										<option>Spouse</option>
										<option>Self</option>
										<option>Son</option>
										<option>Daughter</option>
										<option>Father</option>
										
									</select>&nbsp;&nbsp;&nbsp;
								</div>
								<input type="date" name="db5" id="db5"><label class="db" for="db">Date of Birth</label>
							</div>
						</div>
						<br>
						
						<br>
						
						<div class="row">
							<div class="form col-lg-6 col-sm-12">
								<input class="mn" type="number" name="" placeholder="Mobile number" required="">
							</div>
							<br><br> 
							<div class="form col-lg-6 col-sm-12 text-center" >
							     <input type="submit" class="btn btn-lg btn-primary" value="Get Quotes" />
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		 </form>
		 
	</div>
</section>
<?php include 'footer.php' ?>
</body>
</html>