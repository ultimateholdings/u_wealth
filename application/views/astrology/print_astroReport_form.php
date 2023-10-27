<?php 
$user_id = $this->session->user_id;
// $page = current_url();
$_SESSION['page'] = $page;
$logo = file_exists(FCPATH .'axxets/client/logo_dark.png') ? base_url().'axxets/client/logo_dark.png' : base_url().'uploads/site_img/logo-dark-text.png';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kundli PDF</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> 
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<script src="<?php echo base_url('axxets/astrology/js/mapbox-sdk.min.js') ?>"></script>
  	<link rel="stylesheet" href="<?php echo base_url('axxets/astrology/css/autocomplete.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=b71d909a197d8a6a4773f03dda117818&callback=initMap" async defer></script>
	<script type="text/javascript" src="<?php echo base_url('axxets/astrology/js/location.js') ?>" ></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/astrology/css/ascendant-report.css');?>">
</head>
<body>

<?php $this->load->view('astrology/inc/header');
$astroData=$this->db_model->select_multi('*', 'astro', array('user_id' => $user_id));
?>

<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo site_url('astrology/astro_home')?>" id="breadcrumbLink">Home</a></li>
  <li class="breadcrumb-item active">Kundli PDF</li>
</ol>

<section>
	<div class="container mt-5">
		<div class="text-center mt-5 mb-5">
		   <h1>Get your Customized Kundli PDF</h1>
		</div>
		<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin: 0 20%;">
			<div class="card-body">
				<div class="mt-3 mb-5" style="padding:0 15%;">	
					<?php 

				if ($this->session->flashdata('response')) {
						# code...
						echo '
						<div class="alert alert-danger">
						'.$this->session->flashdata("response").'<br>Please top-up your wallet
						</div>
						';
					}
				?>
					<?php echo form_open('astrology/kundli_print',['autocomplete'=>'off']); ?>

					<div class="row wrapper">
					   <?php 
						$today = getdate();
						?>

						<?php if ($astroData->status=='Paid') { ?>
						<div class="row" id="paid">
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
							      <option value="kn">ಕನ್ನಡ-Kannada</option>
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
						       	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'date','placeholder'=>'DD','min'=>1,'max'=>31,'required'=>'','value'=>$astroData->birth_day,'readonly'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
						      	<label>Month</label>
						      	<!--<input type="number" class="form-control" placeholder="Hour">-->
						      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'month','placeholder'=>'MM','min'=>1,'max'=>12,'required'=>'','value'=>$astroData->birth_month,'readonly'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
						      	<label>Year</label>
						      	<!--<input type="number" class="form-control" placeholder="Hour">-->
						      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'year','placeholder'=>'YYYY','min'=>1900,'max'=>$today['year'],'required'=>'','value'=>$astroData->birth_year,'readonly'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
						      	<label>Hour</label>
						      	<!--<input type="number" class="form-control" placeholder="Hour">-->
						      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'hour','placeholder'=>'hh','min'=>0,'max'=>23,'required'=>'','value'=>$astroData->birth_hour,'readonly'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
						      	<label>Minute</label>
						      	<!--<input type="number" class="form-control" placeholder="Min">-->
						      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'min','placeholder'=>'mm','min'=>0,'max'=>59,'required'=>'','value'=>$astroData->birth_min,'readonly'=>''));?>
						    </div>
						    <div class="col-4 mt-2">
						      	<label>Second</label>
						      	<!--<input type="number" class="form-control" placeholder="Sec">-->
						      	<?php echo form_input($data=array('type'=>'number','class'=>'form-control','name'=>'sec','placeholder'=>'ss','min'=>0,'max'=>59,'required'=>'','value'=>$astroData->birth_sec,'readonly'=>''));?>
						    </div>
						    <div class="col-12 mt-3 autocomplete">
						      	<label>Birth Place</label>
						      	<!--<input type="text" class="form-control" placeholder="Enter Your Birth Place">-->
						      	<?php echo form_input($data=array('type'=>'search','id'=>'myInput','class'=>'form-control','name'=>'birthplace','placeholder'=>'Enter Your Birth Place','required'=>''));?>
						    </div>
						   	<div class="col-12 mt-3 autocomplete">
						      	<!--<input type="text" class="form-control" placeholder="Enter Your Birth Place">-->
						      	<?php echo form_input($data=array('type'=>'hidden','class'=>'form-control','name'=>'user', 'value'=>$user_id));?>
						    </div>
						    <div id="form_button">
						  	<!-- <?php echo form_submit($data = array('type' => 'submit','value'=> 'Submit and Checkout >>','class'=> 'btn btn-primary btn-lg btn-block mt-3 ml-3 downloadable')); ?> -->
						  	
	                    		<button type="submit" class="btn btn-success btn-lg btn-block mt-3 ml-3">Get PDF >></button>
	                    	</div>
	                    	<button type="button" onclick="getElementById('add-btn').style.display = 'block'; this.style.display = 'none';" class="btn btn-danger mt-3 ml-4 add-btn" id="add-btn">Add New</button>
						</div>
                    	<script type="text/javascript">
						  $(document).ready(function () {
						 
						    // allowed maximum input fields
						    var max_input = 1;
						 
						    // initialize the counter for textbox
						    var x = 0;
						 
						    // handle click event on Add More button
						    $('.add-btn').click(function (e) {
						      e.preventDefault();

						      if (x < max_input) { // validate the condition
						        x++;// increment the counter
						        $('.wrapper').append(`
								<div class="wrapper">
								<?php echo form_open('astrology/kundli_print',['autocomplete'=>'off']); ?>
									<div class="row">
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
										      <option value="kn">ಕನ್ನಡ-Kannada</option>
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
									      	<?php echo form_input($data=array('type'=>'search','id'=>'myInput','class'=>'form-control','name'=>'birthplace','placeholder'=>'Enter Your Birth Place','required'=>''));?>
									    </div>
									   <div class="col-12 mt-3 autocomplete">
									      	<!--<input type="text" class="form-control" placeholder="Enter Your Birth Place">-->
									      	<?php echo form_input($data=array('type'=>'hidden','class'=>'form-control','name'=>'user', 'value'=>$user_id));?>
									    </div>
									    <div id="form_button">
									  						  	
				                    		<button type="submit" class="btn btn-success btn-lg btn-block mt-3 ml-3">Get PDF >></button>
				                    	</div>
				                    	<button type="button" class="remove-lnk btn btn-danger ml-4">Remove</button>
				                    </div>
				                <?php echo form_close(); ?>   
				                </div>

						        `); // add input field
								$("#paid").hide();
						      }
						      
						    });
						 
						    // handle click event of the remove link
						    $('.wrapper').on("click", ".remove-lnk", function (e) {
						      e.preventDefault();
						      $(this).parent('div').remove();  // remove input field
						      x--; // decrement the counter
						      location.reload();
						    })
						 
						  });
						</script>
                    	
                    	<?php } else { ?> 
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
					   <div class="col-12 mt-3 autocomplete">
					      	<!--<input type="text" class="form-control" placeholder="Enter Your Birth Place">-->
					      	<?php echo form_input($data=array('type'=>'hidden','class'=>'form-control','name'=>'user', 'value'=>$user_id));?>
					    </div>
                    		<button type="submit" class="btn btn-warning btn-lg btn-block mt-3 ml-3 downloadable" data-toggle="modal" data-target="#alertModal">Submit and Checkout >></button>
                    	</div>
                    	<?php } ?>
					<!--</form>-->
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>	
</section>
<div class='modal fade' id='alertModal'>
  <div class='modal-dialog modal-lg'>
    <div class='modal-content'>
      <!-- Modal Header -->
      <div class='modal-header card-header'>
        <h3 class='modal-title' style="color:white;">Confirm details</h3>
        <button type='button' data-dismiss='modal' class="close">&times;</button>
      </div>
      <div class="modal-body">
      	<div class="alert alert-warning">Date and Time data once submitted can not be changed again!!!</div>
        <!-- <button type='' data-dismiss='modal' class="close">&times;</button> --><br>
        <button type='button' class="btn btn-danger" data-dismiss='modal'>Close</button>
      </div>
    </div>
   </div>
</div>
<script src="<?php echo base_url('axxets/astrology/js/autocomplete.js') ?>"></script>





