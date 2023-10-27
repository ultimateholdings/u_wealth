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
    <script src="<?php echo base_url('axxets/stack/custom/js/toastr.min.js') ?>"></script>
    <script src="<?php echo base_url('axxets/stack/js/scripts/pages/jquery.validate.js') ?>"></script>
    <script src="https://cdn.usebootstrap.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<?php } else { ?>
    <!-- BEGIN: Vendor JS
    <script src="<?php echo base_url();?>axxets/stack/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS
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
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>axxets/stack/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>axxets/stack/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS
    <script src="<?php echo base_url();?>axxets/stack/js/scripts/pages/dashboard-analytics.js"></script> 
    <!-- END: Page JS-->

    <script type="text/javascript" src="<?php echo base_url();?>axxets/base/js/datatable/daterangepicker_2.1.25.js"></script>

    <script src="<?php echo base_url();?>axxets/admin/js/jquery.dataTables.min.js"></script>

   <link rel="stylesheet" href="<?php echo base_url();?>axxets/base/css/datatable/jquery.dataTables_1.10.22.min.css">
   <link rel="stylesheet" href="<?php echo base_url();?>axxets/base/css/datatable/buttons.dataTables_1.10.22.min.css">   

   <script src="<?php echo base_url();?>axxets/base/js/datatable/dataTables.buttons_1.6.4.min.js"></script>
   <script src="<?php echo base_url();?>axxets/base/js/datatable/jszip_3.1.3.min.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/pdfmake_0.1.53.min.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/vfs_fonts_0.1.53.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/buttons.html5_1.6.4.min.js"></script>   
   <script src="<?php echo base_url();?>axxets/base/js/datatable/moment.js"></script> 
   <script type="text/javascript" src="<?php echo base_url();?>axxets/base/js/datatable/daterangepicker_2.1.25.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>axxets/base/css/datatable/daterangepicker.css" /> 
<script src="<?php echo base_url('axxets/base/js/jquery_v1.12.1-ui.js') ?>" type="text/javascript"></script>


<?php } ?>

<?php
     $query = $this->db->query("SELECT  phonenumber,feedback FROM  modal where userid=1000 ");
    
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

<script type="text/javascript" src="<?php echo base_url('axxets/countries.js') ?>"></script>

<!-- <script> 
    $(document).ready(function () { 
        $(document).bind("contextmenu", function (e) { 
            return false; 
        }); 
    }); 
</script>
 -->
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
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({html: true, placement: "top"});
    });
</script>
 

<script type="text/javascript">
$(':text').keypress(function (e) {
var regex = new RegExp("^[a-zA-Z0-9 ,\@.:]+$");
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

</script>

<script type="text/javascript">
    
  $(document).ready(function() {

    function getColumnIndexesByClass(name) {
      return $("." + name).map(function() {
        return $(this).index(); // add one because nth-child is not zero based
      }).get();
    }

    link = document.querySelector('#DTable');
    var today = new Date().toISOString().split('T')[0];

    if (!!link) {
      if(link.getAttribute('data-export')=='Yes'){
        var table = $('#DTable').DataTable({
            pageLength:500,
            "order": [[ 0, "desc" ]],
            dom: 'Bfrtip',
            "lengthChange": true,
            language: {
                "search": "_INPUT_",
                "searchPlaceholder": "Filter here "
            },
            lengthMenu: [
                 [[50, 100 - 1], [50, 100, "All"]],
            ],        
            buttons: [{
                    extend: 'pdfHtml5',
                    title: link.getAttribute('data-name')+'_'+today,
                    exportOptions: {
                        columns: "thead th:not(.noExport)",
                        format: {
                          body: function ( data, row, column, node ) {
                            if (typeof data === 'string' || data instanceof String) {
                                  data = data.replace(/<strong>/ig,"");
                                  data = data.replace(/<\/strong>/ig,"");
                                  data = data.replace(/&nbsp;/ig," ");
                                  data = data.replace(/<span style=\"color:green\">/ig," ");
                                  data = data.replace(/<\/span>/ig," ");
                                  data = data.replace(/<br\s*\/?>/ig, "\r\n");
                              }
                              return data;
                          }
                        }
                    },
                    orientation: 'landscape',
                    pageSize: 'A4',
                    customize: function (doc) {
                      doc.content[1].table.widths = 
                          Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                    }
                },{
                    extend: 'excelHtml5',
                    title: link.getAttribute('data-name')+'_'+today,
                    exportOptions: {
                        columns: "thead th:not(.noExport)",
                        format: {
                          body: function ( data, row, column, node ) {
                            if (typeof data === 'string' || data instanceof String) {
                                  data = data.replace(/<strong>/ig,"");
                                  data = data.replace(/<\/strong>/ig,"");
                                  data = data.replace(/&nbsp;/ig," ");
                                  data = data.replace(/<span style=\"color:green\">/ig," ");
                                  data = data.replace(/<\/span>/ig," ");
                                  data = data.replace(/<br\s*\/?>/ig, "\r\n");
                              }
                              return data;
                          }
                      }
                    }
                }, {
                    extend: 'csvHtml5',
                    title: link.getAttribute('data-name')+'_'+today,
                    exportOptions: {
                        columns: "thead th:not(.noExport)",
                        format: {
                          body: function ( data, row, column, node ) {
                            if (typeof data === 'string' || data instanceof String) {
                                  data = data.replace(/<strong>/ig,"");
                                  data = data.replace(/<\/strong>/ig,"");
                                  data = data.replace(/&nbsp;/ig," ");
                                  data = data.replace(/<span style=\"color:green\">/ig," ");
                                  data = data.replace(/<\/span>/ig," ");
                                  data = data.replace(/<br\s*\/?>/ig, "\r\n");
                              }
                              return data;
                          }
                      }                        
                    }
                }
            ]        
        });

      }else{
        var table = $('#DTable').DataTable({
          "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
          "order": [[ 0, "desc" ]],
        });

      }      

      var indexes = getColumnIndexesByClass('datefilter');

      if(indexes >0){

          jQuery('#DTable').before("<div id='reportrange' class='btn btn-success btn-md' style='margin-left:10px;'><span></span> <b class='caret'></b></div>");

          $(function(){
            var start = moment().add(-30, 'days');
            var end = moment();

            function cb(start, end) {
              $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
              startDate: start,
              endDate: end,
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              }
            }, cb);

            cb(start, end);

          });

          $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
             var start = picker.startDate;
             var end = picker.endDate;

             var indexes = getColumnIndexesByClass('datefilter');
             //alert(indexes);

              $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                  var min = start;
                  var max = end;
                  var startDate = new Date(data[indexes]);

                  //alert(min);
                  //alert(max);
                  //alert(startDate);
                  
                  if (min == null && max == null) {
                    return true;
                  }
                  if (min == null && startDate <= max) {
                    return true;
                  }
                  if (max == null && startDate >= min) {
                    return true;
                  }
                  if (startDate <= max && startDate >= min) {
                    return true;
                  }
                  return false;
                }
              );  

              table.draw();
              $.fn.dataTable.ext.search.pop();
            });
      }  

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

<?php include APPPATH.'/views/theme/lead_capture.php'; ?>