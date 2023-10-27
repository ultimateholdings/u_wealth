<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/site/default/css/register_premium.css">
</head>
<body style="overflow-y:hidden ;">

<?php $names = array('Olivia','Amelia','Isla','Ava','Emily','Sophia','Grace','Mia','Poppy','Ella','Oliver','George','Harry','Noah','Jack','Charlie','Leo','Jacob','Freddie','Alfie','Aaradhya','Adah','Adhira','Alisha','Amoli','Anaisha','Ananya','Anika','Anushka','Asmee','Avni','Carina','Drishti','Hiya','Ira','Ishana','Ishita','Kaia','Kashvi','Keya','Kimaya','Krisha','Larisa','Mahika','Mayra','Mehar','Mirai','Mishka','Naitee','Navya','Nehrika','Neysa','Pavati','Prisha','Ryka','Rebecca','Saanvi','Sahana','Sai','Saisha','Saloni','Shanaya','Shrishti','Sneha','Tahira','Taara','Tanvi','Viti','Zara','Aahva','Aadiv','Aarav','Akanksh','Alex','Anant','Atiksh','Ayaan','Bhuv','Dasya','Gian','Hem','Idhant','Ishank','Jash','Jay','Jseph','Kabir','Kahaan','Kairav','Kevin','Laksh','Luv','Manan','Mohammad','Naksh','Nimit','Nirav','Pahal','Parv','Pranay','Rachi','Raj','Ranbir','Raunak','Reyansh','Rishaan','Rishit','Rohan','Rudra','Rushil','Sadhil','Sarthak','Taarush','Taksh','Ved','Vihan','Vivaan','Yash','Yug','Zuber');
$key=array_rand($names,1);
?>

<?php if (config_item('disable_registration') !== "Yes") { ?>
    <?php echo form_open() ?>

    <div id="login-page" >
  		<div class="login" style="overflow-y:scroll; ">
		    <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1))  {
		                    echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
		                } ?>
		    <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
		    <?php echo $this->session->flashdata('site_flash') ?>
		    <h1 class="login-title">Register</h1>
		    <h3 class="notice">Please Register to access the system</h3>
		    <form class="form-login" style="margin-top:20%">
		      <label for="name">Name* <?php if(config_item('company_country')=='India') { echo '(Please Enter as per PAN)';} ?></label>
		      <div class="input-email">
		        <i class="fas fa-envelope icon"></i>
		        <input type="text" id="name" name="name" value="<?php echo $names[$key]; ?>" placeholder="Enter your Name" required>
		      </div></br>
		      <label for="sponsor">Sponsor ID</label>
		      <div class="input-email">
		        <i class="fas fa-envelope icon"></i>
		        <input type="number" onchange="get_user_name('#sponsor', '#spn_res')" class="form-control"
                       value="<?php 
                       if (($this->uri->segment(3) !== "epin") && ($this->uri->segment(4) !=''))
                       {$uri4 = $this->uri->segment(4);} 
                       else if(strlen($this->uri->segment(3))==7)
                       {$uri4 = $this->uri->segment(3);}
                       else if(isset($_COOKIE[config_item('cookie_variable')]))
                       { $uri4 = $_COOKIE[config_item('cookie_variable')]; }
                       else {
                        $uri4 = config_item('top_id');
                       }
                       echo set_value('sponsor', $uri4) ?>"
                       id="sponsor" name="sponsor" placeholder="1001" 
                       onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
		      </div>
		      <span id="spn_res" style="color: red; font-weight: bold"></span></br></br>

		      <label for="email">Email* 
                <?php if(config_item('ecomm_theme')=='gmart'){ ?>
                    <a style="cursor: pointer;color: red" data-toggle="tooltip" 
                    title="Please use GMART registered e-mail to connect Affiliate Account to GMART Account">
                        (Recommended Email)
                    </a>
                <?php } ?></label>
		      <div class="input-email">
		        <i class="fas fa-envelope icon"></i>
		        <input type="email" value="global@gmail.co" id="email"
                       name="email" placeholder="name@domain.com" required>
		      </div></br>

		      <?php if($this->session->userdata('_phone_verified_')>0) { ?>

		      <label for="phone">Phone No* (10 digit number)</label>
		      <div class="input-email">
		        <i class="fas fa-envelope icon"></i>
		        <input type="number" value="<?php echo $this->session->userdata('_phone_verified_'); ?>" name="phone" id="phone" disabled>
		      </div></br>

		      <?php } else { ?>

		      <label for="phone">Phone No* (10 digit number)</label>
		      <div class="input-email">
		        <i class="fas fa-envelope icon"></i>
		        <input type="number" value="<?php echo rand(199999999,599999999)*10; ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
		      </div></br>	
		       <?php } ?>


		       <?php if (config_item('leg') !== "1" && config_item('show_placement_id') == "Yes" && config_item('autopool_registration') == "No") {
                ?>
        		<label for="position">Placement ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="psn_res" style="color: red; font-weight: bold"></span></label>
        		<div class="input-email">
        			<i class="fas fa-envelope icon"></i>
                    <input type="number" onchange="get_user_name('#position', '#psn_res')"
                           id="position" value="<?php echo set_value('position') ?>"
                           name="position" id="position" placeholder="Where you want to place the ID" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                </div></br>
                
                <?php }
            		if (config_item('leg') == "1") {
                		echo form_hidden('leg', 'A');
            		} else {
                	if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {
                    ?>
                    <label for="leg">Position*</label>
                    <div class="input-email">
	                    <select class="input-email" id="leg" name="leg">
	                            <?php if(strlen($this->uri->segment(3))==1) {
	                                echo '<option selected>' . $this->uri->segment(3) . '</option>';
	                            } ?>
	                            <?php foreach ($leg as $key => $val) {
	                                echo '<option value="' . $key . '">' . $val . ' </option>';
	                            } ?>
	                    </select>
                	</div></br>
                <?php }
            }
            if (config_item('show_join_product') == "Yes") {
                ?>
                <label for="plan">Sign Up Plan</label>
                <div class="input-email">    
                    <select class="input-email" id="plan" name="plan" onchange="check_epin_status('#epin', '#epin_status')">
                        <?php foreach ($plans as $val) {
                            echo '<option value="' . $val['id'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
                        } ?>
                    </select>
                </div></br>
            <?php }
            if (config_item('enable_non_affiliate') == "Yes") {
                ?>
                <label for="plan">Choose Role</label>
                <div class="input-email">
                    <select class="input-email" id="role" name="role">
                        <option value='affiliate'>Affiliate Member</option>
                        <option value='customer'>Customer</option>
                    </select>
                </div></br>
            <?php }
            if (config_item('enable_epin') == "Yes") {
                ?>
                <label for="epin">e-PIN 
                    <?php if (config_item('enable_pg') == "Yes") { ?>
                    <span style="color: #3a80d7"> (Select payment Gateway if epin is not available)</span>
                    <?php } ?> 
                </label>
                <div class="input-email">
                   	<input type="number" onchange="check_epin_status('#epin', '#epin_status')" value="<?php 
                    $uid = $this->session->user_id;
                    $uid = $this->session->admin_id > 0 ? config_item('top_id') : $uid;
                    $unused = $this->db_model->select('epin','epin',array('issue_to'=>$uid,'status'=>'Un-used'));
                    if (trim($this->uri->segment(5)) == "epin") {
                        echo set_value('epin', $this->uri->segment(6));
                    }elseif($unused>1){
                        echo set_value('epin', $unused);
                    }
                    ?>" id="epin" name="epin" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                    <span id="epin_status" style="color: red; font-weight: bold"></span>
                </div></br>
            <?php }
            if (config_item('show_join_product') == "No" && config_item('free_registration') == "No") {
                ?>
                <label for="amt_to_pay">Amount You Want to Pay ?</label>
                <div class="input-email">
                    <input type="text" required value="<?php echo set_value('amt_to_pay') ?>"
                           id="amt_to_pay"
                           name="amt_to_pay">
                </div></br>
            <?php }
            if(config_item('crowdfund_type') == "Manual_Peer_to_Peer") { ?>
                <input type="hidden" name="pg" value="yes">
            <?php } else if(config_item('free_registration') == "Yes") { ?>
                <label for="pg" class="control-label" style="color: #3a80d7">Pay Later</label><br/>
                <div class="checkbox">
                    <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> 
                    I'll Pay Later.
                </div></br>
            <?php } else if(config_item('enable_pg') == "Yes") { ?>
                <label for="pg" class="control-label" style="color: #3a80d7">Payment Gateway</label><br/>
                <div class="checkbox">
                    <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> 
                    I'll Pay Using Payment Gateway.
                </div></br>
            <?php } ?>

            	<br>
            	<label for="address_1">Street Address*</label>
            	<div class="input-email">
                	<input type="text" value="Bangalore" id="address_1" name="address_1" placeholder = 'Flat / House No / Floor / Building ' required>
            	</div></br>

		        <label for="city">City</label>
                <div class="input-email">
                	<input type="text" value="Bangalore" id="city" name="city">
                </div></br>

			    <label>State*</label>
                <div class="input-email">
                <input type="text" value="Karnataka" id="state" name="state">
           		</div></br>
            	
            	<label for="zipcode" class="control-label">Zipcode</label>
                <div class="input-email">
                <input type="number" value="560066" id="zipcode" name="zipcode" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
            	</div></br>

            	<?php if(config_item('company_country')=='India') { ?>
                <input type="hidden" value="India" id="country" name="country">
                <label for="pan" class="control-label">PAN Number (20% Tax will be deducted in case No PAN Card)</label>
                <div class="input-email">	
                	<input type="text" class="form-control" value="PAN561234" id="pan" name="pan">
            	</div></br>
            	<?php } else { ?>
                
                <label>Country*</label>
                <div class="input-email">
                	<input type="text" value="India" id="country" name="country">
            	</div></br>
            <?php } ?>

		      
                <label for="password">Password*</label>
                <!--<input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}" title="Must contain at least one number and one uppercase and lowercase letter and special character, and at least 8 or more  and less than 15 characters"required>-->
                <div class="input-email">  
                   <input type="password"  value="Password@123" id="password" name="password">
                </div></br>
            
            	<label for="password_2">Confirm Password</label>
                <!--<input type="password" class="form-control" value="<?php echo set_value('password_2') ?>"
                       id="password_2" name="password_2">-->
                <div class="input-email">       
                	<input type="password" value="Password@123" id="password_2" name="password_2">
            	</div></br>

            	<div> &nbsp; </div>
                    <div id="message">
                        <h3>Password must contain the following:</h3>
                         <div class="row">
                            <div class=" col-sm-6">
                               <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            </div>
                            <div class=" col-sm-6" style="padding: 0px;">
							   <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            </div>
                        	<div class=" col-sm-6">
								<p id="number" class="invalid">A <b>number</b></p>
                            </div>
                            <div class=" col-sm-6">
                            	<p id="special" class="invalid">A <b>special Character</b></p>
                            </div>
                            <div class="col-sm-12" style="line-height: 25px;">
                                 <p id="length" class="invalid">Minimum <b>8 characters</b> and Maximum <b>15 character</b></p>
                            </div>
                        </div>
                    </div>
                <div> &nbsp; </div>

		      	<button type="submit" onclick="before_show()">Register</button></form></br></br>
                <p class="created">All rights reserved by Global MLM Software</p>
		    </form>
		    
		    <!-- <div class="created">
		      <p>&copy;2021 All Rights Reserved | Powered by Global MLM Software</a></p>
		    </div> -->
		</div>
		<div class="background" style="margin-top: -2%;">
    		<h1>Welcome to Global MLM Software</h1>
  		</div>
	</div>
	
	</body>
</html>	
	<?php echo form_close();
} else {
    echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintanance. Please come later.</h3>";
} ?>	      

<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var id = $("#sponsor").val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $('#spn_res').html(data);
        });

        var id = $("#epin").val();
        var plan = $("#plan").val();
        $.get("<?php echo site_url('site/check_epin/') ?>" + id +"/" +plan, function (data) {
            $('#epin_status').html(data);
        });
    });

    function get_user_name(id, result) {
        var id = $(id).val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $(result).html(data);
        });
    }

    function check_epin_status(id, result) {
        var id = $(id).val();
        var plan = $("#plan").val();
        $.get("<?php echo site_url('site/check_epin/') ?>" + id+"/" +plan, function (data) {
            $(result).html(data);
        });
    }

</script>

<script type="text/javascript">
    function toogle_div(id1, id2) {
        if ($(id2).prop("checked") == true) {
            $(id1).hide('slow');
        } else {
            $(id1).show('slow');
        }
    }

    function before_show() {
        if(!document.getElementById("phone").checkValidity() || !document.getElementById("password").checkValidity() || !document.getElementById("state").checkValidity() || !document.getElementById("zipcode").checkValidity() || !document.getElementById("email").checkValidity())
        {

        } else {
            show();
        }

    }

    function show() {
        $('#form').hide('slow');
        $('#load').show('slow');
    }

    function get_user_name(id, result) {
        var id = $(id).val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $(result).html(data);
        });
    }
</script>

<?php if(count($plans)==1) { ?>

<script type="text/javascript">
    $(document).ready(function () {
        $val = $('#plan').find(':selected').data('value');
        if($val == 0.00)
        {
            $('#signup').hide('slow');
            $('#e_pin').hide('slow');
            $('#gateway').hide('slow');
        }
        else
        {
            $('#signup').show('slow');
            $('#e_pin').show('slow');
            $('#gateway').show('slow');   
        }
        $('#plan').change(function(){
            $val = $(this).find(':selected').data('value');
            if($val == 0.00)
            {
                $('#signup').hide('slow');
                $('#e_pin').hide('slow');
                $('#gateway').hide('slow');
            }
            else
            {
                $('#signup').show('slow');
                $('#e_pin').show('slow');
                $('#gateway').show('slow');
            }
        })        
    });

</script>

<?php } else {?>

<script type="text/javascript">
    $(document).ready(function () {
        $val = $('#plan').find(':selected').data('value');
        if($val == 0.00)
        {
            $('#e_pin').hide('slow');
            $('#gateway').hide('slow');
        }
        else
        {
            $('#e_pin').show('slow');
            $('#gateway').show('slow');   
        }
        $('#plan').change(function(){
            $val = $(this).find(':selected').data('value');
            if($val == 0.00)
            {
                $('#e_pin').hide('slow');
                $('#gateway').hide('slow');
            }
            else
            {
                $('#e_pin').show('slow');
                $('#gateway').show('slow');
            }
        })        
    });

</script>

<?php } ?>

<script type="text/javascript">
    function getCookie(cname) 
    {
          var name = cname + "=";
          var decodedCookie = decodeURIComponent(document.cookie);
          alert(decodedCookie);
          var ca = decodedCookie.split(';');
          for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
          }
          return "";
    }

</script>

<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var special = document.getElementById("special");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  var specials = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
  if(myInput.value.match(specials)) {  
    special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }


  // Validate length
  if(myInput.value.length >= 8 && myInput.value.length <= 15) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

<script language="javascript">
    var stateElement = document.getElementById("state");

    stateElement.length = 0;  // Fixed by Julian Woods
    stateElement.options[0] = new Option('Select State', '');
    stateElement.selectedIndex = 0;

    var state_arr = "Andaman and Nicobar Islands|Andhra Pradesh|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra and Nagar Haveli|Daman and Diu|Delhi|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu and Kashmir|Jharkhand|Karnataka|Kerala|Lakshadweep|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Orissa|Pondicherry|Punjab|Rajasthan|Sikkim|Tamil Nadu|Telengana|Tripura|Uttar Pradesh|Uttaranchal|West Bengal".split("|");

    for (var i = 0; i < state_arr.length; i++) {
        stateElement.options[stateElement.length] = new Option(state_arr[i], state_arr[i]);
    }
</script>

<script type="text/javascript">
    $(':text').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9# \@.]+$");
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

</script>