<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>

        #message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
 @media (min-width: 1025px) {
  .h-custom {
    height: 100vh !important;
  }
}  

    </style>
</head>
<body style="background-color: #8fc4b7;">

<script type="text/javascript" src="<?php echo base_url('axxets/countries.js') ?>"></script>

<?php if (config_item('disable_registration') !== "Yes") { ?>
    <?php echo form_open() ?>
    <h2 align="center" style="padding-top: 10px">Register Now !</h2>

    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
        <h3 style="color:lightseagreen">Registering...</h3>
    </div>
    <section class="h-100 h-custom" >
        <div class="fluid-container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100" id="form">
             <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1))  {
                    echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
                } ?>
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
            <?php echo $this->session->flashdata('site_flash') ?>
            <div class="col-lg-8 col-xl-6">
              <div class="card rounded-3">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                <div class="card-body p-4 p-md-5">
                  <h3 class=" pb-2 pb-md-0 mb-md-5 px-md-2">Registration Form</h3>
      
                  <form class="px-md-2">
      
                
      
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-outline">
                               <label for="name" class="control-label">Name* <?php if(config_item('company_country')=='India') { echo '(Please Enter as per PAN)';} ?></label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name') ?>"
                       placeholder="Mr Xyz">
                           
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-outline">
                                <label for="sponsor" class="control-label">Sponsor ID*</label>

                <input type="number" onchange="get_user_name('#sponsor', '#spn_res')" class="form-control" value="<?php 
                       if (($this->uri->segment(3) !== "epin") && ($this->uri->segment(4) !=''))
                       {$uri4 = $this->uri->segment(4);}
                       else if(strlen($this->uri->segment(3))==7)
                       {$uri4 = $this->uri->segment(3);} 
                       else if(isset($_COOKIE[config_item('cookie_variable')]))
                       { $uri4 = $_COOKIE[config_item('cookie_variable')]; }
                       else if(isset($this->session->user_id)){
                        $uri4 = $this->session->user_id;
                       }
                       else {
                        $uri4 = config_item('top_id');
                       }
                       echo set_value('sponsor', $uri4) ?>"
                       id="sponsor" name="sponsor" placeholder="1001" 
                       onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                <span id="spn_res" style="color: red; font-weight: bold"></span>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-outline">
                           <label for="email" class="control-label" >Email*&nbsp;(Provide Valid Email)
                <?php if(config_item('ecomm_theme')=='gmart'){ ?>
                    <a style="cursor: pointer;color: red" data-toggle="tooltip" 
                    title="Please use GMART registered e-mail to connect Affiliate Account to GMART Account">
                        (Recommended Email)
                    </a>
                <?php } ?>
                </label>
                <input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email" name="email" placeholder="name@domain.com" required>
                             
                          </div>
                        </div>

      <?php if($this->session->userdata('_phone_verified_')>0) { ?>

                     <div class="col-md-6">
                     <div class="form-outline">
                <label for="phone" class="control-label">Phone No* (10 Digit Number)</label>
                <input type="number" class="form-control" value="<?php echo $this->session->userdata('_phone_verified_'); ?>" name="phone" id="phone" disabled>
            </div>
          </div>
            <input type="hidden" name="phone" value="<?php echo $this->session->userdata('_phone_verified_'); ?>">

            <?php } else { ?>
            <?php if(config_item('company_country')=='India') { ?>
            
                     <div class="col-md-6">
                     <div class="form-outline">
                <label for="phone" class="control-label">Phone No* (10 Digit Number)</label>
                <input type="text" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" pattern="[1-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
            </div>
          </div>
        <?php } else { ?>
            
                     <div class="col-md-6">
                     <div class="form-outline">
                <label for="phone" class="control-label">Phone No* (10 Digit Number)</label>
                <input type="text" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
            </div>
          </div>
            <?php } ?>
            <?php } ?>
                      </div>
                    
                    <div class="row">


                                      <?php if (config_item('leg') !== "1" && config_item('show_placement_id') == "Yes" && config_item('autopool_registration') == "No") {
                ?>
                <div class=" col-md-6">
                    <label for="position" class="control-label">Placement ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                id="psn_res"
                                style="color: red; font-weight: bold"></span></label>
                    <input type="number" class="form-control" onchange="get_user_name('#position', '#psn_res')" id="position" value="<?php echo set_value('position') ?>"
                           name="position" id="position" placeholder="Where you want to place the ID" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
                </div>
                <?php }
            if (config_item('leg') == "1") {
                echo form_hidden('leg', 'A');
            } else {
                if (config_item('show_leg_choose') == "Yes" && config_item('autopool_registration') == "No") {
                    ?>
                    <div class="col-md-6">
                        <label for="leg" class="control-label">Position*</label>
                        <select class="form-control" id="leg" name="leg">
                            <?php if (strlen($this->uri->segment(3))==1) {
                                echo '<option selected>' . $this->uri->segment(3) . '</option>';
                            } ?>
                            <?php foreach ($leg as $key => $val) {
                                echo '<option value="' . $key . '">' . $val . ' </option>';
                            } ?>
                        </select>
                    </div>
                <?php }
            }
            if (config_item('show_join_product') == "Yes") {
                ?>
              
                   <div class="col-md-6" id="signup">
                  <div class="form-outline">

                    <label for="plan" class="control-label">Sign Up Plan</label>
                    <select class="form-control" id="plan" name="plan" onchange="check_epin_status('#epin', '#epin_status')">
                        <?php foreach ($plans as $val) {
                            echo '<option value="' . $val['id'] . '"data-value="'. $val['joining_fee'] . '">' . $val['plan_name'] . '. Price :' . config_item('currency') . number_format($val['joining_fee'], 2) . ' </option>';
                        } ?>
                    </select>
                </div>
              </div>
            <?php }
            if (config_item('enable_non_affiliate') == "Yes") {
                ?>
                <div class="col-md-6" id="signup">
                    <label for="plan" class="control-label">Choose Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value='affiliate'>Affiliate Member</option>
                        <option value='customer'>Customer</option>
                    </select>
                </div>
            <?php }
            if (config_item('enable_epin') == "Yes") {
                ?>
                  <div class="col-md-6" id="e_pin">
                  <div class="form-outline">
                    <label for="epin" class="control-label">e-PIN 
                    <?php if (config_item('enable_pg') == "Yes") { ?>
                    <span style="color: #3a80d7"> (Select payment Gateway if epin is not available)</span>
                    <?php } ?> 
                    </label>
                    <input type="number" onchange="check_epin_status('#epin', '#epin_status')" value="<?php if (trim($this->uri->segment(5)) == "epin") {
                        echo set_value('epin', $this->uri->segment(6));
                    } ?>" class="form-control" id="epin" name="epin" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" id="epin">
                    <span id="epin_status" style="color: red; font-weight: bold"></span>
                </div>
              </div>
            <?php }
            if (config_item('show_join_product') == "No" && config_item('free_registration') == "No") {
                ?>
                <div class="col-md-6" id="amt_to_pay">
                    <label for="amt_to_pay" class="control-label">Amount You Want to Pay ?</label>
                    <input type="text" required value="<?php echo set_value('amt_to_pay') ?>" class="form-control" id="amt_to_pay" name="amt_to_pay">
                </div>
            <?php }
            if(config_item('crowdfund_type') == "Manual_Peer_to_Peer") { ?>
                <input type="hidden" name="pg" value="yes">
            <?php } else if(config_item('free_registration') == "Yes") { ?>
               <div class="form-group col-sm-12" id='gateway'></br> 
                    <label for="pg" class="control-label" style="color: #3a80d7">Pay Later</label><br/>
                    <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> 
                    I'll Pay Later.
                </div>
            <?php } else if(config_item('enable_pg') == "Yes") { ?>
                <div class="form-group col-sm-12" id='gateway'>
                    <label for="pg" class="control-label" style="color: #3a80d7">Payment Gateway</label><br/>
                    <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> 
                    I'll Pay Using Payment Gateway.
                </div>
            <?php } ?>
            
                      </div>
               

              <div class="row">

                 <?php if(config_item('company_country')=='India') { ?>
            <input type="hidden" class="form-control" value="India" id="country" name="country">
                         <div class="col-md-6" style="display: none;">
                          <div class="form-outline">
                <label for="pan" class="control-label">PAN Number (20% Tax will be deducted in case No PAN Card)</label>
                <input type="text" class="form-control" value="<?php echo set_value('pan') ?>" id="pan" name="pan">
            </div>
          </div>
             <div class="col-md-6">
                <div class="form-outline">
                <label>State*</label>
                <select name="state" id="state" class="form-control" required></select>
            </div>
          </div>
          <?php } else {?>
             <div class="col-md-6">
                  <div class="form-outline">
                <label>Country*</label>
                <select id="country" name="country" class="form-control" required></select>
            </div>
          </div>
           <div class="col-md-6">
                          <div class="form-outline">
                <label>State*</label>
                <select name="state" id="state" class="form-control" required></select>
            </div>
          </div>
          <?php } ?>
                      </div>


                           <div class="row">
                        <div class="col-md-6">
                          <div class="form-outline">
                            <label for="city" class="control-label">City</label>
                <input type="text" class="form-control" value="<?php echo set_value('city') ?>" id="city" name="city">
                             
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-outline">
                             <label for="zipcode" class="control-label">Zipcode</label>
                <input type="number" class="form-control" value="<?php echo set_value('zipcode') ?>" id="zipcode" name="zipcode" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">                             
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-outline">
                                 <label for="address_1" class="control-label">Street Address*</label>
                <input type="text" class="form-control" value="<?php echo set_value('address_1') ?>" id="address_1" name="address_1" placeholder = 'Flat / House No / Floor / Building ' required>

                             
                          </div>
                        </div>
                          <div class="col-md-6">
                          <div class="form-outline">
                               <label for="password" class="control-label">Password*</label>
                <input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}" title="Must contain at least one number and one uppercase and lowercase letter and special character, and at least 8 or more  and less than 15 characters"required>                             
                          </div>
                        </div>
                    
                      </div>

                     <div class="row">
                      
                        <div class="col-md-6">
                          <div class="form-outline">
                               <label for="password_2" class="control-label">Retype Password</label>
                <input type="password" class="form-control" value="<?php echo set_value('password_2') ?>"
                       id="password_2" name="password_2">

                             
                          </div>
                        </div>
                      </div>
      
                    
         
            <div class="form-group col-sm-12" id="message">
              <h3>Password must contain the following:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="special" class="invalid">A <b>special Character</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b> and Maximum <b>15 character</b></p>
            </div>
            <div> &nbsp; </div>
            <div class="form-group col-sm-12">
                <button class="btn btn-lg btn-primary" type="submit" onclick="before_show()">Register</button>
            </div>
      
                  </form>
      
                </div>
              </div>
            </div>
               <?php echo form_close();
} else {
    echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintanance. Please come later.</h3>";
} ?>
          </div>
        </div>
      </section>


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
        if(!document.getElementById("agree").checkValidity() || !document.getElementById("phone").checkValidity() || !document.getElementById("password").checkValidity() || !document.getElementById("state").checkValidity() || !document.getElementById("zipcode").checkValidity() || !document.getElementById("email").checkValidity())
        {

        } else {
            show();
        }

    }

    function show() {
        $('#form').hide('slow');
        $('#load').show('slow');
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

<?php if(config_item('company_country') !='India') { ?>
  <script language="javascript">
    populateCountries("country", "state");
  </script>
<?php } else { ?>
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
<?php } ?>

<script type="text/javascript">
    $(':text').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9 #\@.]+$");
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
</body>
</html>