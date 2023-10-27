<script src="<?php echo base_url('axxets/base/js/jquery.blockUI.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/jquery.slimscroll_v1.3.8.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/ckeditor.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/jquery_v1.12.1-ui.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap_v3.3.7.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap-switch_v3.3.4.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/admin/js/theme.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('axxets/admin/js/admin_script.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('axxets/countries.js') ?>"></script> 
<!-- <script src="<?php echo base_url('axxets/base/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo base_url('axxets/base/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('axxets/base/js/bootstrap.min.js') ?>"></script> -->


<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"
        type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
-->

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

<script>
   <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
     $(document).ready(function () {
      document.getElementById("home").classList.add('in');
       document.getElementById("home").classList.remove('show');
     });
            
      <?php } ?> 
      </script>
      <script >
        <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
     $(document).ready(function () {
       document.getElementById("page_header").style.overflowX = "hidden";
     
     });
            
      <?php } ?>
      </script>
       <script >
        <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
     $(document).ready(function () {
       document.getElementById("add_deduct").style.marginTop = "70px";
        

     
     });
            
      <?php } ?>
      </script>
       <script >
        <?php if((config_item('admin_theme')=='admin/default/base') ) { ?>
     $(document).ready(function () {
 document.getElementById("image").style.display = "inherit";
     
     });
            
      <?php } ?>
      </script>
       <script >
        <?php if((config_item('member')=='member/default/base') ) { ?>
     $(document).ready(function () {
 document.getElementById("pen_cil").innerHTML = "";
  document.getElementById("re_move").innerHTML = "";
     
     });
            
      <?php } ?>
      </script>

      
      
<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({html: true, placement: "top"});
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
    $(document).ready(function(){
        $(".nav-item").click(function(){
          document.getElementsByClassName('active')[0].classList.remove('active');
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        var page_height = document.getElementById('pagecontent').offsetHeight;
        var sidebar_height = document.getElementById('sidebarmenu').offsetHeight;

        var height = document.getElementById('pagecontent').offsetHeight;
        document.getElementById("sidebarmenu").setAttribute('style', 'height:' + height + 'px' + '!important');    
        if(page_height > sidebar_height) {
            document.getElementById("sidebarmenu").setAttribute('style', 'height:' + page_height + 'px' + '!important');
        } else {
            document.getElementById("pagecontent").setAttribute('style', 'height:' + sidebar_height + 'px' + '!important');
        }
    });
</script>

<script type="text/javascript">
    $(".nav-item").click(function(){

        var page_height = document.getElementById('pagecontent').offsetHeight;
        var sidebar_height = document.getElementById('sidebarmenu').offsetHeight;
        
        var height = document.getElementById('pagecontent').offsetHeight + 600;
        document.getElementById("sidebarmenu").setAttribute('style', 'height:' + height + 'px' + '!important');    
        if(page_height > sidebar_height) {
            document.getElementById("sidebarmenu").setAttribute('style', 'height:' + page_height + 'px' + '!important');
        } else {
            document.getElementById("pagecontent").setAttribute('style', 'height:' + sidebar_height + 'px' + '!important');
        }
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

    $(function () {
            var name = $('#pname');
            if(name != ''){
                $("#pname").autocomplete({
                source: '<?php echo site_url('cron/get_products') ?>'
                });    
            }            
    });

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

          jQuery('#DTable').before("<div id='reportrange' class='btn btn-success btn-md' style='margin-left:10px; margin-bottom:10px;'><span></span> <b class='caret'></b></div>");

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


<?php include APPPATH.'/views/theme/lead_capture.php'; ?>