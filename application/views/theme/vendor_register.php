<?php if (config_item('disable_registration') !== "Yes") { ?>
    <?php echo form_open() ?>
    <h2 align="center">Register Now !</h2>

    <div id="load" style="display:none !important;" align="center">
        <img src="<?php echo site_url('uploads/load.gif') ?>">
        <h3 style="color:lightseagreen">Registering...</h3>
    </div>

    <div class="container">
        <div class="row" id="form">
            <?php if((config_item('is_demo') == TRUE) || ($this->db_model->select('description', 'settings', array('type' => 'flag')) == 1))  {
                    echo '<div class="alert alert-danger">'. config_item('announcement') . '</div>';
                } ?>
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
            <?php echo $this->session->flashdata('site_flash') ?>
            <div class="form-group col-sm-6">
                <label for="name" class="control-label">Name*</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name') ?>" 
                       placeholder="Mr Xyz" required>
            </div>
            
            <div class="form-group col-sm-6">
                <label for="email" class="control-label" >Email*</label>
                <input type="email" class="form-control" value="<?php echo set_value('email') ?>" id="email"
                       name="email"
                       placeholder="name@domain.com" >

            </div>
            <div class="form-group col-sm-6">
                <label for="company" class="control-label" >Company Name</label>
                <input type="text" class="form-control" value="<?php echo set_value('company') ?>" id="company"
                       name="company" >
            </div>
            <div class="form-group col-sm-6">
                <label for="gstin" class="control-label" >GST No.</label>
                <input type="text" class="form-control" value="<?php echo set_value('gstin') ?>" id="gstin" name="gstin">
            </div>
            <div class="form-group col-sm-6">
               <!-- <label for="pancard" class="control-label" >Pan Card No.*</label>
                <input type="text" 
                       name="pancard" class="form-control" value="<?php echo set_value('pancard') ?>" id="pancard" required>-->
                <label for="pancard" class="control-label">Pancard*</label>
                <input type="text" class="form-control" id="pancard" pattern="[A-Z0-9]+" name="pancard" value="<?php echo set_value('pancard') ?>">
            </div>


            <?php if($this->session->userdata('_phone_verified_')>0) { ?>

            <div class="form-group col-sm-6">
                <label for="phone" class="control-label">Phone No* (10 Digit Number)</label>
                <input type="number" class="form-control" value="<?php echo $this->session->userdata('_phone_verified_'); ?>" name="phone" id="phone" disabled>
            </div>
            <input type="hidden" name="phone" value="<?php echo $this->session->userdata('_phone_verified_'); ?>">

            <?php } else { ?>

            <div class="form-group col-sm-6">
                <label for="phone" class="control-label">Phone No* (10 Digit Number)</label>
                <input type="number" class="form-control" value="<?php echo set_value('phone') ?>" id="phone" name="phone" placeholder="9xxxxxxxxx" pattern="[1-9]{1}[0-9]{9}" title="Only ten digit phone number is allowed" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
            </div>

            <?php } ?>
            
            <?php 
                if (config_item('enable_pg') == "Yes") {
                ?>
                <div class="form-group col-sm-12" id='gateway' style="display:none;">
                    <label for="epin" class="control-label" style="color: #3a80d7">Payment Gateway</label><br/>
                    <input type="checkbox" value="yes" id="pg" name="pg" onclick="toogle_div('#e_pin', '#pg')"> I'll Pay
                    Using
                    Payment
                    Gateway.
                </div>
                <?php } ?>
            <div class="form-group col-sm-6">
                <label for="address_1" class="control-label">Street Address*</label>
                <input type="text" class="form-control" value="<?php echo set_value('address_1') ?>" id="address_1" name="address_1" placeholder = 'Flat / House No / Floor / Building ' required>
            </div>
            <div class="form-group col-sm-6">
                <label for="city" class="control-label">City </label>
                <input type="text" class="form-control" value="<?php echo set_value('city') ?>" id="city" name="city">
            </div>
            <div class="form-group col-sm-6">
                <label>State*</label>
                <select name="state" id="state" class="form-control" required></select>
            </div>
            <div class="form-group col-sm-6">
                <label for="zipcode" class="control-label">Zipcode *</label>
                <input type="number" class="form-control" value="<?php echo set_value('zipcode') ?>" id="zipcode" name="zipcode" required onkeypress="return keyRestrict(event, &#39;1234567890&#39;)">
            </div>
            <div class="form-group col-sm-6">
                <label for="password" class="control-label">Password*</label>
                <input type="password" class="form-control" value="<?php echo set_value('password') ?>" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}" title="Must contain at least one number and one uppercase and lowercase letter and special character, and at least 8 or more  and less than 15 characters"required>
            </div>
            <div class="form-group col-sm-6">
                <label for="password_2" class="control-label">Retype Password</label>
                <input type="password" class="form-control" value="<?php echo set_value('password_2') ?>"
                       id="password_2" name="password_2">
            </div>
            <div> &nbsp; </div>
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
                <button class="btn btn-primary" type="submit" onclick="before_show()">Register</button>
            </div>
        </div>
    </div>

    <?php echo form_close();
} else {
    echo "<h3 align='center' style='margin: 10%'> Registration is disabled for maintanance. Please visit later.</h3>";
} ?>

<style>

/* The message box is shown when the user clicks on the password field */
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
</style>


<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var id = $("#sponsor").val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (  data) {
            $('#spn_res').html(data);
        });
    })
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
        if(!document.getElementById("phone").checkValidity() || !document.getElementById("pancard").checkValidity() || !document.getElementById("password").checkValidity() || !document.getElementById("state").checkValidity() || !document.getElementById("zipcode").checkValidity())
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