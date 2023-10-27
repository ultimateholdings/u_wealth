<div class="modal modal-visible" id="lead_details" role="dialog">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Let's get started !!!</h4>
            </div>
            <?php echo form_open( 'site/captureLead/Admin' ) ?>
            <div class="modal-body">
                <span class="resent"></span>
                <div class="form-group">
                    <input type="text" id='dummy_text' class="form-control" name="dummy_text" pattern=".{3,}"
                           title="Enter Valid Name" placeholder='Name' required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id='dummy_values' name="dummy_values" pattern=".{7,10}"
                           title="Enter Valid Phone Number" onkeypress="return keyRestrict(event, &#39;1234567890&#39;)"
                           placeholder='Mobile Number' required>
                    <span id="error-msg" class="hide">Please check the number</span>
                </div>
                <div class="form-group">
                    <input type="email" id="dummy_side" name="dummy_side" class="form-control" title="Enter Valid Email"
                           placeholder='Email Address' required>
                </div>
                <div class="form-group">
                    <select id="country" name="country" class="form-control" required></select>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-warning"
                   href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20Need%20help%20accessing%20demo%20server."
                   target="_blank" type="button" value="Contact Support">Contact Support</a>
                <a class="btn btn-success" type="submit" id='lead_details_submit'>Submit</a>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="modal" id="otp_verify" role="dialog">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">Please fill the form for better User Experience</h4>
            </div>
            <?php echo form_open( 'Site/captureLead/Admin' ) ?>
            <div class="modal-body">
                <div class="form-group ">
                    <b>Please enter the OTP sent your email !!! </b>
                    <br><br>
                    <label>Enter OTP</label>
                    <input type="otp" id="dummy_otp_value" onchange="enter_otp();" name="dummy_otp" class="form-control"
                           title="Enter Otp" placeholder='Enter Otp' required>
                    <label><b>Not received OTP, click on CONTACT SUPPORT to get your OTP </b></label>
                    <span id="wrong_otp"></span>

                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <a href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20Need%20help%20accessing%20demo%20server."
                   target="_blank" class="btn btn-warning"
                   style="color:white;box-shadow:5px 10px;margin-left:5px;padding:3px" value="Contact Support">Contact
                    Support</a>
                <input onClick="edit_email(this.value)" class="btn-sm btn-primary" type="button" value="Edit Details"
                       id="resend" style="margin:0px;margin-left: 5px;"></input>
                <button onclick="check_otp()" class="btn-sm btn-success" type="button" value="Verify OTP"
                        id="dummy_otp_verify">Submit
                </button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<div class="modal modal-visible" id="confirm" role="dialog" style="margin-top: 100px;">
    <div class="modal-dialog vertical-align-center">
        <div class="modal-content">
            <div class="modal-header bg bg-warning">
                <h4 class="modal-title">One moment please !!!</h4>
            </div>
            <div class="modal-body">
                <div class="form-group ">
                    Thanks for sharing your details. We are now taking you to demo server !!!
                </div>
            </div>
            <div class="modal-footer" style='display:none;'>
                <a href="https://api.whatsapp.com/send?phone=919113511765&text=Welcome%20to%20Global%20MLM%20Software%20-%20%231%20Network%20Marketing%20Software.%20I%20Want%20Live%20demo%20of%20Global%20MLM%20Pro."
                   target="_blank" class="btn btn-info" type="button" value="Contact Support" style="margin:0px;">Contact
                    Customer Relationship Manager</a>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');"
      href="<?php echo base_url(); ?>axxets/base/css/intlTelInput.css"/>
<div class="loader"></div>
<style>
    .hide {
        display: none;
    }

    #error-msg {
        color: red;
    }

    #valid-msg {
        color: green;
    }

    .loader {
        display: none;
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 999999999;
        background: url('https://www.portfolio.globalmlmsolution.com/axxets/base/img/rosary_spinner.gif') 50% 50% no-repeat rgba(255, 255, 255, 0.4);
        background-size: 100px;
    }
</style>
<script defer src="<?php echo base_url(); ?>axxets/base/js/intlTelInput-custom.min.js"></script>
<script>
    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=111997f33979b9', {headers: {'Accept': 'application/json'}})
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

    function keyRestrict(e, validchars) {
        var key = '', keychar = '';
        key = getKeyCode(e);
        if (key == null) return true;
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        validchars = validchars.toLowerCase();
        if (validchars.indexOf(keychar) != -1)
            return true;
        if (key == null || key == 0 || key == 8 || key == 9 || key == 13 || key == 27)
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

    function enter_otp() {
        document.getElementById('dummy_otp_verify').disabled = false;
    }

    function check_otp() {
        document.getElementById('dummy_otp_verify').disabled = true;
        var dummy_otp = jQuery('#dummy_otp_value').val();
        var base_url = window.location.origin;
        if (base_url == 'http://localhost') {
            href = base_url + '/gmlm/site/otp_verify';
        } else {
            href = 'https://demo.globalmlmsolution.com/site/otp_verify';
        }
        jQuery.ajax({
            url: href,
            type: 'post',
            data: {"dummy_otp": dummy_otp},
            dataType: 'json',
            success: function (response) {
                console.log(response);
                var result = response.result;
                var country = response.country;
                console.log(result);
                if (result == "otp verified") {
                    $('#otp_verify').modal('hide');
                    var base_url = window.location.origin;
                    var type = '<?php $type = $this->session->name == 'Admin' ? 'Admin' : 'Member'; echo $type; ?>';
                    console.log(window.location.origin);
                    const queryString = window.location.search;
                    console.log(queryString);
                    const urlParams = new URLSearchParams(queryString);
                    const utm_source = urlParams.get('utm_source');

                    if (utm_source == 'google') {
                        gtag_report_conversion();
                    } else if (utm_source == 'bing') {
                        window.uetq = window.uetq || [];
                        window.uetq.push({'ec': 'GMLM', 'ea': 'Lead', 'el': 'BingGMLMLeads', 'ev': 1000});
                    } else if (utm_source == 'capterra') {
                        var capterra_vkey = '9d35df57555989506688300fe38ad83e',
                            capterra_vid = '2144306',
                            ct = document.createElement('img');
                        ct.src = 'https://ct.capterra.com/capterra_tracker.gif?vid='
                            + capterra_vid + '&vkey=' + capterra_vkey;
                        document.body.appendChild(ct);
                    } else if (utm_source == 'quora') {
                        qp('track', 'GenerateLead');
                    } else if (utm_source == 'yahoo') {
                        window.dotq = window.dotq || [];
                        window.dotq.push({
                            'projectId': '10000',
                            'properties': {
                                'pixelId': '10151747',
                                'qstrings': {
                                    'et': 'custom',
                                    'ec': 'Lead',
                                    'ea': 'Lead Captured',
                                    'el': 'Form Submission',
                                    'ev': 'USD 0.05',
                                    'gv': 'USD 10'
                                }
                            }
                        });
                    }
                    ;
                    $('#confirm').appendTo("body").modal('show');
                    if (base_url == 'http://localhost') {
                        window.location.replace('http://localhost/gmlm/admin');
                    } else {
                        window.location.replace('https://globalmlmsolution.com/demo');

                    }
                } else if (result == 'Time limit') {
                    jQuery('#wrong_otp').html('Enter Correct Otp').css('color', 'red');
                    document.getElementById('dummy_otp_verify').disabled = false;
                } else {
                    jQuery('#wrong_otp').html('Entered otp is Incorrect').css('color', 'red');
                    document.getElementById('dummy_otp_verify').disabled = false;
                }
            },
            error: function (res) {
                console.log("error");
            }
        });
    }

    function edit_email(clicked_value) {
        if (clicked_value == "Edit Details") {
            jQuery('#wrong_otp').html('');
            $('#lead_details').appendTo("body").modal('show');
            $('#otp_verify').appendTo("body").modal('hide');
            document.getElementById("resend").value = "Edit Details";
        } else {
            if (jQuery('#dummy_text').val() == '' | jQuery('#dummy_values').val() == '' | jQuery('#dummy_side').val() == '' | jQuery('#budget').val() == '') {
                jQuery('.resent').html('<br>Enter all the details!!!<br><br>').css('color', 'red');
            } else {
                var dummy_text = jQuery('#dummy_text').val();
                var dummy_values = jQuery('#dummy_values').val();
                var dummy_side = jQuery('#dummy_side').val();
                var budget = jQuery('#budget').val();
                var country = jQuery('#country').val();
                var country_code = iti['getSelectedCountryData']().dialCode.replace("+", "");
                var base_url = window.location.origin;
                if (base_url == 'http://localhost') {
                    href = base_url + '/gmlm/site/resend_otp';
                } else {
                    href = base_url + '/site/resend_otp';
                }
                jQuery.ajax({
                    url: href,
                    type: 'post',
                    data: {
                        "dummy_text": dummy_text,
                        "dummy_values": dummy_values,
                        "dummy_side": dummy_side,
                        "budget": budget,
                        "country": country,
                        "country_code": country_code
                    },
                    success: function (result) {
                        console.log(result);
                        if (result == '"resent otp"') {
                            jQuery('#resent').html('<br>OTP Resent sucessfully!!!<br><br>').css('color', 'green');
                        } else if (result == '"no email"') {
                            jQuery('#resent').html('<br>Enter a Valid Email!!!<br>').css('color', 'red');
                        }
                    }
                })
            }
        }
    }
    <?php
    /*telInput = $("#phone");
    errorMsg = $("#error-msg");
    validMsg = $("#valid-msg");

    var reset = function() {
      telInput.removeClass("error");
      errorMsg.addClass("hide");
      validMsg.addClass("hide");
    };

    // on blur: validate
    telInput.blur(function() {
      reset();
      if ($.trim(telInput.val())) {
        if (iti['isValidNumber']()) {
           validMsg.removeClass("hide");
           $('#country_code').val(iti['getSelectedCountryData']().dialCode);
        } else {
          telInput.addClass("error");
          errorMsg.removeClass("hide");
        }
      }
    });


    // on keyup / change flag: reset
    telInput.on("keyup change", reset);
    */ ?>
    window.onload = function () {
        $(document).ready(function (event) {
            var base_url = window.location.origin;
            var type = '<?php $type = $this->session->name === 'Admin' ? 'Admin' : 'Member'; echo $type; ?>';
            console.log(window.location.origin);
            const queryString = window.location.search;
            // if Query String is not empty or null
            if (queryString) {
                console.log(queryString);
                const urlParams = new URLSearchParams(queryString);
                const utm_source = urlParams.get('utm_source');
                if (base_url === 'http://localhost') {
                    href = base_url + '/gmlm/site/captureLead/' + utm_source;
                } else {
                    href = 'https://demo.globalmlmsolution.com/site/captureLead/' + utm_source;
                }

                //console.log('href');
                //console.log(href);
                $.ajax({
                    url: href,
                    type: 'post',
                    global: false,
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (res) {
                        console.log("error");
                    }
                });
            }
        });
        var phoneInputField;
        var iti;
        document.addEventListener('lead-capture-form-opened', function (e) {

            phoneInputField = document.querySelector("#dummy_values");

            iti = window.intlTelInput(phoneInputField, {
                initialCountry: "auto",
                allowDropdown: true,
                autoHideDialCode: true,
                separateDialCode: true,
                geoIpLookup: getIp,
                utilsScript: '<?php echo base_url();?>axxets/base/js/intl_tel_input_utils.js',
            });

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
            phoneInputField.addEventListener('countrychange', function (e) {
                countryDropdown.value = iti.getSelectedCountryData().name;
            });

            // listen to the address dropdown for changes
            countryDropdown.addEventListener('change', function () {
                iti.setCountry(country_iso[this.value]);
            });
        });
        var fieldCreated;
        $('.lead_capture').on('click', function () {
            // fire lead-capture-form-opened event if field is not created
            if (!fieldCreated) {
                document.dispatchEvent(new Event('lead-capture-form-opened'));
                fieldCreated = true;
            }
            $('#lead_details').appendTo("body").modal('show');
            var base_url = window.location.origin;
            if (base_url === 'http://localhost') {
                href = base_url + '/gmlm/site/lp_form_click';
            } else {
                href = 'https://demo.globalmlmsolution.com/site/lp_form_click';
            }
            $.ajax({
                url: href,
                type: 'post',
                global: false,
                success: function (response) {
                    console.log(response)
                },
                error: function (res) {
                    console.log("error");
                }
            });
        });

        $('#lead_details_submit').on('click', function () {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (jQuery('#dummy_text').val() == '' | jQuery('#dummy_values').val() == '' | jQuery('#dummy_side').val() == '') {
                jQuery('.resent').html('<br>Enter all the details!!!<br><br>').css('color', 'red');
            } else if (!jQuery('#dummy_side').val().match(mailformat)) {
                jQuery('.resent').html('<br>Please share valid email !!!<br><br>').css('color', 'red');
            } else {
                $('#lead_details').modal('hide');
                var dummy_text = jQuery('#dummy_text').val();
                var dummy_values = jQuery('#dummy_values').val();
                var dummy_side = jQuery('#dummy_side').val();
                var budget = jQuery('#budget').val();
                var country_code = iti['getSelectedCountryData']().dialCode.replace("+", "");
                var country = jQuery('#country').val();
                var base_url = window.location.origin;
                console.log(window.location.origin);
                const queryString = window.location.search;
                console.log(queryString);
                const urlParams = new URLSearchParams(queryString);
                const utm_source = urlParams.get('utm_source');
                if (base_url === 'http://localhost') {
                    href = base_url + '/gmlm/site/captureLead/' + utm_source;
                } else {
                    href = 'https://demo.globalmlmsolution.com/site/captureLead/' + utm_source;
                }
                console.log('href');
                console.log(href);
                $.ajax({
                    url: href,
                    type: 'post',
                    data: {
                        "dummy_text": dummy_text, "dummy_values": dummy_values, "dummy_side": dummy_side,
                        "budget": budget, "country_code": country_code, "country": country
                    },
                    success: function (response) {
                        if (!iti['isValidNumber']()) {
                            $('#lead_details').appendTo("body").modal('show');
                            jQuery('.resent').html('<br>Please Share the Valid Phone Number !!! <br><br>').css('color', 'red');
                        } else {
                            $('#otp_verify').modal('show');
                        }
                        console.log(response)
                    },
                    error: function (res) {
                        console.log("error");
                    }
                });
            }
        });


        $(document).ajaxSend(function () {
            $(".loader").show();
        });
        $(document).ajaxComplete(function () {
            $(".loader").hide();
        });
    };
</script>