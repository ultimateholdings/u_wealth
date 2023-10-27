<?php if($title == 'email'){ ?> 
    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/forms/quill/quill.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>axxets/stack/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/js/core/app.js"></script>
    <!-- END: Theme JS-->
 
    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>axxets/stack/js/scripts/pages/app-email.js"></script>
    <!-- END: Page JS-->
    <!-- Jquery  Validation-->
    <script>var base_url = '<?php echo base_url(); ?>';</script>
    <script src="<?php echo base_url('axxets/stack/custom/js/toastr.min.js') ?>"></script>
    <script src="<?php echo base_url('axxets/stack/js/scripts/pages/jquery.validate.js') ?>"></script>

<?php } else { ?>
 
    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/extensions/jquery.knob.min.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/js/scripts/extensions/knob.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/charts/raphael-min.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/charts/morris.min.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/data/jvector/visitor-data.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/charts/chart.min.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/extensions/unslider-min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/css/core/colors/palette-climacon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/stack/fonts/simple-line-icons/style.min.css">
    <script src="<?php echo base_url('axxets/base/js/jquery_v1.12.1-ui.js') ?>" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>axxets/stack/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>axxets/stack/js/scripts/pages/dashboard-analytics.js"></script>
    <!-- END: Page JS-->

<?php } ?>

    <?php
     $query = $this->db->query("SELECT  phonenumber,feedback FROM  modal where userid='".$member->id."' ");
    
      if((!$query->num_rows() > 0)) {
      echo '<script>
        $(document).ready(function() {

          $("#button").show();           
        });
        </script>';
       }
      else{
        echo '<script>
                    $("#button").hide();
    </script>';
    }
    ?>

<script type="text/javascript">
    $(document).ready(function () {    
    //Get CurrentUrl variable by combining origin with pathname, this ensures that any url appendings (e.g. ?RecordId=100) are removed from the URL
    var CurrentUrl = window.location.origin+window.location.pathname;
    //Check which menu item is 'active' and adjust apply 'active' class so the item gets highlighted in the menu
    //Loop over each <a> element of the NavMenu container
    $('#main-menu-navigation a').each(function(Key,Value)
        {
            //alert(Value['href']);
            //Check if the current url
            if(Value['href'] === CurrentUrl)
            {
                //We have a match, add the 'active' class to the parent item (li element).
                document.getElementsByClassName('active')[0].classList.remove('active');
                $(Value).parent().addClass('active');
                <?php if(config_item('stack_theme_id')!='1'){ ?>
                    $(Value).parents().eq(2).addClass('active open');
                <?php } else { ?>
                    $(Value).parents().eq(2).addClass('active');
                <?php } ?>
            }
        });

        //selectCountrycode('Countrycode');
    });
</script>

  <script>
   <?php if((config_item('member')=='member/stack/index') ) { ?>
        $(document).ready(function () {
        $( "hr" ).replaceWith( "<br>" );
       // document.getElementsByTagName("hr")[0].style.display="none";
            });
            
      <?php } ?> 
      </script>
      




<script type="text/javascript">
      function copyToclip(inputID) {

      var copyText = document.getElementById(inputID);

      copyText.select();

      document.execCommand("copy");

      $.toaster('Link Copied');

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

<script>
var timer;
var compareDate = "<?php echo $member_data['new_time'] ?>";
var now = new Date();
timer = setInterval(function() {
  timeBetweenDates(compareDate);
}, 1000);
function timeBetweenDates(toDate) {
  var dateEntered = toDate;
  var now = new Date();
  var difference = dateEntered - now.getTime();
  if (difference <= 0) {
    //clearInterval(timer);
    $("#days").text(0);
    $("#hours").text(0);
    $("#minutes").text(0);
    $("#seconds").text(0);
  } else {
    var seconds = Math.floor(difference / 1000);
    var minutes = Math.floor(seconds / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);
    hours %= 24;
    minutes %= 60;
    seconds %= 60;
    $("#days").text(days);
    $("#hours").text(hours);
    $("#minutes").text(minutes);
    $("#seconds").text(seconds);
  }
}
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var id = $("#to").val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $('#to_res').html(data);
        });
    })

    function get_user_name(id, result) {
        var id = $(id).val();
        $.get("<?php echo site_url('site/get_user_name/') ?>" + id, function (data) {
            $(result).html(data);
        });
    }

    $(document).on('keyup keypress', 'form input', function(e) {
      if(e.which == 13) {
        e.preventDefault();
        return false;
      }
    });

</script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd",
            yearRange: "-70:+70",
            changeMonth: true,
            changeYear: true,
            defaultDate: 0,
            showOptions: {direction: "down"},
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () { $('[data-toggle="popover"]').popover({html: true, placement: "top"}); });
</script>

<?php include APPPATH.'/views/theme/lead_capture.php'; ?>