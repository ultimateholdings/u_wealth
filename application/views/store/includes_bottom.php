    <!-- all js here -->
    <!-- jquery latest version -->
    <!--<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->
    <script src="<?php echo base_url('axxets/shop/js/vendor/jquery-1.12.0.min.js') ?>"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url('axxets/shop/js/bootstrap.min.js') ?>"></script>
    <!-- nivo slider js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.nivo.slider.pack.js') ?>"></script>
    <!-- jquery.countdown js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.countdown.min.js') ?>"></script>
    <!-- owl.carousel js -->
    <script src="<?php echo base_url('axxets/shop/js/owl.carousel.min.js') ?>"></script>
    <!-- Img Zoom js -->
    <script src="<?php echo base_url('axxets/shop/js/img-zoom/jquery.simpleLens.min.js') ?>"></script>
    <!-- meanmenu js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery.meanmenu.js') ?>"></script>
    <!-- jquery-ui js -->
    <script src="<?php echo base_url('axxets/shop/js/jquery-ui.min.js') ?>"></script>
    <!-- wow js -->
    <script src="<?php echo base_url('axxets/shop/js/wow.min.js') ?>"></script>
    <!-- plugins js -->
    <script src="<?php echo base_url('axxets/shop/js/plugins.js') ?>"></script>
    <!-- main js -->
    <script src="<?php echo base_url('axxets/shop/js/main.js') ?>"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>-->

    <script>
    $(document).ready(function()
    {
            /*
            * binding onChange event here
            * you can replace .change with .blur
            */
            $('#qty').change(UpdateInfo);
            
            
        });

           function UpdateInfo()
           {
             var qty = $('#qty').val();
             //alert(qty);
             var subtotal = qty ;
             $('#product-subtotal').val(subtotal);
           }
   </script>

    <script>
    $(document).ready(function(){
     $("#differentdiv").hide();
     $("#bankdetail").hide();
     document.getElementById("transactionid").disabled = true;
     $("#Shipping_button").on("click",function(){
        $("#checkut4").hide();
        //$("#differentdiv").hide();
    });
    $("#payment_button").on("click",function(){
        $("#checkut5").hide();
        //$("#div1").hide();
    });
    $("#shipping_method").on("click",function(){
        $("#checkut4").show();
        //$("#div1").hide();
    });
    $("#continue4").on("click",function(){
        $("#checkut6").show();
        //$("#div1").hide();
    });
});
</script>
<script>
    $('.window .close').click(function (e) {
                //$.cookie("CamSession1", "CAM");  
                if ($('#register').is(':checked')) {
                    window.location.replace("http://www.stackoverflow.com");
                }
                else if ($('#guest').is(':checked')) {
                    window.location.replace("http://www.exchange.com");
                }
                $('#mask').hide();
                $('.window').hide();
            });
    $(document).ready(function() {
        $("input[name$='address_radio']").click(function() {
        var test = $(this).val();
        //alert(test);
        if(test=="different"){
        $("#differentdiv").show();
        //$("#checkut2").hide();

        }
    });
    $("input[name$='payment']").click(function() {
        var test = $(this).val();
        if(test=="bank"){
        $("#bankdetail").show();
        document.getElementById("transactionid").disabled = false;
        }
        
    });
    $("input[name$='payment']").click(function() {
        var test = $(this).val();
        if(test=="Ewallet"){
        $("#bankdetail").hide();
        document.getElementById("transactionid").disabled = true;
        }
        
    });

  });
</script>
<script>
          document.getElementById("cat_select").onchange = function() {
             if (this.selectedIndex!==0) {
                 window.location.href = this.value;
             }        
            };
</script>
<script>
          document.getElementById("vendor_select").onchange = function() {
             if (this.selectedIndex!==0) {
                 window.location.href = this.value;
             }        
            };
         </script>
<script>
        function initialize() {
            var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: new google.maps.LatLng(23.81033, 90.41252)
            };
            var map = new google.maps.Map(document.getElementById('googleMap'),
                mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
   function setCookie(cname, cvalue, exdays) 
   {
     var d = new Date();
     d.setTime(d.getTime() + (exdays*24*60*60*1000));
     var expires = "expires="+ d.toUTCString();
     document.cookie = cname + "=" + cvalue + ";" + expires + "; path=<?php echo config_item('cookie_url');  ?>";
      //document.cookie = cname + "=" + cvalue + ";" + expires + "; path=/;domain=unilevel.globalmlmsolution.com"; 
      //alert(document.cookie);
   }
  $(document).ready(function () {
   var path='<?php echo config_item('cookie_url'); ?>';
   //alert(path);
   var sponsor_id= '<?php echo $_SESSION['sponsor_id'];?>';
   //alert(sponsor_id);
   var cookie_variable='<?php echo config_item('cookie_variable');?>';
   setCookie(cookie_variable,sponsor_id,'30');
  });
</script>
