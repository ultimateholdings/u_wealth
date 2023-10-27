<!-- jQuery 3 -->


<!-- fullscreen -->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/screenfull/screenfull.js"></script>

<!-- jQuery ui -->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/jquery-ui/jquery-ui.js"></script>

<!-- popper -->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	

<!-- Slimscroll -->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- apexcharts-->
<script src="<?php echo base_url();?>axxets/mega/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="<?php echo base_url();?>axxets/mega/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

<!-- This is data table -->
<!--<script src="<?php echo base_url();?>axxets/mega/vendor_components/datatable/datatables.min.js"></script>
<script src="<?php echo base_url();?>axxets/mega/js/pages/data-table.js"></script>-->

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>axxets/mega/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
	
<!-- Bx-code admin App -->
<script src="<?php echo base_url();?>axxets/mega/js/template.js"></script>

<!-- Bx-code admin dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>axxets/mega/js/pages/dashboard-2.js"></script>
<script type="text/javascript" src="<?php echo base_url('axxets/countries.js') ?>"></script>

<script type="text/javascript">
$(document).ready(function () {    
//Get CurrentUrl variable by combining origin with pathname, this ensures that any url appendings (e.g. ?RecordId=100) are removed from the URL
var CurrentUrl = window.location.origin+window.location.pathname;
//Check which menu item is 'active' and adjust apply 'active' class so the item gets highlighted in the menu
//Loop over each <a> element of the NavMenu container
$('#NavMenu a').each(function(Key,Value)
    {
        //Check if the current url
        if(Value['href'] === CurrentUrl)
        {
            //We have a match, add the 'active' class to the parent item (li element).
            document.getElementsByClassName('active')[0].classList.remove('active');
            $(Value).parent().addClass('active');
            $(Value).parents().eq(2).addClass('active');
        }
    });
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

<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({html: true, placement: "top"});
    });
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

<?php include APPPATH.'/views/theme/lead_capture.php'; ?>