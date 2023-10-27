<?php 
$today = getdate();
?>
						<div class="col-12">
					      <label>Name</label>
					      <!--<input type="text" class="form-control" placeholder="First name">-->
					      <?php echo form_input($data=array('class'=>'form-control','name'=>'Name','placeholder'=>'Enter name','required'=>''));?>
					    </div>
					    <div class="col-6 mt-2">
					      <label for="exampleFormControlSelect1">Language</label>
						    <select class="form-control" id="exampleFormControlSelect1" name="lang">
						      <option selected="" value="en">English</option>
						      <option value="hi">हिंदी-Hindi</option>
						      <option value="ta">தமிழ்-Tamil</option>
						      <option value="te">తెలుగు-Telugu</option>
						      <option value="ma">मराठी-Marathi</option>
						      <option value="kn">ಮರಾಠಿ-Kannada</option>
						      <option value="bn">মারাঠি-Bengali</option>
						    </select>
						</div>

					    <div class="col-6 mt-2">
					      <label for="exampleFormControlSelect1">Gender</label>
						    <select class="form-control" id="exampleFormControlSelect1" name="gender">
						      <option selected="">Male</option>
						      <option>Female</option>
						    </select>
						</div>
					    <div class="col-4 mt-2">
					      	<label>Date</label>
					      	<!--<input type="date" class="form-control">-->
					       	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'date','placeholder'=>'DD','min'=>1,'max'=>31,'required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      	<label>Month</label>
					      	<!--<input type="number" class="form-control" placeholder="Hour">-->
					      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'month','placeholder'=>'MM','min'=>1,'max'=>12,'required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      	<label>Year</label>
					      	<!--<input type="number" class="form-control" placeholder="Hour">-->
					      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'year','placeholder'=>'YYYY','min'=>1900,'max'=>$today['year'],'required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      	<label>Hour</label>
					      	<!--<input type="number" class="form-control" placeholder="Hour">-->
					      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'hour','placeholder'=>'hh','min'=>0,'max'=>23,'required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      	<label>Minute</label>
					      	<!--<input type="number" class="form-control" placeholder="Min">-->
					      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'min','placeholder'=>'mm','min'=>0,'max'=>59,'required'=>''));?>
					    </div>
					    <div class="col-4 mt-2">
					      	<label>Second</label>
					      	<!--<input type="number" class="form-control" placeholder="Sec">-->
					      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'sec','placeholder'=>'ss','min'=>0,'max'=>59,'required'=>''));?>
					    </div>
					    <div class="col-12 mt-3 autocomplete">
					      	<label>Birth Place</label>
					      	<!--<input type="text" class="form-control" placeholder="Enter Your Birth Place">-->
					      	<?php echo form_input($data=array('type'=>'search','id'=>'myInput','class'=>'form-control','name'=>'birthplace','placeholder'=>'Enter Your Birth Place','required'=>''));?>
					    </div>