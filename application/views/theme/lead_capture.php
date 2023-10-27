<?php
function add_cookie($secret)
{
    $cookie_name = 'GMLM_Lead_id';
    //setcookie($cookie_name, "", time() - 3600); 
    if(!isset($_COOKIE[$cookie_name])) {
        setcookie($cookie_name, $secret, time() + (86400 * 365), "/"); //
    }else{
        $secret = $_COOKIE[$cookie_name];    
    }
    debug_log($secret);
    return $secret;
}
?>

<?php if((strpos($_SERVER['HTTP_HOST'], 'globalmlmsolution.com') !== false) && ($this->session->lead_email_status != 'verified')){ ?>

<div class="modal modal-visible" id="lead_details" role="dialog">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Please fill the form for better User Experience</h4>
            </div>
            <?php echo form_open('site/captureLead/Member') ?>
            <div class="modal-body">
              <span class="resent"></span>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id='dummy_text' class="form-control" name="dummy_text" pattern=".{3,}" title="Enter Valid Name" width="95%" placeholder='Enter Name' required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label> <br>                    
                    <input type="text" class="form-control" id ='dummy_values' name="dummy_values" title="Enter Valid Phone Number" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)" placeholder='Mobile Number' required style='width: 100%'>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="dummy_side" name="dummy_side" class="form-control" title="Enter Valid Email"width="95%" placeholder='Email Address' required>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select id="country" name="country" class="form-control" width="95%" required></select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20Need%20help%20accessing%20demo%20server." target="_blank" class="btn btn-warning" type="button" value="Contact Support">Contact Support</a>
                <a class="btn btn-primary" type="submit" id='lead_details_submit' style="margin-bottom: 10px;">Continue</a>  
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="modal" id="otp_verify" role="dialog">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Just one step away !!!</h4>
            </div>
            <?php echo form_open('Site/captureLead/Admin') ?>
            <div class="modal-body">
                <div class="form-group ">
                  <b>Please enter the OTP sent your email !!!</b>
                </div>
                <div class="form-group ">
                <label>Enter OTP</label>
                  <input type="otp" id="dummy_otp_value" name="dummy_otp" class="form-control" title="Enter Otp" placeholder='Enter Otp' required> 
                  <span id="wrong_otp"></span>
                </div>
                <div class="form-group ">
                  <label><b>Not received OTP ? Click on CONTACT SUPPORT to get your OTP </b></label>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-warning" type="button" href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20Need%20help%20accessing%20demo%20server." target="_blank">Contact Support</a>
                <a class="btn btn-primary" type="button" onClick='edit_email()' id="resend" style="margin-bottom: 10px;">Resend OTP</a>
                <a class="btn btn-success" type="button" onclick="check_otp()"  id="dummy_otp_verify" style="margin-bottom: 10px;">Submit</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-visible" id="confirm" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Let’s grow your Business !!!</h4>
            </div>
            <div class="modal-body">
                <div class="form-group ">
                Thanks for sharing your details. Our Consultant will reach out to you to schedule a <b> Live demo </b> of <b>Global MLM Pro </b>shortly. You can contact our Cusomter Relationship Manager for Quicker Demo !!!
                </div>
            </div>
            <div class="modal-footer">
            <a href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20I%20Want%20Live%20demo%20of%20Global%20MLM%20Pro." target="_blank" class="btn btn-info" type="button" value="Contact Support" style="margin:0px;">Contact Customer Relationship Manager</a>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url('axxets/base/css/intlTelInput.css') ?>"/>
<script src="<?php echo base_url('axxets/base/js/intlTelInput.js') ?>"></script>

<script>

  function getIp(callback) {
      fetch('https://ipinfo.io/json?token=111997f33979b9', { headers: { 'Accept': 'application/json' }})
        .then((resp) => resp.json())
        .catch(() => {
          return {
            country: 'IN',
          };
      })
      .then((resp) => callback(resp.country));
  }

  function getCountryName(p1) {
    return (p1 ? p1.replace(/ *\([^)]*\) */g, "") : p1);
  }

  var phoneInputField = document.querySelector("#dummy_values");
  var iti = window.intlTelInput(phoneInputField, {
  initialCountry: "auto",
  allowDropdown: true,
  autoHideDialCode:true,
  separateDialCode:true,
  geoIpLookup: getIp,
   utilsScript:
     '<?php echo site_url('axxets/base/js/intl_tel_input_utils.js'); ?>',
  });

  console.log(iti);

  var countryData = window.intlTelInputGlobals.getCountryData();
  var countryDropdown = document.querySelector("#country");

  var country_iso = {};

  // populate the country dropdown
  for (var i = 0; i < countryData.length; i++) {
    country_iso[countryData[i].name] = countryData[i].iso2;
    var name = countryData[i].name;
    var optionNode = document.createElement("option");
    optionNode.value = name;
    var textNode = document.createTextNode(name);
    optionNode.appendChild(textNode);
    countryDropdown.appendChild(optionNode);
  }  

  // set it's initial value
  countryDropdown.value = iti.getSelectedCountryData().name;

  // listen to the telephone input for changes
  phoneInputField.addEventListener('countrychange', function(e) {
    countryDropdown.value = iti.getSelectedCountryData().name;
  });

  // listen to the address dropdown for changes
  countryDropdown.addEventListener('change', function() {
    iti.setCountry(country_iso[this.value]);
  });

 </script>

<style type="text/css">
  .hide {
      display: none;
  }
  #error-msg{
    color: red; 
  }
  #valid-msg{
    color: green;
  }
</style>

<script type="text/javascript">
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



<script language="javascript">
    function check_otp(){
    jQuery('.resent').html('');
    jQuery('#wrong_otp').html('');
    document.getElementById('dummy_otp_verify').disabled = true;
    var dummy_otp = jQuery('#dummy_otp_value').val();
    var base_url = window.location.origin;
    const secret = '<?php echo add_cookie(md5(time())); ?>';
    if(base_url=='http://localhost'){
      href = base_url + '/gmlm/site/otp_verify';  
    }else{
      href = base_url + '/site/otp_verify';  
    }
    jQuery.ajax({
      url: href,
      type:'post',
      data:{ "dummy_otp" : dummy_otp, "secret" : secret},
      success:function(response){
        console.log(response);
        var res = JSON.parse(response);
        var result = res.result;
        var country = res.country;
        if(result == 'otp verified'){
          $('#otp_verify').modal('toggle');
        }else if(result == 'Time limit'){
          jQuery('#wrong_otp').html('Otp Expired').css('color', 'red');
          document.getElementById('dummy_otp_verify').disabled = false;
        }else{
          jQuery('#wrong_otp').html('Entered otp is Incorrect').css('color', 'red');
          document.getElementById('dummy_otp_verify').disabled = false;
        }
      }
    })
  } 

 function edit_email(){
   jQuery('#wrong_otp').html('');
   jQuery('.resent').html('');
   $('#otp_verify').appendTo("body").modal('hide');
   $('#lead_details').modal({backdrop: 'static', keyboard: false})   
   $('#lead_details').appendTo("body").modal('show');  
  }

    $(document).ready(function(event) {
      var base_url = window.location.origin;
      var type = '<?php $type = $this->session->name == 'Admin' ? 'Admin' : 'Member'; echo $type; ?>';
      const secret = '<?php echo add_cookie(md5(time())); ?>';
      if(base_url=='http://localhost'){
        href = base_url + '/gmlm/site/captureLead/'+type;  
      }else{
        href = base_url + '/site/captureLead/'+type;  
      }
        $.ajax({
            url: href,
            type: 'post',
            data:{"secret" : secret},
            success: function(response) {
              console.log('response');
              console.log(response);
              var data = JSON.parse(response);
              console.log(data);
              var name = data.name;
              var phone = data.phone;
              var email = data.email;
              var country = data.country;
              var status = data.status;
              if(!(name?.trim().length > 0)) { 
                $('#lead_details').modal({backdrop: 'static', keyboard: false})   
                $('#lead_details').appendTo("body").modal('show');  
              }else if(status == 'not verified'){
                document.getElementById("dummy_text").value = name;
                document.getElementById("dummy_values").value = phone;
                document.getElementById("dummy_side").value = email;
                $('#otp_verify').modal({backdrop: 'static', keyboard: false}) 
                $('#otp_verify').appendTo("body").modal('show');
              }
            },
            error: function(res) {
                console.log("error");
            }
        });
    });

  $('#lead_details_submit').on('click', function() {
    jQuery('.resent').html('');
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    console.log(jQuery('#dummy_text').val());
    console.log(jQuery('#dummy_values').val());
    console.log(jQuery('#dummy_side').val());
    if(jQuery('#dummy_text').val() == '' | jQuery('#dummy_values').val() == '' | jQuery('#dummy_side').val() == ''){
      jQuery('.resent').html('<br>Please Share all the details!!!<br><br>').css('color', 'red');
    }
    else if(!jQuery('#dummy_side').val().match(mailformat)){
      jQuery('.resent').html('<br>Please share valid email !!!<br><br>').css('color', 'red');
    }
    else{
      $('#lead_details').modal('hide');
      var dummy_text = jQuery('#dummy_text').val();
      var dummy_values = jQuery('#dummy_values').val();
      var dummy_side = jQuery('#dummy_side').val();
      var budget = jQuery('#budget').val();
      var country = jQuery('#country').val();
      var country_code = iti['getSelectedCountryData']().dialCode.replace("+", "");
      var base_url = window.location.origin;
      var type = '<?php $type = $this->session->name == 'Admin' ? 'Admin' : 'Member'; echo $type; ?>';
      const secret = '<?php echo add_cookie(md5(time())); ?>';
      if(base_url=='http://localhost'){
        href = base_url + '/gmlm/site/captureLead/'+type;  
      }else{
        href = base_url + '/site/captureLead/'+type;  
      }
      console.log('href');
      console.log(href);
      $.ajax({
              url: href,
              type: 'post',
              data:{"dummy_text":dummy_text, "dummy_values":dummy_values,"dummy_side":dummy_side,
              "budget":budget,"country_code":country_code,"country":country,"secret":secret},
              success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                console.log(data);
                var status = data.status;
                if(!iti['isValidNumber']()){
                  $('#lead_details').appendTo("body").modal('show');
                  jQuery('.resent').html('<br>Please Share the Valid Phone Number !!! <br><br>').css('color', 'red'); 
                }
                else if(status == 'not verified'){
                  document.getElementById("dummy_text").value = name;
                  document.getElementById("dummy_values").value = phone;
                  document.getElementById("dummy_side").value = email;
                  $('#otp_verify').modal({backdrop: 'static', keyboard: false}) 
                  $('#otp_verify').appendTo("body").modal('show');
                }
              },
              error: function(res) {
                console.log("error");
              }
          });
    } });

  </script>

<div class="loader"></div>
<style type="text/css">
  .loader{
      display: none;
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 999999999;
      background: url('<?php echo base_url('axxets/base/img/rosary_spinner.gif') ?>') 50% 50% no-repeat rgba(255,255,255,0.4);
      background-size: 100px;
   }
</style>

<script type="text/javascript">
  $(document).ajaxSend(function(){
      $(".loader").show();
  });
  $(document).ajaxComplete(function(){
      $(".loader").hide();
  });
</script>


<script>
   <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
      $("#conti_nue").css("margin-top","10px");
    <?php } ?>
</script>

<script>
   <?php if((config_item('admin_theme')=='admin/stack/index') ) { ?>
    $("#row_width").css("width","100%");
      <?php } ?>
</script>

<?php } ?>