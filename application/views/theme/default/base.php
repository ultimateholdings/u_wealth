<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo config_item('company_name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="Author" content="Global MLM Software">
    <link rel='icon' href="<?php echo get_logo()['favicon']; ?>" type='image/x-icon'/>
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('axxets/base/css/bootstrap_v3.3.7.min.css') ?>">
    <link href="<?php echo base_url('axxets/site/default/css/style.css') ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php echo base_url('axxets/base/css/font-awesome_v4.7.0.min.css') ?>">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper" class="home-page">
    <div style="min-height: 92vh;"> <!--background-image:url(<?php echo base_url('axxets/background.jpg')?>); background-repeat: no-repeat;-->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="pull-left hidden-xs"><i class="fa fa-lock"></i><span>SSL Secured</span>
                    </p>
                    <p class="pull-right"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- start header -->
    <?php ?>
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('/') ?>"><img src="<?php echo get_logo()['lg_dark_logo']; ?>" width="160" height="40" alt="logo" class="logo-default"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        
                            <?php 
                if(config_item('ecomm_theme')=='gmart')
                {

                    $result=$this->db->query('select site_colorCode from tbl_web_settings')->row();
                       // print_r($result);
                ?><li>
                    <a href="<?=base_url('../gmart')?>"
                    style="margin-right:30px;color:<?php print_r($result->site_colorCode) ?>;">
                 <strong> E - Commerce</strong>
                </a>
                </li>
            <?php } ?>
                        
                        <li><a href="<?php echo site_url('/') ?>">Home</a></li>
                        <?php if($this->session->user_id){ ?>
                        <li><a href="<?php echo site_url('member/logout')?>">Logout</a></li>
                        <li><a href="<?php echo site_url('member')?>">My Account</a></li>
                        <?php }else{ $page = current_url();
                        $_SESSION['page'] = $page; ?>
                        <li><a href="<?php echo site_url('site/login')?>">Login</a></li>
                        <li><a href="<?php echo site_url('site/register')?>">Register</a></li>
                        <?php } ?>
                        <?php if(config_item('enable_vendor_management')=="Yes"){?>
                        <li><a href="<?php echo site_url('site/vendor_login') ?>">Vendor Login</a></li>
                        <li><a href="<?php echo site_url('site/vendor_register') ?>">Vendor Sign Up</a></li>
                         <?php } ?>
                        <!--<li><a href="<?php echo site_url('site/admin') ?>">Admin Login</a></li>-->
                        <?php if(config_item('enable_franchisee')=='Yes') { ?>
                            <li><a href="<?php echo site_url('site/franchisee') ?>">Franchisee Login</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <?php if (trim($layout) == "") { ?>
        <div style="margin-top: 20%;">
            <h2 align="center">Welcome to <?php echo config_item('company_name') ?></h2>
            <div align="center">Please click above to login or sign up</div>
        </div>
    <?php }
    else {
        include_once(APPPATH . "views/theme/" . $layout);
    } ?>
    </div>
    <footer style="padding: 25px 0px 0px;">
        <div class="container">
            <div class="row">
                <?php echo footer_note(); ?>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('axxets/base/js/jquery_v3.2.1.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
$(':text').bind('copy paste', function (e) {
        e.preventDefault();
});
</script>
<link rel="stylesheet"href="<?='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css'?>"/>
<script src="<?='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js'?>"></script>
<script src="<?='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js'?>"></script>
<script type="text/javascript">
// Make sure to place this snippet in the footer or at least after
// the HTML input we're targeting.

$(document).ready(function() {
  var phoneInputID = "#phone";
  var oldphone	= $(phoneInputID).val();
  var input = document.querySelector(phoneInputID);
  var iti = window.intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    formatOnDisplay: true,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    hiddenInput: "full_number",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    // placeholderNumberType: "MOBILE",
    preferredCountries: ['za'],
    // separateDialCode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
  });


  $(phoneInputID).on("countrychange", function(event) {

    // Get the selected country data to know which country is selected.
    var selectedCountryData = iti.getSelectedCountryData();

    // Get an example number for the selected country to use as placeholder.
    newPlaceholder = intlTelInputUtils.getExampleNumber(selectedCountryData.iso2, true, intlTelInputUtils.numberFormat.INTERNATIONAL),
	c_code	= selectedCountryData.dialCode
	if(typeof c_code!=='undefined'){
		$('#phone-new').val('+'+''+c_code+''+oldphone);
	}
//	$('#phone-new').val('+'+selectedCountryData+oldphone);
//console.log(selectedCountryData.dialCode);
      // Reset the phone number input.
      iti.setNumber("");

    // Convert placeholder as exploitable mask by replacing all 1-9 numbers with 0s
    mask = newPlaceholder.replace(/[1-9]/g, "0");
    // Apply the new mask for the input
    $(this).mask(mask);
  });


  // When the plugin loads for the first time, we have to trigger the "countrychange" event manually, 
  // but after making sure that the plugin is fully loaded by associating handler to the promise of the 
  // plugin instance.

  iti.promise.then(function() {
    $(phoneInputID).trigger("countrychange");
  });
});
$("#phone").change(function(){
	var oldphone	= $('#phone').val();
	$('#phone-new').val('+'+''+c_code+''+oldphone);
});
</script>
<style>
.iti.iti--allow-dropdown{
	display:block;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
<script>
   $(function() {
     $("#date-of-birth").datepicker();
   });
 </script>
</body>
</html>
