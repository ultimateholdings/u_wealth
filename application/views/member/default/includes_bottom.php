<!--footer end-->

<!-- inject:js -->
<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/jquery.nicescroll_v3.7.6.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/autosize_v4.0.0.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/modernizr.min.js') ?>" type="text/javascript"></script>
<!-- endinject -->
<script src="<?php echo base_url('axxets/member/js/theme.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/jquery_v1.12.1-ui.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('axxets/countries.js') ?>"></script>
<!-- <script src="<?php echo base_url('axxets/base/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo base_url('axxets/base/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap.min.js') ?>"></script> -->
<!-- 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/4.0.0/autosize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
-->

<!--<script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>-->
<!--<script>
    CKEDITOR.replace('editor');
</script>-->



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


<script> 
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({html: true, placement: "top",
    });

    });
</script>
   <script >
        <?php if((config_item('member')=='member/default/base') ) { ?>
     $(document).ready(function () {
 document.getElementById("aside").style.height = "830px";
     
     });
            
      <?php } ?>
      </script>
       <script >
        <?php if((config_item('member')=='member/default/base') ) { ?>
     $(document).ready(function () {
            $("td").css("border-top", "0px");  
     });
            
      <?php } ?>
      </script>
<!--       .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th
 -->
       
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
    $(document).ready(function () {
        var height = document.getElementById('ui').offsetHeight;
        document.getElementById("aside").setAttribute('style', 'height:' + height + 'px' + '!important');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var element= document.querySelector('li.active .nav-sub');
        if(element) {
            element.setAttribute('style', 'display: block !important');
        }
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

/*$(':text').bind('copy paste', function (e) {
        e.preventDefault();
});
*/

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
<!--
<script type="text/javascript">
    $(document).ready(function () {
        var e = "<div data-embed-button='images' data-entity-embed-display='view_mode:media.simple_image' data-entity-type='media' data-entity-uuid='3d44edc3-d9d9-406b-b5fa-0affced44452' data-langcode='en' class='embedded-entity align-center'><article><div><img src='https://wordstream-files-prod.s3.amazonaws.com/s3fs-public/styles/simple_image/public/images/media/images/design-principles-zendesk-banner-ad.png?lbXNcVdfS9l7IvEtpjBSjYM_oKY5EXac&amp;itok=5dEY-pbo' width='583' height='65' alt='zendesk-banner-design-principles' typeof='foaf:Image' style='display:block;margin-left: auto;margin-right:auto;'></div></article></div>";
        $('#earning').prepend(e);            
    });

</script>
-->

<?php include APPPATH.'/views/theme/lead_capture.php'; ?>