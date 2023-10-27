
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo "Hello" //$this->settings_model->get_favicon(); ?>">

    <!-- App css -->
    <link href="<?php echo base_url(); ?>axxets/templates/school/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>axxets/templates/school/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>axxets/templates/school/css/app.css" rel="stylesheet" type="text/css" />

    <!--Notify for ajax-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://js.stripe.com/v3/"></script>
     <script
    src="https://www.paypal.com/sdk/js?client-id=<?=$settings[0]['paypal_client_id_sandbox']?>"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>

<script type="text/javascript">
    var frm = $('#loginForm');

    frm.submit(function (e) {
        alert("LLKKK");
        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      .select2-container--default .select2-selection--single{
        padding:6px;
        height: 37px;
        width: 380px; 
        font-size: 1.2em;  
        position: relative;
    }
  </style>
</head>

<body class="auth-fluid-pages pb-0">

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="text-center text-lg-left mb-3">
                        <a href="<?php echo site_url(); ?>">
                           <span><img src="https://www.karthikeyaschool.com/schoolsoftware/uploads/system/logo/logo-dark.png" alt="" height="35"></span>
                        </a>
                    </div>
                    <!-- title-->
                    <?php if(($this->session->flashdata('msg'))): ?>
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> <?=$this->session->flashdata('msg')?>
                        </div>
                    <?php endif; ?>
                    <?php if(($this->session->flashdata('error'))): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!</strong> <?=$this->session->flashdata('error');?>
                        </div>
                    <?php endif; ?>

                    <!-- form -->
                    <form action="<?php echo site_url('school_register/validate_registeration'); ?>" method="post" id="loginForm">
                        <div class="form-group">
                            <label for="emailaddress">Name</label>
                            <input class="form-control" type="text" name="name" id="name" required="" placeholder="Enter your Name" value="<?=set_value('name')?>">
                            <span class="text text-danger"><?=form_error('name');?></span>
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">Phone Number</label>
                            <input class="form-control" type="text" name="phonne" id="phonne" required="" placeholder="Enter your phonne" value="<?=set_value('phonne')?>">
                            <span class="text text-danger"><?=form_error('phonne');?></span>
                        </div>
                        <div class="form-group">
                            <label for="emailaddress"><?php echo "email"; ?></label>
                            <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email" value="<?=set_value('email')?>">
                            <span class="text text-danger"><?=form_error('email');?></span>
                        </div>
                        <div class="form-group">
                            <label for="emailaddress"><?php echo "password"; ?></label>
                            <input class="form-control" type="password" name="password" id="password" required="" placeholder="Enter your password">
                            <span class="text text-danger"><?=form_error('password');?></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="emailaddress">School Name</label>
                            <input class="form-control" type="text" name="schl_name" id="schl_name" required="" placeholder="Enter your School Name" value="<?=set_value('schl_name')?>">
                            <span class="text text-danger"><?=form_error('schl_name');?></span>
                        </div>
                        <div class="form-group">
                            <label for="schl_address">School Address</label>
                            <input class="form-control" type="text" name="schl_address" id="schl_address" required="" placeholder="Enter your School Adress" value="<?=set_value('schl_address')?>">
                            <span class="text text-danger"><?=form_error('schl_address');?></span>
                        </div>
                        <div class="form-group">
                            <label for="emailaddress">State</label>
                            <input class="form-control" type="text" name="state" id="state" required="" placeholder="Enter your State" value="<?=set_value('state')?>">
                            <span class="text text-danger"><?=form_error('state');?></span>
                        </div>
                        
                       <div class="form-group">
                        <label for="emailaddress"><?php echo 'country'; ?></label>
                         <select name="country" id="country" class="form-control" value="<?=set_value('country')?>" required>
                                <option value="">Select Country</option>
                                <option value="Afghanistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Austrian Empire">Austrian Empire</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Baden">Baden</option>
<option value="Bahamas, The">Bahamas, The</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Bavaria">Bavaria</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin (Dahomey)">Benin (Dahomey)</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="Brunei">Brunei</option>
<option value="Brunswick and Lüneburg">Brunswick and Lüneburg</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso (Upper Volta)">Burkina Faso (Upper Volta)</option>
<option value="Burma">Burma</option>
<option value="Burundi">Burundi</option>
<option value="Cabo Verde">Cabo Verde</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cayman Islands, The">Cayman Islands, The</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Central American Federation*">Central American Federation*</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo Free State, The">Congo Free State, The</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote d’Ivoire (Ivory Coast)">Cote d’Ivoire (Ivory Coast)</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czechia">Czechia</option>
<option value="Czechoslovakia">Czechoslovakia</option>
<option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="Duchy of Parma, The*">Duchy of Parma, The*</option>
<option value="East Germany (German Democratic Republic)">East Germany (German Democratic Republic)</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Eswatini">Eswatini</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Federal Government of Germany (1848-49)*">Federal Government of Germany (1848-49)*</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="Gabon">Gabon</option>
<option value="Gambia, The">Gambia, The</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Grand Duchy of Tuscany, The*">Grand Duchy of Tuscany, The*</option>
<option value="Greece">Greece</option>
<option value="Grenada">Grenada</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hanover*">Hanover*</option>
<option value="Hanseatic Republics*">Hanseatic Republics*</option>
<option value="Hawaii*">Hawaii*</option>
<option value="Hesse*">Hesse*</option>
<option value="Holy See">Holy See</option>
<option value="Honduras">Honduras</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kingdom of Serbia/Yugoslavia*">Kingdom of Serbia/Yugoslavia*</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea">Korea</option>
<option value="Kosovo">Kosovo</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Lew Chew (Loochoo)*">Lew Chew (Loochoo)*</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mecklenburg-Schwerin*">Mecklenburg-Schwerin*</option>
<option value="Mecklenburg-Strelitz*">Mecklenburg-Strelitz*</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Namibia">Namibia</option>
<option value="Nassau*">Nassau*</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands, The">Netherlands, The</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="North German Confederation*">North German Confederation*</option>
<option value="North German Union*">North German Union*</option>
<option value="North Macedonia">North Macedonia</option>
<option value="Norway">Norway</option>
<option value="Oldenburg*">Oldenburg*</option>
<option value="Oman">Oman</option>
<option value="Orange Free State*">Orange Free State*</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Panama">Panama</option>
<option value="Papal States*">Papal States*</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Piedmont-Sardinia*">Piedmont-Sardinia*</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Genoa*">Republic of Genoa*</option>
<option value="Republic of Korea (South Korea)">Republic of Korea (South Korea)</option>
<option value="Republic of the Congo">Republic of the Congo</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Schaumburg-Lippe*">Schaumburg-Lippe*</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands, The">Solomon Islands, The</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Sudan">South Sudan</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Texas*">Texas*</option>
<option value="Thailand">Thailand</option>
<option value="Timor-Leste">Timor-Leste</option>
<option value="Togo">Togo</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Two Sicilies*">Two Sicilies*</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="Union of Soviet Socialist Republics*">Union of Soviet Socialist Republics*</option>
<option value="United Arab Emirates, The">United Arab Emirates, The</option>
<option value="United Kingdom, The">United Kingdom, The</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Württemberg*">Württemberg*</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                                
                                
                            </select>
                        <span class="text text-danger"><?=form_error('country');?></span>
                    </div>
                    <div class="form-group">
                            <label for="gstnumber">GST Number</label>
                            <input class="form-control" type="text" name="gst_no" id="gst_no" placeholder="Enter your GST No" >
                     </div>
                        <div class="form-group">
                            <input type="radio" name="package" id="predefinedPackage" checked
value="predefinedPackage" style="font-size:13px; margin-bottom:12px;font-weight: bold;"><span style="font-size:13px;margin-bottom:12px;font-weight: bold;"> Predefined package(<?php echo $currency;?> )</span>

<input type="radio" name="package" id="customizedPackage"
value="customizedPackage" ><span style="font-size:13px;margin-bottom:12px;font-weight: bold;"> Customized package(<?php echo $currency;?>)</span>
<br />                     
<select name="pakage" id="pakage" class="form-control " required>
                                <option value="">Select Pakages</option>
                               <?php if(isset($pakages)){ 
                                        foreach ($pakages as $value) { ?>
											<option value="<?=$value->id?>" data-value="<?=$value->cost?>"><?php echo $value->name.' - '.$value->cost;?><?php echo ' ('.$currency.')';?></option>
                                <?php 
                                }  
								
                                           
                            } ?>
                            </select>
                            <span class="text text-danger"><?=form_error('pakage');?></span>
                            <div id="custom" style="display:none">
                            <table><ul><tr><td><div id="error"></div></td></li>
							</td>
							</tr><tr><td><li><span style="font-size:12px;">Number of Days :</span></li></td><td><input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" id="noOfDays" name="noOfDays" ></span></li>
							</td>
							</tr>
							<tr><td><li><span style="font-size:12px;">Number of Parents :</span></li></td><td><input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" id="noOfParents" name="noOfParents" ></span>
							</td><td><input type="hidden"  id="valueOfParents"  value="<?php echo $package_settings->AmountPerParent;?>"></span></li>
							</td></tr>
							<tr><td><li><span style="font-size:12px;">Number of Teachers:</span></li></td><td><input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" id="noOfTeachers" name="noOfTeachers" ></span>
              </td><td><input type="hidden"  id="valueOfTeachers" value="<?php echo $package_settings->AmountPerTeacher;?>"></span></li>
							</td></tr>
							
							<tr><td><li><span style="font-size:12px;">Number of students:</span></li></td><td><input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" id="noOfStudents" name="noOfStudents" ></span>
							</td><td><input type="hidden" id="valueOfStudents" value="<?php echo $package_settings->AmountPerStudent;?>" ></span></li>
							</td></tr>
							
							<tr><td><li><span style="font-size:12px;">Number of Librarian:</span></li></td><td><input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" id="noOfLibrarians" name="noOfLibrarians" ></span>
							</td><td><input type="hidden" id="valueOfLibrarians" value="<?php echo $package_settings->AmountPerLibrarian;?>"></span></li>
							</td></tr>
							<tr><td><li><span style="font-size:12px;">Number of Accountants:</span></li></td><td><input type="text" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" id="noOfAccountants" 
							name="noOfAccountants" ></span>
							</td><td><input type="hidden" id="valueOfAccountants" value="<?php echo $package_settings->AmountPerAccountant;?>"></span></li>
							</td></tr>
							<tr><td><li><span style="font-size:12px;">Total amount to be paid :</span></li></td><td><input type="number" id="amountPaid" >
							</td></tr>
							</ul></table>    
							</div>
                        </div>
                        
                        <div class="form-group">
                            <label for="payment">Coupon Code</label>
                        <div class="d-flex justify-content-between">
                           <input class="form-control" type="text" name="coupon" id="coupon"  placeholder="Enter Coupon code" value="<?=set_value('coupon')?>">
                            <label class="btn btn-primary btn-block" id="applybtn" style="width:20%; margin-left:10px;background-color:#0acf97;border-color:#0acf97" > 
                            Apply
                            </label>
                            <input class="form-control" type="hidden" name="couponurl" id="couponurl"  value="<?php echo $couponurl;?>">
                            </div>
                        </div>
                        
                        <div class="form-group" id="validateCoupon">
                            <input type="hidden" class="form-control" id="total_value" name = "total_value" value="" >
                        </div>
                        
                        <input type="hidden" class="form-control" id="wallet_balance" name = "wallet_balance" value="<?php echo $balance ?>" >

                        <div class="form-group">
                            <label for="payment">Payment Option</label>
                            <select name="payment" id="payment" class="form-control" required="">
                                <option value="">Select Payment System</option>
                                <option value="wallet">Wallet(<?php echo $balance ?>)</option>
                               <?php if(isset($stripe_status) && $stripe_status == 1):?>
                                    <option value="stripe">Stripe</option>
                               <?php endif;
                                    if(isset($paypal_status) && $paypal_status == 1):
                               ?>
                                    <option value="paypal">Paypal</option>
                               <?php endif; ?>
                                    <option value="axis">UPI /Debit / Credit / Net Banking</option>
                            </select>
                            
                        </div>
                    <div class="form-row" style="display: none;">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element" class="form-control">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" id="btn" type="submit"><i class="mdi mdi-login"></i> Register </button>
                        </div>
                    </form>
                    <!-- end form-->
                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
<!-- end Auth fluid right content -->
</div>
<!-- end auth-fluid-->


<!-- App js -->
<script src="<?php echo base_url(); ?>axxets/templates/school/js/app.min.js"></script>


<!--Notify for ajax-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<?php if ($this->session->flashdata('info_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?php echo 'success'; ?>!", '<?php echo $this->session->flashdata("info_message");?>' ,"top-right","rgba(0,0,0,0.2)","info");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?php echo 'oh_snap'; ?>!", '<?php echo $this->session->flashdata("error_message");?>' ,"top-right","rgba(0,0,0,0.2)","error");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('flash_message') != ""):?>
    <script type="text/javascript">
    $.NotificationApp.send("<?php echo 'congratulations'; ?>!", '<?php echo $this->session->flashdata("flash_message");?>' ,"top-right","rgba(0,0,0,0.2)","success");
</script>
<?php endif;?>

<script type="text/javascript">
   $(document).ready(function(){
        $('#emailaddress').focusout(function(){
            var val = $(this).val();
            $.ajax({
                url:' <?php echo base_url()?>school_register/email_varification',
                method: 'post',
                dataType: 'json',
                data: {email:val},
                success:function(res){
                    console.log(res);
                    if(res){

                    }else{
                        $.NotificationApp.send("Error", 'Email already exists' ,"top-right","rgba(0,0,0,0.2)","error");
                        $('#emailaddress').val('');
                        document.getElementById("emailaddress").focus();
                    }   
                }
            });
        });

        $('input[type=radio][name="package"').change(function() {
            $('#coupon').val("");
            $('#validateCoupon').empty();
});
		
	
   $("#applybtn").click(function(){
      var coupon_code = $('#coupon').val();
      var package_name = $('#predefinedPackage').val();
      var couponurl=$('#couponurl').val();
      var package_id = -1;
      var valid = 'valid';
      var total_amount=0;       
      if ($("#predefinedPackage").prop("checked")) {
      package_id = $('#pakage').val();
      couponurl=couponurl+'validate_coupon?coupon_code='+coupon_code+'&package_id='+package_id;
}
else
{
  var amount= $('#amountPaid').val();
   if(amount == ""){
       $valid=""
       message='<span class="text text-danger">Total Amount needs to be calculated before applying the coupon.</span>';
        $('#validateCoupon').html(message);
   }
   else
   {
       total_amount=amount;
       couponurl=couponurl+'validate_custom_coupon?coupon_code='+coupon_code+'&total_amount='+total_amount;
   }
}

 if(valid != "")
 {
    if(coupon_code != "" && package_id!= ""){
        $.ajax({
            url: couponurl,
            success: function(response){
				$('#validateCoupon').html(response);
            },
			error: function(result){
                $('#validateCoupon').html(response);
            }
        });
    }
    else
    {
        var message="";
        if(coupon_code == "" && package_id == ""){
            message="Please select package and enter the coupon code";
        }
        else if(coupon_code == "")
        {
             message="Enter coupon code";
        }
        else if(package_id == "")
        {
            message="Please select the package";
        }
        message='<span class="text text-danger">'+message+'</span>';
        $('#validateCoupon').html(message);
    }			
 }
    });
}); 
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#payment').change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            if(selectedCountry === 'stripe'){
                $('form').attr('action','<?=base_url()?>register/validate_registeration');
                $('.form-row').css('display','block');
               var stripe = Stripe('<?=$publish_key?>');
                var elements = stripe.elements();
                var style = {
                  base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                      color: '#aab7c4'
                    }
                  },
                  invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                  }
                };
                var card = elements.create('card', {style: style});
                card.mount('#card-element');
                card.addEventListener('change', function(event) {
                  var displayError = document.getElementById('card-errors');
                  if (event.error) {
                    displayError.textContent = event.error.message;
                  } else {
                    displayError.textContent = '';
                  }
                });
                 // Handle form submission.
                    var form = document.getElementById('loginForm');
                    form.addEventListener('submit', function(event) {
                      event.preventDefault();

                      stripe.createToken(card).then(function(result) {
                        if (result.error) {
                          // Inform the user if there was an error.
                          var errorElement = document.getElementById('card-errors');
                          errorElement.textContent = result.error.message;
                        } else {
                          // Send the token to your server.
                          stripeTokenHandler(result.token);
                        }
                      });
                    });

                        // Submit the form with the token ID.
                function stripeTokenHandler(token) {
                  // Insert the token ID into the form so it gets submitted to the server
                  var form = document.getElementById('loginForm');
                  var hiddenInput = document.createElement('input');
                  hiddenInput.setAttribute('type', 'hidden');
                  hiddenInput.setAttribute('name', 'stripeToken');
                  hiddenInput.setAttribute('value', token.id);
                  form.appendChild(hiddenInput);
                  // Submit the form
                  form.submit();
                }   

            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){
        /*$('#payment').change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            if(selectedCountry == 'paypal'){
                $('.form-row').css('display','none');
                $('form').attr('action','<?=base_url()?>admin/paypal_registeration');
            }
        });*/
        $('#customizedPackage').change(function(){
            if($('#customizedPackage').is(':checked'))
            {
               $('#pakage').removeAttr('required');
			   $('#pakage').hide();
			   $('#custom').show();
			   $('#noOfDays').attr('required', 'required');
			   $('#noOfParents').attr('required', 'required');
			   $('#noOfTeachers').attr('required', 'required');
			  $('#noOfStudents').attr('required', 'required');
			  $('#noOfLibrarians').attr('required', 'required');
			  $('#noOfAccountants').attr('required', 'required');
			  $('#amountPaid').attr('required', 'required');
            }
		 });
		 $('#predefinedPackage').change(function(){
            if($('#predefinedPackage').is(':checked'))
            {
                $('#pakage').attr('required', 'required');
                $('#pakage').show();
			    $('#custom').hide();
			    $('#noOfDays').removeAttr('required');  
			    $('#noOfParents').removeAttr('required');
			    $('#noOfTeachers').removeAttr('required');
			    $('#noOfStudents').removeAttr('required');
			    $('#noOfLibrarians').removeAttr('required');
			    $('#noOfAccountants').removeAttr('required');
			    $('#amountPaid').removeAttr('required');
            }
		 });
      $("#amountPaid").click(function(){
		     $("#error").empty();
		     if($("#noOfDays").val()==''||$("#noOfParents").val()==''||$("#noOfTeachers").val()==''||$("#noOfStudents").val()==''||$("#noOfLibrarians").val()==''||$("#noOfAccountants").val()=='')
		     {
              $( "#error" ).append("<div><span class='text text-danger'>Enter all fields to calculate total amount</span></div>")
		     }
		     else
		     {
		          $("#amountPaid").prop("readonly", false);
		          $("#amountPaid").val($("#noOfDays").val()*(($("#noOfParents").val()*$("#valueOfParents").val())+($("#noOfTeachers").val()*$("#valueOfTeachers").val())+($("#noOfStudents").val()*$("#valueOfStudents").val())+($("#noOfLibrarians").val()*$("#valueOfLibrarians").val())+($("#noOfAccountants").val()*$("#valueOfAccountants").val())));
		          $("#amountPaid").prop("readonly", true);
		     }
     });
    });
</script>
</body>

</html>
